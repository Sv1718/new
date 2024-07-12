<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_id = $_POST['farmer_id'];
    $sql = "UPDATE Farmers SET approved=1 WHERE farmer_id='$farmer_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_homepage.php?message=Farmer approved successfully!");
    } else {
        header("Location: admin_homepage.php?message=Error: " . $sql . "<br>" . $conn->error);
    }

    $conn->close();
}
?>
