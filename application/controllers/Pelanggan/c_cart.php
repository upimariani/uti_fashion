<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_cart extends CI_Controller
{
    public function index()
    {
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/navbar');
        $this->load->view('Pelanggan/vcart');
        $this->load->view('Pelanggan/footer');
    }
    public function add()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'netto' => $this->input->post('netto'),
            'picture' => $this->input->post('picture'),
            'size' => $this->input->post('size'),
            'qty_barang' => $this->input->post('qty_barang')
        );
        $this->cart->insert($data);
        redirect('Pelanggan/c_katalog/produk_list');
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Pelanggan/c_cart');
    }
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $value) {
            $data = array(
                'rowid' => $value['rowid'],
                'qty' => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('pelanggan/c_cart');
    }
}
