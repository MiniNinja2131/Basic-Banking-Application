<?php
    session_start();
    /* Checking if the user got to here using the legit way or not (not = enter the url by themselves to try bypass the security for example) */
    if(isset($_POST["submit"])){
        $amount = $_POST["depositAmount"];
        $userInfo = $_SESSION["accountInfo"];
        /* For user readability */
        $uid = $userInfo["username"];
        $currentBal = $_SESSION["balance"];

        require_once "../includes/dbh.inc.php";
        require_once "../includes/functions.inc.php";

        /* Error handling for user input (In this scenario true = problem with input, false = no problem with input) */
        if(emptyAmount($amount) !== false){
            /* Validation check to ensure the amount is not lefted empty */
            header("location: ../php/deposit.php?error=emptyInput");
            exit();
        }else if(posIntCheck($amount) !== false){
            /* Validation check to ensure the amount entered is a positive int or float */
            header("location: ../php/deposit.php?error=invalidAmount");
            exit();
        }
        deposit($conn, $uid, $amount, $currentBal);
        
        $bankID = $_SESSION["bankID"];
        $customerID = $userInfo["customerID"];
        /* Creating a transaction history for the user depositing in their money */
        createTransactionHistory($conn, $bankID, $customerID, "DEPOSIT");
        header("location: ../php/deposit.php?error=none");
    }else{
        header("location: ../php/deposit.php");
        exit();
    }

