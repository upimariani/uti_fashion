<?php
class m_order extends CI_Model
{
    //pesanan masuk dan detail pelanggan pesan
    public function select_order_masuk()
    {
        $order = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.status_order=', $order);
        return $this->db->get()->result();
    }
    //menunggu konfirmasi pembayaran
    public function select_konfirmasi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=1');
        return $this->db->get()->result();
    }

    //konfirmasi pesanan
    public function konfirmasi($id_transaksi)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }
    //pembayaran selesai
    public function pembayaran_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order > 0');
        return $this->db->get()->result();
    }

    //pesanan dikemas
    public function dikemas()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=2');
        return $this->db->get()->result();
    }

    //detail_pemesanan
    public function detail_pemesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.id_transaksi = detail_order.id_transaksi', 'left');
        $this->db->join('size', 'detail_order.id_produk = size.id_size', 'left');
        $this->db->join('barang', 'size.id_barang = barang.id_barang', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    public function detail_transaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    public function dikirim()
    {
        $dikirim = '3';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $dikirim);
        return $this->db->get()->result();
    }
    public function selesai()
    {
        $selesai = '4';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $selesai);
        return $this->db->get()->result();
    }
}
