<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // header('Location: user_landing_page.php');
} else {
    echo '<script>
    alert("You must be logged in to view this page.");
    window.location = "LogIn\login.php";
    </script>';
    exit();
}
?>