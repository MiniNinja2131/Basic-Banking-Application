<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/style.css">

        <!-- JavaScript/Scripts -->
        <script src="../js/script.js"></script>
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title> Basic Banking Application </title>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Navigation bar -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="header-logo" href="index.php">
                    <!-- Logo -->
                    <img src="../img/bankLogo.png" height = "35" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Link Menu item button to the links class navbar-collapse selector -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Use mx-auto to align centre, default to left (mr-auto) -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"> Home </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#"> About Us </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"> Gallery </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"> Contact Us </a>
                        </li>
                    </ul>

                    <!-- Allow the user to login or register a bank account --> 
                    <ul class="navbar-nav ml-auto">
                        <?php
                            /* Check if the user is logged in already or not */
                            if(isset($_SESSION["accountInfo"])){
                                /* Account where the user can deposit, transfer and all the other actions here */
                                echo '<li class="nav-item">  <a class="nav-link" href="transaction.php"> Account </a></li>';
                                /* Log out button if the user is logged in */
                                echo '<li class="nav-item">  <a class="nav-link" href="../includes/logout.inc.php"> Log Out </a></li>';
                            }else{
                                /* Sign up form button on the navigation bar */
                                echo '<li class="nav-item"><a class="nav-link" href="signup.php"> Sign Up </a></li>';
                                /* Login form button on the navigation bar */
                                echo '<li class="nav-item"><a class="nav-link" href="login.php"> Login </a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </header>