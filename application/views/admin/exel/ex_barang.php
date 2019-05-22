<?php
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Data_barang.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Status</th>
            </tr>
        </thead>
        <?php foreach($table as $row){ ?>
            <tr>
                <td><?= $row->kd_brg ?></td>
                <td><?= $row->nm_brg ?></td>
                <td><?= $row->kat ?></td>
                <td><?= $row->merk ?></td>
                <?php 
                    if($row->status==1){
                        echo '<td>Tersedia</td>';
                    }elseif($row->status==0){
                        echo '<td style="color:red;">Terpinjam</td>';
                    }
                ?>
            </tr>
        <?php } ?>
	</table>
</body>
</html>