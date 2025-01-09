<?php
    $id = "localhost";
    $pass = "";
    $servername = "root";
    $db = "pizza";
    
    $conn  = mysqli_connect($id,$servername,$pass,$db);
    //     if(!$conn){
    //     echo "<br> Connection is not made due to : " . mysqli_connect_error();
    // }
    // else{
    //     echo " <br>Connection is made";
    // }
?>