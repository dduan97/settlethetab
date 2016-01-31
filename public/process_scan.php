<script src="../ocrad.js-master/ocrad.js"></script>
<?php
    // configuration
    require("../includes/config.php");
    echo("<script src='../ocrad.js-master/ocrad.js'>
    var string = OCRAD({$_FILES['image']['tmp_name']}); alert(string);</script>");
    ?>