<?php
/* Checking if the user got to here using the legit way or not (not = enter the url by themselves to try bypass the security for example) */
if(isset($_POST["submit"])){
    /* $uid could be either the username or their email address they used to sign up with */
    $uid = $_POST["uid"];
    $pass = $_POST["pwd"];

    require_once "../includes/dbh.inc.php";
    require_once "../includes/functions.inc.php";

    /* Error handling for user input (In this scenario true = problem with input, false = no problem with input) */
    if(emptyInputLogin($uid, $pass) !== false){
        /* Validation check to ensure that all inputs were filled in */
        header("location: ../php/login.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $uid, $pass);
}else{
    header("location: ../php/login.php");
    exit();
}


