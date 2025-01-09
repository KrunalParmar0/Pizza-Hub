<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Members</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  include 'dashheader.php';
  include "connect.php";
  $que = "SELECT * FROM `signup`";
  $run = mysqli_query($conn, $que);
  $no = mysqli_num_rows($run);
  if ($no > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
      echo '
                    &nbsp;
        <div class="card mb-3" style="max-width: 1200px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="image-container">
                        <img src="img/guest.jpg" class="card-img-fade" alt="..." width="100px">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><b> Name : ' . $row['Name'] . '</b></h5>
                        <h6 class="card-text">Email Address : ' . $row['Email'] . ' </h6>
                        <h6 class="card-text">Current Address : ' . $row['Address'] . '</h6>
                        <h6 class="card-text">Date Of Joining :' . $row['Doc'] . '</h6>
                        <br>
                        <br>
                        <br>
                        <form method = "post">
                        <input type="hidden" value="' . $row['Name'] . '" id="nameid" name="nameid">
                        <input type ="submit" name="delete" id= "delete" class="btn btn-outline-danger" Value="Delete Member">
                       </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
                ';
    }
  } else {
    echo "<br><b><center>There Are no Members In Pizza Hub.</center></b>";
  }
  ?>
  <?php

  // echo "asd";
  include 'connectuser.php';
  if (isset($_POST['delete'])) {
    // echo $_POST['nameid'];
    $que = "DELETE FROM `signup` WHERE `Name` = '" . $_POST['nameid'] . "'";
    $run = mysqli_query($conn, query: $que);
    $que2 = "DROP TABLE `" . $_POST['nameid'] . "`";
    $run2 = mysqli_query($conn1, query: $que2);
    $que2 = "DROP TABLE `" . $_POST['nameid'] . ""."order"."`";
    $run2 = mysqli_query($conn1, query: $que2);
    if ($run && $run2) {
      $done = true;
    } else {
      $done = false;
    }
    if ($done) {
      echo '<div class="alert alert-success alert-dismissible" role="alert">
    <strong>' . $_POST['nameid'] . '</strong> is Deleted With its Cart Info.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } 
    else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Sorry </strong> Member is not Deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }


  ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>