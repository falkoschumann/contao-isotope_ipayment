<?php

/**
 * Isotope ipayment Extension for Contao
 *
 * Copyright (c) 2016 Falko Schumann
 *
 * @license MIT
 */

namespace IsotopeIpayment;

use Isotope\Interfaces\IsotopeProductCollection;

class PaymentProcessorDelegate
{

    /**
     * @var Ipayment
     */
    private $delegator;

    public function __construct(Ipayment $delegator)
    {
        $this->delegator = $delegator;
    }

    public function processPayment(IsotopeProductCollection &$objOrder)
    {
        if (!$this->validateRueckgabeparameterZahlungsabwicklung($objOrder)) {
            return false;
        }

        if (!$objOrder->checkout()) {
            \System::log('ipayment: checkout for Order ID "' . $objOrder->id . '" failed', __METHOD__, TL_ERROR);
            return false;
        }

        $objOrder->updateOrderStatus($this->delegator->new_order_status);
        $objOrder->save();

        \System::log('ipayment: checkout for Order ID "' . $objOrder->id . '" completed', __METHOD__, TL_GENERAL);
        return true;
    }

    private function validateRueckgabeparameterZahlungsabwicklung(IsotopeProductCollection &$objOrder)
    {
        $result = $this->validateRueckgabeparameterZumTransaktionsergebnis($objOrder);
        $result &= $this->validateRueckgabeparameterZuErfolgreichenTransaktionen($objOrder);
        $result &= $this->validateWeitereRueckgabeparameter($objOrder);
        return $result;
    }

    private function validateRueckgabeparameterZumTransaktionsergebnis(IsotopeProductCollection &$objOrder)
    {
        $retStatus = $_POST['ret_status'];
        if ($retStatus == 'SUCCESS') {
            \System::log('ipayment: payment for Order ID ' . $objOrder->id . ' returned successfully.', __METHOD__, TL_GENERAL);
            return true;
        }

        $retErrorcode = $_POST['ret_errorcode'];
        $retFatalerror = $_POST['ret_fatalerror'];
        $retErrormsg = $_POST['ret_errormsg'];
        $retAdditionalmsg = $_POST['ret_additionalmsg'];
        \System::log('ipayment: payment for order ID ' . $objOrder->id . ' does not returned successfully: ' .
            'return status= ' . $retStatus .
            ', error code=' . $retErrorcode .
            ', fatal error=' . ($retFatalerror ? 'yes' : 'no') .
            ', error message=' . $retErrormsg .
            ', additional message=' . $retAdditionalmsg, __METHOD__, TL_ERROR);
        return false;
    }

    private function validateRueckgabeparameterZuErfolgreichenTransaktionen(IsotopeProductCollection &$objOrder)
    {
        if (empty($this->delegator->ipayment_security_key)) {
            return true;
        }

        $amount = round(($objOrder->getTotal() * pow(10, $this->delegator->currencies[$objOrder->currency])));
        $hash = md5($this->delegator->ipayment_trxuser_id .
            $amount .
            $objOrder->currency .
            $_POST['ret_authcode'] .
            $_POST['ret_trx_number'] .
            $this->delegator->ipayment_security_key);
        if ($_POST['ret_param_checksum'] != $hash) {
            \System::log('ipayment: checkout manipulation detected in payment for order ID ' . $objOrder->id . '!', __METHOD__, TL_ERROR);
            return false;
        }

        return true;
    }

    private function validateWeitereRueckgabeparameter(IsotopeProductCollection &$objOrder)
    {
        $objOrder->payment_data = $_POST;
        return true;
    }

    public function validateIpaymentServer(IsotopeProductCollection &$objOrder)
    {
        $remoteIp = $_SERVER['REMOTE_ADDR'];
        $remoteHostname = gethostbyaddr($remoteIp);
        if (preg_match('/\.ipayment\.de$/', $remoteHostname)
            && in_array($remoteIp, array('212.227.34.218', '212.227.34.219', '212.227.34.220')))
            return true;

        \System::log('Payment for order ID ' . $objOrder->id . ' was not from ipayment.de: ' .
            'IP=' . $remoteIp .
            ', hostname=' . $remoteHostname, __METHOD__, TL_ERROR);
        return false;
    }

}
