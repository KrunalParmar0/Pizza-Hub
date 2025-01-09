<?php
// include 'header.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  // echo $email;
  $otp = $_POST['otp'];
  // echo $otp;
  $que = "SELECT `Email` FROM `signup` WHERE Email = '$email'";
  $run = mysqli_query($conn, $que);
  $no = mysqli_num_rows($run);
  if ($no == 1) {
    $mail = new PHPMailer(true);


    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'pizzahub312@gmail.com';
      $mail->Password = 'kplx nucv nrlt fphx';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      //Recipients
      $mail->setFrom('pizzahub312@gmail.com', 'Pizza Hub');
      $mail->addAddress($email, 'guest');

      $mail->addReplyTo('pizzahub312@gmail.com', 'Pizza Hub');


      //Attachments
      //  $mail->addAttachment('/var/tmp/file.tar.gz');        
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Email Verification';
      $mail->Body = 'The OTP is ' . $otp . '</b>
          <h4> Thanks You </h4>';
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      // $mail->send();
      if ($mail->send()) {

        // echo 'Message has been sent';
        echo '<div class="alert alert-success alert-dismissible" role="alert">
      <strong>OTP</strong> Sent to your Email.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        echo '';
        // header("location:newpass.php?email=true");
      }
    } catch (Exception $e) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
          <strong>Sorry</strong> For inconveniences. <strong>Server Error!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    header("location:verify.php?email=false");
  }
}
// }
//Create an instance; passing `true` enables exceptions
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forget Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
    </style>
</head>

<body>
  <br><br>
  <h3>
    <center>Reset Your Password.</center>
  </h3>
  <br>

  <p>
    <center>The OTP is Send to your Email. Please Enter the otp to Confirm your Email.</center>
  </p>
  <div class="container">
    <form action="verify_logic.php" method="post">
      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="checkotp" id="floatingInput" required>
        <label for="floatingInput">OTP</label>
        <input type="hidden" value="<?php echo $otp; ?>" name="otp">
        <br>
        <input type="submit" value="Verify" class="btn btn-outline-success">
      </div>
    </form>
    <!-- <a href="home.php"><input type="submit" value="Back to Home" class="btn btn-outline-danger"></a> -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>