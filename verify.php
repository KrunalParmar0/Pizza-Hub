<?php
if(isset($_GET['otp'])){
  if($_GET['otp'] == "false"){
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Sorry</strong> OTP is incorrect.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
}

if(isset($_GET['email'])){
  if($_GET['email'] == "false"){
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Sorry</strong> Email Does Not Exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
}

  $otp = rand(0000,9999);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verify Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<br><br>
<h3>
  <center>Reset Your Password.</center>
</h3>
<br>


<p>
  <center>We Need Verification before You change the Password. Please click on the link below to confirm that its you.
  </center>
</p>
<div class="container">
  <form action="mail.php" method="post">
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
      <input type="hidden" value="<?php echo $otp; ?>" name="otp" id="otp">
      <br>
      <input type="submit" value="Verify" class="btn btn-outline-success">
      <button type="button" onclick="history.back()" class="btn btn-outline-danger mx-1" aria-label="Close">Close</button>
    </div>
  </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>