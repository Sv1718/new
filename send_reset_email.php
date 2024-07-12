<?php
session_start();
include('db.php');

$email = $_POST['email'];
$token = bin2hex(random_bytes(50));

$query = $con->prepare("SELECT * FROM farmers WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $query = $con->prepare("UPDATE farmers SET reset_token = ?, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
    $query->bind_param("ss", $token, $email);
    $query->execute();
    
    $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
    $subject = "Password Reset Request";
    $message = "Hi,\n\nYou requested a password reset. Click on the following link to reset your password: $resetLink\n\nIf you did not request this, please ignore this email.";
    $headers = "From: no-reply@yourwebsite.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "Password reset link has been sent to your email.";
    } else {
        echo "Failed to send password reset link.";
    }
} else {
    echo "Email not found.";
}
?>
