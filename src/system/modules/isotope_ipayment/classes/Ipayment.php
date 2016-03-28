<?php

/**
 * Isotope ipayment Extension for Contao
 *
 * Copyright (c) 2016 Falko Schumann
 *
 * @license MIT
 */

namespace IsotopeIpayment;

use Isotope\Interfaces\IsotopePayment;
use Isotope\Interfaces\IsotopePostsale;
use Isotope\Interfaces\IsotopeProductCollection;
use Isotope\Model\Payment;
use Isotope\Model\ProductCollection\Order;

/**
 * Payment method ipayment for Isotope.
 *
 * @author Falko Schumann <falko.schumann@muspellheim.de>
 * @property int    $ipayment_account_id
 * @property int    $ipayment_trxuser_id
 * @property int    $ipayment_trxpassword
 * @property string $ipayment_security_key
 * @property bool   $ipayment_advanced_strict_id_check
 * @property bool   $ipayment_use_hidden_trigger
 */
class Ipayment extends Payment implements IsotopePayment, IsotopePostsale
{

    private $currencies = array(
        'AED' => 2,
        'AFN' => 2,
        'ALL' => 2,
        'AMD' => 2,
        'ANG' => 2,
        'AOA' => 2,
        'ARS' => 2,
        'AUD' => 2,
        'AWG' => 2,
        'AZN' => 2,
        'BAM' => 2,
        'BBD' => 2,
        'BDT' => 2,
        'BGN' => 2,
        'BHD' => 2,
        'BIF' => 2,
        'BMD' => 2,
        'BND' => 2,
        'BOB' => 2,
        'BOV' => 2,
        'BRL' => 2,
        'BSD' => 2,
        'BTN' => 2,
        'BWP' => 2,
        'BYR' => 2,
        'BZD' => 2,
        'CAD' => 2,
        'CDF' => 2,
        'CHE' => 2,
        'CHF' => 2,
        'CHW' => 2,
        'CLF' => 2,
        'CLP' => 2,
        'CNY' => 2,
        'COP' => 2,
        'COU' => 2,
        'CRC' => 2,
        'CSD' => 2,
        'CUP' => 2,
        'CVE' => 2,
        'CYP' => 2,
        'CZK' => 2,
        'DJF' => 2,
        'DKK' => 2,
        'DOP' => 2,
        'DZD' => 2,
        'EEK' => 2,
        'EGP' => 2,
        'ERN' => 2,
        'ETB' => 2,
        'EUR' => 2,
        'FJD' => 2,
        'FKP' => 2,
        'GBP' => 2,
        'GEL' => 2,
        'GHC' => 2,
        'GIP' => 2,
        'GMD' => 2,
        'GNF' => 2,
        'GTQ' => 2,
        'GWP' => 2,
        'GYD' => 2,
        'HKD' => 2,
        'HNL' => 2,
        'HRK' => 2,
        'HTG' => 2,
        'HUF' => 0,
        'IDR' => 0,
        'ILS' => 2,
        'INR' => 2,
        'IQD' => 2,
        'IRR' => 2,
        'ISK' => 2,
        'JMD' => 2,
        'JOD' => 2,
        'JPY' => 0,
        'KES' => 2,
        'KGS' => 2,
        'KHR' => 2,
        'KMF' => 2,
        'KPW' => 2,
        'KRW' => 0,
        'KWD' => 2,
        'KYD' => 2,
        'KZT' => 2,
        'LAK' => 2,
        'LBP' => 2,
        'LKR' => 2,
        'LRD' => 2,
        'LSL' => 2,
        'LTL' => 2,
        'LVL' => 2,
        'LYD' => 2,
        'MAD' => 2,
        'MDL' => 2,
        'MGA' => 2,
        'MKD' => 2,
        'MLF' => 2,
        'MMK' => 2,
        'MNT' => 2,
        'MOP' => 2,
        'MRO' => 2,
        'MTL' => 2,
        'MUR' => 2,
        'MVR' => 2,
        'MWK' => 2,
        'MXN' => 2,
        'MXV' => 2,
        'MYR' => 2,
        'MZN' => 2,
        'NAD' => 2,
        'NGN' => 2,
        'NIO' => 2,
        'NOK' => 2,
        'NPR' => 2,
        'NZD' => 2,
        'OMR' => 2,
        'PAB' => 2,
        'PEN' => 2,
        'PGK' => 2,
        'PHP' => 2,
        'PKR' => 2,
        'PLN' => 2,
        'PYG' => 2,
        'QAR' => 2,
        'ROL' => 2,
        'RON' => 2,
        'RUB' => 2,
        'RWF' => 2,
        'SAR' => 2,
        'SBD' => 2,
        'SCR' => 2,
        'SDD' => 2,
        'SEK' => 2,
        'SGD' => 2,
        'SHP' => 2,
        'SKK' => 2,
        'SLL' => 2,
        'SOS' => 2,
        'SRD' => 2,
        'STD' => 2,
        'SVC' => 2,
        'SYP' => 2,
        'SZL' => 2,
        'THB' => 2,
        'TJS' => 2,
        'TMM' => 2,
        'TND' => 2,
        'TOP' => 2,
        'TRY' => 2,
        'TTD' => 2,
        'TWD' => 2,
        'TZS' => 2,
        'UAH' => 2,
        'UGX' => 2,
        'USD' => 2,
        'USN' => 2,
        'USS' => 2,
        'UYU' => 2,
        'UZS' => 2,
        'VEB' => 2,
        'VND' => 2,
        'VUV' => 2,
        'WST' => 2,
        'XAF' => 2,
        'XCD' => 2,
        'XDR' => 2,
        'XOF' => 2,
        'XPF' => 2,
        'YER' => 2,
        'ZAR' => 2,
        'ZMK' => 2,
        'ZWD' => 2,  
    );
    
