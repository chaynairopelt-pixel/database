<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/conn.php';

$statement = $conn->query('SELECT * FROM games ORDER BY name');
$games = $statement->fetchAll(PDO::FETCH_ASSOC);
$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<!doctype html>
<html lang="nl">

<head>
    <title>GameDB / Games</title>
    <?php require_once __DIR__ . '/../components/head.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../components/header.php'; ?>

    <main class="container">
        <h1>Games</h1>
        <a href="create.php">Game toevoegen &gt;</a>

        <?php if (isset($_GET['msg'])): ?>
            <div class="msg"><?php echo $escape($_GET['msg']); ?></div>
        <?php endif; ?>

        <?php if ($games): ?>
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Genre</th>
                        <th>Platformen</th>
                        <th>Releasejaar</th>
                        <th>Ontwikkelaar</th>
                        <th>Beschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($games as $game): ?>
                        <tr>
                            <td><?php echo $escape($game['name']); ?></td>
                            <td><?php echo $escape($game['genre']); ?></td>
                            <td><?php echo $escape($game['platforms']); ?></td>
                            <td><?php echo $escape($game['release_year'] ?? ''); ?></td>
                            <td><?php echo $escape($game['developer']); ?></td>
                            <td><?php echo $escape($game['description'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Er zijn nog geen games toegevoegd.</p>
        <?php endif; ?>
    </main>
</body>

</html>
