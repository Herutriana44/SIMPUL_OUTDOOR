<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>login.css" media="all">
</head>

<body>
  <!-- Form Login dengan action mengarah ke fungsi aksi login di Controller Login dengan metode POST -->
  <div class="login-card">
        <h2>Simpul Outdoor Login</h2>
        <form class="login-form" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
            <input type="text" name="txt_username" id="txt_username" placeholder="Username" />
            <input type="password" name="txt_password" id="txt_password" placeholder="Password" />
            <a href="#">
                Lupa Password?
            </a>
            <input type="submit" value="Login">
            <!-- Halaman Pendaftaran--->
            <p>Belum punya akun ? <a href="<?php echo base_url('Register'); ?>">Daftar</a></p> 
        </form>
    </div>

  
</body>

</html>