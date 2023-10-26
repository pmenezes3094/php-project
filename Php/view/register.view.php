<!DOCTYPE html>
<html lang="en">
<?php require 'partials/htmlhead.php'; ?>
<body>
    <div class="form-container">
        <div class="container">
        <?php require 'partials/logo.php'; ?>
            <h2>Registration Form</h2>
            <form action="../controller/register.php" method="POST" onsubmit="return validatePassword();">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="repassword">Re-enter Password:</label>
                <input type="password" id="repassword" name="repassword" required>

                <input type="submit" value="Submit" class="form-button">
                <input type="reset" value="Clear" class="form-button">
            </form>
            <button onclick="goToHomePage()">Go Back to Home</button>
        </div>
    </div>
</body>
</html>