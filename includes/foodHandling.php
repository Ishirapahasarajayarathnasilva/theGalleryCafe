
<?php

require_once __DIR__ . "/dbh.inc.php";
require_once __DIR__ . "/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $foodname = mysqli_real_escape_string($conn, $_POST['food_name']);
    $category = mysqli_real_escape_string($conn, $_POST['food_category']);
    $description = mysqli_real_escape_string($conn, $_POST['food_description']);
    $price = $_POST['food_price'];
    $image = $_FILES['food_photo']['name'];
    $image_size = $_FILES['food_photo']['size'];
    $image_tmp_name = $_FILES['food_photo']['tmp_name'];
    $image_folder = 'C:/wamp64/www/Resturant2/uploadImages/' . $image;

    if (!is_dir('C:/wamp64/www/Resturant2/uploadImages/')) {
        mkdir('C:/wamp64/www/Resturant2/uploadImages/', 0777, true);
    }

    $imageFileType = strtolower(pathinfo($image_folder, PATHINFO_EXTENSION));
    $check = getimagesize($image_tmp_name);
    $uploadOk = 1;


    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    } elseif ($image_size > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        // Check if product name already exists
        $select_product_name = mysqli_query($conn, "SELECT food_name FROM food_items WHERE food_name = '$foodname'") or die('Query failed');

        if (mysqli_num_rows($select_product_name) > 0) {
            echo "Product name already added.";
        } else {
            // Add product to database
            if (addProduct($conn, $foodname, $category, $description, $image_folder, $price)) {
                // Move uploaded file
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    echo "Product added successfully!";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Error adding product to database.";
            }
        }
    }
}
?>