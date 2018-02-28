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
    <title>BLOG</title>
</head>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
  
    <section>
    <?php

     $result = mysqli_query($conn,"SELECT * FROM `blog` ORDER BY 'date'LIMIT 5 OFFSET 0");
     while ($row = mysqli_fetch_assoc($result)) {
    ?>
           <div class="ticket">
            <?php
                echo '<div class="ticketImg"><img src="'.$row['image'].'" width="300px" height="200px"></div>';
                echo '<div  class="ticketText"><p>'.$row['date'].'</p>';
                echo '<p>'.$row['titre'].'</p>';
                echo '<p>'.$row['intro'].'</p>';
                echo '
                <form method="get" action="ticketBlog.php">
                <button name="id" value="'.$row['id'].'">Lire plus</button>
                </form>
                </div>
            </div>';
    }
    echo '
    <form method="get" action="ticketBlog.php">
    <button name="id" value="'.$row['id'].'">Lire plus</button>
    ';
    ?>
            
    </section>
    
    
</body>
</html>