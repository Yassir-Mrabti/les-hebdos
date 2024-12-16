<?php
    /* 
        * La connecction à la base Donnéés
    */
    
    session_start();
    define('SITEURL','http://localhost/Assets/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','hebdo');
    $conn =  mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME);
?>