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
 * Table tl_iso_payment
 */

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_iso_payment']['palettes']['ipayment'] = '{type_legend},name,label,type;{note_legend:hide},note;{config_legend},new_order_status,quantity_mode,minimum_quantity,maximum_quantity,minimum_total,maximum_total,countries,shipping_modules,product_types,product_types_condition,config_ids;{gateway_legend},ipayment_account_id,ipayment_trxuser_id,ipayment_trxpassword,ipayment_security_key,ipayment_advanced_strict_id_check,ipayment_use_hidden_trigger;{price_legend:hide},price,tax_class;{expert_legend:hide},guests,protected;{enabled_legend},debug,enabled';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_iso_payment']['fields']['ipayment_account_id'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_account_id'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('mandatory' => true, 'maxlength' => 10, 'tl_class' => 'w50', 'rgxp' => 'digit'),
    'sql'       => "int(10) NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_iso_payment']['fields']['ipayment_trxuser_id'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_trxuser_id'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('mandatory' => true, 'maxlength' => 10, 'tl_class' => 'w50', 'rgxp' => 'digit'),
    'sql'       => "int(10) NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_iso_payment']['fields']['ipayment_trxpassword'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_trxpassword'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('mandatory' => true, 'maxlength' => 10, 'tl_class' => 'w50', 'rgxp' => 'digit'),
    'sql'       => "int(19) NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_iso_payment']['fields']['ipayment_security_key'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_security_key'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('maxlength' => 32, 'tl_class' => 'w50'),
    'sql'       => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_iso_payment']['fields']['ipayment_advanced_strict_id_check'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_advanced_strict_id_check'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default '1'"
);
$GLOBALS['TL_DCA']['tl_iso_payment']['fields']['ipayment_use_hidden_trigger'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_iso_payment']['ipayment_use_hidden_trigger'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default '1'"
);
