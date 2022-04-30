<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_about', 'about');
        $this->load->model('admin/Profil_m', 'profil');
        $this->load->model('M_artikel', 'artikel');
        $this->load->library('session');
    }
    public function index()
    {


        $data = [

            'judul' => 'Home | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'foto' => $this->profil->get_profile('foto'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),

            'artikel' => $this->about->get_artikel()->result(),
            'art' => $this->artikel->get_artikelpost()->result(),
            'produk' => $this->artikel->get_produk()->result(),
            'gallery' => $this->artikel->get_gallery()->result(),

        ];
        $this->load->view('layout/header', $data);
        $this->load->view('pages/about_v', $data);
        $this->load->view('layout/footer', $data);
    }
}
