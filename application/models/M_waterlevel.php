<?php

/**
 * 
 */
class M_waterlevel extends CI_Model
{
    function filterTanggal($start_date, $end_date){
        $query = $this->db->query("SELECT * FROM monitoring WHERE tanggal >= '$start_date' AND tanggal <= '$end_date'");
        return $query->result_array();
    }

    function ambilDataketinggian()
    {
        $query = $this->db->query("SELECT * FROM monitoring");
        return $query->result_array();
    }
}