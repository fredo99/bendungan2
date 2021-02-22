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
        $terbuka = $this->m_pengaturan->ambilTerbuka();
        $terbuka = $terbuka['terbuka'];
        // ambil thresshold ketinggian pintu tertutup
        $tertutup = $this->m_pengaturan->ambilTertutup();
        $tertutup = $tertutup['tertutup'];

        // ambil data otomatisasi
        $otomatisasi = $this->m_pengaturan->ambilDataotomatisasi();
        $otomatisasi = $otomatisasi['status'];
        //ambil status pintu terakhir
        $status_pintu_terakhir = $this->m_pengaturan->ambilDatapintu1()->row_array();
        $status_pintu_terakhir = $status_pintu_terakhir['status'];

        if ($otomatisasi == 1) { //otomatis nyala
            if($ketinggianair <= $tertutup){
                $this->m_sensor->tutupPintu();
            }
            elseif($ketinggianair > $tertutup && $ketinggianair < $terbuka){
                $this->m_sensor->bukaPintusebagian();
            }
            elseif($ketinggianair >= $terbuka){
                $this->m_sensor->bukaPintu();
            }
        }
        $status_pintu = $this->m_pengaturan->ambilDatapintu1()->result();
        echo json_encode($status_pintu);
    }

    public function ambil()
    {
        $status_pintu = $this->m_pengaturan->ambilDatapintu1()->result();
        echo json_encode($status_pintu);
    }
}