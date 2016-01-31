<?php
    // configuration
    require("../includes/config.php");

    $error_msg="";
    if(isset($_POST["username"], $_POST["password"])){
        $user = $_POST["username"];
        
        // prepare that damn statement
        $prep_stmt = "SELECT id, username, email, password, balance FROM users WHERE username = ? LIMIT 1";
        $stmt = $db->prepare($prep_stmt);
        
        if ($stmt){
            $stmt->bind_param('s', $user);
            
            if($stmt->execute()){
                $stmt->store_result();
                
                $stmt->bind_result($id, $username, $email, $password, $balance);
                $stmt->fetch();
                
                //if there's no user in our table with the same username
                if($stmt->num_rows != 1){
                    $error_msg .= "<p class='error'>No user with this username found! </p>";
                    header('Location: ../login.php?error=1');
                }
                else if (password_verify($_POST["password"], $password)){
                    //yayyy you remember your password
                    session_start();
                    
                    //remember all your information
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $email;
                    $_SESSION["balance"] = $balance;
                    
                    header("Location: ../dashboard.php");
                }
                else{
                    $error_msg .= "<p class='error'>Incorrect password, ya dummy! </p>";
                    header('Location: ../login.php?error=1');
                }
            }
            else{
                echo("<script> alert('ya done goofed'); </script>");
            }
        }
        
    }
    else{
        echo("<script> alert('ya really done goofed'); </script>");
    }