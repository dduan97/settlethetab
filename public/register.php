<?php
include_once 'db_connect.php';

$error_msg = "";
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg="Not a valid email!";
    }
 
    // hash the password even though we were probably supposed to do this before we sent in in a post variable but hey who needs privacy right
    $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM users WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= "A user with this email address already exists! ";
            $stmt->close();
        }
        
        //now time to check for unique username
        else{
            $prep_stmt = "SELECT id FROM users WHERE username = ? LIMIT 1";
            $stmt = $mysqli->prepare($prep_stmt); 
            //if the statement is valid
            if($stmt){
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();
                //if there's already a user with this username, then return an error
                if($stmt->num_rows == 1){
                    $error_msg .= "A user with this username already exists! ";
                    $stmt->close();
                }
            }
            //if the statement doesn't run, then return error
            else{
                $error_code .= "Someone done goofed with the database! (line 55) ";
                $stmt->close();
            }
        }
    } else {
        //else this is not a good sql statement
        $error_msg .= "Someone done goofed with the database! (line 61) ";
        $stmt->close();
    }
 
    //if everything went smoothly above
    if (empty($error_msg)) {

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)")) {
            $insert_stmt->bind_param('sss', $username, $email, $password);
            // if the execute fails then redirect
            if (!$insert_stmt->execute()) {
				header('Location: ../views/index.php?error=sql75');
			}
        }
		
        header('Location: ../protected_page');
    }
}