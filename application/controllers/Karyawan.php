<?php defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_karyawan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["karyawan"] = $this->M_karyawan->getAll();
			$this->load->view("admin/karyawan/lihat_karyawan", $data);
		} else if ($role == 'hrd') {
			$data["karyawan"] = $this->M_karyawan->getAll();
			$this->load->view("hrd/karyawan/lihat_karyawan", $data);
		}
	}

	public function add()
	{
		$karyawan = $this->M_karyawan;
		$validation = $this->form_validation;
		$validation->set_rules($karyawan->rules());

		if ($validation->run()) {
			$karyawan->save();
			$this->session->set_flashdata('success', 'Tambah Karyawan ' . $karyawan->nama . ' Berhasil Disimpan');
			redirect('karyawan/index');
		}

		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$this->load->view("admin/karyawan/tambah_karyawan");
		} else if ($role == 'hrd') {
			$this->load->view('hrd/karyawan/tambah_karyawan');
		}
		// $this->load->view("admin/karyawan/tambah_karyawan");
	}

	public function detail($id)
	{

		// $data['karyawan'] = $this->M_karyawan->getById($id);
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data['karyawan'] = $this->M_karyawan->getById($id);
			$this->load->view("admin/karyawan/detail_karyawan", $data);
		} else if ($role == 'hrd') {
			$data['karyawan'] = $this->M_karyawan->getById($id);
			$this->load->view('hrd/karyawan/detail_karyawan', $data);
		}

		// $this->load->view("admin/karyawan/detail_karyawan", $data);
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

		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data['karyawan'] = $this->M_karyawan->getById($id);
			$this->load->view('admin/karyawan/edit_karyawan', $data);
		} else if ($role == 'hrd') {
			$data['karyawan'] = $this->M_karyawan->getById($id);
			$this->load->view('hrd/karyawan/edit_karyawan', $data);
		}
	}

	public function delete($id)
	{
		if ($this->M_karyawan->delete($id)) {
			$this->session->set_flashdata('success', 'Data Karyawan Berhasil Dihapus.');
			redirect('karyawan/index');
		} else {
			$this->session->set_flashdata('error', 'Data Karyawan Gagal Dihapus.');
			redirect('karyawan/index');
		}
	}
}
