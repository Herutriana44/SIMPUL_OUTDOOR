<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Produk</title>
</head>
<body>
    <!-- detail produk dengan for-->
    <?php foreach($produk as $p){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo asset_url();?>produk/<?php echo $p->gambar_produk; ?>" alt="" width="400px">
            </div>
            <div class="col-md-6">
                <h3><?php echo $p->nama_produk; ?></h3>
                <h4>Rp. <?php echo number_format($p->harga_produk,0,',','.'); ?></h4>
                <h5>Stok : <?php echo $p->stok_produk; ?></h5>
                <form action="<?php echo base_url('Rentalproduk/rental'); ?>" method="post">
                <input type="text" id="idproduk" name="idproduk" value="<?php echo $p->id_produk; ?>">
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" max="<?php echo $p->stok_produk; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_rental">Tanggal Rental</label>
                        <input type="date" name="tanggalpeminjaman" id="tanggalpeminjaman" class="form-control">
                    </div>
                    <div class="form-group
                    ">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggalpengembalian" id="tanggalpengembalian" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Rental</button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
    

</body>
</html>