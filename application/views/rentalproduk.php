<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Produk</title>
    <!-- internal css -->
    <style>
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
        
        .image {
            float:left;
            width:30%;
            background:#ffffff;
        }

        .description {
            float:right;
            width:70%;
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

        .description .inputidproduk {
            font-size: 16px;
            border-radius: 4px ;
        }
        
        .btn-rental{
            height: 35px;
            background-color: #2C74B3;
            outline: none;
            width: 200px;
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
    </style>
</head>
<body>
    <!-- Dashboard -->
<nav>
        <div class="logo">
            <h4>Logo</h4>
        </div>
        <ul class="nav-links">
            <li><button><a href="<?php echo site_url("Dashboard"); ?>">Dashboard</a></button></li>
            <li><button><a href="<?php echo site_url("Riwayat"); ?>">Riwayat</a></button></li>
            <li>
            <a href="<?php echo site_url("Dashboard/setLogout"); ?>">Logout</a>
                <!-- Dropdown akun -->
                <!-- <div class="dropdown">
                    <button class="dropbtn">Hai, <?php echo strval($nama); ?></button>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url("Dashboard/setLogout"); ?>">Logout</a>
                    </div>
                </div> -->
            </li>
        </ul>
    </nav>
    <!-- detail produk dengan for-->
    <?php foreach($produk as $p){ ?>
    <!-- <div class="container">
        <div class="row"> -->
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
        <!-- </div>
    </div> -->
    
    <?php } ?>
    

</body>
</html>
