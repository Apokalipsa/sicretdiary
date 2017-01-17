<?php

    $link = mysqli_connect("localhost", "root", "", "secretdi");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>