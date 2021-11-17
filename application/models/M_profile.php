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
        // $this->db->query("UPDATE user SET nama = '$data->nama',email = '$data->email', alamat = '$data->alamat',jenkel = '$data->jenkel', no = '$data->nomor' WHERE email = '$email'");
        $this->db->where('email', $email);
        $this->db->update('user', $data);
    }

    public function ambilPassword($email){
        $query = $this->db->query("SELECT password FROM user WHERE email ='$email'");
            return $query->row()->password;
    }
}