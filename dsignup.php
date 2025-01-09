<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dash Signup</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body> 
  <div class="modal fade" id="dsignupmodal" tabindex="-1" aria-labelledby="dsignupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="dsignupmodalLabel">Admin Signup For pizza Hub</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action = "dshandler.php" method = "post">
                        <strong>"The Info marked as * is Compulsory"</strong>
                        <br>
                        <br>
                        Enter your Id No : <input type = "text" name = "idno">*
                        <br>
                        <br>
                        Enter the Email : <input type = "email" name = "Email">*
                        <br>
                        <br>
                        Enter your Password : <input type = "password" name = "Pass">*
                        <br>
                        <br>
                        Enter your Confirm Password : <input type = "password" name = "cPass">
                        <br>
                        <br>
                        Enter your Name : <input type = "text" name = "name">
                        <br>
                        <br>
                        Press Here to Sign Up : <input type = "Submit" class =" btn btn-outline-primary" value = "Sign Up">
                        </form>
        </div>
  </div>
</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>