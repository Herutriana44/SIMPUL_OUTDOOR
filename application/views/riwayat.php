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

        .riwayat {
            margin-top : 90px;
            text-align: center;
        }
        p{
            font-size: 25px;
            font-weight: 600;
            color: #5BC0F8;
            text-shadow: 1px 1px 2px black;
           }

        table {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
        }
        
        table th {
        padding: 15px 35px;
        border-left:1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
        }
        
        table th:first-child{  
        border-left:none;  
        }
        
        table tr {
        text-align: center;
        padding-left: 20px;
        }
        
        table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
        }
        
        table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
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

    <!-- Riwayat -->
    <div class="riwayat">
    <p class="riwayat-p">Riwayat</p>
    <!-- tampilkan riwayat rental dengan tabel dan perulangan -->
    <table class="table table-bordered table-striped" border="1">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Tanggal Rental</th>
            <th>Tanggal Kembali</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        foreach($riwayat as $r){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r->nama_produk ?></td>
            <td><?php echo $r->tanggal_peminjaman ?></td>
            <td><?php echo $r->tanggal_pengembalian ?></td>
            <td>Rp. <?php echo number_format($r->harga_produk,0,',','.') ?></td>
            <td>Rp. <?php echo number_format($r->total_harga,0,',','.') ?></td>
            <td><?php echo $r->status_peminjaman ?></td>
            <td>
                <?php if($r->status_peminjaman == "Belum Dikonfirmasi"){ ?>
                    <button id="bayar" class="btn btn-sm btn-danger">Bayar</button>
                    <script>
                        let bayar = document.getElementById('bayar');
                        bayar.addEventListener('click', function(){
                            window.location.href = "<?php echo base_url('uploadbayar?id_rental='.$r->id_rental) ?>";
                        });
                    </script>
                <?php }elseif($r->status_peminjaman == "Sudah Dikonfirmasi"){ ?>
                    <button class="btn btn-sm btn-success">Sudah Dikonfirmasi</button>
                <?php }elseif($r->status_peminjaman == "Selesai"){ ?>
                    <button class="btn btn-sm btn-success">Selesai</button>
                <?php } ?>
                <!-- hapus -->
                <a id="hapus" name="hapus" href="<?php echo base_url('riwayat/hapus/'.$r->id_rental) ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>


</body>
</html>