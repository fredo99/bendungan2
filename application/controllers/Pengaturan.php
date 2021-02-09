<?php

class Pengaturan extends CI_Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengaturan');
        $this->load->model('m_profile');
    }

    public function index(){
        if ($this->session->has_userdata('user')) {
            $email = $this->session->userdata('user')['email'];
            $data["title"] = "Pengaturan";
            $data["user"] = $this->m_profile->getUser($email);
            $data["ketinggian"] = $this->m_pengaturan->ambilAturketinggian()->row_array();
            $data["terbuka"] = $data["ketinggian"]["terbuka"];
            $data["tertutup"] = $data["ketinggian"]["tertutup"];
            $this->load->view('templates/header', $data);
            $this->load->view('pengaturan', $data);
        } else {
            redirect(base_url('authentication/login'));
        }
    }

    public function ubahTerbuka(){
        $tinggi = $this->input->post("ketinggianterbuka");

        $this->m_pengaturan->ubahTerbuka($tinggi);

        $this->session->set_flashdata('ubahTerbuka', '<div class="alert alert-success" role="alert">Ketinggian Pintu Terbuka Berhasil Diubah</div>');
        redirect(base_url('pengaturan'));
    }
    // public function ubahTerbukasebagian(){
    //     $tinggi = $this->input->post("ketinggianterbukasebagian");

    //     $this->m_pengaturan->ubahTerbukasebagian($tinggi);

    //     redirect("pages/pengaturan");
    // }
    public function ubahTertutup(){
        $tinggi = $this->input->post("ketinggiantertutup");

        $this->m_pengaturan->ubahTertutup($tinggi);

        $this->session->set_flashdata('ubahTertutup', '<div class="alert alert-success" role="alert">Ketinggian Pintu Tertutup Berhasil Diubah</div>');
        redirect(base_url('pengaturan'));
    }

    public function ubahOtomatisasi(){
        $status = $this->input->post("status");

        $this->m_pengaturan->ubahOtomatisasi($status);
    }

    public function ambilDataotomatisasi(){
        $data = $this->m_pengaturan->ambilDataotomatisasi();
        $status = $data['status'];

        echo json_encode($status);
    }

    public function ubahStatusPintu(){
        $status = $this->input->post("status");
        $this->m_pengaturan->ubahStatusPintu($status);
        echo json_encode(true);
    }

    public function ambildataPintu(){
        $data = $this->m_pengaturan->ambilDataotomatisasi();
        $data = $data['status'];
        echo json_encode($data);
    }

}