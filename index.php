<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <title>Login Page</title>
    <script src="Scripts/utilities.js"></script>
</head>
<body>
    <div class="form-container">
        <div class="container">
            <div class="logo">
                <img src="Assets/logo.png" alt ="Project Abundance Logo" height="30 px">
            </div>
            <h2>Login</h2>
            <form action="Php/controller/login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login" class="form-button">
            </form>
            <div class="button-container">
                <a href="Php/view/register.view.php">New User Registration</a>
                <a href="Php/view/password.view.php">Forgot Password</a>
            </div>
        </div>
    </div>
</body>
</html>