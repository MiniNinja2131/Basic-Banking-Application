<?php
session_start();
/* Checking if the user got to here using the legit way or not (not = enter the url by themselves to try bypass the security for example) */
if(isset($_POST["submit"])){
    /* $uid could be either the username or their email address they used to sign up with */
    $amount = $_POST["depositAmount"];
    $userInfo = $_SESSION["accountInfo"];
    /* For user readability */
    $uid = $userInfo["username"];
    $currentBal = $userInfo["balance"];

    require_once "../includes/dbh.inc.php";
    require_once "../includes/functions.inc.php";

    /* Error handling for user input (In this scenario true = problem with input, false = no problem with input) */
    if(posIntCheck($amount) !== false){
        /* Validation check to ensure the amount is not lefted empty */
        header("location: ../php/deposit.php?error=emptyInput");
        exit();
    }else if(posIntCheck($amount) !== false){
        /* Validation check to ensure the amount entered is a positive int or float */
        header("location: ../php/deposit.php?error=invalidAmount");
        exit();
    }

    deposit($conn, $uid, $amount, $currentBal);
}else{
    header("location: ../php/deposit.php");
    exit();
}

