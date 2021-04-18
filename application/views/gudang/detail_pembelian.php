<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<body>
    <div>
        <h3>Detail Pembelian</h3>
        <p>Tanggal : <?=$pembelian->tgl_pembelian?></p>
        <p>Total Pembelian : <?=$pembelian->total_harga_pembelian?></p>
    </div>
    <div>
        <table border="5">
            <thead>
                <tr>
                    <th>Id Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Total Barang</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($detail_pembelian as $d) : ?>
                <tr>
                    <td><?=$d->id_barang?></td>
                    <td><?=$d->nama_barang?></td>
                    <td><?=$d->jumlah_barang?></td>
                    <td><?=$d->harga_total_barang?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong><?=$pembelian->total_harga_pembelian?></strong></td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>