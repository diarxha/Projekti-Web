<?php 

session_start();
require '../php/db_connect.php';
$query = $pdo->prepare('SELECT * FROM users');
$query->execute();
$users = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<?php
    include "../includes/header.php"
?>    
<div class="dashboard-table">
    <table>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Role</th>
            <th></th>
		</tr>

        <?php
        foreach($users as $user){

        ?>
        <tr>
			<td><?php echo $user['username']?></td>
			<td><?php echo $user['email']?></td>
			<td><?php echo $user['role']?></td>
            <td onclick="window.location='../php/delete-user.php?id=<?php echo $user['ID']?>'" class="delete-user" >
                    <i class="bi bi-x-lg" id="x"></i>
            </td>
		</tr>
    <?php
    }
    ?>
	</table>
</div>


</body>
</html>