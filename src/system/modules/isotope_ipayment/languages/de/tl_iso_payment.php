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
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_account_id'] = array('Account-ID', 'Die ID Ihres ipayment-Accounts.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_trxuser_id'] = array('Anwendungs-ID', 'Die Anwendungs-ID für den Shop. Über einen Account können mehrere Anwendungen verwaltet werden.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_trxpassword'] = array('Anwendungspasswort', 'Jede Anwendung verfügt über ein eigenes ein Anwendungspasswort');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_security_key'] = array('Security-Key', 'Mit Hilfe des optionalen Security-Keys kann eine Transaktion zusätzlich abgesichert werden.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_advanced_strict_id_check'] = array('Erweiterte Prüfung zur Vermeidung von Doppeltransaktionen durchführen', 'Ist diese Prüfung aktiviert, wird für jeder Transaktion eine eindeutige Buchungsnummer zugeordnet, die von ipayment vor der Bezahlung geprüft wird.');
$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_use_hidden_trigger'] = array('Hidden-Trigger verwenden', 'Bei Aktivierung wird das Ergebnis der Transaktion von ipayment über eine gesonderte URL an den Shop übermittelt. Damit wird die Transaktion auch dann berücksichtigt, wenn der Kunde nach Bezahlung nicht zum Shop zurückgelangt.');
