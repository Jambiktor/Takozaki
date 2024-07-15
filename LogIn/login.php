<?php
include ('../connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query to prevent SQL injection
    $sql = "SELECT * FROM usertable WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row['user_id'];

            if ($row['admin'] == 1) {
                echo '<script type="text/javascript">
                alert("Welcome to Takozaki Admin ' . $row['username'] . '");
                window.location = "../Admin/admin.php";
                </script>';
                exit();
            } else {
                echo '<script type="text/javascript">
                alert("Welcome to Takozaki ' . $row['username'] . '");
                window.location = "../User/user_homepage.php";
                </script>';
                exit();
            }
        } else {
            echo '<script type="text/javascript">
            alert("Invalid password");
            window.location = "login-form.php";
            </script>';
            exit();
        }
    } else {
        echo '<script type="text/javascript">
        alert("Invalid username or password");
        window.location = "login-form.php";
        </script>';
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>