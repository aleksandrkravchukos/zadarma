<?php
//
//session_start();
//if (isset($_SESSION['user'])) {
//    header('Location: dashboard.php');
//    exit;
//}
//?>

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
        <!-- Перша колонка для меню -->
        <div class="col-md-3">

                        <div class="list-group">
<!--                            <a style="margin-bottom: 20px;" href="#" class="list-group-item list-group-item-action">Contacts</a><br><br>-->
<!--                            <a href="#" class="list-group-item list-group-item-action">Пункт Меню 2</a>-->
<!--                            <a href="#" class="list-group-item list-group-item-action">Пункт Меню 3</a>-->
                        </div>
<!--            --><?php
//            include "auth.php";
//            ?>

        </div>

        <div class="col-md-6">
            <h2>Put your data</h2>
            <form action="/register" method="POST">
                <label class="col-form-label" for="username">Login</label>
                <input class="form-control" type="text" name="username" required>

                <label for="username">Email</label>
                <input class="form-control" type="email" name="email" required>

                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required>

                <label for="password2">Confirm password</label>
                <input class="form-control" type="password" name="password2" required>

                <button class="btn btn-success" style="margin-top: 20px;" type="submit">Register</button>

                <?php
                    if(!isset($_SESSION['user'])){
                        echo '<a href="/" class="btn btn-primary" style="margin-top: 20px;" type="submit">Login</a>';
                    }
                ?>


            </form>

        </div>

        <div class="col-md-6">
        </div>
    </div>
</div>

<!--<div class="jumbotron jum">-->
<!--    <div class=" navbar">-->
<!--        <h3>Phone Book <i class="far fa-address-book"></i></h3>-->
<!--    </div>-->
<!---->
<!--    <div class="container">-->
<!--        <form action="register.php" method="POST">-->
<!--            <h2>Реєстрація</h2>-->
<!--            <label for="username">Логін:</label>-->
<!--            <input type="text" name="username" required>-->
<!--            <label for="password">Пароль:</label>-->
<!--            <input type="password" name="password" required>-->
<!--            <button type="submit">Зареєструватися</button>-->
<!--        </form>-->
<!--        <a href="login.php">Увійти</a>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <div class="col-lg-4 inp">-->
<!--            <input onkeyup="searchFunction()" id="myInput" class="form-control mt-2" placeholder="search">-->
<!--            <span class="icon text-primary"><i class="fas fa-search"></i></span>-->
<!---->
<!--            <h5 class="mt-2">Add New Contact</h5>-->
<!---->
<!--            <input onblur="validateName()" class="form-control mb-3 mt-3" placeholder="add name" id="userName">-->
<!--            <div id="nameAlert" class="alert alert-danger text-justify p-2 ">Please add name</div>-->
<!--            <input onblur="validatePhone()" class="form-control mb-3" placeholder="add phone" id="userPhone">-->
<!--            <div id="phoneAlert" class="alert alert-danger text-justify p-2 ">Please add a valid number</div>-->
<!--            <input onblur="validateEmail()" class="form-control mb-3" placeholder="add e-mail" id="userEmail">-->
<!--            <div id="mailAlert" class="alert alert-danger text-justify p-2 ">Please add a valid e-mail</div>-->
<!---->
<!--            <button onclick="addContact()" class="btn btn-info w-100 btn1">Add</button>-->
<!---->
<!---->
<!--        </div>-->
<!---->
<!---->
<!--        <div class="col-lg-8">-->
<!---->
<!--            <table id="myTable" class="table text-justify table-striped">-->
<!---->
<!--                <thead class="tableh1">-->
<!--                <th class="">Name</th>-->
<!--                <th class="">Phone</th>-->
<!--                <th class="">E-mail</th>-->
<!--                <th class="col-1"></th>-->
<!--                <th class="col-1"></th>-->
<!--                </thead>-->
<!---->
<!--                <tbody id="tableBody">-->
<!---->
<!---->
<!--                </tbody>-->
<!---->
<!--            </table>-->
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->

<?php
include_once 'scripts.php';
?>
</body>

</html>