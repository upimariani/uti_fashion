<?php
class m_login extends CI_Model
{
    public function login_admin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}
