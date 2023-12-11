<?php 
    class Program_pmm extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('mahasiswa_model');
            $this->load->model('program_pmm_model');
            $this->load->model('user_model');
        }
        
        public function index(){
            $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
            $data['program_pmm'] = $this->program_pmm_model->tampil_data('program_pmm')->result();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar', $data_admin);
            $this->load->view('administrator/program_pmm', $data);
            $this->load->view('templates_administrator/footer');
        }

        public function detail($id){    
            $data['detail'] = $this->program_pmm_model->ambil_detail_program_pmm_by_id($id);
            $data['program_pmm'] = $this->program_pmm_model->get_program_pmm();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/program_pmm_detail', $data);
            $this->load->view('templates_administrator/footer');
        }
        
        public function tambah_program_pmm(){
            $data_admin = $this->getAdminData();
            $this->program_pmm_model->tampil_data('program_pmm');
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/program_pmm_form');
            $this->load->view('templates_administrator/footer');
        }   

        public function tambah_program_pmm_aksi(){
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->tambah_program_pmm();
            } else {
                $kampus_asal_program_pmm=$this->input->post('kampus_asal_program_pmm');
                $kampus_tujuan_program_pmm=$this->input->post('kampus_tujuan_program_pmm');
                $jurusan_program_pmm=$this->input->post('jurusan_program_pmm');
        
                $data = array(
                    'kampus_asal' => $kampus_asal_program_pmm,
                    'kampus_tujuan' => $kampus_tujuan_program_pmm,
                    'jurusan' => $jurusan_program_pmm,
                );
        
                $this->program_pmm_model->insert_data($data, 'program_pmm');
        
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Input Program PMM Mahasiswa Berhasil! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');

                redirect('administrator/program_pmm');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('kampus_asal_program_pmm','kampus_asal_program_pmm', 'required', ['required' => 'kampus asal program pmm wajib diisi!']);
            $this->form_validation->set_rules('kampus_tujuan_program_pmm','kampus_tujuan_program_pmm', 'required', ['required' => 'kampus tujuan program pmm wajib diisi!']);
            $this->form_validation->set_rules('jurusan_program_pmm','jurusan_program_pmm', 'required', ['required' => 'jurusan program pmm wajib diisi!']);
        }

        public function program_pmm_hapus($id_program_pmm) {
            $program_pmm_exists = $this->program_pmm_model->cek_program_pmm_exists($id_program_pmm);

            if ($program_pmm_exists) {
                $this->program_pmm_model->program_pmm_hapus($id_program_pmm);
        
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Program PMM Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                setTimeout(function(){
                    $("#alert").alert("close");
                }, 5000);
            </script>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Program PMM tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            }
            redirect("administrator/program_pmm");
        }

        public function edit_program_pmm($id) {
            $data['program_pmm'] = $this->program_pmm_model->get_by_id($id);
            
            if ($data['program_pmm']) {
                $data['id_program_pmm'] = $id; // Menyimpan nilai ID aktivitas
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar', $data_admin);
                $this->load->view('administrator/program_pmm_edit', $data); // Gunakan view yang sesuai, misalnya 'aktivitas_edit'
                $this->load->view('templates_administrator/footer');
            } else {
                show_404(); // Tampilkan halaman 404 jika data tidak ditemukan
            }
        }
        
        public function edit_program_pmm_aksi() {
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->edit_program_pmm();
            } else {
                // Ambil nilai ID aktivitas dari form
                $id_program_pmm = $this->input->post('id_program_pmm');
                
                // Ambil nilai input dari form
                $program_pmm = $this->input->post('program_pmm');
                $kampus_asal_program_pmm = $this->input->post('kampus_asal_program_pmm');
                $kampus_tujuan_program_pmm = $this->input->post('kampus_tujuan_program_pmm');
                $jurusan_program_pmm = $this->input->post('jurusan_program_pmm');
                
                // Data yang akan diupdate
                $data = array(
                    'kampus_asal_program_pmm' => $kampus_asal_program_pmm,
                    'kampus_tujuan_program_pmm' => $kampus_tujuan_program_pmm,
                    'jurusan_program_pmm' => $jurusan_program_pmm,
                );
                
                // Panggil fungsi model untuk melakukan update
                $this->program_pmm_model->program_pmm_insert_data($data, 'program_pmm');
                
                // Set flash data untuk memberikan pesan berhasil
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Program PMM Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                
                // Redirect ke halaman aktivitas setelah berhasil update
                redirect('administrator/program_pmm');
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