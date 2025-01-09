<?php
    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['pname'];
        $nv = $_POST['r1'];
        $price = $_POST['price'];
        $img = $_FILES['pimg']['name'];
        $imgtemp = $_FILES['pimg']['tmp_name'];
   
        $imgfolder = "img/".$img;
        echo "<br>";
        if($name=="" || $price == "" || $img == ""){
          $err =  "Enter All the Fields";
          header("location: dashboard.php?added=false&err=$err");
        }
        else{
          $que = "INSERT INTO `pizzas`(`pname`, `price`, `pimg`,`desc`) VALUES ('$name','$price','$img','$nv')";
          $run = mysqli_query($conn,$que);
          if($run){
            $row = move_uploaded_file($imgtemp,$imgfolder);
            if($row){
              header("location: dashboard.php?added=true");
              }
              else{
                // echo "Get Out Of here";
                header("location: dashboard.php?added=false");
              }
          }
          else{
            // echo " Not Added";
              header("location: dashboard.php?added=false");
          }
        }
        
        
    }
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


<!-- Modal -->
<div class="modal fade" id="addpizzaModal" tabindex="-1" aria-labelledby="addpizzaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addpizzaModalLabel">Adding Pizza to the Pizza Hub</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add_pizza.php" method= "post" enctype="multipart/form-data">
           Enter the Name of Pizza to be Added : <input type="text" name="pname"><br>
           <br>
           Veg Or Non Veg(Description): <input type="text" name="r1"  > &nbsp;<br>
           <br>
           
           Enter the Price of the Pizza : <input type="text" name="price"><br><br>
           Enter the Image for the Pizza : <br>
            <br><input type="File" name="pimg"><br><br>
           <input type="submit" value="Add" class = "btn btn-primary">
        </form>
    </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>