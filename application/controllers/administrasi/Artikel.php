<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Artikel_m', 'artikel');
        $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
        $this->load->helper('text');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Artikel | ' . $this->artikel->get_profil('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/artikel_v', $data);
        $this->load->view('js/artikel_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    function waktu_lalu($timestamp)
    {
        $selisih = time() - strtotime($timestamp);
        $detik = $selisih;
        $menit = round($selisih / 60);
        $jam = round($selisih / 3600);
        $hari = round($selisih / 86400);
        $minggu = round($selisih / 604800);
        $bulan = round($selisih / 2419200);
        $tahun = round($selisih / 29030400);
        if ($detik <= 60) {
            $waktu = $detik . ' detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit . ' menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam . ' jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari . ' hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu . ' minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = $bulan . ' bulan yang lalu';
        } else {
            $waktu = $tahun . ' tahun yang lalu';
        }
        return $waktu;
    }
    public function edit_konten($id)
    {
        $data = [
            //title Page
            'judul' => 'Artikel | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'artikel' => $this->artikel->get_artikelbyid($id),
        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/edit_artikel_v', $data);
        $this->load->view('js/artikel_js', $data);
        $this->load->view('themplates/footer', $data);
    }
    public function listartikel()
    {


        $slidrow = $this->artikel->get_artikel();

        $no = 1;
        foreach ($slidrow as $row) {

            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $row['judul_artikel'];
            // $tbody[] = $row['paragraf'];
            $tbody[] = $row['link'];
            $tbody[] = $row['slug'];
            if ($row['is_active'] == 1) {
                $switch = '<button  type="button" class="btn btn-sm bg-success"><span style="font-weight:bold;">ON</span></button><button onclick="of(' . $row['artikel_id'] . ')" type="button" class="btn btn-sm "  ><span style="font-weight:bold;">OF</span></button>';
            } else {
                $switch = '<button onclick="on(' . $row['artikel_id'] . ')" type="button" class="btn btn-sm "><span style="font-weight:bold;">ON</span></button><button type="button" class="btn btn-sm bg-danger"  ><span style="font-weight:bold;">OF</span></button>';
            }

            $tbody[] = $switch;
            $gambar = '<img src="' . base_url() . 'assets/upload/artikel/' . $row['foto'] . '"
alt="' . $row['foto'] . '" class="rounded me-3" height="48">
';
            $tbody[] = $gambar;
            $tbody[]
                = $this->waktu_lalu($row['date_post']);
            $action = '
                    <a href="#" onclick="detail(' . $row['artikel_id'] . ')"><i class="align-middle fas fa-fw fa-eye text-info"></i></i></a>
                    <a href="' . base_url('administrasi/artikel/edit_konten/') . '' . $row['artikel_id'] . '" ><i class="align-middle fas fa-fw fa-edit text-success"></i></i></a>
                    <a href="#" onclick="delete_data(' . $row['artikel_id'] . ')"><i class="align-middle fas fa-fw fa-trash text-danger"></i></a>
';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($slidrow) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function detail($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $detail = $this->artikel->get_artikelid($id);
            $data = array();
            foreach ($detail as $row) {


                $data[] = '<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">

                    <h2>' . $row['judul_artikel'] . '</h2>
                    <img src="' . base_url() . 'assets/upload/artikel/' . $row['foto'] . '" />
                      <div class="single-tags">
                            <a href="#"><i class="align-middle fas fa-fw fa-user"></i> Admin</a>
                            <a href="#"><i class="align-middle fas fa-fw fa-folder"></i> Web Design</a>
                            <a href="#"><i class="align-middle fas fa-fw fa-comment"></i> 15 Coments</a>
                            <a href="#"><i class="align-middle fas fa-fw fa-calendar"></i> ' . $row['date_post'] . ' Post</a>
                           
                        </div>
                   
                        ' . $row['konten'] . '
                    
                      
                </div>

            </div>
        </div>
    </div>
</div>';
            }
            echo json_encode($data);
        }
    }


    public function input_artikel()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $slug = str_replace(' ', '-', $this->input->post('judul_artikel'));
            $config['upload_path'] = './assets/upload/artikel/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = strtolower($slug) . '-' . time();
            $config['overwrite'] = true;
            $config['max_size'] = 3024; // 1MB

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $insert['status'] = '01';
                $insert['type'] = 'error';
                $insert['mess'] = $this->upload->display_errors();
                echo json_encode($insert);
            } else {
                $image_data = $this->upload->data();
                $is_active = 0;

                $data = array(
                    'penerbit' => $this->input->post('penerbit'),
                    'judul_artikel' => $this->input->post('judul_artikel'),
                    'slug' => strtolower($slug),
                    'konten' => $this->input->post('konten'),
                    'link' => $this->input->post('link'),


                    'date_post' => date("Y-m-d H:i:s"),
                    'is_active' => $is_active,

                    'foto' => $image_data['file_name'],
                );
                $insert = $this->artikel->input_artikel($data);
                echo json_encode($insert);
            }
        }
    }
    public function update()
    {

        $slug = str_replace(' ', '-', $this->input->post('judul_artikel'));
        $id = $this->input->post('artikel_id');
        if (!empty($_FILES["foto"]["name"])) {
            $config['upload_path'] = './assets/upload/artikel/';
            $config['file_name'] = strtolower($slug) . '-' . time();
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $config['max_size'] = 3024; // 1MB

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                // $insert['status'] = '01';
                // $insert['type'] = 'error';
                // $insert['mess'] = $this->upload->display_errors();
                // echo json_encode($insert);
                $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-bell"></i>
											</div>
											<div class="alert-message">
												<strong>Error!</strong> Seperti nya Ada Yang Salah, Periksa Kembali!!.
											</div>

											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            } else {
                $image_data = $this->upload->data();
                //direktori file
                $path = 'assets/upload/artikel/';
                $filename = $this->input->post('foto');
                //hapus file
                if (file_exists($path . $filename)) {
                    unlink($path . $filename);
                }

                $data = array(
                    'penerbit' => $this->input->post('penerbit'),
                    'judul_artikel' => $this->input->post('judul_artikel'),
                    'slug' => $this->input->post('slug'),
                    'konten' => $this->input->post('konten'),
                    'link' => $this->input->post('link'),
                    'date_post' => date("Y-m-d H:i:s"),
                    'foto' => $image_data['file_name'],
                );
            }
        } else {
            $data = array(
                'penerbit' => $this->input->post('penerbit'),
                'judul_artikel' => $this->input->post('judul_artikel'),
                'slug' => $this->input->post('slug'),
                'konten' => $this->input->post('konten'),
                'link' => $this->input->post('link'),
                'date_post' => date("Y-m-d H:i:s"),

            );
            $this->artikel->updateartikel(array('artikel_id' => $this->input->post('artikel_id')), $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-bell"></i>
											</div>
											<div class="alert-message">
												<strong>Success!</strong> Data Berhasil Di Update!..
											</div>

											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            redirect(base_url('administrasi/artikel/edit_konten/') . $id);
        }
    }

    public function ajax_edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->artikel->get_Byid($id);
            echo json_encode($data);
        }
    }

    public function on()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'is_active' => 1,
            );
            // print_r($data);
            $update = $this->artikel->updateartikel(array('artikel_id' => $this->input->post('artikel_id')), $data);
            echo json_encode($update);
        }
    }
    public function of()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'is_active' => 0,
            );
            // print_r($data);
            $update = $this->artikel->updateartikel(array('artikel_id' => $this->input->post('artikel_id')), $data);
            echo json_encode($update);
        }
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->artikel->delete_Byid($id);
        }
    }
}
