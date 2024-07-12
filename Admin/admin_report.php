<?php
include ('connection.php');
include ('sessioncheck.php');
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css\admin_report.css" />
    <style>
        body {
            background-color: lightgray;
        }
    </style>
</head>

<body>

    <?php
    $sql = "SELECT * FROM usertable WHERE uname='" . $_SESSION['uname'] . "'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        ?>
        <nav class="nav_bar">

            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                aria-controls="offcanvasTop">
                <div class="logo_toggler"><i class='bx bx-menu'></i><img src="images\blacklogo.jpeg" alt=""></div>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasTopLabel">Takozaki<img src="images\blacklogo.jpeg" alt=""></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="tab">
                        <a href="admin.php">Home</a>
                        <a href="admin_about_us.php">About</a>
                        <a href="admin_product.php">Products</a>
                        <a href="admin_pendings_order.php">Orders</a>
                        <a href="user_table.php">Users</a>
                        <a href="admin_report.php">Report</a>
                        <a href="contact.php">Contact us</a>
                    </div>
                </div>
            </div>

            <div class="right_body">

                <div class="user_tab">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user">
                                <div class="user_name">
                                    <p> <?php echo $_SESSION['uname'] ?> </p>
                                </div>
                                <div class="user_photo">
                                    <img src="profile_picture/<?php echo $row['image_file'] ?>" alt="">
                                </div>
                            </div>
                        </button>
                        <ul id="dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <div class="dropdown_container">
                                <li>
                                    <form action="profile.php" method="post"><button>Profile</button></form>
                                </li>
                                <li>
                                    <form action="logout.php" method="post"><button type="submit"
                                            name="logout">Logout</button></form>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    <?php } ?>






    <div class="container rounded my-3" style="background-color: white;">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Product Name</th>
                            <th>Sold Items</th>
                            <th>Total</th>
                            <th>Delivery Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM order_table WHERE status = 'completed' ORDER BY order_time"; // Filter by status
                        $result = $conn->query($query);
                        $total_sales = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $total_sales += $row["total_price"];
                                ?>
                                <tr>
                                    <td><?php echo $row['order_number'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td>₱ <?php echo $row['total_price'] ?>.00</td>
                                    <td><?php echo $row['delivered_date'] ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<p style="height: 200px;">No products found.</p>';
                        }
                        $conn->close();
                        ?>

                    </tbody>
                </table>
                <div class="">
                    <p>Total Sales:</p>
                    <h5>₱ <?php echo $total_sales ?>.00</h5>
                </div>
            </div>
        </div>
    </div>

    </div>

    <footer class="footer">
        <div><img src="images\Logo.jpg" alt=""></div>
        <div class="footer_content">
            <p><i class='bx bxs-home p-2'></i>GST Town Center Rosario, Cavite</p>
            <p><i class='bx bxs-phone p-2'></i>Phone: +0936-600-9206</p>
            <p>&copy; 2024 Takozaki. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>