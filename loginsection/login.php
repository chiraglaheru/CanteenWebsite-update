<?php
$loginSuccess = false;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connection = mysqli_connect('localhost', 'root', '', 'data');
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    
    $result = mysqli_query($connection, $query);

    if (!$result) { 
        die('Query Failed: ' . mysqli_error($connection));
    } else {
        $loginSuccess = true;
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s, transform 0.5s;
        }
        .popup.show {
            display: block;
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
        .popup.hide {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post" novalidate>
            <h1 class="main">Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bx-lock'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn" name="submit">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Popup message -->
    <?php if ($loginSuccess) : ?>
        <div class="popup" id="popup">Login Successful</div>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popup = document.getElementById('popup');
            if (popup) {
                popup.classList.add('show');
                setTimeout(function() {
                    popup.classList.add('hide');
                    setTimeout(function() {
                        popup.classList.remove('show', 'hide');
                        popup.style.display = 'none'; // Hide the element after animation
                    }, 500); // Match the duration of the opacity transition
                }, 3000); // Display for 3 seconds
            }
        });
    </script>
</body>
</html>
