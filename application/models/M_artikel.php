<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_artikel extends CI_Model
{

    function get_artikel($limit, $start)
    {
        $this->db->where('is_active', 1);
        $query = $this->db->get('artikel', $limit, $start);
        return $query;
    }

    function get_artikelByid($slug)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        return $query;
    }
    function get_artikelpost()
    {

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('is_active', 1);
        $this->db->order_by('artikel_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }
    function get_produk()
    {

        $this->db->select('*');
        $this->db->from('produk');

        $this->db->order_by('produk_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }
    function get_gallery()
    {

        $this->db->select('*');
        $this->db->from('histori');

        $this->db->order_by('histori_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }
    public function input_visit($data)
    {
        $this->db->insert('artikel_visit', $data);
    }
}
