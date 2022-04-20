<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->admin_login->login($username, $password);
        }
        $data = array(
            'tittle' => 'Login Admin'
        );
        $this->load->view('Admin/head_login', $data);
        $this->load->view('Admin/vlogin');
        $this->load->view('Admin/footer_login');
    }
    public function logout_admin()
    {
        $this->admin_login->logout();
    }
}
