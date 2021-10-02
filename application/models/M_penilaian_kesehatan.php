<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian_kesehatan extends CI_Model {

	public $table	= 'penilaian_koperasi';

	public function get_data($id_penilaian = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if (!is_null($id_penilaian)) {
			$this->db->where('id_penilaian', $id_penilaian);
		}
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_penilaian_koperasi)
	{
		return $this->db->get_where($this->table, ['id_penilaian_koperasi' => $id_penilaian_koperasi])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_penilaian_koperasi', $data['id_penilaian_koperasi']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_penilaian_koperasi)
	{
		$this->db->delete($this->table, ['id_penilaian_koperasi' => $id_penilaian_koperasi]);
	}
}
