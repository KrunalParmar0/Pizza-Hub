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
  
    if(isset($_GET['updated'])){
      if($_GET['updated'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Quantity</strong> is Updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Quantity</strong> is not Updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    }
  
    if(isset($_GET['isremoved'])){
      if($_GET['isremoved'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Item</strong> is Removed from Cart.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Item</strong> is not Removed from Cart.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    }
    if(isset($_GET['order'])){
      if($_GET['order'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation</strong> Your order is Confirmed. We\'ll reach you Soon. We have send you an email.
        Till now you can Check Your Orders <a href="myorder.php">here.</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry</strong> the pizza is not available Right now.
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
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
          footer{
            margin : 10px;
            padding : 10px;
            background-color : #e3f2fd;
            color :  black;
            border-radius: 30px;
            text-align: center ;
        }
        marquee{
          margin : 10px 10px;
          background: #deeaee;
          color : black;
        }
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
    </style>
  </head>
  <body>
  <marquee behavior="scroll" direction="right">This is Not the Final Product.</marquee>

  <br>
    <!-- <section class="container">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide 1" src="img5.jpg" alt="one">
                <img id="slide 2" src="img2.jpg" alt="two">
                <img id="slide 3" src="img3.jpg" alt="three">
                <img id="slide 4" src="img1.png" alt="four">
            </div>
            <div class="slider-nav">
                <a href="#slide1"></a>
                <a href="#slide2"></a>
                <a href="#slide3"></a>
                <a href="#slide4"></a>
            </div>
        </div>
    </section> -->
    <br>
  <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Deals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pizza.php">Pizza</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="drinks.php">Drinks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="cart.php">Cart <?php echo '<sup> '.$no .' </sup>'; ?></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
    </ul>
  
    <?php
    // include 'remove_from_cart.php';
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
    <div class="card mb-3" style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-4">
    <img src="img/'.$row['pizza_img'].'" class="card-img-fade" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><b>'. $row['pizza_name'].'</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <a href ="remove_from_cart.php?remove='.$row['pizza_name'].'"><button type="submit" class="btn-close"></button></a></h5>
        <h6 class="card-text">'.$row['pizza_price'].' Rs For Mediume Span</h6><br>
        <br>
        
          <form action = "update_quantity.php" method = "post">
          <input type="hidden" name="pname"id="pname" value="'.$row['pizza_name'].'">
          <h6 class="card-text"> Quantity : &nbsp;&nbsp;<input type="number" max="5" min="1" value="'.$row['pizza_quantity'].'" name ="quantity">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total Cost = '.number_format($onesum).'</h6>
          <br> 
          <input type = "submit" class="btn btn-primary" name="updatequantity" value="Update Quantity">
          </form>
        <br>
        
      </div>
    </div>
  </div>
</div>
               ';  
               // showing grand total
               GLOBAL $grandtotal;

               $grandtotal=$grandtotal + $onesum;
              }  
              echo "<h5>Total Price of the Pizza is : ". number_format($grandtotal) ."</h5>";
              
              echo "<br><a href = 'cashout.php'><input type='submit' class='btn btn-outline-success' value='Order Now'></a>";
         
        }
        else{
          echo "<h4><center>Add <a href='pizza.php'>Pizza</a> to the Cart.</center></h4>";
        }
          }
        }
        else{
          echo "<center><h3>Login to Add Items to Cart.</h3></center>";
        }
        

    ?>

<footer>Created By Krunal &nbsp;
    <a href = "https://www.instagram.com/_krunal_0017?igsh=MXV6aTRiaTVzYmZpOA%3D%3D"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg></a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>