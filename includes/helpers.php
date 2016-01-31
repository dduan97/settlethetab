<?php

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("views/header.php");
            require("views/{$view}");
            require("views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
    
    
    function render2($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);
            // if statements remove header and footer for home page
            // render view (between header and footer)
            if (!in_array($_SERVER["PHP_SELF"], ["/index.php"]))
            {
                require("../views/header.php");
            }
            require("../views/{$view}");
            if (!in_array($_SERVER["PHP_SELF"], ["/index.php"]))
            {
                require("../views/footer.php");
            }
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
?>    