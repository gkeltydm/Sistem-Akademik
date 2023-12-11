<?php 
    class Konseling extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('mahasiswa_model');
            $this->load->model('konseling_model');
            $this->load->model('user_model');
        }
        
        public function index(){
            $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
            $data['konseling'] = $this->konseling_model->tampil_data('konseling')->result();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar', $data_admin);
            $this->load->view('administrator/konseling', $data);
            $this->load->view('templates_administrator/footer');
        }

        public function detail($id){    
            $data['detail'] = $this->konseling_model->ambil_detail_konseling_by_id($id);
            $data['konseling'] = $this->konseling_model->get_konseling();
            $data_admin = $this->getAdminData();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/konseling_detail', $data);
            $this->load->view('templates_administrator/footer');
        }
        
        public function tambah_konseling(){
            $data_admin = $this->getAdminData();
            $data['dosen'] = $this->dosen_model->tampil_data('dosen')->result();
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar',$data_admin);
            $this->load->view('administrator/konseling_form', $data);
            $this->load->view('templates_administrator/footer');
        }   

        public function tambah_konseling_aksi()
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->tambah_konseling();
            } else {
                $jenis_bimbingan=$this->input->post('jenis_bimbingan');
                $deskripsi_bimbingan=$this->input->post('deskripsi_bimbingan');
                $tanggal_bimbingan=$this->input->post('tanggal_bimbingan');
                $keterangan_bimbingan=$this->input->post('keterangan_bimbingan');
                $nama_dosen=$this->input->post('nama_dosen');

        
                $data = array(
                    'jenis_bimbingan'      => $jenis_bimbingan,
                    'deskripsi_bimbingan'  => $deskripsi_bimbingan,
                    'tanggal_bimbingan'    => $tanggal_bimbingan,
                    'keterangan_bimbingan' => $keterangan_bimbingan,
                    'dosen_pembimbing'     => $nama_dosen,
            
                );
        
                $this->konseling_model->insert_data($data, 'konseling');

        
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Input Bimbingan Mahasiswa Berhasil! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');

                redirect('administrator/konseling');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('jenis_bimbingan','jenis_bimbingan', 'required', ['required' => 'Jenis Bimbingan wajib diisi!']);
            $this->form_validation->set_rules('deskripsi_bimbingan','deskripsi_bimbingan', 'required', ['required' => 'Deskripsi Bimbingan wajib diisi!']);
            $this->form_validation->set_rules('tanggal_bimbingan','tanggal_bimbingan', 'required', ['required' => 'Tanggal Bimbingan wajib diisi!']);
            $this->form_validation->set_rules('keterangan_bimbingan','keterangan_bimbingan', 'required', ['required' => 'Keterangan Bimbingan wajib diisi!']);
            $this->form_validation->set_rules('nama_dosen','nama_dosen', 'required', ['required' => 'Dosen Pembimbing wajib dipilih!']);
        }

        public function konseling_hapus($id) {
            $konseling_exists = $this->konseling_model->cek_konseling_exists($id);

            if ($konseling_exists) {
                $this->konseling_model->konseling_hapus($id);
        
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Bimbingan Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                setTimeout(function(){
                    $("#alert").alert("close");
                }, 5000);
            </script>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Bimbingan Mahasiswa tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            }
            redirect("administrator/konseling");
        }

        public function edit_konseling($id) {
            $data['konseling'] = $this->konseling_model->get_by_id($id);
            
            if ($data['konseling']) {
                $data['id_konseling'] = $id; 
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar', $data_admin);
                $this->load->view('administrator/konseling_edit', $data); 
                $this->load->view('templates_administrator/footer');
            } else {
                show_404();
            }
        }
        
        public function edit_konseling_aksi() {
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $this->edit_konseling();
            } else {
                
                $id_konseling = $this->input->post('id_konseling');
                
                
                $jenis_bimbingan=$this->input->post('jenis_bimbingan');
                $deskripsi_bimbingan=$this->input->post('deskripsi_bimbingan');
                $tanggal_bimbingan=$this->input->post('tanggal_bimbingan');
                $keterangan_bimbingan=$this->input->post('keterangan_bimbingan');
                $nama_dosen=$this->input->post('nama_dosen');
                
               
                $data = array(
                    'jenis_bimbingan'      => $jenis_bimbingan,
                    'deskripsi_bimbingan'  => $deskripsi_bimbingan,
                    'tanggal_bimbingan'    => $tanggal_bimbingan,
                    'keterangan_bimbingan' => $keterangan_bimbingan,
                    'nama_dosen'     => $nama_dosen,
                );
                
               
                $this->konseling_model->konseling_update($data, 'konseling');
                
            
                $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Bimbingan  Mahasiswa Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                
                
                redirect('administrator/konseling');
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