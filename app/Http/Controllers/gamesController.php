<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Alleen POST-verzoeken zijn toegestaan.');
}

$name = trim($_POST['name'] ?? '');
$genre = $_POST['genre'] ?? '';
$platforms = trim($_POST['platforms'] ?? '');
$releaseYearInput = $_POST['release_year'] ?? '';
$developer = trim($_POST['developer'] ?? '');
$description = trim($_POST['description'] ?? '');
$allowedGenres = ['Sport', 'Racen', 'Actie', 'Avontuur', 'Strategie', 'Overig'];

if (
    $name === '' || strlen($name) > 150 ||
    !in_array($genre, $allowedGenres, true) ||
    $platforms === '' || strlen($platforms) > 255 ||
    $developer === '' || strlen($developer) > 150
) {
    http_response_code(400);
    exit('Vul alle verplichte velden correct in.');
}

$releaseYear = null;
if ($releaseYearInput !== '') {
    $releaseYear = filter_var($releaseYearInput, FILTER_VALIDATE_INT);
    if ($releaseYear === false || $releaseYear < 1950 || $releaseYear > (int) date('Y') + 5) {
        http_response_code(400);
        exit('Vul een geldig releasejaar in.');
    }
}

$query = '
    INSERT INTO games (name, genre, platforms, release_year, developer, description)
    VALUES (:name, :genre, :platforms, :release_year, :developer, :description)
';
$statement = $conn->prepare($query);
$statement->execute([
    ':name' => $name,
    ':genre' => $genre,
    ':platforms' => $platforms,
    ':release_year' => $releaseYear,
    ':developer' => $developer,
    ':description' => $description !== '' ? $description : null,
]);

header('Location: ' . $base_url . '/resources/views/games/index.php?msg=' . rawurlencode('De game is opgeslagen.'));
exit;
