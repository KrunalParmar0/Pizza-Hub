<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      img{
        max-width: 100%;
        height: auto;
        /* margin: 20px; */
        border-radius: 25px;
        display: block;
  margin: auto;
  width: 30%;
      }
      #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color:#e3f2fd;
        color: black;
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
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
 <?php
 include 'add_cart.php';
 include 'header.php';
 
   if(isset($_POST['btns'])){
  

    $pname = $_POST['Pizza_name'];
    $price =$_POST['Pizza_price'];
    $img = $_POST['Pizza_img'];
    $desc = $_POST['infor'];
    // echo $desc;

    echo '&nbsp;<br><button type="button" onclick="history.back()" class="btn-close" aria-label="Close"></button>';
    echo '<br><br> <form action = "add_cart.php" method="POST">
    <input type="hidden" name="Pizza_name" value="'.$pname.'">
<input type="hidden" name="Pizza_price"value="'.$price.'">
<input type="hidden" name="Pizza_img" value="'.$img.'">
    <img src="img/'.$img.'" alt="...">';
    echo '<h2>&nbsp;&nbsp;&nbsp;'.$pname.'</h2>';
    echo '<p class="fs-3">&nbsp;&nbsp;&nbsp;Price per Mediume Span : '.$price.'</p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$desc.'</p>';

    if(isset($_SESSION['loggedin'])){
      if($_SESSION['loggedin']=="true"){
        echo '<p class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary" name="acart" id ="acart" value="Add To Cart"></p>
        </form>
      </div>
      </div>
      </div>
      </div>';
        
      }
    }
    else{
      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Login to Add this Delicious Refreshment to Cart.</b>";
    }
  }
    
 ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>