<?php
class m_laporan extends CI_Model
{
    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'barang.id_kategori = kategori_barang.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function order_selesai()
    {
        $stat = '4';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $stat);
        return $this->db->get()->result();
    }
    public function transaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.id_transaksi = detail_order.id_transaksi', 'left');
        $this->db->join('size', 'detail_order.id_produk = size.id_size', 'left');
        $this->db->join('barang', 'size.id_barang = barang.id_barang', 'left');


        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        $data['detail'] = $this->db->get()->result();
        $data['transaksi'] = $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi))->result();
        return $data;
    }
}
