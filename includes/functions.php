<?php

function addCategory($conn, $categoryname, $date)
{


    $sql = "INSERT INTO categories (category_name, date) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../html/addcat.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $categoryname, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../html/addcat.php?error=none");
    exit();
}

function getCategories($conn)
{
    $sql = "SELECT * FROM categories;";
    $result = mysqli_query($conn, $sql);
    $categories = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }
    return $categories;
}




function addProduct($conn, $foodname, $category, $description, $image_path, $price)
{
    $stmt = $conn->prepare("INSERT INTO food_items (food_name, category_id, food_description, food_image_path, food_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $foodname, $category, $description, $image_path, $price);
    return $stmt->execute();
}

function getProducts($conn)
{
    $sql = "SELECT * FROM `food_items` ";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}



#=========================== Staff Function ============================#

function pwdMatch($password, $confirm_password)
{

    $result = false;

    if ($password !== $confirm_password) {

        $result = true;
    } else {

        $result = false;
    }
    return $result;
}



function emailExists($conn, $email)
{


    $sql = "SELECT * FROM createstaff WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../html/addStaff.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password, $staffRole, $staffPhone)
{

    $sql = "INSERT INTO createstaff( name, email,  password, role, number) VALUES   (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../html/addStaff.php?error=sqlerror");
        exit();
    }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedPwd, $staffRole, $staffPhone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../html/staffLogin.php?error=none");
    exit();
}


#=============================Staff Login================================#


function LoginUser($conn, $email, $password)
{
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {

        header("Location:../html/staffLogin.php?error=wronglogin1");
        exit();
    }
    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("Location:../html/staffLogin.php?error=wronglogin2");
        exit();

    } else if ($checkPwd === true) {


        session_start();
        $_SESSION["userId"] = $emailExists["id"];
        $_SESSION["userEmail"] = $emailExists["email"];
        $_SESSION["userName"] = $emailExists["name"];
        header("Location:../html/staffDashboard?error=none");
        exit();

    }

}