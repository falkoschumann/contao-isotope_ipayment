<?php

/**
 * Isotope ipayment Extension for Contao
 *
 * Copyright (c) 2016 Falko Schumann
 *
 * @package IsotopeIpayment
 * @author  Falko Schumann <falko.schumann@muspellheim.de>
 * @license MIT
 */

/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'] = 'Pay';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transdate'] = 'Transaction date';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transtime'] = 'Transaction time';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_trx_number'] = 'Unique transaction number';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_authcode'] = 'Authorisation number of transaction';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_ip'] = 'Used IP of transaction';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentdata_country'] = 'State of payment data';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_remoteip_country'] = 'State of used IP';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentmethod'] = 'Payment method';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_name'] = 'Name';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_email'] = 'Email';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street'] = 'Street 1';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street2'] = 'Street 2';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_city'] = 'City';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_zip'] = 'Postal code';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_country'] = 'Country';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_state'] = 'State';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefon'] = 'Telefon';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefax'] = 'Telefax';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_cardowner'] = 'Card owner';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_number'] = 'Card number (masked)';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_expdate'] = 'Expire date of card';

/**
 * Payment methods
 */
$GLOBALS['TL_LANG']['MODEL']['tl_iso_payment.ipayment'] = array('ipayment', 'Payment gateway for the 1&1 <a href="http://ipayment.de" target="_blank">ipayment</a> payment system that supports various card types. The store will be instantly notified about successful transactions.');
