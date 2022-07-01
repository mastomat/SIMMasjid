<?php
class M_grafik extends CI_Model{
 
    function get_data_pengeluaran(){
        $query = $this->db->query("SELECT MONTHNAME(pengeluaran_tanggal) as bulan, SUM(pengeluaran_jumlah) as jumlahpengeluaran, YEAR(pengeluaran_tanggal) as tahun FROM tbl_pengeluaran GROUP BY MONTH(pengeluaran_tanggal) ASC");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_data_pemasukan(){
        $query = $this->db->query("SELECT MONTHNAME(pemasukan_tanggal) AS bulan, SUM(pemasukan_jumlah) AS jumlahpemasukan, YEAR(pemasukan_tanggal) AS tahun FROM tbl_pemasukan GROUP BY MONTH(pemasukan_tanggal) ASC");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}