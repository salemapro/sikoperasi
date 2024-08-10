<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pengajuan extends CI_Model
{
	public function getALL()
	{
		return $this->db->get('pengajuan')->result();
	}

	public function get_all_detail($id)
	{
		$this->db->where('id_pengajuan', $id);
		return $this->db->get('pengajuan')->result();
	}

	public function get_detail_by_user($nip, $id)
	{
		$this->db->where('nip', $nip);
		$this->db->where('id_pengajuan', $id);
		return $this->db->get('pengajuan')->result();
	}

	public function get_by_user($nip)
	{
		$this->db->where('nip', $nip);
		return $this->db->get('pengajuan')->result();
	}

	function get_no_pengajuan()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(no_pengajuan,4)) AS no_pengajuan FROM pengajuan");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int) $k->no_pengajuan) + 1;
				$kd = sprintf("%04s", $tmp);
			}
		} else {
			$kd = "0001";
		}
		// date_default_timezone_set('Asia/Jakarta');
		// return "PGJ" . date('dmy') . $kd;
		return "PGJ" . $kd;
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_karyawan" => $id])->row();
	}

	public function save($pengajuan)
	{
		return $this->db->insert('pengajuan', $pengajuan);
	}

	function approved($id_pengajuan, $data)
	{
		$this->db->where('id_pengajuan', $id_pengajuan);
		return $this->db->update('pengajuan', $data);
	}

	function rejected($id, $data)
	{
		$this->db->where('id_pengajuan', $id);
		return $this->db->update('pengajuan', $data);
	}
}

/* End of file .php */
