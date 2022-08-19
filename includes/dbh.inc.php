<!-- Database Handler -->
<?php

$serverName = "localhost";
$dbName = "basicBankDB";
$dbUsername = "root";
/* Xampp pass is defaulted to empty */
$dbPassword = "";

/* Connect to the database */
$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

/* Error message if there was a fail connection to the database */
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}