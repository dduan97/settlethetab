<?php

    // configuration
    require("includes/config.php");
    $_SESSION=[];
    session_destroy();
    $fuckoff = "horndogs";
    render("logoutcontent.php", ["fuckoff"=>$fuckoff]);
?>