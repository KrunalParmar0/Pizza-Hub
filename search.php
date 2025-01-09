<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        #snackbar {
          visibility: hidden;
          min-width: 250px;
          margin-left: -125px;
          background-color: #333;
          color: #fff;
          text-align: center;
          border-radius: 2px;
          padding: 16px;
          position: fixed;
          z-index: 1;
          left: 50%;
          bottom: 30px;
          font-size: 17px;
        }

        #snackbar.show {
          visibility: visible;
          -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
          animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
          from {bottom: 0; opacity: 0;} 
          to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
          from {bottom: 0; opacity: 0;}
          to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
          from {bottom: 30px; opacity: 1;} 
          to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
          from {bottom: 30px; opacity: 1;}
          to {bottom: 0; opacity: 0;}
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php

    include 'header.php';

    include 'login.php';
    include 'signup.php';

      include "connectuser.php";
      if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin']=="true"){
          $que = "SELECT * FROM `".$_SESSION['name']."`";
          $run = mysqli_query($conn1,$que);
          $no = mysqli_num_rows($run);
          if($no>0){ 
              // while($row = mysqli_fetch_assoc($run)){
              // echo $no;
              // }
          }
        }
      }
      else{
       $no = 0;
      }


   echo'<ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Deals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pizza.php">Pizza</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="drinks.php">Drinks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart'; echo "<sup> ". $no ."</sup>"; echo ' </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>';
    if(isset($_GET['searchbtn'])){
         $pizzaname = $_GET['search'];
         if($pizzaname ==""){
            echo "<br><center><h3>No Entered Value</h3></center>";
         }
         else{
            echo "Searched For : " .$_GET['search'];
            include "connect.php";
            $que = "SELECT * FROM `pizzas` WHERE `pname` like '%$pizzaname%'";
            $run = mysqli_query($conn,$que);
            $no = mysqli_num_rows($run);
            if($no>0){ 
               echo "<br>Showing Result...";
               while($row = mysqli_fetch_assoc($run)){
                   echo '
                   &nbsp;
                   <div class="card mb-3" style="max-width: 1200px;">
                   <div class="row g-0">
                   <div class="col-md-4">
                        <img src="img/'.$row['pimg'].'" class="card-img-fade" alt="...">
        
                   </div>
                   <div class="col-md-8">
                   <div class="card-body">
                   <h5 class="card-title"><b>'. $row['pname'].'</b></h5>
                   <h6 class="card-text">'.$row['price'].' Rs For Mediume Span</h6>
                   <br>
                   <br>
                   
                   <br>
                   <br>
                   <form action = "add_cart.php" method="POST">
                   <input type="hidden" name="Pizza_name" value="'.$row['pname'].'">
                   <input type="hidden" name="Pizza_price"value="'.$row['price'].'">
                   <input type="hidden" name="Pizza_img" value="'.$row['pimg'].'">';
   
   
                   if(isset($_SESSION['loggedin'])){
                       if($_SESSION['loggedin']=="true"){
                           echo '<p class="ca1rd-text"><input type="submit" class="btn btn-primary" name="acart" id ="acart" value="Add To Cart"></p>
                           </form>
                           <form action="fullpizza.php" method="post"> 
  <input type="hidden" name="Pizza_name" value="'.$row['pname'].'">
  <input type="hidden" name="infor" value="'.$row['desc'].'">
    <input type="hidden" name="Pizza_price"value="'.$row['price'].'">
<input type="hidden" name="Pizza_img" value="'.$row['pimg'].'">

  <input type="submit" name="btns" 
  Value="See details" class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
</form>
                           </div>
                           </div>
                           </div>
                           </div>';
                       }
                   }
                   else{
                       echo '                           </form>
                             <button onclick="myFunction()" class="btn btn-primary">Add to cart</button>
<form action="fullpizza.php" method="post"> 
  <input type="hidden" name="Pizza_name" value="'.$row['pname'].'">
  <input type="hidden" name="infor" value="'.$row['desc'].'">
    <input type="hidden" name="Pizza_price"value="'.$row['price'].'">
<input type="hidden" name="Pizza_img" value="'.$row['pimg'].'">
<br>
  <input type="submit" name="btns" 
  Value="See details" class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
</form>
<div id="snackbar">You Need To be Logged in First.</div>

<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
                           </div>
                           </div>
                           </div>
                           </div>
                           ';  
                   }
               }
           }
           else{
               echo "<br> No Result Found For ".$pizzaname;
           }
         }
        
    }
?>
