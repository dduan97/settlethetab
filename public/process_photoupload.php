<?php
    // configuration
    require("../includes/config.php");
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        
        
       // if (empty($_SESSION["id"]))
        //{
            // if user is not already logged in
        //   header("Location: login.php");
        //} else
        {
            // redirect to account information
            render2("photouploadfform.php", ["title" => "Upload receipt"]);
        }    
    }
    
    //else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // http://stackoverflow.com/questions/17717506/how-to-upload-images-into-mysql-database-using-php-code
    $image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name'])); //SQL Injection defence!
    var_dump($image);
    $imagename = $_FILES['fileToUpload']['name'];
    var_dump($imagename);
    // prepare that damn statement
    
    $stmt = $db->stmt_init();
    $stmt->prepare("INSERT INTO images (image, imagename) VALUES (? ?)");
    $stmt->bind_param('ss', $image, $imagename);
    var_dump($stmt);
    //if the statement goes bonkers, redirect to an error page
    if (!$stmt->execute()) {
		//header('Location: ../views/index.php?error=donegoofed81');
		echo("Dagnabbit!"); 
    }
    else{
        echo("Huzzah!");
    }
}
    
?>    