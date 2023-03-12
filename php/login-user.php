<?php
session_start();

require './db_connect.php';
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (empty($_POST['username']) || strlen($_POST['username']) < 6 || strlen($_POST['username']) > 22) {
    header("Location: ../pages/login.php");
    $_SESSION['message'] = 'Username should be at least 6 characters and max 22 characters';
} else if (empty($_POST['password']) || strlen($_POST['password']) < 6 || strlen($_POST['password']) > 22) {
    header("Location: ../pages/login.php");
    $_SESSION['message'] = 'Password should be at least 6 characters and max 22 characters';
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = validate($_POST['username']);
    $password = $_POST['password'];
    $query = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $query->bindParam(':username', $username);
    $query->execute();

    $user = $query->fetch();

    if ($username == $user['username'] && $password == $user['password']) {
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: ../index.php");
    } else {
        $_SESSION['message'] = 'Your username or password is wrong!';
        header("Location: ../pages/login.php");
    }
}
