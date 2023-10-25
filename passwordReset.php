<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <title>Password Reset</title>
    <script src="Scripts/script.js"></script>
</head>
<body>
    <div class="form-container">
        <div class="container">
            <div class="logo">
                <img src="Assets/logo.png" alt ="Website logo which has words written as Project Abundance by Priya Menezes" height="30 px">
            </div>
            <h2>Password Reset Form</h2>
            <form action="reset_password.php" method="POST" onsubmit="return validatePassword();">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="repassword">Re-enter New Password:</label>
                <input type="password" id="repassword" name="repassword" required>

                <input type="submit" value="Reset Password" class="form-button">
                <input type="reset" value="Clear" class="form-button">
            </form>
            <button onclick="goToHomePage()">Go Back to Home</button>
        </div>
    </div>
</body>
</html>