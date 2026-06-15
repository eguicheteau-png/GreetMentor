<?php
$DB_USER = "app_user";
$DB_PASS = "app_pass";
$dsn = "mysql:host=db;dbname=app_db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    exit("PDO error: " . $e->getMessage());
}