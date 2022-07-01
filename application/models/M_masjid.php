<?php
class M_masjid extends CI_Model
{
    

    public function detail()
	{
        $query = $this->db->get_where("tbl_masjid",array('masjid_id' => 1));

		return $query->row();
	}
    

}
