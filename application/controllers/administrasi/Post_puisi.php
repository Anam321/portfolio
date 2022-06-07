<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_puisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Post_puisi_m', 'puisi');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Puisi | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'nama' => $this->profil->get_profile('nama'),
            'kategori' => $this->puisi->get_kategori()->result(),

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/post_puisi_v', $data);
        $this->load->view('js/puisi_js', $data);

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

    public function list_puisi()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datapuisi = $this->puisi->get_puisi();

            $data = array();

            foreach ($datapuisi as $row) {
                $text = $row['puisi'];
                $limitext = word_limiter($text, 20);


                $list = ' <div class="col-md-4 col-xxl-2">
             <div class="card d-block">
                 <img class="card-img-top" src="' . base_url() . 'assets/upload/dcm/' . $row['file'] . '" style="max-height:220px;" alt="project image cap">
                 <div class="card-img-overlay">
                     <div class="badge bg-dark text-light p-1"> 
                     <a href="javascript: void(0);" class="btn-sm mb-3 " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-horizontal text-white"></i></a>
                     <div class="dropdown-menu">
    <a  class="dropdown-item" href="javascript: void(0);" onclick="lihat(' . $row['id'] . ')" >Lihat</a>
    <a class="dropdown-item" href="javascript: void(0);" onclick="edit(' . $row['id'] . ')">Edit</a>
    <a class="dropdown-item" href="javascript: void(0);" onclick="hapus(' . $row['id'] . ')">Hapus</a>
   
</div>
                     </div>
                     
                 </div>

                 <div class="card-body position-relative">
                     <h4 class="mt-0">
                         <a href="javascript: void(0);"  class="text-title">' . $row['judul_puisi'] . '</a>
                         
                     </h4>


                     <p class="mb-3">
                         <span class="pe-2 text-nowrap">
                             <i class="mdi mdi-eye"></i>
                             <b>3</b> Tasks
                         </span>
                         <span class="pe-2 text-nowrap">
                             <i class="mdi mdi-clock-time-four"></i>
                             <b>' . $this->waktu_lalu($row['date_post']) . '</b> 
                         </span>
                         <span class="text-nowrap"> 
                             <i class="mdi mdi-account-edit-outline"></i>
                             <b>' . $row['cipta'] . '</b> 
                         </span><br>
                         <span class="text-nowrap">
                             <i class="mdi mdi-clipboard-text-multiple"></i>
                             <b>' . $row['kategori'] . '</b> 
                         </span>
                         <span class="text-nowrap">
                             <i class="mdi mdi-comment-multiple-outline"></i>
                             <b>104</b> Comments
                         </span>
                        
                     </p>
                     <div class="mb-3" id="tooltip-container4">
        ' . $limitext . '
              
                     </div>
                    
                     </div>
                 </div>
             </div>
         </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function musikal()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datapuisi = $this->puisi->get_puisibymus();

            $data = array();

            foreach ($datapuisi as $row) {
                $text = $row['puisi'];
                $limitext = word_limiter($text, 20);


                $list = ' <div class="col-md-4 col-xxl-2">
             <div class="card d-block">
               
                 <div class="ratio ratio-21x9">
    <iframe src="https://www.youtube.com/watch?v=xLIVFF4Rago"></iframe>
</div>
                 <div class="card-img-overlay">
                     <div class="badge bg-dark text-light p-1"> 
                     <a href="javascript: void(0);" class="btn-sm mb-3 " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-horizontal text-white"></i></a>
                     <div class="dropdown-menu">
    <a  class="dropdown-item" href="javascript: void(0);" onclick="lihat(' . $row['id'] . ')" >Lihat</a>
    <a class="dropdown-item" href="javascript: void(0);" onclick="edit(' . $row['id'] . ')">Edit</a>
    <a class="dropdown-item" href="javascript: void(0);" onclick="hapus(' . $row['id'] . ')">Hapus</a>
   
</div>
                     </div>
                     
                 </div>

                 <div class="card-body position-relative">
                     <h4 class="mt-0">
                         <a href="javascript: void(0);"  class="text-title">' . $row['judul_puisi'] . '</a>
                         
                     </h4>


                     <p class="mb-3">
                         <span class="pe-2 text-nowrap">
                             <i class="mdi mdi-eye"></i>
                             <b>3</b> Tasks
                         </span>
                         <span class="pe-2 text-nowrap">
                             <i class="mdi mdi-clock-time-four"></i>
                             <b>' . $this->waktu_lalu($row['date_post']) . '</b> 
                         </span>
                         <span class="text-nowrap"> 
                             <i class="mdi mdi-account-edit-outline"></i>
                             <b>' . $row['cipta'] . '</b> 
                         </span><br>
                         <span class="text-nowrap">
                             <i class="mdi mdi-clipboard-text-multiple"></i>
                             <b>' . $row['kategori'] . '</b> 
                         </span>
                         <span class="text-nowrap">
                             <i class="mdi mdi-comment-multiple-outline"></i>
                             <b>104</b> Comments
                         </span>
                        
                     </p>
                     <div class="mb-3" id="tooltip-container4">
        ' . $limitext . '
              
                     </div>
                    
                     </div>
                 </div>
             </div>
         </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }
    public function lihat_puisi($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datapuisiid = $this->puisi->get_puisibyid($id);

            $data = array();

            foreach ($datapuisiid as $row) {
                // $text = $row['puisi'];
                // $limitext = word_limiter($text, 20);


                $list = ' <div class="col-lg-12 ">
                <div class="container">
  <div class="row justify-content-center align-items-center">
             
             
                 <img class="rounded" src="' . base_url() . 'assets/upload/dcm/' . $row['file'] . '" max-height=""  alt="">
                 
                   
                     
               

                 <div class="card-body position-relative">
                     <a href="javascript: void(0);" onclick="listpuisi()" class="btn btn-dark btn-sm btn-rounded mb-3"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                     <h4 class="mt-0">
                         <a href="javascript: void(0);"  class="text-title">' . $row['judul_puisi'] . '</a>
                         
                     </h4>


                     <p class="mb-3">
                         <span class="pe-2 text-nowrap">
                             <i class="mdi mdi-eye"></i>
                             <b>3</b> Tasks
                         </span>
                         <span class="pe-2 text-nowrap">
                             <i class="mdi mdi-clock-time-four"></i>
                             <b>' . $this->waktu_lalu($row['date_post']) . '</b> 
                         </span>
                         <span class="text-nowrap"> 
                             <i class="mdi mdi-account-edit-outline"></i>
                             <b>' . $row['cipta'] . '</b> 
                         </span><br>
                         <span class="text-nowrap">
                             <i class="mdi mdi-clipboard-text-multiple"></i>
                             <b>' . $row['kategori'] . '</b> 
                         </span>
                         <span class="text-nowrap">
                             <i class="mdi mdi-comment-multiple-outline"></i>
                             <b>104</b> Comments
                         </span>
                        
                     </p>
                     <div class="mb-3" id="tooltip-container4">
        ' . $row['puisi'] . '
              
                     </div>
                    
                     </div>
                 </div>
             </div>
              </div>
               </div>
         </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function ViewArtikel($id)
    {

        $data = [
            //title Page
            'judul' => 'Tender | ' . $this->profil->get_profile('nama'),
            // 'nama' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'artikelbyid' => $this->artikel->get_artikelByid($id)->result(),

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/det_artikel_v', $data);
        $this->load->view('js/artikel_js', $data);
        $this->load->view('themplates/footer', $data);
    }
    public function input_puisi()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('judul_puisi'));
            $config['upload_path'] = './assets/upload/dcm/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|mp4|mp3|wav';
            $config['file_name'] = strtolower($slug) . '-' . time();
            $config['overwrite'] = true;
            $config['max_size'] = 100024; // 1MB

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $insert['status'] = '01';
                $insert['type'] = 'error';
                $insert['mess'] = $this->upload->display_errors();
                echo json_encode($insert);
            } else {
                $image_data = $this->upload->data();

                $data = array(
                    'judul_puisi' => $this->input->post('judul_puisi'),
                    'slug'          => strtolower($slug),
                    'cipta' => $this->input->post('cipta'),
                    'kategori' => $this->input->post('kategori'),
                    'tgl_rilis' => $this->input->post('tgl_rilis'),
                    'puisi' => $this->input->post('puisi'),
                    'date_post' => date("Y-m-d H:i:s"),

                    'file' => $image_data['file_name'],
                );

                $insert = $this->puisi->input_data($data);
                echo json_encode($insert);
            }
        }
    }

    public function edit_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->artikel->get_dataId($id);
            echo json_encode($data);
        }
    }

    public function update_artikel()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('judul_artikel'));

            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = './assets/upload/artikel/';
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
                    $path = './assets/upload/artikel/';
                    $filename = $this->input->post('old_foto');
                    //hapus file
                    if (file_exists($path . $filename)) {
                        unlink($path . $filename);
                    }

                    $data = array(
                        'judul_artikel' => $this->input->post('judul_artikel'),
                        'slug'          => strtolower($slug),
                        'penerbit' => $this->input->post('penerbit'),
                        'link' => $this->input->post('link'),
                        'konten' => $this->input->post('konten'),
                        'foto'    => $image_data['file_name'],

                    );
                }
            } else {
                $data = array(
                    'judul_artikel' => $this->input->post('judul_artikel'),
                    'slug'          => strtolower($slug),
                    'penerbit' => $this->input->post('penerbit'),
                    'link' => $this->input->post('link'),
                    'konten' => $this->input->post('konten'),
                );
            }

            $update = $this->artikel->update(array('artikel_id' => $this->input->post('artikel_id')), $data);
            echo json_encode($update);
        }
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->puisi->delete_Byid($id);
        }
    }


    public function mute($id)
    {
        $id_artikel = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'is_active' => 0,
            );
        }
        $update = $this->artikel->switch($id_artikel, $data);
        echo json_encode($update);
    }
    public function tampil($id)
    {
        $id_artikel = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'is_active' => 1,
            );
        }
        $update = $this->artikel->switch($id_artikel, $data);
        echo json_encode($update);
    }
}
