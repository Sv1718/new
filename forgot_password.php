<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #A7E6FF;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .reset-box {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
        }

        .reset-box h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }

        .reset-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .reset-box button {
            width: 100%;
            padding: 10px 0;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .reset-box button:hover {
            background-color: #ffa500;
        }
    </style>
</head>
<body>
    <div class="reset-box">
        <h2>Reset Password</h2>
        <form action="send_reset_email.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
