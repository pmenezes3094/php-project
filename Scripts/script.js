"use strict";

function goToHomePage() {
    //Redirect to homepage
    window.location.href = "index.php";
}

function goBack() {
    //Redirect back to previous page
    window.history.back();
}

/*Validation Functions*/

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

// Function to save the text note 
function saveTextNote() {
    // Retrieve values from form fields
    const textNote = document.getElementById("textNote").value;
    const tags = document.getElementById("tags").value;

    // logic to handle the text note 

    // Close the modal
    closeModal('textNoteModal');
}

// Function to save the audio
function saveAudio() {
    // Retrieve values from form fields
    const audioFile = document.getElementById("audioFile").value;
    const tags = document.getElementById("tags").value;

    // logic to handle the audio comes here

    // Close the modal
    closeModal('audioModal');
}

// Function to save the photo
function savePhoto() {
    // Retrieve values from form fields
    const photoFile = document.getElementById("photoFile").value;
    const tags = document.getElementById("tags").value;

    // logic to handle the photo

    // Close the modal
    closeModal('photoModal');
}

// Function to save the video
function saveVideo() {
    // Retrieve values from form fields
    const videoFile = document.getElementById("videoFile").value;
    const tags = document.getElementById("tags").value;

    //logic to handle the video comes here

    // Close the modal
    closeModal('videoModal');
}

// Function to save the document
function saveDocument() {
    // Retrieve values from form fields
    const documentFile = document.getElementById("documentFile").value;
    const tags = document.getElementById("tags").value;

    // logic to handle the document comes here

    // Close the modal
    closeModal('documentModal');
}

/*Functions that work without validations*/
// function submitForm() {
//     //Redirect to workspace page
//     window.location.href = "workspace.php";
// }