<?php
include 'connect.php';

// include 'login.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $add = $_POST['add'];
    $email = $_POST['email'];
    // echo $email;
    // echo $add;
    $que = "UPDATE `signup` SET `Address`='$add' WHERE `Email` = '$email'";
    $run = mysqli_query($conn, $que);
    if ($run) {
        header("location:profile.php?changed=true");
    } else {
        header("location:profile.php?changed=false");
    }

}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Address</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php

    ?>
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Change Address.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="changeadd.php" method="post">


                        <!-- Enter the New Address : <input type = "text" name = "add"> -->

                        <input type="hidden" value="<?php if (isset($_SESSION['loggedin'])) {
                            if ($_SESSION['loggedin'] == "true") {
                                echo $_SESSION['email'];
                            }
                        }
                        ?>" name="email">
                        <textarea name="add" id="add" class="form-control" row="3">Enter New Address.</textarea><br>
                        <br>

                        Press Here to Submit : <input type="Submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>