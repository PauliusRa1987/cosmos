## Laravel Kosmosas
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Gilėjant energetinei krizei Pasaulyje, buvo nuspręsta pradėti Helio 3 kasybą Mėnulyje:
https://en.wikipedia.org/wiki/Helium-3#Extraterrestrial_mining

## Vizija
1. Naujų Šalių, dalyvaujančių Mėnulio kasyboje, pridėjimas, redagavimas,
pašalinimas. Kiekviena Šalis privalomai turi tokius atributus:
- Pavadinimas
- Planuojamas kasyklų kiekis (turi būti neleidžiama Šaliai turėti daugiau
kasyklų negu nurodyta)
2. Naujų kasyklų Mėnulio paviršiuje kūrimas, redagavimas, griovimas. Kiekviena
kasyklą privalo turėti tokius atributus:
- Koordinatės- ilguma ir platuma pagal Mėnulio koordinačių sistemą
https://en.wikipedia.org/wiki/Selenographic_coordinate_system
- Pavadinimas
- Šalis, kuriai priklauso kasyklą, iš sąrašo
- Helio 3 kasimo pajėgumus kg per Žemės parą
- Laivų, gabenačių Helį 3 iš kasyklos sąrašas
3. Naujų kosminių laivų, gabenančių Helį 3 kūrimas, redagavimas ir išardymas.
Kiekvienas kosminis laivas privalomai turi tokius atributus:
- Pavadinimas
- Šalis, kuriai priklauso laivas, iš sąrašo
- Kasyklų, iš kurių laivas gabena Helį 3 sąrašas
- Kosminio laivo nuotrauka


## Ateities vizija

Projektas taip pat numato Šalių Blokų sukūrimą. (Papildoma užduotis, atlikus 1-3
punktus). Naujų Šalių Blokų kūrimą, redagavimą ir naikinimą. Kiekvienas Šalių Blokas
privalomai turi turėti tokius atributus:
- Pavadinimas
- Šalių, priklausančių Blokui sąrašas. Kiekviena Šalis gali dalyvauti tik
viename bloke, laisvai iš jo išeiti ar pereiti į kitą Bloką. Blokui suirus, jame
buvusios Šalys tampa laisvos


## Ataskaita

Suformuoti ataskaitą (atskirą puslapį arba pdf dokumentą), kuriame būtų visų Šalių
sąrašas su šalia pateiktu turimų laivų ir kasyklų sąrašu. Sąrašas turi būti išrūšiuotas
pagal Helio 3 suminio visų turimų kasyklų kasimo pajėgumus kg per Žemės parą nuo
didžiausio iki mažiausio.
Ateityje ataskaitą patobulinti, analogiškai atvaizduojant Šalių Blokus, ataskaitos gale
pridedant Šalis, neįeinančias į jokio Bloko sudėtį (jeigu tokių yra).

## Paaiškinimai

Kiekvienoje kasykloje gali lankytis bet koks kiekis kosminių laivų. Kiekvienas kosminis
laivas gali skristi į bet kokį kiekį kasyklų. Laivo ir kasyklos Šalis turi sutapti. T.y. vienos
Šalies kasyklos negali lankyti kitai Šaliai priklausantis laivas.
Ateityje, atsiradus Šalių Blokams, visi vieno Bloko laivai galės lankyti visas to Bloko
Šalių kasyklas. Šaliai išėjus iš Bloko, ryšiai tarp skirtingų Šalių kasyklų/lavų porų turi
būti nutraukiami automatiškai


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
