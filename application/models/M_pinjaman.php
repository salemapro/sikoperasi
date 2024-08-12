<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pinjaman extends CI_Model
{
	public function getALL()
	{
		return $this->db->get('pinjaman')->result();
	}

	public function get_data_by_id($id)
	{
		$this->db->from('pembayaran', 'pinjaman.id_pinjaman = pembayaran.pinjaman_id');
		$this->db->where('id_pinjaman', $id);
		return $this->db->get('pinjaman')->row();
	}

	public function get_data_lunas_all()
	{
		$this->db->where('catatan_peminjaman', 'Lunas');
		return $this->db->get('pinjaman')->result();
	}

	public function get_data_lunas_all_by_user($nip)
	{
		$this->db->where('catatan_peminjaman', 'Lunas');
		$this->db->where('nip_peminjam', $nip);
		return $this->db->get('pinjaman')->result();
	}

	public function get_all_detail($id)
	{
		$this->db->where('id_pinjaman', $id);
		return $this->db->get('pinjaman')->result();
	}

	public function get_detail_by_user($nip, $id)
	{
		$this->db->where('id_pinjaman', $id);
		$this->db->where('nip_peminjam', $nip);
		return $this->db->get('pinjaman')->result();
	}

	public function get_by_user($nip)
	{
		$this->db->where('nip_peminjam', $nip);
		return $this->db->get('pinjaman')->result();
	}

	public function check_pinjaman_exist($nip)
	{
		$this->db->where('nip_peminjam', $nip);
		$this->db->where_in('catatan_peminjaman', ['Belum Lunas', 'Mengajukan Pelunasan']);
		return $this->db->get('pinjaman')->result();
	}

	function get_no_pinjam()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(no_pinjaman,4)) AS no_pinjaman FROM pinjaman");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int) $k->no_pinjaman) + 1;
				$kd = sprintf("%04s", $tmp);
			}
		} else {
			$kd = "0001";
		}
		// date_default_timezone_set('Asia/Jakarta');
		// return "PGJ" . date('dmy') . $kd;
		return "PNJ" . $kd;
	}

	function get_id_pinjaman_by_nip($nip)
	{
		$this->db->where('nip_peminjam', $nip);
		$this->db->where('catatan_peminjaman', 'Belum Lunas');
		$query = $this->db->get('pinjaman');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				return $row->no_pinjaman;
			}
		}
		return null;
	}

	public function get_data_pelunasan_by_id($id_pinjaman)
	{
		$this->db->select('pinjaman.no_pinjaman, pinjaman.jml_pinjaman, pinjaman.besar_cicilan_pinjam, pinjaman.jml_cicilan_pinjam, pembayaran.cicilan_ke, pembayaran.sisa_cicilan');
		$this->db->join('pembayaran', 'pinjaman.id_pinjaman = pembayaran.pinjaman_id', 'left');
		$this->db->where('id_pinjaman', $id_pinjaman);
		$this->db->order_by('pembayaran.sisa_cicilan', 'DESC'); // Sort by cicilan_ke in descending order
		$this->db->limit(1);
		$this->db->from('pinjaman');
		$query = $this->db->get();

		return $query->row_array();
	}


	public function save($data_pinjam)
	{
		return $this->db->insert('pinjaman', $data_pinjam);
	}

	public function update($data, $id)
	{
		$this->db->where('id_pinjaman', $id);
		$this->db->update('pinjaman', $data);
	}

	public function mengajukan_pelunasan($id)
	{
		$data = ['catatan_peminjaman' => 'Mengajukan Pelunasan'];
		$this->db->where('id_pinjaman', $id);
		return $this->db->update('pinjaman', $data);
	}
}

/* End of file .php */
