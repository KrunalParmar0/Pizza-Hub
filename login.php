<?php
    include "connect.php";
    // include "signup.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['Email'] ;
        $pass = $_POST['Pass'];
        // GLOBAL $error;
        if($email=="" || $pass == ""){
            $error =  "Enter Required Fields";
            header("location: pizza.php?login=false&error=$error");
            die();
        }
        else{
            $que = "SELECT * FROM `signup` WHERE Email ='$email'";
            $run = mysqli_query($conn, $que);
            $che = mysqli_num_rows($run);
            if($che == 1){
                $row = mysqli_fetch_assoc($run);
                if(password_verify($pass,$row['Pass'])){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['email'] = $row['Email']; 
                    $_SESSION['add'] = $row['Address']; 
                    header("location: pizza.php?login=true");
                }
                else{
                    $error =  "Unable to login";
                    header("location: pizza.php?login=false&error=$error");
                    die();
                }
            }
            else{
                $error = "The Email Does Not Exist.";
                header("location: pizza.php?login=false&error=$error");
                die();
            }
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login To pizza Hub</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form action = "login.php" method = "post">
                        <strong>"The Info marked as * is Compulsory"</strong>
                        <br>
                        <br>
                        Enter the Email : <input type = "email" name = "Email">*
                        <br>
                        <br>
                        Enter your Password : <input type = "password" name = "Pass">*
                        <br>
                        <br>
                        <a href="verify.php" class="text-decoration-none">Forget Password?</a>
                        <br>
                        <br>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#signupModel" class="text-decoration-none">New User? Signup Now</a>
                        <br>
                        <br>
                        Press Here to Login : <input type = "Submit"  class = "btn btn-primary" value = "Login">
                        </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>