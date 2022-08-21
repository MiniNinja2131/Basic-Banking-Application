<?php

/* Checking if the user got to here using the legit way or not (not = enter the url by themselves to try bypass the security for example) */
if(isset($_POST["submit"])){
    /* Information below is used to create a bank each branch would need to change this data */
    $bName = "Halifax";
    $premiseNo = "45";
    $branchPostcode = "DZ5 7RP";
    $branchCountry = "United Kingdom";
    $interestRate = 0.185;
    
    /* Information below is used to create a customer record in the customer table */
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $dob = $_POST["dob"];
    $houseNo = $_POST["houseNo"];
    $postcode = $_POST["postcode"];
    $country = $_POST["country"];
    $telephone = $_POST["telephone"];

    /* Information below is used to create a account record in the account table */
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pass = $_POST["pwd"];
    $passRepeat = $_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    /* Error handling for user input (In this scenario true = problem with input, false = no problem with input) */
    if(emptyInputSignup($fName, $lName, $dob, $houseNo, $postcode, $country, $telephone, $email, $username, $pass, $passRepeat) !== false){
        /* Validation check to ensure that all inputs were filled in */
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if(invalidUID($username) !== false){
        /* Validation check to ensure that the user has inputted a valid username (only contains letters and numbers) */
        header("location: ../signup.php?error=invalidUID");
        exit();
    }

    if(invalidEmail($email) !== false){
        /* Validation check to ensure that the user has inputted a valid email */
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if(pwdMatch($pass, $passRepeat) !== false){
        /* Validation check to ensure the password entered is the one they intended to (no typos etc) */
        header("location: ../signup.php?error=passwordDontMatch");
        exit();
    }

    if(UIDExists($conn, $username, $email) !== false){
        /* Validation check to ensure the username or email that the user want is not taken */
        header("location: ../signup.php?error=usernameOrEmailTaken");
        exit();
    }

    /* Creating a bank record */
    /*createBank($conn, $bname, $premiseNo, $branchPostcode, $branchCountry, $interestRate);*/ 
    /* Creating a customer record */
    createCustomer($conn, $fName, $lName, $dob, $houseNo, $postcode, $country, $telephone);
    /* Creating a account record */
    createAccount($conn, $fName, $postcode, $bName, $branchPostcode, $email, $username, $pass, 0.00);

    
}else{
    /* If they try to get to here illegitimately then redirect them back to the sign up page */
    header("location: ../signup.php");
    exit();
}