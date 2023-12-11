<?php

class Surat extends CI_Controller {
    
    public function index() {
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data_admin);
        $this->load->view('administrator/surat_view');
        $this->load->view('templates_administrator/footer');
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
