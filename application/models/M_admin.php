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
    function p_akun(){
        return $this->db->query('
            SELECT akn.nip, agt.nama, agt.bidang, akn.level, akn.status 
            FROM akun akn JOIN anggota agt ON akn.nip=agt.nip
        ');
    }
}