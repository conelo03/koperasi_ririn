<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_koperasi extends CI_Model {

	public $table	= 'koperasi';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_koperasi)
	{
		return $this->db->get_where($this->table, ['id_koperasi' => $id_koperasi])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_koperasi', $data['id_koperasi']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_koperasi)
	{
		$this->db->delete($this->table, ['id_koperasi' => $id_koperasi]);
	}
}
