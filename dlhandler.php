<?php
    include "connect.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['Email'] ;
        $pass = $_POST['Pass'];
        GLOBAL $error;
        if($email=="" || $pass == ""){
            $error =  "Enter Required Fields";
            // echo $error;
            header("location: dhome.php?dlogin=false&error=$error");
            die();
        }
        else{
            $que = "SELECT * FROM `dsignup` WHERE `email` ='$email'";
            $run = mysqli_query($conn, $que);
            $che = mysqli_num_rows($run);
            if($che == 1){
                $row = mysqli_fetch_assoc($run);
                if(password_verify($pass,$row['pass'])){
                if($hpass = $row['pass']){
                    session_name("duser");
                    session_start();
                    $_SESSION['dloggedin'] = true;
                    $_SESSION['namee'] = $row['name'];
                    $_SESSION['emaill'] = $row['email'];
                    $_SESSION['idno'] = $row['idno'];
                    // echo "Done";
                    header("location: dhome.php?dlogin=true");
                }
                else{
                    $error =  "Unable to login";
                    echo $error;
                    header("location: dhome.php?dlogin=false&error=$error");
                    die();
                }
            }
            else{
                $error = "The Email Does Not Exist.";
                header("location: dhome.php?dlogin=false&error=$error");
                // echo $error;
                die();
            }
        }
    }
}
?>