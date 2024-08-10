<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_user");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["user"] = $this->M_user->getAll();
		$this->load->view("admin/user/lihat_user", $data);
	}

	public function add()
	{
		// $user = $this->M_user;

		$this->form_validation->set_rules('nip', 'NIP', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('role', 'Role', 'required', ['required' => '%s tidak boleh kosong']);

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$nip = $this->input->post('nip');
			$user = $this->M_user->get($username);
			$check_nip = $this->M_user->check_exist_nip($nip);

			if (empty($user)) {
				if (empty($check_nip)) {
					$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'nip' => $this->input->post('nip'),
						'nama' => $this->input->post('nama'),
						'role' => $this->input->post('role')
					);
					// var_dump($data);
					if ($this->M_user->save($data)) {
						$this->session->set_flashdata('success', 'User Berhasil Ditambahkan');
						redirect('user');
					} else {
						$this->session->set_flashdata('error', 'User Gagal Ditambahkan');
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('error', 'NIP Sudah Terdaftar Sebagai User');
					redirect('user/add');
				}
			} else {
				$this->session->set_flashdata('error', 'Username Sudah Ada');
				redirect('user/add');
			}
		} else {
			$this->load->view("admin/user/tambah_user");
		}
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('nip', 'NIP', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('role', 'Role', 'required', ['required' => '%s tidak boleh kosong']);

		if ($this->form_validation->run() == TRUE) {

			$data_update = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role')
			);
			// var_dump($data);
			if ($this->M_user->update($id, $data_update)) {
				$this->session->set_flashdata('success', 'User Berhasil Diupdate');
				redirect('user');
			} else {
				$this->session->set_flashdata('error', 'User Gagal Diupdate');
				redirect('user');
			}
		} else {
			$data['user'] = $this->M_user->getById($id);
			$this->load->view("admin/user/edit_user", $data);
		}
	}
}
