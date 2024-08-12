<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
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
			$data["pinjaman"] = $this->M_pinjaman->getAll();
			$this->load->view("admin/pembayaran/lihat_pembayaran", $data);
		} else if ($role == 'karyawan') {
			$data["pinjaman"] = $this->M_pinjaman->get_by_user($this->session->userdata('nip'));
			$this->load->view("karyawan/pembayaran/lihat_pembayaran", $data);
		} else if ($role == 'manajer') {
			$data["pinjaman"] = $this->M_pinjaman->getAll();
			$this->load->view("manajer/pembayaran/lihat_pembayaran", $data);
		} else if ($role == 'hrd') {
			$data["pinjaman"] = $this->M_pinjaman->getAll();
			$this->load->view("hrd/pembayaran/lihat_pembayaran", $data);
		}
	}

	public function detail($id)
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["id"] = $id;
			$data["pembayaran"] = $this->M_pembayaran->get_all_detail($id);
			$this->load->view("admin/pembayaran/detail_pembayaran", $data);
		} else if ($role == 'karyawan') {
			$data["pembayaran"] = $this->M_pembayaran->get_detail_by_user($id);
			$this->load->view("karyawan/pembayaran/detail_pembayaran", $data);
		} else if ($role == 'manajer') {
			$data["id"] = $id;
			$data["pembayaran"] = $this->M_pembayaran->get_all_detail($id);
			$this->load->view("manajer/pembayaran/detail_pembayaran", $data);
		} else if ($role == 'hrd') {
			$data["id"] = $id;
			$data["pembayaran"] = $this->M_pembayaran->get_all_detail($id);
			$this->load->view("hrd/pembayaran/detail_pembayaran", $data);
		}
	}

	public function add($id)
	{

		$data["no_pembayaran"] = $this->M_pembayaran->get_no_bayar($id);
		$data["pembayaran"] = $this->M_pembayaran->getById($id);
		$this->load->view("admin/pembayaran/tambah_pembayaran", $data);
	}

	function add_pembayaran()
	{
		$pembayaran = $this->M_pembayaran;

		$this->form_validation->set_rules('no_pembayaran', 'No Pembayaran', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('id_pinjaman', 'ID Pinjaman', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('cicilan_ke', 'Sisa Kontrak', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('jml_bayar', 'jml_bayar', 'required', ['required' => '%s tidak boleh kosong']);

		if ($this->form_validation->run() == TRUE) {
			$cicilan_ke = $this->input->post('cicilan_ke');
			$jml_cicilan = $this->input->post('jml_cicilan');

			$sisa_cicilan = $jml_cicilan - $cicilan_ke;

			$data = array(
				'no_pembayaran' => $this->input->post('no_pembayaran'),
				'pinjaman_id' => $this->input->post('id_pinjaman'),
				'cicilan_ke' => $this->input->post('cicilan_ke'),
				'sisa_cicilan' => $sisa_cicilan,
				'jml_bayar' => $this->input->post('jml_bayar'),
				'status_bayar' => 1
			);

			if ($pembayaran->save($data)) {
				$id = $this->input->post('id_pinjaman');
				if ($cicilan_ke == $jml_cicilan) {
					$data = array(
						'catatan_peminjaman' => 'Lunas'
					);
					$this->M_pinjaman->update($data, $id);
				}
				$this->session->set_flashdata('success', 'Pembayaran Berhasil');
				redirect('pembayaran');
			} else {
				$this->session->set_flashdata('error', 'Pembayaran Gagal');
				redirect('pembayaran');
			}
		} else {
			redirect('pembayaran/add');
		}
	}
}
