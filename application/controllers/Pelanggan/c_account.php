<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/m_katalog');
    }
    public function index()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'bayar' => $this->m_katalog->menunggu_pembayaran()

        );
        $this->load->view('Pelanggan/vaccount', $data);
    }
    public function upload_bayar($id_transaksi)
    {
        $config['upload_path']          = './asset/bukti_pembayaran/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_bayar')) {
            $data = array(
                'bayar' => $this->m_katalog->pembayaran($id_transaksi),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/navbar');
            $this->load->view('Pelanggan/vbayar_pesanan', $data);
            $this->load->view('Pelanggan/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'status_order' => '1',
                'bukti_bayar' => $upload_data['file_name']
            );
            $this->db->where('transaksi.id_transaksi', $id_transaksi);
            $this->db->update('transaksi', $data);
            $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Ditambahkan!!! Silahkan Menunggu Konfirmasi');
            redirect('Pelanggan/c_account');
        }
    }
    public function detail_order($id_transaksi)
    {
        $data = array(
            'detail' => $this->m_katalog->detail_order($id_transaksi)
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/navbar');
        $this->load->view('Pelanggan/vdetail_order', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function batalkan_pemesanan($id_transaksi)
    {
        $data['hapus'] = $this->m_katalog->hapus_pesanan($id_transaksi);
        $this->session->set_flashdata('pesan', 'Pemesanan Dibatalkan!!!');
        redirect('Pelanggan/c_account');
    }
    public function pesanan_diterima($id_transaksi)
    {
        $data = array(
            'status_order' => '4'
        );
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Pesanan Sudah Diterima!!!');
        redirect('pelanggan/c_account');
    }
    public function profil()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'alamat' => $this->m_katalog->alamat_pengiriman(),
            'account' => $this->m_katalog->account()
        );
        $this->load->view('Pelanggan/head', $data);
        $this->load->view('Pelanggan/navbar', $data);
        $this->load->view('Pelanggan/vprofil', $data);
    }
    public function update_profil($id_pelanggan)
    {
        $data = array(
            'nama_pelanggan' => $this->input->post('nama'),
            'no_tlpn' => $this->input->post('no_tlp'),
            'jenis_kel' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $data);
        //$this->m_katalog->update_profil($data['id_pelanggan'], $data);
        redirect('Pelanggan/c_account/profil');
    }
    public function alamat_pengiriman()
    {
        $data = array(
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'kode_kota' => $this->input->post('id_kota')

        );
        $this->db->insert('alamat_pengiriman', $data);
        redirect('pelanggan/c_account/profil');
    }
    public function hapus_alamat($id_alamat_pengiriman)
    {
        $this->db->where('id_alamat_pengiriman', $id_alamat_pengiriman);
        $this->db->delete('alamat_pengiriman');
        redirect('pelanggan/c_account/profil');
    }
}
