<?php

class Dashboard extends CI_Controller
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
        $this->load->model('m_datalog');
    }

    public function index()
    {
        if ($this->session->has_userdata('user')) {
            $email = $this->session->userdata('user')['email'];
            $data["user"] = $this->m_profile->getUser($email);
            $data["title"] = "Dashboard";
            $this->load->view('templates/header',$data);
            $this->load->view('dashboard',$data);
        } else {
            redirect(base_url('authentication/login'));
        }
    }

    public function status_pintu(){
        
        $data = $this->m_sensor->ambilStatus();
        echo json_encode($data);
    }

    public function status_ketinggian(){
        if(function_exists('date_default_timezone_set')){
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("Y-m-d");
        }
        $data_ketinggian = $this->m_sensor->ambildataterbaru($waktu);
        if(count($data_ketinggian) == 0){
            $data = false;
        }else{
            $ketinggian = $data_ketinggian['ketinggian'];

            $data_aturan = $this->m_pengaturan->ambilAturketinggian()->row_array();

            $data = array();
            array_push($data, $data_aturan['terbuka']);
            array_push($data, $data_aturan['tertutup']);
            array_push($data, $ketinggian);
        }
        echo json_encode($data);
    }

    public function dataChart(){
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("Y-m-d");
        $data=$this->m_sensor->monitoring($waktu);
        echo json_encode($data);
    }

    public function tampilData(){
        $this->load->model('m_sensor');
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("Y-m-d");
        $data=$this->m_sensor->datamonitoring($waktu);
        echo json_encode($data);
    }
}