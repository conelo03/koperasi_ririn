<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_simpanan extends CI_Model {

	public $table	= 'simpanan_wajib';

	public function get_data($id_anggota)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_anggota', $id_anggota);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_simpanan)
	{
		return $this->db->get_where($this->table, ['id_simpanan' => $id_simpanan])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_simpanan', $data['id_simpanan']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_simpanan)
	{
		$this->db->delete($this->table, ['id_simpanan' => $id_simpanan]);
	}
}
