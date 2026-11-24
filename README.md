# Car brands

Een eenvoudige PHP- en MySQL-catalogus voor automerken.

## Installatie

1. Importeer [`database/games.sql`](./database/games.sql) in MySQL. Het script maakt de database `carsdb`, de tabel `car_brands` en voegt Toyota toe als voorbeeld.
2. Stel in `config/config.php` je databasehost, databasegebruiker, wachtwoord en `$base_url` in.
3. Open `/resources/views/games/index.php` in je lokale PHP-webserver. Via **Merk toevoegen** kun je merken, jaar, prijs, deuren en aandrijving opslaan.

`config/config.example.php` bevat dezelfde standaard database-instellingen als startpunt.