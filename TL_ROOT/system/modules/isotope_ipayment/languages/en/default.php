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
 * Payment
 */
$GLOBALS['ISO_LANG']['PAY']['ipayment'] = array('ipayment (1&1)', 'Payment gateway for the 1&1 ipayment payment system that supports various card types. The store will be instantly notified about successfull transactions.');


?>