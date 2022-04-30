<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gallery extends CI_Model
{

    public function get_artikel()
    {

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('is_active', 1);
        $this->db->order_by('artikel_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }

    function get_histori($limit, $start)
    {
        $query = $this->db->get('histori', $limit, $start);
        return $query;
    }

    public function get_detailhistor($id)
    {

        $this->db->select("*");
        $this->db->from('histori');
        $this->db->where('histori_id', $id);

        $query = $this->db->get();
        return $query->result_array();

        // AJAX SERVERSIDE :

        // $query = $this->db->get();
        // if (count($query->result()) > 0) {
        //     return $query->row();
        // }
    }
}
