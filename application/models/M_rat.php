<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rat extends CI_Model {

	public $table	= 'rat';

	public function get_data($id_penilaian = null, $id_koperasi = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id_penilaian != null){
			$this->db->where('id_penilaian', $id_penilaian);
		}

		if($id_koperasi != null){
			$this->db->where('id_koperasi', $id_koperasi);
		}
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_rat)
	{
		return $this->db->get_where($this->table, ['id_rat' => $id_rat])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_rat', $data['id_rat']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_rat)
	{
		$this->db->delete($this->table, ['id_rat' => $id_rat]);
	}
}
