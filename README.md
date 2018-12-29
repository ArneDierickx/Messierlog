# Messierlog
## Huidige status
De volledige site is afgewerkt. Er is enkel een kleine bug die ik niet netjes kan oplossen: posts die binnenkomen op de WebSocket worden niet gecontroleerd op user en huidige filter opties.
De code op de repo zal niet meer werken in homestead en moet op de apache2 server gedraaid worden met de meegegeven configuratie.

## Starten huidige versie
In de hosts file moet messierlog.local gelinkt worden aan het IP van de VM waar de apache2 server draait.
Apache2 maakt gebruik van de volgende niet standaard inggeschakelde/geïnstalleerde modules:
* php7.3 (moet ook zeker geïnstalleerd worden samen met de nodige extra packages, nodig voor laravel)
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

Dit is volgens mij alles dat nodig is om de huidige versie werkende te krijgen. Als ik toch informatie vergeten ben, aarzel dan niet om me te mailen op arne.dierickx@student.howest.be.