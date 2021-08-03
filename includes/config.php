<?php

session_start();

$connection = mysqli_connect('127.0.0.1:3306','root','Shadows1991','berkay_php');

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}


require_once("functions.php");



?>