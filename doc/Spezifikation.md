Agile Analyse für ipayment v1.2
===============================

Dokumentation:

*   https://ipayment.de
*   https://ipayment.de/technik/referenzen.php


Applikation Payment ipayment
----------------------------

*   Unterstützt nur den Normalen CGI-Modus.
*   Unterstützt nur den Transaktionstyp: Sofortige Buchung einer Zahlung: Autorisieren und abbuchen (auth)
*   Unterst+tzt nur die Zahlungsart per Kreditkarte


### Dialog Payment (Isotope)

#### Interaktion Checkout Form

*   Parameter zur Zahlungsabwicklung
    *   Verwendete Datentypen
    *   Basisparameter
        *   Parameter zur Identifikation des ipayment-Accounts
        *   Parameter für Betrag und Währung
        *   Parameter zur Angabe der gewünschten Zahlung
        *   Parameter für Name und Adresse des Karteninhabers
        *   Parameter zur Kennzeichnung von Transaktionen
        *   Parameter zur Referenzierung der Transaktion
        *   Parameter für Rücksprünge in den Shop
        *   Parameter für die Durchführung der Sicherheitsprüfungen
        *   Parameter für Einstellungen des Zahlungssystems
        *   Parameter für die Integration in Shop-Systeme
        *   Weitere Parameter
    *   Zahlungsdaten
        *   Parameter für Kredit- und Debitkartenzahlungen
        *   Parameter für ELV-Zahlungen
        *   Parameter für Prepaid-Zahlungen
    *   Gesicherte Rückmeldung erfolgreicher Transaktionen
        *   Parameter für die gesicherte Rückmeldung
    *   Session-IDs vorgenerieren
        * Parameter für die Nutzung einer vorgenerierten Session
*   Formular zur Übermittlung der Zahlungsparameter


#### Interaktion Process Payment

*   Rückgabeparameter Zahlungsabwicklung
    *   Rückgabeparameter zum Transaktionsergebnis
    *   Rückgabeparameter zu erfolgreichen Transaktionen
    *   Weitere Rückgabeparameter


### Dialog Postsale (Isotope)

#### Interaktion Process Postsale

*   TODO


#### Interaktion Get Postsale Order

*   TODO


To-do
-----

*   [ ] Sonderzeichen in URLs encodieren (PHP: urlencode($value)) S. 29
*   [ ] Optional Session-ID
*   [ ] Optional Hidden-Trigger-Skript
*   [ ] Optional Advanced-Strict-Id-Check
