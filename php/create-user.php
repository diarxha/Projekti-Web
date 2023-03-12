<?php
session_start();

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email'])) {
  
        $_SESSION['message'] = "Please fill all fields!";
        header("Location: ../pages/login.php");
       
}


require './db_connect.php';
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Me rregullu qe mos me mujt me regjistru usera qe egzistojn
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $query = $pdo->prepare("SELECT COUNT(*) AS numberOfUsers FROM `users` WHERE username = :username");
    $query->bindParam(':username', $username);

    $query->execute();
    $count = $query->fetch();

    if ($count['numberOfUsers'] > 0) {
        $_SESSION['message'] = 'A user exist with the same username!';
        header("Location: ../pages/login.php");
        die();
    }
}
if (empty($_POST['username']) || strlen($_POST['username']) < 6 || strlen($_POST['username']) > 22) {
    header("Location: ../pages/login.php");
    $_SESSION['message'] = 'Username should be at least 6 characters and max 22 characters';
} else if (empty($_POST['password']) || strlen($_POST['password']) < 6 || strlen($_POST['password']) > 22) {
    header("Location: ../pages/login.php");
    $_SESSION['message'] = 'Password should be at least 6 characters and max 22 characters';
}else if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $name = validate($_POST['username']);
    $email = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $password = $_POST['password'];

    $sql = 'INSERT INTO users (username,email, password,role) VALUES (:name, :email, :password,"user")';
    $query = $pdo->prepare($sql);
    $query->bindParam(':name', $name);
    $query->bindParam(':password', $password);
    $query->bindParam(':email', $email);

    if ($query->execute()) {
       
    
            $_SESSION['message'] = "You just created a new Account!";

            header("Location: ../pages/login.php");

    } else {
        $_SESSION['message'] =  "A problem occurred creating your account";
        header("Location: ../pages/login.php");
    }
} else {
    header("Location: ../pages/login.php");
    $_SESSION['message'] = "Something Went Wrong Try Again!";
}
