<?php 
    require('bdd.php');
    require('head.php'); 
?>
<body>
    <div>
        <?php  require('nav.php');?>
    </div>
    <section>
        <?php
        if(isset($_POST['ok']))
        {
            $name = $_POST['pseudo'];
            $result = mysqli_query($conn,"SELECT id,pseudo,password FROM `login` WHERE pseudo ='$name' ");
            $row = mysqli_fetch_assoc($result);
            if($row)
            {
               
                if( password_verify($_POST['password'], $row['password']) === true)
                {
                    echo 'ok';
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['pseudo'] =  $row['pseudo'];
                    header('Location:/index.php');
                }
                else
                {
                    echo 'mot de passe ou pseudo incorrect';
                }
            }
        }
        ?>
        <div class="wrapper">
            <form method="post" action="">
                <input  name="pseudo" type="text" placeholder="Nom d'utilisateur">
                <input name="password" type="password" placeholder="Mot de passe">
                <button name="ok">Se connecter</button>
            
            <form>
                <a href="/inscription.php">Pas encore inscrit? Créez votre compte ici</a>
            </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>   
</body>
</html>