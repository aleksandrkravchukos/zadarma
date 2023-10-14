<!DOCTYPE html>
<html lang="en">
<?php
include_once 'header.php';
?>
<body>

<header class="bg-dark text-light text-center py-4">
    <h1>Phone book</h1>
</header>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
            </div>
        </div>

        <div class="col-md-7">
            <?php
            echo '<h2>You are registered in our system, please check email</h2><br>';
            include "auth.php";
            ?>

        </div>

        <div class="col-md-2">
        </div>
    </div>
</div>

<?php
include_once 'scripts.php';
?>
</body>

</html>