<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- JavaScript/Scripts -->
    <script src="js/script.js"></script>

    <title> Basic Banking Application </title>
</head>

<body>

    <!-- Navigation Bar -->
    <header>
        <nav>
            <a href="#">
                <img src="img/bankLogo.png" alt="logo">
            </a>
            <ul>
                <li><a href="index.php"> Home </a></li>
                <li><a href="#"> About Us </a></li>
                <li><a href="signUp.php"> Sign up </a></li>
                <li><a href="login.php"> Login </a></li>
            </ul>
            <div>
                <form action = "includes/login.inc.php" method = "post">
                    <input type = "text" name = "uid" placeholder = "Username">
                    <input type = "password" name = "pwd" placeholder = "Password">
                    <button type = "submit" name = "login-submit"> Login </button>
                </form>
                <a href = "signup.php"> Sign-Up </a>
                <form action = "includes/logout.inc.php" method = "post">
                    <button type = "submit" name = "logout-submit"> Logout </button>
                </form>
            </div>
        </nav>
    </header>