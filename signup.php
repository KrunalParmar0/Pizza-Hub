<!-- '<div class="alert alert-warning alert-dismissible" role="alert">
  <strong>Sorry</strong> Data is not Inserted
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' -->
<!-- signup is a varible -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    include "connect.php";
    include "connectuser.php";
    // $showerror ="false";
    $showerror = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['Email'] ;
        $pass = $_POST['Pass'];
        $add = $_POST['add'];
        $cpass = $_POST['cPass'];
        $name = $_POST['name'];
        $mno = $_POST['mno'];
        $exist = "SELECT * FROM `signup` WHERE `Email` = '$email' || `Name` = '$name'";
        $exe = mysqli_query($conn,$exist);
        $che = mysqli_num_rows(result: $exe);
        if($che == 1){
            $showerror = "Email Or Name Already Exists";
            // echo $showerror;
        }
        else{
            if($email=="" || $pass == "" || $add == ""){
                $showerror = "Enter The Required Fields";
                // echo $showerror;
            }
            else{
                
                if($pass == $cpass){
                    $exist = "SELECT * FROM `signup` WHERE `Name` = '$name'";
                    $exe = mysqli_query($conn,$exist);
                    $che = mysqli_num_rows($exe);
                        $newcust = "CREATE TABLE $name(
                            pizza_name  VARCHAR(50)Primary key,
                            pizza_price INT(50),
                            pizza_img VARCHAR(50),
                            pizza_quantity INT(50)
                       )";
                       $que = mysqli_query($conn1,$newcust);

                       $name1=$name."order";
                       // echo $name;
                       $order = "CREATE TABLE $name1(
                           pizza_name  VARCHAR(50),
                           pizza_priceo INT(50),
                           pizza_img VARCHAR(50),
                           pizza_quantity INT(50),
                           tot_price INT(50)
                        --    datee date DEFAULT CURRENT_TIMESTAMP()
                      )";
                      $que = mysqli_query($conn1,$order);
                    $hpass = password_hash($pass, PASSWORD_DEFAULT);
                    $ins = "INSERT INTO `signup`(`Email`, `Pass`, `Name`, `Address`,`Mno`) VALUES ('$email','$hpass','$name','$add','$mno')";
                    $run = mysqli_query($conn,$ins);
                    if($run){   
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
                        $mail->addAddress($email, $name);     

                        $mail->addReplyTo('pizzahub312@gmail.com', 'Pizza Hub');
                        

                        //Attachments
                        //  $mail->addAttachment('/var/tmp/file.tar.gz');        
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

                        //Content
                        $mail->isHTML(true);                                  
                        $mail->Subject = 'Joining Pizza Hub';
                        $mail->Body    = 'Welcome '.$name.'.<br>
                        <br>
                        We\'re gald To Have you in here. Enjoy the delicious riding from Pizza Hub. <p>
                        If any Issue you can mail us here Thank you</p>
                        <br>
                        <b> </b>
                        <h4> Thanks for Joining us.</h4>';
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo 'Message has been sent';
                        } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                        $alert = true;
                        header("location: home.php?signup=true");
                        // echo "done";
                        exit();
                    }
                    else{
                        // echo " not done";
                    }
                    
                   
                }
                else{
                    $showerror = "Confirm Password Does not Match";
                    // echo $showerror;
                }
            }
        }
        header("location: home.php?signup=false&error=$showerror");
        // echo $showerror;
    }
    ?>
<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup</title>
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
        
        <!-- Modal -->
        <!-- <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#signupModel">SignUp</button> -->
    <div class="modal fade" id="signupModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up To Pizza Hub</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action = "signup.php" method = "post">
                        <strong>"The Info marked as * is Compulsory"</strong>
                        <br>
                        <br>
                        Enter the Email : <input type = "email" name = "Email">*
                        <br>
                        <br>
                        Enter your Password : <input type = "password" name = "Pass">*
                        <br>
                        <br>
                        Enter your Confirm Password : <input type = "password" name = "cPass">*
                        <br>
                        <br>
                        Enter your Mobile Number : <input type = "Number" name = "mno">
                        <br>
                        <br>
                        Enter your Address : <input type = "text" name = "add">*
                        <br>
                        <br>
                        <script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}
</script>
                        Enter your First Name : <input type = "text" name = "name" onblur="this.value=removeSpaces(this.value)">
                        <br>
                        <br>
                        Press Here to Sign Up : <input type = "Submit" value = "Sign Up" class="btn btn-outline-success">
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