<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
    <title>Register</title>
</head>

<body style="background-color: #eeeeee;">
    <div class="card-login">
        <p class="content-center mt-20" style="font-size: 20px; color: #757575;">Register FIKEA</p>
        <img src="<?= base_url('assets/image/') ?>logo.png" style="text-align: center;" class="logo-login" alt="">
        <div class="row">
            <?= form_open_multipart('Login/daftar_akun') ?>
        </div>
        <div>
            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="formlogin" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap'); ?>">
        </div>
        <div>
            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
            <input type="text" name="username" id="username" class="formlogin" placeholder="Username" value="<?= set_value('username'); ?>">
        </div>
        <div>
            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            <input type=" text" name="email" id="email" class="formlogin" placeholder="Email" value="<?= set_value('email'); ?>">
        </div>
        <div>
            <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
            <input type="password" id="password1" name="password1" class="formlogin" placeholder="Password">
        </div>
        <div>
            <input type="password" id="password2" name="password2" class="formlogin" placeholder="Confirm Password">
        </div>
        <button class="btnlogin" type="submit">Daftar</button>
        <p class="content-center mt-15" style="color:#757575;">Or</p>
        </form>
        <div class="createacc">
            <hr>
            <div>
                <p class="bakun"><a href="<?= base_url('Login') ?>" class="bakun">Login</a></p>
            </div>
            <hr>
        </div>
    </div>
</body>

</html>