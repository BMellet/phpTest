<?php
    require('bdd.php');
    $pseudo = $_GET['pseudo'];
    $res = mysqli_query($conn,"SELECT pseudo,password FROM `login` WHERE pseudo ='$pseudo' ");
    $row = mysqli_fetch_assoc($res);
    if($pseudo ==="")
    {
        echo 0;
    }
    else if(empty($row))
    {
        echo 1;
    }
    else
    {
        echo 2;
    }
?>