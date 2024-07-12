<?php
include ('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $housenum = $_POST['housenum'];
    $barangay = $_POST['barangay'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    // Prepare SQL query to check if username already exists
    $check_sql = "SELECT * FROM usertable WHERE username = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<script>
        alert("Username already exists. Please choose a different username.");
        window.location = "register.php";
        </script>';
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert new user
        $insert_sql = "INSERT INTO usertable (housenum, barangay, first_name, last_name, username, password, number) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sssssss", $housenum, $barangay, $first_name, $last_name, $username, $hashed_password, $number);

        if ($stmt->execute()) {
            echo '<script>
            alert("Registered Successfully.");
            window.location = "../LogIn/login-form.php";
            </script>';
        } else {
            echo '<script>
            alert("Error: Unable to create record.");
            window.location = "register.php";
            </script>';
        }
    }

    $stmt->close();
}

$conn->close();
?>