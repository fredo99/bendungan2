<?php

/**
 * 
 */
class M_sensor extends CI_Model
{

    function simpan($datasensor)
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
        $query = $this->db->query("SELECT * FROM monitoring WHERE tanggal LIKE '$now%' order by waktu desc LIMIT 10");
        return $query->result();
    }

    function monitoring($now){
        $query = $this->db->query("SELECT * FROM monitoring WHERE tanggal LIKE '$now%' limit 50");
        return $query->result();
    }

    function ambildataterbaru($now)
    {
        $query = $this->db->query("SELECT ketinggian FROM monitoring WHERE tanggal LIKE '$now%' order by id_sensor desc limit 1");
        return $query->row_array();
    }

    function ambilStatus(){
        $query = $this->db->query("SELECT status FROM pintu Where id_pintu = '1'");
            return $query->result();
    }

    function bukaPintu(){
        $this->db->query("UPDATE pintu SET status= 1 Where id_pintu = '1'");
    }

    function tutupPintu(){
        $this->db->query("UPDATE pintu SET status= 0 Where id_pintu = '1'");
    }

    function bukaPintusebagian(){
        $this->db->query("UPDATE pintu SET status= 2 Where id_pintu = '1'");
    }
}
