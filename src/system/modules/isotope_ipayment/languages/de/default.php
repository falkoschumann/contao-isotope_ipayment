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
$GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'] = 'Bezahlen';
// TODO Übersetzungen prüfen und evtl. erweitern
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transdate'] = 'Datum der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transtime'] = 'Zeitpunkt der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_trx_number'] = 'Eindeutige Buchungsnummer';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_authcode'] = 'Autorisierungsnummer der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_ip'] = 'Verwendete IP der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentdata_country'] = 'Land der Zahlungsdaten der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_remoteip_country'] = 'Land der verwendeten IP der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentmethod'] = 'Zahlungsmedium der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_name'] = 'Name';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_email'] = 'E-Mail';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street'] = 'Straße 1';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street2'] = 'Straße 2';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_city'] = 'Stadt';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_zip'] = 'Postleitzahl';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_country'] = 'Land';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_state'] = 'Staat';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefon'] = 'Telefon';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefax'] = 'Fax';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_cardowner'] = 'Karteninhaber';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_number'] = 'Kartennummer (maskiert)';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_expdate'] = 'Gültigkeitsdatum der Karte';

/**
 * Payment methods
 */
$GLOBALS['TL_LANG']['MODEL']['tl_iso_payment.ipayment'] = array('ipayment', 'Schnittstelle zum Bezahlsystem <a href="http://ipayment.de" target="_blank">ipayment</a> von 1&1. Unterstützt verschiedene Kreditkarten. Der Shop wird sofort über erfolgreiche Transaktionen informiert.');
