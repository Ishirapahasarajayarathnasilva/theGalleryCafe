<?php
require_once __DIR__ . "/../includes/dbh.inc.php";
require_once __DIR__ . "/../includes/functions.php";

$categories = getCategories($conn);
$products = getProducts($conn);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleii.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        /*====================== Add Food Form=============================*/



        form {
            margin-top: 600px;
            margin-left: 25%;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            display: block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-cuboid'></i>
            <span class="logo_name">Admin panel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminDashboard.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-pizza'></i>
                        <span class="link_name">Foods</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Foods</a></li>
                    <li><a href="addFood.php">Add foods</a></li>
                    <li><a href="addcat.php">Add Category</a></li>

                </ul>
            </li>
            <li>


                <a href="#">
                    <i class='bx bxs-user-circle'></i>
                    <span class="link_name">User</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">User</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-user-account'></i>
                    <span class="link_name">Staff</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="addStaff.php">Staff</a></li>
                </ul>
            </li>
            <li>

                <a href="#">
                    <i class='bx bxs-notepad'></i>
                    <span class="link_name">Reservations</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Reservations</a></li>
                </ul>
            </li>
            <li>


            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Add Foods</span>

            <form action="/Resturant2/includes/foodHandling.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="food-name">Food Name:</label>
                    <input type="text" id="food-name" name="food_name" required>
                </div>
                <div class="form-group">
                    <label for="food-category">Food Category:</label>
                    <select id="food-category" name="food_category" required>
                        <option value="">Select a Option</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category['category_id']); ?>">
                                <?php echo htmlspecialchars($category['category_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="food-description">Description:</label>
                    <textarea id="food-description" name="food_description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="food-price">Price:</label>
                    <input type="number" id="food-price" name="food_price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="food-photo">Food Photo:</label>
                    <input type="file" id="food-photo" name="food_photo" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Food">
                </div>
            </form>
        </div>
        <div class="containertwo">
            <main class="content">

                <div class="product-grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars('/Resturant2/uploadImages/' . basename($product['food_image_Path'])); ?>"
                                alt="Food Image">
                            <h3><?php echo htmlspecialchars($product['food_name']); ?></h3>
                            <p><?php echo htmlspecialchars($product['food_description']); ?></p>
                            <p class="price">Price: $<?php echo htmlspecialchars($product['food_price']); ?></p>
                            <a href="#" class="btndel"><i class='bx bxs-trash'></i>Delete</a>

                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
        </div>

    </section>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;  //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>

</html