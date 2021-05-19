<?php

class Mikrokontroler extends CI_Controller
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
        if($ketinggianair >= $terbuka){
            $status_ketinggian = "1";
        }
        if ($ketinggianair > $tertutup && $ketinggianair < $terbuka) {
            $status_ketinggian = "2";
        }
        if($ketinggianair <= $tertutup){
            $status_ketinggian = "3";
        }
        
        $lastlog = $this->m_datalog->ambilLogTerakhir()->row_array();
        $lastlog = $lastlog['posisipintu'];

        if ($otomatisasi == 1) { //otomatis nyala
            if($ketinggianair <= $tertutup){
                $this->m_sensor->tutupPintu();
                if($lastlog !=0){
                    $this->m_datalog->tambahLogOtomatis(1, 0, 1, $terbuka, $tertutup, $ketinggianair, $tanggal, $jam);
                }
            }
            elseif($ketinggianair > $tertutup && $ketinggianair < $terbuka){
                $this->m_sensor->bukaPintusebagian();
                
                if ($lastlog !=2) {
                    $this->m_datalog->tambahLogOtomatis(1, 2, 1, $terbuka, $tertutup, $ketinggianair, $tanggal, $jam);
                }
            }
            elseif($ketinggianair >= $terbuka){
                $this->m_sensor->bukaPintu();
                if ($lastlog !=1) {
                    $this->m_datalog->tambahLogOtomatis(1, 1, 1, $terbuka, $tertutup, $ketinggianair, $tanggal, $jam);
                }
            }
        }

        $status_pintu = $this->m_pengaturan->ambilDatapintu1()->result();
        $data = array('status_ketinggian' => $status_ketinggian);
        array_push($status_pintu, $data);
        
        echo json_encode($status_pintu);
    }

    public function ambil()
    {
        $status_pintu = $this->m_pengaturan->ambilDatapintu1()->result();
        echo json_encode($status_pintu);
    }
}