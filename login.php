<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    if ($user_type == "admin") {
        $sql = "SELECT * FROM Admins WHERE username='$username'";
    } else {
        $sql = "SELECT * FROM Farmers WHERE username='$username' AND approved=1";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            if ($user_type == "admin") {
                header("Location: admin_homepage.php"); // Redirect to admin homepage
            } else {
                header("Location: farmer_dashboard.html"); // Redirect to farmer dashboard
            }
        } else {
            header("Location: index.php?message=Invalid password!");
        }
    } else {
        header("Location: index.php?message=No user found!");
    }

    $conn->close();
}
?>
