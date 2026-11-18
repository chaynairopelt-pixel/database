<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>GameDB / Nieuwe game</title>
    <?php require_once __DIR__ . '/../components/head.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../components/header.php'; ?>

    <main class="container">
        <h1>Nieuwe game</h1>

        <form action="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>/app/Http/Controllers/gamesController.php" method="POST">
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" class="form-input" maxlength="150" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select id="genre" name="genre" required>
                    <option value="">-- kies een genre --</option>
                    <option value="Sport">Sport</option>
                    <option value="Racen">Racen</option>
                    <option value="Actie">Actie</option>
                    <option value="Avontuur">Avontuur</option>
                    <option value="Strategie">Strategie</option>
                    <option value="Overig">Overig</option>
                </select>
            </div>
            <div class="form-group">
                <label for="platforms">Platformen:</label>
                <input type="text" name="platforms" id="platforms" class="form-input" maxlength="255" placeholder="Bijv. PC, PlayStation, Xbox" required>
            </div>
            <div class="form-group">
                <label for="release_year">Releasejaar:</label>
                <input type="number" name="release_year" id="release_year" class="form-input" min="1950" max="<?php echo (int) date('Y') + 5; ?>">
            </div>
            <div class="form-group">
                <label for="developer">Ontwikkelaar:</label>
                <input type="text" name="developer" id="developer" class="form-input" maxlength="150" required>
            </div>
            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <textarea name="description" id="description" class="form-input" rows="4"></textarea>
            </div>
            <input type="submit" value="Game opslaan">
        </form>
    </main>
</body>

</html>
