<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Isotope ipayment
 * Copyright (c) 2013, Muspellheim.de
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
 * @copyright  Muspellheim.de 2013 
 * @author     Falko Schumann <falko.schumann@muspellheim.de> 
 * @package    IsotopeIpayment 
 * @license    BSD-2-Clause 
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_account_id'] = array('Account-ID', 'ID des verwendeten ipayment-Accounts. Sie finden diesen Wert in Ihrem ipayment- Konfigurationsmenü unter Allgemeine Daten.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxuser_id'] = array('Anwendungs-ID', 'Die Anwendungs-ID ist gemeinsam mit der Account-ID die eindeutige Bezeichnung des Händ- lers. Innerhalb eines Accounts können Sie mehrere Anwendungen anlegen und benutzen, zum Beispiel um ipayment an mehrere Shops anzubinden. Die Anwendungs-ID können Sie in Ihrem ipayment-Konfigurationsmenü unter Anwendung > Details auslesen.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxpassword'] = array('Anwendungspasswort', 'Für jede Anwendung gibt es ein Anwendungspasswort, das automatisch vom ipayment- System vergeben wird. Das Passwort besteht aus Zahlen. Sie finden das Anwendungspasswort in Ihrem ipayment-Konfigurationsmenü unter Anwendungen > Details. Dieser Wert ist aus- schließlich für die Abwicklung von Transaktionen nötig. Ein Login in das ipayment- Konfigurationsmenü ist mit diesem Passwort nicht möglich.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_security_key'] = array('Security-Key', 'Transaktions-Security-Key, der im ipayment-Konfigurationsmenü unter Anwendung festgelegt wird.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_use_hidden_trigger'] = array('Hidden-Trigger verwenden', '');

?>