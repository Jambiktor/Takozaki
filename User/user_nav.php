<?php
include ('..\connection.php');
// include ('..\LogIn\session.php');
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css\admin6.css" /> -->
    <style>
        .offcanvas-body a {
            text-decoration: none;
            color: black;
            font-size: 20px;
            padding-left: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            transition: .2s;
            border-bottom: 1px solid lightgray;
        }

        .offcanvas-body a:hover {
            background-color: lightgray;
            border-radius: 3px;
            border-bottom: none;
            color: black;
            font-size: 21px
        }

        .user_photo {
            width: 35px;
            height: 35px;
            background: url('../images/default-profile.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 50%;
        }


        #button:focus {
            box-shadow: none;
        }

        #drop_items {
            transition: .3s;
            border-bottom: 1px solid gray;
        }

        #drop_items:hover {
            background-color: lightgray;
            border-radius: 3px;
            border-bottom: none;
        }

        #logout_btn {
            background-color: lightgray;
            transition: .3s;
        }

        #logout_btn:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT * FROM usertable WHERE username='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        ?>


        <nav class="nav py-2 px-2 d-flex align-items-center justify-content-between shadow-lg"
            style="background-color: #333333;">
            <div>
                <button id="button" class=" btn p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#nav_menu"
                    aria-controls="offcanvasScrolling">
                    <div class="logo_toggler" style="color: white; font-size: 25px;"><i class='bx bx-menu'></i></div>
                </button>

                <a href="user_homepage.php"><img src="..\images\MainLogo.png" alt="" style="width: 40px;"></a>
            </div>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="nav_menu" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header border-bottom  ">
                    <h3 class="m-0" id="offcanvasTopLabel">Menu<img src="images\blacklogo.jpeg" alt=""></h3>
                    <button type="button" id="button" class=" btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="d-flex justify-content-end flex-column gap-1">
                        <a href="user_homepage">Home</a>
                        <a href="admin_about_us.php">About</a>
                        <a href="admin_product.php">Products</a>
                        <a href="admin_pendings_order.php">Orders</a>
                        <a href="admin_report.php">Report</a>
                        <a href="user_table.php">Users</a>
                        <a href="contact.php">Contact us</a>
                    </div>
                </div>
            </div>

            <div class="right_body">

                <div class="d-flex align-items-center gap-2 position-relative">
                    <div class="m-0 position-absolute"
                        style="width: 15px; height: 15px; background-color: red; border-radius: 50%; top: 5px; left: -5px;">
                        <p style="font-size: 10px; color: white;">+9</p>
                    </div>
                    <div><button class="border-0 p-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#notification" aria-controls="offcanvasScrolling"
                            style="border-radius: 50%; width: 35px; height: 35px; font-size: 25px;">
                            <i class='bx bxs-bell'></i>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-end" data-bs-scroll="false" data-bs-backdrop="false" tabindex="-1"
                        id="notification" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="p-2 mb-1" style="background-color: #e6e6e6;">
                                <h5 class="m-0 border-bottom border-secondary">Notification Title</h5>
                                <p>contents</p>
                            </div>
                            <div class="p-2" style="background-color: #;">
                                <h5 class="m-0 border-bottom border-secondary">Notification Title</h5>
                                <p>contents</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group ">
                        <button type="button" id="button" class=" btn p-0 d-flex justify-content-end"
                            style="background-color: transparent;min-width: 120px; background-color: white;">
                            <div class="d-flex align-items-center px-1 py-1 ps-3 rounded"
                                style="background-color:; color: black;">
                                <div class="user_name">
                                    <p class="m-0 me-1"><?php echo $_SESSION['username'] ?></p>
                                </div>
                                <div class="user_photo">
                                    <img src="..\images\Logo.jpg" alt=""
                                        style="width: 35px; height: 35px; border-radius: 50%;">
                                </div>
                            </div>
                        </button>
                        <button type="button" id="button" class=" btn btn-light dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul id="dropdown" class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
                            <div class="dropdown_container px-1">
                                <li>
                                    <a href="" style="text-decoration: none;">
                                        <p id="drop_items" class="py-2 pe-2 m-0 text-end"
                                            style="background-color: ; color: black;">
                                            Account</p>
                                    </a>
                                </li>
                                <li>
                                    <form action="..\logout.php" method="post"><button id="logout_btn"
                                            class="w-100 mt-1 py-2 border-0 rounded" type="submit" name="logout"
                                            style="background-color: ;">
                                            <p class="m-0 me-1 text-end">Logout</p>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <?php } ?>

</body>

</html>