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
        header("location: ../php/signup.php?error=stmtFailed");
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
        header("location: ../php/signup.php?error=stmtFailed");
        exit();
    }

    /* ss because both username and email are a string */
    mysqli_stmt_bind_param($stmt, "sssssss", $fName, $lName, $dob, $houseNo, $postcode, $country, $telephone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /* Successfully created a customer record */
    /* header("location: ../signup.php?error=none"); */
}

function createBank($conn, $bName, $premiseNo, $postcode, $country, $interestRate){
    $sql = "INSERT INTO bank (branchName, premiseNo, postcode, country, interestRate) VALUES (?, ?, ?, ?, ?);";

    /* Creating a prepare statement for a little bit more security */
    $stmt = mysqli_stmt_init($conn);

    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/signup.php?error=stmtFailed");
        exit();
    }

    /* d because interestRate is a type of double */
    mysqli_stmt_bind_param($stmt, "ssssd", $bName, $premiseNo, $postcode, $country, $interestRate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /* Successfully created a bank record */
}

function createAccount($conn, $fName, $customerPostcode, $bName, $branchPostcode, $email, $username, $password, $balance){
    /* Finding the customer id with the following information: first name + postcode */
    $sql = "SELECT customerID FROM customer WHERE fName = ? AND postcode = ?;";
    /* Creating a prepare statement for a little bit more security */
    $stmt = mysqli_stmt_init($conn);
    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/signup.php?error=stmtFailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $fName, $customerPostcode);
        mysqli_stmt_execute($stmt);
        /* Fetching the results from the database */
        $customerResult = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($customerResult)){
            $customerID = $row["customerID"];
        }
    }

    /* Finding the bank id with the following information: branch name + postcode */
    $sql2 = "SELECT bankID FROM bank WHERE branchName = ? AND postcode = ?;";
    /* Creating a prepare statement for a little bit more security */
    $stmt2 = mysqli_stmt_init($conn);
    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt2, $sql2)){
        header("location: ../php/signup.php?error=stmtFailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt2, "ss", $bName, $branchPostcode);
        mysqli_stmt_execute($stmt2);
        /* Fetching the results from the database */
        $bankResult = mysqli_stmt_get_result($stmt2);
        if($row = mysqli_fetch_assoc($bankResult)){
            $bankID = $row["bankID"];
        }
    }

    /* Creating a account record with all the following information */
    $sql3 = "INSERT INTO account (customerID, bankID, email, username, pwd, balance) VALUES (?, ?, ?, ?, ?, ?);";

    /* Creating a prepare statement for a little bit more security */
    $stmt3 = mysqli_stmt_init($conn);
 
    /* Check and see if the query contains any errors aka syntax etc */
    if(!mysqli_stmt_prepare($stmt3, $sql3)){
        header("location: ../php/signup.php?error=stmtFailed");
        exit();
    }

    /* Hashing user's password for extra security */
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
 
    /* i because both customerID and bankID are both type int */
     mysqli_stmt_bind_param($stmt3, "iisssd", $customerID, $bankID, $email, $username, $hashedPwd, $balance);
     mysqli_stmt_execute($stmt3);
 
    /* Closing all the prepared statement used in the previous queries */
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
    /* Successfully created a account record that is linked via the customerID and the bankID */
    header("location: ../php/signup.php?error=none");
}

function emptyInputLogin($uid, $pass){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    if(empty($uid) || empty($pass)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uid, $pass){
    /* UIDExists takes in the parameter of the database, username and email and by passing in $uid we can check if the username or email exist in the database */
    $uidExist = UIDExists($conn, $uid, $uid);

    if($uidExist === false){
        header("location: ../php/login.php?error=wrongLogin");
        exit();
    }

    /* Since $uidExist is an associative arrary (mysqli_fetch_assoc) it means that to reference to a piece of the data I would use the column name rather than number indexing */
    $pwdHashed = $uidExist["pwd"];
    /* Fetching the hashed password from database and checking if the passworded enter matches after it has been hashed as well */
    $checkPass = password_verify($pass, $pwdHashed);

    /* Incorrect password */
    if($checkPass === false){
        header("location: ../php/login.php?error=wrongLogin");
        exit();
    }else if($checkPass === true){
        /* Allow the user to be logged in for example */
        session_start();
        $_SESSION["accountInfo"] = $uidExist;
        $_SESSION["balance"] = $uidExist["balance"];
        header("location: ../php/index.php");
        exit();
    }
}

function emptyAmount($amount){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    if(empty($amount)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function posIntCheck($amount){
    /* (In this scenario true = problem with input, false = no problem with input) */
    $result = true;

    /*  Check if the amount that the user entered is an positive int or float */
    if((!is_int($amount) OR !is_float($amount)) AND $amount < 0){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function deposit($conn, $uid, $amount, $currentBal){
   /* Finding the customer account via their username and updating it with the new balance */
   $newBal = $amount + $currentBal;
   $sql = "UPDATE account SET balance = ? WHERE username = ?";
   /* Creating a prepare statement for a little bit more security */
   $stmt = mysqli_stmt_init($conn);
   /* Check and see if the query contains any errors aka syntax etc */
   if(!mysqli_stmt_prepare($stmt, $sql)){
       header("location: ../php/deposit.php?error=stmtFailed");
       exit();
   }else{
       mysqli_stmt_bind_param($stmt, "is", $newBal, $uid);
       mysqli_stmt_execute($stmt);
   }
    $_SESSION["balance"] = $newBal;
    /* Closing all the prepared statement used in the previous queries */
    mysqli_stmt_close($stmt);
    header("location: ../php/deposit.php?error=none");
}