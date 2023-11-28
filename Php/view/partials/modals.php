    <!-- The Text Note Modal -->
    <div id="textNoteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('textNoteModal')">&times;</span>
            <h2>Add Text Note</h2>
            <form action="../controller/createTextNote.php" method="POST" onsubmit="createTextNote()">
                <label for="textNote">Text Note:</label>
                <textarea id="textNote" name="textNote" rows="4" required></textarea>
                <label for="textNoteTags">Tags:</label>
                <textarea id="textNoteTags" name="textNoteTags" rows="4" required></textarea>
                <input type="submit" value="Save" class="form-button">
            </form>
            <button class="modal-close-button" onclick="closeModal('textNoteModal')">Close</button>
        </div>
    </div>

    <div id="photoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('photoModal')">&times;</span>
            <h2>Add Photo</h2>
            <form action="../controller/imageupload.php" method="post" enctype="multipart/form-data">
                <button class="open-camera-button">Open Camera</button>

                <label for="photoFile">Upload Photo File:</label>
                <input type="file" id="photoFile" name="image" accept="image/*" required>
                <label for="imageTags">Tags:</label>
                <textarea id="imageTags" name="imageTags" rows="4" required></textarea>
                <input type="submit" value="Save" class="form-button">
            </form>
            <button class="modal-close-button" onclick="closeModal('photoModal')">Close</button>
        </div>
    </div>

    <div id="urlModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('urlModal')">&times;</span>
            <h2>Add URL</h2>
            <form action="../controller/createWebLink.php" method="POST" onsubmit="createTextNote()">
                <label for="webLink">Link Name:</label>
                <input type="text" id="webLink" name="webLink" required>
                <label for="webLinkTags">Tags:</label>
                <textarea id="webLinkTags" name="webLinkTags" rows="4" required></textarea>
                <input type="submit" value="Save" class="form-button">
            </form>
            <button class="modal-close-button" onclick="closeModal('urlModal')">Close</button>
        </div>
    </div>

    <div id="videoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('videoModal')">&times;</span>
            <h2>Add Video</h2>
            <form action="../controller/videoupload.php" method="post" enctype="multipart/form-data">
                <button class="open-camera-button">Open Camera</button>
                <label for="video">Upload Video File:</label>
                <input type="file" id="video" name="video" accept="video/*">
                <label for="videoTags">Tags:</label>
                <textarea id="videoTags" name="videoTags" rows="4" required></textarea>
                <input type="submit" value="Save" class="form-button">
            </form>
            <button class="modal-close-button" onclick="closeModal('videoModal')">Close</button>
        </div>
    </div>

    <div id="audioModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('audioModal')">&times;</span>
            <h2>Add Audio</h2>
            <form action="../controller/audioupload.php" method="post" enctype="multipart/form-data">
                <button class="open-recorder-button">Open Recorder</button>
                <label for="audio">Upload Audio File:</label>
                <input type="file" id="audio" name="audio">
                <label for="audioTags">Tags:</label>
                <textarea id="audioTags" name="audioTags" rows="4" required></textarea>
                <input type="submit" value="Save" class="form-button">
            </form>
            <button class="modal-close-button" onclick="closeModal('audioModal')">Close</button>
        </div>
    </div>

<!-- Modals

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
    </div> -->