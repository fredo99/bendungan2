<?php

/**
 * 
 */
class M_datalog extends CI_Model
{

    function filterTanggal($start_date, $end_date){
        $query = $this->db->query("SELECT * FROM datalog WHERE tanggal >= '$start_date' AND tanggal <= '$end_date'");
        return $query->result_array();
    }

    public function tambahLog($jenisoperasi, $posisipintu, $pemicu, $tanggal, $waktu){
        $this->db->query("INSERT INTO datalog (jenisoperasi, posisipintu, pemicu, tanggal, waktu)  VALUES ('$jenisoperasi', '$posisipintu', '$pemicu', '$tanggal', '$waktu')");
    }

    public function tambahLogOtomatis($jenisoperasi, $posisipintu, $pemicu, $terbuka, $tertutup, $ketinggianair, $tanggal, $waktu){
        $this->db->query("INSERT INTO datalog (jenisoperasi, posisipintu, pemicu, terbuka, tertutup, ketinggianair, tanggal, waktu)  VALUES ('$jenisoperasi', '$posisipintu', '$pemicu', '$terbuka', '$tertutup', '$ketinggianair','$tanggal', '$waktu')");
    }

    public function ambilLogTerakhir(){ // berhasil jika hanya pakai 1 pintu saja
        return $this->db->query("SELECT * FROM datalog ORDER BY id DESC LIMIT 1");
    }

    public function ambilDatalog(){ // berhasil jika hanya pakai 1 pintu saja
        return $this->db->query("SELECT * FROM datalog")->result();
    }
    
}