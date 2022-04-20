<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_admin');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'Data Akun Admin',
            'admin' => $this->m_admin->select()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vadmin', $data);
        $this->load->view('Admin/footer');
    }
    public function insert_admin()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->m_admin->insert($data);
        redirect('Admin/c_admin');
    }
    public function delete_admin($id_admin)
    {
        $this->m_admin->hapus($id_admin);
        redirect('Admin/c_admin');
    }
    public function update($id_admin)
    {
        $this->m_admin->edit($id_admin);
        redirect('Admin/c_admin');
    }
}
