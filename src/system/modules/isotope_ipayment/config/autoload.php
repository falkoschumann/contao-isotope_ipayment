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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'IsotopeIpayment',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Classes
    'IsotopeIpayment\Ipayment'                 => 'system/modules/isotope_ipayment/classes/Ipayment.php',
    'IsotopeIpayment\CheckoutFormDelegate'     => 'system/modules/isotope_ipayment/classes/CheckoutFormDelegate.php',
    'IsotopeIpayment\PaymentProcessorDelegate' => 'system/modules/isotope_ipayment/classes/PaymentProcessorDelegate.php'
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'iso_payment_ipayment' => 'system/modules/isotope_ipayment/templates',
));
