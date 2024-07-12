<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            background-color: #F0FFF0;
            color: #333;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .content {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ffa500;
        }

        .message {
            text-align: center;
            color: #3c763d;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Reset Password</h2>
        <form action="reset_password_process.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>" required>
            <input type="password" name="password" placeholder="Enter new password" required>
            <input type="password" name="confirm_password" placeholder="Confirm new password" required>
            <button type="submit">Reset Password</button>
        </form>
        <?php if (isset($_GET['message'])): ?>
            <div class="message">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
