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

    <body>
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
                        <!-- Signup Form -->
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php"> Sign Up </a>
                        </li>

                        <!-- Login form -->
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"> Login </a>
                        </li>
                    </ul>
                    <!-- Logout  -->
                    <form class="form-inline my-2 my-lg-0" action="../includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit"> Logout </button>
                    </form>
                </div>
            </nav>
        </header>