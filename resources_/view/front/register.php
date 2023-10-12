<?php
include_once __DIR__ . '/../layout/head.php'
?>

<body>

<header class="bg-dark text-light text-center py-4">
    <h1>Phone book register</h1>
</header>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h2>Register</h2>
            <form action="/register.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="name">Login</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../scripts.php'
?>
</body>
</html>
