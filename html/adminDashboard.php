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
            <span class="text">Welcome to the Dashboard</span>
        </div>
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

</html>