    /**
     * Return a html form for checkout or false
     *
     * @param   IsotopeProductCollection $objOrder The order being places
     * @param   \Module $objModule The checkout module instance
     * @return  mixed
     */
    public function checkoutForm(IsotopeProductCollection $objOrder, \Module $objModule)
    {
        $arrParam = $this->getParameterZurZahlungsabwicklung($objOrder, $objModule);
        return $this->createFormularZurUebermittlungDerZahlungsparameter($arrParam);
    }

    private function getParameterZurZahlungsabwicklung(IsotopeProductCollection &$objOrder, \Module &$objModule)
    {
        // TODO Notwendige Parameter (Abschnitt 5.9) prüfen
        $arrParam = $this->getBasisparameter($objOrder, $objModule);
        $this->addZahlungsdaten($arrParam);
        $this->addGesicherteRueckmeldungErfolgreicherTransaktionen($arrParam);
        $this->addSessionIdsVorgenerieren($arrParam);
        return $arrParam;
    }

    private function getBasisparameter(IsotopeProductCollection &$objOrder, \Module &$objModule)
    {
        $arrParam = array();
        $this->addParameterZurIdentifikationDesIpaymentAccounts($arrParam);
        $this->addParameterFuerBetragUndWaehrung($objOrder, $arrParam);
        $this->addParameterZurAngabeDerGewuenschtenZahlung($arrParam);
        $this->addParameterFuerNameUndAdresseDesKarteninhabers($objOrder, $arrParam);
        $this->addParameterZurKennzeichnungVonTransaktionen($objOrder, $arrParam);
        $this->addParameterZurReferenzierungDerTransaktion($arrParam);
        $this->addParameterFuerRueckspruengeInDenShop($objOrder, $objModule, $arrParam);
        $this->addParameterFuerDieDurchfuehrungDerSicherheitspruefungen($arrParam);
        $this->addParameterFuerEinstellungenDesZahlungssystems($arrParam);
        $this->addParameterFuerDieIntegrationInShopSysteme($arrParam);
        $this->addWeitereParameter($objOrder, $arrParam);
        return $arrParam;
    }

    private function addParameterZurIdentifikationDesIpaymentAccounts(array &$arrParam)
    {
        if ($this->debug) {
            $trxuser_id = empty($this->ipayment_security_key) ? 99999 : 99998;
            $trxpassword = 0;
        } else {
            $trxuser_id = $this->ipayment_trxuser_id;
            $trxpassword = $this->ipayment_trxpassword;
        }
        $arrParam['trxuser_id'] = (int) $trxuser_id;
        $arrParam['trxpassword'] = (int) $trxpassword;
    }

    private function addParameterFuerBetragUndWaehrung(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        if (!isset($this->currencies[$objOrder->currency])) {
            throw new Exception("Unknown currency " . $objOrder->currency);
        }

        $arrParam['trx_currency'] = substr($objOrder->currency, 0, 3);
        $arrParam['trx_amount'] = (int) round(($objOrder->getTotal() * pow(10, $this->currencies[$objOrder->currency])));
    }

    private function addParameterZurAngabeDerGewuenschtenZahlung(array &$arrParam)
    {
        $arrParam['trx_typ'] = 'auth';
        // TODO Zahlungsart variabel machen
        $arrParam['trx_paymenttyp'] = 'cc';
    }

