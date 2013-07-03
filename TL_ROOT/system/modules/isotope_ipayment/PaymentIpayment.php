<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Isotope ipayment
 * Copyright (c) 2013, Muspellheim.de
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
 * @copyright  Muspellheim.de 2013 
 * @author     Falko Schumann <falko.schumann@muspellheim.de> 
 * @package    IsotopeIpayment 
 * @license    BSD-2-Clause 
 * @filesource
 */


/**
 * Class PaymentIpayment 
 *
 * @copyright  Muspellheim.de 2013 
 * @author     Falko Schumann <falko.schumann@muspellheim.de> 
 * @package    Controller
 */
class PaymentIpayment extends IsotopePayment
{

	public function processPayment()
	{
		$objOrder = new IsotopeOrder();
		
		if (!$objOrder->findBy('id', $this->Input->post('shopper_id')))
		{
			$this->log('Order ID "' . $this->Input->post('shopper_id') . '" not found', __METHOD__, TL_ERROR);
			return false;
		}
		
		if ($this->Input->post('ret_status') == 'SUCCESS')
		{
			$objOrder->date_paid = time();
			$objOrder->save();
			return true;
		}
		
		return false;
	}
	
	
	public function checkoutForm()
	{
		$objOrder = new IsotopeOrder();
		
		if (!$objOrder->findBy('cart_id', $this->Isotope->Cart->id))
		{
			$this->redirect($this->addToUrl('step=failed', true));
		}
		
		$objAddress = $this->Isotope->Cart->billingAddress;
		
		$arrParam = array
		(
			'trxuser_id'				=> $this->ipayment_trxuser_id,
			'trxpassword'				=> $this->ipayment_trxpassword,
			'trx_amount'				=> round(($this->Isotope->Cart->grandTotal * 100)),
			'trx_currency'				=> $this->Isotope->Config->currency,
			'redirect_url'				=> $this->Environment->base . IsotopeFrontend::addQueryStringToUrl('uid=' . $objOrder->uniqid, $this->addToUrl('step=complete', true)),
			'redirect_action'			=> 'POST',
			'trx_paymenttyp'			=> 'cc',
			'shopper_id'				=> $objOrder->id
		);
		
		$objTemplate = new FrontendTemplate('iso_payment_ipayment');

		$objTemplate->action = 'https://ipayment.de/merchant/' . $this->ipayment_account_id . '/processor/2.0/';
		$objTemplate->params = $arrParam;
		$objTemplate->submitLabel = $GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'];
		$objTemplate->id = $this->id;

		return $objTemplate->parse();
	}

}

?>