#Messierlog
##Huidige status
Momenteel is het ontwerp van de pagina al omgezet naar HTML en CSS, responsiveness is wel nog een werkpuntje. Veel JavaScript is er nog niet, ik had hiervoor Vue.js nog afgewacht voor ik hieraan begon.

Server side is er vooral Laravel geschreven en is er een database aanwezig.

Momenteel kan een gebruiker data invoeren en uploaden naar de database. Op de personal en public pagina's kunnen ze dan deze posts bekijken. Later komt er nog een verschil tussen deze twee pagina's.

##Starten huidige versie
Om de huidige versie werkende te krijgen is het voldoende om het project in de homestead omgeving te laten draaien en de database migratie uit te voeren om de database aan te maken.

Bij mij werd de site messierlog.local gemapt naar /home/vagrant/code/messierlog/public in de homestead.yaml file. In de hosts file was er een link tussen messierlog.local en het ip van de homestead vm. Dit zou voldoende moeten zijn om de applicatie te starten.