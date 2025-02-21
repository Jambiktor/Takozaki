<?php
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login1.css">
    <style>
        body {
            background-color: lightgray;
        }
    </style>

</head>

<body>


    <div class="d-flex align-items-center justify-content-center"
        style="height: 100vh; position: relative; z-index: 1; overflow: hidden;">

        <div class="position-absolute" style="z-index: -1; width: 100vw; height: 100vh;">
            <div class="position-absolute"
                style="background-image: linear-gradient(to right,rgb(26, 26, 26) 30%, rgb(38, 38, 38) 55%, rgb(51, 51, 51, .40)); width: 100%; height: 100%;">
            </div>
            <img class="position-absolute" src="..\images\background.jpg" alt="" style=" z-index: -1; right: -65px;">
        </div>

        <!-- <div class="position-absolute d-flex align-items-start justify-content-center overflow-hidden"
            style="background-color:; width:500px; z-index: -1; top: 30px;">
            <img class="mt-4" src="..\images\milktea.png" alt="" style="width: 250px;">
            <img class="" src="..\images\takoyaki.png" alt="" style="width: 280px;">
        </div> -->

        <form action="logconn.php" method="post">
            <div class="container d-flex align-items-center justify-content-center flex-column p-3 pt-4 gap-1 rounded shadow-lg"
                style="background-color:white; width:500px;">
                <div>
                    <img src="..\images\MainLogo.png" alt="" style="width: 60px;">
                </div>
                <h3>Takozaki-Takoyaki</h3>
                <div class=" w-75 position-relative">
                    <div class="rounded mb-1 d-flex align-items-center justify-content-center"
                        style="position: absolute;width: 45px; height: 100%; background-color: #333333; color:white;">
                        <i class='bx bxs-user' style="font-size: 20px;"></i>
                    </div>
                    <input class="w-100 py-2 px-3 ps-5" type="text" placeholder="Username" name="uname" required>
                </div>
                <div class="w-75 position-relative ">
                    <div class="rounded mb-1 d-flex align-items-center justify-content-center"
                        style="position: absolute;width: 45px; height: 100%; background-color: #333333; color:white;">
                        <i class='bx bxs-lock-alt'></i>
                    </div>

                    <input id="password" class="w-100 py-2 px-5" type="password" placeholder="Password" name="password"
                        required>

                    <div id="passwordToggler" class="rounded mb-1 d-flex align-items-center justify-content-center"
                        style="position: absolute;width: 45px; height: 100%;color: #333333; right:0; top:0; cursor: pointer;">
                        <i id="toggleIcon" class='bx bx-hide' style="font-size: 20px;"></i>
                    </div>
                </div>
                <div class="w-75">
                    <button class="btn btn-dark w-100 py-2" type="submit" name="login" style="margin-top: 10px;">
                        Login</button>
                </div>

                <p>Don't have an account? Click <a href="" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#register" aria-controls="offcanvasRight">here</a> to register.</p>
            </div>
        </form>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const passwordToggler = document.getElementById('passwordToggler');
        const toggleIcon = document.getElementById('toggleIcon');

        passwordToggler.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bx-hide');
                toggleIcon.classList.add('bx-show');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bx-show');
                toggleIcon.classList.add('bx-hide');
            }
        });
    </script>

    <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        aria-controls="offcanvasRight">Toggle right offcanvas</button> -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="register" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Create Account</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                User Address
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="housenum" name="housenum"
                                        placeholder="password" required />
                                    <label for="housenum" class="form-label text-secondary">House
                                        no.\Block\Lot\Street</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="barangay" name="barangay"
                                        placeholder="password" required />
                                    <label for="barangay" class="form-label text-secondary">Barangay</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Account Details
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="password" required />
                                    <label for="username" class="form-label text-secondary">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="password" required />
                                    <label for="password" class="form-label text-secondary">Password</label>
                                    <div id="passwordError" class="text-danger"></div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="con_password" name="con_password"
                                        placeholder="password" required />
                                    <label for="con_password" class="form-label text-secondary">Confirm Password</label>
                                    <div id="confirmPasswordError" class="text-danger"></div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="number" name="number"
                                        placeholder="password" required />
                                    <label for="number" class="form-label text-secondary">Contact Number/Gcash
                                        Number</label>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 mt-3 py-2">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validatePassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('con_password').value;
            const passwordError = document.getElementById('passwordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');

            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

            let isValid = true;

            if (!passwordPattern.test(password)) {
                passwordError.textContent = 'Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number, and no special characters.';
                isValid = false;
            } else {
                passwordError.textContent = '';
            }

            if (password !== confirmPassword) {
                confirmPasswordError.textContent = 'Passwords do not match.';
                isValid = false;
            } else {
                confirmPasswordError.textContent = '';
            }

            return isValid;
        }

        function handleSubmit(event) {
            if (!validatePassword()) {
                event.preventDefault();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('con_password');

            passwordInput.addEventListener('input', validatePassword);
            confirmPasswordInput.addEventListener('input', validatePassword);

            form.addEventListener('submit', handleSubmit);
        });
    </script>
</body>

</html>