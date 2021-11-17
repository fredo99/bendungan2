<?php

class Profile extends CI_Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile');
    }

    public function index()
    {
        if ($this->session->has_userdata('user')) {
            $email = $this->session->userdata('user')['email'];
            $data["title"] = "Profile";
            $data["user"] = $this->M_profile->getUser($email);
            $this->load->view('templates/header', $data);
            $this->load->view('profile');
        } else {
            redirect(base_url('authentication/login'));
        }
    }

    public function ubahPassword(){
        $email = $this->session->userdata('user')['email'];
        $password = $this->m_profile->ambilPassword($email);
        $passwordlama = $this->input->post('passwordlama');
        $passwordbaru = $this->input->post('passwordbaru');

        echo($password);
        if($passwordlama == $password){
            
            $this->M_profile->savePassword($passwordbaru,$email);
            $this->session->set_flashdata('password', '<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
            redirect(base_url('profile'));
        }
         else {
            $this->session->set_flashdata('password', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
            redirect(base_url('profile'));

        }
    }

    public function ubahProfil(){
        $email = $this->session->userdata('user')['email'];
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $jenkel = $this->input->post('jenkel');
        $nomor = $this->input->post('nomor');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'jenkel' => $jenkel,
            'no' => $nomor
        );

        var_dump($data);
        
        $this->M_profile->ubahProfil($data, $email);

        $this->session->set_flashdata('ubahprofil', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
        redirect(base_url('profile'));

    }
}