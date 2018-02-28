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
    <title>CONTACT</title>
</head>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
   
    <?php
        if(isset($_POST['ok'])){
            if(!empty($_POST['objet']) && !empty($_POST['message']))
            {
                if(stripos($_POST['objet'],'simplon') !== false)
                {
                    echo'soyer poli';
                }
                else
                {
                    $objet = $_POST['objet'];
                    $message = $_POST['message'];
                    $selection = $_POST['selection'];
                    $age = $_POST['age'];
                    $var = mysqli_query($conn, "INSERT INTO `demande` VALUES (NULL,'$objet','$message','$selection','$age')");
                    var_dump ($var);
                }
            }
            else {
                echo'Veuillez remplir les Champs obligatoires';
            }
        }
    ?>
    <section>
        <form method="post" action="contact.php">
          
            <input  name ="objet" type="text" placeholder="objet (obligatoire)">
            <input name="message" type="text-area" placeholder="votre message (obligatoire)">
            <select name="selection">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <input name="compte"  value="oui"type="radio">j'ai un compte
            <input name="compte" value="non" type="radio">je n'ai pas de compte
            <input name="age" type="number" min="0">
            <button>Effacer</button>
            <button name="ok" type="submit" >Envoyer</button>
        </form>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>     
</body>
</html>