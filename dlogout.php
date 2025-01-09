<?php   
    session_name("duser");
    session_start();
    session_destroy();
    header("location:/piza/dhome.php?dlogout=true");
?>