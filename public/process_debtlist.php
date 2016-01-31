<?php

    require("../includes/config.php");

    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
        
        $prep_stmt = "SELECT * FROM unpaid WHERE owed = ? OR ower = ?";
        $stmt = $db->prepare($prep_stmt);
        
        $stmt->bind_param('ss', $id, $id);
        
        $stmt->execute();
        $result = $stmt->get_result();
        $result_array = array();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {   
            array_push($result_array, $row);

        }
        var_dump($result_array);
        
    }
    else{
        
    }

    ?>