<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    include 'connect.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if($email != "" || $pass != ""){
            $que = "SELECT `Email` FROM `signup` WHERE Email = '$email'";
            $run = mysqli_query($conn, $que);
            $no = mysqli_num_rows($run);
            if ($no == 1) {
                $hpass = password_hash($pass,PASSWORD_DEFAULT);
                $update = "UPDATE `signup` SET `Pass`='$hpass' WHERE Email = '$email'";
                $que2 = mysqli_query($conn,$update);
                if($que2){
                    $mail = new PHPMailer(true);
                    try {
                        
                        $mail->isSMTP();                                            
                        $mail->Host       = 'smtp.gmail.com';                     
                        $mail->SMTPAuth   = true;                                   
                        $mail->Username   = 'pizzahub312@gmail.com';                   
                        $mail->Password   = 'kplx nucv nrlt fphx';                               
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
                        $mail->Port       = 587;                                   
                        
                        //Recipients
                            $mail->setFrom('pizzahub312@gmail.com', 'Pizza Hub');
                            $mail->addAddress($email, 'Guest');     
                            
                            $mail->addReplyTo('pizzahub312@gmail.com', 'Pizza Hub');
                            
                            
                            //Attachments
                            //  $mail->addAttachment('/var/tmp/file.tar.gz');        
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
                            
                            //Content
                            $mail->isHTML(true);                                  
                            $mail->Subject = 'Changed Password';
                            $mail->Body    = '.<br>
                            <br>
                            Your Password for this email is changed. <p>
                            If Not you can mail us here Thank you</p>
                            <br>
                            <b> </b>
                            <h4> Thank you.</h4>';
                            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
                            $mail->send();
                            echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                        header("location:home.php?change=true");
                }
                else{
                    header("location:home.php?change=false");
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
      <strong>Sorry </strong> The Email You have entered is Incorrect.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            }
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
      <strong>Please</strong> Enter the Required Fields.
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
    <title>New Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <br><br>
    <h3>
        <center>Reset Your Password.</center>
    </h3>
    <br>


    <p>
        <center> Enter the Email and New Password.</center>
    </p>
    <form action="newpas.php" method="post">
        <div class="container">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <br>
            <input type="submit" class="btn btn-outline-success" value="Change Password">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>