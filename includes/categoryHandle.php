<?php
if (isset($_POST["submit"])) {

    $categoryname = $_POST["cat_name"];
    $date = $_POST["date"];


    require_once "dbh.inc.php";
    require_once "functions.php";

    addCategory($conn, $categoryname, $date);



} else {

    header("Location:../html/addcat.php");
    exit();
}