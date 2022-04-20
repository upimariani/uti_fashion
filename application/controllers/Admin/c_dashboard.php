<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_dashboard');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'Dashboard',
            'pelanggan' => $this->m_dashboard->lap_pelanggan(),
            'order' => $this->m_dashboard->lap_order_masuk(),
            'barang' =>  $this->m_dashboard->lap_barang(),
            'pemasukan' => $this->m_dashboard->lap_pemasukan(),
            'list_barang' => $this->m_dashboard->list_barang(),
            'chat' => $this->m_dashboard->chatting()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdashboard');
        $this->load->view('Admin/footer');
    }
    public function chatting($id_pelanggan)
    {
        $data = array(
            'tittle' => 'Chatting',
            'list_chat' => $this->m_dashboard->detail_chat($id_pelanggan)
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vchatting', $data);
        $this->load->view('Admin/footer');
    }
    public function send_chat()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'admin_send' => $this->input->post('admin_send'),
            'pelanggan_send' => '0'
        );
        $this->db->insert('chatting', $data);
        redirect('admin/c_dashboard/chatting/' . $data['id_pelanggan']);
    }
}
