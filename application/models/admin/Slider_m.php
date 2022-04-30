<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_m extends CI_Model
{




    public function get_slider()
    {
        $this->db->select('*');
        $this->db->from('set_slider');
        $this->db->order_by('slid_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_slidByid($id)
    {

        $this->db->select('*');
        $this->db->from('set_slider');
        $this->db->where('slid_id', $id);
        // $query = $this->db->get();
        // return $query->result_array();

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    public function get_slidid($id)
    {

        $this->db->select('*');
        $this->db->from('set_slider');
        $this->db->where('slid_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function input_slider($data)
    {
        $r = $this->db->insert('set_slider', $data);

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil di Tambahkan';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'gagal di Tambahkan. Kesalahan saat menyimpan data !';
        }
        return $res;
    }

    public function ajax_updateslid($where, $data)
    {
        $r = $this->db->update('set_slider', $data, $where);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Data Berhasil Update';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Update Data';
        }
        return $res;
    }

    // public function update_foto($where, $data)
    // {

    //     // $r = $this->db->insert('foto', $data);

    //     // if ($data) {
    //     // $this->db->insert('foto', $data);
    //     // $inpudat = $data;
    //     // } else {
    //     $r = $this->db->update('set_profil', $data, $where);
    //     if ($r) {
    //         $res['status'] = '00';
    //         $res['type'] = 'success';
    //         $res['mess'] = 'Berhasil Upload';
    //     } else {
    //         $res['status'] = '01';
    //         $res['type'] = 'warning';
    //         $res['mess'] = 'Gagal upload Data';
    //     }
    //     return $res;
    //     // }
    // }
    public function update($where, $data)
    {


        $r = $this->db->update('set_slider', $data, $where);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Upload';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal upload Data';
        }
        return $res;
        // }
    }
    public function delete_slidByid($id)
    {

        $q = $this->db->query("select gambar from set_slider where slid_id = '$id'")->row();
        $foto = $q->gambar;

        // var_dump($foto);

        $path = './assets/upload/hero/';
        // hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }


        $this->db->where('slid_id', $id);
        $r = $this->db->delete('set_slider');

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
