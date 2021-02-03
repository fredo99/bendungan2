<?php

/**
 * 
 */
class M_pengaturan extends CI_Model
{
    public function ubahTerbuka($tinggi){
        $this->db->query("UPDATE aturketinggian SET terbuka = $tinggi WHERE id = '1'");
    }
    // public function ubahTerbukaSebagian($tinggi){
    //     $this->db->query("UPDATE aturketinggian SET terbukasebagian = $tinggi WHERE id = '1'");
    // }
    public function ubahTertutup($tinggi){
        $this->db->query("UPDATE aturketinggian SET tertutup = $tinggi WHERE id = '1'");
    }
    public function ambilAturketinggian(){

        return $this->db->query("SELECT * FROM aturketinggian");
    }
    public function ubahOtomatisasi($status){
        $this->db->query("UPDATE aturmanual SET status=$status WHERE id='1'");
    }
}