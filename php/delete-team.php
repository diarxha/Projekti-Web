<?php
session_start();
$id = $_GET['id'];

require './db_connect.php';

$sql = 'DELETE FROM `games` WHERE id = :id';
$query = $pdo->prepare($sql);
$query->bindParam(':id', $id);

if ($query->execute()) {
     header("Location: ../pages/schedule.php?msg=successful");
} else {
     header("Location: ../pages/schedule.php?msg=fail");
}