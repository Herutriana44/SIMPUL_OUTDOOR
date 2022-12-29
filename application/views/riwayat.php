<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Ini riwayat</p>
    <!-- tampilkan riwayat rental dengan tabel dan perulangan -->
    <table class="table table-bordered table-striped">
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
        </tr>
        <?php } ?>
    </table>



</body>
</html>