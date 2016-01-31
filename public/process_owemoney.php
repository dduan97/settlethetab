<?php
    // configuration
    require("../includes/config.php");
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       if (empty($_SESSION["id"]))
        {
            //if user is not already logged in
           header("Location: ../login.php");
        } else
        {
            render2("owemoneycontent.php", ["title" => "Upload Transaction"]);
        }    
    }

    //else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error_msg = "";
        if (isset($_POST['username'], $_POST['amt'], $_POST['note']))
        {
            // Sanitize and validate the data passed in
            $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $amt = filter_input(INPUT_POST, 'amt', FILTER_SANITIZE_STRING);
            $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_STRING);
            
        }
        
        // get the id of the wanker who's about to get his knees bashed in
        $prep_stmt = "SELECT id FROM users WHERE username = ? LIMIT 1";
        $stmt = $db->prepare($prep_stmt);
    
        // see if command doesn't break the website
        if ($stmt) 
        {
            $stmt->bind_param('s', $user);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($otheruser);
            $stmt->fetch();
            if ($stmt->num_rows != 1) 
            {
                $error_msg .= "<p class='error'>This user does not exist! Keep your money you fucker!</p>";
                echo($error_msg);
                $stmt->close();
            }
        }
        //could check for amount if I wanted to I guess
        /*
        else{
            $prep_stmt = "SELECT id FROM users WHERE username = ? LIMIT 1";
            $stmt = $db->prepare($prep_stmt); 
            //if the statement is valid
            if($stmt){
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();
                //if there's already a user with this username, then return an error
                if($stmt->num_rows == 1){
                    $error_msg .= "<p class='error'>A user with this username already exists! </p>";
                    $stmt->close();
                    header("Location: ../register.php?error=username");
                }
            }
            //if the statement doesn't run, then return error
            else{
                $error_code .= "<p class='error'>Someone done goofed with the database! (line 55) </p>";
                $stmt->close();s8686[o]
                header("Location: ../register.php?error=donegoofed62");
            }
        }*/
    }
    else 
    {
        //else this is not a good sql statement
        $error_msg .= "<p class='error'>Someone done goofed with the database! (line 61) </p>";
        $stmt->close();
        header("Location: ../register.php?error=donegoofed69");

    }
 
    //if everything went smoothly above
        if (empty($error_msg))
        {
            if($_POST["whoOwes"] == "me"){
                $ower = $_SESSION["id"];
                $owerusername = $_SESSION['username'];
                $owed = $otheruser;
                $owedusername = $user;
            }
            else{
                $owed = $_SESSION["id"];
                $owedusername = $_SESSION['username'];
                $ower = $otheruser;
                $owerusername = $user;
            }
        

            // Insert the new user into the database 
            if ($insert_stmt = $db->prepare("INSERT INTO unpaid (ower, ower_username, owed, owed_username, amount, note) VALUES (?, ?, ?, ?, ?, ?)")) 
            {
                $insert_stmt->bind_param('ssssss', $ower, $owerusername, $owed, $owedusername, $amt, $note);
                // if the execute fails then redirect
                if (!$insert_stmt->execute()) 
                {
    				header('Location: ../views/index.php?error=donegoofed81');
    			}
    			$insert_stmt->close();
            }
            // update balance
            // check current user balance
        
        // find own user's balance
            $cash_stmt = $db->prepare("SELECT balance FROM users WHERE id = ? LIMIT 1");
            if($cash_stmt)
            {
                $cash_stmt->bind_param('s', $_SESSION["id"]);
                $cash_stmt->execute();
                $cash_stmt->store_result();
                $cash_stmt->bind_result($userbalance);
                $cash_stmt->fetch();
                
                // find other user's balance
                $other_stmt = $db->prepare("SELECT balance FROM users WHERE id = ? LIMIT 1");
                if($other_stmt)
                {
                    $other_stmt->bind_param('s', $otheruser);
                    $other_stmt->execute();
                    $other_stmt->store_result();
                    $other_stmt->bind_result($otheruserbalance);
                    $other_stmt->fetch();
                
                    if($_POST["whoOwes"] == "me")
                    {
                        $usertotalbalance = $userbalance - $amt;
                        $othertotalbalance = $otheruserbalance + $amt;
                    }
                    // someone owes me money
                    else{
                        $usertotalbalance = $userbalance + $amt;
                        $othertotalbalance = $otheruserbalance - $amt;
                    }
                    //update total balance for self
                    // UPDATE users SET cash = cash + {$_POST["amount"]} WHERE id = ?", $_SESSION["id"]);
                    $update_stmt = $db->prepare("UPDATE users SET balance = ? WHERE id =? LIMIT 1");
                    if($update_stmt)
                    {
                        $update_stmt->bind_param('ss', $usertotalbalance, $_SESSION["id"]);
                        $update_stmt->execute();
                    }
                    // update balance for other user
                    $otherupdate_stmt = $db->prepare("UPDATE users SET balance = ? WHERE id =? LIMIT 1");
                    if($otherupdate_stmt)
                    {
                        $otherupdate_stmt->bind_param('ss', $othertotalbalance, $otheruser);
                        $otherupdate_stmt->execute();
                    }
                }
            }
    		
            header('Location: ../dashboard.php');
        }
?>    