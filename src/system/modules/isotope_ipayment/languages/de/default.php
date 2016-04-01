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

// Basisparameter
// Parameter zur Identifikation des ipayment-Accounts
$GLOBALS['TL_LANG']['MSC']['ipayment_trxuser_id'] = 'Anwendungs-ID';
// Parameter für Betrag und Währung
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_currency'] = 'Währung';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_amount'] = 'Betrag';
// Parameter zur Angabe der gewünschten Zahlung
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_typ'] = 'Transaktionstyp';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymenttyp'] = 'Zahlungsart';
// Parameter für Name und Adresse des Karteninhabers
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_name'] = 'Name';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_email'] = 'E-Mail';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street'] = 'Straße 1';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_city'] = 'Stadt';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_zip'] = 'Postleitzahl';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_country'] = 'Land';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_street2'] = 'Straße 2';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_state'] = 'Staat';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefon'] = 'Telefon';
$GLOBALS['TL_LANG']['MSC']['ipayment_addr_telefax'] = 'Fax';
// Parameter zur Kennzeichnung von Transaktionen
$GLOBALS['TL_LANG']['MSC']['ipayment_shopper_id'] = 'Shopper-ID';

// Rückgabeparameter Zahlungsabwicklung
// Rückgabeparameter zum Transaktionsergebnis
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_status'] = 'Transaktionsergebnis-Status der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_errorcode'] = 'Fehlercode der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_fatalerror'] = 'Ist ein technischer Fehler oder eine Ablehung aufgrund der Zahlungsdaten aufgetreten?';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_errormsg'] = 'Fehlermeldung';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_additionalmsg'] = 'Zusätzliche Fehlerinformationen';
// Rückgabeparameter zu erfolgreichen Transaktionen
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transdate'] = 'Datum der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_transtime'] = 'Uhrzeit der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_trx_number'] = 'Eindeutige Buchungsnummer/Transaktionsnummer der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_authcode'] = 'Autorisierungsnummer der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_param_checksum'] = 'Checksumme der CGI-Rückgabeparameter';
// Weitere Rückgabeparameter
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentdata_country'] = 'Land der Zahlungsdaten der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_remoteip_country'] = 'Land der verwendeten IP der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_ret_ip'] = 'Verwendete IP der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_trx_paymentmethod'] = 'Zahlungsmedium der Transaktion';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_cardowner'] = 'Inhaber der Kreditkarte';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_number'] = 'Maskierte Nummer der Kreditkarte';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_expdate'] = 'Gültigkeitsdatum der Kreditkarte';
$GLOBALS['TL_LANG']['MSC']['ipayment_paydata_cc_typ'] = 'Typ der Kreditkarte';

/**
 * Payment methods
 */
$GLOBALS['TL_LANG']['MODEL']['tl_iso_payment.ipayment'] = array('ipayment', 'Schnittstelle zum Bezahlsystem <a href="http://ipayment.de" target="_blank">ipayment</a> von 1&1. Unterstützt verschiedene Kreditkarten. Der Shop wird sofort über erfolgreiche Transaktionen informiert.');
