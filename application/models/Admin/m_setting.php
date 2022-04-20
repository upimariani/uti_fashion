<?php
class m_setting extends CI_Model
{
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('id_setting', 1);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_setting', $data['id_setting']);
        $this->db->update('setting', $data);
    }
    public function alamat_pengiriman()
    {
        $this->db->select('*');
        $this->db->from('alamat_pengiriman');
        return $this->db->get()->result();
    }
    public function data_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan=', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }
}
