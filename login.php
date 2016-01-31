<?php

    // configuration
    require("includes/config.php"); 
    $fuckoff = "fuck you";
    render("logincontent.php", ["fuckoff"=>$fuckoff]);
    //require_once("views/header.php");
?>