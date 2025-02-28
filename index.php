<?php
include_once 'config/settings-configuration.php';

if(isset($_SESSION["userSession"])) {
    echo "<script>alert('user is log in.'); window.location.href = './dashboard_user/user/home.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Care | Login and Registration</title>
    <link rel="icon" type="image/png" href="src/img/logo1.png">
    <link rel="stylesheet" href="./src/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<body>
    <div class="logo-container">
        <img class="landing-logo" src="src/img/logo1.png" alt="logo">
    </div>

    <div class="auth-container">
        <div class="container-sign-in">
            <h1>SIGN IN</h1>
            <form action="dashboard_user/user/authentication_user/user-class.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="btn-user-signin">SIGN IN</button>
                <p><a href="forgot-password.php">Forgot Password?</a></p>
            </form>
        </div>

        <div class="container-sign-up">
            <h1>REGISTRATION</h1>
            <form action="dashboard_user/user/authentication_user/user-class.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="btn-user-signup">SIGN UP</button>
            </form>
        </div>
    </div>
</body>
</html>