<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

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
        $data['title']		= 'Data Penilaian';
		$data['penilaian']		= $this->M_penilaian->get_data()->result_array();
		$this->load->view('penilaian/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Penilaian';
			$this->load->view('penilaian/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_penilaian	= [
				'tanggal_mulai'		=> $data['tanggal_mulai'],
				'tanggal_selesai'	=> $data['tanggal_selesai'],
				'status'	=> 'Buka',
			];

			if ($this->M_penilaian->insert($data_penilaian)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-penilaian');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('penilaian');
			}
		}
	}

	public function edit($id_penilaian)
	{
		$this->validation($id_penilaian);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Penilaian';
			$data['p']	= $this->M_penilaian->get_by_id($id_penilaian);
			$this->load->view('penilaian/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_penilaian	= [
				'id_penilaian'			=> $id_penilaian,
				'tanggal_mulai'		=> $data['tanggal_mulai'],
				'tanggal_selesai'	=> $data['tanggal_selesai'],
				'status'	=> $data['status'],
			];
			
			if ($this->M_penilaian->update($data_penilaian)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-penilaian/'.$id_penilaian);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('penilaian');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|trim');
		$this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required|trim');
		
	}

	public function hapus($id_penilaian)
	{
		$this->M_penilaian->delete($id_penilaian);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('penilaian');
	}
}
