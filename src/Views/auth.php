<?php

if (!isset($_SESSION['user'])) {
    ?>
    <div class="container">
        <form action="/login" method="POST">
            <h2>Login</h2>
            <label for="username">Email</label>
            <input type="email" name="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <button type="submit">Sign in</button>
        </form>
    </div>
    <?php
} else{
    echo '<a href="/logout">Sign out</a>';
}
?>