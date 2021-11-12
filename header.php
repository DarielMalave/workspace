<?php session_start() ?>

<!DOCTYPE html>
<html>
<?php require_once 'protoProcess.php' ?>

<head>
    <title>Group 12 Hotel</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="navbar-brand" href="protoMain.php">Group 12 Hotel Reservation System</a></li>
            <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="hotelbuildings.php">Hotel Buildings</a></li>
        </ul>
        <ul class="navbar-nav">
            <?php 
            if (isset($_SESSION['loginName'])) {
                echo "<li class='nav-item'><a class='nav-link' href='profile.php'>" . $_SESSION['loginName'] . " (profile)</a></li>";
                echo "<li class='nav-item'><a class='nav-link login' href='logout.php'>Log Out</a></li>";
            }
            else {
                echo "<li class='nav-item'><a class='nav-link' href='protoLogin.php'>Sign Up</a></li>";
                echo "<li class='nav-item'><a class='nav-link login' href='protoLogin.php'>Log In</a></li>";
            }
            ?>
            <!-- <li class="nav-item"><a class="nav-link" href="">Sign Up</a></li>
            <li class="nav-item"><a class="nav-link login" href="">Log In</a></li> -->
        </ul>
    </nav>