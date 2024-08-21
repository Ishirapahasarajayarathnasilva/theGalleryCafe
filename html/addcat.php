<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Style the form */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the form inputs */
        input[type="text"],
        input[type="date"],
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        /* Style the submit button */
        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        /* Style the delete button */
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>

</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-cuboid'></i>
            <span class="logo_name">Dashboard</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="adminDashboard.php">
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
                    <li><a class="link_name" href="addFood.php">Foods</a></li>
                    <li><a href="addFood.php">Add foods</a></li>
                    <li><a href="addcat.php">Add Catrgory</a></li>

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
                <a href="addStaff.php">
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
            <span class="text">Add Categories</span>
        </div>
        <form action="/Resturant2/includes/categoryHandle.php" method="post">
            <input type="text" name="cat_name" placeholder="Enter Category Name" required>
            <input type="date" name="date" required>
            <button type="submit" name="submit">Add Category</button>
        </form>
        <br><br><br>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Added Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $serverName = "localhost";
                $dbUsername = "admin";
                $dbPassword = "mysql";
                $dbName = "resturantdb";


                $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

                if (!$conn) {
                    die("Connection Failed !!" . mysqli_connect_error());
                }

                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid Query!" . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td> " . $row["category_id"] . "</td>
                    <td>" . $row["category_name"] . "</td>
                    <td>" . $row["date"] . "</td>
                    <td>
                        <a class='btn-danger btn-sm' href='update'>Delete</a>
                        
                    </td>
                </tr>";
                }

                ?>
            </tbody>
        </table>
    </section>

    <div class="one"></div>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
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