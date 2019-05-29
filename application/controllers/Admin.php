<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// http://www.ijns.org/journal/index.php/ijns/article/view/154

class Admin extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_admin');
        $this->load->library('encryption');
		
    }
    function islogin(){
        if($this->session->userdata('session')!=null){
            return true;
        }else{
            return false;
        }
    }
    function login(){
        if(  $this->islogin() ){
            redirect(base_url("admin"));
        }
        $this->load->view('admin/login');
    }
    function in_login($url=null){
		$where = array(
			'nip' => $this->input->post('username'),
			'pass' => md5($this->input->post('password'))
		);
		$cek = $this->db->get_where('akun',$where);
		$level = $cek->row_array()['level'];
		if($cek->num_rows() > 0){
            if($level==1){
                $set_level="petugas";
            }elseif($level==2){
                $set_level="admin";
            }
            $get=$this->db->get_where('anggota',array('nip'=>$this->input->post('username')))->row_array();
            $gambar=base_url('admin-asset/foto/agt/').$get['gambar'];
            $data_session = array(
                'nama' 	=> $get['nama'],
                'nip' 	=> $this->input->post('username'),
                'level'	=> $set_level,
                'foto'  => $gambar,
                );
            $this->session->set_userdata('session',$data_session);
            redirect(base_url('admin/'.$url.''));
            
		}else{
            redirect(base_url("admin"));
        }
    }
    function logout(){
        $this->session->unset_userdata('session');
        redirect(base_url('admin'));
    }
    //=========== beranda =============
	function index(){
        // var_dump($this->islogin()); die;
        // $this->session->unset_userdata('session');
        $pjm=$this->db->get_where('record',array('status'=>1))->num_rows();
        $kmbl=$this->db->get_where('record',array('status'=>0))->num_rows();
        $data['num']=array(
            'brg' => $this->db->get('barang')->num_rows(),
            'agt' => $this->db->get('anggota')->num_rows(),
            'pjm' => $pjm,
            'kmbl'=> $kmbl,
        );
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="beranda";
		$this->load->view('admin/utama',$data);
    }
    //=========== Barang ==============
    function barang(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="barang";
        $data['title']="Barang";
        $this->db->order_by("status", "desc");
        $data['table']=$this->M_admin->display_tabel('barang');
        $this->load->view('admin/utama',$data);
    }
    function brg_bykat($kat=null){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        if($kat==null){
            redirect('admin/barang');
        }
        $data['page']="barang";
        $data['title']="Barang";
        $data['table']=$this->M_admin->brg_kat($kat);
        $this->load->view('admin/utama',$data);
    }
    function get_brg($id){
        $data=$this->db->get_where('barang',array('id'=>$id))->row_array();
        echo json_encode($data);
    }
    function kode_brg(){
        $this->db->select_max('id');
        $row=$this->db->get('barang')->row_array();
        // var_dump($row);
        $kode=(int)$row['id'] + 1;
        $hasil= "B-".str_pad($kode, 5, "0", STR_PAD_LEFT);
        $data['kd_brg']=$hasil;
        echo json_encode($data);
    }
    function add_brg(){
        $config['upload_path'] 		= './admin-asset/foto/barang/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif';
        $this->load->library('upload',$config);
        $this->upload->do_upload('file');
        $hasil = $this->upload->data();
        $data = array(
            'kd_brg'	=> $this->input->post('kd_brg'),
            'nm_brg'	=> $this->input->post('nm_brg'),
            'kategori'  => $this->input->post('kategori'),
            'merk'		=> $this->input->post('merk'),
            'spek'      => $this->input->post('spek'),
            'tgl_masuk'	=> $this->input->post('tgl_masuk'),
            'gambar'	=> $hasil['file_name'],
            'status'	=> 1,
        );
        $result=$this->M_admin->insert_data('barang', $data);
        // var_dump($result); die;
        if($result==true){
            $this->session->set_flashdata('success', 'Barang berahsil ditambahkan');
        	redirect(base_url('admin/barang'));
        }else{
        	$this->session->set_flashdata('error', 'Gagal ditambahkan');
        	redirect(base_url('admin/barang'));
        }
    }
    function edit_brg(){
        $data = array(
            'nm_brg'	=> $this->input->post('nm_brg'),
            'kategori'  => $this->input->post('kategori'),
            'merk'		=> $this->input->post('merk'),
            'spek'      => $this->input->post('spek'),
            'tgl_masuk'	=> $this->input->post('tgl_masuk'),
        );
        $result=$this->M_admin->update_data('barang', $data, $this->input->post('id_brg'));
        if($result==true){
            $this->session->set_flashdata('success', 'Barang berahsil diubah');
        	redirect(base_url('admin/barang'));
        }else{
        	$this->session->set_flashdata('error', 'Gagal mengubah');
        	redirect(base_url('admin/barang'));
        }
    }
    function edit_gmbr($id, $tes=null){
        if($tes==null){
            $data['page']="gmbr-brg";
            $data['table']=$this->db->get_where('barang',array('id'=>$id))->row_array();
            $this->load->view('admin/utama',$data);
        }
        else{
            $config['upload_path'] 	 = './admin-asset/foto/barang/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload',$config);
            $this->upload->do_upload('file');
            $hasil = $this->upload->data();
            $data = array(
                'gambar'	=> $hasil['file_name'],
            );
            $this->db->where('id',$id);
            $result=$this->db->update('barang',$data);
            // var_dump($result); die;
            if($result==true){
                $this->session->set_flashdata('success', 'Gambar Berhasil diubah');
                redirect(base_url('admin/barang'));
            }else{
                $this->session->set_flashdata('error', 'Gagal mengubah gambar');
                redirect(base_url('admin/barang'));
            }
        }
        
    }
    function del_brg($id){
        $result=$this->db->delete('barang',array('id'=>$id));
        if($result==true){
            $this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/barang'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/barang'));
		}
    }
    //=========== Anggota =============
    function anggota(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="semua-anggota";
        $data['title']="Semua Anggota";
        $data['table']=$this->M_admin->display_tabel('anggota');
        $this->load->view('admin/utama',$data);
    }
    function add_agt(){
        // Upload
        $config['upload_path'] 		= './admin-asset/foto/agt/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif';
        $this->load->library('upload',$config);
        $this->upload->do_upload('file');
        $hasil 	= $this->upload->data();
        $data = array(
            'nip'	    => $this->input->post('nip'),
            'nama'		=> $this->input->post('nama'),
            'jabatan'	=> $this->input->post('jabatan'),
            'golongan'	=> $this->input->post('gol'),
            'bidang'	=> $this->input->post('bid'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir'	=> $this->input->post('tgl_lahir'),
            'gambar'	=> $hasil['file_name'],
        );
        // var_dump($this->input->post('level')); die;

        if((int)$this->input->post('level')!=0){
            $pass="12345";
            $akun=array(
                'nip'   => $this->input->post('nip'),
                'token' => md5($this->input->post('nip')),
                'pass'  => md5($pass),
                'status'=> 0,
                'level' => $this->input->post('level'),
            );
            $this->M_admin->insert_data('akun',$akun);
        }
        $result=$this->M_admin->insert_data('anggota', $data);
        if($result==true){
            $this->session->set_flashdata('success', 'Berhasil menambahkan anggota');
            redirect(base_url('admin/anggota'));
        }else{
            $this->session->set_flashdata('error', 'Gagal ditambahkan');
            redirect(base_url('admin/anggota'));
        }
    }
    function edit_agt(){
        $data = array(
            'nip'	    => $this->input->post('nip'),
            'nama'		=> $this->input->post('nama'),
            'jabatan'	=> $this->input->post('jabatan'),
            'golongan'	=> $this->input->post('gol'),
            'bidang'	=> $this->input->post('bid'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir'	=> $this->input->post('tgl_lahir'),
        );
        $id=$this->input->post('id_agt');
        // get anggota (cek nip apakah akan ada perubahan nip)
        $nip_lama=$this->db->get_where('anggota',array('id'=>$id))->row_array()['nip'];
        // cek level
        //var_dump((int)$this->input->post('level'));
        
        $level=$this->db->get_where('akun',array('nip'=>$nip_lama))->row_array()['level'];
        
        if( (int)$level != (int)$this->input->post('level') && $level!=null || $nip_lama!=$this->input->post('nip') && $level!=null ){
            // pergantian level
            if((int)$this->input->post('level')==0){
                // hapus nip yang terdaftar di akun
                $this->db->delete('akun',array('nip'=>$nip_lama));
            }else{
                //var_dump($this->input->post('nip'));die;
                // update akun
                $akun=array(
                    'nip'   => $this->input->post('nip'),
                    'token' => md5($this->input->post('nip')),
                    'level' => $this->input->post('level'),
                );
                $this->db->where('nip',$nip_lama);
                $this->db->update('akun',$akun);
            }
        }
        $result=$this->M_admin->update_data('anggota', $data, $this->input->post('id_agt'));
        if($result==true){
            $this->session->set_flashdata('success', 'Berhasil mengubah anggota');
            redirect(base_url('admin/anggota'));
        }else{
            $this->session->set_flashdata('error', 'Gagal mengubah');
            redirect(base_url('admin/anggota'));
        }
    }
    function get_agt($id){
        $data=$this->db->get_where('anggota',array('id'=>$id))->row_array();
        echo json_encode($data);
    }
    function get_level($nip){
        $data=$this->db->get_where('akun',array('nip'=>$nip))->row_array();
        echo json_encode($data);
    }
    function del_agt($id){
        $nip=$this->db->get_where('anggota',array('id'=>$id))->row_array()['nip'];
        $akunDel=$this->db->delete('akun',array('nip'=>$nip));
        $result=$this->db->delete('anggota',array('id'=>$id));
        if($result==true){
            $this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/anggota'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/anggota'));
		}
    }
    function edit_gmbr1($id, $tes=null){
        if($tes==null){
            $data['page']="gmbr-agt";
            $data['table']=$this->db->get_where('anggota',array('id'=>$id))->row_array();
            $this->load->view('admin/utama',$data);
        }
        else{
            $config['upload_path'] 	 = './admin-asset/foto/agt/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload',$config);
            $this->upload->do_upload('file');
            $hasil = $this->upload->data();
            $data = array(
                'gambar'	=> $hasil['file_name'],
            );
            $this->db->where('id',$id);
            $result=$this->db->update('anggota',$data);
            // var_dump($result); die;
            if($result==true){
                $this->session->set_flashdata('success', 'Gambar Berhasil diubah');
                redirect(base_url('admin/anggota'));
            }else{
                $this->session->set_flashdata('error', 'Gagal mengubah gambar');
                redirect(base_url('admin/anggota'));
            }
        }
    }
    function agt_form(){
        $this->db->select('nip, bidang');
        $data=$this->db->get_where('anggota',array('nama'=>$this->input->post('nama')))->row_array();
        echo json_encode($data);
    }
    function daftar_akun(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="peng-anggota";
        $data['title']="Pengaturan Akun";
        $data['table']=$this->M_admin->p_akun()->result();
        $this->load->view('admin/utama',$data);
    }
    //=========== Pinjam ==============
    function pinjam(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="pjm-brg";
        $data['title']="Peminjaman";
        $this->load->view('admin/utama',$data);
    }
    function daftar_pinjam(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="dft-pjm";
        $data['title']="Peminjaman";
        $data['table']=$this->db->get_where('record',array('status'=>0))->result();
        $this->load->view('admin/utama',$data);
    }
    function kode_pjm(){
        $this->db->select_max('id');
        $row=$this->db->get('record')->row_array();
        // var_dump($row);
        if($row){
            $kode=(int)$row['id'] + 1;
            $hasil= "P-".str_pad($kode, 5, "0", STR_PAD_LEFT);
            $data['kd_pjm']=$hasil;
            echo json_encode($data);
        }else{
            $data['kd_pjm']="B-00001";
            echo json_encode($data);
        }
        
    }
    function in_pinjam($brg,$ang,$tgl){
        $brg=explode('-',$brg);
        //set brg
        $cek=0;
        for($i=0;$i<count($brg);$i++){
            $set=array(
                'status'=>0,
            );
            $this->db->where('id', $brg[$i]);
            $msk=$this->db->update('barang',$set);
            if($msk==true){
                $cek=$cek+1;
            }
        }
        // in
        if($cek==count($brg)){
            $ang=explode('-',$ang);
            $tgl=urldecode($tgl);
            //var_dump($tgl); die;
            $cek=0;
            $tgl=explode(' ',$tgl);
            for($i=0;$i<count($brg);$i++){
                $kd_brg=$this->db->get_where('barang',array('id'=>$brg[$i]))->row_array()['kd_brg'];
                $data_pjm=array(
                    'kd_pjm'    => $ang[0]."-".$ang[1],
                    'nip'       => $ang[2],
                    'kd_brg'    => $kd_brg,
                    'tgl_pjm'   => $tgl[0],
                    'estimasi'  => $tgl[1],
                    'tgl_kmbl'  => "0000-00-00",
                    'ptg_pjm'   => $this->session->userdata('session')['nama'],
                    'status'    => 0,
                );
                var_dump($data_pjm);
                $res=$this->M_admin->insert_data('record',$data_pjm);
                if($res==true){
                    $cek=$cek+1;
                }
            }
            if($cek==count($brg)){
                $this->session->set_flashdata('success', $ang[0]."-".$ang[1]);
			    redirect(base_url('admin/daftar_pinjam'));
            }
        }
    }
    //=========== Kembali ==============
    function kembali(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="kembali";
        $data['title']="Pengembalian";
        $this->load->view('admin/utama',$data);
    }
    function in_kembali($id){
        $this->db->select('kd_brg, kd_pjm');
        $record=$this->db->get_where('record',array('id'=>$id))->row_array();
        // set brg
        // var_dump($record); die;
        date_default_timezone_set('Asia/Jakarta');
        $set=array(
            'status' => 1,
        );
        $this->db->where('kd_brg',$record['kd_brg']);
        $res=$this->db->update('barang',$set);
        if(!$res){
            echo "gagal set brg";
            die;
        }
        // set record
        $data_up=array(
            'tgl_kmbl' => date('Y-m-d'),
            'ptg_kmbl' => $this->session->userdata('session')['nama'],
            'status'   => 1,
        );
        $this->db->where('id',$id);
        $cek=$this->db->update('record',$data_up);
        if($cek){
            $hsl['cek']="1";
            echo json_encode($hsl);
        }else{
            $hsl['cek']="0";
            echo json_encode($hsl);
        }
    }
    function get_record($in=null){
        $kd=$this->input->post('kode');
        if($in!=null){
            $this->db->select('nip');
            $pjm=$this->db->get_where('record',array('kd_pjm'=>$kd))->row_array()['nip'];
            $this->db->select('nama, bidang');
            $ang=$this->db->get_where('anggota',array('nip'=>$pjm))->row_array();
            $hasil=array(
                'nip'   => $pjm,
                'nama'  => $ang['nama'],
                'bidang'=> $ang['bidang'],
            );
            echo json_encode($hasil);
        }else{
            $hasil=$this->M_admin->ajax_rec($kd)->result();
            echo json_encode($hasil);
        }
        
    }
    function nm_brg($kode){
        $this->db->select('nm_brg');
        $nama=$this->db->get_where('barang',array('kd_brg'=>$kode))->row_array();
        echo json_encode($nama);
    }
    //=========== Record ===============
    function record(){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="record";
        $data['title']="Aktifitas Pinjam dan kembali";
        $data['table']=$this->M_admin->display_tabel('record');
        $this->load->view('admin/utama',$data);
    }
    function record_kat($kat){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $data['page']="record";
        $data['title']="Aktifitas Pinjam dan kembali";
        if($kat=="pjm"){
            $data['table']=$this->db->get_where('record',array('status'=>0))->result();
        }elseif($kat=="kmbl"){
            $data['table']=$this->db->get_where('record',array('status'=>1))->result();
        }elseif($kat=="all"){
            redirect(base_url('admin/record'));
        }
        
        $this->load->view('admin/utama',$data);
    }
    //==================================
    function reset_pass($id){
        if( ! $this->islogin() ){
            $this->session->set_flashdata('user',current_url());
            redirect('admin/login');
        }
        $up=array(
            'pass' => md5('12345'),
            'status' => 0,
        );
        $this->db->where('id',$id);
        $res=$this->db->update('akun',$up);
        if($res==true){
            $this->session->set_flashdata('success', 'Berhasil reset password');
            redirect(base_url('admin/daftar_akun'));
        }else{
            $this->session->set_flashdata('error', 'Gagal mengubah gambar');
            redirect(base_url('admin/daftar_akun'));
        }
    }
    
}
