<?php 
    session_start(); 
    $fullname = $_SESSION['fullname'];
    $userId = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'partials/htmlhead.php'; ?>
<body>
    <header>
    <?php require 'partials/logo.php'; ?>
        <div>
            <p>Welcome,
                <?php 
                echo $fullname; 
                ?>
            </p>
        </div>
        <form action="../controller/logout.php" method="POST">
            <input type="submit" value="Logout" class="form-button">
        </form>
    </header>

    <main>
        <!-- Div 1: Search Field -->
        <div class="searchField">
        <!-- <form action="../controller/search.php" method="POST"> -->
        <form action="search.view.php" method="POST">
            <input type="text" name="searchKey" placeholder="Search...">
            <input type="submit" value="Search" class="form-button">  
        </form>
        </div>
        
    <footer class="functionalities">
        <button onclick="openModal('textNoteModal')">Text Note</button>
        <button onclick="openModal('photoModal')">Photo</button>
        <button onclick="openModal('urlModal')">URL</button>
        <button onclick="openModal('videoModal')">Video</button>
        <button onclick="openModal('audioModal')">Audio</button>
        
        <!-- <button onclick="openModal('documentModal')">Document</button> -->
    </footer> 
    <?php require 'partials/modals.php'?>

        <div class="card-grid-container">
            <?php require 'partials/dummycards.php'?>
            <?php require '../controller/workspace.php' ?>
        </div>
    </main>

</body>
</html>