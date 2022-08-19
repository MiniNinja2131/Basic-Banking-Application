<?php

function emptyInputSignup($fName, $lName, $dob, $houseNo, $postcode, $country, $telephone, $email, $username, $pass, $passRepeat){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    if(empty($fName) || empty($lName) || empty($dob) || empty($houseNo) || empty($postcode) || empty($country) || empty($telephone) || empty($email) || empty($username) || empty($pass) || empty($passRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUID($username){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pass, $passRepeat){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    if($pass !== $passRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function UIDExists($conn, $username, $email){
    $sql = "SELECT * FROM account WHERE username = ? OR email = ?;";

    /* Creating a prepare statement for a little bit more security */
    $stmt = mysqli_stmt_init($conn);

    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    /* ss because both username and email are a string */
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    /* Can be used for both login and signup form */
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createCustomer($conn, $fName, $lName, $dob, $houseNo, $postcode, $country, $telephone){
    $sql = "INSERT INTO customer (fName, lName, dob, houseNo, postcode, country, telephone) VALUES (?, ?, ?, ?, ?, ?, ?);";

    /* Creating a prepare statement for a little bit more security */
    $stmt = mysqli_stmt_init($conn);

    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    /* for account creation */
    /* $hashedPwd = password_hash($pass, PASSWORD_DEFAULT); */

    /* ss because both username and email are a string */
    mysqli_stmt_bind_param($stmt, "ss?sss?", $fName, $lName, $dob, $houseNo, $postcode, $country, $telephone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /* Successfully created a customer record */
    header("location: ../signup.php?error=none");
    exit();
}