<?php   
session_start();
    session_destroy();
    header("location:/piza/home.php?logout=true");
?>