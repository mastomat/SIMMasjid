<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{

    function get_datadashboard()
    {

        $query = $this->db->query(" SELECT	tbl_kegiatan.* , tbl_user.`user_nama` FROM tbl_kegiatan, tbl_user WHERE
		tbl_kegiatan.`kegiatan_user` = tbl_user.`user_id` ORDER BY kegiatan_waktu DESC LIMIT 3");

        return $query;
    }



    function get_dataslider()
    {

        $query = $this->db->query(" SELECT	tbl_kegiatan.* , tbl_user.`user_nama` FROM tbl_kegiatan, tbl_user WHERE
		tbl_kegiatan.`kegiatan_user` = tbl_user.`user_id` ORDER BY kegiatan_waktu DESC LIMIT 3");

        return $query;
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 6);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower($combine);
        $preslug = url_title($lowercase);

        $slug = $preslug;

        $this->db->like('kegiatan_slug', $preslug, 'after');
        $checkslug = $this->db->get('tbl_kegiatan');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }

    public function count_data()
    {


        // if ($search != null) {
        //     $this->db->like('p.kegiatan_judul', $search);
        // }


        $this->db->from('tbl_kegiatan p');
        return $this->db->get()->num_rows();
    }

    public function get_all_post($limit, $start)
    {

        $this->db->order_by('kegiatan_id', 'desc');

        $this->db->join('tbl_user u', 'u.user_id=p.kegiatan_user', 'left');
        $query = $this->db->get('tbl_kegiatan p', $limit, $start)->result();
        return $query;
    }

    public function get_post_by_slug($slug = null)
    {
        $this->db->select('p.*, u.user_nama');

        $this->db->join('tbl_user u', 'u.user_id=p.kegiatan_user', 'left');
        $query = $this->db->get_where('tbl_kegiatan p', ['p.kegiatan_slug' => $slug]);
        return $query->row();
    }

    public function recent_post($slug)
    {

        $this->db->where('kegiatan_slug !=', $slug);
        $this->db->order_by('kegiatan_waktu', 'desc');
        $this->db->limit(5);
        return $this->db->get('tbl_kegiatan')->result();
    }
}
