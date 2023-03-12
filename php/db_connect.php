<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=database", "root", "");     
} catch (PDOException $pdo) {
    // die("Unsuccessful connection");?
    header('Location: ../index.php');
}
