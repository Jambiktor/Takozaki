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
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css\admin6.css" /> -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: lightgray !important;
            position: relative;
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
    </style>
</head>

<body>
    <div class="background_image"></div>

    <!-- modal body  -->


    <?php include ('admin_modal.php') ?>

    <?php include ('admin_nav.php'); ?>
    <div class="main_body">

        <div class="container d-flex align-items-start justify-content-center">
            <div class="row w-100 mt-5 mb-2 d-flex align-items-start justify-content-center gap-5 "
                style="background-color: ;">
                <div
                    class="col-md-4 p-0 position-relative d-flex align-items-center justify-content-center flex-column">
                    <div class="w-100 bg-secondary rounded d-flex justify-content-between align-items-center p-0 mb-2 px-2 py-2"
                        style="background-color:#;">
                        <h3 class="fw-bold my-1 mx-2 text-light" style="color: ;">Promos</h3>
                        <div class="rounded" style="background-color: ;">
                            <button class="btn btn-light shadow p-0 py-1 " data-bs-toggle="modal"
                                data-bs-target="#promo_modal">
                                <p class="m-0 my-1 mx-2" style="color: ;">Manage Promos</p>
                            </button>
                        </div>
                    </div>
                    <div id="carouselExampleInterval" class="carousel slide rounded overflow-hidden shadow"
                        data-bs-ride="carousel" style="width: ;">
                        <!-- <div class="w-100 pt-2 pe-2 position-absolute d-flex justify-content-end align-items-start gap-1"
                        style="z-index: 1; top: 0; margin-right: 5px;">


                    </div> -->
                        <div class="carousel-inner position-relative" style="height: 100%;">

                            <div class="carousel-item active" data-bs-interval="3000">
                                <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-5"
                                    style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                    <a href="#" style="text-decoration: none; color: white;">
                                        <h5>Click to view details.</h5>
                                    </a>
                                </div>
                                <img src="..\images\promo1.png" class="d-block w-100" alt="..." style="width: 100%;">
                            </div>

                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-4"
                                    style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                    <a href="#" style="text-decoration: none; color: white;">Click to view details.</a>
                                </div>
                                <img src="..\images\promo2.png" class="d-block w-100" alt="..." style="width: 100%;">
                            </div>

                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-4"
                                    style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                    <a href="#" style="text-decoration: none; color: white;">Click to view details.</a>
                                </div>
                                <img src="..\images\promo3.png" class="d-block w-100" alt="..." style="width: 100%;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-7 rounded p-2 shadow-sm mb-5" style="background-color: white; width:; height:;">
                    <div class="rounded border border mb-2 p-2 d-flex justify-content-center ">
                        <h5 class="m-0">Orders</h5>
                    </div>
                    <div id="list-example"
                        class="list-group rounded border border d-flex justify-content-center align-items-center"
                        style="height: 70vh;">
                        <p class="m-0 list-group-item border-0" style="color: gray;"> You dont have any orders.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0"
            class="w-100 scrollspy-example mt-5 " tabindex="0" style="background-color: ;">
            <div class="mt-5" id="products">
                <div class="w-100 bg-secondary d-flex align-items-center justify-content-center mb-2 shadow gap-3"
                    style="background-color: #;">
                    <h2 class="fw m-0 my-2 text-light"> Products</h2>
                    <div class="rounded" style="background-color: ;">
                        <button class="btn btn-light p-0 py-1 " data-bs-toggle="modal" data-bs-target="#add_product">
                            <p class="m-0 my-1 mx-2" style="color: ;">Add Product</p>
                        </button>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-start flex-wrap gap-3 mt-5 mx-5">
                    <?php
                    $products = mysqli_query($conn, "SELECT * FROM product_table");

                    if (mysqli_num_rows($products) == 0) {
                        echo '<p>No items available.</p>';
                    } else {
                        while ($product = mysqli_fetch_assoc($products)) {
                            $product_id = $product['product_id'];
                            ?>
                            <div class="card rounded shadow p-0 border-0" style="width: 24%; transition: .3s;">
                                <a href="admin_product_preview.php?product_id= <?php echo $product['product_id'] ?>"
                                    style="text-decoration: none; color: black;">
                                    <img src="..\product-images\<?php echo $product['image_file'] ?>" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold"><?php echo $product['name']; ?></h5>
                                        <p class="card-text">₱ <?php echo $product['price'] ?></p>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>


        </div>
    </div>

    <?php include ('footer.php'); ?>
</body>

</html>