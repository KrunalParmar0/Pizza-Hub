<?php
    // Important
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>couresal</title>
    <style>
        .container{
            margin: auto;
            width: 70%;
            height: 450px;
            display: flex;
            justify-content: center;
            gap:20px;
        }
        .container img{
            width: 20%;
            height: 100%;
            object-fit:cover;
            border-radius: 10px;
            border: 2px solid white;
            transition: all ease-in-out 0.5s;
        }
        .container img:hover{
            width: 50%;
        }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <img src="allimages/img5.jpg" alt="one">
        <img src="allimages/img2.jpg" alt="two">
        <img src="allimages/img3.jpg" alt="three">
        <img src="allimages/img1.png" alt="four">
        <img src="img/piza.jpg" alt="five">
    </div>
</body>
</html>