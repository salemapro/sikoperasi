<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
	public function getALL()
	{
		return $this->db->get('pembayaran')->result();
	}

	public function get_all_detail($id)
	{
		$this->db->join('pembayaran', 'pinjaman.id_pinjaman = pembayaran.pinjaman_id', 'left');
		$this->db->where('id_pinjaman', $id);
		return $this->db->get('pinjaman')->result();
	}

	public function getById($id)
	{
		$this->db->join('pembayaran', 'pinjaman.id_pinjaman = pembayaran.pinjaman_id', 'left');
		$this->db->where('pinjaman.id_pinjaman', $id);
		$this->db->order_by('pembayaran.cicilan_ke', 'DESC'); // Sort by cicilan_ke in descending order
		$this->db->limit(1); // Get the latest record
		return $this->db->get('pinjaman')->result();
	}

	public function get_detail_by_user($id)
	{
		$this->db->join('pembayaran', 'pinjaman.id_pinjaman = pembayaran.pinjaman_id', 'left');
		$this->db->where('id_pinjaman', $id);
		return $this->db->get('pinjaman')->result();
	}

	// public function get_by_user($nip, $id)
	// {
	// 	$this->db->join('pembayaran', 'pinjaman.id_pinjaman = pembayaran.pinjaman_id', 'left');
	// 	$this->db->where('pinjaman.nip_peminjam', $nip);
	// 	$this->db->where('id_pinjaman', $id);
	// 	return $this->db->get('pinjaman')->result();
	// }

	function get_no_bayar($id)
	{
		// Retrieve the current no_pinjaman based on id
		$pinjam_result = $this->db->query("SELECT no_pinjaman FROM pinjaman WHERE id_pinjaman = $id");

		if ($pinjam_result->num_rows() > 0) {
			$pinjam = $pinjam_result->row()->no_pinjaman;
		} else {
			$pinjam = "UNKNOWN";
		}

		// Query to get the highest number suffix for the current no_pinjaman
		$query = $this->db->query("
		SELECT MAX(CAST(SUBSTRING(no_pembayaran, LENGTH('B-" . $pinjam . "') + 1) AS UNSIGNED)) AS max_suffix
		FROM pembayaran
		WHERE no_pembayaran LIKE 'B-" . $pinjam . "%'");

		$kd = "001"; // Default if no records are found
		if ($query->num_rows() > 0) {
			$result = $query->row();
			$max_suffix = $result->max_suffix;

			if ($max_suffix !== null) {
				$next_suffix = $max_suffix + 1;
				$kd = sprintf("%03d", $next_suffix);
			}
		}

		return "B-" . $pinjam . $kd;

		// // $pinjam = $this->db->query("SELECT no_pinjaman FROM pinjaman WHERE id_pinjaman = $id");
		// $pinjam_result = $this->db->query("SELECT no_pinjaman FROM pinjaman WHERE id_pinjaman = $id");

		// if ($pinjam_result->num_rows() > 0) {
		// 	$pinjam = $pinjam_result->row()->no_pinjaman;
		// } else {
		// 	$pinjam = "UNKNOWN";
		// }

		// $q = $this->db->query("SELECT MAX(RIGHT(no_pembayaran,3)) AS no_pembayaran FROM pembayaran");
		// $kd = "";
		// if ($q->num_rows() > 0) {
		// 	foreach ($q->result() as $k) {
		// 		$tmp = ((int) $k->no_pembayaran) + 1;
		// 		$kd = sprintf("%03s", $tmp);
		// 	}
		// } else {
		// 	$kd = "001";
		// }
		// // date_default_timezone_set('Asia/Jakarta');
		// // return "PGJ" . date('dmy') . $kd;
		// return "B-" . $pinjam . $kd;
	}

	public function save($data)
	{
		return $this->db->insert('pembayaran', $data);
	}
}

/* End of file .php */
