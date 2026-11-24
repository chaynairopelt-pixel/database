<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>Car brands / Merk toevoegen</title>
    <?php require_once __DIR__ . '/../components/head.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../components/header.php'; ?>

    <main class="container page">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Catalogus toevoegen</p>
                <h1>Nieuw merk</h1>
            </div>
            <a class="text-link" href="index.php">Terug naar overzicht</a>
        </div>

        <form class="game-form" action="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>/app/Http/Controllers/gamesController.php" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="Brand">Merk</label>
                    <input type="text" name="Brand" id="Brand" maxlength="100" required>
                </div>
                <div class="form-group">
                    <label for="Year">Jaar</label>
                    <input type="date" name="Year" id="Year">
                </div>
                <div class="form-group">
                    <label for="price">Prijs</label>
                    <input type="number" name="price" id="price" min="0" step="0.01" placeholder="24950.00">
                </div>
                <div class="form-group">
                    <label for="doors">Aantal deuren</label>
                    <input type="number" name="doors" id="doors" min="1" max="10" required>
                </div>
                <div class="form-group form-full">
                    <label for="drive_type">Aandrijving</label>
                    <select id="drive_type" name="drive_type" required>
                        <option value="">Kies een aandrijving</option>
                        <option value="1">1 - Voorwielaandrijving</option>
                        <option value="2">2 - Achterwielaandrijving</option>
                        <option value="3">3 - Vierwielaandrijving</option>
                    </select>
                </div>
            </div>
            <button class="button" type="submit">Merk opslaan</button>
        </form>
    </main>
</body>

</html>
