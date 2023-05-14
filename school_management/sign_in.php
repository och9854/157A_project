<!DOCTYPE html>
<?php
require 'shared/helper.php';
require 'config/config.php';

if (isset($_SESSION['logged_in'])) {
    header("Location: " . BASE_URL . 'module=dashboard&action=index');
    exit();
}

require 'modules/classes/DB.php';
require 'modules/classes/User.php';

if (isset($_POST['submit'])) {
    $obj = new User($_POST);
    $obj->sign_in();
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel Log In</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>assets/plugins/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>assets/plugins/css/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="javascript:void(0);" class="h1"><b>School</b>Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in </p>

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($obj->response) && !$obj->response['status']) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <?= $obj->response['message']; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>

<!--            <p class="mb-1">-->
<!--                <a href="forgot-password.html">Forgot password?</a>-->
<!--            </p>-->
        </div>
    </div>
</div>
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/adminlte.min.js"></script>
</body>
</html>
