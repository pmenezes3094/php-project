<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <title>Login Page</title>
    <script src="Scripts/script.js"></script>
</head>
<body>
    <div class="form-container">
        <div class="container">
            <div class="logo">
                <img src="Assets/logo.png" alt ="Project Abundance Logo" height="30 px">
            </div>
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <label for="user_id">User ID:</label>
                <input type="text" id="user_id" name="user_id" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="button" value="Login"  onClick="submitForm()" class="form-button">
            </form>
            <div class="button-container">
                <a href="registrationForm.html">New User Registration</a>
                <a href="passwordReset.html">Forgot Password</a>
            </div>
        </div>
    </div>
</body>
</html>