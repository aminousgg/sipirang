<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_admin');
        // $this->load->library('pdf');
    }
    function pdf($table){
        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(15, 10, 15, 10));
        // 
        if($table=="brg"){
            $data['table']=$this->M_admin->brg()->result();
            ob_start();
            $this->load->view('admin/pdf/pdf_brg',$data);
            $html = ob_get_contents();
            // var_dump($html); die;
            $pdf->setDefaultFont('times');
            $pdf->WriteHTML($html);
            ob_end_clean();
            $pdf->Output("DataBarang.pdf", 'I');
        }
        // ANGGOTA
        elseif($table=="agt"){
            $data['table']=$this->M_admin->display_tabel('anggota');
            ob_start();
            $this->load->view('admin/pdf/pdf_anggota',$data);
            $html = ob_get_contents();
            // var_dump($html); die;
            $pdf->setDefaultFont('times');
            $pdf->WriteHTML($html);
            ob_end_clean();
            $pdf->Output("Data Anggota.pdf", 'I');
        }
        // RECORD
        elseif($table=="record"){
            $data['table']=$this->M_admin->record()->result();
            ob_start();
            $this->load->view('admin/pdf/pdf_record',$data);
            $html = ob_get_contents();
            // var_dump($html); die;
            $pdf->setDefaultFont('times');
            $pdf->WriteHTML($html);
            ob_end_clean();
            $pdf->Output("Data Anggota.pdf", 'I');
        }
    }
    function exel($table){
        //var_dump($this->M_admin->brg()->result());
        if($table=="brg"){
            $data['table']=$this->M_admin->brg()->result();
            $this->load->view('admin/exel/ex_barang',$data);
        }
        elseif($table=="agt"){
            $data['table']=$this->M_admin->display_tabel('anggota');
            $this->load->view('admin/exel/ex_agt',$data);
        }
        elseif($table=="record"){
            $data['table']=$this->M_admin->record()->result();
            $this->load->view('admin/exel/ex_record',$data);
        }
        
    }
    function cetak($table){

    }
    
}