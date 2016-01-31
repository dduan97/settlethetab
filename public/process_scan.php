<script src="../ocrad.js-master/ocrad.js"></script>
<?php
    // configuration
    require("../includes/config.php");
    $test = $_FILES['image']['tmp_name'];
    echo("<script src='../ocrad.js-master/ocrad.js'>
    function draw() {
        // Get the canvas element and set the dimensions. 
        var canvas = document.createElement('canvas');
        canvas.height = window.innerHeight;
        canvas.width = window.innerWidth;
 
       // Get a 2D context.
        var ctx = canvas.getContext('2d');
 
        // create new image object to use as pattern
        var img = new Image();
        img.src = '../images/receipt.JPG'
        img.onload = function(){
            // Create pattern and don't repeat! 
           var ptrn = ctx.createPattern(img,'no-repeat');
           ctx.fillStyle = ptrn;
           ctx.fillRect(0,0,canvas.width,canvas.height);
 
        }
 }
    var string = OCRAD(img); alert(string); alert('hit this')</script>");
   
?>