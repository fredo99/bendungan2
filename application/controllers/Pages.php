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
