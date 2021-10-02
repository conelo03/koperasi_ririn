<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

	public $table	= 'penilaian';

	public function get_data($where = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($where != null){
			$this->db->where('status', $where);
		}
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_penilaian)
	{
		return $this->db->get_where($this->table, ['id_penilaian' => $id_penilaian])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_penilaian', $data['id_penilaian']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_penilaian)
	{
		$this->db->delete($this->table, ['id_penilaian' => $id_penilaian]);
	}
}
