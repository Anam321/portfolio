<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/slider_m', 'slid');
        $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Slider | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/slider_v', $data);
        $this->load->view('js/slider_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function listslider()
    {


        $slidrow = $this->slid->get_slider();

        $no = 1;
        foreach ($slidrow as $row) {

            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $row['judul_slid'];
            // $tbody[] = $row['paragraf'];
            $tbody[] = $row['link'];
            if ($row['is_active'] == 1) {
                $switch = '<button  type="button" class="btn btn-sm bg-success"><span style="font-weight:bold;">ON</span></button><button onclick="of(' . $row['slid_id'] . ')" type="button" class="btn btn-sm "  ><span style="font-weight:bold;">OF</span></button>';
            } else {
                $switch = '<button onclick="on(' . $row['slid_id'] . ')" type="button" class="btn btn-sm "><span style="font-weight:bold;">ON</span></button><button type="button" class="btn btn-sm bg-danger"  ><span style="font-weight:bold;">OF</span></button>';
            }

            $tbody[] = $switch;
            $gambar = '<img src="' . base_url() . 'assets/upload/hero/' . $row['gambar'] . '"
alt="' . $row['gambar'] . '" class="rounded me-3" height="48">
';
            $tbody[] = $gambar;
            $action = '
                    <a href="#" onclick="detail(' . $row['slid_id'] . ')"><i class="align-middle fas fa-fw fa-eye text-info"></i></i></a>
                    <a href="#" onclick="edit(' . $row['slid_id'] . ')"><i class="align-middle fas fa-fw fa-edit text-success"></i></i></a>
                    <a href="#" onclick="delete_data(' . $row['slid_id'] . ')"><i class="align-middle fas fa-fw fa-trash text-danger"></i></a>
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
            $detail = $this->slid->get_slidid($id);
            $data = array();
            foreach ($detail as $row) {

                $data[] = '<div class="container">

    <input type="radio" name="r" id="r1" checked>
    <input type="radio" name="r" id="r2">
    <input type="radio" name="r" id="r3">
    <input type="radio" name="r" id="r4">

    <div class="Slider">
        <div class="slide One">
            <div class="Content">
                <div>
                    <h2>' . $row['judul_slid'] . '</h2>
                    <p>
                        ' . $row['paragraf'] . '
                    </p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="ImageContent">
                <img
                    src="' . base_url() . 'assets/upload/hero/' . $row['gambar'] . '">
            </div>
        </div>
    </div>
    <div class="Navigation">
        <label for="r1"><span></span></label>
        <label for="r2"><span></span></label>
        <label for="r3"><span></span></label>
        <label for="r4"><span></span></label>
    </div>
</div>';
            }
            echo json_encode($data);
        }
    }

    public function input_slider()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = str_replace(' ', '-', $this->input->post('judul_slid'));
            $config['upload_path'] = './assets/upload/hero/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = strtolower($name) . '-' . time();
            $config['overwrite'] = true;
            $config['max_size'] = 3024; // 1MB

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $insert['status'] = '01';
                $insert['type'] = 'error';
                $insert['mess'] = $this->upload->display_errors();
                echo json_encode($insert);
            } else {
                $image_data = $this->upload->data();
                $is_active = 0;

                $data = array(
                    'judul_slid' => $this->input->post('judul_slid'),
                    'paragraf' => $this->input->post('paragraf'),
                    'link' => $this->input->post('link'),


                    'date_post' => date("Y-m-d H:i:s"),
                    'is_active' => $is_active,

                    'gambar' => $image_data['file_name'],
                );
                $insert = $this->slid->input_slider($data);
                echo json_encode($insert);
            }
        }
    }

    public function ajax_editslide($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->slid->get_slidByid($id);
            echo json_encode($data);
        }
    }

    public function update()
    {

        $slug = str_replace(' ', '-', $this->input->post('judul_slid'));

        if (!empty($_FILES["foto"]["name"])) {
            $config['upload_path'] = './assets/upload/hero/';
            $config['file_name'] = strtolower($slug) . '-' . time();
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $config['max_size'] = 3024; // 1MB

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $insert['status'] = '01';
                $insert['type'] = 'error';
                $insert['mess'] = $this->upload->display_errors();
                echo json_encode($insert);
            } else {
                $image_data = $this->upload->data();
                //direktori file
                $path = 'assets/upload/hero/';
                $filename = $this->input->post('gambar');
                //hapus file
                if (file_exists($path . $filename)) {
                    unlink($path . $filename);
                }

                $data = array(
                    'judul_slid' => $this->input->post('judul_slid'),
                    'paragraf' => $this->input->post('paragraf'),
                    'link' => $this->input->post('link'),
                    'date_post' => date("Y-m-d H:i:s"),
                    'gambar' => $image_data['file_name'],
                );
            }
        } else {
            $data = array(
                'judul_slid' => $this->input->post('judul_slid'),
                'paragraf' => $this->input->post('paragraf'),
                'link' => $this->input->post('link'),
                'date_post' => date("Y-m-d H:i:s"),
            );

            $insert = $this->slid->update(array('slid_id' => $this->input->post('slid_id')), $data);
            echo json_encode($insert);
        }
    }
    public function on()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'is_active' => 1,
            );
            // print_r($data);
            $update = $this->slid->ajax_updateslid(array('slid_id' => $this->input->post('slid_id')), $data);
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
            $update = $this->slid->ajax_updateslid(array('slid_id' => $this->input->post('slid_id')), $data);
            echo json_encode($update);
        }
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->slid->delete_slidByid($id);
        }
    }
}
