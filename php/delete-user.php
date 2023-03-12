<?php
session_start();
$ID = $_GET['id'];

require './db_connect.php';

$sql = 'DELETE FROM `users` WHERE ID = :ID';
$query = $pdo->prepare($sql);
$query->bindParam(':ID', $ID);

if ($query->execute()) {
     header("Location: ../pages/dashboard.php?msg=successful");
} else {
     header("Location: ../pages/dashboard.php?msg=fail");
}