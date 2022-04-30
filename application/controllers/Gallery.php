<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gallery', 'gallery');
        $this->load->model('admin/Profil_m', 'profil');
        $this->load->model('M_artikel', 'artikel');

        $autoload['helper'] = array('text');
        $this->load->library('session');
        $this->load->library('pagination');
    }
    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('gallery/index'); //site url
        $config['total_rows'] = $this->db->count_all('histori'); //total row
        $config['per_page'] = 12;  //show record per halaman
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

            'judul' => 'Gallery | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),



            'histori' => $this->gallery->get_histori($config["per_page"], $pages['page']),
            'pagination' => $this->pagination->create_links(),

            'art' => $this->artikel->get_artikelpost()->result(),
            'produk' => $this->artikel->get_produk()->result(),
            'gallery' => $this->artikel->get_gallery()->result(),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('pages/gallery_v', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detailhistori($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $detailpro =  $this->gallery->get_detailhistor($id);
            $data = array();
            foreach ($detailpro as $row) {

                $data[] = '
    <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-right">
                    <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" class="img-fluid" alt="">


                    <div class="blog-item shadow p-3 mb-5 bg-body rounded">

                                                    <div class="blog-text">
                                                      
                                                        <p>
                                                            ' . $row['keterangan'] . '
                                                        </p>
                                                    </div>
                                                   

                                                </div>
                </div>
            </div>
        </div>
';
            }
            echo json_encode($data);
        }
    }
}
