<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @var array|object[] $pengajuan
 */

class Pengajuan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_pengajuan");
		$this->load->model("M_pinjaman");
		$this->load->model("M_karyawan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["pengajuan"] = $this->M_pengajuan->getAll();
			$this->load->view("admin/pengajuan/lihat_pengajuan", $data);
		} else if ($role == 'karyawan') {
			$data["pengajuan"] = $this->M_pengajuan->get_by_user($this->session->userdata('nip'));
			$this->load->view("karyawan/pengajuan/lihat_pengajuan", $data);
		}
	}

	public function add()
	{
		$data["user"] =  $this->M_karyawan->get_data_employee($this->session->userdata('nip'));
		$data["no_pengajuan"] =  $this->M_pengajuan->get_no_pengajuan();

		$pengajuan = $this->M_pengajuan;

		$this->form_validation->set_rules('no_pengajuan', 'No Pengajuan', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('nip', 'NIP', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('sisa_kontrak', 'Sisa Kontrak', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('bagian', 'Bagian', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('jml_pinjaman', 'Jumlah Pinjaman', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('jml_cicilan', 'Jumlah Cicilan', 'required', ['required' => '%s tidak boleh kosong']);

		if ($this->form_validation->run() == TRUE) {
			$check_pinjaman = $this->M_pinjaman->check_pinjaman_exist($this->session->userdata('nip'));
			if ($check_pinjaman) {
				$this->session->set_flashdata('error', 'Pinjaman Gagal Diajukan Anda Memiliki Pinjaman Yang Belum Lunas');
				redirect('pengajuan');
			} else {
				$data = array(
					'no_pengajuan' => $this->input->post('no_pengajuan'),
					'nip' => $this->input->post('nip'),
					'sisa_kontrak' => $this->input->post('sisa_kontrak'),
					'nama' => $this->input->post('nama'),
					'bagian' => $this->input->post('bagian'),
					'besar_pinjam' => $this->input->post('jml_pinjaman'),
					'jml_cicilan' => $this->input->post('jml_cicilan'),
					'status' => "waiting"
				);
				$jml_cicilan = $this->input->post('jml_cicilan');
				$sisa_kontrak = $this->input->post('sisa_kontrak');

				if ($jml_cicilan >= $sisa_kontrak) {
					$this->session->set_flashdata('error', 'Pinjaman Gagal Diajukan, Jumlah Cicilan Melebihi Sisa Kontrak');
					redirect('pengajuan/add');
				} else {
					if ($pengajuan->save($data)) {
						$this->session->set_flashdata('success', 'Pinjaman Berhasil Diajukan');
						redirect('pengajuan');
					} else {
						$this->session->set_flashdata('error', 'Pinjaman Gagal Diajukan');
						redirect('pengajuan');
					}
				}
			}
		} else {
			$this->load->view("karyawan/pengajuan/tambah_pengajuan", $data);
		}
	}

	public function detail($id)
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			$data["pengajuan"] = $this->M_pengajuan->get_all_detail($id);
			$this->load->view("admin/pengajuan/detail_pengajuan", $data);
		} else if ($role == 'karyawan') {
			$data["pengajuan"] = $this->M_pengajuan->get_detail_by_user($this->session->userdata('nip'), $id);
			$this->load->view("karyawan/pengajuan/detail_pengajuan", $data);
		}
	}

	public function approve($id_pengajuan)
	{
		$this->form_validation->set_rules('jml_pinjam_disetujui', 'Jumlah Pinjaman Yang Disetujui', 'required');

		if ($this->form_validation->run() == TRUE) {
			$jml_pinjam_disetujui = $this->input->post('jml_pinjam_disetujui');
			$jml_cicilan = $this->input->post('jml_cicilan');
			// $besar_cicilan = $jml_pinjam_disetujui / $jml_cicilan;

			if ($jml_cicilan && $jml_cicilan > 0) {
				$besar_cicilan = $jml_pinjam_disetujui / $jml_cicilan;
			} else {
				$this->session->set_flashdata('error', 'Jumlah cicilan tidak valid.');
				redirect('pengajuan/index');
				return;
			}

			$data = array(
				'status' => 'approved',
				'jml_pinjam_disetujui' => $jml_pinjam_disetujui,
				'besar_cicilan' => $besar_cicilan,
				'tgl_acc' => date('Y-m-d')
			);

			$approved = $this->M_pengajuan->approved($id_pengajuan, $data);

			if ($approved) {
				$no_pinjaman = $this->M_pinjaman->get_no_pinjam();
				$pengajuan = $this->db->get_where('pengajuan', array('id_pengajuan' => $id_pengajuan, 'status' => 'approved'))->result();
				foreach ($pengajuan as $pinjam) {
					// $this->M_notif->assign_notification_to_user($admin->id_user, $notification_id);
					$tgl_acc = $pinjam->tgl_acc;
					$cicilan = $pinjam->jml_cicilan;

					$date = new DateTime($tgl_acc);
					$date->add(new DateInterval('P' . $cicilan . 'M'));
					$tenor = $date->format('Y-m-d');

					$data_pinjam = array(
						'no_pinjaman' => $no_pinjaman,
						'nip_peminjam' => $pinjam->nip,
						'nama_peminjam' => $pinjam->nama,
						'jml_pinjaman' => $pinjam->jml_pinjam_disetujui,
						'tgl_pinjaman' => $pinjam->tgl_acc,
						'tenor' => $tenor,
						'jml_cicilan_pinjam' => $pinjam->jml_cicilan,
						'besar_cicilan_pinjam' => $pinjam->besar_cicilan,
						'catatan_peminjaman' => 'Belum Lunas',
					);
				}

				if ($this->M_pinjaman->save($data_pinjam)) {
					$this->session->set_flashdata('success', 'Pengajuan berhasil diapprove.');
					redirect('pengajuan/index');
				} else {
					$this->session->set_flashdata('error', 'Pengajuan gagal diapprove.');
					redirect('pengajuan/index');
				}
			} else {
				$this->session->set_flashdata('error', 'Pengajuan gagal diapprove.');
				redirect('pengajuan/index');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pengajuan/index');
		}
	}

	public function rejected($id)
	{
		$data = array(
			'status' => 'rejected',
			'jml_pinjam_disetujui' => '-',
			'besar_cicilan' => '-',
			'tgl_acc' => '-'
		);

		$rejected = $this->M_pengajuan->rejected($id, $data);

		if ($rejected) {
			$this->session->set_flashdata('success', 'Pengajuan berhasil ditolak.');
			redirect('pengajuan/index');
		} else {
			$this->session->set_flashdata('error', 'Pengajuan gagal ditolak.');
			redirect('pengajuan/index');
		}
	}
}
