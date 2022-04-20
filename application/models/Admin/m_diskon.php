<?php
class m_diskon extends CI_Model
{
    public function barang()
    {
        $diskon = '0';
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('diskon', $diskon);
        return $this->db->get()->result();
    }
    public function select_diskon()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('size', 'barang.id_barang = size.id_barang', 'left');
        $this->db->group_by('barang.id_barang');
        $this->db->where('barang.diskon!=0');
        return $this->db->get()->result();
    }
    public function detail_diskon($id_barang)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('size', 'barang.id_barang = size.id_barang', 'left');
        $this->db->where('barang.id_barang', $id_barang);
        return $this->db->get()->result();
    }
}
