<?php
// matikan warning
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset_url();?>style.css">
    <title>Dashboard</title>
    <!-- Internal CSS -->
    <style>
        body {
            background-color: #F2F2F2;
        }

        .logo{
            font-size: 7px;
            padding-left: 10px;
        }

        .nama_perusahaan h1{
            font-family: 'Poppins', sans-serif;
            color : #ffffff;
            margin: 0;
            padding: 0;
        }

        .nama_perusahaan h3{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color : #ffffff;
        }

        nav {
            background:linear-gradient(#1374fb,#5BC0F8);
            height: 60px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            position: fixed;
            border-radius: 0 0 10px 10px;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .logo {
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin: 0 20px;
        }

        .nav-links li a {
            color: #ffff;
            font-weight: 600;
            text-decoration: none;
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .nav-links li a:hover {
            color: #ffffff;
        }

        .nav-links li button {
            height: 60px;
            background:linear-gradient(#1374fb,#5BC0F8);
            outline: none;
            width: 150px;
            transition: all 0.30s ease-in-out;
            font: 20px 'Poppins', sans-serif;
            border-radius: 5px ;
            border: 0;
            color: #fff;
            cursor: pointer;
        }

        .nav-links li button:hover {
            background-color: #5BC0F8;
            color: #FF0000;
        }

        .container {
            margin-top: 100px;
        }

        .card {
            background-color: #ffffff;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 300px;
            float: left;
            margin-left: 20px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card img {
            border-radius: 5px 5px 0 0;
            width: 100%;
            height: 200px;
        }

        .card-body .text {
            padding: 2px 16px;
        }

        .card-body .text h3 {
            font-size: 20px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .card-body .text p {
            font-size: 15px;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        .card-body button {
            margin-bottom: 5px;
            height: 40px;
            background-color: #2C74B3;
            outline: none;
            width: 100%;
            transition: all 0.30s ease-in-out;
            font: 20px 'Poppins', sans-serif;
            border : 0;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .card-body button:hover {
            background-color: #144272;
            color: #ffffff;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown .dropbtn{
            font-size: 15px;
            font-weight: 600;
        }
        .dropdown-content {
            display: none;
            position:absolute;
            border-radius: 4px;
            background-color: #5BC0F8;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
           
        }

        .nav-links .dropdown-content a {
            color: #ffffff;
            font-weight: 100;
            font-size: 15px;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .dropdown-content a:hover {
            background-color: #EB455F
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #5BC0F8;
        }

        .nav-links .li .dropbtn {
            background-color: #5BC0F8;
            color: white;
            padding: 16px;
            font-size: 10px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #5BC0F8;
        }

        #idproduk {
            display: none;
        }   

    </style>   
</head>
<body>
    <!-- Ini navbar -->
    <nav>
        <div class="logo">
            <img src="<?php echo asset_url();?>simpul_logo.png" alt="Logo Produk"  width="45" height="45">
        </div>
        <div class="nama_perusahaan">
            <h1>Simpul Outdoor</h1>
            <h3>Rental Outdoor & Equipment</h3>
        </div>
        <ul class="nav-links">
            <li><button><a href="<?php echo site_url("Dashboard"); ?>">Dashboard</a></button></li>
            <li><button><a href="<?php echo site_url("Riwayat"); ?>">Riwayat</a></button></li>
            <li>
                <!-- Dropdown akun -->
                <div class="dropdown">
                    <button class="dropbtn">Hai, <?php echo strval($nama); ?></button>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url("Dashboard/setLogout"); ?>">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <!-- ini tampilan card produk dengan perulangan-->
    <div class="container">
        <div class="row">
            <?php foreach($produk as $p) : ?>
                <div class="col-4">
                    <div class="card">
                        <img src="<?php echo asset_url();?>produk/<?php echo $p->gambar_produk; ?>" alt="gambar produk">
                        <div class="card-body">
                            <form action="<?php echo base_url('Rentalproduk'); ?>" method="post">
                            <div class="text">
                                <h3><?php echo $p->nama_produk; ?></h3>
                                <p><?php echo $p->harga_produk; ?></p>
                                <p><?php echo $p->deskripsi_produk; ?></p>
                                <input id="idproduk" name="idproduk" type="text" value="<?php echo $p->id_produk;?>">
                                <button>Rental</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    
</body>
</html>


