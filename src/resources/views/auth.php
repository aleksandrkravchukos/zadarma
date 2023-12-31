<?php

if (!isset($_SESSION['user'])) {
    ?>
    <div class="container">
        <form action="/login" method="POST">
            <h2>Login</h2>
            <label class="col-form-label" for="username">Email</label>
            <input placeholder="Email" class="form-control" type="email" name="email" required>
            <label class="col-form-label" for="password">Password</label>
            <input placeholder="Password" class="form-control" type="password" name="password" required>
            <a href="/register" style="margin-top: 20px;" class="btn btn-primary float-right">Sign up</a>
            <button style="margin-top: 20px;" class="btn btn-success" type="submit">Sign in</button>
        </form>
    </div>
    <?php
} else {
    ?>

    <div class="">
        <div class="list-group">
            <a href="/dashboard" class="list-group-item list-group-item-action">Dashboard</a><br><br>
            <a style="margin-bottom: 20px;" href="/contacts" class="list-group-item list-group-item-action">Contacts</a><br><br>
        </div>
    </div>

    <form action="/logout" method="POST">
        <button class="btn btn-primary" type="submit">Log out</button>
    </form>

    <?php
}
?>