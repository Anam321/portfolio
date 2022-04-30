<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_contact_us', 'contact');
        $this->load->model('admin/Profil_m', 'profil');

        $this->load->library('session');
    }
    public function index()
    {

        $data = [

            'judul' => 'Contact Us | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'deskripsi' => $this->profil->get_profile('deskripsi'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'email' => $this->profil->get_kontak('email'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('pages/contact_v', $data);
        $this->load->view('layout/footer', $data);
    }


    public function alertnotif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data[] = '<div class="row">
            <div class="col-lg-12">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Terima Kasih!</h4>
  <p>Terimaksih telah menghubungi kami, kami akan meninjau message anda dan kami akan segaera menghubungi anda. Cek Email atau spam emai untuk langkah selanjutnya.</p>
  <hr>
  <a href="' . base_url('produk') . '">
<p>Lebih Lanjut Lihat Produk Terbaru<i class="fas fa-arrow-right"></i></p>
</a>
</div>
</div>
</div>';
            echo json_encode($data);
        }
    }

    public function input()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'date_post' => date("Y-m-d H:i:s"),
            );
            $insert = $this->contact->input($data);
            echo json_encode($insert);
        }
    }
}
