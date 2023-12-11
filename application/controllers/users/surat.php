<?php

class Surat extends CI_Controller {
    
    public function index() {
        $data_admin = $this->getAdminData();

        $nim = $this->session->userdata('nim');
    
            $this->load->model('mahasiswa_model');
            
            $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
    
            $data1['mahasiswa'] = $mahasiswa_data;

        $this->load->view('templates_users/header');
        $this->load->view('templates_users/sidebar', $data1);
        $this->load->view('users/surat_view');
        $this->load->view('templates_users/footer');
    }

    private function getAdminData() {
        $data = array(
            'username' => 'AdminUsername',
            'level' => 'AdminLevel',
        );
        return $data;
    }

    public function download_template($jenis_surat) {
        $this->load->helper('file');
    
        // Clean up the input to prevent directory traversal
        $jenis_surat = url_title($jenis_surat);
    
        // Construct the file name
        $file_name = $jenis_surat . '.pdf';
        
        // Construct the full file path
        $file_path = FCPATH . 'assets/templates/Surat/' . $file_name;
    
        // Check if the file exists
        if (file_exists($file_path)) {
            // Read the file contents
            $data = file_get_contents($file_path);
    
            // Set the appropriate content type for PDF
            header('Content-Type: application/pdf');
    
            // Send the file as an attachment
            header('Content-Disposition: inline; filename="' . $file_name . '"');
            header('Content-Length: ' . filesize($file_path));
    
            echo $data;
        } else {
            // Handle the case where the file does not exist
            show_404(); 
        }
    }
    
    
    
}
