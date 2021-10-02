<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
		$this->load->helper('download');
	}

	public function rat()
	{
        $data['title']		= 'Laporan RAT';
		$data['pk']		= $this->M_penilaian->get_data('Buka')->result_array();
		$this->load->view('laporan/rat', $data);
	}

	public function penilaian()
	{
        $data['title']		= 'Laporan Penilaian';
		$data['pk']		= $this->M_penilaian->get_data('Buka')->result_array();
		$this->load->view('laporan/penilaian', $data);
	}

	public function detail_rat($id_penilaian)
	{
        $data['title']		= 'Laporan RAT';
        $data['id_penilaian'] = $id_penilaian;
        if(is_admin() || is_perencanaan()){
        	$data['rat']		= $this->M_rat->get_data($id_penilaian)->result_array();
        } elseif(is_koperasi()){
        	$username = $this->session->userdata('username');
			$get_koperasi = $this->db->get_where('koperasi', ['username' => $username])->row_array();
			$id_koperasi = $get_koperasi['id_koperasi'];
        	$data['rat']		= $this->M_rat->get_data($id_penilaian, $id_koperasi)->result_array();
        }
		
		$this->load->view('laporan/detail_rat', $data);
	}

	public function cetak_rat($id_penilaian)
	{
        $data['title']		= 'Laporan RAT';
        $data['id_penilaian'] = $id_penilaian;
        $data['jml_koperasi'] = $this->M_rat->get_data($id_penilaian)->num_rows();
        $data['rat']		= $this->db->query("SELECT sum(simpanan_pokok+simpanan_wajib+cadangan+simpanan_lainnya+Cadangan_resiko+Modal_penyertaan+Modal_Penyetaraan+Modal_sumbangan+shu_belumdibagi+pendapatan-biaya) as modal_sendiri, sum(modal_luar) as modal_luar, sum(volume_usaha) as volume_usaha, sum(kas+bank+simpanan_berjangka+surat_berharga+pinjaman_diberikan+penyertaan_dan_aktiva+pendapatan_diterima+jmlaktiva_tetap) as asset, sum(pendapatan-biaya) as shu FROM rat where id_penilaian='$id_penilaian'")->row_array();
		
		$this->load->view('laporan/cetak_rat', $data);
	}

	public function detail_penilaian($id_penilaian)
	{
        $data['title']		= 'Laporan Penilaian';
        $data['id_penilaian'] = $id_penilaian;
		$data['pk']		= $this->M_penilaian_kesehatan->get_data($id_penilaian)->result_array();
		$this->load->view('laporan/detail_penilaian', $data);
	}

	public function cetak_penilaian($id_penilaian)
	{
        $data['title']		= 'Laporan Penilaian';
        $data['id_penilaian'] = $id_penilaian;
       	$data['pk']		= $this->db->where('id_penilaian', $id_penilaian)->order_by('peringkat', 'ASC')->get('penilaian_koperasi')->result_array();
		
		$this->load->view('laporan/cetak_penilaian', $data);
	}

}