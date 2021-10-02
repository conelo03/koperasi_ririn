<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rat extends CI_Controller {

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

	public function index()
	{
        $data['title']		= 'Data RAT';
		$data['penilaian']		= $this->M_penilaian->get_data('Buka')->result_array();
		$this->load->view('rat/data', $data);
	}

	public function detail($id_penilaian)
	{
        $data['title']		= 'Data RAT';
        $data['id_penilaian'] = $id_penilaian;
        if(is_admin()){
        	$data['rat']		= $this->M_rat->get_data($id_penilaian)->result_array();
        } elseif(is_koperasi()){
        	$username = $this->session->userdata('username');
			$get_koperasi = $this->db->get_where('koperasi', ['username' => $username])->row_array();
			$id_koperasi = $get_koperasi['id_koperasi'];
        	$data['rat']		= $this->M_rat->get_data($id_penilaian, $id_koperasi)->result_array();
        }
		
		$this->load->view('rat/detail', $data);
	}

	public function dokumen($id_rat, $id_penilaian)
	{
        $data['title']		= 'Data RAT';
        $data['uri'] = $this->uri->segment('2');
        $data['id_penilaian'] = $id_penilaian;
		$data['k']		= $this->M_rat->get_by_id($id_rat);
		$this->load->view('rat/dokumen', $data);
	}

	public function upload_dokumen($id_rat = null)
	{
	    $config['upload_path'] = './assets/upload/dokumen';
	    $config['allowed_types'] = 'rar|zip|docx|doc|jpg|png|jpeg|xlsx|xls|pdf';
	    $config['max_size'] = 5010000;
	    $config['encrypt_name'] 		= false;
	    $this->upload->initialize($config);
	    $this->load->library('upload', $config);

	    $jumlah_berkas = count($_FILES['dokumen']['name']);
		$dokumen = '';
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['dokumen']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['dokumen']['name'][$i];
				$_FILES['file']['type'] = $_FILES['dokumen']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['dokumen']['error'][$i];
				$_FILES['file']['size'] = $_FILES['dokumen']['size'][$i];
	   
				$this->upload->do_upload('file');
					
				$dokumen .= $this->upload->data('file_name')."|";
			}
		}

		$dokumen = substr($dokumen, 0, -1);

		$rat = $this->M_rat->get_by_id($id_rat);
    	if(is_null($rat['dokumen']) || empty($rat['dokumen'])){
    		$dokumen = $dokumen;
    	} else {
    		$dokumen = $rat['dokumen']."|".$dokumen;
    	}

	    if(is_null($dokumen)){
			$error = array('error' => $this->upload->display_errors());

			$json = 'failed';
	    } else {

			$this->db->set('dokumen', $dokumen);
			$this->db->where('id_rat', $id_rat);
			$this->db->update('rat'); 
			$json = 'success'; 
	    }
	    header('Content-Type: application/json');
	    echo json_encode($json);   
	}

	public function hapus_dokumen()
	{
		$id_rat = $this->input->post('id_rat');
		$id_penilaian = $this->input->post('id_penilaian');
		$file = $this->input->post('dokumen');

		$rat = $this->M_rat->get_by_id($id_rat);

		$dokumen = explode('|', $rat['dokumen']);

		if (($key = array_search($file, $dokumen)) !== false) {

		    unset($dokumen[$key]);
		}
		$dokumen = array_values($dokumen);

		$jml = count($dokumen);
		if($jml == 0){
			$files = null;
		}else{
			$files = '';
			for($i=0; $i<$jml; $i++){
				$files .= $dokumen[$i]."|";
			}
			$files = substr($files, 0, -1);
		}
		
		
		unlink('./assets/upload/dokumen/'.$file);

		$data = [
			'id_rat' => $id_rat,
			'dokumen' => $files,
		];
		
		$this->M_rat->update($data);
        
		$this->session->set_flashdata('msg', 'hapus');
		redirect('dokumen-rat/'.$id_rat.'/'.$id_penilaian);
	}

	public function download($id_rat, $id_penilaian, $file)
    {
        force_download('assets/upload/dokumen/'.$file, NULL);
        redirect('dokumen-rat/'.$id_rat.'/'.$id_penilaian);
    }

	public function tambah($id_penilaian)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data RAT';
			$username = $this->session->userdata('username');
			$get_koperasi = $this->db->get_where('koperasi', ['username' => $username])->row_array();
			$id_koperasi = $get_koperasi['id_koperasi'];
			$data['id_penilaian'] = $id_penilaian;
			$data['koperasi'] = $this->M_koperasi->get_by_id($id_koperasi);
			$this->load->view('rat/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$get_nilai = $this->M_penilaian->get_by_id($id_penilaian);
			$tanggal_mulai = $get_nilai['tanggal_mulai'];
			$tanggal_selesai = $get_nilai['tanggal_selesai'];
			if($data['tanggal'] >= $tanggal_mulai && $data['tanggal'] <= $tanggal_selesai){
				$reward = 'Ya';
			} else {
				$reward = 'Tidak';
			}
			$data_keragaan	= [
				'id_penilaian'		=> $id_penilaian,
				'id_koperasi'	=> $data['id_koperasi'],
				'tanggal'	=> $data['tanggal'],
				'simpanan_lainnya'	=> $data['simpanan_lainnya'] ,				
				'cadangan'	=> $data['cadangan'],
				'Cadangan_resiko' => $data['Cadangan_resiko'],
				'Modal_penyertaan' => $data['Modal_penyertaan'],
				'Modal_Penyetaraan' => $data['Modal_Penyetaraan'],
				'Modal_sumbangan' => $data['Modal_sumbangan'],
				'shu_belumdibagi' => $data['shu_belumdibagi'],
				'modal_luar'	=> $data['modal_luar'],
				'volume_usaha' => $data['volume_usaha'],
				'pendapatan' => $data['pendapatan'],
				'biaya' => $data['biaya'],
				'kas' => $data['kas'],
				'bank' => $data['bank'],
				'simpanan_berjangka' => $data['simpanan_berjangka'],
				'surat_berharga' => $data['surat_berharga'],
				'pinjaman_diberikan' => $data['pinjaman_diberikan'],
				'penyertaan_dan_aktiva' => $data['penyertaan_dan_aktiva'],
				'jmlaktiva_tetap' => $data['jmlaktiva_tetap'],

				'realisasi_anggaran' => $data['realisasi_anggaran'],
				'rencana_anggaran' => $data['rencana_anggaran'],
				'transaksi_anggota' => $data['transaksi_anggota'],
				'transaksi_koperasi' => $data['transaksi_koperasi'],
				'sarana_prasarana' => $data['sarana_prasarana'],
				'kerjasama_usaha' => $data['kerjasama_usaha'],
				'kinerja_pengurus' => $data['kinerja_pengurus'],
			];

			if ($this->M_rat->insert($data_keragaan)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-rat/'.$id_penilaian);
			} else {
				$this->update_rat($data['id_koperasi'], $data['tanggal']);
				$this->session->set_flashdata('msg', 'success');
				redirect('detail-rat/'.$id_penilaian);
			}
		}
	}

	public function edit($id_rat, $id_penilaian)
	{
		$this->validation($id_rat);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data RAT';
			$data['k']	= $this->M_rat->get_by_id($id_rat);
			$data['id_penilaian'] = $id_penilaian;
			$username = $this->session->userdata('username');
			$get_koperasi = $this->db->get_where('koperasi', ['username' => $username])->row_array();
			$id_koperasi = $get_koperasi['id_koperasi'];
			$data['koperasi'] = $this->M_koperasi->get_by_id($id_koperasi);
			$this->load->view('rat/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$get_nilai = $this->M_penilaian->get_by_id($id_penilaian);
			$tanggal_mulai = $get_nilai['tanggal_mulai'];
			$tanggal_selesai = $get_nilai['tanggal_selesai'];
			
			$data_rat	= [
				'id_rat'	=> $id_rat,
				'id_penilaian'		=> $id_penilaian,
				'id_koperasi'	=> $data['id_koperasi'],
				'tanggal'	=> $data['tanggal'],
				'cadangan'	=> $data['cadangan'],
				'simpanan_lainnya'	=> $data['simpanan_lainnya'],
				'Cadangan_resiko' => $data['Cadangan_resiko'],
				'Modal_penyertaan' => $data['Modal_penyertaan'],
				'Modal_Penyetaraan' => $data['Modal_Penyetaraan'],
				'Modal_sumbangan' => $data['Modal_sumbangan'],
				'shu_belumdibagi' => $data['shu_belumdibagi'],
				'modal_luar'	=> $data['modal_luar'],
				'volume_usaha' => $data['volume_usaha'],
				'pendapatan' => $data['pendapatan'],
				'biaya' => $data['biaya'],
				'kas' => $data['kas'],
				'bank' => $data['bank'],
				'simpanan_berjangka' => $data['simpanan_berjangka'],
				'surat_berharga' => $data['surat_berharga'],
				'pinjaman_diberikan' => $data['pinjaman_diberikan'],
				'penyertaan_dan_aktiva' => $data['penyertaan_dan_aktiva'],
				'jmlaktiva_tetap' => $data['jmlaktiva_tetap'],		

				'realisasi_anggaran' => $data['realisasi_anggaran'],
				'rencana_anggaran' => $data['rencana_anggaran'],
				'transaksi_anggota' => $data['transaksi_anggota'],
				'transaksi_koperasi' => $data['transaksi_koperasi'],
				'sarana_prasarana' => $data['sarana_prasarana'],
				'kerjasama_usaha' => $data['kerjasama_usaha'],
				'kinerja_pengurus' => $data['kinerja_pengurus'],		
			];
			
			if ($this->M_rat->update($data_rat)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-rat/'.$id_rat.'/'.$id_penilaian);
			} else {
				$this->update_rat($data['id_koperasi'], $data['tanggal']);
				$this->session->set_flashdata('msg', 'edit');
				redirect('detail-rat/'.$id_penilaian);
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('id_koperasi', 'Koperasi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		
	}

	public function hapus($id_rat, $id_penilaian)
	{
		$this->M_rat->delete($id_rat);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('detail-rat/'.$id_penilaian);
	}

	public function validasi($id_rat, $id_penilaian)
	{
		$data_rat	= [
			'id_rat'	=> $id_rat,
			'validasi'	=> 1,
			
		];
		
		$this->M_rat->update($data_rat);
		$this->session->set_flashdata('msg', 'update');
		redirect('detail-rat/'.$id_penilaian);
	}

	public function validasi_tolak($id_rat, $id_penilaian)
	{
		$data_rat	= [
			'id_rat'	=> $id_rat,
			'komentar'	=> $this->input->post('komentar'),
			'validasi'	=> 2,
			
		];
		
		$this->M_rat->update($data_rat);
		$this->session->set_flashdata('msg', 'edit');
		redirect('detail-rat/'.$id_penilaian);
	}

	private function update_rat($id_koperasi, $tanggal)
	{
		$tahun = date('Y', strtotime($tanggal));
		$tahun_min1 = $tahun-1;
		$cek_tahun_penilaian = $this->db->select('*')->from('rat')->where('id_koperasi', $id_koperasi)->where("date_format(tanggal, '%Y') =", $tahun)->get()->num_rows();
		$get_tahun_penilaian = $this->db->select('*')->from('rat')->where('id_koperasi', $id_koperasi)->where("date_format(tanggal, '%Y') =", $tahun)->get()->row_array();
		if($cek_tahun_penilaian > 0){
			$simpanan	= $this->db->select("*, sum(simpanan_wajib.besar_simpanan) as besar, (select sum(anggota.simpanan_pokok) from anggota where id_koperasi='$id_koperasi') as pokok")->join('anggota', 'anggota.id_anggota=simpanan_wajib.id_anggota')->join('koperasi', 'anggota.id_koperasi=koperasi.id_koperasi')->where('koperasi.id_koperasi', $id_koperasi)->where("date_format(simpanan_wajib.tanggal_simpan, '%Y') =", $tahun)->get('simpanan_wajib')->row_array();
			$simpanan2	= $this->db->select("*, sum(simpanan_wajib.besar_simpanan) as besar, (select sum(anggota.simpanan_pokok) from anggota where id_koperasi='$id_koperasi') as pokok")->join('anggota', 'anggota.id_anggota=simpanan_wajib.id_anggota')->join('koperasi', 'anggota.id_koperasi=koperasi.id_koperasi')->where('koperasi.id_koperasi', $id_koperasi)->where("date_format(simpanan_wajib.tanggal_simpan, '%Y') =", $tahun_min1)->get('simpanan_wajib')->row_array();
			$data_rat	= [
				'id_rat'		=> $get_tahun_penilaian['id_rat'],
				'simpanan_pokok'	=> $simpanan['pokok'],
				'simpanan_wajib'	=> $simpanan['besar']+$simpanan2['besar'],
				
			];
			
			$this->M_rat->update($data_rat);
		}

		return true;
	}
}
