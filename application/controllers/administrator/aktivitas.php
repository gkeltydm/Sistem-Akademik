<?php 
    class Aktivitas extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('mahasiswa_model');
            $this->load->model('aktivitas_model');
            $this->load->model('user_model');
        }
        
        public function index(){
            $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
            $data['aktivitas'] = $this->aktivitas_model->tampil_data('aktivitas')->result();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar', $data_admin);
            $this->load->view('administrator/aktivitas', $data);
            $this->load->view('templates_administrator/footer');
        }

        public function detail($id){    
            $data['detail'] = $this->aktivitas_model->ambil_detail_aktivitas_by_id($id);
            $data['aktivitas'] = $this->aktivitas_model->get_aktivitas();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/aktivitas_detail', $data);
            $this->load->view('templates_administrator/footer');
        }
        
        public function tambah_aktivitas(){
            $data_admin = $this->getAdminData();
            $this->aktivitas_model->tampil_data('aktivitas');
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/aktivitas_form');
            $this->load->view('templates_administrator/footer');
        }   

        public function tambah_aktivitas_aksi(){
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->tambah_aktivitas();
            } else {
                $aktivitas=$this->input->post('aktivitas');
                $deskripsi_aktivitas=$this->input->post('deskripsi_aktivitas');
                $jenis_aktivitas=$this->input->post('jenis_aktivitas');
                $tanggal_aktivitas=$this->input->post('tanggal_aktivitas');
                $keterangan_aktivitas=$this->input->post('keterangan_aktivitas');
        
                $data = array(
                    'aktivitas' => $aktivitas,
                    'deskripsi_aktivitas' => $deskripsi_aktivitas,
                    'jenis_aktivitas' => $jenis_aktivitas,
                    'tanggal_aktivitas' => $tanggal_aktivitas,
                    'keterangan_aktivitas' => $keterangan_aktivitas,
                );
        
                $this->aktivitas_model->insert_data($data, 'aktivitas');
        
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Input Aktivitas Mahasiswa Berhasil! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');

                redirect('administrator/aktivitas');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('aktivitas','aktivitas', 'required', ['required' => 'aktivitas wajib diisi!']);
            $this->form_validation->set_rules('deskripsi_aktivitas','deskripsi_aktivitas', 'required', ['required' => 'deskripsi aktivitas wajib diisi!']);
            $this->form_validation->set_rules('jenis_aktivitas','jenis_aktivitas', 'required', ['required' => 'jenis aktivitas wajib diisi!']);
            $this->form_validation->set_rules('tanggal_aktivitas','tanggal_aktivitas', 'required', ['required' => 'tanggal_aktivitas wajib diisi!']);
            $this->form_validation->set_rules('keterangan_aktivitas','keterangan_aktivitas', 'required', ['required' => 'keterangan aktivitas wajib diisi!']);
        }

        public function aktivitas_hapus($id_aktivitas) {
            $aktivitas_exists = $this->aktivitas_model->cek_aktivitas_exists($id_aktivitas);

            if ($aktivitas_exists) {
                $this->aktivitas_model->aktivitas_hapus($id_aktivitas);
        
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Aktivitas Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                setTimeout(function(){
                    $("#alert").alert("close");
                }, 5000);
            </script>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Aktivitas Mahasiswa tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            }
            redirect("administrator/aktivitas");
        }

        public function edit_aktivitas($id) {
            $data['aktivitas'] = $this->aktivitas_model->get_by_id($id);
            
            if ($data['aktivitas']) {
                $data['id_aktivitas'] = $id; // Menyimpan nilai ID aktivitas
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar', $data_admin);
                $this->load->view('administrator/aktivitas_edit', $data); // Gunakan view yang sesuai, misalnya 'aktivitas_edit'
                $this->load->view('templates_administrator/footer');
            } else {
                show_404(); // Tampilkan halaman 404 jika data tidak ditemukan
            }
        }
        
        public function edit_aktivitas_aksi() {
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->edit_aktivitas();
            } else {
                // Ambil nilai ID aktivitas dari form
                $id_aktivitas = $this->input->post('id_aktivitas');
                
                // Ambil nilai input dari form
                $aktivitas = $this->input->post('aktivitas');
                $deskripsi_aktivitas = $this->input->post('deskripsi_aktivitas');
                $jenis_aktivitas = $this->input->post('jenis_aktivitas');
                $tanggal_aktivitas = $this->input->post('tanggal_aktivitas');
                $keterangan_aktivitas = $this->input->post('keterangan_aktivitas');
                
                // Data yang akan diupdate
                $data = array(
                    'aktivitas' => $aktivitas,
                    'deskripsi_aktivitas' => $deskripsi_aktivitas,
                    'jenis_aktivitas' => $jenis_aktivitas,
                    'tanggal_aktivitas' => $tanggal_aktivitas,
                    'keterangan_aktivitas' => $keterangan_aktivitas,
                );
                
                // Panggil fungsi model untuk melakukan update
                $this->aktivitas_model->aktivitas_update($id_aktivitas, $data);
                
                // Set flash data untuk memberikan pesan berhasil
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Aktivitas Mahasiswa Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                
                // Redirect ke halaman aktivitas setelah berhasil update
                redirect('administrator/aktivitas');
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