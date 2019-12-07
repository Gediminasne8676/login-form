<?php 
include "functions.php";
include "database.php";
session_start();
ob_start();

if(isset($_POST['login'])){//jeigu paspaudziama login mygtukas
global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connection, $username);//jeigu kazkaip bando sql injectint, sustabdom tai
    $password = mysqli_real_escape_string($connection, $password);
    // echo $username;
    // echo $password;

    login_user($username, $password);//siunciam prisijungimo parametrus i prisijungimo funkcija
}

?>