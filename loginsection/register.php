<?php
$loginSuccess = false;

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect('localhost', 'root', '', 'test');
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully!";
    }
    

    if ($password !== $confirmpassword) {
        die('Passwords do not match!');
    }

    $name = mysqli_real_escape_string($connection, $name);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password); 


    $query = "INSERT INTO reg (name, username, password) VALUES ('$name', '$username', '$password')";


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
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
    </head>
<body>
    <div class="wrapper">
        <div class="smiley">
            👋
        </div>
        <form action="register.php" method="post" novalidate>
            <h1 class="main">REGISTER</h1>
            
            <div class="input-box">
                <input type="text" name="name" placeholder="Name" required>
                <i class='bx bxs-user'></i>
            </div>
            
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            
            <div class="input-box">
                <input type="password" name="password" placeholder="EnterPassword" required>
                <i class='bx bx-lock'></i>
            </div>
            
            <div class="input-box">
                <input type="password" name="confirmpassword" placeholder="ConfirmPassword" required>
                <i class='bx bx-lock'></i>
            </div>
            
            <button type="submit" class="btn">Register</button>

            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
    <?php if ($loginSuccess) : ?>
        <div class="popup" id="popup">Registration Successful</div>
    <?php endif; ?>
    <script>
        // Optional: Basic JavaScript password confirmation validation
        document.querySelector('form').addEventListener('submit', function(event) {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirmpassword"]').value;
            if (password !== confirmPassword) {
                event.preventDefault();  // Prevent form submission
                alert('Passwords do not match!');
            }
        });
    </script>
