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

// Function to save the URL
function saveURL() {
    // Retrieve values from form fields
    const url = document.getElementById("url").value;
    const linkName = document.getElementById("linkName").value;
    const tags = document.getElementById("tags").value;

    // logic to handle the data comes here

    // Close the modal
    closeModal('urlModal');
}