    private function addParameterFuerNameUndAdresseDesKarteninhabers(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        $objBillingAddress = $objOrder->getBillingAddress();
        $arrParam['addr_name'] = substr($objBillingAddress->firstname . ' ' . $objBillingAddress->lastname, 0, 100);
        $arrParam['addr_email'] = substr($objBillingAddress->email, 0, 80);
        $arrParam['addr_street'] = substr($objBillingAddress->street_1, 0, 255);
        $arrParam['addr_city'] = substr($objBillingAddress->city, 0, 50);
        $arrParam['addr_zip'] = substr($objBillingAddress->postal, 0, 20);
        $arrParam['addr_country'] = strtoupper(substr($objBillingAddress->country, 0, 3));
        // TODO Korrektheit der Angabe des Staates prüfen
        $arrParam['addr_state'] = strtoupper(substr($objBillingAddress->subdivision, 2));
    }

    private function addParameterZurKennzeichnungVonTransaktionen(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        $arrParam['shopper_id'] = substr($objOrder->uniqid, 0, 255);
        $arrParam['advanced_strict_id_check'] = $this->ipayment_advanced_strict_id_check ? 1 : 0;
    }

    private function addParameterZurReferenzierungDerTransaktion(array &$arrParam)
    {
        // Wird nicht verwendet.
    }

    private function addParameterFuerRueckspruengeInDenShop(IsotopeProductCollection &$objOrder, \Module &$objModule, array &$arrParam)
    {
        $arrParam['redirect_url'] = substr(\Environment::get('base') . $objModule->generateUrlForStep('complete', $objOrder), 0, 255);
        $arrParam['redirect_action'] = 'POST';
    }

    private function addParameterFuerDieDurchfuehrungDerSicherheitspruefungen(array &$arrParam)
    {
        $arrParam['check_double_trx'] = 1;
    }

    private function addParameterFuerEinstellungenDesZahlungssystems(array &$arrParam)
    {
        // TODO Ist das wirklich notwendig?
        $arrParam['return_paymentdata_details'] = 1;
    }

    private function addParameterFuerDieIntegrationInShopSysteme(array &$arrParam)
    {
        // Wird nicht verwendet.
    }

    private function addWeitereParameter(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        if (empty($this->ipayment_security_key)) {
            return;
        }

        if (!isset($this->currencies[$objOrder->currency])) {
            throw new Exception("Unknown currency " . $objOrder->currency);
        }

        $amount = round(($objOrder->getTotal() * pow(10, $this->currencies[$objOrder->currency])));
        $arrParam['trx_securityhash'] = md5(
            $this->ipayment_trxuser_id .
            $amount .
            $objOrder->currency .
            $this->ipayment_trxpassword .
            ($this->debug ? 'testtest' : $this->ipayment_security_key));
    }

    private function addZahlungsdaten(array &$arrParam)
    {
        // Parameter für Kredit- und Debitkartenzahlungen
        // Parameter für ELV-Zahlungen
        // Parameter für Prepaid-Zahlungen

        // Zahlungsdaten im Shop zu erfassen sind im normalen CGI-Modus nicht sinnvoll.
    }

    private function addGesicherteRueckmeldungErfolgreicherTransaktionen(array &$arrParam)
    {
        $this->addParameterFuerDieGesicherteRueckmeldung($arrParam);
    }

    private function addParameterFuerDieGesicherteRueckmeldung(array &$arrParam)
    {
        if ($this->ipayment_use_hidden_trigger) {
            $arrParam['hidden_trigger_url'] = substr(\Environment::get('base') . 'system/modules/isotope/postsale.php?mod=pay&id=' . $this->id, 0, 255);
        }
    }

    private function addSessionIdsVorgenerieren(array &$arrParam)
    {
        $this->addParameterFuerDieNutzungEinerVorgeneriertenSession($arrParam);
    }

    private function addParameterFuerDieNutzungEinerVorgeneriertenSession(array &$arrParam)
    {
        // Wird nicht verwendet.
    }

    private function createFormularZurUebermittlungDerZahlungsparameter(array &$arrParam)
    {
        $objTemplate = new \FrontendTemplate('iso_payment_ipayment');
        $objTemplate->action = 'https://ipayment.de/merchant/' . ($this->debug ? '99999' : $this->ipayment_account_id) . '/processor/2.0/';
        $objTemplate->params = $arrParam;
        $objTemplate->submitLabel = $GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'];
        $objTemplate->id = $this->id;
        $objTemplate->debug = $this->debug;
        return $objTemplate->parse();
    }

