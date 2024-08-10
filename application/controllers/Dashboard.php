<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_register');
        $this->load->library('form_validation');
    }

    public function admin()
    {
        $this->load->view('admin/dashboard');
    }

    public function karyawan()
    {
        $this->load->view('karyawan/dashboard');
    }

    public function manajer()
    {
        $this->load->view('manajer/dashboard');
    }

    public function hrd()
    {
        $this->load->view('hrd/dashboard');
    }
}
