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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_account_id'] = array('Account Id', 'ID of your ipayment account.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_trxuser_id'] = array('Application Id', 'The application ID for this shop. Every account can manage multiple applications.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_trxpassword'] = array('Application Password', 'Every application has its own application password.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_security_key'] = array('Security Key', 'With the optional security key you can protect transactions.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_advanced_strict_id_check'] = array('Use advanced strict id check', 'Advanced check to avoid double transactions. If checked every transaction is marked with an unique order number and ipayment check this before payment.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_use_hidden_trigger'] = array('Use hidden trigger', 'If checked transaction result is trigger by an other URL than the redirect URL used for clients return to shop. This guarantee that the transaction is obtained if client do not retun to shop after payment.');

?>