<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_diskon');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'Diskon',
            'produk' => $this->m_diskon->select_diskon(),
            'barang' => $this->m_diskon->barang()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdiskon', $data);
        $this->load->view('Admin/footer');
    }
    public function detail_diskon($id_barang)
    {
        $data = array(
            'tittle' => 'Detail Diskon',
            'detail' => $this->m_diskon->detail_diskon($id_barang)
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdetail_diskon', $data);
        $this->load->view('Admin/footer');
    }
    public function update_diskon()
    {
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'diskon' => $this->input->post('besar_diskon')
        );
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Ditambahkan!!!');
        redirect('Admin/c_diskon');
    }
    public function perbaharui($id_barang)
    {
        $data = array(
            'diskon' => $this->input->post('besar_diskon')
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Diperbaharui!!!');
        redirect('Admin/c_diskon');
    }
    public function hapus($id_barang)
    {
        $data = array(
            'diskon' => '0'
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Diskon!!!');
        redirect('Admin/c_diskon');
    }
}
