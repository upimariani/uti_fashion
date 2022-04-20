<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_barang');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'Data Barang',
            'barang' => $this->m_barang->select(),
            'kategori' => $this->m_barang->select_kategori()
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vbarang', $data);
        $this->load->view('Admin/footer');
    }
    public function insert_barang()
    {
        $config['upload_path']          = './asset/foto-produk/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 3000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'tittle' => 'Data Barang',
                'barang' => $this->m_barang->select(),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Admin/head', $data);
            $this->load->view('Admin/header');
            $this->load->view('Admin/sidebar');
            $this->load->view('Admin/vbarang', $data);
            $this->load->view('Admin/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'id_barang' => $this->input->post('id_barang'),
                'id_kategori' => $this->input->post('kategori'),
                'nama_barang' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $upload_data['file_name'],
                'berat' => $this->input->post('berat')

            );
            $this->m_barang->insert($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan!!!');
            redirect('Admin/c_barang');
        }
    }
    public function hapus($id_barang)
    {
        $this->m_barang->delete($id_barang);
        redirect('Admin/c_barang');
    }
    public function update_barang($id_barang)
    {
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/foto-produk/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 3000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'tittle' => 'Data Barang',
                    'barang' => $this->m_barang->select()
                );
                $this->load->view('Admin/head', $data);
                $this->load->view('Admin/header');
                $this->load->view('Admin/sidebar');
                $this->load->view('Admin/vbarang', $data);
                $this->load->view('Admin/footer');
            } else {
                $produk = $this->m_barang->select();
                if ($produk->gambar !== "") {
                    unlink('./asset/foto-produk/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'id_kategori' => $this->input->post('kategori'),
                    'nama_barang' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name'],
                    'berat' => $this->input->post('berat')
                );
                $this->db->where('id_barang', $id_barang);
                $this->db->update('barang', $data);
                $this->session->set_flashdata('pesan', 'Data Barang Berhasil Diperbaharui!!!');
                redirect('Admin/c_barang');
            } //tanpa ganti gambar
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_barang' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'berat' => $this->input->post('berat')
            );
            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang', $data);
            $this->session->set_flashdata('pesan', 'Data Barang Berhasil Diperbaharui!!!');
            redirect('Admin/c_barang');
        }
        redirect('Admin/c_barang');
    }


    //size
    public function size($id_barang)
    {
        $data = array(
            'tittle' => 'Size Barang',
            'size' => $this->m_barang->select_size($id_barang),
            'id_barang' => $id_barang
        );
        $this->load->view('Admin/head', $data);
        $this->load->view('Admin/header');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vsize', $data);
        $this->load->view('Admin/footer');
    }
    public function insert()
    {
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'size' => $this->input->post('size'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        );
        $this->m_barang->insert_size($data);
        redirect('Admin/c_barang/size/' . $data['id_barang']);
    }
    public function hapus_size($id_size, $id_barang)
    {
        $this->m_barang->delete_size($id_size);
        redirect('Admin/c_barang/size/' . $id_barang);
    }

    //data kategori
    public function insert_kategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->db->insert('kategori_barang', $data);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Disimpan!!!');
        redirect('Admin/c_barang');
    }
    public function update_kategori($id_kategori)
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori_barang', $data);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Diperbaharui!!!');
        redirect('Admin/c_barang');
    }
    public function hapus_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori_barang');
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Dihapus!!!');
        redirect('Admin/c_barang');
    }
}
