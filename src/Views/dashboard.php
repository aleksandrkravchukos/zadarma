
<html>
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
            <?php
            include "auth.php";
            ?>
        </div>

        <div class="col-md-9">
            <h2>Dashboard. Hello <?=$_SESSION['user']['username']?></h2>
            <p>A phone book is a tool for storing, organizing and managing contacts and information about people and
                organizations with whom you have contact. Typically, it contains information such as name, phone number,
                email address, address, additional notes, and the ability to edit and search for this information. Phone
                books can be physical notebooks or virtual applications available online or on mobile devices.</p>

        </div>
    </div>
</div>

<?php
include_once 'scripts.php';
?>
</body>

</html>