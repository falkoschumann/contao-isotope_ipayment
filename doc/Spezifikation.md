Spezifikation
=============

Applikation Payment ipayment
----------------------------

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
        *   Parameter für Rücksprünge in den Shop
        *   Parameter für die Durchführung der Sicherheitsprüfungen
        *   Parameter für Einstellungen des Zahlungssystems
        *   Weitere Parameter
    *   Gesicherte Rückmeldung erfolgreicher Transaktionen
        *   Parameter für die gesicherte Rückmeldung
*   Formular zur Übermittlung der Zahlungsparameter


#### Interaktion Process Payment

*   Rückgabeparameter Zahlungsabwicklung
    *   Rückgabeparameter zum Transaktionsergebnis
    *   Rückgabeparameter zu erfolgreichen Transaktionen
    *   Weitere Rückgabeparameter


#### Interaktion Backend Interface

*   Rückgabeparameter der Zahlungsabwicklung einer Bestellung darstellen


### Dialog Postsale (Isotope)

#### Interaktion Process

*   Sicherstellen, dass der Aufruf von einem ipayment-Server kommt.
*   Sonst wie Interaktion _Process Payment_


#### Interaktion Get Postsale Order

*   Bestimme anhand der Rückgabeparameter der Zahlungsabwicklung die Bestellung
