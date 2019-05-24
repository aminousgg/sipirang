<!DOCTYPE html>
<html>
<head>
	<title>Sipirang | Data Barang</title>
</head>
<style>
@page {
    size:  auto;
    margin-top: 45px;
    margin-bottom: 50px;
}
</style>
<body onload="window.close();">

<h2 style="text-align: center; margin-bottom: 5px;">Data Barang</h2>
<h3 style="text-align: center; margin-top: -2px">Dinas Energi Sumber Daya Mineral</h3>

<table style="width: 100%; border-collapse: collapse;">	
  <tr style="border:solid 1px; background-color: #4286f4;">
  	<th style="border:solid 1px; width: 15%; height:20px; text-align:center;">Kode Barang</th>
  	<th style="border:solid 1px; width: 25%; height:20px; text-align:center;">Nama Barang</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Kategori</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Merk</th>
  	<th style="border:solid 1px; width: 20%; height:20px; text-align:center;">Status</th>
  </tr>
  <?php foreach($table as $row){ ?>
	<tr>
	  <td style="border:solid 1px;"><?= $row->kd_brg ?></td>
	  <td style="border:solid 1px;"><?= $row->nm_brg ?></td>
	  <td style="border:solid 1px;"><?= $row->kat ?></td>
	  <td style="border:solid 1px;"><?= $row->merk ?></td>
	  <?php 
	 	if($row->status==1){
			 echo '<td style="border:solid 1px;">Tersedia</td>';
		 }elseif($row->status==0){
			echo '<td style="border:solid 1px; color:red;">Terpinjam</td>';
		 }
	  ?>
	  
	</tr>
  <?php } ?>
</table>
   <script>
     window.print();
   </script>
</body>
</html>