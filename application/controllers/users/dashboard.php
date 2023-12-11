<?php

class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();

        if(!isset($this->session->userdata['username'])){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');

          redirect('users/auth');
        }
    }

    public function index(){
        $data = $this->user_model->ambil_data($this->session->userdata ['username']);
        $data = array(
            'username' => $data->username,
            'level' => $data->level, 
        );

        $this->load->model('mahasiswa_model');
        
        // Ambil nim dari session
        $nim = $this->session->userdata('nim');

        // Dapatkan data mahasiswa berdasarkan nim
        $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);

        // Kirim data mahasiswa ke view
        $data1['mahasiswa'] = $mahasiswa_data;
        
        $this->load->view('templates_users/header');
        $this->load->view('templates_users/sidebar',$data1);
        $this->load->view('users/dashboard', $data);
        $this->load->view('templates_users/footer');
    }
}

?>