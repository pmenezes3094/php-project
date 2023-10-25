<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <title>Workspace</title>
    <script src="Scripts/script.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Assets/logo.png" alt ="Project Abundance Logo" height="30 px">
        </div>
        <div>
            <a href="#">Workspace</a>
            <a href="comingSoon.html">Website</a>
        </div>
        <button id="logoutButton" onclick="goToHomePage()">Logout</button>
    </header>

    <main>
        <!-- Div 1: Search Field -->
        <div class="searchField">
            <input type="text" id="searchField" placeholder="Search...">
            <button id="searchButton">Search</button>
        </div>

        <!-- Div 2: Message - "Data Cards" -->
        <div class="card-grid-container">
            <div class="card-grid-item">
                <div class="card-content">
                    <img src="Assets/demo-image.jpeg">
                </div>
            </div>
            
            <div class="card-grid-item">
                <div class="card-content">
                    <p>
                        “And so the spring buds burst, and so I gaze,
                        And so the blossoms fall, and so my days ...”
                        ― Onitsura</p>
                </div>
            </div>

            <div class="card-grid-item">
                <div class="card-content">
                    <audio controls>
                        <source src="Assets/dry-flowers-and-twigs-rustling-34133.mp3" type="audio/mp3">
                    </audio>
                </div>
            </div>

            <div class="card-grid-item">
                <video controls width="300">
                    <source src="Assets/pexels_videos_3744 (Original).mp4" type="video/mp4">
                </video>
            </div>

            <div class="card-grid-item">
                <div class="card-content">
                    <a href="https://www.weloveflorists.com/floral-blogs/" target="_blank">
                        <img src="Assets/website-header.png" alt="External Link"> Visit weloveflorists.com
                    </a>
                </div>
            </div>
        </div>
    </main>

        
    <footer class="functionalities">
        <button onclick="openModal('urlModal')">URL</button>
        <button onclick="openModal('textNoteModal')">Text Note</button>
        <button onclick="openModal('audioModal')">Audio</button>
        <button onclick="openModal('photoModal')">Photo</button>
        <button onclick="openModal('videoModal')">Video</button>
        <button onclick="openModal('documentModal')">Document</button>
    </footer>   

    <!-- The URL Modal -->
    <div id="urlModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('urlModal')">&times;</span>
            <h2>Add URL</h2>
            <form>
                <label for="url">Link:</label>
                <input type="url" id="url" name="url" required>
                <label for="linkName">Link Name:</label>
                <input type="text" id="linkName" name="linkName" required>
                <label for="tags">Tags:</label>
                <textarea id="tags" name="tags" rows="4" required></textarea>
            </form>
            <button class="modal-close-button" onclick="closeModal('urlModal')">Close</button>
            <button class="modal-save-button" onclick="saveURL()">Save</button>
        </div>
    </div>

    <!-- The Text Note Modal -->
    <div id="textNoteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('textNoteModal')">&times;</span>
            <h2>Add Text Note</h2>
            <form>
                <label for="textNote">Text Note:</label>
                <textarea id="textNote" name="textNote" rows="4" required></textarea>
                <label for="tags">Tags:</label>
                <textarea id="tags" name="tags" rows="4" required></textarea>
            </form>
            <button class="modal-close-button" onclick="closeModal('textNoteModal')">Close</button>
            <button class="modal-save-button" onclick="saveTextNote()">Save</button>
        </div>
    </div>

    <!-- The Audio Modal -->
    <div id="audioModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('audioModal')">&times;</span>
            <h2>Add Audio</h2>
            <form>
                <button class="open-recorder-button">Open Recorder</button>

                <label for="audioFile">Upload Audio File:</label>
                <input type="file" id="audioFile" name="audioFile">
                <label for="tags">Tags:</label>
                <textarea id="tags" name="tags" rows="4" required></textarea>
            </form>
            <button class="modal-close-button" onclick="closeModal('audioModal')">Close</button>
            <button class="modal-save-button" onclick="saveAudio()">Save</button>
        </div>
    </div>

    <!-- The Photo Modal -->
    <div id="photoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('photoModal')">&times;</span>
            <h2>Add Photo</h2>
            <form>
                <button class="open-camera-button">Open Camera</button>

                <label for="photoFile">Upload Photo File:</label>
                <input type="file" id="photoFile" name="photoFile">
                <label for="tags">Tags:</label>
                <textarea id="tags" name="tags" rows="4" required></textarea>
            </form>
            <button class="modal-close-button" onclick="closeModal('photoModal')">Close</button>
            <button class="modal-save-button" onclick="savePhoto()">Save</button>
        </div>
    </div>

    <!-- The Video Modal -->
    <div id="videoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('videoModal')">&times;</span>
            <h2>Add Video</h2>
            <form>
                <button class="open-camera-button">Open Camera</button>
                <label for="videoFile">Upload Video File:</label>
                <input type="file" id="videoFile" name="videoFile" accept="video/*">
                <label for="tags">Tags:</label>
                <textarea id="tags" name="tags" rows="4" required></textarea>
            </form>
            <button class="modal-close-button" onclick="closeModal('videoModal')">Close</button>
            <button class="modal-save-button" onclick="saveVideo()">Save</button>
        </div>
    </div>

    <!-- The Document Modal -->
    <div id="documentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('documentModal')">&times;</span>
            <h2>Add Document</h2>
            <form>
                <label for="documentFile">Upload Document File:</label>
                <input type="file" id="documentFile" name="documentFile" accept=".pdf, .doc, .docx, .txt">
                <label for="tags">Tags:</label>
                <textarea id="tags" name="tags" rows="4" required></textarea>
            </form>
            <button class="modal-close-button" onclick="closeModal('documentModal')">Close</button>
            <button class="modal-save-button" onclick="saveDocument()">Save</button>
        </div>
    </div>
</body>
</html>