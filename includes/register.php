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
        header('Location: ../form?error=1');
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        header('Location: ../form?error=2');
    }
 
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
            $error_code = '3';
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
                    $error_code = '4';
                    $stmt->close();
                }
            }
            //if the statement doesn't run, then return error
            else{
                $error_code = '4';
                $stmt->close();
            }
        }
    } else {
        //else this is not a good sql statement
        //$error_msg .= '<p class="error">Database error Line 39</p>';
        $error_code = '4';
        $stmt->close();
    }
 
    if (empty($error_code)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (/*username, */email, password, salt, first_name, last_name) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssss', /*$username, */$email, $password, $random_salt, $first, $last);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }else{
				// Text of Message 
				$msg = "Welcome to MicroInvester. We're very excited to help you make your first investment. There is one last step you need to complete before you can begin to use your money to change the world. Please follow our link to confirm that this email is you.
				\n\nWe're dedicated to ensuring the upmost security for our users. \n\n\nThe team:\nJared Weinstein\nDennis Duan";

				// use wordwrap() if lines are longer than 70 characters
				$msg = wordwrap($msg,120);

				// send email
				mail($email,"MicroInvester Email Registration",$msg);
				
				header('Location: ../error.php?err=Registration failure: INSERT');
			}
        }
		
		// Text of Message 
		$msg = "Welcome to MicroInvester. We're very excited to help you make your first investment. There is one last step you need to complete before you can begin to use your money to change the world. Please follow our link to confirm that this email is you.
		\n\nWe're dedicated to ensuring the upmost security for our users. \n\n\nThe tech team:\nJared Weinstein\nDennis Duan";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,120);

		// send email
		mail($email,"MicroInvester Email Registration",$msg);
		
        header('Location: ../protected_page');
    }
}