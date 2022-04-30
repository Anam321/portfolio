<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Dashboard_m', 'dashboard');
        // $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data = [

            'judul' => 'Dashboard | ',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        ];
        $this->load->view('themplates/header.php', $data);
        $this->load->view('themplates/sidebar.php', $data);
        $this->load->view('themplates/navbar.php', $data);


        $this->load->view('admin/dashboard_v', $data);
        $this->load->view('js/dashboard_js');
        $this->load->view('themplates/footer.php');
    }
}
