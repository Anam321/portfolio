<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_folio extends CI_Model
{


    public function get_folio()
    {

        $this->db->select('*');
        $this->db->from('projek');

        $this->db->order_by('projek_id', 'DESC');

        $query = $this->db->get();
        return $query;
    }
    public function get_foliobyid($id)
    {

        $this->db->select('*');
        $this->db->from('projek');
        $this->db->where('projek_id', $id);

        $query = $this->db->get();
        return $query;
    }
    public function get_foto($id)
    {

        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('projek_id', $id);

        $query = $this->db->get();
        return $query;
    }
    public function input_message($data)
    {
        $r = $this->db->insert('message', $data);

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Pesan Berhasil Di Kirim';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Pesan gagal Di Kirim !';
        }
        return $res;
    }
}
