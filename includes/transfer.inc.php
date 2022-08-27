<?php
session_start();
/* Checking if the user got to here using the legit way or not (not = enter the url by themselves to try bypass the security for example) */
if(isset($_POST["submit"])){
    $transferID = $_POST["transferID"];
    $amount = $_POST["transferAmount"];

    $userInfo = $_SESSION["accountInfo"];
    /* For user readability */
    $currentUsername = $userInfo["username"];
    $currentBal = $_SESSION["balance"];

    require_once "../includes/dbh.inc.php";
    require_once "../includes/functions.inc.php";

    $transferUser = accountExists($conn, $transferID, $transferID);
    /* For user readability */
    $transerUsername = $transferUser["username"];
    $transerCurrentBal = $transferUser["balance"];

    /* Error handling for user input (In this scenario true = problem with input, false = no problem with input) */
    if(emptyTransfer($transferID, $amount) !== false){
        /* Validation check to ensure the amount is not lefted empty */
        header("location: ../php/transfer.php?error=emptyInput");
        exit();
    }else if(posIntCheck($amount) !== false){
        /* Validation check to ensure the amount entered is a positive int or float */
        header("location: ../php/transfer.php?error=invalidAmount");
        exit();
    }else if($currentBal - $amount < 0){
        /* Validation check to the current user has enough money in their account to transfer to another user */
        header("location: ../php/transfer.php?error=exceedAmount");
        exit();
    }else if(strcmp($currentUsername, $transerUsername) == 0){
        /* Validation check so that the user cannot enter in their own ID */
        header("location: ../php/transfer.php?error=sameID");
        exit();
    }

    transfer($conn, $currentUsername, $transerUsername, $amount, $currentBal, $transerCurrentBal);
}else{
    header("location: ../php/transfer.php");
    exit();
}
