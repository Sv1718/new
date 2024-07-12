<?php
include 'db.php';

// Fetch all farmers who need approval
$sql = "SELECT * FROM Farmers WHERE approved = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <style>
        /* Add your CSS here */
        body {
            background-color: #A7E6FF;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background: #3abef9;
            color: #fff;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ffa500;
        }

        .content {
            margin-top: 80px;
            text-align: center;
        }

        .content table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .content th, .content td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .content th {
            background-color: #3abef9;
            color: #fff;
        }

        .content td {
            background-color: #fff;
        }

        .approve-button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .approve-button:hover {
            background-color: #ffa500;
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="admin_homepage.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <h1>Admin Dashboard</h1>
        <h2>Farmer Account Creation Requests</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td><form action='approve_farmer.php' method='POST'><input type='hidden' name='farmer_id' value='" . $row['farmer_id'] . "'><button type='submit' class='approve-button'>Approve</button></form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No account creation requests</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
