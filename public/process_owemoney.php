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
                $owed = $otheruser;
            }
            else{
                $owed = $_SESSION["id"];
                $ower = $otheruser;
            }
            echo($_POST["whoOwes"]);

            // Insert the new user into the database 
            if ($insert_stmt = $db->prepare("INSERT INTO unpaid (ower, owed, amount, note) VALUES (?, ?, ?, ?)")) 
            {
                $insert_stmt->bind_param('ssss', $ower, $owed, $amt, $note);
                // if the execute fails then redirect
                if (!$insert_stmt->execute()) 
                {
    				header('Location: ../views/index.php?error=donegoofed81');
    			}
            }
    		
            //header('Location: ../index.php');
        }
?>    