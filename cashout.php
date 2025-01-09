<?php

        session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
        
      ?>
<!DOCTYPE html>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body><?php
include 'ordernumber.php';
  echo ' <h3>Are you Sure You Want to Confirm order.</h3> ';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    // echo $_SESSION['name'];
    include "connectuser.php";
  if(isset($_SESSION['loggedin'])){
    if($_SESSION['loggedin']=="true"){
      $que = "SELECT * FROM `".$_SESSION['name']."`";
  $run = mysqli_query($conn1,$que);
  
  $no = mysqli_num_rows($run);
  if($no>0){ 
      while($row = mysqli_fetch_assoc($run)){
        $onesum = $row['pizza_price'] * $row['pizza_quantity'];
          echo '
          &nbsp;

  <h5 class="card-title"><b>'. $row['pizza_name'].'</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href ="remove_from_cart.php?remove='.$row['pizza_name'].'"><button type="submit" class="btn-close"></button></a></h5>
  <h6 class="card-text">'.$row['pizza_price'].' Rs For Mediume Span</h6><br>
  <h5> Quantity : '.$row['pizza_quantity'].'</h5>
        
         ';
         GLOBAL $grandtotal;
         $grandtotal=$grandtotal + $onesum;
      }
      
      include 'connectuser.php';
        // include 'connect.php';

          if(isset($_POST['submit'])){
            
            // $_SESSION['profit'] =  $grandtotal;
            $que1 = "SELECT * FROM `".$_SESSION['name']."`";
            $run1 = mysqli_query($conn1,$que1);
            $no1 = mysqli_num_rows($run1);
            if($no1>0){
              
              $que3 = "INSERT INTO ".$_SESSION['name'].""."order"."(`pizza_name`, `pizza_priceo`, `pizza_img`, `pizza_quantity`) 
              SELECT * FROM ".$_SESSION['name']."";
              $run3 = mysqli_query($conn1,$que3);
              if($run3){
                while($row = mysqli_fetch_assoc( $run1)){
                  echo "hello";
                  // echo "<br>".$row['pizza_price'];
                  // echo "<br>".$row['pizza_quantity'];
                  $sum = $row['pizza_price'] * $row['pizza_quantity'];
                  // echo "<br>".$sum;
                  echo $row['pizza_name'];
                  $up = "UPDATE `".$_SESSION['name'].""."order"."` SET `tot_price`='$sum' WHERE pizza_name = '".$row['pizza_name']."'";
                  $r = mysqli_query($conn1,$up);
              }
                // mail sending 

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
                      $mail->addAddress($_SESSION['email'], $_SESSION['name']);     

                      $mail->addReplyTo('pizzahub312@gmail.com', 'Pizza Hub');
                    

                      //Attachments
                    //  $mail->addAttachment('/var/tmp/file.tar.gz');        
                      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

                      //Content
                      $mail->isHTML(true);                                  
                      $mail->Subject = 'Order Successfully placed';
                      $mail->Body    = 'The Order have been successfully Placed.<br>
                      Your Order Number is : '. $k.'<br>
                      <img src="img/oc.jpg" alt="Order Confirmed" width="100">
                      <br>
                      <b> We Will be at the Place in few Minutes!</b>
                      <h4> Thanks for choosing us.</h4>';
                      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                      $mail->send();
                      echo 'Message has been sent';
                    } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    // inserting in to sold table for profit
                    include 'connect.php';

                    // INSERT INTO `sold`(`pizza_name`, `pizza_price`, `pizza_img`, `pizza_quantity`, `tot_price`) 
                    // VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

                    $ques = "INSERT INTO sold SELECT * FROM ".$_SESSION['name'].""."order"."";
                    $runs = mysqli_query($conn1,  $ques);
                    if($runs){
                      echo 1;
                    }
                    else {
                      echo 0;
                    }

                    // for tot_price calculating.

                    


                    $que = "TRUNCATE TABLE `".$_SESSION['name']."`";
                    $run = mysqli_query($conn1,$que);
                    if($run){
                      header("location:cart.php?order=true");
                      echo "Order is Confirmed";
                    }
                    else{
                      header("location:cart.php?order=false");
                    }
                    
              }
              else{
                header("location:cart.php?order=false&order not placed Due to Internal Error");
              }
            }
            
          }
      // echo $_SESSION['profit'];
      echo '<br><br>';
      echo '<h5>Mode Of Payment : Cash On Delivery <br>Total Price is : '.$grandtotal.'</h5>';
      echo '<h6>Your Order Number is :'; ?>
      <?php 
      echo $k;
    echo '</h6><br>
    <form action = "cashout.php" method="post">
    <input type="submit" name="submit" class="btn btn-primary" value="Order Now">
    </form>';
      
    }
  }
}
  }
?>




</body>
</html>