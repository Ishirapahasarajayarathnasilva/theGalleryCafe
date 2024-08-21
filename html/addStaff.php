<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="styleii.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            margin-bottom: 200px;
        }

        .staffForm {
            width: 400px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            outline: none;
        }

        .form-group .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group .submit-btn:hover {
            background-color: #45a049;
        }

        .table {
            position: relative;
            left: 100px;
        }
    </style>
</head>

<body style="margin:50px;">
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
                    <li><a class="link_name" href="#">Dashboard</a></li>
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
                    <li><a href="addfoods.php">Add foods</a></li>
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
                <a href="#">
                    <i class='bx bxs-user-account'></i>
                    <span class="link_name">Staff</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Staff</a></li>
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
            <span class="text">Admin Dashboard</span>
        </div>
        <div class="container">

            <form action="/Resturant2/includes/staffHandle.php" method="post">
                <center>
                    <h2>Add Staff Member</h2>
                </center><br>
                <div class="form-group">
                    <input type="text" placeholder="Name" name="stf_Name" id="name" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Add Email" name="stf_Email" id="email" required>
                </div>
                <div class="form-group">
                    <input type="number" placeholder="Add Mobile Number" name="number" id="mobile" required>
                </div>
                <div class="form-group">
                    <select id="role" name="role" required>
                        <option value="">Select Job Role</option>
                        <option value="Manager">Manager</option>
                        <option value="Chef">Chef</option>
                        <option value="Waiter">Waiter</option>
                        <!-- Add more roles as needed -->
                    </select>
                </div>
                <div class="form-group">

                    <input type="password" name="password" placeholder="Enter Member Password" id="password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="re_password" placeholder="Retype Member Password" id="confirmPassword"
                        required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="submit-btn">Add Member</button>
                </div>
            </form>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
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

                    $sql = "SELECT * FROM createstaff";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid Query!" . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                    <td> " . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["number"] . "</td>
                    <td>" . $row["role"] . "</td>
                    <td>
                        <a class='btn-danger btn-sm' href='update'>Delete</a>
                        
                    </td>
                </tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </section>
    <div class="page2">

    </div>

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