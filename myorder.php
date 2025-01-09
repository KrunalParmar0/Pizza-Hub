<?php
    include 'header.php';
    echo '<br><ul class="nav nav-underline">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="myorder.php">My Orders</a>
  </li>
</ul>';
echo "<br>";
include 'connectuser.php';
$que = "SELECT * FROM `".$_SESSION['name']."order"."`";
$run = mysqli_query($conn1,$que);
$no = mysqli_num_rows($run);
if($no>0){ 
  echo " <marquee behavior='sroll'direction='right'>Pizza's will Reach You Soon..</marquee>";
  while($row = mysqli_fetch_assoc($run)){
              $onesum = $row['pizza_priceo'] * $row['pizza_quantity'];
                echo '
                &nbsp;
    <div class="card mb-3" style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-4">
   <div class="image-container">
    <img src="img/'.$row['pizza_img'].'" class="card-img-fade" alt="..."></div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><b>'. $row['pizza_name'].'</b></h5>
        <h6 class="card-text">'.$row['pizza_priceo'].' Rs For Mediume Span</h6>
        <p>Quantity : '. $row['pizza_quantity'].'</p>
        <h5> Total Price is :'.number_format($onesum).'</h5>
        <br>
        <br>
      </div>
    </div>
  </div>
</div>';
            }
            
        }
        else{
          echo " <marquee behavior='sroll'direction='right'>No Orders Placed yet.</marquee>";
        }
?>