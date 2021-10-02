<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$get_koperasi = $this->db->get_where('koperasi', ['username' => $this->session->userdata('username')])->row_array();
		$id_koperasi = $get_koperasi['id_koperasi'];
        $data['title']		= 'Data Anggota';
        $data['id_koperasi'] = $id_koperasi;
		$data['anggota']		= $this->M_anggota->get_data($id_koperasi)->result_array();
		$data['simpanan']	= $this->db->select("*, sum(simpanan_wajib.besar_simpanan) as besar, (select sum(anggota.simpanan_pokok) from anggota where id_koperasi='$id_koperasi') as pokok")->join('anggota', 'anggota.id_anggota=simpanan_wajib.id_anggota')->join('koperasi', 'anggota.id_koperasi=koperasi.id_koperasi')->where('koperasi.id_koperasi', $id_koperasi)->group_by("DATE_FORMAT(simpanan_wajib.tanggal_simpan, '%Y')")->get('simpanan_wajib')->result_array();

		$this->load->view('anggota/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$get_koperasi = $this->db->get_where('koperasi', ['username' => $this->session->userdata('username')])->row_array();
			$id_koperasi = $get_koperasi['id_koperasi'];
	        $data['title']		= 'Data Anggota';
	        $data['id_koperasi'] = $id_koperasi;
			$this->load->view('anggota/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_anggota	= [
				'id_koperasi'		=> $data['id_koperasi'],
				'no_anggota'		=> $data['no_anggota'],
				'nik'		=> $data['nik'],
				'nama'	=> $data['nama'],
				'jenis_kelamin'	=> $data['jenis_kelamin'],
				'no_telp'		=> $data['no_telp'],
				'alamat'	=> $data['alamat'],
				'tanggal_masuk'	=> $data['tanggal_masuk'],
				'simpanan_pokok'=> $data['simpanan_pokok'],
				'simpanan_wajib'=> $data['simpanan_wajib'],


			];

			if ($this->M_anggota->insert($data_anggota)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-anggota');
			} else {
				$this->update_rat($id_anggota);
				
				$this->session->set_flashdata('msg', 'success');
				redirect('anggota');
			}
		}
	}

	public function edit($id_anggota)
	{
		$this->validation($id_anggota);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Anggota';
			$data['a']	= $this->M_anggota->get_by_id($id_anggota);
			$this->load->view('anggota/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_anggota	= [
				'id_anggota'			=> $id_anggota,
				'no_anggota'		=> $data['no_anggota'],
				'nik'		=> $data['nik'],
				'nama'	=> $data['nama'],
				'jenis_kelamin'	=> $data['jenis_kelamin'],
				'no_telp'		=> $data['no_telp'],
				'alamat'	=> $data['alamat'],
				'tanggal_masuk'	=> $data['tanggal_masuk'],
				'simpanan_pokok'=> $data['simpanan_pokok'],
				'simpanan_wajib'=> $data['simpanan_wajib'],
			];
			
			if ($this->M_anggota->update($data_anggota)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-anggota/'.$id_anggota);
			} else {
				$this->update_rat($id_anggota);

				$this->session->set_flashdata('msg', 'edit');
				redirect('anggota');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamins', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required|trim');
		$this->form_validation->set_rules('simpanan_pokok', 'Simpanan Pokok', 'required|trim');
		$this->form_validation->set_rules('simpanan_wajib', 'Simpanan Wajib', 'required|trim');
		
	}

	public function hapus($id_anggota)
	{
		$this->M_anggota->delete($id_anggota);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('anggota');
	}

	public function status($id_anggota)
	{
		$data_anggota	= [
			'id_anggota'			=> $this->input->post('id_anggota'),
			'status'	=> $this->input->post('status'),
		];
			
		$this->M_anggota->update($data_anggota);
		if ($this->M_anggota->update($data_anggota)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('msg', 'edit');
			redirect('anggota');
		}
	}

	public function simpanan($id_anggota)
	{
        $data['title']		= 'Data Anggota';
        $data['id_anggota'] = $id_anggota;
        $data['a']	= $this->M_anggota->get_by_id($id_anggota);
		$data['simpanan']		= $this->M_simpanan->get_data($id_anggota)->result_array();
		$this->load->view('simpanan/data', $data);
	}

	public function tambah_simpanan($id_anggota)
	{
		$this->validation_simpanan();
		if (!$this->form_validation->run()) {
	        $data['title']		= 'Data Anggota';
	        $data['id_anggota'] = $id_anggota;
			$this->load->view('simpanan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_anggota	= [
				'id_anggota'		=> $id_anggota,
				'tanggal_simpan'	=> $data['tanggal_simpan'],
				'besar_simpanan'=> $data['besar_simpanan']
			];

			if ($this->M_simpanan->insert($data_anggota)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-simpanan/'.$id_anggota);
			} else {
				$this->update_rat($id_anggota);
				$anggota = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
				$this->load->library('mailer');
				$content = '
		        Selamat, anda sudah membayar Simpanan Wajib bulan ini, berikut detail transaksinya: 
		        Nama Anggota : '.$anggota['nama'].'
		        Besar Simpanan : Rp '.number_format($anggota['simpanan_wajib'], 2, ',', '.').'
		        Bulan : '.date('d F Y', strtotime($data['tanggal_simpan'])).' /n

		        Terima kasih
		        '; //link yang dikirim ke email

		        $sendmail = array(
		              'email_penerima'=>$anggota['no_telp'],
		              'subjek'=>'Pembayaran Simpanan Wajib',
		              'content'=> nl2br($content)
		        );
		              

		        $send = $this->mailer->send($sendmail);
				$this->session->set_flashdata('msg', 'success');
				redirect('simpanan-anggota/'.$id_anggota);
			}
		}
	}

	public function edit_simpanan($id_anggota, $id_simpanan)
	{
		$this->validation_simpanan();
		if (!$this->form_validation->run()) {
	        $data['title']		= 'Data Anggota';
	        $data['id_anggota'] = $id_anggota;
	        $data['s'] = $this->M_simpanan->get_by_id($id_simpanan);
			$this->load->view('simpanan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_anggota	= [
				'id_simpanan'		=> $id_simpanan,
				'tanggal_simpan'	=> $data['tanggal_simpan'],
				'besar_simpanan'=> $data['besar_simpanan']
			];

			if ($this->M_simpanan->update($data_anggota)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-simpanan/'.$id_anggota.'/'.$id_simpanan);
			} else {
				$this->update_rat($id_anggota);
				
				$this->session->set_flashdata('msg', 'success');
				redirect('simpanan-anggota/'.$id_anggota);
			}
		}
	}

	public function hapus_simpanan($id_anggota, $id_simpanan)
	{
		$this->M_simpanan->delete($id_simpanan);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('simpanan-anggota/'.$id_anggota);
	}

	private function validation_simpanan()
	{
		$this->form_validation->set_rules('tanggal_simpan', 'Tanggal Simpan', 'required|trim');
		$this->form_validation->set_rules('besar_simpanan', 'Besar Simpanan', 'required|trim');
	}

	private function update_rat($id_anggota)
	{
		$get_koperasi = $this->M_anggota->get_by_id($id_anggota);
		$id_koperasi = $get_koperasi['id_koperasi'];
		$tahun = date('Y');
		$tahun_min1 = date('Y')-1;
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
