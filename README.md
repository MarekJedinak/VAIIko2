# O tomto frameworku

Tento framework vznikol na podporu výučby predmetu Vývoj aplikácií pre intranet a intrenate (VAII)
na [Fakulte informatiky a riadenia](https://www.fri.uniza.sk/) [Žilinskej univerzity v Žiline](https://www.uniza.sk/). Framework je navrhnutý tak, aby bol čo
najmenší a najjednoduchší.

# Návod a dokumentácia

Kód frameworku je kompletne okomentovaný. V prípade, že na pochopenie potrebujete dodatočné informácie,
navštívte [WIKI stránky](https://github.com/thevajko/vaiicko/wiki).

# Docker

Framework ma v adresári `<root>/docker` základnú konfiguráciu pre spustenie a debug web aplikácie. Všetky potrebné služby sú v `docker-compose.yml`. Po ich spustení sa vytvorí:

- __WWW document root__ je nastavený adresár riešenia, čiže web bude dostupný na adrese [http://localhost/](http://localhost/). Server má pridaný modul pre
  ladenie móde" (`xdebug.start_with_request=yes`).
- webový server beží na __PHP 8.2__ s [__Xdebug 3__](https://xdebug.org/) nastavený na port __9003__ v "auto-štart" móde
- PHP ma doinštalované rozšírenie __PDO__
- databázový server s vytvorenou _databázou_ a tabuľkami `messages` a `users` na porte __3306__ a bude dostupný na `localhost:3306`. Prihlasovacie údaje sú:
    - MYSQL_ROOT_PASSWORD: db_user_pass
    - MYSQL_DATABASE: databaza
    - MYSQL_USER: db_user
    - MYSQL_PASSWORD: db_user_pass
- phpmyadmin server, ktorý sa automatický nastavený na databázový server na porte __8080__ a bude dostupný na
  adrese [http://localhost:8080/](http://localhost:8080/)

# Návod

Inštalácia PHPStorm

 - Otvorte webový prehliadač a prejdite na oficiálnu stránku JetBrains PHPStorm. 
 - Kliknite na tlačidlo Download (Stiahnuť). 
 - Vyberte verziu podľa vášho operačného systému:
 - - Windows
 - - macOS
 - - Linux
 - Po stiahnutí spustite inštalačný súbor a postupujte podľa pokynov inštalátora.
 - Po dokončení inštalácie spustite PHPStorm.
 - Ak je to potrebné, prihláste sa do svojho JetBrains účtu.
 
Inštalácia Dockeru

- Otvorte webový prehliadač a prejdite na oficiálnu stránku Docker.
- Kliknite na tlačidlo Download (Stiahnuť).
- Vyberte verziu pre váš operačný systém:
- Windows → Stiahnite a nainštalujte Docker Desktop for Windows.
- macOS → Stiahnite a nainštalujte Docker Desktop for Mac.
- Linux → Postupujte podľa pokynov pre váš konkrétny systém (napr. Ubuntu, Fedora).
- Po stiahnutí spustite inštalačný súbor a postupujte podľa pokynov inštalátora.
- Po dokončení inštalácie reštartujte počítač (ak je to potrebné).
- Spustite Docker Desktop a uistite sa, že je aktívny.

Spustenie Docker Compose v PHPStorm
- Otvorte PHPStorm.
- Vyhľadajte a otvorte súbor docker.
- V súbore nájdite konfiguráciu docker-compose.
- Spustite docker-compose a počkajte na jeho inicializáciu.

Otvorenie lokálnej adresy v prehliadači
- Po úspešnom spustení Docker Compose môžete otvoriť svoju PHP aplikáciu v prehliadači.
- Spustite Google Chrome, Mozilla Firefox alebo iný prehliadač.
- Do adresného riadka zadajte:
http://127.0.0.1/
- Ak všetko prebehlo správne, vaša aplikácia by mala byť dostupná na tejto adrese.


