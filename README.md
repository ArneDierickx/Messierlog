# Messierlog
## Huidige status
De volledige site is afgewerkt. Er is enkel een kleine bug die ik niet netjes kan oplossen: posts die binnenkomen op de WebSocket worden niet gecontroleerd op user en huidige filter opties.
De code op de repo zal niet meer werken in homestead en moet op de apache2 server gedraaid worden met de meegegeven configuratie.

Responsiveness is geen 100% ok. Ik heb Bootstrap toegepast nadat ik eigen CSS had geschreven. Het werkt redelijk goed in combinatie met media queries in mijn eigen CSS.
Vanaf dat het scherm klein genoeg wordt zijn niet alle delen van de site even mooi. Het canvas is ongeveer responsive, als het scherm te klein wordt, vertoont het resizen van het canvas soms abnormaal gedrag.

## Starten huidige versie
In de hosts file moet messierlog.local gelinkt worden aan het IP van de VM waar de apache2 server draait.
Apache2 maakt gebruik van de volgende niet standaard inggeschakelde/geïnstalleerde modules:
* php7.3 (moet ook zeker geïnstalleerd worden samen met de nodige extra packages, nodig voor laravel. Als na het installeren van alle php7.3 packages apache2 deze nog niet vindt als module, dan is mogelijks de package libapache2-mod-php7.3 niet geïnstalleerd)
* proxy (voor de websocket)
* proxy_wstunnel (ook voor de websocket)
* rewrite (laravel requirement)

Verder wordt SSL en basic authentication gebruikt, deze mogen geen problemen geven.

Er is geen SQL dump, ik maak gebruik van een migration. Op de database moet een schema "messierlog" aangemaakt worden en een user "messierlog_user" met paswoord "messierlog_pwd", deze moet de database enkel maar bereiken vanop de localhost.
Deze user krijgt ook alle privileges op het schema "messierlog". Daarna kan in de root van het project (de code moet ondergebracht worden in /var/www/messierlog) het commando php artisan migrate uitgevoerd worden.
De WebSocket kan gestart worden met php artisan websocket:run.

Er kan hierna gesurft worden naar messierlog.local, http requests worden automatisch doorgestuurd naar de https site.

In /etc/apache2/.htpasswd zijn er 2 users aangemaakt:
* user1, paswoord; user1
* user2, paswoord; user2

Verder hoop ik dat alle VM apache2 configuratie in de map /etc/apache2 zit, als er toch iets ontbreekt, kan u me bereiken op onderstaand e-mailadres.

Dit is volgens mij alles dat nodig is om de huidige versie werkende te krijgen. Als ik toch informatie vergeten ben, aarzel dan niet om me te mailen op arne.dierickx@student.howest.be.