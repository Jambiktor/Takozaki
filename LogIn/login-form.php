<?php
include ('header.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <img class="position-absolute" src="../images/background.jpg" alt=""
                style=" z-index: -1; right: -65px; top: -10px;">
        </div>

        <form action="login.php" method="post">
            <div class="container d-flex align-items-center justify-content-center flex-column p-3 pt-4 gap-1 rounded shadow-lg"
                style="background-color:white; width:500px;">
                <div>
                    <img src="../images/MainLogo.png" alt="" style="width: 60px;">
                </div>
                <h3>Takozaki-Takoyaki</h3>
                <div class="w-75 position-relative">
                    <div class="rounded mb-1 d-flex align-items-center justify-content-center"
                        style="position: absolute;width: 45px; height: 100%; background-color: #333333; color:white;">
                        <i class='bx bxs-user' style="font-size: 20px;"></i>
                    </div>
                    <input class="w-100 py-2 px-3 ps-5" type="text" placeholder="Username" name="username" required>
                </div>
                <div class="w-75 position-relative">
                    <div class="rounded mb-1 d-flex align-items-center justify-content-center"
                        style="position: absolute;width: 45px; height: 100%; background-color: #333333; color:white;">
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <input id="login_password" class="w-100 py-2 px-5" type="password" placeholder="Password"
                        name="password" required>
                    <div id="login_passwordToggler"
                        class="rounded mb-1 d-flex align-items-center justify-content-center"
                        style="position: absolute;width: 45px; height: 100%;color: #333333; right:0; top:0; cursor: pointer;">
                        <i id="login_toggleIcon" class='bx bx-hide' style="font-size: 20px;"></i>
                    </div>
                </div>
                <div class="w-75">
                    <button class="btn btn-dark w-100 py-2" type="submit" name="login" style="margin-top: 10px;">
                        Login
                    </button>
                </div>
                <p>Don't have an account? Click <a href="" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#register" aria-controls="offcanvasRight">here</a> to register.</p>
            </div>
        </form>
    </div>

    <script>
        const loginPasswordInput = document.getElementById('login_password');
        const loginPasswordToggler = document.getElementById('login_passwordToggler');
        const loginToggleIcon = document.getElementById('login_toggleIcon');

        loginPasswordToggler.addEventListener('click', () => {
            if (loginPasswordInput.type === 'password') {
                loginPasswordInput.type = 'text';
                loginToggleIcon.classList.remove('bx-hide');
                loginToggleIcon.classList.add('bx-show');
            } else {
                loginPasswordInput.type = 'password';
                loginToggleIcon.classList.remove('bx-show');
                loginToggleIcon.classList.add('bx-hide');
            }
        });
    </script>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="register" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Create Account</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="registration.php" method="POST">
                <div class="accordion" id="accordionExample">
                    <!-- User Address -->
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
                                        placeholder="House no. \Block\Lot\Street" required />
                                    <label for="housenum" class="form-label text-secondary">House
                                        no.\Block\Lot\Street</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="barangay" name="barangay"
                                        placeholder="Barangay" required />
                                    <label for="barangay" class="form-label text-secondary">Barangay</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Details -->
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
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="First Name" required />
                                    <label for="first_name" class="form-label text-secondary">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Last Name" required />
                                    <label for="last_name" class="form-label text-secondary">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="reg_username" name="username"
                                        placeholder="Username" required />
                                    <label for="reg_username" class="form-label text-secondary">Username</label>
                                </div>
                                <div class="form-floating mt-md-3 mt-2 position-relative">
                                    <div id="register_passwordToggler"
                                        class="rounded mb-1 d-flex align-items-center justify-content-center"
                                        style="position: absolute;width: 45px; height: 100%;color: #333333; right:0; top:0; cursor: pointer;">
                                        <i id="register_toggleIcon" class='bx bx-hide' style="font-size: 20px;"></i>
                                    </div>
                                    <input type="password" class="form-control w-100 pe-5" id="reg_password"
                                        placeholder="Password" name="password"
                                        pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$"
                                        title="Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number"
                                        required />
                                    <label for="reg_password" class="form-label text-secondary">Password</label>
                                </div>
                                <div id="passwordError" class="text-danger"></div>

                                <div class="form-floating mt-3 position-relative">
                                    <div id="register_confirmPasswordToggler"
                                        class="rounded mb-1 d-flex align-items-center justify-content-center"
                                        style="position: absolute;width: 45px; height: 100%;color: #333333; right:0; top:0; cursor: pointer;">
                                        <i id="register_confirmToggleIcon" class='bx bx-hide'
                                            style="font-size: 20px;"></i>
                                    </div>
                                    <input type="password" class="form-control w-100 pe-5" id="con_password"
                                        placeholder="Confirm Password" name="con_password" required />
                                    <label for="con_password" class="form-label text-secondary">Confirm Password</label>
                                </div>
                                <div id="confirmPasswordError" class="text-danger"></div>

                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" id="number" name="number"
                                        placeholder="Contact Number/Gcash Number" required />
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
        const registerPasswordInput = document.getElementById('reg_password');
        const registerPasswordToggler = document.getElementById('register_passwordToggler');
        const registerToggleIcon = document.getElementById('register_toggleIcon');

        const confirmPasswordInput = document.getElementById('con_password');
        const confirmPasswordToggler = document.getElementById('register_confirmPasswordToggler');
        const confirmToggleIcon = document.getElementById('register_confirmToggleIcon');

        registerPasswordToggler.addEventListener('click', () => {
            if (registerPasswordInput.type === 'password') {
                registerPasswordInput.type = 'text';
                registerToggleIcon.classList.remove('bx-hide');
                registerToggleIcon.classList.add('bx-show');
            } else {
                registerPasswordInput.type = 'password';
                registerToggleIcon.classList.remove('bx-show');
                registerToggleIcon.classList.add('bx-hide');
            }
        });

        confirmPasswordToggler.addEventListener('click', () => {
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                confirmToggleIcon.classList.remove('bx-hide');
                confirmToggleIcon.classList.add('bx-show');
            } else {
                confirmPasswordInput.type = 'password';
                confirmToggleIcon.classList.remove('bx-show');
                confirmToggleIcon.classList.add('bx-hide');
            }
        });

        function validatePassword() {
            const password = document.getElementById('reg_password').value;
            const confirmPassword = document.getElementById('con_password').value;
            const passwordError = document.getElementById('passwordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');

            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

            let isValid = true;

            if (!passwordPattern.test(password)) {
                passwordError.textContent = 'Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.';
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
            const form = document.querySelector('.offcanvas-body form');
            const passwordInput = document.getElementById('reg_password');
            const confirmPasswordInput = document.getElementById('con_password');

            passwordInput.addEventListener('input', validatePassword);
            confirmPasswordInput.addEventListener('input', validatePassword);

            form.addEventListener('submit', handleSubmit);
        });
    </script>

</body>

</html>