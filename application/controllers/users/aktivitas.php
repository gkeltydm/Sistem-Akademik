<?php 
    class Aktivitas extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('mahasiswa_model');
            $this->load->model('aktivitas_model');
            $this->load->model('user_model');
        }
        
        public function index(){
            // $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
            // $data['aktivitas'] = $this->aktivitas_model->tampil_data('aktivitas')->result();
            // $data_admin = $this->getAdminData();

            // $nim = $this->session->userdata('nim');
    
            // $this->load->model('mahasiswa_model');
            
            // $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
            // $data1['mahasiswa'] = $mahasiswa_data;

            // $this->load->view('templates_users/header');
            // $this->load->view('templates_users/sidebar', $data1);
            // $this->load->view('users/aktivitas', $data);
            // $this->load->view('templates_users/footer');
            $nim = $this->session->userdata('nim');

            $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);

        // Kirim data mahasiswa ke view
        $data['mahasiswa'] = $mahasiswa_data;

            $data['detail'] = $this->aktivitas_model->ambil_detail_aktivitas_by_id($nim);
            $data['aktivitas'] = $this->aktivitas_model->get_aktivitas();
            $data_admin = $this->getAdminData();

            $nim = $this->session->userdata('nim');
    
            $this->load->model('mahasiswa_model');
            
            $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
            $data1['mahasiswa'] = $mahasiswa_data;

            $this->load->view('templates_users/header');
            $this->load->view('templates_users/sidebar',$data1);
            $this->load->view('users/aktivitas_detail', $data);
            $this->load->view('templates_users/footer');
        }

        // public function detail($id){    
        //     $data['detail'] = $this->aktivitas_model->ambil_detail_aktivitas_by_id($id);
        //     $data['aktivitas'] = $this->aktivitas_model->get_aktivitas();
        //     $data_admin = $this->getAdminData();

        //     $nim = $this->session->userdata('nim');
    
        //     $this->load->model('mahasiswa_model');
            
        //     $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
        //     $data1['mahasiswa'] = $mahasiswa_data;

        //     $this->load->view('templates_users/header');
        //     $this->load->view('templates_users/sidebar',$data1);
        //     $this->load->view('users/aktivitas_detail', $data);
        //     $this->load->view('templates_users/footer');
        // }
        

        private function getAdminData() {
            $dataa = $this->user_model->ambil_data($this->session->userdata('username'));
            return array(
                'username' => $dataa->username,
                'level' => $dataa->level, 
            );
        }
    }
?>