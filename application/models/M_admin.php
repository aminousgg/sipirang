<?php

class M_admin extends CI_Model
{
    function display_tabel($table){
       return $this->db->get($table)->result();
    }
    function insert_data($table,$data){
        return $this->db->insert($table,$data);
    }
    function update_data($table,$data,$id){
        $this->db->where('id',$id);
        return $this->db->update($table,$data);
    }
    function brg_kat($kat){
        return $this->db->get_where('barang',array('kategori'=>$kat))->result();
    }
    function p_akun(){
        return $this->db->query('
            SELECT akn.id, akn.nip, akn.pass, agt.nama, agt.bidang, akn.level, akn.status 
            FROM akun akn JOIN anggota agt ON akn.nip=agt.nip
        ');
    }
    function agt_ptgs(){
        
    }
    function brg(){
        return $this->db->query('
            SELECT b.kd_brg, b.nm_brg, k.kat, b.merk, b.status
            FROM barang b JOIN kategori k ON b.kategori=k.id
        ');
    }
    function record(){
        return $this->db->query('
            SELECT r.kd_pjm, a.nama, b.nm_brg, r.tgl_pjm, r.estimasi, r.status
            FROM record r JOIN anggota a ON r.nip=a.nip
            JOIN barang b ON r.kd_brg=b.kd_brg
        ');
    }
    function bukti_pjm($kode){
        $kode = (string)$kode;
        return $this->db->query('
            SELECT r.kd_pjm, b.nm_brg, b.merk, b.kategori
            FROM record r JOIN anggota a ON r.nip=a.nip
            JOIN barang b ON r.kd_brg=b.kd_brg
            WHERE r.status=0 AND r.kd_pjm="'.(string)$kode.'"
        ');
    }
    function form_pjm($kode){
        return $this->db->query('
            SELECT r.kd_pjm, r.nip, a.nama, b.nm_brg, r.tgl_pjm, r.estimasi, r.status
            FROM record r JOIN anggota a ON r.nip=a.nip
            JOIN barang b ON r.kd_brg=b.kd_brg
            WHERE r.kd_pjm="'.(string)$kode.'"
        ');
    }
    function ajax_rec($kode){
        return $this->db->query('
            SELECT a.nama, b.nm_brg, r.tgl_pjm, b.merk, b.kategori
            FROM record r JOIN anggota a ON r.nip=a.nip
            JOIN barang b ON r.kd_brg=b.kd_brg
            WHERE r.kd_pjm="'.(string)$kode.'"
        ');
    }
}