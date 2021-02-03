<?php

/**
 * 
 */
class M_profile extends CI_Model
{
    public function save($datasensor)
    {
        $this->db->insert('monitoring', $datasensor);
        return true;
    }

    public function getUser($email)
    {
        $query = $this->db->query("SELECT * FROM user WHERE email = '$email'");
            return $query->result()[0];
    }

    public function savePassword($password,$email){
        $this->db->query("UPDATE user SET password = '$password' WHERE email = '$email'");
    }

    public function ubahProfil($data, $email){
        $where = $this->db->where('email', $email);
        $this->db->update('user', $data, $where);
    }

    public function ambilPassword($email){
        $query = $this->db->query("SELECT password FROM user WHERE email ='$email'");
            return $query->row()->password;
    }
}