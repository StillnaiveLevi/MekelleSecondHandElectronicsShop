<?php
$host = "https://dpg-d561imv5r7bs73fb5vkg-a.frankfurt-postgres.render.com";
$port = 5432;
$dbname = "mekelleelectronicsshop";
$user = "stillnaive";
$pass = "gtjZA8Vs9I2jT5PFwcClCmur43UKna2c";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>