<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

	public $table	= 'anggota';

	public function get_data($id_koperasi)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_koperasi', $id_koperasi);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_anggota)
	{
		return $this->db->get_where($this->table, ['id_anggota' => $id_anggota])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_anggota)
	{
		$this->db->delete($this->table, ['id_anggota' => $id_anggota]);
	}
}
