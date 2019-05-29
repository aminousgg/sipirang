<!DOCTYPE html>
<html>
<head>
	<title> Sipirang | Print</title>
</head>
<style>
@page {
    size:  auto;
    margin-top: 45px;
    margin-bottom: 50px;
}
</style>
<body onload="window.close();">
   <table style="min-width: 100%">
   	<tr>
   		<td style="min-width: 15%;">
          <img src="<?= base_url() ?>admin-asset/foto/jateng-icon.png" width="120px" height="120px;">
        </td>
   		<td style="min-width: 70%; text-align: center; padding-right:45px;">
   			<h1 style="margin-bottom: 0;">BUKTI PEMINJAMAN BARANG</h1>
   			<h2 style="margin-top: 0;">Dinas Energi Sumber Daya Mineral <br> Provinsi Jawa Tengah</h2>
   		</td>
   		<td style="min-width: 15%;">&nbsp;</td>
   	</tr>
   </table>
   <!--  -->
   <table style="min-width: 40%; margin-top: 30px; margin-bottom: 30px;">
   	<tr>
   		<td style="min-width: 10%;">
   		  Kode Pinjam
   		</td>
   		<td style="min-width: 5%;">:</td>
   		<td style="min-width: 30%;">
   		 <?= $form['kd_pjm'] ?>
   		</td>
   	</tr>
   	<tr>
   		<td style="min-width: 10%;">
   		  Nama Peminjam
   		</td>
   		<td style="min-width: 5%;">:</td>
   		<td style="min-width: 30%;">
   		 <?= $form['nama'] ?>
   		</td>
   	</tr>
   	<tr>
   		<td style="min-width: 10%;">
   		  NIP
   		</td>
   		<td style="min-width: 5%;">:</td>
   		<td style="min-width: 30%;">
   		 <?= $form['nip'] ?>
   		</td>
   	</tr>
   	<tr>
   		<td style="min-width: 10%;">
   		  Tanggal Pinjam
   		</td>
   		<td style="min-width: 5%;">:</td>
   		<td style="min-width: 30%;">
   		 <?= $form['tgl_pjm'] ?>
   		</td>
   	</tr>
   	<tr>
   		<td style="min-width: 10%;">
   		  Estimasi
   		</td>
   		<td style="min-width: 5%;">:</td>
   		<td style="min-width: 30%;">
			 <?= $form['estimasi'] ?>
   		</td>
   	</tr>
   	<tr>
   		<td style="min-width: 10%;">
   		  Petugas
   		</td>
   		<td style="min-width: 5%;">:</td>
   		<td style="min-width: 30%;">
			 <?= $this->session->userdata('session')['nama'] ?>
   		</td>
   	</tr>
   </table>
   <!--  -->

   <table style="min-width: 95%; margin: auto;" cellspacing="0" border="1">
   	<tr>
   	  <th style="min-width: 5%;">
   	  	No
   	  </th>
   	  <th style="min-width: 15%;">
   	  	Kode Barang
   	  </th>
   	  <th style="min-width: 40%;">
   	  	Nama Barang
   	  </th>
   	  <th style="min-width: 10%;">
   	  	Merk
   	  </th>
   	  <th style="min-width: 25%;">
   	  	Kategori
   	  </th>
   	</tr>
   	<tr>
   		
   	</tr>
   	<tr>
		 <?php $i=1; foreach($table as $row){ ?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $row->kd_pjm ?></td>
				<td><?= $row->nm_brg ?></td>
				<td><?= $row->merk ?></td>
				<td><?php
				$kat=$this->db->get_where('kategori',array('id'=>$row->kategori))->row_array()['kat'];
				echo $kat;
				?></td>
			</tr>
		 <?php $i++; } ?>
   	</tr>
   </table>
   <!--  -->

   <table style="min-width: 100%; margin-top: 40px;">
   	<tr>
   		<td style="min-width: 10%; text-align: left; padding-left: 50px;">
   			Peminjam
   		</td>
   		<td style="min-width: 80%; text-align: center;">
   			
   		</td>
   		<td style="min-width: 10%; text-align: right; padding-right: 60px;">
   			Petugas
   		</td>
   	</tr>
		 <tr style="">
		 		<td>&nbsp;<br><br><br></td>
				<td>&nbsp;<br><br><br></td>
				<td>&nbsp;<br><br><br></td>
		 </tr>
		 <tr>
		 <td style="min-width: 10%; text-align: left; padding-left: 50px;">
   			<?= $form['nama'] ?>
   		</td>
   		<td style="min-width: 80%; text-align: center;">
   			
   		</td>
   		<td style="min-width: 10%; text-align: right; padding-right: 55px;">
   			<?= $this->session->userdata('session')['nama'] ?>
   		</td>
		 </tr>
   </table>


   <script>
     window.print();
   </script>
</body>
</html>