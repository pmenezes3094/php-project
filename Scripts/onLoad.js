function myFunction() {
    document.getElementById('loginSuccessfulModal').style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

window.onload = myFunction;