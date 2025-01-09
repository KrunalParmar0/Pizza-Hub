<?php
      // optional
      include 'dashheader.php';
      if(isset($_GET['searchbtn1'])){
           $pizzaname = $_GET['search1'];
           if($pizzaname ==""){
              echo "<br><center><h3>No Entered Value</h3></center>";
           }
           else{
              echo "Searched For : " .$_GET['search1'];
              include "connect.php";
              $que = "SELECT * FROM `pizzas` WHERE `pname` LIKE '%$pizzaname%'";
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
                          <input type="hidden" name="Pizza_img" value="'.$row['pimg'].'">
                        </div>
                      </div>
                      </div>

                      ';
                 }
             }
             else{
                 echo "<br> No Result Found For ".$pizzaname;
             }
           }
          
      }
    ?>