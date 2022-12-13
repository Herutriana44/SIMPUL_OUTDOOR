<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form pendaftaran simpul Outdoor</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>register.css" media="all"/>
</head>
<body>
    <!-- Ini Form Untuk Registrasi -->
    <div class="register-card">
        <h2>Form Pendaftaran Simpul Outdoor</h2>
        <form class="register-form" method="post">
            <input type="text" placeholder="Nama Lengkap" id="fullname" name="fullname"/>
            <input type="text" placeholder="Alamat Lengkap" id="alamat" name="alamat"/>
            <input type="text" placeholder="Nomor Telepon" id="notlp" name="notlp"/>
            <input type="text" placeholder="Email" id="username" name="username"/>
            <input type="password" placeholder="Password" id="password" name="password"/>
            <input class="button" type="submit" value="Daftar">
        </form>
</body>
</html>