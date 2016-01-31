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
          // create associative array for portfolio 
        $positions = [];
        foreach ($result_array as $row)
        {
                $positions[] = [
                    "owername" => $row[2],
                    "owedname" => $row[4],
                    "amount" =>$row[5],
                    "date" =>$row[6],
                    "note" =>$row[7]
                ];
            }
        }
        render2("test.php", ["positions"=>$positions]);
    
    ?>