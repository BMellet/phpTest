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
    <title>MODIFIER</title>
</head>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
 
    <section>

    <?php
    if(isset($_POST['ok']))
    {
        $titre = $_POST['titre'];
        $intro = $_POST['intro'];
        $texte = $_POST['texte'];
        $image = $_POST['image'];
        $req = "UPDATE blog SET titre='".$titre."',intro='".$intro."',texte='".$texte."',image='".$image."' WHERE id = ".$_GET['id']."";
        $res = mysqli_query($conn, $req);
        header('Location:/blog.php');
    }
    $result = mysqli_query($conn,"SELECT * FROM blog WHERE id =".$_GET['id']."");
    $row = mysqli_fetch_assoc($result);
    echo'<form method="post" action="Modifier.php?id='.$_GET['id'].'">
    <input type="text" name="titre" value="'.$row['titre'].'">
    <input type="text" name="intro" value="'.$row['intro'].'">
    <textarea name="texte">'.$row['texte'].'</textarea>
    <input type="text" name="image" value="'.$row['image'].'">
    <button name="ok">sauvegarder les modifications</button>
    </form>';
    ?>
    </section>
</body>
</html>