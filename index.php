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

    <?php
    include ('index_nav.php');
    ?>

    <div class="main_body">

        <div class="p-3" style="background-color: gray;">
            <div id="carouselExampleInterval" class="carousel slide rounded overflow-hidden" data-bs-ride="carousel"
                style="width: 400px;">
                <div class="carousel-inner position-relative" style="height: 100%;">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <div class="carousel-item active">
                            <div class="promo_details position-absolute d-flex align-items-end justify-content-center pb-4"
                                style="height: 100%; width: 100%; background-image: linear-gradient(to top, rgba(38, 38, 38, 0.70) 55%, rgba(51, 51, 51, 0.40));">
                                <a href="#" style="text-decoration: none; color: white;">Click to view details.</a>
                            </div>
                            <img src="images/promo1.png" class="d-block w-100" alt="Promo Image">
                        </div>
                        <img src="images\promo1.png" class="d-block w-100" alt="..." style="width: 100%;">
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="images\promo2.png" class="d-block w-100" alt="..." style="width: 100%;">
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
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

        <div class="home-text">
            <h2>Welcome to <a href="user_about_us.php">TAKOZAKI!</a>
                Experience the deliciousness of Takoyaki, a popular Japanese street food from Osaka. These crispy,
                octopus-filled balls
                are topped with savory sauce, mayo, bonito flakes, and seaweed. Enjoy a taste of Japan with every bite!
            </h2>

            </h2>
        </div>
    </div>

    <div class="product">
        <div class="titles">
            <h4><i class="bx bxs-hot"></i>Top Products</h4>
        </div>
        <div class="item"><img src="images\10.png" alt=""></div>
        <div class="item"><img src="images\mt4.png" alt=""></div>
        <div class="item"><img src="images\r3.png" alt=""></div>
        <div class="item"><img src="images\mt1.png" alt=""></div>
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