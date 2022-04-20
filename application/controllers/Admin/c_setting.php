<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_setting');
    }

    public function index()
    {
        $this->form_validation->set_rules('alamat', 'Nama Toko', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tittle' => 'Setting Lokasi',
                'setting' => $this->m_setting->data_setting()
            );
            $this->load->view('Admin/head', $data);
            $this->load->view('Admin/header');
            $this->load->view('Admin/sidebar');
            $this->load->view('Admin/vsetting', $data);
            $this->load->view('Admin/footer');
        } else {
            $data = array(
                'id_setting' => 1,
                'lokasi' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat')
            );
            $this->m_setting->edit($data);
            $this->session->set_flashdata('pesan', 'Data Setingan Lokasi Berhasil Diupdate !!!');
            redirect('Admin/c_setting');
        }
    }
}
