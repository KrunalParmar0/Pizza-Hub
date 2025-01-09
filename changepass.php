
<?php
        // include 'header.php';
        include 'connect.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $npass = $_POST['npass'];
            // echo $email;
            $que = "SELECT * FROM `signup` WHERE Email = '$email'";
            $run = mysqli_query($conn,$que);
            $no = mysqli_num_rows($run);
            if($no>0){
                while($row = mysqli_fetch_assoc($run)){
                    if($npass == ""){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Enter </strong> Password.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                    else{
                        $opass = $row['Pass'];
                        $nhpass = password_hash($npass,PASSWORD_DEFAULT);
                        // echo $nhpass;
                        // echo $nhpass;
                        $que2 = "UPDATE `signup` SET Pass ='$nhpass' WHERE Email = '$email'";
                        $run2 = mysqli_query($conn,$que2);
                        if($run2){
                            header("location:home.php?passchanged=true");
                        }
                        else{
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Sorry </strong> the Password is same.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    }
                }
            }
            else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Sorry </strong>Email Doesn\'t Exists.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    ?>



                <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <br><br>
        <h3> <center>Reset Your Password.</center> </h3>
    <br>

    
  <form action = "changepass.php" method = "post">
                    <div class="container">
                        <div class="form-floating mb-3">
                            <input type="email" name = "email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            <br>
                            <div class="form-floating">
                            <input type="password" name = "npass"class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            </div>
                        </div>
                        <input type="submit" value="Reset Password" class="btn btn-outline-success">
                    </div>
                </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>