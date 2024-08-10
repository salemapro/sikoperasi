<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get($username)
	{
		$this->db->where('username', $username);
		$result = $this->db->get('user')->row();
		return $result;
	}

	public function getALL()
	{
		return $this->db->get('user')->result();
	}

	function get_name_employee($nip)
	{
		$this->db->where('nip', $nip);
		$query = $this->db->get('karyawan');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				return $row->nama;
			}
		}
		return null;
	}

	function check_exist_nip($nip)
	{
		$this->db->where('nip', $nip);
		$query = $this->db->get('user');

		// Return true if NIP exists, otherwise false
		return $query->num_rows() > 0;
	}

	public function getById($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}

	function save($data)
	{
		return $this->db->insert('user', $data);
	}

	function update($id, $data)
	{
		$this->db->where('id_user', $id);
		return $this->db->update('user', $data);
	}
}

/* End of file .php */
