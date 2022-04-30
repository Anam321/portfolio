<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_m extends CI_Model
{

    public function get_profil($varams)
    {
        $query = $this->db->get('set_profil')->row();
        // $result = $query;
        $data = $query->$varams;

        return $data;
    }
    public function get_artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('artikel_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Byid($id)
    {

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('artikel_id', $id);
        // $query = $this->db->get();
        // return $query->result_array();

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    public function get_artikelid($id)
    {

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('artikel_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_artikelbyid($id)
    {
        $query = $this->db->query("select * from artikel where artikel_id = $id");



        $data = array();
        foreach ($query->result() as $row) {
            $data[] = array(
                'artikel_id' => $row->artikel_id,
                'judul_artikel' => $row->judul_artikel,
                'konten' => $row->konten,
                'slug' => $row->slug,
                'link' => $row->link,
                'penerbit' => $row->penerbit,
                'foto' => $row->foto,
            );
        }
        return $data;
    }

    public function input_artikel($data)
    {
        $r = $this->db->insert('artikel', $data);

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

    public function updateartikel($where, $data)
    {
        $r = $this->db->update('artikel', $data, $where);
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
    public function updateproduk($where, $data)
    {
        $update = $this->db->update('produk', $data, $where);

        return $update;
    }

    public function delete_Byid($id)
    {

        $q = $this->db->query("select foto from artikel where artikel_id = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);

        $path = './assets/upload/artikel/';
        // hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }


        $this->db->where('artikel_id', $id);
        $r = $this->db->delete('artikel');

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
