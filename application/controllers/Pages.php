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
        $ketinggianair = $this->input->get('ket_air');

        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date("Y-m-d");
            $jam    = date("H:i:s");
        }

        $datasensor = array(
                        'ketinggian' => $ketinggianair,
                        'tanggal' => $tanggal,
                        'waktu' => $jam
                    );

        $this->m_sensor->simpan($datasensor);

        //ambil thresshold ketinggian pintu terbuka
        $Terbuka = $this->m_pengaturan->ambilTerbuka();
        $Terbuka = $Terbuka['terbuka'];
        // ambil thresshold ketinggian pintu tertutup
        $tertutup = $this->m_pengaturan->ambilTertutup();
        $tertutup = $tertutup['tertutup'];

        // ambil data otomatisasi
        $otomatisasi = $this->m_pengaturan->ambilDataotomatisasi();
        $otomatisasi = $otomatisasi['status'];

        if ($otomatisasi == 1) { //otomatis nyala
            //ambil status jendela terakhir
            $status_pintu = $this->m_pengaturan->ambilDatapintu();
            $status_pintu = $status_pintu['status'];

            if($ketinggianair <= $tertutup){
                $this->m_sensor->tutupPintu();
            }
            if($ketinggianair > $tertutup && $ketinggianair < $Terbuka){
                $this->m_sensor->bukaPintusebagian();
            }
            if($ketinggianair >= $Terbuka){
                $this->m_sensor->bukaPintu();
            }
        }else{

        }

        $status_pintu = $this->m_pengaturan->ambilDatapintu();
        array_push($status_pintu, $Terbuka);
        array_push($status_pintu, $tertutup);

        echo json_encode($status_pintu);
    }

    public function ubahStatusPintu(){
        if(isset($_GET['status'])){
            $status = $this->input->get('status');
        }
       $data = $this->m_sensor->updateStatus($status);
            echo $data;
    }
}
