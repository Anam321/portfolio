<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cv_m extends CI_Model
{



    public function get_profile($varams)
    {
        $query = $this->db->get('set_profil')->row();
        // $result = $query;
        $data = $query->$varams;

        return $data;
    }
    public function get_datacv()
    {
        $this->db->select('*');
        $this->db->from('projek');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_cvByid($id)
    {
        $this->db->select("*");
        $this->db->from('projek');
        $this->db->where('projek_id', $id);

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function get_images($id)
    {
        $this->db->select("*");
        $this->db->from('gallery');
        $this->db->where('projek_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function input($data)
    {
        $r = $this->db->insert('projek', $data);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil input Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal input Data';
        }
        return $res;
    }

    public function upload($data)
    {
        $r = $this->db->insert('gallery', $data);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil input Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal input Data';
        }
        return $res;
    }
    public function update($id, $data)
    {
        $r = $this->db->update('projek', $data, $id);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Update Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Update Data';
        }
        return $res;
    }

    public function delete_dataByid($id)
    {

        $q = $this->db->query("select foto from projek where projek_id = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);

        $path = './assets/upload/gallery/';
        // hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }


        $this->db->where('projek_id', $id);
        $r = $this->db->delete('projek');

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
