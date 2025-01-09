<?php
// just an example
session_start();
    include 'connectuser.php';
    $que = "SELECT * FROM ".$_SESSION['name']."";
    $sum = 0;
    $run = mysqli_query($conn1,$que);
    if($run){
        $no = mysqli_num_rows($run);
        if($no > 0){
            $que1 = "INSERT INTO `eg`(`pizza_name`, `pizza_priceo`, `pizza_img`, `pizza_quantity`) 
                SELECT * FROM ".$_SESSION['name']."";
            $run1 = mysqli_query($conn1,query: $que1);
            while($row = mysqli_fetch_assoc($run)){
                // echo "<br>".$row['pizza_price'];
                // echo "<br>".$row['pizza_quantity'];
                $sum = $row['pizza_price'] * $row['pizza_quantity'];
                echo "<br>".$sum;
                // echo $row['pizza_name'];
                $up = "UPDATE `eg` SET `tot_price`='$sum' WHERE pizza_name = '".$row['pizza_name']."'";
                $r = mysqli_query($conn1,$up);
            }
        }
    }
    // echo "<br>".$sum;
?>