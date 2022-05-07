<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cv extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Cv_m', 'cv');
        // $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data = [

            'judul' => 'Cv | ',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        ];
        $this->load->view('themplates/header.php', $data);
        $this->load->view('themplates/sidebar.php', $data);
        $this->load->view('themplates/navbar.php', $data);


        $this->load->view('admin/cv_v', $data);
        $this->load->view('js/cv_js');
        $this->load->view('themplates/footer.php');
    }

    public function data_cv()
    {
        $datacv = $this->cv->get_datacv();
        foreach ($datacv as $row) {

            $tbody = array();
            $foto = ' <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" alt="table-user" style="max-width:50px;" class="me-2 " />';
            $tbody[] = $foto;
            $tbody[] = $row['nama'];
            $tbody[] = $row['link'];

            $action = ' <div class="btn-group mb-2 dropend">
             <a href="javascript: void(0);" class="action-icon " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-pencil"></i></a>
              <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript: void(0);" onclick="addfoto(' . $row['projek_id'] . ')">Tambah Foto</a>
        <a class="dropdown-item" href="javascript: void(0);" onclick="edit(' . $row['projek_id'] . ')">Edit Data</a>
       
    </div>
</div>
                          <a href="javascript: void(0);" onclick="delete_data(' . $row['projek_id'] . ')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        

                           
   
   
                          
                        ';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($datacv) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function img($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $images = $this->cv->get_images($id);
            $data = array();
            foreach ($images as $dat) {
                $data[] = '<div class="col-md-4">
                        <img src="' . base_url() . 'assets/upload/gallery/' . $dat['foto'] . '" alt="image" class="img-fluid img-thumbnail"
                            width="200" />
                    </div>';
            }

            echo json_encode($data);
        }
    }

    public function input()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = './assets/upload/gallery/';
                $config['file_name'] = time();
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
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
                    //direktori file
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'link' => $this->input->post('link'),
                        'date_post' => date("Y-m-d H:i:s"),
                        'foto' => $image_data['file_name'],
                    );

                    $input = $this->cv->input($data);
                    echo json_encode($input);
                }
            }
        }
    }

    public function editcv($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->cv->get_cvByid($id);
            echo json_encode($data);
        }
    }


    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = './assets/upload/gallery/';
                $config['file_name'] = time();
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
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
                    //direktori file
                    $data = array(
                        'projek_id' => $this->input->post('projek_id'),
                        'date_post' => date("Y-m-d H:i:s"),
                        'foto' => $image_data['file_name'],
                    );

                    $input = $this->cv->upload($data);
                    echo json_encode($input);
                }
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $slug = str_replace(' ', '-', $this->input->post('nama_produk'));
            $id = $this->input->post('produk_id');
            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = './assets/upload/gallery/';
                $config['file_name'] = strtolower($slug) . '-' . time();
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
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
                    //direktori file
                    $path = './assets/upload/gallery/';
                    $filename = $this->input->post('foto');
                    //hapus file
                    if (file_exists($path . $filename)) {
                        unlink($path . $filename);
                    }

                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'link' => $this->input->post('keterangan'),
                        'foto' => $image_data['file_name'],
                    );
                }
                $update =  $this->cv->update(array('projek_id' => $this->input->post('projek_id')), $data);
                echo json_encode($update);
            } else {
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'link' => $this->input->post('link'),
                );
                $update =  $this->cv->update(array('projek_id' => $this->input->post('projek_id')), $data);
                echo json_encode($update);
            }
        }
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->cv->delete_dataByid($id);
        }
    }
}
