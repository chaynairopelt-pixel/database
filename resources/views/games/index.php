<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/conn.php';

$statement = $conn->query('SELECT * FROM car_brands ORDER BY Brand');
$brands = $statement->fetchAll(PDO::FETCH_ASSOC);
$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Car brands</title>
    <?php require_once __DIR__ . '/../components/head.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../components/header.php'; ?>

    <main class="container page">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Voertuigcatalogus</p>
                <h1>Car brands</h1>
            </div>
            <a class="button" href="create.php">Merk toevoegen</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="msg"><?php echo $escape($_GET['msg']); ?></div>
        <?php endif; ?>

        <?php if ($brands): ?>
            <div class="game-grid">
                <?php foreach ($brands as $brand): ?>
                    <article class="game-card">
                        <div class="card-heading">
                            <span class="genre">Merk</span>
                            <?php if (!empty($brand['Year'])): ?>
                                <span class="year"><?php echo $escape(date('Y', strtotime($brand['Year']))); ?></span>
                            <?php endif; ?>
                        </div>
                        <h2><?php echo $escape($brand['Brand']); ?></h2>
                        <dl>
                            <div>
                                <dt>Prijs</dt>
                                <dd>&euro; <?php echo $escape(number_format((float) $brand['price'], 2, ',', '.')); ?></dd>
                            </div>
                            <div>
                                <dt>Deuren</dt>
                                <dd><?php echo $escape($brand['doors']); ?></dd>
                            </div>
                            <div>
                                <dt>Aandrijving</dt>
                                <dd><?php echo $escape($brand['drive_type']); ?></dd>
                            </div>
                        </dl>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h2>Nog geen merken</h2>
                <p>Voeg het eerste merk toe aan de catalogus.</p>
                <a class="button" href="create.php">Merk toevoegen</a>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>