    /**
     * Process payment on checkout confirmation page.
     *
     * @param   IsotopeProductCollection $objOrder The order being places
     * @param   \Module $objModule The checkout module instance
     * @return  mixed
     */
    public function processPayment(IsotopeProductCollection $objOrder, \Module $objModule)
    {
        if (!$this->validateRueckgabeparameterZahlungsabwicklung($objOrder)) {
            return false;
        }

        if (!$objOrder->checkout()) {
            \System::log('ipayment: checkout for Order ID "' . $objOrder->id . '" failed', __METHOD__, TL_ERROR);
            return false;
        }

        $objOrder->updateOrderStatus($this->new_order_status);
        $objOrder->save();

        \System::log('ipayment: checkout for Order ID "' . $objOrder->id . '" successful', __METHOD__, TL_ERROR);
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
        if (empty($this->ipayment_security_key)) {
            return true;
        }

        $amount = round(($objOrder->getTotal() * pow(10, $this->currencies[$objOrder->currency])));
        $hash = md5($this->ipayment_trxuser_id .
            $amount .
            $objOrder->currency .
            $_POST['ret_authcode'] .
            $_POST['ret_trx_number'] .
            ($this->debug ? 'testtest' : $this->ipayment_security_key));
        if ($_POST['ret_param_checksum'] != $hash) {
            \System::log('ipayment: checkout manipulation detected in payment for order ID ' . $objOrder->id . '!', __METHOD__, TL_ERROR);
            return false;
        }

        return true;
    }

    private function validateWeitereRueckgabeparameter(IsotopeProductCollection &$objOrder)
    {
        $arrPayment = array();
        $arrPayment['ret_ip'] = $_POST['ret_ip'];
        $arrPayment['trx_paymentmethod'] = $_POST['trx_paymentmethod'];
        foreach ($_POST as $key => $value) {
            if (substr($key, 0, 8) === "paydata_") {
                $arrPayment[$key] = $value;
            }
        }
        $objOrder->payment_data = $arrPayment;
        return true;
    }

    /**
     * Process post-sale requests.
     *
     * This function can be called from the postsale.php file when the payment server is requestion/posting a status change.
     * You can see an implementation example in Isotope\Payment\Postsale
     */
    public function processPostsale(IsotopeProductCollection $objOrder)
    {
        // TODO: Implement processPostsale() method.
/*
        $remoteIp = $_SERVER['REMOTE_ADDR'];
        $remoteHostname = $_SERVER['REMOTE_HOST']; // gethostbyaddr($remoteIp);
        if (preg_match('/\.ipayment\.de$/', $remoteHostname)
            && in_array($remoteIp, array('212.227.34.218', '212.227.34.219', '212.227.34.220')))
            return;

        throw new Exception('Payment for order ID ' . $objOrder->id . ' was not from ipayment.de:' .
            ' IP=' . $remoteIp .
            ', hostname=' . $remoteHostname);
*/
    }

    /**
     * Get the order object in a postsale request
     *
     * @return  IsotopeProductCollection
     */
    public function getPostsaleOrder()
    {
        // TODO: Implement getPostsaleOrder() method.
    }

    /**
     * Return information or advanced features in the backend.
     *
     * Use this function to present advanced features or basic payment information for an order in the backend.
     * @param integer $orderId Order ID
     * @return string
     */
    public function backendInterface($orderId)
    {
        if (($objOrder = Order::findByPk($orderId)) === null) {
            return parent::backendInterface($orderId);
        }

        $arrPayment = deserialize($objOrder->payment_data, true);
        if (count($arrPayment) == 0) {
            return parent::backendInterface($orderId);
        }

        $i = 0;

        $strBuffer = '
<div id="tl_buttons">
<a href="' . ampersand(str_replace('&key=payment', '', \Environment::get('request'))) . '" class="header_back" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['backBT']) . '">' . $GLOBALS['TL_LANG']['MSC']['backBT'] . '</a>
</div>

<h2 class="sub_headline">' . $this->name . ' (' . $GLOBALS['TL_LANG']['MODEL']['tl_iso_payment.ipayment'][0] . ')' . '</h2>

<div id="tl_soverview">
<div id="tl_messages">
</div>
</div>

<table class="tl_show">
  <tbody>';

        foreach ($arrPayment as $k => $v) {
            if (is_array($v))
                continue;

            $strBuffer .= '
  <tr>
    <td' . ($i % 2 ? '' : ' class="tl_bg"') . '><span class="tl_label">' . (isset($GLOBALS['TL_LANG']['MSC']['ipayment_' . $k]) ? $GLOBALS['TL_LANG']['MSC']['ipayment_' . $k] : $k) . ': </span></td>
    <td' . ($i % 2 ? '' : ' class="tl_bg"') . '>' . $v . '</td>
  </tr>';

            ++$i;
        }

        $strBuffer .= '
</tbody></table>
</div>';
        return $strBuffer;
    }

}
