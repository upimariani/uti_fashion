<?php
defined('BASEPATH') or exit('No direct script access allowed');
class admin_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Admin/m_login');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login->login_admin($username, $password);
        if ($cek) {
            $nama = $cek->nama;
            $username = $cek->username;
            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama', $nama);
            redirect('Admin/c_dashboard');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('Admin/c_login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('Admin/c_login');
    }
}
