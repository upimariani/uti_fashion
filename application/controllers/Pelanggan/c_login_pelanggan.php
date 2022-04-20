<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login_pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/m_login_pelanggan');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/navbar');
            $this->load->view('Pelanggan/vlogin');
            $this->load->view('Pelanggan/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($username, $password);
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|min_length[11]|max_length[13]', array(
            'required' => '%s Harus Diisi'

        ));
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/navbar');
            $this->load->view('Pelanggan/vregister');
            $this->load->view('Pelanggan/footer');
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'no_tlpn' => $this->input->post('no_telp'),
                'jenis_kel' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat')
            );
            $this->m_login_pelanggan->register($data);
            redirect('Pelanggan/c_login_pelanggan');
        }
    }
    public function logout_pelanggan()
    {
        $this->pelanggan_login->logout();
    }
}
