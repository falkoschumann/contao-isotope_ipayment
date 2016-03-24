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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_account_id'] = array('Account-ID', 'Die ID Ihres ipayment-Accounts.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxuser_id'] = array('Anwendungs-ID', 'Die Anwendungs-ID für den Shop. Über einen Account können mehrere Anwendungen verwaltet werden.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxpassword'] = array('Anwendungspasswort', 'Jede Anwendung verfügt über ein eigenes ein Anwendungspasswort');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_security_key'] = array('Security-Key', 'Mit Hilfe des optionalen Security-Keys kann eine Transaktion zusätzlich abgesichert werden.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_advanced_strict_id_check'] = array('Erweiterte Prüfung zur Vermeidung von Doppeltransaktionen durchführen?', 'Ist diese Prüfung aktiviert, wird für jeder Transaktion eine eindeutige Buchungsnummer zugeordnet, die von ipayment vor der Bezahlung geprüft wird.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_use_hidden_trigger'] = array('Hidden-Trigger verwenden', 'Bei Aktivierung wird das Ergebnis der Transaktion von ipayment über eine gesonderte URL an den Shop übermittelt. Damit wird die Transaktion auch dann berücksichtigt, wenn der Kunde nach Bezahlung nicht zum Shop zurückgelangt.');

?>