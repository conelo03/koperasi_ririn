<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_kesehatan extends CI_Controller {

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

	public function get_nilai(){
		$tanggal = $this->input->post('tanggal');
	    $id_koperasi = $this->input->post('id_koperasi');
	    $tahun = date('Y', strtotime($tanggal));
	    //var_dump($id_barang);
	    //die();
	    $get_anggota = $this->db->where('id_koperasi', $id_koperasi)->where_not_in("date_format(tanggal_masuk, '%Y')", $tahun)->get('anggota')->num_rows();
		$get_anggota_baru = $this->db->where('id_koperasi', $id_koperasi)->where("date_format(tanggal_masuk, '%Y') = ", $tahun)->get('anggota')->num_rows();
		if($get_anggota != 0){
			$presentase = ($get_anggota_baru/$get_anggota)*100;
			$nilai_p;
			$nilai_p_h;
		    if($presentase > 10){
				$nilai_p = 5;
				$nilai_p_h = "Sangat Baik";
			} elseif($presentase >= 5 && $presentase <= 10) {
				$nilai_p = 4;
				$nilai_p_h = "Baik";
			} elseif($presentase >= 1 && $presentase <= 4) {
				$nilai_p = 3;
				$nilai_p_h = "Cukup";
			} elseif($presentase == 0) {
				$nilai_p = 2;
				$nilai_p_h = "Kurang Baik";
			} elseif($presentase < 0) {
				$nilai_p = 1;
				$nilai_p_h = "Tidak Baik";
			}
		}
		

		$get_rat = $this->db->where('id_koperasi', $id_koperasi)->where("date_format(tanggal, '%Y') = ", $tahun)->get('rat')->row_array();
		if(!empty($get_rat)){
			$pch_tanggal = explode('-', $get_rat['tanggal']);
			$bulan = $this->penyelenggaraan_rat($pch_tanggal[1]);

			$shu = $get_rat['pendapatan']-$get_rat['biaya'];
			$total_modal_sendiri = $get_rat['simpanan_pokok']+$get_rat['simpanan_wajib']+$get_rat['cadangan']+$get_rat['simpanan_lainnya']+$get_rat['Cadangan_resiko']+$get_rat['Modal_penyertaan']+$get_rat['Modal_Penyetaraan']+$get_rat['Modal_sumbangan']+$get_rat['shu_belumdibagi']+$get_rat['pendapatan']-$get_rat['biaya'];

			$realisasi_anggaran = $this->realisasi_anggaran($get_rat['realisasi_anggaran'], $get_rat['rencana_anggaran']);
			$produktivitas = $this->produktivitas($shu, $total_modal_sendiri);
			$transaksi_usaha = $this->transaksi_usaha($get_rat['transaksi_anggota'], $get_rat['transaksi_koperasi']);
			$sarana_prasarana = $this->sarana_prasarana($get_rat['sarana_prasarana']);
			$kerjasama_usaha = $this->kerjasama_usaha($get_rat['kerjasama_usaha']);
			$kinerja_pengurus = $this->kinerja_pengurus($get_rat['kinerja_pengurus']);
		}
		


	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    if (empty($get_rat)){
	      $list = "error";
	      $list_p = "error";
	      $list_ra = "error";
	      $list_tu = "error";
	      $list_sp = "error";
	      $list_ku = "error";
	      $list_kp = "error";
	    }else{
	      $list = "
	      <input type='text' name='penyelenggaraan_rat' value='".$bulan."' class='form-control' readonly/>
	      ";
	      $list_ra = "
	      <input type='text' name='realisasi_anggaran' value='".$realisasi_anggaran."' class='form-control' readonly/>
	      ";
	      $list_p = "
	      <input type='text' name='produktivitas' value='".$produktivitas."' class='form-control' readonly/>
	      ";
	      $list_tu = "
	      <input type='text' name='transaksi_usaha' value='".$transaksi_usaha."' class='form-control' readonly/>
	      ";
	      $list_sp = "
	      <input type='text' name='sarana_prasarana' value='".$sarana_prasarana."' class='form-control' readonly/>
	      ";
	      $list_ku = "
	      <input type='text' name='kerjasama_usaha' value='".$kerjasama_usaha."' class='form-control' readonly/>
	      ";
	      $list_kp = "
	      <input type='text' name='kinerja_pengurus' value='".$kinerja_pengurus."' class='form-control' readonly/>
	      ";
	    }

	    if ($get_anggota == 0){
	      $list_k = "error";
	    }else{
	      $list_k = "
	      <input type='text' name='keanggotaan' value='".$nilai_p_h."' class='form-control' readonly/>
	      ";
	    }
	     // Tambahkan tag option ke variabel $lists
	    
	    
	    $a = array(
	    	'penyelenggaraan_rat'=>$list,
	    	'keanggotaan'=> $list_k,
	    	'realisasi_anggaran' => $list_ra,
	    	'produktivitas' => $list_p,
	    	'transaksi_usaha' => $list_tu,
	    	'sarana_prasarana' => $list_sp,
	    	'kinerja_pengurus' => $list_kp,
	    	'kerjasama_usaha' => $list_ku,
	    ); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($a); // konversi varibael $callback menjadi JSON
	}

	public function index()
	{
        $data['title']		= 'Penilaian Koperasi Berprestasi';
		$data['pk']		= $this->M_penilaian->get_data('Buka')->result_array();
		$this->load->view('penilaian_kesehatan/data', $data);
	}

	public function detail($id_penilaian)
	{
        $data['title']		= 'Penilaian Koperasi Berprestasi';
        $data['id_penilaian'] = $id_penilaian;
		$data['pk']		= $this->db->where('id_penilaian', $id_penilaian)->order_by('cast(peringkat as int)', 'ASC')->get('penilaian_koperasi')->result_array();
		$this->load->view('penilaian_kesehatan/detail', $data);
	}

	public function tambah($id_penilaian)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Penilaian Koperasi Berprestasi';
			$data['id_penilaian'] = $id_penilaian;
			$data['koperasi'] = $this->db->get_where('rat', ['id_penilaian' => $id_penilaian])->result_array();
			$this->load->view('penilaian_kesehatan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$penyelenggaraan_rat = $this->konversi($data['penyelenggaraan_rat']);
			$keanggotaan = $this->konversi($data['keanggotaan']);
			$realisasi_anggaran = $this->konversi($data['realisasi_anggaran']);
			$kinerja_pengurus = $this->konversi($data['kinerja_pengurus']);
			$sarana_prasarana = $this->konversi($data['sarana_prasarana']);
			$produktivitas = $this->konversi($data['produktivitas']);
			$kerjasama_usaha = $this->konversi($data['kerjasama_usaha']);
			$transaksi_usaha = $this->konversi($data['transaksi_usaha']);

			$data_penilaian	= [
				'tanggal'		=> $data['tanggal'],
				'id_penilaian'	=> $id_penilaian,
				'id_koperasi'	=> $data['id_koperasi'],
				'penyelenggaraan_rat'	=> $penyelenggaraan_rat,
				'keanggotaan'	=> $keanggotaan,
				'realisasi_anggaran'	=> $realisasi_anggaran,
				'kinerja_pengurus'	=> $kinerja_pengurus,
				'sarana_prasarana'	=> $sarana_prasarana,
				'produktivitas'	=> $produktivitas,
				'kerjasama_usaha'	=> $kerjasama_usaha,
				'transaksi_usaha'	=> $transaksi_usaha,
			];


			if ($this->M_penilaian_kesehatan->insert($data_penilaian)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-penilaian-kesehatan/'.$id_penilaian);
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('detail-penilaian-kesehatan/'.$id_penilaian);
			}
		}
	}

	public function edit($id_penilaian_koperasi, $id_penilaian)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Penilaian Koperasi Berprestasi';
			$data['id_penilaian'] = $id_penilaian;
			$data['pk'] = $this->M_penilaian_kesehatan->get_by_id($id_penilaian_koperasi);
			$data['koperasi'] = $this->db->get_where('rat', ['id_penilaian' => $id_penilaian])->result_array();
			$this->load->view('penilaian_kesehatan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_penilaian	= [
				'id_penilaian_koperasi'	=> $id_penilaian_koperasi,
				'tanggal'		=> $data['tanggal'],
				'id_penilaian'	=> $id_penilaian,
				'id_koperasi'	=> $data['id_koperasi'],
				'penyelenggaraan_rat'	=> $data['penyelenggaraan_rat'],
				'keanggotaan'	=> $data['keanggotaan'],
				'realisasi_anggaran'	=> $data['realisasi_anggaran'],
				'kinerja_pengurus'	=> $data['kinerja_pengurus'],
				'sarana_prasarana'	=> $data['sarana_prasarana'],
				'produktivitas'	=> $data['produktivitas'],
				'kerjasama_usaha'	=> $data['kerjasama_usaha'],
				'transaksi_usaha'	=> $data['transaksi_usaha'],
			];

			if ($this->M_penilaian_kesehatan->update($data_penilaian)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-penilaian-kesehatan/'.$id_penilaian);
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('detail-penilaian-kesehatan/'.$id_penilaian);
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal Mulai', 'required|trim');
		$this->form_validation->set_rules('id_koperasi', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('penyelenggaraan_rat', 'Penyelenggaraan RAT', 'required|trim');
		$this->form_validation->set_rules('keanggotaan', 'Keanggotaan', 'required|trim');
		$this->form_validation->set_rules('realisasi_anggaran', 'Realisasi Anggaran', 'required|trim');
		$this->form_validation->set_rules('kinerja_pengurus', 'Kinerja Pengurus', 'required|trim');
		$this->form_validation->set_rules('sarana_prasarana', 'Sarana dan Prasarana', 'required|trim');
		$this->form_validation->set_rules('kerjasama_usaha', 'Kerjasama Usaha', 'required|trim');
		$this->form_validation->set_rules('transaksi_usaha', 'Transaksi Anggota', 'required|trim');
		$this->form_validation->set_rules('produktivitas', 'produktivitas', 'required|trim');
		
	}

	public function hapus($id_penilaian_koperasi, $id_penilaian)
	{
		$this->M_penilaian_kesehatan->delete($id_penilaian_koperasi);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('detail-penilaian-kesehatan/'.$id_penilaian);
	}

	private function konversi($value)
	{
		$hasil;
		switch ($value) {
			case 'Sangat Baik':
				$hasil = '5';
				break;
			case 'Baik':
				$hasil = '4';
				break;
			case 'Cukup':
				$hasil = '3';
				break;
			case 'Kurang Baik':
				$hasil = '2';
				break;
			case 'Tidak Baik':
				$hasil = '1';
				break;
			
			default:
				$hasil = 0;
				break;
		}
		return $hasil;
	}

	private function penyelenggaraan_rat($bulan)
	{
		$nilai_k;
		$nilai_k_h;
		if($bulan >= 01 && $bulan <= 03) {
			$nilai_k = 5;
			$nilai_k_h = "Sangat Baik";
		} elseif($bulan == 04) {
			$nilai_k = 4;
			$nilai_k_h = "Baik";
		} elseif($bulan == 05) {
			$nilai_k = 3;
			$nilai_k_h = "Cukup";
		} elseif($bulan == 06) {
			$nilai_k = 2;
			$nilai_k_h = "Kurang Baik";
		} elseif($bulan > 06) {
			$nilai_k = 1;
			$nilai_k_h = "Tidak Baik";
		}

		return $nilai_k_h;
	}

	private function realisasi_anggaran($realisasi, $rencana)
	{
		$presentase = ($realisasi/$rencana)*100;
		$nilai_p;
		$nilai_p_h;
	    if($presentase >= 100){
			$nilai_p = 5;
			$nilai_p_h = "Sangat Baik";
		} elseif($presentase >= 80 && $presentase <= 99) {
			$nilai_p = 4;
			$nilai_p_h = "Baik";
		} elseif($presentase >= 60 && $presentase <= 79) {
			$nilai_p = 3;
			$nilai_p_h = "Cukup";
		} elseif($presentase >= 40 && $presentase <= 59) {
			$nilai_p = 2;
			$nilai_p_h = "Kurang Baik";
		} elseif($presentase < 40) {
			$nilai_p = 1;
			$nilai_p_h = "Tidak Baik";
		}

		return $nilai_p_h;
	}

	private function produktivitas($shu, $modal_sendiri)
	{
		$presentase = ($shu/$modal_sendiri)*100;
		$nilai_p;
		$nilai_p_h;
	    if($presentase >= 21){
			$nilai_p = 5;
			$nilai_p_h = "Sangat Baik";
		} elseif($presentase >= 15 && $presentase <= 20) {
			$nilai_p = 4;
			$nilai_p_h = "Baik";
		} elseif($presentase >= 9 && $presentase <= 14) {
			$nilai_p = 3;
			$nilai_p_h = "Cukup";
		} elseif($presentase >= 3 && $presentase <= 8) {
			$nilai_p = 2;
			$nilai_p_h = "Kurang Baik";
		} elseif($presentase < 3) {
			$nilai_p = 1;
			$nilai_p_h = "Tidak Baik";
		}

		return $nilai_p_h;
	}

	private function transaksi_usaha($transaksi_anggota, $transaksi_koperasi)
	{
		$presentase = ($transaksi_anggota/$transaksi_koperasi)*100;
		$nilai_p;
		$nilai_p_h;
	    if($presentase > 79){
			$nilai_p = 5;
			$nilai_p_h = "Sangat Baik";
		} elseif($presentase >= 60 && $presentase <= 79) {
			$nilai_p = 4;
			$nilai_p_h = "Baik";
		} elseif($presentase >= 40 && $presentase <= 59) {
			$nilai_p = 3;
			$nilai_p_h = "Cukup";
		} elseif($presentase >= 20 && $presentase <= 39) {
			$nilai_p = 2;
			$nilai_p_h = "Kurang Baik";
		} elseif($presentase < 20) {
			$nilai_p = 1;
			$nilai_p_h = "Tidak Baik";
		}

		return $nilai_p_h;
	}

	private function sarana_prasarana($sarana_prasarana)
	{
		$nilai_p;
		$nilai_p_h;
	    if($sarana_prasarana == "Milik Sendiri"){
			$nilai_p = 5;
			$nilai_p_h = "Sangat Baik";
		} elseif($sarana_prasarana == "Sewa / Kontrak") {
			$nilai_p = 4;
			$nilai_p_h = "Baik";
		} elseif($sarana_prasarana == "Hibah") {
			$nilai_p = 3;
			$nilai_p_h = "Cukup";
		} elseif($sarana_prasarana == "Pinjaman") {
			$nilai_p = 2;
			$nilai_p_h = "Kurang Baik";
		} elseif($sarana_prasarana == "Numpang") {
			$nilai_p = 1;
			$nilai_p_h = "Tidak Baik";
		}

		return $nilai_p_h;
	}

	private function kerjasama_usaha($kerjasama_usaha)
	{
		$nilai_p;
		$nilai_p_h;
	    if($kerjasama_usaha == "Lebih dari 5 Kerjasama"){
			$nilai_p = 5;
			$nilai_p_h = "Sangat Baik";
		} elseif($kerjasama_usaha == "4 Kerjasama") {
			$nilai_p = 4;
			$nilai_p_h = "Baik";
		} elseif($kerjasama_usaha == "3 Kerjasama") {
			$nilai_p = 3;
			$nilai_p_h = "Cukup";
		} elseif($kerjasama_usaha == "1-2 Kerjasama") {
			$nilai_p = 2;
			$nilai_p_h = "Kurang Baik";
		} elseif($kerjasama_usaha == "Tidak Ada Kerjasama") {
			$nilai_p = 1;
			$nilai_p_h = "Tidak Baik";
		}

		return $nilai_p_h;
	}

	private function kinerja_pengurus($kinerja_pengurus)
	{
		$nilai_p;
		$nilai_p_h;
	    if($kinerja_pengurus == "Ketujuh item kinerja pengurus dibuat tertulis dan dilaksanakan"){
			$nilai_p = 5;
			$nilai_p_h = "Sangat Baik";
		} elseif($kinerja_pengurus == "1 s/d 2 item kinerja pengurus tidak dibuat dan tidak dilaksanakan") {
			$nilai_p = 4;
			$nilai_p_h = "Baik";
		} elseif($kinerja_pengurus == "3 s/d 4 item kinerja pengurus tidak dibuat dan tidak dilaksanakan") {
			$nilai_p = 3;
			$nilai_p_h = "Cukup";
		} elseif($kinerja_pengurus == "5 s/d 6 item kinerja pengurus tidak dibuat dan tidak dilaksanakan") {
			$nilai_p = 2;
			$nilai_p_h = "Kurang Baik";
		} elseif($kinerja_pengurus == "Ketujuh item kinerja pengurus tidak dibuat dan tidak dilaksanakan") {
			$nilai_p = 1;
			$nilai_p_h = "Tidak Baik";
		}

		return $nilai_p_h;
	}

	public function proses_ranking($id_penilaian)
	{
		$pk = $this->M_penilaian_kesehatan->get_data($id_penilaian)->result_array();
		$jml_pk = $this->M_penilaian_kesehatan->get_data($id_penilaian)->num_rows();
		if($jml_pk == 0){
			$this->session->set_flashdata('msg', 'data-kosong');
			redirect('detail-penilaian-kesehatan/'.$id_penilaian);
		}
		
		$alternatif[0]= [];
		$id_alt= [];
		foreach ($pk as $key) {
			if(is_null($key['penyelenggaraan_rat']) || is_null($key['keanggotaan']) || is_null($key['realisasi_anggaran']) || is_null($key['kinerja_pengurus']) || is_null($key['sarana_prasarana']) || is_null($key['produktivitas']) || is_null($key['kerjasama_usaha']) || is_null($key['transaksi_usaha'])){
				$this->session->set_flashdata('msg', 'data-kosong');
				redirect('detail-penilaian-kesehatan/'.$id_penilaian);
			}
			$a1 = [
				intval($key['penyelenggaraan_rat']), 
				intval($key['keanggotaan']), 
				intval($key['realisasi_anggaran']), 
				intval($key['kinerja_pengurus']), 
				intval($key['sarana_prasarana']), 
				intval($key['produktivitas']), 
				intval($key['kerjasama_usaha']), 
				intval($key['transaksi_usaha'])
			];
			$a2 = [
				$key['id_penilaian_koperasi'], 
			];
			array_push($alternatif[0], $a1);
			array_push($id_alt, $a2);
		}

		$subkriteria = [
			0 => [1, 3, 5, 7, 9],
			1 => [0.333333333, 1, 3, 5, 7],
			2 => [0.2, 0.333333333, 1, 3, 5],
			3 => [0.142857143, 0.2, 0.333333333, 1, 3],
			4 => [0.111111111, 0.142857143, 0.2, 0.333333333, 1]
		];

		$kriteria = [9, 7, 5, 5, 3, 7, 6, 6];

		//Perhitungan Kriteria
		$jml_k = count($kriteria);

		$ok1 = [];
		for ($i=0; $i < $jml_k; $i++) {
			$ok11 = [];
			for ($x=0; $x < $jml_k; $x++) { 
				array_push($ok11, $kriteria[$i]/$kriteria[$x]);
			}
			array_push($ok1, $ok11);
		}

		$jml_array1 = [];
		for ($i=0; $i < $jml_k; $i++) {
			
			$jml = 0;
			for ($x=0; $x < $jml_k; $x++) { 
				$jml += $kriteria[$x]/$kriteria[$i];
				// echo $kriteria[$x]/$kriteria[0].' ';
			}
			array_push($jml_array1, $jml);
			
		}

		$tph_k = [];
		for ($i=0; $i < count($ok1); $i++) { 
			$jml = 0;
			$total = 0;
			$prioritas = 0;
			$hasil = 0;
			for ($x=0; $x < count($ok1); $x++) { 
				$jml = $ok1[$i][$x] / $jml_array1[$x];
				$total += $ok1[$i][$x] / $jml_array1[$x];
				$prioritas = $total/8;
				$hasil = $total + $prioritas;
			}
			array_push($tph_k, [$total, $prioritas, $hasil]);
		}

		//Perhitungan Sub Kriteria
		$jml_p_s_k = [];
		for ($i=0; $i < count($subkriteria); $i++) { 
			
			$jml = 0;
			for ($x=0; $x < count($subkriteria); $x++) { 
				$jml += $subkriteria[$x][$i];		
			}
			array_push($jml_p_s_k, $jml);
		}

		$tph_s_k = [];
		for ($i=0; $i < count($subkriteria); $i++) { 
			$jml = 0;
			$total = 0;
			$prioritas = 0;
			$hasil = 0;
			for ($x=0; $x < count($subkriteria); $x++) { 
				$jml = $subkriteria[$i][$x] / $jml_p_s_k[$x];
				$total += $subkriteria[$i][$x] / $jml_p_s_k[$x];
				$prioritas = $total/5;
				$hasil = $total + $prioritas;
			}
			array_push($tph_s_k, [$total, $prioritas, $hasil]);
		}

		for ($i=0; $i < count($alternatif[0]); $i++) { 
			for ($x=0; $x < count($alternatif[0][0]); $x++) { 
			}
		}

		$skor = [];
		for ($i=0; $i < count($alternatif[0]); $i++) { 
			$hasil = 0;
			$total = 0;
			for ($x=0; $x < count($alternatif[0][0]); $x++) { 
				if($alternatif[0][$i][$x] == 5){
					$hasil = $tph_k[$x][1]*$tph_s_k[0][1];
				}elseif($alternatif[0][$i][$x] == 4){
					$hasil = $tph_k[$x][1]*$tph_s_k[1][1];
				}elseif($alternatif[0][$i][$x] == 3){
					$hasil = $tph_k[$x][1]*$tph_s_k[2][1];
				}
				elseif($alternatif[0][$i][$x] == 2){
					$hasil = $tph_k[$x][1]*$tph_s_k[3][1];			
				}
				elseif($alternatif[0][$i][$x] == 1){
					$hasil = $tph_k[$x][1]*$tph_s_k[4][1];
				}
				$total += $hasil;
				
			}
			array_push($skor, $total);
		}
		
		

		$aa = [];
		for ($i=0; $i < count($alternatif[0]); $i++) { 
			$ac = $id_alt[$i][0];
			$jml = 0;
			for ($x=0; $x < count($skor); $x++) { 
				$jml = $skor[$i];
				
			}
			array_push($aa, [$ac, $jml]);
		}

		var_dump($aa);

		for ($i=0; $i < count($alternatif[0]); $i++) { 
			$id_penilaian_kesehatan = $aa[$i][0];
			$nilai = $aa[$i][1];
			$data = [
				'id_penilaian_koperasi' => $id_penilaian_kesehatan,
				'nilai' => $nilai
			];
			$this->M_penilaian_kesehatan->update($data);
		}

		$pk = $this->db->select('*')->from('penilaian_koperasi')->where('id_penilaian', $id_penilaian)->order_by('cast(nilai as double)', 'DESC')->get()->result_array();

		$p = 1;
		foreach ($pk as $key) {
			$id_penilaian_koperasi = $key['id_penilaian_koperasi'];
			$peringkat = $p++;

			$data = [
				'id_penilaian_koperasi' => $id_penilaian_koperasi,
				'peringkat' => $peringkat
			];
			$this->M_penilaian_kesehatan->update($data);
		}
		$this->session->set_flashdata('msg', 'success');
		redirect('detail-penilaian-kesehatan/'.$id_penilaian);
	}

}
