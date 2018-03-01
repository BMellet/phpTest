<?php 
    require('bdd.php');
    session_start();
    require('head.php'); 
?>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
  

    <?php
    $id = $_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM `blog` WHERE id ='$id'");
    $row = mysqli_fetch_assoc($result);
    echo'<h2>'.$row['titre'].'</h2>';
    echo'<p>Par <span>'.$row['auteur'].'</span> le <span>'.$row['date'].'</span></p>';
    echo'<img class="blogImg" src="'.$row['image'].'">';
    echo'<p>'.$row['texte'].'</p>';
    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
        if($_SESSION['pseudo'] == $row['auteur'])
        {
            echo '
            <form method="get" action="Modifier.php">
            <button name="id" value="'.$row['id'].'">Modifier</button>
            </form>';

        }
    }
    ?>
    
</body>
</html>