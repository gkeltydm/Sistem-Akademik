<?php 
    class Pelanggaran extends CI_Controller{
        public function index(){
            $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
            $data['pelanggaran'] = $this->pelanggaran_model->tampil_data('pelanggaran')->result();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar', $data_admin);
            $this->load->view('administrator/pelanggaran', $data);
            $this->load->view('templates_administrator/footer');
        }

        public function detail($id){    
            $data['detail'] = $this->pelanggaran_model->ambil_detail_pelanggaran_by_id($id);
            $data['pelanggaran'] = $this->pelanggaran_model->get_pelanggaran();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/pelanggaran_detail', $data);
            $this->load->view('templates_administrator/footer');
        }
        
        public function tambah_pelanggaran(){
            $data_admin = $this->getAdminData();
            $this->pelanggaran_model->tampil_data('pelanggaran');
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/pelanggaran_form');
            $this->load->view('templates_administrator/footer');
        }   

        public function tambah_pelanggaran_aksi(){
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->tambah_pelanggaran();
            } else {
                $tanggal_pelanggaran=$this->input->post('tanggal_pelanggaran');
                $deskripsi_pelanggaran=$this->input->post('deskripsi_pelanggaran');
        
                $data = array(
                'tanggal_pelanggaran'=> $tanggal_pelanggaran,
                'deskripsi_pelanggaran'=> $deskripsi_pelanggaran,
                );
                $this->pelanggaran_model->insert_data($data, 'pelanggaran');
        
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Input Riwayat Pelanggaran Mahasiswa Berhasil! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');

                redirect('administrator/pelanggaran');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('tanggal_pelanggaran','tanggal_pelanggaran', 'required', ['required' => 'tanggal wajib diisi!']);
            $this->form_validation->set_rules('deskripsi_pelanggaran','deskripsi_pelanggaran', 'required', ['required' => 'deskripsi pelanggaran wajib diisi!']);
        }

        public function pelanggaran_hapus($id_pelanggaran) {
            $pelanggaran_exists = $this->pelanggaran_model->cek_pelanggaran_exists($id_pelanggaran);

            if ($pelanggaran_exists) {
                $this->pelanggaran_model->pelanggaran_hapus($id_pelanggaran);
        
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Riwayat Pelanggaran Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                setTimeout(function(){
                    $("#alert").alert("close");
                }, 5000);
            </script>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Riwayat Pelanggaran Mahasiswa tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            }
            redirect("administrator/pelanggaran");
        }

        public function edit_pelanggaran($id) {
            $data['pelanggaran'] = $this->pelanggaran_model->get_by_id($id);
            
            if ($data['pelanggaran']) {
                $data['id_pelanggaran'] = $id;
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar', $data_admin);
                $this->load->view('administrator/pelanggaran_edit', $data); 
                $this->load->view('templates_administrator/footer');
            } else {
                show_404(); 
            }
        }
        
        public function edit_pelanggaran_aksi() {
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->edit_pelanggaran();
            } else {
                $id_aktivitas = $this->input->post('id_pelanggaran');
                
                $tanggal_pelanggaran=$this->input->post('tanggal_pelanggaran');
                $deskripsi_pelanggaran=$this->input->post('deskripsi_pelanggaran');
        
                $data = array(
                'tanggal_pelanggaran'=> $tanggal_pelanggaran,
                'deskripsi_pelanggaran'=> $deskripsi_pelanggaran,
                );
                
                $this->pelanggaran_model->pelanggaran_update($id_pelanggaran, $data);
                
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Riwayat Pelanggaran Mahasiswa Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                
                redirect('administrator/pelanggaran');
            }
        
        }

        private function getAdminData() {
            $dataa = $this->user_model->ambil_data($this->session->userdata('username'));
            return array(
                'username' => $dataa->username,
                'level' => $dataa->level, 
            );
        }
    }
?>