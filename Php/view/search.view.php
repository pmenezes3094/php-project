<!DOCTYPE html>
<html lang="en">
<?php require 'partials/htmlhead.php'; ?>
<body>
    <header>
    <?php require 'partials/logo.php'; ?>
        <form action="../controller/logout.php" method="POST">
            <input type="submit" value="Logout" class="form-button">
        </form>
    </header>

    <main>
        <!-- Div 1: Search Field -->
        <div class="searchField">
        <form action="search.view.php" method="POST">
            <input type="text" name="searchKey" placeholder="Search...">
            <input type="submit" value="Search" class="form-button">  
        </form>
        </div>

        <div class="card-grid-container">
            <?php require '../controller/search.php' ?>
        </div>
    </main>

        
    <footer class="functionalities">
        <button onclick="goBack()">Clear</button>
    </footer> 
    <?php require 'partials/modals.php'?>

</body>
</html>