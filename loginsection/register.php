<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <div class="smiley">
            👋
        </div>
        <form action="">
            <h1 class="main">REGISTER</h1>
            <div class="input-box">
                <input type="text" placeholder="Name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter Password" required>
                <i class='bx bx-lock'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>