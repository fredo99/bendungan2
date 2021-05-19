<?php


class Datalog extends CI_Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_profile');
        $this->load->model('m_datalog');
    }

    public function index()
    {
        if ($this->session->has_userdata('user')) {
            if (function_exists('date_default_timezone_set')) {
                date_default_timezone_set('Asia/Jakarta');
                $waktu = date("Y-m-d");
            }
            $email = $this->session->userdata('user')['email'];
            $data["user"] = $this->m_profile->getUser($email);
            $data["datalog"]=$this->m_datalog->ambilDatalog();
            $data["title"] = "Data Log";
            $this->load->view('templates/header', $data);
            $this->load->view('datalog', $data);
        } else {
            redirect(base_url('authentication/login'));
        }
    }

    public function ambilDatatanggal(){
        if (!empty($this->input->post('start_date')) && !empty($this->input->post('end_date'))){
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $data = $this->m_datalog->filterTanggal($start_date, $end_date);
        }else{
            $data = $this->m_datalog->ambilDatalog();
        }

        echo json_encode($data);
    }
}
