// Function to save the text note 
function createTextNote() {
    // Retrieve values from form fields
    const textNote = document.getElementById("textNote").value;
    const tags = document.getElementById("tags").value;

    const cardHTML = `
        <div class="card-grid-item">
            <div class="card-content">
                <p>
                    ${textNote}
                </p>
            </div>
        </div>
    `;

    var contentHolder = document.getElementById('noteContainer');
    contentHolder.innerHTML = cardHTML;
    // Close the modal
    closeModal('textNoteModal');
}

// // Function to save the URL
// function saveURL() {
//     // Retrieve values from form fields
//     const url = document.getElementById("url").value;
//     const linkName = document.getElementById("linkName").value;
//     const tags = document.getElementById("tags").value;

//     // logic to handle the data comes here

//     // Close the modal
//     closeModal('urlModal');
// }

// // Function to save the audio
// function saveAudio() {
//     // Retrieve values from form fields
//     const audioFile = document.getElementById("audioFile").value;
//     const tags = document.getElementById("tags").value;

//     // logic to handle the audio comes here

//     // Close the modal
//     closeModal('audioModal');
// }

// // Function to save the photo
// function savePhoto() {
//     // Retrieve values from form fields
//     const photoFile = document.getElementById("photoFile").value;
//     const tags = document.getElementById("tags").value;

//     // logic to handle the photo

//     // Close the modal
//     closeModal('photoModal');
// }

// // Function to save the video
// function saveVideo() {
//     // Retrieve values from form fields
//     const videoFile = document.getElementById("videoFile").value;
//     const tags = document.getElementById("tags").value;

//     //logic to handle the video comes here

//     // Close the modal
//     closeModal('videoModal');
// }

// // Function to save the document
// function saveDocument() {
//     // Retrieve values from form fields
//     const documentFile = document.getElementById("documentFile").value;
//     const tags = document.getElementById("tags").value;

//     // logic to handle the document comes here

//     // Close the modal
//     closeModal('documentModal');
// }