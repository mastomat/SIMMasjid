<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengumuman extends CI_Model
{

    function get_datadashboard()
    {

        $query = $this->db->query(" SELECT	tbl_pengumuman.* , tbl_user.`user_nama` FROM tbl_pengumuman, tbl_user WHERE
		tbl_pengumuman.`pengumuman_user` = tbl_user.`user_id` ORDER BY pengumuman_waktu DESC LIMIT 3");
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

        $this->db->like('pengumuman_slug', $preslug, 'after');
        $checkslug = $this->db->get('tbl_pengumuman');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }

    public function count_data($search = null, $category = null)
    {


        if ($search != null) {
            $this->db->like('p.pengumuman-judul', $search);
        }


        $this->db->from('posts p');
        return $this->db->get()->num_rows();
    }

    public function get_all_post($limit, $start, $search = null, $category = null)
    {


        if ($search != null) {
            $this->db->like('p.pengumuman_judul', $search);
        }


        $this->db->order_by('pengumuman_id', 'desc');

        $this->db->join('users u', 'u.user_id=p.pengumuman_user', 'left');
        $query = $this->db->get('tbl_pengumuman p', $limit, $start)->result();
        return $query;
    }

    public function get_pengumuman_by_slug($slug = null)
    {
        $this->db->select('p.*, u.user_nama');

        $this->db->join('tbl_user u', 'u.user_id=p.pengumuman_user', 'left');
        $query = $this->db->get_where('tbl_pengumuman p', ['p.pengumuman_slug' => $slug]);
        return $query->row();
    }

    public function recent_pengumuman($slug)
    {

        $this->db->where('pengumuman_slug !=', $slug);
        $this->db->order_by('pengumuman_waktu', 'desc');
        $this->db->limit(5);
        return $this->db->get('tbl_pengumuman p')->result();
    }
}
