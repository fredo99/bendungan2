<?php

/**
 * 
 */
class M_sensor extends CI_Model
{

    function save($datasensor)
    {
        $this->db->insert('monitoring', $datasensor);
        return TRUE;
    }

    function ambildata()
    {
        $query = $this->db->query("SELECT * FROM monitoring");
        return $query->result();
    }

    function datamonitoring($now){
        $query = $this->db->query("SELECT * FROM monitoring WHERE tanggal LIKE '$now%' order by tanggal");
        return $query->result();
    }

    function monitoring($now){
        $query = $this->db->query("SELECT * FROM monitoring WHERE tanggal LIKE '$now%' limit 50");
        return $query->result();
    }

    function ambildataterbaru($now)
    {
        $query = $this->db->query("SELECT ketinggian FROM monitoring WHERE waktu LIKE '$now%' order by id_sensor desc limit 1");
        return $query->row_array();
    }

    function ambilStatus(){
        $query = $this->db->query("SELECT status FROM pintu Where id_pintu = '1'");
            return $query->result();
    }

    function updateStatus($status){
        $this->db->query("UPDATE pintu SET status= '$status' Where id_pintu = '1'");
            return TRUE;
    }
}
