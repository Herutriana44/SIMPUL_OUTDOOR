<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #F2F2F2;
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
        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin: 0 20px;
        }

        .nav-links li a {
            color: #ffff;
            font-weight: 700;
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
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        h2 {
            color: #5BC0F8;
            text-align: center ;
            font: 'Poppins', sans-serif;
            text-shadow: 1px 1px 3px #fff;
        }
        .card {
            margin-top: 80px;
            background-color: #ffffff;
            width: 80%;
            height: 90%;
            color : #ffffff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding: 10px 10px;
        }

        button {
            height: 45px;
            width: 170px;
            font-weight: 900;
            color : #fff;
            background-color: #5BC0F8;
            border-radius: 4px;
            border : 0;
        }

        .image {
            display: flex;
            justify-content: center;
        }

        .tombol_upload {
            display: flex;
            justify-content: center; 
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
            <li><button><a href="<?php echo site_url("Dashboard/setLogout"); ?>">Logout</a></button></li>
        </ul>
    </nav>
    <div class="container">
    <div class="card"> 
    <div>
    <h2>Upload Pembayaran</h2>
    <div class="image">
        <img src="<?php echo asset_url();?>upload_file.webp" alt="Upload File"  width="350" height="350">
    </div>
    <div class="tombol_upload">
    <form action="<?php echo base_url('uploadbayar/proses') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <input type="hidden" name="id_rental" value="<?php echo $id_rental ?>">
        <input type="file" class="buktiBayar" name="bukti_pembayaran" id="bukti_pembayaran">
        <button type="submit" class="upload">Upload</button>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>
</html>