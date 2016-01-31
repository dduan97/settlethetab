<?php //takes in a user id and returns their balance
require("../includes/config.php"); 
    $stmt = $db->prepare("SELECT balance FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param('s', $_SESSION["id"]);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($balance);
    $stmt->fetch();
    
    render2("dashboardcontent.php", ["balance" => $balance]);
?>