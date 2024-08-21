<?php
if (isset($_POST["submit"])) {

    $name = $_POST["stf_Name"];
    $email = $_POST["stf_Email"];
    $staffPhone = $_POST["number"];
    $staffRole = $_POST["role"];
    $password = $_POST["password"];
    $confirm_password = $_POST["re_password"];

    require_once "dbh.inc.php";
    require_once "functions.php";

    $passwordmatch = pwdMatch($password, $confirm_password);
    $emailExists = emailExists($conn, $email);

    if ($passwordmatch !== false) {
        header("Location:../html/addStaff.php?error=password doesn't match");

        exit();

    }

    if ($emailExists !== false) {
        header("Location:../html/addStaff.php?error=emailtaken");

        exit();

    }

    createUser($conn, $name, $email, $password, $staffRole, $staffPhone);



} else {

    header("Location:../html/addStaff.php");
    exit();
}

