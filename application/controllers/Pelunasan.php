<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelunasan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_pinjaman");
		$this->load->model("M_pembayaran");
		$this->load->model("M_karyawan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["pinjaman"] = $this->M_pinjaman->get_data_lunas_all();
			$this->load->view("admin/pelunasan/lihat_pelunasan", $data);
		} else if ($role == 'karyawan') {
			$data["pinjaman"] = $this->M_pinjaman->get_data_lunas_all_by_user($this->session->userdata('nip'));
			$this->load->view("karyawan/pelunasan/lihat_pelunasan", $data);
		} else if ($role == 'manajer') {
			$data["pinjaman"] = $this->M_pinjaman->get_data_lunas_all();
			$this->load->view("manajer/pelunasan/lihat_pelunasan", $data);
		}
	}

	public function get_data_pelunasan($id_pinjaman)
	{
		$data["no_pembayaran"] = $this->M_pembayaran->get_no_bayar($id_pinjaman);
		$pinjaman_data = $this->M_pinjaman->get_data_pelunasan_by_id($id_pinjaman);
		$data = array_merge($pinjaman_data, $data);

		echo json_encode($data);
	}

	// public function get_data_pelunasan($id_pinjaman)
	// {
	// 	$data["no_pembayaran"] = $this->M_pembayaran->get_no_bayar($id_pinjaman);
	// 	$data = $this->M_pinjaman->get_data_pelunasan_by_id($id_pinjaman);

	// 	echo json_encode($data);
	// }

	public function mengajukan_pelunasan($id)
	{
		$mengajukan = $this->M_pinjaman->mengajukan_pelunasan($id);
		if ($mengajukan) {
			$this->session->set_flashdata('success', 'Pengajuan Pelunasan Berhasil Diajukan.');
			redirect('pembayaran/index');
		} else {
			$this->session->set_flashdata('error', 'Pengajuan Pelunasan Gagal Diajukan.');
			redirect('pembayaran/index');
		}
	}

	public function approve_pelunasan()
	{
		$pembayaran = $this->M_pembayaran;

		$this->form_validation->set_rules('no_pembayaran', 'No Pembayaran', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('id_pinjaman', 'ID Pinjaman', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('cicilan_ke', 'Cicilan Ke', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('sisa_pembayaran', 'Sisa Pembayaran', 'required', ['required' => '%s tidak boleh kosong']);

		if ($this->form_validation->run() == TRUE) {
			$cicilan_ke = $this->input->post('sisa_cicilan');
			$jml_cicilan = $this->input->post('jml_cicilan');

			$sisa_cicilan = $jml_cicilan - $cicilan_ke;

			$data = array(
				'no_pembayaran' => $this->input->post('no_pembayaran'),
				'pinjaman_id' => $this->input->post('id_pinjaman'),
				'cicilan_ke' => $this->input->post('cicilan_ke'),
				'sisa_cicilan' => $sisa_cicilan,
				'jml_bayar' => $this->input->post('sisa_pembayaran'),
				'status_bayar' => 1
			);

			if ($pembayaran->save($data)) {
				$id = $this->input->post('id_pinjaman');
				$data = array(
					'catatan_peminjaman' => 'Lunas'
				);
				$this->M_pinjaman->update($data, $id);

				$this->session->set_flashdata('success', 'Pelunasan Berhasil');
				redirect('pembayaran');
			} else {
				$this->session->set_flashdata('error', 'Pelunasan Gagal');
				redirect('pembayaran');
			}
		} else {
			redirect('pembayaran');
		}
	}

	public function reject_pelunasan($id)
	{
		$data = array(
			'catatan_peminjaman' => 'Belum Lunas'
		);

		$rejected = $this->M_pinjaman->update($data, $id);

		if ($rejected) {
			$this->session->set_flashdata('success', 'Reject Pelunasan Berhasil Ditolak.');
			redirect('pembayaran');
		} else {
			$this->session->set_flashdata('error', 'Reject Pelunasan Gagal Ditolak.');
			redirect('pembayaran');
		}
	}
}
