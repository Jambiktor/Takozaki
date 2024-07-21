<?php
include ('..\connection.php');
include ('..\LogIn\session.php');
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>
    <link rel="stylesheet" href="css\user_products.css" />
    <style>
        body {
            background-color: lightgray !important;
            position: relative;
            overflow-x: hidden;
        }

        .background_image {
            z-index: -1;
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("../images/backgroundpattern.jpg");
            background-repeat: repeat;
            opacity: .02;
        }

        .promo_details {
            opacity: 0;
            transition: 0.5s;
        }

        .promo_details:hover {
            opacity: 1;
        }

        .card:hover,
        .orderbtn:hover {
            transform: scale(1.01);
        }

        .banner {
            /* background-position: center; */
            width: 100%;
            height: 100%;
            background-image: linear-gradient(to right, rgb(26, 26, 26, .95) 30%, rgb(38, 38, 38, .80) 55%, rgb(51, 51, 51, .40));
        }
    </style>
</head>

<body>
    <div class="background_image"></div>

    <?php include ('user_nav.php'); ?>

    <div class="container bg-light rounded p-2 my-3" style="min-height: 630px;">
        <div class="p-2 mb-2 rounded" style="background-color: #333333;">
            <h4 class="m-0 text-light">Order/s</h4>
        </div>

        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM order_table WHERE status = 'placed' AND user_id = $user_id GROUP BY order_number ORDER BY order_time DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            ?>
            <?php
            $quantity = 0;
            $result->data_seek(0);
            while ($item = $result->fetch_assoc()):
                $quantity += $item["quantity"];
                ?>
            <?php endwhile; ?>

            <?php
            $result->data_seek(0);
            while ($item = $result->fetch_assoc()):
                ?>
                <a class="text-decoration-none text-dark " href="admin_address_payment.php">
                    <div class="w-100 rounded border border-2 p-2 mb-1 justify-content-space-between d-flex align-items-start ">
                        <div class="w-100 d-flex align-items-start flex-column">
                            <div class="w-100 d-flex justify-content-between mb-2 pb-1 border-bottom"
                                style="background-color: ;">
                                <div>
                                    <h5 class="m-0">Product ID: <?php echo $item['order_number']; ?></h5>
                                </div>
                                <div>
                                    <?php
                                    $status = $item['status']; // Assume $order['status'] contains the current status of the order
                            
                                    if ($status == 'placed') {
                                        echo '<p class="m-0" style="color: gray;">Waiting for confirmation</p>';
                                    } elseif ($status == 'confirmed') {
                                        echo '<p class="m-0" style="color: gray;">Preparing the order</p>';
                                    } elseif ($status == 'for delivery') {
                                        echo '<p class="m-0" style="color: gray;">The order is on the way</p>';
                                    } else {
                                        echo '<p class="m-0" style="color: gray;">Unknown status</p>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="d-flex justify-content-start rounded w-100">
                                <div style="width: 90px; height: 90px;">
                                    <img class="rounded" style="width: 100%; height:100%; object-fit: cover;"
                                        src="../product-images/variant_image/<?php echo $item['image_file']; ?>" alt="">
                                </div>

                                <div class=" w-100 ms-2" style="">
                                    <div class="w-100 d-flex justify-content-between">
                                        <h3><?php echo $item['name'] ?></h3>
                                        <h4 class="m-0 text-end text-danger">₱ <?php echo $item['total']; ?>.00</h4>
                                    </div>
                                    <!-- <p class="m-0 mt-2">Quantity: <?php echo $quantity ?></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>

        </div>
    <?php else: ?>
        <div id="select_all" class="container rounded p-2 mb-2 ps-2 d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center ps-2">
                <input type="checkbox" id="selectAllCheckbox">
                <p class="ms-2 mt-3">Select All</p>
            </div>
            <div class="d-flex align-items-center">
                <div class="me-3 d-flex flex-column align-items-end justify-content-start">
                    <p class="m-0">Total</p>
                    <h5 id="price" class="m-0">₱ 0.00</h5>
                </div>
                <a href="user_check_out.php"><button id="check_out" class="py-3 p-2 rounded">Check Out</button></a>
            </div>
        </div>
        <div id="empty_cart" class="container rounded p-2">
            <h5>Your cart is empty. Order <a href="user_products.php">here</a>.</h5>
        </div>
    <?php endif; ?>

    <?php include ('footer.php'); ?>

</body>

</html>