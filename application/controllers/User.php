<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $data['title']		= 'Data User';
		$data['user']		= $this->M_user->get_data()->result_array();
		$this->load->view('user/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data User';
			$this->load->view('user/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'nama'			=> $data['nama'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'role'			=> $data['role'],
			];
			if ($this->M_user->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-user');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('user');
			}
		}
	}

	public function edit($id_user)
	{
		$this->validation($id_user);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data User';
			$data['user']	= $this->M_user->get_by_id($id_user);
			$this->load->view('user/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if(!empty($data['password'])){
				$data_user	= [
					'id_user'		=> $id_user,
					'nama'			=> $data['nama'],
					'username'		=> $data['username'],
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
					'role'			=> $data['role'],
				];
			} else {
				$data_user	= [
					'id_user'		=> $id_user,
					'nama'			=> $data['nama'],
					'username'		=> $data['username'],
					'role'			=> $data['role'],
				];
			}
			
			if ($this->M_user->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-user/'.$id_user);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('user');
			}
		}
	}

	private function validation($id_user = null)
	{
		if(is_null($id_user)){
			$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|is_unique[user.username]', ['is_unique'	=> 'Username Sudah Terdaftar']);
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|required');
			$this->form_validation->set_rules('role', 'Role', 'required');
		} else {
			$username_baru 	= $this->input->post('username');
			$data			= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
			$username 		= $data['username'];

			if($username == $username_baru){
				$this->form_validation->set_rules('username', 'Username', 'required|trim');
			} else {
				$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', array('is_unique' => 'Username sudah terdaftar' ));
			}
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
			$this->form_validation->set_rules('role', 'Role', 'required');
		}
		
	}

	public function hapus($id_user)
	{
		$this->M_user->delete($id_user);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('user');
	}

	public function setting()
	{
		$this->validation_setting();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data User';
			$id_user 		= $this->session->userdata('id_user');
			$data['user']	= $this->M_user->get_by_id($id_user);
			$this->load->view('user/setting', $data);
		} else {
			$id_user 		= $this->session->userdata('id_user');
			$username 		= $this->session->userdata('username');
			$data	= $this->input->post(null, true);
			$data_user = [
				'id_user'		=> $id_user,
				'nama'	=> $data['nama'],
				'username'	=> $data['username'],
			];

			if(is_koperasi()){
				$get_koperasi = $this->db->get_where('koperasi', ['username' => $username])->row_array();
				$id_koperasi = $get_koperasi['id_koperasi'];
				$data_koperasi = [
					'id_koperasi'		=> $id_koperasi,
					'username'	=> $data['username'],
				];

				$this->M_koperasi->update($data_koperasi);
			}
			
			
			if ($this->M_user->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('setting');
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('setting');
			}
		}
	}

	public function password()
	{
		$this->validation_changes_password();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data User';
			$id_user 		= $this->session->userdata('id_user');
			$data['user']	= $this->M_user->get_by_id($id_user);
			$this->load->view('user/password', $data);
		} else {
			$id_user 		= $this->session->userdata('id_user');
			$data		= $this->input->post(null, true);
			$get_user 		= $this->M_user->get_by_id($id_user);
			$password_lama 	= $data['password_lama'];
			if(password_verify($password_lama, $get_user['password'])){
				$data_user	= [
					'id_user'	=> $data['id_user'],
					'password'	=> password_hash($data['password_baru'], PASSWORD_DEFAULT),
				];
				$insert = $this->M_user->update($data_user);
				if ($insert) {
					$this->session->set_flashdata('msg', 'error');
				} else {
					$this->session->set_flashdata('msg', 'edit');
				}
				redirect('changes-password');
			} else {
				$this->session->set_flashdata('msg', 'error');
				redirect('changes-password');
			}
		}
	}

	private function validation_setting()
	{
		$username		= $this->session->userdata('username');
		$username_baru 	= $this->input->post('username');
		if($username == $username_baru){
			$this->form_validation->set_rules('username', 'Username', 'required');	
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', ['is_unique'	=> 'Username Sudah Ada']);
		}
		
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');	
	}

	private function validation_changes_password()
	{	
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');	
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required');		
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
	}
}
