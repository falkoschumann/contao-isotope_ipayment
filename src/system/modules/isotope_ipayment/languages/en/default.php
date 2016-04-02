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
$GLOBALS['TL_LANG']['MSC']['ipayment_redirect_description'] = 'You will automatically be redirected to the website of our payment service to pay. If the forwarding does not happen automatically, please click on <em>Pay</em>.';
$GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'] = 'Pay';

// Basisparameter
// Parameter zur Identifikation des ipayment-Accounts
$GLOBALS['TL_LANG']['MSC']['ipayment_trxuser_id'] = 'Application Id';
// Parameter für Betrag und Währung
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_currency'] = 'Currency';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_amount'] = 'Amount';
// Parameter zur Angabe der gewünschten Zahlung
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_typ'] = 'Transaction Type';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymenttyp'] = 'Payment Type';
// Parameter für Name und Adresse des Karteninhabers
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_name'] = 'Name';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_email'] = 'Email';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street'] = 'Street 1';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_city'] = 'City';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_zip'] = 'Postal Code';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_country'] = 'Country';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street2'] = 'Street 2';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_state'] = 'State';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefon'] = 'Telefon';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefax'] = 'Telefax';
// Parameter zur Kennzeichnung von Transaktionen
$GLOBALS['TL_LANG']['MSC']['ipayment_shopper_id'] = 'Shopper Id';

// Rückgabeparameter Zahlungsabwicklung
// Rückgabeparameter zum Transaktionsergebnis
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_status'] = 'Transaction Return Status';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_errorcode'] = 'Transaction Error Code';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_fatalerror'] = 'Fatal Error?';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_errormsg'] = 'Error Message';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_additionalmsg'] = 'Additional Message';
// Rückgabeparameter zu erfolgreichen Transaktionen
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transdate'] = 'Transaction Date';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transtime'] = 'Transaction Time';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_trx_number'] = 'Unique Transaction Number';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_authcode'] = 'Authorisation Number of Transaction';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_param_checksum'] = 'Checksum of CGI return parameters';
// Weitere Rückgabeparameter
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentdata_country'] = 'State of Payment Data';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_remoteip_country'] = 'State of used IP';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_ip'] = 'Used IP of Transaction';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentmethod'] = 'Payment Method';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_cardowner'] = 'Card Owner';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_number'] = 'Card Number (masked)';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_expdate'] = 'Expire Date of Card';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_typ'] = 'Card Type';

/**
 * Payment methods
 */
$GLOBALS['TL_LANG']['MODEL']['tl_iso_payment.ipayment'] = array('ipayment', 'Payment gateway for the 1&1 <a href="http://ipayment.de" target="_blank">ipayment</a> payment system that supports various card types. The store will be instantly notified about successful transactions.');
