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
    <title>Cart</title>
    <!-- <link rel="stylesheet" href="css\cartt.css" /> -->
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

    <div id="container" class="rounded container-fluid-sm container-md d-flex flex-column mb-3 mt-3 p-3"
        style="background-color: white; height: 640px; ">
        <?php


        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM order_table WHERE status = 'cart' AND user_id = $user_id ORDER BY order_time DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            ?>
            <div id="" class="container rounded border p-2 mb-2 ps-2 d-flex justify-content-end align-items-center"
                style="background-color: #333333;">

                <div class="w-100 container p-0 d-flex align-items-center" style="background-color: ;">
                    <div class="w-100 me-2 d-flex align-items-center justify-content-end text-light">
                        <?php
                        $total = 0;
                        while ($row = $result->fetch_assoc()):
                            $total += $row['price'];

                            ?>
                        <?php endwhile; ?>
                        <div>
                            <h5 class="m-0">Total: </h5>
                        </div>
                        <div>
                            <h4 id="" class="m-0 ms-1">₱ <?php echo $total; ?>.00</h4>
                        </div>
                    </div>
                    <form id="checkoutForm" action="user_checkout_items.php" method="post">
                        <input type="hidden" name="selected_items" id="selected_items">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <?php endwhile; ?>
                        <div class="" style="width: 150px;">
                            <button id="check_out" class="w-100 btn btn-danger rounded m-0 p-auto py-2 text-nowrap">Check
                                Out</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pe-1" style="overflow-y: hidden; overflow-y: scroll; height: 100%;">
                <?php
                $result->data_seek(0);
                while ($item = $result->fetch_assoc()): ?>
                    <div class="w-100 cart_item rounded border border-2 p-2 mb-1 d-flex justify-content-between"
                        style="background-color:; ">
                        <div class="w-100 d-flex align-items-start justify-content-start">

                            <div class="product_image rounded">
                                <img class="rounded" src="../product-images/variant_image/<?php echo $item['image_file']; ?>"
                                    alt="Product Image" style="width: 90px; height: 90px;">
                            </div>
                            <div class="product_description m-0 ms-2" style="background-color: ;">
                                <div class="d-flex mb-2 mt-1">
                                    <h4 class="m-0"><?php echo $item['name']; ?></h4>
                                </div>
                                <div class="product_variation">
                                    <p class="m-0 text-secondary    "> <?php echo $item['variation'] ?> x
                                        <?php echo $item['quantity']; ?>
                                    </p>
                                    <p class="m-0 text-danger">Price: ₱ <?php echo number_format($item['price'], 2); ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column gap-1"
                            style="background-color:; width: 150px;">
                            <div class="w-100 delete_button ">
                                <form action="delete-from-cart.php" method="post">
                                    <input type="hidden" name="order_item_id" value="<?php echo $item['order_item_id']; ?>">
                                    <button class="w-100 btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </div>
                            <div class="w-100 delete_button ">
                                <form action="delete-from-cart.php" method="post">
                                    <input type="hidden" name="order_item_id" value="<?php echo $item['order_item_id']; ?>">
                                    <button class="w-100 btn btn-outline-success" type="submit">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                <h5>Your cart is empty. Order <a href="user_product.php">here</a>.</h5>
            </div>
        <?php endif; ?>
    </div>

    <?php include ('footer.php'); ?>

</body>


</html>