<?php 
    require('bdd.php');
    require('head.php'); 
?>
<body>
    <div>
        <?php  require('nav.php');?>
    </div>
    <?php
    if(isset($_POST['ok']))
    {
            $pseudo = $_POST['pseudo'];
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password = $pass_hache;
             mysqli_query($conn, "INSERT INTO `login` VALUES (NULL,'$pseudo','$password')");
             echo 'Votre compte a bien été enregistré';
             header('Location:/login.php');


    }
    ?>
    <section>
    <div class="wrapper">
    <form method="post" action="">
        <input id="input" name="pseudo" type="text" placeholder="Taper votre Pseudo">
        <input id="mdp" name="password" type="password" placeholder="taper votre mot de passe">
        <input id="mdp2" name="verif" type="password" placeholder="taper a nouveau mot de passe">
        <button id="btn_register" disabled name="ok">s'inscrire</button>
    </form>
</div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>   
</body>
</html>