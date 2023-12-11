<?php

class Mahasiswa extends CI_Controller{
    public function index() {
        $this->load->model('mahasiswa_model');
        
        // Ambil nim dari session
        $nim = $this->session->userdata('nim');

        // Dapatkan data mahasiswa berdasarkan nim
        $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);

        // Kirim data mahasiswa ke view
        $data['mahasiswa'] = $mahasiswa_data;

        // Load view
        $this->load->view('templates_users/header');
        $this->load->view('templates_users/sidebar', $data);
        $this->load->view('users/mahasiswa', $data);    
        $this->load->view('templates_users/footer');
        
    }

}
?>