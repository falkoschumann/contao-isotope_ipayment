Akzeptanztest
=============

Die folgenden Prüfungen werden mit der Isotope-Demo durchgeführt. Um die
Parameterübergabe an ipayment zu validieren, muss das Template
`iso_payment_ipayment` so angepasst werden, dass der _Bezahlen_-Button auch mit
JavaScript angezeigt wird und keine automatische Weiterleitung stattfindet.

Für die folgenden Kombinationen von Features muss eine erfolgreiche Testzahlung
durchgeführt werden.

Prüfung | Security-Key | Hidden-Trigger | Doppeltransaktionen
--------|--------------|----------------|--------------------
   1    |     Nein     |      Nein      |        Nein
   2    |      Ja      |      Nein      |        Nein
   3    |     Nein     |       Ja       |        Nein
   4    |      Ja      |       Ja       |        Nein
   5    |     Nein     |      Nein      |         Ja
   6    |      Ja      |      Nein      |         Ja
   7    |     Nein     |       Ja       |         Ja
   8    |      Ja      |       Ja       |         Ja
