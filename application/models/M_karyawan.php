<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
	private $_table = "karyawan";

	public $id_karyawan;
	public $nip;
	public $nama;
	public $jenis_kelamin;
	public $alamat;
	public $bagian;
	public $tgl_masuk;
	public $sisa_kontrak;



	public function rules()
	{
		return [
			[
				'field' => 'nip',
				'label' => 'nip',
				'rules' => 'required'
			],

			[
				'field' => 'nama',
				'label' => 'nama',
				'rules' => 'required'
			],

			[
				'field' => 'jenis_kelamin',
				'label' => 'jenis_kelamin',
				'rules' => 'required'
			],

			[
				'field' => 'alamat',
				'label' => 'alamat',
				'rules' => 'required'
			],

			[
				'field' => 'bagian',
				'label' => 'bagian',
				'rules' => 'required'
			],

			[
				'field' => 'tgl_masuk',
				'label' => 'tgl_masuk',
				'rules' => 'required'
			],

			[
				'field' => 'sisa_kontrak',
				'label' => 'sisa_kontrak',
				'rules' => 'required'
			]
		];
	}

	public function getALL()
	{
		return $this->db->get('karyawan')->result();
	}

	function get_data_employee($nip)
	{
		return $this->db->get_where($this->_table, ["nip" => $nip])->row();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_karyawan" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		// $this->id_anggota = uniqid();
		$this->nip = $post["nip"];
		$this->nama = $post["nama"];
		$this->jenis_kelamin = $post["jenis_kelamin"];
		$this->alamat = $post["alamat"];
		$this->bagian = $post["bagian"];
		$this->tgl_masuk = $post["tgl_masuk"];
		$this->sisa_kontrak = $post["sisa_kontrak"];
		$this->db->insert($this->_table, $this);
	}

	public function update($id)
	{
		$data = array(
			"nip" => $this->input->post('nip'),
			"nama" => $this->input->post('nama'),
			"jenis_kelamin" => $this->input->post('jenis_kelamin'),
			"alamat" => $this->input->post('alamat'),
			"bagian" => $this->input->post('bagian'),
			"tgl_masuk" => $this->input->post('tgl_masuk'),
			"sisa_kontrak" => $this->input->post('sisa_kontrak')
		);

		$this->db->where('id_karyawan', $id);
		$this->db->update('karyawan', $data); // Untuk mengeksekusi perintah update data
	}
}

/* End of file .php */
