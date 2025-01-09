<?php
        include 'dashheader.php';
  
        include 'add_pizza.php';
        include 'delete_pizza.php';
        //sign up done 

        if(isset($_GET['dsignup'])){
            if($_GET['dsignup']=="true"){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
              <strong>Congratulation</strong> You Can Login Now.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <strong>Sorry</strong> Unable to Sign-up.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }

        // login success 

        if(isset($_GET['dlogin'])){
            if( $_GET['dlogin']=="true"){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
              <strong>Congratulation</strong> You are Logged In.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <strong>Sorry</strong> Unable to login.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }

        // pizza added

        if(isset($_GET['added'])){
          if( $_GET['added']=="true"){
              echo '<div class="alert alert-success alert-dismissible" role="alert">
            <strong>Congratulation</strong> Pizza is Added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          else{
              echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <strong>Sorry</strong> Pizza already Exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
      }

      // deleted 

      if(isset($_GET['deleted'])){
        if( $_GET['deleted']=="true"){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
          <strong>Congratulation</strong> Pizza is Deleted.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
          <strong>Sorry</strong> Pizza Does not Exists.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }
      echo "<br>";
      echo "<br>";
        

        if(isset($_SESSION['dloggedin'])){
          if($_SESSION['dloggedin']=="true"){
            echo '<div class = "container"><b><h4>Product Customization</h4></b>';
        echo '<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Pizza</h5>
      <p class="card-text">For Adding pizza to<a href= "home.php"> Pizza Hub Official</a></p>
      <a href="add_pizza.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpizzaModal">Add Pizza</a>
    </div>
  </div>';
  echo ' <div class="card">
  <div class="card-body">
    <h5 class="card-title">Delete Pizza</h5>
    <p class="card-text">For Deleting pizza From<a href= "home.php"> Pizza Hub Official</a></p>
    <a href="delete_pizza.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deletepizzaModal">Delete Pizza</a>
  </div>
  </div> </div> <br><hr>';
  echo ' <br> <div class = "container"><b><h4>Members Customization</h4></b><div class="card">
  <div class="card-body">
    <h5 class="card-title">View Pizza-Hub Members</h5>
    <p class="card-text">View Who are the members of <a href= "home.php"> Pizza Hub Official</a></p>
    <a href="view_mem.php" class="btn btn-primary">View Members</a>
  </div>
  </div></div><br><hr>';
          }
        }
        else{
          echo "<div class='container'><b><h4>Login To Add or delete the Pizza From <a href= 'home.php'> Pizza Hub Official</a></h4> </b>";
        echo ' <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Pizza</h5>
      <p class="card-text">For Adding pizza to<a href= "home.php"> Pizza Hub Official</a></p>
      <button onclick="myFunction()" class="btn btn-primary">Add Pizza</button>
  
  <div id="snackbar">You Need login First.</div>
  
  <script>
  function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  </script>
     <!--- <a href="add_pizza.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpizzaModal" disabled>Add Pizza</a> --->
    </div>
  </div>';
  echo ' <div class="card">
  <div class="card-body">
    <h5 class="card-title">Delete Pizza</h5>
    <p class="card-text">For Deleting pizza From<a href= "home.php"> Pizza Hub Official</a></p>
     <button onclick="myFunction()" class="btn btn-primary">Delete Pizza</button>
  
  <div id="snackbar">You Need login First.</div>
  
  <script>
  function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  </script>
    <!--- <a href="delete_pizza.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deletepizzaModal" disabled>Delete Pizza</a> --->
  </div>
  </div></div><br><hr>';
        }
        
        
      

        
      // Displaying Pizza at dashboard
        include 'dlhandler.php';
        include "connect.php";
        if(isset($_SESSION['dloggedin'])){
          if($_SESSION['dloggedin']=="true"){
            $que = "SELECT * FROM `pizzas`";
        $run = mysqli_query($conn,$que);
        $no = mysqli_num_rows($run);
        if($no>0){ 
          echo "<div class='container'><center><h4>Pizza Available on <a href ='home.php'> Pizza Hub </a> are shown Below:</h4></center>" ;
            while($row = mysqli_fetch_assoc($run)){
                echo '<form action = "update_pizza.php" method="POST">
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
        <input type="hidden" name="Pizza_name" value="'.$row['pname'].'">
<input type="hidden" name="Pizza_price"value="'.$row['price'].'">
<input type="hidden" name="Pizza_img" value="'.$row['pimg'].'">
        <br>
        <br>
     <!---    <a href="update_pizza.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatemodal">Update Pizza</a> --->
      </div>
    </div>
  </div>
</div>
</form>
';  
            }
            echo '<br><br><br><br><br>';
         echo '</div>';   
        }
        else{
          echo "<center><h4>There are No Pizza's Available on <a href ='home.php'> Pizza Hub </a>.</h4></center>" ;
        }
          }
        }
        else{
          echo "<center><h4>Login To See the Available Pizza's In <a href='home.php'>Pizza Hub</a></h4></center>";
        }
        
        
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  <style>footer{
            margin : 10px;
            padding : 10px;
            background-color : #e3f2fd;
            color :  black;
            border-radius: 30px;
            text-align: center ;
        }</style>
  </head>
  <body>

 
    <br>
    


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <footer>Created By Krunal &nbsp;
    <a href = "https://www.instagram.com/_krunal_0017?igsh=MXV6aTRiaTVzYmZpOA%3D%3D"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg></a>
    </footer>
  </body>
</html>