<?php

$servername = "192.185.211.200";
$username = "thiag835_pocpuc";
$password = "senhapocpuc";
$database = "thiag835_pocpuc";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
$GLOBALS["con"] = $con;

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 

  
 