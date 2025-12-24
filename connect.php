<?php
$host = "localhost";
$port = 5432;
$dbname = "Group-AssignmentTask2";
$user = "postgres";
$pass = "getin";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>