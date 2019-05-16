<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_admin');
        $this->load->library('pdf');
    }
    function barang_pdf(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'Data Barang',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        date_default_timezone_set('Asia/Jakarta');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(30);
        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(17,6,'Kode',1,0,'C',1);
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(40,6,'Nama Barang',1,0,'C',1);
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Merk',1,0,'C',1);
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(25,6,'Status',1,0,'C',1);
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(25,6,'Tgl Masuk',1,0,'C',1);
        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        $brg = $this->db->get('barang')->result();
        $i=1;
        foreach ($brg as $row){
            $pdf->SetX(30);
            $pdf->Cell(9,6,$i,1,0,'C');
            $pdf->Cell(17,6,$row->kd_brg,1,0);
            $pdf->Cell(40,6,$row->nm_brg,1,0);
            $pdf->Cell(30,6,$row->merk,1,0);
            if($row->status==1){
                $pdf->Cell(25,6,"Tersedia",1,0,'C');
            }else{
                $pdf->Cell(25,6,"Terpinjam",1,0,'C');
            }
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(25,6,$row->tgl_masuk,1,0,'C');
            $i++;
            $pdf->Ln();
        }
        //echo '<script>print();</script>'; die;  
        $pdf->Output();
    }
}