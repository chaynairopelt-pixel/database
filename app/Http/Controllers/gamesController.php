<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Alleen POST-verzoeken zijn toegestaan.');
}

$brand = trim($_POST['Brand'] ?? '');
$year = trim($_POST['Year'] ?? '');
$priceInput = $_POST['price'] ?? '';
$doorsInput = $_POST['doors'] ?? '';
$driveTypeInput = $_POST['drive_type'] ?? '';

if (
    $brand === '' || strlen($brand) > 100 ||
    $doorsInput === '' ||
    $driveTypeInput === ''
) {
    http_response_code(400);
    exit('Vul alle verplichte velden correct in.');
}

$price = filter_var($priceInput, FILTER_VALIDATE_FLOAT);
$doors = filter_var($doorsInput, FILTER_VALIDATE_INT);
$driveType = filter_var($driveTypeInput, FILTER_VALIDATE_INT);

if (
    ($priceInput !== '' && $price === false) ||
    $doors === false || $doors < 1 ||
    $driveType === false
) {
    http_response_code(400);
    exit('Vul geldige autogegevens in.');
}

$year = $year !== '' ? $year : null;

$query = '
    INSERT INTO car_brands (Brand, Year, price, doors, drive_type)
    VALUES (:brand, :year, :price, :doors, :drive_type)
';
$statement = $conn->prepare($query);
$statement->execute([
    ':brand' => $brand,
    ':year' => $year,
    ':price' => $priceInput !== '' ? $price : null,
    ':doors' => $doors,
    ':drive_type' => $driveType,
]);

header('Location: ' . $base_url . '/resources/views/games/index.php?msg=' . rawurlencode('Het merk is opgeslagen.'));
exit;
