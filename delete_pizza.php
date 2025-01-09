<?php
    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pizza = $_POST['deleteid'];
        
        $sql = "SELECT `pname`, `price`, `pimg` FROM `pizzas` WHERE `pname` = '$pizza'";
        $sqlrun = mysqli_query($conn,$sql);
        $che = mysqli_num_rows($sqlrun);
        if($che == 1){
            $que = "DELETE FROM `pizzas` WHERE `pname` = '$pizza'";
                $run = mysqli_query($conn,$que);
                if($run){
                    // echo "Deleted";
                    header("location: dashboard.php?deleted=true");
                }
                else{
                    $err =  " Not Deleted";
                    header("location: dashboard.php?deleted=false&error=".$err);
                }
        }
        else{
            $err =  "Not available";
            header("location: dashboard.php?deleted=false&error=".$err);
        }
    }
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


<!-- Modal -->
<div class="modal fade" id="deletepizzaModal" tabindex="-1" aria-labelledby="deletepizzaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deletepizzaModalLabel">Deleting Pizza from the Pizza Hub</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="delete_pizza.php" method= "post">
            <p><b>Type 'Pizza Name' of which you want to Delete.</b><input type="text" name="deleteid" id="deleteid"></p>
           <input type="submit" value="Delete" class = "btn btn-danger">
        </form>
    </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>