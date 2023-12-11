<?php 
    class Pelanggaran extends CI_Controller{
        public function index(){
            // $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
            // $data['pelanggaran'] = $this->pelanggaran_model->tampil_data('pelanggaran')->result();
            // $data_admin = $this->getAdminData();

            // $nim = $this->session->userdata('nim');
    
            // $this->load->model('mahasiswa_model');
            
            // $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
            // $data1['mahasiswa'] = $mahasiswa_data;

            // $this->load->view('templates_users/header');
            // $this->load->view('templates_users/sidebar', $data1);
            // $this->load->view('users/pelanggaran', $data);
            // $this->load->view('templates_users/footer');

            $nim = $this->session->userdata('nim');

            $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);

        
            $data['mahasiswa'] = $mahasiswa_data;

            $data['detail'] = $this->pelanggaran_model->ambil_detail_pelanggaran_by_nim($nim);
            $data['pelanggaran'] = $this->pelanggaran_model->get_pelanggaran();
            $data_admin = $this->getAdminData();

            $nim = $this->session->userdata('nim');
    
            $this->load->model('mahasiswa_model');
            
            $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
            $data1['mahasiswa'] = $mahasiswa_data;


            $this->load->view('templates_users/header');
            $this->load->view('templates_users/sidebar',$data1);
            $this->load->view('users/pelanggaran_detail', $data);
            $this->load->view('templates_users/footer');

        }

        // public function detail($id){    
        //     $data['detail'] = $this->pelanggaran_model->ambil_detail_pelanggaran_by_id($id);
        //     $data['pelanggaran'] = $this->pelanggaran_model->get_pelanggaran();
        //     $data_admin = $this->getAdminData();

        //     $nim = $this->session->userdata('nim');
    
        //     $this->load->model('mahasiswa_model');
            
        //     $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
        //     $data1['mahasiswa'] = $mahasiswa_data;


        //     $this->load->view('templates_users/header');
        //     $this->load->view('templates_users/sidebar',$data1);
        //     $this->load->view('users/pelanggaran_detail', $data);
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