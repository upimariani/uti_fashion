<?php
class m_katalog extends CI_Model
{
    public function select_list()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('size', 'barang.id_barang = size.id_barang', 'left');
        $this->db->group_by('size.id_barang');
        return $this->db->get()->result();
    }
    public function select_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('size', 'barang.id_barang = size.id_barang', 'left');
        $this->db->group_by('size.id_barang');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->result();
    }
    public function select_kritik()
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->join('pelanggan', 'testimoni.id_pelanggan = pelanggan.id_pelanggan', 'left');
        return $this->db->get()->result();
    }
    public function detail_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('size', 'barang.id_barang = size.id_barang', 'left');
        $this->db->group_by('size.id_barang');
        $this->db->where('barang.id_barang', $id_barang);
        $data['detail'] = $this->db->get()->row();
        $data['size'] = $this->db->get_where('size , barang', array('barang.id_barang' => $id_barang, 'size.id_barang' => $id_barang))->result();
        return $data;
    }
    public function kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori_barang');
        return $this->db->get()->result();
    }

    //insert transaksi
    public function insert_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    //insert detail order
    public function insert_detail($data)
    {
        $this->db->insert('detail_order', $data);
    }
    //status order pelanggan
    public function menunggu_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }
    public function pembayaran($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }
    //tampil detail order
    public function detail_order($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.id_transaksi = detail_order.id_transaksi', 'left');
        $this->db->join('size', 'detail_order.id_produk = size.id_size', 'left');
        $this->db->join('barang', 'barang.id_barang = size.id_barang', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        $data['detail'] = $this->db->get()->result();
        $data['transaksi'] = $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi))->row();
        return $data;
    }
    //batalkan pemesanan
    public function hapus_pesanan($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete(array(
            'transaksi', 'detail_order'
        ));
    }
    //account
    public function account()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }
    //alamat pengiriman
    public function alamat_pengiriman()
    {
        $this->db->select('*');
        $this->db->from('alamat_pengiriman');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }
    //chatting
    public function chat($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }
}
