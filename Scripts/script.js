"use strict";

function goToHomePage() {
    //Redirect to homepage
    window.location.href = "index.html";
}

function submitForm() {
    //Redirect to workspace page
    window.location.href = "workspace.html";
}

/*Modal Related Code */

// Function to open the modal
function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

// Function to close the modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

