<?php 

session_start();
require '../php/db_connect.php';
$query = $pdo->prepare('SELECT * FROM players');
$query->execute();
$players = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/lakerslogo.png" type="image/png">
    <title>Lakers</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/roster2.css">
</head>
<body>
<?php
    include "../includes/header.php"
?>

<div class="roster">
    <?php
     foreach ($players as $player) { 
    ?>
    <div class="player">
    <?php
        //  Kodi qe mshef x nese nuk je admin
      if(isset($_SESSION['role'])){
        if($_SESSION['role'] == 'admin'){?>
            <a href="../php/delete-player.php?ID=<?php echo $player['ID']?>" class="deletePlayer">
                    <i class="bi bi-x-lg"></i>
                    </a>
                    <?php }
      }
        ?>
        <div class="photo"><img src="../img/players/<?php echo $player['image']?>" style="width: 350px;"></div>
        <div class="info">
            <p class="number"><?php echo $player['number']?></p>
            <p class="name"><?php echo $player['name']?></p>
            <p class="position"><?php echo $player['position']?></p>
        </div>
        <div class="player-links">
            <div class="stats">
                <p style="color: snow; font-weight: bold;">PTS</p>
                <span class="player-links1"><?php echo $player['points']?></span>
            </div>
            <div class="stats">
                <p style="color: snow; font-weight: bold; text-align: center;">AST</p>
                <span class="player-links1"><?php echo $player['assists']?></span>
            </div>
            <div class="stats">
                <p style="color: snow; font-weight: bold;">RBD</p>
                <span class="player-links1"><?php echo $player['rebounds']?></span>
            </div>
        </div>
    </div>
    <?php } ?>      
</div>
</body>
</html>