<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link rel="stylesheet" href="main.css">
<title>
<?php
        $adresse = $_SERVER['PHP_SELF'];
        $rest = substr($adresse,1,-4);
        if($rest === "index")
        {
            echo 'Home';
        }
        else
        {
            echo $rest;
        }
        ?>

</title>
</head>
