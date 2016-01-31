<?php

    // gets and colors balance
    require("includes/config.php"); 
    $stmt = $db->prepare("SELECT balance FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param('s', $_SESSION["id"]);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($nbalance);
    $stmt->fetch();
    if($nbalance >= 0)
    {
        $ispositive = true;
    }
    else
    {
        $ispositive = false;
    }
    
    // gets contents of friends and balance
    
    $prep_stmt = "SELECT username, balance FROM users";
    $stmt = $db->prepare($prep_stmt);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $result_array = array();
    while ($row = $result->fetch_array(MYSQLI_NUM))
    {   
        array_push($result_array, $row);

    }
    $positions = [];
    foreach ($result_array as $row)
    {
            $positions[] = [
                "name" => $row[0],
                "balance" => $row[1]
            ];
    }
    render("dashboardcontent.php", ["nbalance"=>$nbalance, "ispositive"=>$ispositive,"positions"=>$positions]);

?>