<?php
include 'connectuser.php';
session_start();
      if(isset($_POST['updatequantity'])){
        $qua = $_POST['quantity'];
        $pname = $_POST['pname'];
        $que = "UPDATE `".$_SESSION['name']."` SET `pizza_quantity`='$qua' WHERE `pizza_name` = '$pname'";
        $run = mysqli_query($conn1,$que);
        if($run){
            header("location:cart.php?updated=true");
        }
        else{
            header("location:cart.php?updated=false");        
        }  
    }
?>