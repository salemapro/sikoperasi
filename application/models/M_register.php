<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_register extends CI_Model
{
	// public function getALL()
	// {
	// 	return $this->db->get($this->_table)->result();
	// }

	// public function add_karyawan($data_karyawan)
	// {
	// 	$this->db->insert('karyawan', $data_karyawan);
	// }

	function check_nip($nip)
	{
		$this->db->where('nip', $nip);
		$query = $this->db->get('karyawan');

		// Return true if NIP exists, otherwise false
		return $query->num_rows() > 0;
	}

	public function save_user($new_user)
	{
		$this->db->insert('user', $new_user);
	}
}

/* End of file .php */
