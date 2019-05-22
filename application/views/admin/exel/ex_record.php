<?php
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Data_Record.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Peminjam</th>
                <th>Barang</th>
                <th>Tgl Pinjam</th>
                <th>Estimasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <?php foreach($table as $row){ ?>
            <tr>
                <td><?= $row->kd_pjm ?></td>
                <td><?= $row->nama ?></td>
                <td><?= $row->nm_brg ?></td>
                <td><?= $row->tgl_pjm ?></td>
                <td><?= $row->estimasi ?></td>
                <?php
                    if($row->status==1){
                        echo '<td>Kembali</td>';
                    }else{
                        echo '<td style="color:green;">Terpinjam</td>';
                    }
                ?>
            </tr>
        <?php } ?>
	</table>
</body>
</html>