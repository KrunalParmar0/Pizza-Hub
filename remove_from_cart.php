<?php
  include 'connectuser.php';
  session_start();
  if(isset($_GET['remove'])){
    $name = $_GET['remove'];
    $que = "DELETE FROM `".$_SESSION['name']."` WHERE `pizza_name` = '$name'";
    $run=mysqli_query($conn1,$que);
    if($run){
      header("location:cart.php?isremoved=true");
    }
    else{
      header("location:cart.php?isremoved=false");
      // echo "not Done";
    }
  }
?>
