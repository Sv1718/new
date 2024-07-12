<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $branch_id = $_POST['branch_id'];

    // Password validation
    if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&*!])[a-zA-Z0-9@#$%^&*!]{8,}$/', $password)) {
        header("Location: index.php?message=Password does not meet the requirements.");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: index.php?message=Passwords do not match.");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    if ($user_type == "admin") {
        $sql = "INSERT INTO Admins (name, username, password, branch_id) VALUES ('$name', '$username', '$hashed_password', '$branch_id')";
    } else {
        $sql = "INSERT INTO Farmers (name, username, password) VALUES ('$name', '$username', '$hashed_password')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Registration successful! You can now log in.");
    } else {
        header("Location: index.php?message=Error: " . $sql . "<br>" . $conn->error);
    }

    $conn->close();
}
?>