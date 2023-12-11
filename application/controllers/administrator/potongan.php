<?php 
        class Potongan extends CI_Controller{

            public function index(){
                $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
                $data['potongan'] = $this->potongan_model->tampil_data('potongan')->result();
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar', $data_admin);
                $this->load->view('administrator/potongan', $data);
                $this->load->view('templates_administrator/footer');
            }

            public function detail($id){    
                $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
                $data['potongan'] = $this->db->query("SELECT * FROM potongan WHERE id_mahasiswa='$id'")->result();
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/potongan_detail', $data);
                $this->load->view('templates_administrator/footer');
            }

            public function tambah_potongan($id){
                $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id'")->result();
                $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
                $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/potongan_form', $data);
                $this->load->view('templates_administrator/footer');
            }

            public function tambah_potongan_aksi() {
                $this->_rules();
            
                if ($this->form_validation->run() == FALSE) {
                    $this->tambah_potongan($this->input->post('id'));
                } else {
                    $nama_potongan = $this->input->post('nama_potongan');
                    $besaran_potongan = $this->input->post('besaran_potongan');
                    $tgl_pembuatan = date('Y-m-d H:i:s');
                    $id = $this->input->post('id');
            
                    $data = array(
                        'nama_potongan' => $nama_potongan,
                        'besaran_potongan' => (int)$besaran_potongan,
                        'id_mahasiswa' => $id,

                    );
            
                    $this->potongan_model->insert_data($data, 'potongan');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Potongan UKT Mahasiswa Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        setTimeout(function(){
                            $("#alert").alert("close");
                        }, 5000);
                    </script>');
                    redirect('administrator/potongan');
                }
            }
            
            public function _rules(){
                $this->form_validation->set_rules('besaran_potongan','besaran_potongan', 'required', ['required' => 'jumlah potongan wajib diisi!']);
                $this->form_validation->set_rules('nama_potongan','nama_potongan', 'required', ['required' => 'nama potongan wajib diisi!']);
                

            }

            public function hapus_potongan($id_mahasiswa) {
                // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be deleted
            
                // Check if the tagihan exists
                $potongan_exists = $this->potongan_model->cek_potongan_exists($id_mahasiswa);
            
                if ($potongan_exists) {
                    // Delete the tagihan entry
                    $this->potongan_model->hapus_potongan($id_mahasiswa);
            
                    // Set flashdata or any success message
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Potongan Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                } else {
                    // Set flashdata or any error message
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Potongan Mahasiswa tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                }
            
                // Redirect to the appropriate page
                redirect('administrator/potongan');
            }

            public function edit_potongan($id_mahasiswa) {
                // Assume $id_mahasiswa is passed as a parameter representing the potongan ID to be edited
            
                // Retrieve existing potongan data
                $data['potongan'] = $this->potongan_model->get_potongan_by_id($id_mahasiswa);
                $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id_mahasiswa'")->result();
                $data_admin = $this->getAdminData();
                if (!$data['potongan']) {
                    // Set flashdata or any error message if the potongan is not found
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Potongan Mahasiswa tidak ditemukan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            
                    // Redirect to the appropriate page
                    redirect('administrator/potongan');
                }
            
                // Load view with edit form
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/potongan_update', $data);
                $this->load->view('templates_administrator/footer');
            }
            
            public function update_potongan($id_mahasiswa) {
                // Assume $id_mahasiswa is passed as a parameter representing the potongan ID to be updated
            
                // Handle form submission
                $this->_rules();
                // Add more validation rules as needed
            
                if ($this->form_validation->run() == FALSE) {
                    // If validation fails, redisplay the form with validation errors
                    $this->edit_potongan($id_mahasiswa);
                } else {
                    // If validation passes, update the potongan data
                    $jenis_potongan = $this->input->post('nama_potongan');
                    $nominal = $this->input->post('besaran_potongan');
                    $tgl_pembuatan = date('Y-m-d H:i:s');
                    
            
                    $data = array(
                        'nama_potongan' => $jenis_potongan,
                        'besaran_potongan' => (int)$nominal,
                        
                    );
            
                    $this->potongan_model->update_potongan($id_mahasiswa, $data);
            
                    // Set flashdata or any success message
                    $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    Potongan Mahasiswa Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                    // Redirect to the appropriate page
                    redirect('administrator/potongan');
                }
            }

            public function getAdminData() {
                $dataa = $this->user_model->ambil_data($this->session->userdata('username'));
                return array(
                    'username' => $dataa->username,
                    'level' => $dataa->level, 
                );
            }    
            
        }
?>