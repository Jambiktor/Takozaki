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
    <title>Check Out</title>
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

    <div class="container-fluid container-md rounded p-3 my-3" style="background-color: white;">
        <?php


        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM order_table WHERE status = 'cart' AND user_id = $user_id ORDER BY order_time DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            ?>
            <div class="container rounded p-2 gap-2 mb-2" style="background-color: #e6e6e6;">
                <div class="details d-flex justify-content-between ">

                    <h5 class=" fw-bolder">Delivery Details</h5>
                    <a href="" style="text-decoration:none;"><button
                            class="btn btn-secondary rounded py-1 px-4 text-light">Edit Address</button></a>
                </div>
                <div class="description ps-2">
                    <div class="user_contact">
                        <p class="m-0" style="color: gray;">Customer name - Number(0900000)</p>
                    </div>
                    <div class="address" style="color: gray;">
                        <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum odio
                            reprehenderit laudantium
                            optio perferendis neque.</p>
                    </div>
                </div>

            </div>
            <div class="mb-2" style="height: 250px; overflow-y: scroll;">
                <?php
                $result->data_seek(0);
                while ($item = $result->fetch_assoc()): ?>

                    <div class="rounded border border-2 m-0 mb-1 p-1 d-flex">
                        <div style="width: 70px;">
                            <img class="rounded" src="../product-images/variant_image/<?php echo $item['image_file']; ?>" alt=""
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="ms-2">
                            <p class="m-0" style="font-size:18px; color: black;"><?php echo $item['name']; ?></p>
                            <p class="m-0" style="font-size:15px; color: gray;"><?php echo $item['variation'] ?> x
                                <?php echo $item['quantity'] ?>
                            </p>
                            <p class="m-0" style="font-size:15px; color: gray;">₱ <?php echo $item['price'] ?>.00</p>
                        </div>

                    </div>
                <?php endwhile; ?>

            </div>
            <div class="container rounded p-3 border border-2" style="background-color:;">
                <h5 class="fw-bolder">Payment Details</h5>
                <div class="border-top border-2 ">
                    <div class="mb-2 rounded p-2 text-secondary">
                        <?php
                        $sub_total = 0;
                        $result->data_seek(0);
                        while ($row = $result->fetch_assoc()):
                            $sub_total += $row['price'];

                            ?>
                        <?php endwhile;
                        $shipping = 40;
                        $total = $sub_total + $shipping;
                        ?>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">Subtotal</p>
                            <p class="m-0">₱ <?php echo $sub_total; ?>.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">Shipping Fee</p>
                            <p class="m-0">₱ <?php echo $shipping; ?>.00</p>
                        </div>
                    </div>
                    <div class="total border-top border-2 mt-3 text-end">
                        <p class="m-0">Total</p>
                        <h5 class="m-0">₱ <?php echo $total; ?>.00</h5>
                    </div>
                </div>
            </div>
            <div class="container rounded p-0 mt-2">
                <!-- Button trigger modal -->
                <button type="button" class="w-100 py-2 btn btn-danger rounded m-0 fw-bolder" data-bs-toggle="modal"
                    data-bs-target="#place_order">
                    <h5 class="m-0">Place Order</h5>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="place_order" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Option</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="user_place_order.php" method="POST">
                                <div class="modal-body">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class=" collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#cod" aria-expanded="false" aria-controls="cod">
                                                    <input type="radio" id="CoD" name="payment_option"
                                                        value="Cash on Delivery">
                                                    <label for="CoD" class="m-0 ms-2">Cash on Delivery (CoD)</label><br>
                                                </button>
                                            </h2>
                                            <div id="cod" class="accordion-collapse collapse w-100"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body w-100">
                                                    <img src="../images/gcash_qr.jpg" alt="" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#online" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <input type="radio" id="Gcash" name="payment_option" value="Gcash">
                                                    <label for="Gcash" class="m-0 ms-2">Online Payment
                                                        (Gcash)</label><br>
                                                </button>
                                            </h2>
                                            <div id="online" class="accordion-collapse collapse w-100"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body w-100">
                                                    <img src="../images/gcash_qr.jpg" alt="" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM order_table WHERE user_id = $user_id ORDER BY order_time DESC";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0):
                                        $result->data_seek(0);
                                        while ($item = $result->fetch_assoc()):
                                            ?>

                                            <input type="hidden" name="order_item_id[]"
                                                value="<?php echo $item['order_item_id']; ?>">

                                        <?php endwhile; endif; ?>
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>




                        </div>
                    </div>
                </div>
            </div>
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