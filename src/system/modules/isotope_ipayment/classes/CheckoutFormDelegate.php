<?php

/**
 * Isotope ipayment Extension for Contao
 *
 * Copyright (c) 2016 Falko Schumann
 *
 * @license MIT
 */

namespace IsotopeIpayment;

use Isotope\Interfaces\IsotopeProductCollection;

class CheckoutFormDelegate
{

    /**
     * @var Ipayment
     */
    private $delegator;

    public function __construct(Ipayment $delegator)
    {
        $this->delegator = $delegator;
    }

    public function getParameterZurZahlungsabwicklung(IsotopeProductCollection &$objOrder, \Module &$objModule)
    {
        $arrParam = $this->getBasisparameter($objOrder, $objModule);
        $this->addGesicherteRueckmeldungErfolgreicherTransaktionen($arrParam);
        return $arrParam;
    }

    private function getBasisparameter(IsotopeProductCollection &$objOrder, \Module &$objModule)
    {
        $arrParam = array();
        $this->addParameterZurIdentifikationDesIpaymentAccounts($arrParam);
        $this->addParameterFuerBetragUndWaehrung($objOrder, $arrParam);
        $this->addParameterZurAngabeDerGewuenschtenZahlung($arrParam);
        $this->addParameterFuerNameUndAdresseDesKarteninhabers($objOrder, $arrParam);
        $this->addParameterZurKennzeichnungVonTransaktionen($objOrder, $arrParam);
        $this->addParameterFuerRueckspruengeInDenShop($objOrder, $objModule, $arrParam);
        $this->addParameterFuerDieDurchfuehrungDerSicherheitspruefungen($arrParam);
        $this->addParameterFuerEinstellungenDesZahlungssystems($arrParam);
        $this->addWeitereParameter($objOrder, $arrParam);
        return $arrParam;
    }

    private function addParameterZurIdentifikationDesIpaymentAccounts(array &$arrParam)
    {
        $arrParam['trxuser_id'] = $this->delegator->ipayment_trxuser_id;
        $arrParam['trxpassword'] = $this->delegator->ipayment_trxpassword;
    }

    private function addParameterFuerBetragUndWaehrung(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        if (!isset($this->delegator->currencies[$objOrder->currency])) {
            throw new Exception("Unknown currency " . $objOrder->currency);
        }

        $arrParam['trx_currency'] = substr($objOrder->currency, 0, 3);
        $arrParam['trx_amount'] = (int) round(($objOrder->getTotal() * pow(10, $this->delegator->currencies[$objOrder->currency])));
    }

    private function addParameterZurAngabeDerGewuenschtenZahlung(array &$arrParam)
    {
        $arrParam['trx_typ'] = 'auth';
        $arrParam['trx_paymenttyp'] = 'cc';
    }

    private function addParameterFuerNameUndAdresseDesKarteninhabers(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        $objBillingAddress = $objOrder->getBillingAddress();
        $arrParam['addr_name'] = substr($objBillingAddress->firstname . ' ' . $objBillingAddress->lastname, 0, 100);
        $arrParam['addr_email'] = substr($objBillingAddress->email, 0, 80);
        $arrParam['addr_street'] = substr($objBillingAddress->street_1, 0, 255);
        $arrParam['addr_city'] = substr($objBillingAddress->city, 0, 50);
        $arrParam['addr_zip'] = substr($objBillingAddress->postal, 0, 20);
        $arrParam['addr_country'] = strtoupper(substr($objBillingAddress->country, 0, 3));
        $arrParam['addr_state'] = strtoupper(substr($objBillingAddress->subdivision, strpos($objBillingAddress->subdivision, '-') + 1));
    }

    private function addParameterZurKennzeichnungVonTransaktionen(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        $arrParam['shopper_id'] = substr($objOrder->uniqid, 0, 255);
        $arrParam['advanced_strict_id_check'] = $this->delegator->ipayment_advanced_strict_id_check ? 1 : 0;
    }
    
    private function addParameterFuerRueckspruengeInDenShop(IsotopeProductCollection &$objOrder, \Module &$objModule, array &$arrParam)
    {
        $arrParam['redirect_url'] = substr(\Environment::get('base') . $objModule->generateUrlForStep('complete', $objOrder), 0, 255);
        $arrParam['redirect_action'] = 'POST';
    }

    private function addParameterFuerDieDurchfuehrungDerSicherheitspruefungen(array &$arrParam)
    {
        $arrParam['check_double_trx'] = 1;
    }

    private function addParameterFuerEinstellungenDesZahlungssystems(array &$arrParam)
    {
        $arrParam['return_paymentdata_details'] = 1;
    }

    private function addWeitereParameter(IsotopeProductCollection &$objOrder, array &$arrParam)
    {
        if (empty($this->delegator->ipayment_security_key)) {
            return;
        }

        if (!isset($this->delegator->currencies[$objOrder->currency])) {
            throw new Exception("Unknown currency " . $objOrder->currency);
        }

        $amount = round(($objOrder->getTotal() * pow(10, $this->delegator->currencies[$objOrder->currency])));
        $arrParam['trx_securityhash'] = md5(
            $this->delegator->ipayment_trxuser_id .
            $amount .
            $objOrder->currency .
            $this->delegator->ipayment_trxpassword .
            $this->delegator->ipayment_security_key);
    }

    private function addGesicherteRueckmeldungErfolgreicherTransaktionen(array &$arrParam)
    {
        $this->addParameterFuerDieGesicherteRueckmeldung($arrParam);
    }

    private function addParameterFuerDieGesicherteRueckmeldung(array &$arrParam)
    {
        if ($this->delegator->ipayment_use_hidden_trigger) {
            $arrParam['hidden_trigger_url'] = substr(\Environment::get('base') . 'system/modules/isotope/postsale.php?mod=pay&id=' . $this->delegator->id, 0, 255);
        }
    }
    
    public function createFormularZurUebermittlungDerZahlungsparameter(array &$arrParam)
    {
        $objTemplate = new \FrontendTemplate('iso_payment_ipayment');
        $objTemplate->action = 'https://ipayment.de/merchant/' . $this->delegator->ipayment_account_id . '/processor/2.0/';
        $objTemplate->params = $arrParam;
        $objTemplate->redirectDescription = $GLOBALS['TL_LANG']['MSC']['ipayment_redirect_description'];
        $objTemplate->submitLabel = $GLOBALS['TL_LANG']['MSC']['ipayment_submit_label'];
        $objTemplate->id = $this->delegator->id;
        return $objTemplate->parse();
    }

}
