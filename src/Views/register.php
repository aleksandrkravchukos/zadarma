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

            <h2>Put your data</h2>
            <form action="/register" method="POST">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-4 col-form-label">Login</label>
                    <div class="col-sm-7">
                        <input onblur="validateLogin(this.val())" name="username" type="text" class="form-control" id="username" maxlength="16">
                        <div id="username_error"></div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-7">
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password2" class="col-sm-4 col-form-label">Confirm password</label>
                    <div class="col-sm-7">
                        <input name="password2" type="password" class="form-control" id="password2">
                    </div>
                </div>

                <button class="btn btn-success float-right" style="margin-top: 20px;" type="submit">Register</button>

                <?php
                if (!isset($_SESSION['user'])) {
                    echo '<a href="/" class="btn btn-primary" style="margin-top: 20px;" type="submit">Login</a>';
                }
                ?>


            </form>

        </div>

        <div class="col-md-6">
        </div>
    </div>
</div>

<?php
include_once 'scripts.php';
?>
</body>

</html>