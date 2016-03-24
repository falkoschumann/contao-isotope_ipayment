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
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_account_id'] = array('Account Id', 'ID of your ipayment account.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxuser_id'] = array('Application Id', 'The application ID for this shop. Every account can manage multiple applications.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxpassword'] = array('Application Password', 'Every application has its own application password.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_security_key'] = array('Security Key', 'With the optional security key you can protect transactions.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_advanced_strict_id_check'] = array('Use advanced strict id check', 'Advanced check to avoid double transactions. If checked every transaction is marked with an unique order number and ipayment check this before payment.');
$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_use_hidden_trigger'] = array('Use hidden trigger', 'If checked transaction result is trigger by an other URL than the redirect URL used for clients return to shop. This guarantee that the transaction is obtained if client do not retun to shop after payment.');

?>