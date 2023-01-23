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
    <title>Rental Produk</title>
    <!-- internal css -->
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

        .card {
            margin-top: 80px;
            background-color: #ffffff;
            width: 80%;
            height: 90%;
            color : #ffffff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        
        .image {
            float:left;
            padding-left: 20px;
            margin-top: 20px;
            padding-top: 50px;
            width:30%;
            background:#ffffff;
        }

        .description {
            float:right;
            margin-top: 20px;
            padding-top: 50px;
            width:60%;
            background:#ffffff;
        }

        .description h2 {
            color :black;
            margin: 0;
        }

        .description .price{
            color : #2C74B3;
            margin : 3px;
        } 
        .jumlah {
            color : black;
            font-size: 20px;

        }
        .btn-rental{
            height: 35px;
            margin-top: 7px;
            background-color: #2C74B3;
            outline: none;
            width: 300px;
            transition: all 0.30s ease-in-out;
            font: 15px 'Poppins', sans-serif;
            font-weight: 600;
            border : 0;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .btn-rental:hover{
            background-color: #144272;
            color: #ffffff;
        }

        label{
            color: black;
            font-weight: 600;
            }

        .form-group{
            margin-top: 6px;
        }
    </style>
</head>
<body>
    <!-- Dashboard -->
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
    <!-- detail produk dengan for-->
    <?php foreach($produk as $p){ ?>
    <div class="container">
        <div class="card"> 
            <div class="image">
                <img src="<?php echo asset_url();?>produk/<?php echo $p->gambar_produk; ?>" alt="" width="400px">
            </div>
            <div class="description">
                <h2><?php echo $p->nama_produk; ?></h2>
                <h2 class="price">Rp. <?php echo number_format($p->harga_produk,0,',','.'); ?></h2>
                <h3 class="stock">Stok : <?php echo $p->stok_produk; ?></h3>
                <form action="<?php echo base_url('Rentalproduk/rental'); ?>" method="post">
                <input hidden class="inputidproduk"type="text" id="idproduk" name="idproduk" value="<?php echo $p->id_produk; ?>">
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" max="<?php echo $p->stok_produk; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_rental">Tanggal Rental</label>
                        <input type="date" name="tanggalpeminjaman" id="tanggalpeminjaman" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggalpengembalian" id="tanggalpengembalian" class="form-control">
                    </div>
                    <button type="submit" class="btn-rental">Rental</button>
                </form>
            </div>
       </div>
     </div> 
    
    <?php } ?>
    

</body>
</html>
