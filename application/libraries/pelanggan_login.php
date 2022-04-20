<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pelanggan_login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Pelanggan/m_login_pelanggan');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login_pelanggan->login_pelanggan($username, $password);
        if ($cek) {
            $username = $cek->username;
            $id_pelanggan = $cek->id_pelanggan;
            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            redirect('Pelanggan/c_katalog/produk_list');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah!!!');
            redirect('Pelanggan/c_login_pelanggan');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login!!!');
            redirect('Pelanggan/c_login_pelanggan');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!!');
        redirect('Pelanggan/c_login_pelanggan');
    }
}
