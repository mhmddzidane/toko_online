<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size:64px; color:'#dddddd"><i>Invoice</i></div>
    <p>
        <i>Toko Online Shop</i>
        <br>
        Tangerang, Indonesia
        <br>
        081296430776
    </p>
    <hr>
    <br>
    <br>
    <p>
        Pembeli : <?= $pembeli->username; ?><br>
        Alamat : <?= $transaksi->alamat; ?><br>
        Transaksi No : <?= $transaksi->id; ?><br>
        Tanggal : <?= date('Y-m-d', strtotime($transaksi->created_date)); ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Barang</strong></th>
            <th><strong>Harga Satuan</strong></th>
            <th><strong>Jumlah Pembelian</strong></th>
            <th><strong>Tarif Ongkir</strong></th>
            <th><strong>Total Harga</strong></th>
        </tr>
        <tr>
            <td><?= $barang->nama; ?></td>
            <td><?= "Rp. " . number_format($barang->harga, 2, ',', '.'); ?></td>
            <td><?= $transaksi->jumlah; ?></td>
            <td><?= "Rp. " . number_format($transaksi->ongkir, 2, ',', '.'); ?></td>
            <td><?= "Rp. " . number_format($transaksi->total_harga, 2, ',', '.'); ?></td>
        </tr>
    </table>
</body>

</html>