<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_artikel', 'artikel');
        $this->load->model('admin/Profil_m', 'profil');

        $autoload['helper'] = array('text');
        $this->load->library('session');
        $this->load->library('pagination');
    }


    public function index()
    {


        $config['base_url'] = site_url('artikel/index'); //site url
        $config['total_rows'] = $this->db->count_all('artikel'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $pages['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = [

            'judul' => 'Home | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),


            'artikel' => $this->artikel->get_artikel($config["per_page"], $pages['page']),
            'pagination' => $this->pagination->create_links(),

            'art' => $this->artikel->get_artikelpost()->result(),
            'produk' => $this->artikel->get_produk()->result(),
            'gallery' => $this->artikel->get_gallery()->result(),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('pages/blog_v', $data);
        $this->load->view('layout/footer', $data);
    }


    public function single($slug, $id)
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM artikel_visit WHERE ip='" . $ip . "' AND artikel_id='" . $id . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            $data = array(
                'artikel_id' => $id,
                'ip' => $ip,
                'hits' => 1,
                'date' => $date,
                'online' => $waktu,
                'time' => $timeinsert,
            );
            $this->artikel->input_visit($data);
        }

        // Jika sudah ada, update
        else {
            $this->db->query("UPDATE artikel_visit SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $data = [

            'judul' => 'Home | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),


            'artikelbyid' => $this->artikel->get_artikelByid($slug)->result(),
            'art' => $this->artikel->get_artikelpost()->result(),
            'produk' => $this->artikel->get_produk()->result(),
            'gallery' => $this->artikel->get_gallery()->result(),



        ];

        $this->load->view('layout/header', $data);
        $this->load->view('pages/d_blog_v', $data);
        $this->load->view('layout/footer', $data);
    }
}
