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
        nav {
            background-color: #FF0000;
            height: 80px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            position: fixed;
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
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
        }

        .nav-links li a:hover {
            color: #000;
        }

        .nav-links li button {
            height: 80px;
            background-color: #FF0000;
            outline: none;
            width: 150px;
            transition: all 0.30s ease-in-out;
            font: 20px 'Poppins', sans-serif;
            border: 1px solid #FF0000;
            color: #fff;
            cursor: pointer;
        }

        .nav-links li button:hover {
            background-color: #fff;
            color: #FF0000;
        }

        .nav-links li button:active {
            transform: translateY(4px);
        }

        .nav-links li button:focus {
            outline: none;
        }

        .nav-links li button:disabled {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .nav-links li button:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .nav-links li button:disabled:active {
            transform: translateY(0px);
        }

        .nav-links li button:disabled:focus {
            outline: none;
        }

        .nav-links li button:disabled:active {
            transform: translateY(0px);
        }

        .nav-links li button:disabled:focus {
            outline: none;
        }

        .nav-links li button:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .nav-links li button:disabled:active {
            transform: translateY(0px);
        }

        .container {
            margin-top: 100px;
        }

        .card {
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
            height: 40px;
            background-color: #FF0000;
            outline: none;
            width: 100%;
            transition: all 0.30s ease-in-out;
            font: 20px 'Poppins', sans-serif;
            border: 1px solid #FF0000;
            color: #fff;
            cursor: pointer;
        }

        .card-body button:hover {
            background-color: #fff;
            color: #FF0000;
        }

        .card-body button:active {
            transform: translateY(4px);
        }

        .card-body button:focus {
            outline: none;
        }

        .card-body button:disabled {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .card-body button:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .card-body button:disabled:active {
            transform: translateY(0px);
        }

        .card-body button:disabled:focus {
            outline: none;
        }

        .card-body button:disabled:active {
            transform: translateY(0px);
        }

        .card-body button:disabled:focus {
            outline: none;
        }

        .card-body button:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .card-body button:disabled:active {
            transform: translateY(0px);
        }

        .card-body button:disabled:focus {
            outline: none;
        }

        .card-body button:disabled:active {
            transform: translateY(0px);
        }

        .card-body button:disabled:focus {
            outline: none;
        }

        .card-body button:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .card-body button:disabled:active {
            transform: translateY(0px);
        }

        .card-body button:disabled:focus {
            outline: none;
        }

        .card-body button:disabled:active {
            transform: translateY(0px);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #3e8e41;
        }

        .dropbtn:active {
            transform: translateY(4px);
        }

        .dropbtn:focus {
            outline: none;
        }

        .dropbtn:disabled {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .dropbtn:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .dropbtn:disabled:active {
            transform: translateY(0px);
        }

        .dropbtn:disabled:focus {
            outline: none;
        }

        .dropbtn:disabled:active {
            transform: translateY(0px);
        }

        .dropbtn:disabled:focus {
            outline: none;
        }

        .dropbtn:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .dropbtn:disabled:active {
            transform: translateY(0px);
        }

        .dropbtn:disabled:focus {
            outline: none;
        }

        .dropbtn:disabled:active {
            transform: translateY(0px);
        }

        .dropbtn:disabled:focus {
            outline: none;
        }

        .dropbtn:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .dropbtn:disabled:active {
            transform: translateY(0px);
        }

        .dropbtn:disabled:focus {
            outline: none;
        }

        .dropdown-content a:disabled {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .dropdown-content a:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
        }

        .dropdown-content a:disabled:active {
            transform: translateY(0px);
        }

        .dropdown-content a:disabled:focus {
            outline: none;
        }

        .dropdown-content a:disabled:active {
            transform: translateY(0px);
        }

        .dropdown-content a:disabled:focus {
            outline: none;
        }

        .dropdown-content a:disabled:hover {
            background-color: #ccc;
            color: #fff;
            cursor: not-allowed;
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
            <h4>Logo</h4>
        </div>
        <ul class="nav-links">
            <li><button><a href="<?php echo site_url("Dashboard"); ?>">Dashboard</a></button></li>
            <li><button><a href="<?php echo site_url("Riwayat"); ?>">Riwayat</a></button></li>
            <li>
                <!-- Dropdown akun -->
                <div class="dropdown">
                    <button class="dropbtn">Hai, <?php echo strval($nama); ?></button>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url("Akun"); ?>">Profil</a>
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
                                <button>Beli</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    
</body>
</html>