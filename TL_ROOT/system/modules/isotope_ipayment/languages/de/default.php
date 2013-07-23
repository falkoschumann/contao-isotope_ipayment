<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Isotope ipayment Extension for Contao
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
 * @copyright  2013, Falko Schumann <http://www.muspellheim.de>
 * @author     Falko Schumann <falko.schumann@muspellheim.de> 
 * @package    IsotopeIpayment 
 * @license    BSD-2-Clause 
 * @filesource
 */


/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'] = 'Bezahlen';
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
 * Payment
 */
$GLOBALS['ISO_LANG']['PAY']['ipayment'] = array('ipayment (1&1)', 'Schnittstelle zum Bezahlsystem ipayment von 1&1. Unterstützt verschiedene Kreditkarten. Der Shop wird sofort über erfolgreiche Transaktionen informiert.');


?>