<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Contact_m', 'con');
        $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Contact Us | ' . $this->profil->get_profile('nama_perusahaan'),
            'perusahaan' => $this->profil->get_profile('nama_perusahaan'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/contact_v', $data);
        $this->load->view('js/contact_js', $data);
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


    public function section()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data[] = '<div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            
                            <a type="button" onclick="reload_table()" class="mr-1">
                                <i class="align-middle" data-feather="refresh-cw"></i>
                            </a>

                        </div>
                        <h5 class="card-title mb-0">Contact Us</h5>
                    </div>
                    <div class="card-body">
                        <table id="contact" class="table table-striped table-sm table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date Post</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3">
                <div id="detaillis"></div>
            </div>';

            echo json_encode($data);
        }
    }
    public function section2($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'hits' => 0,
            );
            $this->con->update($id, $data);
            $counid = $this->con->get_countbyid($id);
            $logo = $this->profil->get_profile('logo');
            $data = array();
            foreach ($counid as $row) {
                $data[] = '
<div class="card">
     <div class="card-header">
                         <a type="button" onclick="section()" >
                                <i class="fas fa-long-arrow-alt-left"></i> 
                            </a>
                    </div>
    <div class="card-body">
        <div class="pad">
            <div class="uk-section uk-sectiona">
                <div class="uk-container pb" uk-grid>
                    <div class="uk-width-1-2">
                        <img src="" alt="" width="160px">
                    </div>
                    <div class="uk-width-1-2">
                        <img src="' . base_url() . 'assets/upload/logo/' . $logo . '" class="uk-align-right" alt="" width="160px">
                    </div>
                </div>
                <hr class="uk-divider-icon">
                <div class="uk-section uk-section-muted">
                    <div class="uk-container">
                        <h2 class="uk-text-center">' . $row['subject'] . '</h2>
                        <div>
                          <p> ' . $row['message'] . '</p>
                        </div>
                          <p class="card-text"><small class="text-muted">' . $row['nama'] . '</small></p>
                        <a class="uk-align-center uk-button uk-button-primary" href="#" target="_Blank">' . $row['email'] . '</a>
                       
                      
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>';
            }

            echo json_encode($data);
        }
    }

    public function list_contact()
    {
        $contactus = $this->con->get_cont();
        $no = 1;
        foreach ($contactus as $row) {
            if ($row['hits'] == 1) {
                $color = '<i class="fas fa-exclamation text-warning"></i>';
            } else {
                $color = '';
            }
            $tbody = array();


            $nama = '' . $color . '<a type="button" onclick="section2(' . $row['id_cont'] . ')">' . $row['nama'] . '</a>';
            $tbody[] = $nama;
            $email = '<a type="button" onclick="section2(' . $row['id_cont'] . ')">' . $row['email'] . '</a>';
            $tbody[] = $email;
            $subject = '<a type="button" onclick="section2(' . $row['id_cont'] . ')">' . $row['subject'] . '</a>';
            $tbody[] = $subject;
            $tbody[] = $this->waktu_lalu($row['date_post']);

            $action = '<a href="#" onclick="delete_data(' . $row['id_cont'] . ')"><i
        class="align-middle fas fa-fw fa-trash text-danger"></i></a>';
            $tbody[] = $action;
            $data[] = $tbody;
        }
        if ($contactus) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }



    public function jumlahnotif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->con->getJlhdata('contact_us');
            echo json_encode($data);
        }
    }

    public function new_testi()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $notiftesti = $this->testi->get_newtesti();
            $data = array();
            foreach ($notiftesti as $row) {

                $data[] = ' <tr><td> <a type="button"><img
                                            src="' . base_url() . 'assets/upload/poto/' . $row['foto'] . '" width="32"
                                            height="32" class="rounded-circle my-n1" alt="Avatar"></a></td>
                                <td>' . $row['nama'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['testi'] . '</td>
                                <td>' . $this->waktu_lalu($row['date_post']) . '</td>
                                <td>
                                <a href="#" onclick="terima(' . $row['id_testi'] . ')"><i class="fas fa-check"></i></a>

                                    <a href="#" onclick="delete_data(' . $row['id_testi'] . ')"><i
                                            class="align-middle fas fa-fw fa-trash text-danger"></i></a>
                                </td></tr>';
            }
            echo json_encode($data);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->testi->get_testibyid($id);
            echo json_encode($data);
        }
    }



    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->con->delete_Byid($id);
        }
    }
}
