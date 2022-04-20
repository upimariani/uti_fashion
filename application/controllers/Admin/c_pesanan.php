<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_order');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'Pesanan Masuk',
            'order' => $this->m_order->select_order_masuk()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vpesanan_masuk', $data);
        $this->load->view('Admin/footer');
    }
    public function menunggu_konfirmasi()
    {
        $data = array(
            'tittle' => 'Menunggu Konfirmasi',
            'konfirmasi' => $this->m_order->select_konfirmasi()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vmenunggu_konfirmasi', $data);
        $this->load->view('Admin/footer');
    }
    public function pembayaran_selesai()
    {
        $data = array(
            'tittle' => 'Pembayaran Selesai',
            'selesai' => $this->m_order->pembayaran_selesai()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vpembayaran_selesai', $data);
        $this->load->view('Admin/footer');
    }
    public function status_order()
    {
        $data = array(
            'tittle' => 'Status Order',
            'dikemas' => $this->m_order->dikemas(),
            'dikirim' => $this->m_order->dikirim(),
            'selesai' => $this->m_order->selesai()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vstatus_order', $data);
        $this->load->view('Admin/footer');
    }

    //konfirmasi pesanan
    public function pesanan_dikonfirmasi($id_transaksi)
    {
        $this->m_order->konfirmasi($id_transaksi);
        redirect('Admin/c_pesanan/menunggu_konfirmasi');
    }

    //detail_pemesanan
    public function detail_pemesanan($id_transaksi)
    {
        $data = array(
            'tittle' => 'Detail Pemesanan',
            'detail' => $this->m_order->detail_pemesanan($id_transaksi),
            'data' => $this->m_order->detail_transaksi($id_transaksi)
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdetail_pemesanan', $data);
        $this->load->view('Admin/footer');
    }
    public function no_resi($id_transaksi)
    {
        $data = array(
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '3'
        );
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Update No Resi Berhasil!!!');
        redirect('Admin/c_pesanan/detail_pemesanan/' . $id_transaksi);
    }
}
