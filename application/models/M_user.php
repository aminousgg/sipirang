<?php 
class M_user extends CI_Model{
	// ambil barang
	function tampil_barang(){
		return $this->db->get('barang');
  }
}
?>