<?php require('bdd.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
    <link rel="stylesheet" href="main.css">
    <title>EVENEMENT</title>
</head>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
 
        <section>
            <?php
             if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
             {

                $result = mysqli_query($conn,"SELECT titre,image,lieu,description,creation,date FROM `evenement` ORDER BY 'date'");
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="ticket">
            <?php
                echo '<div class="ticketImg"><img src="'.$row['image'].'" width="150" height="150"></div>';
                echo '<div  class="ticketText"><p>Crée le '.$row['creation'].'</p>';
                echo '<p>'.$row['titre'].'</p>';
                echo '<p>'.$row['date'].'</p>';
                echo '<p>'.$row['lieu'].'</p>';
                echo '<p>'.$row['description'].'</p></div>';
            ?>
            </div>
            <?php
                }
            ?>
        </section>
<?php
}
else
{
    header('Location:/login.php');
}
?>
</body>
</html>
<?php 
       
   