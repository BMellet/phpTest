<?php 
    require('bdd.php');
    require('head.php'); 
?>
<body>
    <div>
        <?php  require('nav.php');?>
    </div>
<?php
    $resultat = mysqli_query($conn,"SELECT * FROM demande");
    while($rows = mysqli_fetch_array($resultat))
    {
        echo'<div class="demande">
            <p>Objet: '.$rows['objet'].'</p>
            <p>thematique: '.$rows['thematique'].'</p>
            <p>message: '.$rows['message'].'</p>
            <p>age: '.$rows['age'].'</p>
            <button onclick="suppr(event);" value="'.$rows['id'].'">supprimer</button>
            </div>
        ';

    }
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>   
</body>
</html>