<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Porfolio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('portfolio/M_folio', 'folio');
        $this->load->model('admin/Profil_m', 'profil');

        $autoload['helper'] = array('text');
        $this->load->library('session');
    }
    public function index()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");

        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;


        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        }

        // Jika sudah ada, update
        else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }


        $data = [

            'judul' => 'Home | ' . $this->profil->get_profile('nama'),
            'nama' => $this->profil->get_profile('nama'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),
            'github' => $this->profil->get_kontak('github'),
            'telegram' => $this->profil->get_kontak('telegram'),
            'foto' => $this->profil->get_profile('foto'),
            'tgl_lahir' => $this->profil->get_profile('tgl_lahir'),
            'web_url' => $this->profil->get_profile('web_url'),
            'umur' => $this->profil->get_profile('umur'),
            'portfolio' => $this->folio->get_folio()->result(),

            // 'slide' => $this->home->get_slide(),
            // 'slideparent' => $this->home->get_slideparent(),
            // 'produk' => $this->home->get_produk()->result(),
            // 'histori' => $this->home->get_histori()->result(),
            // 'testimoni' => $this->home->get_testimoni()->result(),
            // 'artikel' => $this->home->get_artikel()->result(),
            // 'roadmap' => $this->home->get_roadmap()->result(),


        ];



        $this->load->view('themplates/forpolio/header', $data);
        $this->load->view('pages/porfolio/porfolio_v', $data);
        $this->load->view('themplates/forpolio/footer', $data);
    }
    public function klikwa()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $timeinsert = date("Y-m-d H:i:s");
        $data = array(
            'klik' => 1,
            'ip' => $ip,
            'date' => $date,
            'time' => $timeinsert,
        );
        $this->home->insertMenghubungi($data);
    }

    public function detailfolio($id)
    {



        $data = [

            'judul' => 'Home | ' . $this->profil->get_profile('nama'),
            'nama' => $this->profil->get_profile('nama'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),
            'github' => $this->profil->get_kontak('github'),
            'telegram' => $this->profil->get_kontak('telegram'),
            'foto' => $this->profil->get_profile('foto'),
            'tgl_lahir' => $this->profil->get_profile('tgl_lahir'),
            'web_url' => $this->profil->get_profile('web_url'),
            'umur' => $this->profil->get_profile('umur'),

            'portfolioid' => $this->folio->get_foliobyid($id)->result(),
            'listfoto' => $this->folio->get_foto($id)->result(),

        ];



        $this->load->view('themplates/forpolio/header', $data);
        $this->load->view('pages/porfolio/detail_v', $data);
        $this->load->view('themplates/forpolio/footer', $data);
    }

    public function input_message()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
                'subject' => $this->input->post('subject'),
                'date_post' => date("Y-m-d H:i:s"),
                'foto' => 'default.png',
                'hits' => 1,
                'trash' => 0,
            );

            $insert = $this->folio->input_message($data);
            echo json_encode($insert);
        }
    }
    public function alertnotif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data[] = '

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Terima Kasih!</strong> Terimaksih telah menghubungi kami, kami akan meninjau Pesan anda dan kami akan segaera menghubungi anda. Cek Email atau spam emai untuk langkah selanjutnya.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
            echo json_encode($data);
        }
    }
}
