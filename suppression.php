<?php 
    require('bdd.php');
    $id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM demande WHERE id = $id ");

?>