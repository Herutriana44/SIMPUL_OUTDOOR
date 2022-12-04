<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <!-- Ini Form Untuk Registrasi -->
    <form action="<?php echo base_url('Register/registration'); ?>" method="post">
        <div>
            <input type="text" id="username" name="username" placeholder="Username">
        </div>
        <div>
            <input type="text" id="password" name="password" placeholder="Password">
        </div>
        <input type="submit">
    </form>
</body>
</html>