<?php 
        class Tagihan extends CI_Controller{

            public function index(){

                $this->load->model('mahasiswa_model');
        
                // Ambil nim dari session
                $nim = $this->session->userdata('nim');
        
                // Dapatkan data mahasiswa berdasarkan nim
                $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);
        
                // Kirim data mahasiswa ke view
                $data1['mahasiswa'] = $mahasiswa_data;
                
                
                $id_mahasiswa = $this->session->userdata('nim');
                $data = $this->user_model->get_user_by_id($id_mahasiswa);
                $tagihan = $this->db->query("SELECT * FROM tagihan WHERE id_mahasiswa='$id_mahasiswa'")->result();
                $tagihan_belum_lunas = $this->tagihan_model->get_belum_lunas_by_id($id_mahasiswa);
                $payment_history = $this->pembayaran_model->get_payment_history($id_mahasiswa);
            
                $data_view = array(
                    // 'username' => $data->username,
                    // 'level' => $data->level,
                    'profil_mahasiswa' => $data,
                    'tagihan_belum_lunas' => $tagihan_belum_lunas,
                    'tagihan' => $tagihan,
                    'payment_history' => $payment_history
                );

                $this->load->view('templates_users/header');
                $this->load->view('templates_users/sidebar',$data1);
            
                if (!empty($tagihan_belum_lunas)) {
                    // Load view for tagihan
                    $this->load->view('users/tagihan', $data_view);
                } elseif (empty($tagihan_belum_lunas)) {
                     // Assuming you want to get payment history for the first tagihan
                    
                    $this->load->view('users/payment_history', $data_view);
                    
                }else{
                    // If either $data or $tagihan is empty, load a different view
                    $this->load->view('users/no_tagihan', $data_view);
                }
            
                $this->load->view('templates_users/footer');
            }
            
            // Helper functions to check tagihan status
            private function hasLunasTagihan($tagihan) {
                return !empty($tagihan) && isset($tagihan[0]->status_tagihan) && $tagihan[0]->status_tagihan === 'LUNAS';
            }
            
            private function hasBelumLunasTagihan($tagihan) {
                return !empty($tagihan) && isset($tagihan[0]->status_tagihan) && $tagihan[0]->status_tagihan === 'BELUM LUNAS';
            }
            
    }
?>