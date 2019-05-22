<?php
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Data_Anggota.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggota</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Bidang</th>
                <th>Golangan</th>
            </tr>
        </thead>
        <?php foreach($table as $row){ ?>
            <tr>
                <td><?= $row->nip ?></td>
                <td><?= $row->nama ?></td>
                <td><?= $row->tmp_lahir ?>, <?= $row->tgl_lahir ?></td>
                <td><?= $row->bidang ?></td>
                <td><?= $row->golongan ?></td>
            </tr>
        <?php } ?>
	</table>
</body>
</html>