<?php
class m_barang extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('barang', $data);
        $this->session->set_flashdata('pesan', 'Data Barang Berhasil di Simpan');
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->result();
    }
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori_barang');
        return $this->db->get()->result();
    }
    public function delete($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
        $this->session->set_flashdata('error', 'Data Barang Berhasil di Hapus');
    }


    //size
    public function select_size($id_barang)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->join('barang', 'size.id_barang = barang.id_barang', 'left');
        $this->db->where('barang.id_barang', $id_barang);
        return $this->db->get()->result();
    }
    public function insert_size($data)
    {
        $this->db->insert('size', $data);
    }
    public function delete_size($id_size)
    {
        $this->db->where('id_size', $id_size);
        $this->db->delete('size');
        $this->session->set_flashdata('error', 'Data Barang Berhasil di Hapus');
    }
}
