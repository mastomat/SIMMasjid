<?php
class M_user extends CI_Model
{


    function cek_admin($username, $password)
    {
        $this->db->select("*");
        $this->db->from("tbl_user");
        $this->db->where("user_username", $username);
        $query = $this->db->get();
        $user = $query->row();
        /**
         * Check password
         */
        if (!empty($user)) {
            if ($password == $user->user_password) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function getuser($data)
    {
        $query = $this->db->get_where("tbl_user", array('user_id' => $data));

        return $query->row();
    }
}
