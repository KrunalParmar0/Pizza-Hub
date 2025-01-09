<?php
// session_name("duser");
include 'dashheader.php';
// session_start();
include 'dlhandler.php';
include 'dshandler.php';

    // echo "<br><br><br><br><br><br>";
    echo '';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            border :50px;

            /* background-color:  #e3f2fd; */
        }
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
    </style>
</head>
<body>
    <div class="container" >
        
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php
                echo'<br>';
            if(isset($_SESSION['dloggedin'])){
                if($_SESSION['dloggedin']=="true"){
                    echo'&nbsp;';
          echo '
          <div class="card-group">
          <div class="card text-white bg-dark" style="width: 18rem;"><div class="card-header">Personal Details</div>
          
 <center><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
          </svg></center> <br>
  <div class="card-body text-dark bg-light">
    <h5 class="card-title">Details</h5>
    <h6> Name :' .$_SESSION['namee'].'</h6>
    <p class="card-text">Email : '.$_SESSION['emaill'].'</p>
    ID Numebr : '.$_SESSION['idno'].'
  </div>
</div>';

          echo '<div class="card text-dark bg-light mb-0" style="width: 18rem;">
          <div class="card-header">Pizza\'s Availability</div>
  <div class="card-body text-dark bg-light">
    <h5 class="card-title">Numbers of Pizza Available.</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
    <p class="card-text">Total Numbers of Pizza Available are : ';
    $que = "SELECT * FROM `pizzas`";
    $run = mysqli_query($conn,$que);
    $no = mysqli_num_rows($run);
    if($no>0){ 
        echo $no.'</p>';
    }
    else{
        echo $no;
    }
    echo '
    <a href="dashboard.php" class="card-link text-decoration-none">See In Deatails.</a>
  </div>
</div>
</div>
<br>
<div class="card-group">
<div class="card text-white bg-dark mb-0" style="width: 18rem;">
<div class="card-header">Earnings</div>
  <div class="card-body">
    <h5 class="card-title">Total Profit : </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
     <p class="card-text">Income of Pizza Sold : ';
     ?>
     <?php
     include 'connectuser.php';
     
     $sum = "SELECT SUM(tot_price) FROM sold";
    $runq = mysqli_query($conn1,$sum);
    
    $no = mysqli_num_rows(result: $runq);
    if($no>0){
        while($r = mysqli_fetch_assoc($runq)){
            $tot = $r['SUM(tot_price)'];
            echo number_format($tot) ." Rs";
        }
    }

     echo '</p>
    <a href = "#">';
    echo '</a>
  </div>
</div>
</div>';
echo "<br>";
echo '<div class="card text-white bg-dark mb-3" style="width: 30rem;">
<div class="card-header">Members</div>
<div class="card-body">
  <h5 class="card-title">Members in Pizza Hub.</h5>
  <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
  <a href="view_mem.php" class="text-decoration-none">See in Detail</a>';
                }
            }
            else{
                echo '<center><h5>Login to Makle your Profile Visible.</h5></cenetr>';
            }
          ?>

    </div>
</body>
</html>