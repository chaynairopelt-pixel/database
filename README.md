# GameDB

Een eenvoudige PHP- en MySQL-catalogus voor videogames, met Rocket League als voorbeeld.

## Installatie

1. Importeer [`database/games.sql`](./database/games.sql) in MySQL. Het script maakt de database `gamesdb`, de tabel `games` en voegt Rocket League toe als voorbeeld als die nog niet bestaat.
2. Stel in `config/config.php` je databasehost, databasegebruiker, wachtwoord en `$base_url` in.
3. Open `/resources/views/games/index.php` in je lokale PHP-webserver. Via **Game toevoegen** kun je titels, genres, platformen, releasejaar, ontwikkelaar en beschrijving opslaan.

`config/config.example.php` bevat dezelfde standaard database-instellingen als startpunt.