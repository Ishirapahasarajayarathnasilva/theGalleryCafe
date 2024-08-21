<?php

if (isset($_POST["log"])) {
$email = $_POST["email"];
$password = $_POST["password"];

require_once "dbh.inc.php";
require_once "functions.php";

LoginUser($conn, $email, $password);



} else {

header("Location:../html/staffLogin.php");
exit();
}