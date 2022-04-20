<?php
class m_dashboard extends CI_Model
{
    public function lap_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        return $this->db->get()->num_rows();
    }
    public function lap_order_masuk()
    {
        $status_order = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        return $this->db->get()->num_rows();
    }
    public function lap_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->num_rows();
    }
    public function lap_pemasukan()
    {
        $status_order = '4';
        $this->db->select('sum(total_bayar) as total');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        return $this->db->get()->row();
    }
    public function list_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('size', 'barang.id_barang = size.id_barang', 'left');
        return $this->db->get()->result();
    }
    public function chatting()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = chatting.id_pelanggan', 'left');
        $this->db->group_by('chatting.id_pelanggan');
        return $this->db->get()->result();
    }
    public function detail_chat($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }
}
