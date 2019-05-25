<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_user');
		
	}
	function index(){
        $this->db->order_by("status", "desc");
		$data['tabel_record'] = $this->db->get('barang')->result();
		$data['judul']="Beranda";
		$this->load->view('user/header-user',$data);
		$this->load->view('user/home-user',$data);
		$this->load->view('user/footer-user',$data);	
	}
	function login(){
		$data['judul']="Login";
		$this->load->view('user/login-user',$data);
		$this->load->view('user/footer-user',$data);
	}
	function contact(){
		$data = array(
			"tgl"	=> date('Y-m-d'),
			"nama"	=> $this->input->post('nama'),
			"email"	=> $this->input->post('email'),
			"isi"	=> $this->input->post('isi')
		);
		$cek=$this->db->insert('contact',$data);
		if($cek){
			echo "OK";
		}else{
			echo "gagal";
		}
		
	}
}