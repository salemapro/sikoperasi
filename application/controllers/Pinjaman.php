<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_pinjaman");
		$this->load->model("M_karyawan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["pinjaman"] = $this->M_pinjaman->getAll();
			$this->load->view("admin/pinjaman/lihat_pinjaman", $data);
			// } else if ($role == 'karyawan') {
			// 	$data["pinjaman"] = $this->M_pinjaman->get_by_user($this->session->userdata('nip'));
			// 	$this->load->view("karyawan/pengajuan/lihat_pengajuan", $data);
		} else if ($role == 'manajer') {
			$data["pinjaman"] = $this->M_pinjaman->getAll();
			$this->load->view("manajer/pinjaman/lihat_pinjaman", $data);
		}
	}

	public function detail($id)
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["pinjaman"] = $this->M_pinjaman->get_all_detail($id);
			$this->load->view("admin/pinjaman/detail_pinjaman", $data);
			// } else if ($role == 'karyawan') {
			// 	$data["pinjaman"] = $this->M_pinjaman->get_by_user($this->session->userdata('nip'));
			// 	$this->load->view("karyawan/pinjaman/detail_pinjaman", $data);
		} else if ($role == 'manajer') {
			$data["pinjaman"] = $this->M_pinjaman->get_all_detail($id);
			$this->load->view("manajer/pinjaman/detail_pinjaman", $data);
		}
	}

	public function edit($id)
	{

		$karyawan = $this->M_karyawan; //object model
		$validation = $this->form_validation; //object validasi
		$validation->set_rules($karyawan->rules()); //terapkan rules di M_karyawan.php

		if ($validation->run()) { //lakukan validasi form
			$karyawan->update($id); // update data
			$this->session->set_flashdata('success', 'Data karyawan ' . $karyawan->getById($id)->nama . ' Berhasil Diubah');
			redirect('karyawan/index');
		}
		$data['karyawan'] = $this->M_karyawan->getById($id);
		$this->load->view('admin/karyawan/edit_karyawan', $data);
	}

	public function approve($id_pengajuan)
	{
		$this->form_validation->set_rules('jml_pinjaman_disetujui', 'Jumlah Pinjaman Yang Disetujui', 'required');

		if ($this->form_validation->run() == TRUE) {
			$jml_pinjaman_disetujui = $this->input->post('jml_pinjaman_disetujui');
			$jml_cicilan = $this->input->post('jml_cicilan');
			// $besar_cicilan = $jml_pinjaman_disetujui / $jml_cicilan;

			if ($jml_cicilan && $jml_cicilan > 0) {
				$besar_cicilan = $jml_pinjaman_disetujui / $jml_cicilan;
			} else {
				// Handle the case where jml_cicilan is zero or invalid
				$this->session->set_flashdata('error', 'Jumlah cicilan tidak valid.');
				redirect('pengajuan/index');
				return;
			}

			$data = array(
				'status' => 'approved',
				'jml_pinjaman_disetujui' => $jml_pinjaman_disetujui,
				'besar_cicilan' => $besar_cicilan,
				'tgl_acc' => date('Y-m-d')
			);

			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->update('pengajuan', $data);

			// Set a success message and redirect
			$this->session->set_flashdata('success', 'Pengajuan berhasil disetujui.');
			redirect('pengajuan/index');
		} else {
			// If validation fails, reload the form with errors
			$this->session->set_flashdata('error', validation_errors());
			redirect('pengajuan/index');
		}
	}
}
