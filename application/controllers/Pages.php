<?php

class Pages extends CI_Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sensor');
        $this->load->model('m_profile');
        $this->load->model('m_pengaturan');
    }
    
    // public function index()
    // {
    //     if ($this->session->has_userdata('user')) {
    //         $email = $this->session->userdata('user')['email'];
    //         $data["user"] = $this->m_profile->getUser($email);
    //         $data["title"] = "Dashboard";
    //         $this->load->view('templates/header',$data);
    //         $this->load->view('dashboard',$data);
    //     } else {
    //         redirect(base_url('authentication/login'));
    //     }
    // }

    // public function profile()
    // {
    //     if ($this->session->has_userdata('user')) {
    //         $email = $this->session->userdata('user')['email'];
    //         $data["title"] = "Profile";
    //         $data["user"] = $this->m_profile->getUser($email);
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('profile');
    //     } else {
    //         redirect(base_url('authentication/login'));
    //     }
    // }
    
    // public function waterlevel()
    // {
    //     if ($this->session->has_userdata('user')) {
    //         if (function_exists('date_default_timezone_set')) {
    //             date_default_timezone_set('Asia/Jakarta');
    //             $waktu = date("Y-m-d");
    //         }
    //         $email = $this->session->userdata('user')['email'];
    //         $data["user"] = $this->m_profile->getUser($email);
    //         $data["monitoring"]=$this->m_sensor->monitoring($waktu);
    //         $data["datamonitoring"]=$this->m_sensor->ambildata();
    //         $data["title"] = "Water Level";
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('waterlevel', $data);
    //     } else {
    //         redirect(base_url('authentication/login'));
    //     }
    // }

    // public function pengaturan(){
    //     if ($this->session->has_userdata('user')) {
    //         $email = $this->session->userdata('user')['email'];
    //         $data["title"] = "Pengaturan";
    //         $data["user"] = $this->m_profile->getUser($email);
    //         $data["ketinggian"] = $this->m_pengaturan->ambilAturketinggian()->row_array();
    //         $data["terbuka"] = $data["ketinggian"]["terbuka"];
    //         $data["tertutup"] = $data["ketinggian"]["tertutup"];
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('pengaturan', $data);
    //     } else {
    //         redirect(base_url('authentication/login'));
    //     }
    // }
    
    public function simpan(){
        $this->load->model('m_sensor');
        if (isset($_GET['data'])){
            $ketinggianair = $this->input->get('data');

            if(function_exists('date_default_timezone_set')){
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date("Y-m-d");
                $jam    = date("H:i:s");
            }

            $datasensor = array(
                            'ketinggian' => $ketinggianair,
                            'tanggal' => $tanggal, 
                            'waktu' => $jam
                        );

            $this->m_sensor->save($datasensor);
            // $data_aturan = $this->m_pengaturan->ambilAturketinggian()->row_array();

            // if($ketinggianair >= ($data_aturan['terbuka'])){
            //     $kondisi = "1";
            // }
            // if($ketinggianair > parseFloat($data_aturan['terbuka'])) && parseFloat($ketinggianair > parseFloat($data_aturan[0])) {
            //     $kondisi = 2;
            // }
            // if($ketinggianair >= parseFloat($data_aturan[1])){
            //     $kondisi = 0;
            // }
            // $this->m_sensor->updateStatus($kondisi);
            $data = $this->m_sensor->ambilStatus();
                            
            foreach ($data as $key => $value) {
                    echo "#";
                    echo ($value->status);
                    echo "#@";
            }
        }
    }

    public function ubahStatusPintu(){
        if(isset($_GET['status'])){
            $status = $this->input->get('status');
        }
       $data = $this->m_sensor->updateStatus($status);
            echo $data;
    }
}
