<?php
session_start();
require 'proses/koneksi.php';
//Add useless comment
if (isset($_SESSION['kasir']) != "") {
    header('location: kasir/');
}elseif(isset($_SESSION['manager']) != "") {
    header('location: manager/');
}else{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
            <title>Login || Toko Buku</title>
            <!-- <link rel="stylesheet" href="style.css"> -->
            <link rel="stylesheet" href="style-login.css">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <body>
            <!-- <div class="center">
                <h1 class="panel">Toko Buku</h1>

                <div class=" panel-login">
                    <h2>Login</h2>
                    <form action="proses/login.php" method="post">
                        <p><input type="text" name="username" value="" placeholder="Username"></p>
                        <p><input type="password" name="password" value="" placeholder="Password"></p>
                        <p><input type="submit" name="login" value="Masuk"></p>
                    </form>
                </div>
            </div> -->
            <div class="global-container">
                <div class="card login-form">
                    <div class="card-body">
                        <h3 class="card-title text-center"></h3>
                        <div class="card-text">
                            <h1>Login</h1>
                            <!--
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                            <form action="proses/login.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-sm" name="username" value="" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password" value="" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="login">LOG IN</button>
                                <!-- <div class="sign-up">
                                    tidak mempunyai akun silahkan <a href="#">Register</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <?php
}
?>
