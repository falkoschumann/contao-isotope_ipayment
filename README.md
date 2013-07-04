Isotope ipayment
================

Diese Contao-Erweiterung erweitert den Isotope Webshop um die Zahlungsart
ipayment von 1&1, siehe [http://ipayment.de](http://ipayment.de).

Implementiert werden soll die Integration in den Modi:

 - normaler Modus
 - Silent-Modus

Notwendige Seiten om Contao:

 - Erfolgsmeldung
 - Fehlermeldung
 
Außerdem:

 - Security-Key (`trx_securityhash`)
 - Doppelzahlungen verhindern (`advanced_strict_id_check`, `shopper_id`)
 - Session-ID vorgenerieren, um die an ipayment geschickten Daten vor
   Manipulation zu schützen
 - Hidden-Trigger-Sript für eine sichere Rückmeldung (`hidden_trigger_url`)


Basisparameter
--------------

 - Account-ID (Teil der URL des Skriptes), Integer
 - Anwendungs-ID `trxuser_id`, Integer
 - Anwendungspasswort `trxpassword`, Long
 
Parameter für Betrag und Währung
--------------------------------

 - Währung der Transaktion `trx_currency`, String mit exakt 3 Buchstaben
 - Betrag der Transaktion `trx_amount`, Integer, nur positiv, maximal
   10.000.000, Betrag in Cent!!
 - Betrag der Transaktion als einzelne Bestandteile `trx_amount_base`/
   `trx_amount_decimal`

Parameter zur Angabe der gewünschten Zahlung
--------------------------------------------

 - Transaktionstyp der Transaktion `trx_ty`, String: auth (Default), preauth, ...
 - Zahlungsart der Transaktion `trx_paymenttyp`, String: cc (Kreditkarte), ...

Parameter für Name und Adresse des Karteninhabers
-------------------------------------------------

 - Name des Käufers `addr_name`, String, maximal 100 Zeichen
 - E-Mail des Käufers `addr_email`, String, maximale 80 Zeichen
 - Adressdaten des Käufers `addr_street`/`addr_city`/`addr_zip`/`addr_country`,
   String, Straße maximal 255 Zeichen, Stadt maximal 50 Zeichen, Postleitzahl
   maximal 20 Zeichen, ISO-Country-Code 3 Zeichen
 - Weitere Adressdaten des Käufers `addr_street2`/`addr_state`, String, Straße
   maximal 255 Zeichen, ISO-Staaten-Code 2 Zeichen (nur USA und Kanada)
 - Telefon und Telefax des Käufers `addr_telefon`/`addr_telefax`, String,
   maximal 30 Zeichen

Parameter zur Kennzeichnung von Transaktionen
---------------------------------------------

 - Shopper-ID (Order ID im Isotope) `shopper_id`, String
 - Erweitere Prüfung der IDs zur Vermeidung von Doppeltransaktionen durchführen?
   `advanced_strict_id_check`, Boolean

Parameter zur Referenzierung von Transaktionen
----------------------------------------------

 - Transaktionsreferenz/Rechnungsnummer (Text für Kreditkartenabrechnung)
   `invoice_text`, String, maximal 25 bis 30 Zeichen (für Kredikarten, maximal
   2x27 oder 10 Zeichen bei ELV)

Parameter für Rücksprünge in den Shop
-------------------------------------

 - Rücksprungs-URL für den Erfolgsfall `redirect_url`, String
 - Redirect-Aktion (Art der Parameterübergabe im normalen Modus)
   `redirect_action`, String: GET, POST oder REDIRECT
 - Sollen Parameter beim Erfolgs-Redirect zurückgegeben werden? (nur Silent
   Modus) `noparams_on_redirect_url`, Boolean; wenn false, dann sollte ein
   Hidden-Trigger-Skript verwendet werden
 - Rücksprungs-URL für Fehler im Silent-Modus `silent_error_url`, String
 - Sollen Parameter beim Fehler-Redirect zurück mitgegeben werden? (nur Silent
   Modus) `noparams_on_error_url`, Boolean

Parameter für Einstellungen des Zahlungssystems
-----------------------------------------------

 - Sollen Details zu den Zahlungsdaten der Transaktion zurückgegeben werden?
   `return_paymentdata_details`, Boolean; Rückgabe als `paydata_*`

Weitere Parameter
-----------------

 - IP des Käufers `from_ip`, String, maximal 15 Zeichen
 - Sprache der Fehlermeldungen `error_lang`, String: de oder en
 - Security-Hash zur Absicherung der Aufruf-Parameter `trx_securityhash`,
   String, maximal 32 Zeichen
 - Soll der Silent-Modus benutzt werden? `silent`, Boolean
 - Session-ID einer vorgenerierten Session `ipayment_session_id`, String

Zahlungsdaten
-------------

 - Nummer der Kredikarte oder Debitkart `cc_number`, String
 - Verfalls- bzw. Gültigkeitsdatum der Kreditkarte oder Debitkarte
   `cc_expdate_month`/`cc_expdate_year`, Integer
 - Kartenprüfnummer der Kreditkarte oder Debitkarte `cc_checkcode`, Integer
 - Ausgabe- bzw. Startdatum der Kreidkarte oder Debitkarte,
   `cc_startdate_month`/`cc_startdate_year`, Integer; nur bei englischen
   Maestro- oder Solo-Karten
 - Issue-Nummer der Kreditkarte oder Debitkarte `cc_issuenumber`, String,
   maximal 2 Zeichen ; nur bei englischen Maestro- oder Solo-Karten
 - Typ der Kreditkarte oder Debitkarte `cc_typ`, String: MasterCard, VisaCard,
   AmexCard, DinersClubCard, JCBCard, SoloCard, DiscoverCard, MaestroCard
 - Kartentyp-Fehler ignorieren `ignore_cc_typ_mismatch`, Boolean

Hidden Trigger
--------------

Das Hidden-Trigger-Skript sollte die Domäne und die IP des Aufrufers prüfen, um
sicherzustellen, dass der aufruf tatsächlich von ipayment kommt. Der Domänenname
muss auf ".ipayment.de" enden. Die offziellen IPs sind

 - 212.227.34.218
 - 212.227.34.219
 - 212.227.34.220

Parameter für die gesicherte Rückmeldung
----------------------------------------

 - Angabe der Hidden-Trigger-URLs `hidden_trigger_url[x]`, String; `x` ist
   optional, wenn mehrere Skripte aufgerufen werden sollen und muss in dem Fall
   eine Zahl sein

Parameter für die Nutzung einer vorgenerierten Session
------------------------------------------------------

 - Angabe der Session-ID `ipayment_session_id`, String

Rückgabeparameter zum Transaktionsergebnis
------------------------------------------

 - Ergebnis-Status der Transaktion `ret_status`, String: SUCCESS, ERROR oder
   REDIRECT
 - Fehlercode der Transaktion `ret_errorcode`, Integer
 - Ist ein technischer Fehler oder eine Ablehnung aufgrund der Zahlungsdaten
   aufgetreten `ret_fatalerror`, Boolean
 - Fehlermeldung `ret_errormsg`, String
 - Zusätzliche Fehlerinformation (nicht für den Kunden) `ret_additionalmsg`,
   String

Rückgabeparameter zu erfolgreichen Transaktionen
------------------------------------------------

 - Datum und Uhrzeit der Transaktion `ret_transdate`/`ret_transtime`, String
 - Eindeutige Buchungsnummer/Transaktionsnummer der Transaktion
   `ret_trx_number`, String; ID von ipayment in der Form x-xxxxxxx (x: Ziffer)
 - Autorisierungsnummer der Transaktion `ret_authcode`, String; ID des
   Zahlungsanbieters, kann leer sein
 - Checksumme der CGI-Rückgabeparameter `ret_param_checksum`, String
 - Checksumme der CGI-Rücksprungs-URL `ret_url_checksum`, String

Weitere Rückgabeparameter
-------------------------

 - Land der Zahlungsdaten der Transaktion `trx_paymentdata_country`, String;
   ISO-Code des Landes
 - Zahlungsmedium der Transaktion `trx_paymentmethod`, String: VisaCard,
   MasterCard, ...
 - Rückgabe der maskierten Zahlungsdaten der Transaktion `paydata_*`, String
