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
        .an {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(255, 65, 65);
            margin-left: 61%;
        }

        /* plus sign */
        .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sign svg {
            width: 17px;
        }

        .sign svg path {
            fill: white;
        }

        /* text */
        .ka {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 20px;
            font-weight: 400;
            transition-duration: .3s;
        }

        /* hover effect on button width */
        .an:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }

        .an:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }

        /* hover effect button's text */
        .an:hover .ka {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }

        /* button click effect*/
        .an:active {
            transform: translate(2px, 2px);
        }
    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-cuboid'></i>
            <span class="logo_name">Staff Panel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bxs-notepad'></i>
                    <span class="link_name">Reservations</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Reservations</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Welcome to the Staff Dashboard</span>
            <button class="an">

                <div class="sign"><svg viewBox="0 0 512 512">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                        </path>
                    </svg></div>

                <div class="ka">Logout</div>
            </button>



        </div>
    </section>
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