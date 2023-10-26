<!DOCTYPE html>
<html lang="en">
<?php require 'partials/htmlhead.php'; ?>
<body>
    <header>
    <?php require 'partials/logo.php'; ?>
        <div>
            <p>Welcome, 
                <?php 
                session_start(); 
                $fullname = $_SESSION['fullname'];
                echo $fullname; 
                ?>
            </p>
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
    
        <?php require 'partials/dummycards.php'?>
        <div id="noteContainer"></div>
    </main>

        
    <footer class="functionalities">
        <button onclick="openModal('textNoteModal')">Text Note</button>
        <!-- <button onclick="openModal('urlModal')">URL</button>
        <button onclick="openModal('audioModal')">Audio</button>
        <button onclick="openModal('photoModal')">Photo</button>
        <button onclick="openModal('videoModal')">Video</button>
        <button onclick="openModal('documentModal')">Document</button> -->
    </footer> 
    
    <?php require 'partials/modals.php'?>
</body>
</html>