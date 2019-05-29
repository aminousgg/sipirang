<!DOCTYPE html>
<html>
<head>
	<title>Sipirang | Data Peminjam</title>
</head>
<style>
@page {
    size:  auto;
    margin-top: 45px;
    margin-bottom: 50px;
}
</style>
<body onload="window.close();">

<h2 style="text-align: center; margin-bottom: 5px;">Data Peminjaman</h2>
<h3 style="text-align: center; margin-top: -2px">Dinas Energi Sumber Daya Mineral</h3>

<table style="width: 100%; border-collapse: collapse;">	
  <tr style="border:solid 1px; background-color: #4286f4;">
  	<th style="border:solid 1px; width: 15%; height:20px; text-align:center;">Kode Pinjam</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Peminjam</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Barang</th>
  	<th style="border:solid 1px; width: 15%; height:20px; text-align:center;">Tgl Pinjam</th>
  	<th style="border:solid 1px; width: 15%; height:20px; text-align:center;">Estimasi</th>
    <th style="border:solid 1px; width: 15%; height:20px; text-align:center;">Status</th>
  </tr>
  <?php foreach($table as $row){ ?>
    <?php if($row->status==0){ ?>
	<tr>
	  <td style="border:solid 1px;"><?= $row->kd_pjm ?></td>
	  <td style="border:solid 1px;"><?= $row->nama ?></td>
	  <td style="border:solid 1px;"><?= $row->nm_brg ?></td>
	  <td style="border:solid 1px;"><?= $row->tgl_pjm ?></td>
	  <td style="border:solid 1px;"><?= $row->estimasi ?></td>
      <?php
        if($row->status==1){
            echo '<td style="border:solid 1px;">Kembali</td>';
        }else{
            echo '<td style="border:solid 1px; color:green;">Terpinjam</td>';
        }
      ?>
	</tr>
    <?php } ?>
  <?php } ?>
</table>
<script>
window.print();
</script>
</body>
</html>