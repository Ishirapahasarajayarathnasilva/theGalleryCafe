<?php

$serverName = "localhost";
$dbUsername = "admin";
$dbPassword = "mysql";
$dbName = "resturantdb";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed !!" . mysqli_connect_error());
}