<?php
$DB_HOST = "localhost:3307";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "persondb";
try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
} catch (Exception $e) {
    $e->getMessage();
}
