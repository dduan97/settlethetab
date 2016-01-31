<?php
    require("helpers.php");

    // connect to sql
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    ini_set("display_errors", true);
    error_reporting(E_ALL);
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) 
    {
        die("Connection failed: " . $db->connect_error);
    } 
    
    // start session
    session_start();
    
    //make sure redirected unless logged in
    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/index.php", "/login.php", "/logout.php", "/register.php"]))
    {
        if (empty($_SESSION["id"]))
        {
            header("Location: index.php");
        }
    }



?>