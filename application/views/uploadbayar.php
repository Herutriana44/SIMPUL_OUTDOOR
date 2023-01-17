<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload Pembayaran</h1>
    <form action="<?php echo base_url('uploadbayar/proses') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <input type="hidden" name="id_rental" value="<?php echo $id_rental ?>">
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran">
        <button type="submit">Upload</button>
    </form>
</body>
</html>