<?php

/**
 * 
 */
class M_pengaturan extends CI_Model
{
    public function ubahTerbuka($tinggi){
        $this->db->query("UPDATE aturketinggian SET terbuka = $tinggi WHERE id = '1'");
    }

    public function ambilTerbuka(){
        $query = $this->db->query("SELECT terbuka FROM aturketinggian WHERE id = '1'");
        return $query->row_array();
    }

    public function ambilTertutup(){
        $query = $this->db->query("SELECT tertutup FROM aturketinggian WHERE id = '1'");
        return $query->row_array();
    }
    
    public function ubahTertutup($tinggi){
        $this->db->query("UPDATE aturketinggian SET tertutup = $tinggi WHERE id = '1'");
    }

    public function ambilAturketinggian(){

        return $this->db->query("SELECT * FROM aturketinggian");
    }

    public function ubahOtomatisasi($status){
        $this->db->query("UPDATE aturmanual SET status= $status WHERE id='1'");
    }

    public function ambilDataotomatisasi(){
        $query = $this->db->query("SELECT status FROM aturmanual WHERE id='1'");

        return $query->row_array();
    }

    public function ambilDatapintu(){
        $query = $this->db->query("SELECT status FROM pintu WHERE id_pintu='1'");

        return $query->row_array();
    }

    public function ubahStatusPintu($status){
        $this->db->query("UPDATE pintu SET status = $status WHERE id_pintu='1'");
    }
}