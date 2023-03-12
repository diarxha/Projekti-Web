<?php
session_start();
$id = $_GET['ID'];

require './db_connect.php';

$sql = 'DELETE FROM `players` WHERE ID = :ID';
$query = $pdo->prepare($sql);
$query->bindParam(':ID', $id);

if ($query->execute()) {
     header("Location: ../pages/roster.php?msg=successful");
} else {
     header("Location: ../pages/roster.php?msg=fail");
}