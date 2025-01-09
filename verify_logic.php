<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $cotp = $_POST['checkotp'];
        $otp = $_POST['otp'];

        if($cotp == $otp){
            // echo "done";
            header("location:newpas.php");
        }
        else{ 
            header("location:verify.php?otp=false");
        }
        // header("location:mail.php?mail=true&otp=$otp");
    }
?>  