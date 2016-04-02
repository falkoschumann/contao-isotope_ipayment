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
use Isotope\Model\Payment\Postsale;
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
class Ipayment extends Postsale implements IsotopePayment, IsotopePostsale
{

    public $currencies = array(
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
     * @param   IsotopeProductCollection $objOrder   The order being places
     * @param   \Module                  $objModule  The checkout module instance
     * @return  mixed
     */
    public function checkoutForm(IsotopeProductCollection $objOrder, \Module $objModule)
    {
        $delegate = new CheckoutFormDelegate($this);
        $arrParam = $delegate->getParameterZurZahlungsabwicklung($objOrder, $objModule);
        return $delegate->createFormularZurUebermittlungDerZahlungsparameter($arrParam);
    }

    /**
     * Show message while we are waiting for server-to-server order confirmation
     *
     * @param   IsotopeProductCollection $objOrder    The order being places
     * @param   \Module                  $objModule   The checkout module instance
     * @return  bool
     */
    public function processPayment(IsotopeProductCollection $objOrder, \Module $objModule)
    {
        if ($this->ipayment_use_hidden_trigger) {
            return parent::processPayment($objOrder, $objModule);
        }

        $delegate = new PaymentProcessorDelegate($this);
        return $delegate->processPayment($objOrder);
    }

    /**
     * Process post-sale requests.
     *
     * This function can be called from the postsale.php file when the payment server is requestion/posting a status change.
     * You can see an implementation example in Isotope\Payment\Postsale
     */
    public function processPostsale(IsotopeProductCollection $objOrder)
    {
        $delegate = new PaymentProcessorDelegate($this);
        if ($delegate->validateIpaymentServer($objOrder)) {
            $delegate->processPayment($objOrder);
        }
    }

    /**
     * Get the order object in a postsale request
     *
     * @return  IsotopeProductCollection
     */
    public function getPostsaleOrder()
    {
        $orderId = $_POST['shopper_id'];
        return Order::findOneBy('uniqid', $orderId);
    }

    /**
     * Return information or advanced features in the backend.
     *
     * Use this function to present advanced features or basic payment information for an order in the backend.
     * @param    integer   $orderId    Order ID
     * @return   string
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
