"use strict";

function goToHomePage() {
    //Redirect to homepage
    window.location.href = "../../index.php";
}

function goBack() {
    //Redirect back to previous page
    // window.history.back();

    window.location.href = "workspace.view.php";
}

//Function to validate that password and re-enter password have same fields
function validatePassword() {
    var password = document.getElementById('password').value;
    var repassword = document.getElementById('repassword').value;

    if (password !== repassword) {
        alert("Passwords do not match. Please re-enter your password.");
        return false;
    }

    return true;
}