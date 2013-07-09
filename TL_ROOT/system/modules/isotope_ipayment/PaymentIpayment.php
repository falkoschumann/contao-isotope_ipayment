<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Isotope ipayment
 * Copyright (c) 2013, Falko Schumann <http://www.muspellheim.de>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *   - Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *   - Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * PHP version 5
 * @copyright  2013 Falko Schumann 
 * @author     Falko Schumann <falko.schumann@muspellheim.de> 
 * @package    IsotopeIpayment 
 * @license    BSD-2-Clause 
 * @filesource
 */


/**
 * Class PaymentIpayment 
 *
 * @copyright  2013 Falko Schumann
 * @author     Falko Schumann <falko.schumann@muspellheim.de> 
 * @package    Controller
 */
class PaymentIpayment extends IsotopePayment
{

	public function processPayment()
	{
		if ($this->ipayment_use_hidden_trigger)
		{		
			$objOrder = new IsotopeOrder();
			if (!$objOrder->findBy('cart_id', $this->Isotope->Cart->id))
			{
				$this->log('Order to cart ID "' . $this->Isotope->Cart->id . '" not found', __METHOD__, TL_ERROR);
				return false;
			}

			if ($objOrder->date_paid > 0 && $objOrder->date_paid <= time())
			{
				IsotopeFrontend::clearTimeout();
				return true;
			}

			if (IsotopeFrontend::setTimeout())
			{
				// Do not index or cache the page
				global $objPage;
				$objPage->noSearch = 1;
				$objPage->cache = 0;

				$objTemplate = new FrontendTemplate('mod_message');
				$objTemplate->type = 'processing';
				$objTemplate->message = $GLOBALS['TL_LANG']['MSC']['payment_processing'];
				return $objTemplate->parse();
			}

			$this->log('Payment could not be processed.', __METHOD__, TL_ERROR);
			$this->redirect($this->addToUrl('step=failed', true));
		}
		else
		{
			return $this->internalProcessPayment();
		}
	}
	
	/**
	 * 
	 * @param IsotopeOrder $objOrder
	 */
	private function internalProcessPayment()
	{
		$objOrder = new IsotopeOrder();
		$shopper_id = $this->Input->post('shopper_id');
		if (!$objOrder->findBy('uniqid', $shopper_id))
		{
			$this->log('Order with unique ID "' . $shopper_id . '" not found', __METHOD__, TL_ERROR);
			return false;
		}

		if ($this->Input->post('ret_status') != 'SUCCESS')
		{
			$ret_errorcode = $this->Input->post('ret_errorcode');
			$ret_errormsg = $this->Input->post('ret_errormsg');
			$this->log('Payment for order ID ' . $objOrder->id . ' return with error code ' . $ret_errorcode . ': ' . $ret_errormsg, __METHOD__, TL_ERROR);
			return false;
		}

		$remoteIp = $this->Environment->ip;
		$remoteHostname = gethostbyaddr($remoteIp);
		if (!preg_match('/\.ipayment\.de$/', $remoteHostname) || !in_array($remoteIp, array('212.227.34.218', '212.227.34.219', '212.227.34.220')))
		{
			$this->log('Payment for order ID ' . $objOrder->id . ' was not from ipayment.de: ' . $remoteIp . ' / ' . $remoteHostname, __METHOD__, TL_ERROR);
			return false;
		}

		if (!empty($this->ipayment_security_key))
		{
			$amount = round(($objOrder->grandTotal * 100));
			$currency = $this->Isotope->Config->currency;
			$hash = md5($this->ipayment_trxuser_id .
					$amount .
					$currency .
					$this->Input->post('ret_authcode') .
					$this->Input->post('ret_trx_number') .
					$this->ipayment_security_key);
			if ($this->Input->post('ret_param_checksum') != $hash)
			{
				$this->log('ipayment checkout manipulation in payment for order ID ' . $objOrder->id . '!', __METHOD__, TL_ERROR);
				$this->redirect($this->addToUrl('step=failed', true));
				return false;
			}
		}

		if (!$objOrder->checkout())
		{
			$this->log('ipayment checkout for Order ID "' . $objOrder->id . '" failed', __METHOD__, TL_ERROR);
			return;
		}

		$objOrder->date_paid = time();
		$result = $objOrder->updateOrderStatus($this->new_order_status);
		$objOrder->save();
		$this->log('Payment with ipayment received for order ID ' . $objOrder->id . '.', __METHOD__, TL_GENERAL);
		return true;
	}
	
	
	public function processPostSale()
	{
		$this->internalProcessPayment();
	}


	public function checkoutForm()
	{
		$objOrder = new IsotopeOrder();
		
		if (!$objOrder->findBy('cart_id', $this->Isotope->Cart->id))
		{
			$this->redirect($this->addToUrl('step=failed', true));
		}
		
		$objAddress = $this->Isotope->Cart->billingAddress;
		$amount = round(($this->Isotope->Cart->grandTotal * 100));
		$currency = $this->Isotope->Config->currency;
		
		$arrParam = array
		(
			'trxuser_id'				=> $this->ipayment_trxuser_id,
			'trxpassword'				=> $this->ipayment_trxpassword,
			// TODO handle currencies with decimal factor other than 100
			'trx_amount'				=> $amount,
			'trx_currency'				=> $currency,
			'redirect_url'				=> $this->Environment->base . IsotopeFrontend::addQueryStringToUrl('uid=' . $objOrder->uniqid, $this->addToUrl('step=complete', true)),
			'redirect_action'			=> 'POST',
			'trx_paymenttyp'			=> 'cc',
			'shopper_id'				=> $objOrder->uniqid,
			'advanced_strict_id_check'	=> $this->ipayment_advanced_strict_id_check,
			'addr_name'					=> $objAddress->firstname . ' ' . $objAddress->lastname,
			'addr_street'				=> $objAddress->street_1,
			'addr_zip'					=> $objAddress->postal,
			'addr_city'					=> $objAddress->city,
			'addr_email'				=> $objAddress->email 
		);

		if (!empty($this->ipayment_security_key))
		{
			$arrParam['trx_securityhash'] = md5($this->ipayment_trxuser_id .
												$amount .
												$currency .
												$this->ipayment_trxpassword .
												$this->ipayment_security_key);
		}
		
		if ($this->ipayment_use_hidden_trigger)
		{
			$arrParam['hidden_trigger_url'] = $this->Environment->base . 'system/modules/isotope/postsale.php?mod=pay&id=' . $this->id;
		}
		
		$objTemplate = new FrontendTemplate('iso_payment_ipayment');

		$objTemplate->action = 'https://ipayment.de/merchant/' . $this->ipayment_account_id . '/processor/2.0/';
		$objTemplate->params = $arrParam;
		$objTemplate->submitLabel = $GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'];
		$objTemplate->id = $this->id;

		return $objTemplate->parse();
	}

}

?>