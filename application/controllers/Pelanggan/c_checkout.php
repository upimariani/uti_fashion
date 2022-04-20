<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan/m_katalog');
        $this->load->model('Admin/m_setting');
    }
    public function index()
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));


        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $this->pelanggan_login->cek_halaman();
            $data = array(
                'alamat_pengiriman' => $this->m_setting->alamat_pengiriman(),
                'pelanggan' => $this->m_setting->data_pelanggan()
            );

            $this->load->view('Pelanggan/head', $data);
            $this->load->view('Pelanggan/navbar', $data);
            $this->load->view('Pelanggan/vcheckout', $data);
        } else {
            $data = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'atas_nama' => $this->input->post('atas_nama'),
                'bukti_bayar' => '0',
                'status_order' => '0',
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'expedisi' => $this->input->post('expedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'subtotal' => $this->input->post('subtotal'),
                'total_bayar' => $this->input->post('total_bayar')
            );
            $this->m_katalog->insert_transaksi($data);



            //mengurangi jumlah stok
            $tot_qty = 0;
            foreach ($this->cart->contents() as $key => $value) {
                $tot_qty = $value['qty_barang'] - $value['qty'];
                $data = array(
                    'stok' => $tot_qty
                );
                $this->db->where('id_size', $value['id']);
                $this->db->update('size', $data);
            }

            //simpan data ke detail order
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'id_produk' => $item['id'],
                    'jumlah' => $this->input->post('qty' . $i++)
                );
                $this->m_katalog->insert_detail($data_rinci);
                $this->cart->destroy();
            }
            redirect('Pelanggan/c_account');
        }
    }
}
