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

    /* ss because both username and email are a string */
    mysqli_stmt_bind_param($stmt, "sssssss", $fName, $lName, $dob, $houseNo, $postcode, $country, $telephone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /* Successfully created a customer record */
    header("location: ../signup.php?error=none");
    exit();
}

function createBank($conn, $bName, $premiseNo, $postcode, $country, $interestRate){
    $sql = "INSERT INTO bank (branchName, premiseNo, postcode, country, interestRate) VALUES (?, ?, ?, ?, ?);";

    /* Creating a prepare statement for a little bit more security */
    $stmt = mysqli_stmt_init($conn);

    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    /* d because interestRate is a type of double */
    mysqli_stmt_bind_param($stmt, "ssssd", $bName, $premiseNo, $postcode, $country, $interestRate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /* Successfully created a customer record */
    exit();
}

function createAccount($conn, $fName, $customerPostcode, $bName, $branchPostcode, $email, $username, $password, $balance){
    /* Setting a default value for customerID and bankID */
    $customerID = isset($customerID) ? $customerID: 0;
    $bankID = isset($bankID) ? $bankID: 0;

    /* Finding the customers id with the following information: first name + postcode */
    $stmt = $conn->prepare("SELECT customerID FROM customer WHERE fname = ? AND postcode = ?;");
    $stmt->bind_param("ss", $fName, $customerPostcode);
    $stmt->execute();
    $stmt->bind_result($customerID);

    /* Finding the bank id with the following information: branch name + postcode */
    $stmt2 = $conn->prepare("SELECT bankID FROM bank WHERE branchName = ? AND postcode = ?;");
    $stmt2->bind_param("ss", $bName, $branchPostcode);
    $stmt2->execute();
    $stmt2->bind_result($bankID);

    /* Creating a account record with all the following information */
    $sql = "INSERT INTO account (customerID, bankID, email, username, pwd, balance) VALUES (?, ?, ?, ?, ?, ?);";

    /* Creating a prepare statement for a little bit more security */
    $stmt3 = mysqli_stmt_init($conn);

    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt3, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_execute($stmt3);

    /* Closing all the prepare statement used in the previous queries */
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);


    /* Hashing user's password for extra security */
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    /* i because both customerID and bankID are both type int */
    mysqli_stmt_bind_param($stmt, "iisssd", $customerID, $bankID, $email, $username, $hashedPwd, $balance);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /* Successfully created a customer record */
    exit();
}