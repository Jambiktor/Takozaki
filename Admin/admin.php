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

    <!-- managing promo  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Promo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap gap-2">
                    <div class="card position-relative" style="width: 14rem;">
                        <div class="w-100 position-absolute">
                            <div class=" p-2 d-flex justify-content-end gap-1">
                                <button class="btn btn-light p-0 px-2">
                                    <p class="m-0">Edit details</p>
                                </button>
                                <button class=" btn btn-danger p-0 px-2 shadow-md" style="">
                                    <p class="m-0 mb-1">x</p>
                                </button>
                            </div>
                        </div>
                        <img src="..\images\promo1.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex justify-content-center p-0 pt-1">
                            <h5 class="card-title">Promo Title</h5>
                        </div>
                    </div>
                    <div class="card position-relative" style="width: 14rem;">
                        <div class="w-100 position-absolute">
                            <div class=" p-2 d-flex justify-content-end gap-1">
                                <button class="btn btn-light p-0 px-2">
                                    <p class="m-0">Edit details</p>
                                </button>
                                <button class=" btn btn-danger p-0 px-2 shadow-md" style="">
                                    <p class="m-0 mb-1">x</p>
                                </button>
                            </div>
                        </div>
                        <img src="..\images\promo1.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex justify-content-center p-0 pt-1">
                            <h5 class="card-title">Promo Title</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include ('admin_nav.php');
    ?>
    <div class="main_body">

        <div class="row w-100 px-5 mt-5 d-flex align-items-end justify-content-center gap-5 "
            style="background-color: ;">
            <div class="col-md-5 p-0 position-relative d-flex align-items-center justify-content-center flex-column">
                <div class="w-100 pt-2 ps-2 position-absolute d-flex justify-content-start align-items-start gap-1"
                    style="z-index: 1; top: 0; margin-right: 5px;">
                    <div class="rounded" style="background-color: white;">
                        <h4 class="fw-bold my-1 mx-2" style="color: ;">Promos</h4>
                    </div>
                    <div class="rounded" style="background-color: white;">
                        <button class="btn p-0 pb-1 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <p class="m-0 my-1 mx-2" style="color: ;">Manage Promos</p>
                        </button>
                    </div>

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

            <div class="col-md-6 rounded p-2 shadow-sm" style="background-color: white; width:; height:;">
                <div class="rounded border border mb-2 p-2 d-flex justify-content-center ">
                    <h5 class="m-0">Orders</h5>
                </div>
                <div id="list-example"
                    class="list-group rounded border border d-flex justify-content-center align-items-center"
                    style="height: 500px;">
                    <p class="m-0 list-group-item border-0" style="color: gray;"> You dont have any orders.
                    </p>
                </div>
            </div>
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
                        <img src="..\images\14.png" class="card-img-top" alt="...">
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