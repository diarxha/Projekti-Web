<?php 

session_start();
require '../php/db_connect.php';
$query = $pdo->prepare('SELECT * FROM games');
$query->execute();
$games = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/lakerslogo.png" type="image/png">
    <title>Lakers</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/schedule2.css">
</head>
<body>
<?php
    include "../includes/header.php"
?>

    <div class="games">
    <?php 
     foreach ($games as $game) { 
        if($game['place']=="Home"){
    ?>
        <div class="game-info-home" style="color: purple; border: 4px solid purple;">
        <?php
        //  Kodi qe mshef x nese nuk je admin
      if(isset($_SESSION['role'])){
        if($_SESSION['role'] == 'admin'){?>
            <a href="../php/delete-team.php?id=<?php echo $game['id']?>" class="deleteGame-Home">
                    <i class="bi bi-x-lg"></i>
                    </a>
                    <?php }
      }
        ?>
            <p class="home-away"><?php echo $game['place']?></p>
            <div class="opp">
                <img src="../img/<?php echo $game['image']?>" style="width: 11rem;" class="opp-logo">
                <p class="opp-name"><?php echo $game['opp1']?></p>
                <p class="opp-name" style="font-weight: bolder;"><?php echo $game['opp2']?></p>
            </div>
            <div class="date-time">
                <p class="date" style="color: purple;"><?php echo $game['date']?></p>
                <p class="time"><?php echo $game['time']?></p>
            </div>
        </div>
        <?php
        }
        ?>

        <?php 
        if($game['place']=="Away"){ 
        ?>

        <div class="game-info-away" style="color: snow; border: 4px solid snow;">
        <?php
        //  Kodi qe mshef x nese nuk je admin
      if(isset($_SESSION['role'])){
        if($_SESSION['role'] == 'admin'){?>
            <a href="../php/delete-team.php?id=<?php echo $game['id']?>" class="deleteGame-Away">
                    <i class="bi bi-x-lg"></i>
                    </a>
                    <?php }
      }
        ?>
            <p style="font-weight: bolder; font-size: 1.7rem; color: snow;"><?php echo $game['place']?></p>
            <div class="opp">
                <img src="../img/<?php echo $game['image']?>" style="width: 11rem;" class="opp-logo">
                <p class="opp-name"><?php echo $game['opp1']?></p>
                <p class="opp-name" style="font-weight: bolder;"><?php echo $game['opp2']?></p>
            </div>
            <div class="date-time">
                <p class="date" style="color: snow;"><?php echo $game['date']?></p>
                <p class="time"><?php echo $game['time']?></p>
            </div>
        </div>
        <?php
    }
}
    ?>
    </div>
</body>
</html>


