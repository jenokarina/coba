<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
    <title>Login</title>
</head>

<body style="background-color: #eeeeee;">
    <div class="card-login">
        <p class="content-center mt-20" style="text-align: center; font-size: 20px; color: #757575;">Login FIKEA</p>
        <img src="<?= base_url('assets/image/') ?>logo.png" style="text-align: center;" class="logo-login" alt="">
        <?= $this->session->flashdata('message') ?>
        <form action="<?= base_url('login/index') ?>" method="post">
            <div>
                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                <input type="text" name="username" class="formlogin" placeholder="Username">
            </div>
            <div>
                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                <input type="password" name="password" class="formlogin" placeholder="Password">
            </div>
            <button class="btnlogin" type="submit">Login</button>
            <p class="mt-15 content-center" style="color:#757575;">Or</p>
        </form>
        <div class="createacc">
            <hr>
            <div>
                <p class="bakun"><a href="<?= base_url('Login/daftar_akun') ?>" class="bakun">Buat Akun</a></p>
            </div>
            <hr>
        </div>
    </div>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    <script src="<?= base_url('assets/js/') ?>jquery-3.4.1.js"></script>
    <script src="<?= base_url('assets/js/') ?>jquery-3.4.1.min.js"></script>
</body>

</html>