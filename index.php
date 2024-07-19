<?php
include ('connection.php');
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css\landinggggg.css" /> -->
    <style>
        body {
            background-color: lightgray !important;
            position: relative;
        }

        .background_image {
            z-index: -1;
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("images/backgroundpattern.jpg");
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

    <?php
    include ('index_nav.php');
    ?>

    <div class="main_body">
        <div class="">
            <div class="overflow-hidden position-relative" style="height: 42.5rem;">
                <div class="banner position-absolute d-flex align-items-center">
                    <div class="" style="width: 500px; margin-left: 5vw;">
                        <h1 class="fw-bolder" style="color: white;">TAKOZAKI-TAKOYAKI</h1>
                        <p style="color: white;">Welcome to Takozaki, where we bring the authentic taste of
                            Osaka to your plate with
                            our perfectly cooked, golden-brown takoyaki balls. Filled with fresh octopus, tempura
                            scraps, pickled ginger, and green onions, every bite is a burst of flavor. Pair your savory
                            treat with our refreshing selection of drinks, including classic Japanese sodas, a variety
                            of teas, and handcrafted beverages. Join us for a mouthwatering culinary adventure!</p>
                        <a class="order btn btn btn-light px-5 py-3 w-100" href="#products"
                            style="text-decoration: none;transition: .3s;">
                            <h2 class="m-0" style="">Order Now</h2>
                        </a>
                    </div>
                </div>
                <img src="images/main background.jpg" alt=""
                    style="height: 100%; width: 100%; object-fit: cover; object-position: center;">
            </div>
        </div>


        <div class="row p-3 px-5 mt-2 d-flex align-items-start justify-content-center gap-5 "
            style="background-color: ;">
            <div class="col-md-5 d-flex align-items-center justify-content-center flex-column">
                <div class="">
                    <h1 class="fw-bold my-2 mx-3" style="color: ;">Promos</h1>
                </div>
                <div id="carouselExampleInterval" class="carousel slide rounded overflow-hidden shadow"
                    data-bs-ride="carousel" style="width: ;">
                    <div class="carousel-inner position-relative" style="height: 100%;">

                        <div class="carousel-item active" data-bs-interval="3000">
                            <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-5"
                                style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                <a href="#" style="text-decoration: none; color: white;">
                                    <h5>Click to view details.</h5>
                                </a>
                            </div>
                            <img src="images\promo1.png" class="d-block w-100" alt="..." style="width: 100%;">
                        </div>

                        <div class="carousel-item" data-bs-interval="3000">
                            <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-4"
                                style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                <a href="#" style="text-decoration: none; color: white;">Click to view details.</a>
                            </div>
                            <img src="images\promo2.png" class="d-block w-100" alt="..." style="width: 100%;">
                        </div>

                        <div class="carousel-item" data-bs-interval="3000">
                            <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-4"
                                style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                <a href="#" style="text-decoration: none; color: white;">Click to view details.</a>
                            </div>
                            <img src="images\promo3.png" class="d-block w-100" alt="..." style="width: 100%;">
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

            <!-- <div class="col-md-7 rounded p-2 shadow-sm" style="background-color: white; width:; height:;">

                <div class="rounded border border mb-2 p-2 d-flex justify-content-center ">
                    <h5 class="m-0">Order</h5>
                </div>
                <div id="list-example"
                    class="list-group rounded border border d-flex justify-content-center align-items-center"
                    style="height: 30vw;">
                    <p class="m-0 list-group-item border-0" style="color: gray;"> No orders. Click <a class=""
                            href="#products" style="text-decoration: none;">here</a> to view our products.
                    </p>
                </div>
            </div> -->
        </div>
    </div>

    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example p-3 mt-4 ps-5"
        tabindex="0" style="background-color: ;">
        <div id="products">
            <div class="d-flex align-items-center justify-content-center mt-3 mb-2">
                <h1 class="fw-bold"> Products</h1>
            </div>
            <div class="d-flex align-items-center justify-content-start flex-wrap gap-3">
                <div class="card rounded shadow p-0 border-0" style="width: 24%; transition: .3s;">
                    <a href="" style="text-decoration: none; color: black;">
                        <img src="images\14.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Product Name</h5>
                            <p class="card-text">₱ 00.00</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>


    </div>

    <?php
    include ('footer.php');
    ?>



</body>

</html>