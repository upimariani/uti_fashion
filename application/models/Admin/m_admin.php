<?php
class m_admin extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert('admin', $data);
        $this->session->set_flashdata('pesan', 'Data Akun Admin Berhasil Disimpan!!');
    }
    public function hapus($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        $this->session->set_flashdata('error', 'Data Admin Berhasil di Hapus');
    }
    public function edit($id_admin)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
        $this->session->set_flashdata('error', 'Data Admin Berhasil di Edit');
    }
}
