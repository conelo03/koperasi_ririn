<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koperasi extends CI_Controller {

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
        $data['title']		= 'Data Umum Koperasi';
		$data['koperasi']		= $this->M_koperasi->get_data()->result_array();
		$this->load->view('koperasi/data', $data);
	}

	public function detail($id_koperasi)
	{
        $data['title']		= 'Data Umum Koperasi';
		$data['k']		= $this->M_koperasi->get_by_id($id_koperasi);
		$this->load->view('koperasi/detail', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Umum Koperasi';
			$this->load->view('koperasi/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_koperasi	= [
				'nama_koperasi'			=> $data['nama_koperasi'],
				'nomor_badan_hukum'			=> $data['nomor_badan_hukum'],
				'tanggal_badan_hukum'			=> $data['tanggal_badan_hukum'],
				'jenis_koperasi'			=> $data['jenis_koperasi'],
				'alamat'			=> $data['alamat'],
				'ketua'			=> $data['ketua'],
				'sekretaris'			=> $data['sekretaris'],
				'bendahara'			=> $data['bendahara'],
				'manajer_kasir'			=> $data['manajer_kasir'],
				'no_hp_ketua'			=> $data['no_hp_ketua'],
				'no_hp_sekretaris'			=> $data['no_hp_sekretaris'],
				'no_hp_bendahara'			=> $data['no_hp_bendahara'],
				'no_hp_manajer_kasir'			=> $data['no_hp_manajer_kasir'],
				'jml_anggota_l'			=> $data['jml_anggota_l'],
				'jml_anggota_p'			=> $data['jml_anggota_p'],
				'jml_karyawan_l'			=> $data['jml_karyawan_l'],
				'jml_karyawan_p'			=> $data['jml_karyawan_p'],
				'email'			=> $data['email'],
				'username'			=> $data['username'],
			];

			$data_user	= [
				'nama'			=> $data['nama_koperasi'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'role'			=> 'Badan Usaha Koperasi',
			];

			$insert_k = $this->M_koperasi->insert($data_koperasi);
			$insert_u = $this->M_user->insert($data_user);
			if ($insert_k) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-koperasi');
			} else {
				$config = [
		            'mailtype'  => 'html',
		            'charset'   => 'utf-8',
		            'protocol'  => 'smtp',
		            'smtp_host' => 'smtp.gmail.com',
		            'smtp_user' => 'uzisteven18@gmail.com',  // Email gmail
		            'smtp_pass'   => 'capricorn031999',  // Password gmail
		            'smtp_crypto' => 'ssl',
		            'smtp_port'   => 465,
		            'crlf'    => "\r\n",
		            'newline' => "\r\n"
		        ];

		        // Load library email dan konfigurasinya
		        $this->load->library('email', $config);

		        // Email dan nama pengirim
		        $this->email->from('no-reply@admin.com', 'Admin');

		        // Email penerima
		        $this->email->to($data['email']); // Ganti dengan email tujuan

		        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		        // Subject email
		        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter');

		        // Isi email
		        $content = '
		        Yth. Ketua Koperasi '.$data['nama_koperasi'].', berikut adalah username dan password untuk login di Sistem Informasi xxx: 
		        Username : '.$data['username'].'
		        Password : '.$data['password'].'

		        Terima kasih
		        ';
		        $this->email->message(nl2br($content));
		        $this->email->send();
				$this->session->set_flashdata('msg', 'success');
				redirect('koperasi');
			}
		}
	}

	public function edit($id_koperasi)
	{
		$this->validation($id_koperasi);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Umum Koperasi';
			$data['k']	= $this->M_koperasi->get_by_id($id_koperasi);
			$this->load->view('koperasi/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$koperasi	= $this->M_koperasi->get_by_id($id_koperasi);
			$user 		= $this->db->get_where('user', ['username' => $koperasi['username']])->row_array();
			$data_koperasi	= [
				'id_koperasi'			=> $id_koperasi,
				'nama_koperasi'			=> $data['nama_koperasi'],
				'nomor_badan_hukum'			=> $data['nomor_badan_hukum'],
				'tanggal_badan_hukum'			=> $data['tanggal_badan_hukum'],
				'jenis_koperasi'			=> $data['jenis_koperasi'],
				'alamat'			=> $data['alamat'],
				'ketua'			=> $data['ketua'],
				'sekretaris'			=> $data['sekretaris'],
				'bendahara'			=> $data['bendahara'],
				'manajer_kasir'			=> $data['manajer_kasir'],
				'no_hp_ketua'			=> $data['no_hp_ketua'],
				'no_hp_sekretaris'			=> $data['no_hp_sekretaris'],
				'no_hp_bendahara'			=> $data['no_hp_bendahara'],
				'no_hp_manajer_kasir'			=> $data['no_hp_manajer_kasir'],
				'jml_anggota_l'			=> $data['jml_anggota_l'],
				'jml_anggota_p'			=> $data['jml_anggota_p'],
				'jml_karyawan_l'			=> $data['jml_karyawan_l'],
				'jml_karyawan_p'			=> $data['jml_karyawan_p'],
				'email'			=> $data['email'],
				'username'			=> $data['username'],
			];

			$data_user	= [
				'id_user'		=> $user['id_user'],
				'nama'			=> $data['nama_koperasi'],
				'username'		=> $data['username'],
			];

			$insert_k = $this->M_koperasi->update($data_koperasi);
			$insert_u = $this->M_user->update($data_user);
			
			if ($insert_k) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-koperasi/'.$id_koperasi);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('koperasi');
			}
		}
	}

	private function validation($id_koperasi = null)
	{
		if(is_null($id_koperasi)){
			$this->form_validation->set_rules('username', 'username', 'required|trim|alpha_numeric|is_unique[user.username]', ['is_unique'	=> 'Username Sudah Terdaftar']);
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|required');
		} else {
			$username_baru 	= $this->input->post('username');
			$data			= $this->db->get_where('koperasi', ['id_koperasi' => $id_koperasi])->row_array();
			$username 		= $data['username'];

			if($username == $username_baru){
				$this->form_validation->set_rules('username', 'username', 'required|trim');
			} else {
				$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', array('is_unique' => 'Username sudah terdaftar' ));
			}
			$this->form_validation->set_rules('nama_koperasi', 'Nama Koperasi', 'required|trim');
			$this->form_validation->set_rules('nomor_badan_hukum', 'Nomor Badan Hukum', 'required|trim');
		}
		
	}

	public function hapus($id_koperasi)
	{
		$this->M_koperasi->delete($id_koperasi);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('koperasi');
	}
}
