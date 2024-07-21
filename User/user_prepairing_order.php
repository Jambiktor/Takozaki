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

    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <!-- Modal -->
        <div class="modal fade" id="place_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Option</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">



                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#cod" aria-expanded="false" aria-controls="cod">
                                        <input type="radio" id="CoD" name="payment_option" value="cod">
                                        <label for="CoD" class="m-0 ms-2">Cash on Delivery(CoD)</label><br>

                                    </button>
                                </h2>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#online" aria-expanded="false" aria-controls="online">
                                        <input type="radio" id="Gcash" name="payment_option" value="Gcash">
                                        <label for="Gcash" class="m-0 ms-2">Online Payment(Gcash)</label><br>

                                    </button>
                                </h2>
                                <div id="online" class="accordion-collapse collapse w-100"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body w-100">
                                        <img src="images\gcash_qr.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="order.php"><button type="button" class="btn btn-primary">Save changes</button></a>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>


    <div class="main_body rounded p-2 my-3">
        <div class="cart_header rounded p-2 gap-1">
            <a class="rounded py-2" href="user_pendings_order.php">
                <p class="m-0 fw-bolder">Pendings</p>
            </a>
            <a class="rounded py-2 active" href="user_prepairing_order.php">
                <p class="m-0 fw-bolder">Preparing</p>
            </a>
            <a class="rounded py-2 " href="user_completed_order.php">
                <p class="m-0 fw-bolder">Completed</p>
            </a>
        </div>
    </div>

    <div class="cart_container rounded p-2 mt-2">
        <?php
        $query = "SELECT * FROM order_table WHERE status = 'preparing' AND user_id = '" . $_SESSION['id'] . "' GROUP BY order_number ORDER BY order_time"; // Filter by status
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="cart_item rounded p-2 my-2 mx-2">
                    <div class="w-100 product_id_container justify-content-space-between d-flex align-items-start">
                        <div class="w-100 d-flex align-items-start flex-column">
                            <div class="product_details">
                                <div>
                                    <h5>Order id: <?php echo $row['order_number']; ?></h5>
                                </div>
                                <form action="" method="post">
                                    <div>
                                        <input type="hidden" name="order_number" value="<?php echo $row['order_number']; ?>">
                                        <p>The Seller is prepairing the order.</p>
                                    </div>
                                </form>
                            </div>
                            <div class="product_photo">
                                <img class="rounded" src="product-images/<?php echo $row['image_file']; ?>" alt="">
                                <div class="product_description ms-2 mt-1">
                                    <h5><?php echo $row['product_name']; ?></h5>
                                    <p class="m-0">₱ <?php echo $row['price']; ?></p>
                                    <p class="m-0 mt-2">Quantity: <?php echo $row['quantity']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p style="height: 200px;">No products found.</p>';
        }
        $conn->close();
        ?>
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