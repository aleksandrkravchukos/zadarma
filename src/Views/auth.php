<?php

if (!isset($_SESSION['user'])) {
    ?>
    <div class="container">
        <form action="/login" method="POST">
            <h2>Login</h2>
            <label class="col-form-label" for="username">Email</label>
            <input class="form-control" type="email" name="email" required>
            <label class="col-form-label"  for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <button style="margin-top: 20px;" class="btn btn-success" type="submit">Sign in</button>
            <a href="/register" style="margin-top: 20px;" class="btn btn-primary">Sign up</a>
        </form>
    </div>
    <?php
} else{
    ?>

    <form action="/logout" method="POST">
        <button class="btn btn-primary" type="submit">Log out</button>
    </form>

<?php
}
?>