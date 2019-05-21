<!DOCTYPE html>
<html>
<head>
	<title>Data Anggota</title>
</head>
<style type="text/css">
	
</style>
<body>

<h2 style="text-align: center; margin-bottom: 5px;">Data Anggota</h2>
<h3 style="text-align: center; margin-top: -2px">Dinas Energi Sumber Daya Mineral</h3>

<table style="width: 100%; border-collapse: collapse;">	
  <tr style="border:solid 1px; background-color: #4286f4;">
  	<th style="border:solid 1px; width: 15%; height:20px; text-align:center;">NIP</th>
  	<th style="border:solid 1px; width: 25%; height:20px; text-align:center;">Nama</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Tempat,Tgl Lahir</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Bidang</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Golongan</th>
  </tr>
  <?php foreach($table as $row){ ?>
	<tr>
	  <td style="border:solid 1px;"><?= $row->nip ?></td>
	  <td style="border:solid 1px;"><?= $row->nama ?></td>
	  <td style="border:solid 1px;"><?= $row->tmp_lahir ?>, <?= $row->tgl_lahir ?></td>
	  <td style="border:solid 1px;"><?= $row->bidang ?></td>
	  <td style="border:solid 1px;"><?= $row->golongan ?></td>
	</tr>
  <?php } ?>
</table>
</body>
</html>