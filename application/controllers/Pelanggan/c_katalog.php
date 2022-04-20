<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/m_katalog');
        $this->load->model('Admin/m_diskon');
    }
    public function produk_list()
    {
        $data = array(
            'list' => $this->m_katalog->select_list(),
            'kategori' => $this->m_katalog->kategori(),
            'testimoni' => $this->m_katalog->select_kritik(),
            'diskon' => $this->m_diskon->select_diskon()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/navbar');
        $this->load->view('Pelanggan/vproduk_list', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function kategori($id_kategori)
    {
        $data = array(
            'list' => $this->m_katalog->select_kategori($id_kategori),
            'kategori' => $this->m_katalog->kategori(),
            'testimoni' => $this->m_katalog->select_kritik(),
            'diskon' => $this->m_diskon->select_diskon()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/navbar');
        $this->load->view('Pelanggan/vproduk_kategori', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function detail_produk($id_barang)
    {
        $data = array(
            'detail' => $this->m_katalog->detail_barang($id_barang)
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/navbar');
        $this->load->view('Pelanggan/vdetail_produk', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function chat($id_pelanggan)
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'chat' => $this->m_katalog->chat($id_pelanggan)
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/navbar');
        $this->load->view('Pelanggan/vchatting', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function send_pesan($id_pelanggan)
    {
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'pelanggan_send' => $this->input->post('pelanggan_send'),
            'admin_send' => '0'
        );
        $this->db->insert('chatting', $data);
        redirect('pelanggan/c_katalog/chat/' . $id_pelanggan);
    }
    public function kritik()
    {
        $data = array(
            'isi' => $this->input->post('kritik'),
            'id_pelanggan' => $this->session->userdata('id_pelanggan')

        );
        $this->db->insert('testimoni', $data);
        redirect('pelanggan/c_katalog/produk_list');
    }
}
