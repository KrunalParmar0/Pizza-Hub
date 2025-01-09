<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br>
    <br>
    <!-- need some changes -->
    <div class="container">
<form action = "signup.php" method = "post">
                        <strong>"The Info marked as * is Compulsory"</strong>
                        <br>
                        <br>
                        Enter the Email : <input type = "email" name = "Email">*
                        <br>
                        <br>
                        Enter your Password : <input type = "password" name = "Pass">*
                        <br>
                        <br>
                        Enter your Confirm Password : <input type = "password" name = "cPass">*
                        <br>
                        <br>
                        Enter your Mobile Number : <input type = "Number" name = "mno">
                        <br>
                        <br>
                        Enter your Address : <input type = "text" name = "add">*
                        <br>
                        <br>
                        <script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}
</script>
                        Enter your First Name : <input type = "text" name = "name" onblur="this.value=removeSpaces(this.value)">
                        <br>
                        <br>
                        Press Here to Sign Up : <input type = "Submit" value = "Sign Up" class="btn btn-outline-success">
                        </form>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>