<?php require('bdd.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
    <link rel="stylesheet" href="main.css">
    <title>INSCRIPTION</title>
</head>
<body>
    <div>
        <?php  require('nav.php');?>
    </div>
    <?php
    if(isset($_POST['ok']))
    {
        $verMdp = true;
        $ver = true;
        $result = mysqli_query($conn,"SELECT pseudo FROM `login`");
        while ($row = mysqli_fetch_assoc($result)) {
           if($row['pseudo'] === $_POST['pseudo'] )
           {
              echo'Pseudo déjà pris';
              $ver = false;
              break;
           }
    
        }
        
       
        if($_POST['password'] !== $_POST['verif'])
        {
            echo'Les deux mots de passe ne sont pas identiques';
            $verMdp=false;
        }
        if($ver === true && $verMdp === true)
        {
            $pseudo = $_POST['pseudo'];
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password = $pass_hache;
             mysqli_query($conn, "INSERT INTO `login` VALUES (NULL,'$pseudo','$password')");
             echo 'Votre compte a bien été enregistré';
             header('Location:/login.php');
        }


    }
    ?>
    <section>
    <form method="post" action="">
        <input name="pseudo" type="text" placeholder="Taper votre Pseudo">
        <input name="password" type="password" placeholder="taper votre mot de passe">
        <input name="verif" type="password" placeholder="taper a nouveau mot de passe">
        <button name="ok">s'inscrire</button>
    </form>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>   
</body>
</html>