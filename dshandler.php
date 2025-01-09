<?php
    include 'connect.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['idno'];
        $email = $_POST['Email'];
        $pass = $_POST['Pass'];
        $cpass = $_POST['cPass'];
        $name = $_POST['name'];

        $exist = "SELECT * FROM `dsignup` WHERE Email = '$email'";
        $exe = mysqli_query($conn,$exist);
        $che = mysqli_num_rows($exe);
        if($che == 1){
            $showerror = "Email Already Exists";
        }
        else{
            if($email!="" || $pass != ""){
                if($pass == $cpass){
                    $hpass = password_hash($pass,PASSWORD_DEFAULT);
                    $que = "INSERT INTO `dsignup`(`idno`, `email`, `pass`, `name`) VALUES ('$id','$email','$hpass','$name')";
                    $run = mysqli_query($conn,$que);
                    if($run){
                        $alert = true;
                        header("location: dhome.php?dsignup=true");
                        exit();
                    }
                }
                else{
                    $showerror = "Confirm Pass do not match";
                }
            }
            else{
                $showerror = "Enter The Required Fields";
            }
        }
        header("location: dhome.php?dsignup=false&error=$showerror");
    }
?>