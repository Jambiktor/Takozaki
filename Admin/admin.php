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

    <!-- managing promo  -->
    <div class="modal fade" id="promo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Promo</h1>
                    <button class="btn btn-outline-secondary ms-2">Add Promo</button>
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
                    <button type="button" class="btn btn-outline-danger">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- adding product  -->
    <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap gap-2">

                    <div class="w-100">
                        <input class="w-100 py-2 px-3 ps-2 rounded border-1" type="text" placeholder="Product Name"
                            name="username" required>
                    </div>
                    <div class="w-100">
                        <input class="w-100 py-2 px-3 ps-2 rounded border-1" type="number" placeholder="Product Price"
                            name="price" required>
                    </div>
                    <h5 class="m-0 mt-1">Product Thumbnail</h5>
                    <div class="input-group">
                        <input type="file" class="form-control btn-outline-secondary" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    <h5 class="m-0 mt-1">Variation Details</h5>
                    <div class="w-100">
                        <input class="w-100 py-2 px-3 ps-2 rounded border-1" type="text"
                            placeholder="Variation eg. Size" name="variation" required>
                    </div>

                    <div class="row w-100 m-0 p-0 d-flex justify-content-between px-2">
                        <div class="col-md-7 p-0">
                            <input class="w-100 py-2 px-3 ps-2 rounded border-1" type="text"
                                placeholder="Variation Name eg. Small/Medium/Large" name="variation_name" required>
                        </div>
                        <div class="col-md-4 p-0">
                            <input class="w-100 py-2 px-3 ps-2 rounded border-1" type="number"
                                placeholder="Variation Price" name="variation_price" required>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include ('admin_nav.php');
    ?>
    <div class="main_body">

        <div class="row w-100 px-5 mt-5 mb-2 d-flex align-items-start justify-content-center gap-5 "
            style="background-color: ;">
            <div class="col-md-4 p-0 position-relative d-flex align-items-center justify-content-center flex-column">
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
                    style="height: 475px;">
                    <p class="m-0 list-group-item border-0" style="color: gray;"> You dont have any orders.
                    </p>
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
                    <div class="card rounded shadow p-0 border-0" style="width: 24%; transition: .3s;">
                        <button class="btn btn-light position-absolute mt-2 me-2" style="right: 0;">Edit
                            Product</button>
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
    </div>


    <?php
    include ('footer.php');
    ?>





</body>

</html>