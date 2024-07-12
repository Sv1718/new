<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary Management System</title>
    <style>
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

        .section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            text-align: center;
            background-size: cover;
            background-position: center;
            background-image: url("your_background_image.jpg"); /* Path to your background image */
        }

        .content {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
        }

        .login-section {
            margin-top: 40px;
        }

        .login-box {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
            text-align: left;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }

        .login-box select,
        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-box button {
            width: 100%;
            padding: 10px 0;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .login-box button:hover {
            background-color: #ffa500;
        }

        .login-box .toggle-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .login-box .toggle-link:hover {
            color: #ffa500;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        img {
            width: 100%;
            height: auto;
            display: block;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section {
            animation: fadeInUp 1s ease-in-out;
        }

        .message {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            text-align: center;
        }

        .password-requirements {
            font-size: 0.9rem;
            color: #555;
            text-align: left;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section id="home" class="section">
        <div class="content">
            <h1>Welcome to Diary Management System</h1>
            <p>Your ultimate solution for efficient dairy farming management.</p>
            <?php if (isset($_GET['message'])): ?>
                <div class="message">
                    <?php echo htmlspecialchars($_GET['message']); ?>
                </div>
            <?php endif; ?>
            <div class="login-section">
                <div class="login-box" id="login-box">
                    <h2>Login</h2>
                    <form action="login.php" method="POST">
                        <select name="user_type" required>
                            <option value="farmer">Farmer</option>
                            <option value="admin">Admin</option>
                        </select>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" id="login-password" placeholder="Password" required>
                        <input type="checkbox" onclick="togglePasswordVisibility('login-password')"> Show Password
                        <button type="submit">Login</button>
                        <a href="forgot_password.php" class="toggle-link">Forgot Password?</a>
                        <a href="#" class="toggle-link" id="toggle-signup">Don't have an account? Sign Up</a>
                    </form>
                </div>
                <div class="login-box" id="signup-box" style="display: none;">
                    <h2>Sign Up</h2>
                    <form action="signup.php" method="POST" onsubmit="return validatePassword()">
                        <select name="user_type" id="user_type" required>
                            <option value="farmer">Farmer</option>
                            <option value="admin">Admin</option>
                        </select>
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" id="signup-password" placeholder="Password" required>
                        <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" required>
                        <input type="checkbox" onclick="togglePasswordVisibility('signup-password', 'confirm-password')"> Show Password
                        <div class="password-requirements">
                            <p>Passwords must:</p>
                            <ul>
                                <li>Be at least 8 characters long.</li>
                                <li>Include at least one uppercase letter.</li>
                                <li>Include at least one lowercase letter.</li>
                                <li>Include at least one number.</li>
                                <li>Include at least one special character (e.g., !@#$%^&*).</li>
                            </ul>
                        </div>
                        <input type="text" name="branch_id" id="branch_id" placeholder="Branch ID" style="display: none;">
                        <button type="submit">Sign Up</button>
                        <a href="#" class="toggle-link" id="toggle-login">Already have an account? Login</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="features" class="section">
        <div class="content">
            <h2>Features</h2>
            <p>Our dairy management platform offers an all-inclusive solution for streamlining farm operations and enhancing communication between administrators and farmers. </p>
            <img src="path_to_your_image.jpg" alt="Placeholder Image">
        </div>
    </section>
    <section id="contact" class="section">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Reach out for more information or support.</p>
            <img src="path_to_your_image.jpg" alt="Placeholder Image">
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Diary Management System. All rights reserved.</p>
    </footer>
    <script>
        document.getElementById('toggle-signup').addEventListener('click', function() {
            document.getElementById('signup-box').style.display = 'block';
            document.getElementById('login-box').style.display = 'none';
        });

        document.getElementById('toggle-login').addEventListener('click', function() {
            document.getElementById('signup-box').style.display = 'none';
            document.getElementById('login-box').style.display = 'block';
        });

        document.getElementById('user_type').addEventListener('change', function() {
            var branchInput = document.getElementById('branch_id');
            if (this.value === 'admin') {
                branchInput.style.display = 'block';
            } else {
                branchInput.style.display = 'none';
            }
        });

        function togglePasswordVisibility(...ids) {
            ids.forEach(id => {
                var input = document.getElementById(id);
                if (input.type === 'password') {
                    input.type = 'text';
                } else {
                    input.type = 'password';
                }
            });
        }

        function validatePassword() {
            var password = document.getElementById("signup-password").value;
            var confirmPassword = document.getElementById("confirm-password").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }

            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            var upperCase = /[A-Z]/;
            var lowerCase = /[a-z]/;
            var number = /[0-9]/;
            var specialChar = /[!@#$%^&*]/;

            if (!upperCase.test(password)) {
                alert("Password must contain at least one uppercase letter.");
                return false;
            }

            if (!lowerCase.test(password)) {
                alert("Password must contain at least one lowercase letter.");
                return false;
            }

            if (!number.test(password)) {
                alert("Password must contain at least one number.");
                return false;
            }

            if (!specialChar.test(password)) {
                alert("Password must contain at least one special character.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
