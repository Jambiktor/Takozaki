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

    <style>
        * {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
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

        #container {
            background-color: white;
            width: 90%;
        }

        .container {
            width: 100%;
        }

        #carouselExampleInterval {
            width: clamp(250px, 100%, 1150px);
        }

        /* .radio-container{
        background-color: black;
    } */
        .radio-container {
            background-color: white;
            padding: 0;
            transition: .3s;
        }

        .radio-container:hover {
            background-color: red;
            color: white;

        }

        .radio-container input[type="radio"] {
            display: none;
        }

        .radio-container input[type="radio"]:checked+.label-text {
            background-color: red;
            color: white;
        }

        .label-text {
            display: flex;
            align-items: center;
            padding: 0.5em;
            border-radius: 5px;
            width: 100%;
        }

        .radio-circle {
            background-color: white;
            height: 20px;
            width: 20px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .order {
            background-color: red;
            border: 1px solid red;
            color: white;
            transition: .3s;
            width: 100%;
        }

        .order:hover {
            background-color: #ba0404;
            border: 1px solid #ba0404;
            /* color: black; */
        }
    </style>
</head>

<body>
    <div class="background_image"></div>

    <?php include ('admin_nav.php');
    ?>

    <?php
    if (isset($_GET['product_id'])) {
        $product_id = intval($_GET['product_id']);

        $products = mysqli_query($conn, "SELECT * FROM product_table WHERE product_id = $product_id");
        $product = mysqli_fetch_assoc($products);

        include ('admin_product_preview_modal.php');

        if ($product) {
            ?>

            <div id="" class="container rounded mb-3 mt-5 p-2" style="background-color: white;">
                <div class="row">
                    <div class="col-md-5">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-interval="false"
                            style="width: 100%;">
                            <div class="carousel-inner">
                                <div class="carousel-item active " data-bs-interval="3000">
                                    <img src="../product-images/<?php echo $product['image_file'] ?>"
                                        class="d-block w-100 rounded" alt="...">
                                </div>
                                <div class="carousel-item " data-bs-interval="3000">
                                    <img src="../product-images/<?php echo $product['image_file'] ?>"
                                        class="d-block w-100 rounded" alt="...">
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
                    <?php
                    $products = mysqli_query($conn, "SELECT * FROM product_table WHERE product_id = $product_id");
                    while ($product = mysqli_fetch_assoc($products)) {
                        ?>
                        <div class="col-md-7 ">
                            <div class="container shadow-sm rounded text-light d-flex justify-content-between p-0 px-3 mb-2"
                                style="background-color: #333333">
                                <div class="rounded d-flex justify-content-start py-3 align-items-end gap-3">
                                    <div>
                                        <h3 class="m-0"><?php echo $product['name'] ?></h3>
                                    </div>
                                    <div>
                                        <h4 class="text-danger m-0" style="color:;">₱ <?php echo $product['price'] ?> -
                                            <?php echo $product['price'] ?>
                                        </h4>
                                        <input type="hidden" name="base_price" value="<?php echo $product['price'] ?>">
                                    </div>
                                </div>
                                <div class="m-0 d-flex justify-content-center align-items-center ">
                                    <button class="btn btn-light" id="edit_button" type="button" data-bs-toggle="modal"
                                        data-bs-target="#editproduct">Edit product
                                    </button>
                                </div>
                            </div>

                            <div style="height: 52.5vh; overflow:hidden; overflow-y: scroll; background-color:;">
                                <div>
                                    <div class="w-100 border border-2 rounded p-2 mb-2">
                                        <div class="d-flex mb-2 gap-2">
                                            <h5 class="m-0 my-auto">Variation</h5>
                                            <button class="btn border btn-secondary">+</button>
                                        </div>
                                        <?php
                                        $variants = mysqli_query($conn, "SELECT * FROM variation_table WHERE product_id = $product_id ORDER BY name");
                                        ?>
                                        <div class="d-flex gap-1 flex-wrap">
                                            <?php while ($variant = mysqli_fetch_assoc($variants)) { ?>
                                                <label class="shadow-sm radio-container border rounded me-1">
                                                    <input type="radio" name="variant" value="<?php echo $variant['name'] ?>">
                                                    <div class="label-text m-auto gap-2 pe-3">
                                                        <div>
                                                            <img src="../product-images/variant_image/<?php echo $variant['image_file'] ?>"
                                                                class="d-block w-100 rounded m-0" style="height: 40px; width: 40px;">
                                                        </div>
                                                        <div>
                                                            <p class="m-0"><?php echo $variant['name'] ?></p>
                                                        </div>
                                                        <button class="btn btn-light border">
                                                            <p class="m-0 text">Edit</p>
                                                        </button>
                                                    </div>
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="w-100 border border-2 rounded p-2">
                                        <div class="d-flex mb-2 gap-2">
                                            <h5 class="my-auto">Size Option</h5>
                                            <button class="btn border btn-secondary">+</button>
                                        </div>
                                        <?php
                                        $options = mysqli_query($conn, "SELECT * FROM option_table WHERE product_id = $product_id ORDER BY price");
                                        ?>
                                        <div class="d-flex gap-1 flex-wrap">
                                            <?php while ($option = mysqli_fetch_assoc($options)) { ?>
                                                <label class="shadow-sm radio-container border rounded me-1">
                                                    <input type="radio" name="option" class="price-input"
                                                        data-price="<?php echo $option['price'] ?>"
                                                        value="<?php echo $option['name'] ?>">
                                                    <div class="label-text m-auto gap-2 pe-3">
                                                        <div>
                                                            <p class="m-0"><?php echo $option['name'] ?> - ₱
                                                                <?php echo $option['price'] ?>
                                                            </p>
                                                        </div>
                                                        <button class="btn btn-light border">
                                                            <p class="m-0 text">Edit</p>
                                                        </button>
                                                    </div>
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="w-100 border border-2 rounded p-2 mt-2 ">
                                        <div class="d-flex mb-2 gap-2">
                                            <h5 class="m-0 my-auto">Add Ons</h5>
                                            <button class="btn border btn-secondary">+</button>
                                        </div> <?php
                                        $add_ons = mysqli_query($conn, "SELECT * FROM add_on_table WHERE product_id = $product_id ORDER BY price");
                                        ?>
                                        <div class="d-flex flex-wrap gap-2">
                                            <?php while ($add_on = mysqli_fetch_assoc($add_ons)) { ?>
                                                <label class="shadow-sm radio-container border rounded ">
                                                    <input type="radio" name="add_on" class="price-input"
                                                        data-price="<?php echo $add_on['price'] ?>"
                                                        value="<?php echo $add_on['name'] ?>">
                                                    <div class="label-text m-auto p-0 py-2 px-2">
                                                        <p class="m-0"><?php echo $add_on['name'] ?> - ₱
                                                            <?php echo $add_on['price'] ?>
                                                        </p>
                                                        <button class="btn btn-light border m-0 ms-2">
                                                            <p class="m-0 text">Edit</p>
                                                        </button>
                                                    </div>
                                                </label>
                                            <?php } ?>
                                            <label class="shadow-sm radio-container border rounded p-0">
                                                <input type="radio" name="add_on" class="price-input" data-price="0" value="none">
                                                <div class="label-text h-100 px-3">
                                                    <p class="m-0 ">None</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-2 mt-1">
                                    <input type="number" name="quantity" class="form-control py-2" value="1" min="1"
                                        aria-label="Dollar amount (with dot and two decimal places)" placeholder="Enter Quantity"
                                        required>
                                </div>
                            </div>
                            <div class="d-flex mt-3 p-2 justify-content-end align-items-center gap-2">
                                <div class="w-25">
                                    <h5 class="m-0 text-center">Total: ₱ <span id="total-price"></span></h5>
                                    <input type="hidden" name="sub_total" id="total-price-input" value="0">
                                </div>
                                <div class="w-75">
                                    <button class="order rounded px-4 py-2 ">Add to cart</button>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const priceInputs = document.querySelectorAll('.price-input');
                            const totalPriceElement = document.getElementById('total-price');
                            const totalPriceInput = document.getElementById('total-price-input');
                            const basePrice = parseFloat(document.querySelector('input[name="base_price"]').value);
                            const quantityInput = document.querySelector('input[name="quantity"]');

                            function calculateTotalPrice() {
                                let totalPrice = 0;
                                priceInputs.forEach(input => {
                                    if (input.checked) {
                                        totalPrice += parseFloat(input.getAttribute('data-price'));
                                    }
                                });

                                const quantity = parseInt(quantityInput.value) || 1;
                                totalPrice *= quantity;

                                totalPriceElement.textContent = totalPrice.toFixed(2);
                                totalPriceInput.value = totalPrice.toFixed(2); // Set hidden input value
                            }

                            priceInputs.forEach(input => {
                                input.addEventListener('change', calculateTotalPrice);
                            });

                            quantityInput.addEventListener('input', calculateTotalPrice);

                            calculateTotalPrice(); // Initial calculation
                        });
                    </script>
                </div>
            </div>

            <script>
                document.querySelectorAll('.variation-btn').forEach((button, index) => {
                    button.addEventListener('click', function () {
                        const carousel = document.querySelector('#carouselExampleInterval');
                        const bootstrapCarousel = new bootstrap.Carousel(carousel);
                        bootstrapCarousel.to(index + 1);
                    });
                });
            </script>

            <?php

        } else {
            echo "<p>No product selected.</p>";
        }
    }
    ?>

    <?php include ('footer.php'); ?>

</body>


</html>