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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['palettes']['ipayment'] = '{type_legend},name,label,type;{note_legend:hide},note;{config_legend},new_order_status,minimum_total,maximum_total,countries,shipping_modules,product_types;{gateway_legend},ipayment_account_id,ipayment_trxuser_id,ipayment_trxpassword,ipayment_security_key;{price_legend:hide},price,tax_class;{expert_legend:hide},guests,protected;{enabled_legend},enabled';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['ipayment_account_id'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_account_id'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'tl_class'=>'w50', 'rgxp'=>'digit')
);
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['ipayment_trxuser_id'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxuser_id'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'tl_class'=>'w50', 'rgxp'=>'digit')
);
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['ipayment_trxpassword'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_trxpassword'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'tl_class'=>'w50', 'rgxp'=>'digit')
);
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['ipayment_security_key'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['ipayment_security_key'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>32, 'tl_class'=>'w50')
);

?>