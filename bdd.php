<?php
$servername = "localhost";
$username = "root";
$password = "Mellet082217";
$dbname = "loginexophp";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$link =  mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 