<?php

include_once __DIR__ . '/../layout/head.php'
?>

<body>

<?php
require_once __DIR__ . '/../scripts.php'
?>

<header class="bg-dark text-light text-center py-4">
    <h1>Phone book login</h1>
</header>

<div class="container mt-4">
    <div class="row">

        <div class="col-md-9">
            <h2>Login</h2>
            <form action="/login.php" method="POST">
                <label for="username">Email</label>
                <input type="email" name="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <a href="/login.php" class="btn btn-info" type="submit">Sign in</a>
                <a href="register.php" class="btn btn-primary" type="submit">Register</a>
            </form>
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

</body>
</html>
