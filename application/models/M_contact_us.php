<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_contact_us extends CI_Model
{

    public function input($data)
    {
        $r = $this->db->insert('contact_us', $data);

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
}
