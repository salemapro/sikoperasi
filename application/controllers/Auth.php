<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_register');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function add()
	{
		$register = $this->M_register;

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => '%s tidak boleh kosong']);
		// $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('nip', 'NIP', 'required', ['required' => '%s tidak boleh kosong']);

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$nip = $this->input->post('nip');
			$user = $this->M_user->get($username);
			$check_nip = $this->M_register->check_nip($nip);

			if (empty($user)) {
				if ($check_nip) {
					$name = $this->M_user->get_name_employee($nip);
					$new_user = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'nip' => $this->input->post('nip'),
						'nama' => $name,
						'role' => "karyawan"
					);
					$register->save_user($new_user);
					$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
					<strong>' . $username . '</strong> Berhasil di Registrasi, Silahkan Login
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					redirect('Auth');
				} else {
					$this->session->set_flashdata('message', 'NIP tidak terdaftar');
					redirect('Auth/add');
				}
			} else {
				$this->session->set_flashdata('message', 'Username sudah terdaftar');
				redirect('Auth/add');
			}
		} else {
			$this->load->view("register");
		}
	}

	public function login()
	{
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = ($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
		$user = $this->M_user->get($username); // Panggil fungsi get yang ada di UserModel.php
		if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<strong>Username atau Password Salah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'); // Buat session flashdata
			redirect('Auth'); // Redirect ke halaman login
		} else {
			if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated' => true, // Buat session authenticated dengan value true
					'username' => $user->username,  // Buat session username
					'nama' => $user->nama, // Buat session authenticated
					'id_user' => $user->id_user,
					'nip' => $user->nip,
					'role' => $user->role
				);
				$role = $user->role;
				$this->session->set_userdata($session); // Buat session sesuai $session
				if ($role == 'admin') {
					redirect('Dashboard/admin');
				} else if ($role == 'karyawan') {
					redirect('Dashboard/karyawan');
				} else if ($role == 'manajer') {
					redirect('Dashboard/manajer');
				} else {
					redirect('Dashboard/hrd');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
				<strong>Password Salah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'); // Buat session flashdata
				redirect('Auth'); // Redirect ke halaman login
			}
		}
	}

	public  function  logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Controllername.php */
