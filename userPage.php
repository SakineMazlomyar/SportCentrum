<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Välommen till user sida!</p>
    <form method="post">
        <input type="submit"  name="isClicked" value="Go back!">
    </form>
    <?php
    //Working on redirect
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol'] == 'admin') {
            header("Location: adminPage.php");
            die();
        } 

        
    }

    if(isset($_POST['isClicked'])){
        //echo   $_SESSION['rol'];
        if($_SESSION['rol'] == "user") {

            unset($_SESSION['rol']);
            header("Location: login.php");
            die();   
          }   
    }
    ?>
    <!-- Here we are going to specify the user and select the order and data for this user -->
</body>
</html>