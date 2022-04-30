<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_m extends CI_Model
{

    function getJlhdata($table)
    {
        $sql = "select * from $table where hits =1";
        // echo $sql;
        // exit;
        $query = $this->db->query($sql)->num_rows();
        $data = '';
        if ($query) {
            $data = $query;
        }
        return $data;
    }


    public function get_cont()
    {
        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->order_by('id_cont', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_countbyid($id)
    {

        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->where('id_cont', $id);
        $query = $this->db->get();
        return $query->result_array();

        // $query = $this->db->get();
        // if (count($query->result()) > 0) {
        //     return $query->row();
        // }
    }
    public function update($id, $data)
    {
        $this->db->where('id_cont', $id);
        $this->db->update('contact_us', $data);
    }

    public function delete_Byid($id)
    {

        $this->db->where('id_cont', $id);
        $r = $this->db->delete('contact_us');

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Hapus Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Hapus Data';
        }
        return json_encode($res);
    }
}
