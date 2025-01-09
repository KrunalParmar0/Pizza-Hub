<?php
include 'signup.php';
session_start();
    include "connectuser.php";
    if(isset($_POST['acart2'])){
        $pname = $_POST['Pizza_name'];
        $pprice = $_POST['Pizza_price'];
        $pimg = $_POST['Pizza_img'];
        $quantity = '1';
        $af =  ' SELECT * from information_schema.TABLES
        WHERE table_name = "'.$_SESSION['name'].'"';
        $do = mysqli_query($conn1 , $af);
        //inserting 
        $que = "INSERT INTO `".$_SESSION['name'] ."` (`pizza_name`, `pizza_price`, `pizza_img`, `pizza_quantity`) 
        VALUES ('$pname','$pprice','$pimg','$quantity')";
        $run = mysqli_query($conn1, $que);
        if($run){
            header("location:pizzatwo.php?added=true");
            $done = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Item</strong> Added to cart.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        else{
            header("location:pizzatwo.php?added=false");
            $NotDone = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Item</strong> Is already in Cart.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
?>