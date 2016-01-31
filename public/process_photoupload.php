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
    $image = addslashes(file_get_contents($_FILES['fileToUpload']['name'])); //SQL Injection defence!
    //$image_name = addslashes($_FILES["image"]); '{$_SESSION["id"]}',
    $sql = "INSERT INTO images (image) VALUES ({$image})";
    if (!$sql->execute()) {
				header('Location: ../views/index.php?error=donegoofed81');
    }    
}
    
?>    