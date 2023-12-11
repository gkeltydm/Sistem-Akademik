<?php 
class Ukt extends CI_Controller{

    public function index(){
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $data['ukt'] = $this->ukt_model->tampil_data('ukt')->result();
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data_admin);
        $this->load->view('administrator/ukt', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id){    
        $detail = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $ukt = $this->db->query("SELECT * FROM ukt WHERE id_mahasiswa='$id'")->result();
        $ukt_belum_lunas = $this->ukt_model->get_belum_lunas_by_id($id);
        $data = array(
            'profil_mahasiswa' => $detail,
            'ukt_belum_lunas' => $ukt_belum_lunas,
            'ukt' => $ukt,
        );
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/ukt_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function history($id){
        $ukt = $this->db->query("SELECT * FROM ukt WHERE id_mahasiswa='$id'")->result();
        $ukt_history = $this->payment_model->get_ukt_history($id);

        $detail = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $data = array(
            'profil_mahasiswa' => $detail,
            'ukt' => $ukt,
            'ukt_history' => $ukt_history
        );
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/ukt_history', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_ukt($id){
        $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id'")->result();
        $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/ukt_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_ukt_aksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambah_ukt($this->input->post('id'));
        } else {
            $jenis_ukt = $this->input->post('jenis_ukt');
            $total_ukt = $this->input->post('total');
            $tgl_pembuatan = date('Y-m-d H:i:s');
            $id = $this->input->post('id');
            $status_ukt = $this->input->post('status_ukt');
            $tenggat_ukt = $this->input->post('tenggat_ukt');

            $data = array(
                'jenis_ukt' => $jenis_ukt,
                'total_ukt' => (int)$total_ukt,
                'id_mahasiswa' => $id,
                'status_ukt' => $status_ukt,
                'tenggat_ukt' => $tenggat_ukt
            );

            $this->ukt_model->insert_data($data, 'ukt');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                UKT Mahasiswa Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 200);
                </script>');
            redirect('administrator/ukt');
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('total','total', 'required', ['required' => 'jumlah tagihan wajib diisi!']);
        $this->form_validation->set_rules('jenis_ukt','jenis_ukt', 'required', 'required|in_list[Non Beasiswa,Beasiswa]');
        $this->form_validation->set_rules('status_ukt', 'Status UKT', 'required|in_list[Belum Lunas,Lunas]');
        $this->form_validation->set_rules('tenggat_ukt', 'Tenggat UKT', 'required|date');
    }

    public function hapus_ukt($id_ukt) {
        // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be deleted
        $data['ukt'] = $this->ukt_model->get_by_id($id_ukt);
        $id_mahasiswa = $data['ukt']->id_mahasiswa;
        // Check if the tagihan exists
        $ukt_exists = $this->ukt_model->cek_ukt_exists($id_mahasiswa);
    
        if ($ukt_exists) {
            // Delete the tagihan entry
            $this->ukt_model->hapus_ukt($id_ukt);
    
            // Set flashdata or any success message
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                UKT Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
            setTimeout(function(){
                $("#alert").alert("close");
            }, 5000);
        </script>');
        } else {
            // Set flashdata or any error message
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                UKT Mahasiswa tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
    
        // Redirect to the appropriate page
        redirect('administrator/ukt');
    }

    public function edit_ukt($id_ukt) {
        // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be edited
    
        // Retrieve existing tagihan data
        $data['ukt'] = $this->ukt_model->get_by_id($id_ukt);
        $id_mahasiswa = $data['ukt']->id_mahasiswa;
        $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id_mahasiswa'")->result();
        $data_admin = $this->getAdminData();
        if (!$data['ukt']) {
            // Set flashdata or any error message if the tagihan is not found
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                UKT Mahasiswa tidak ditemukan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    
            // Redirect to the appropriate page
            redirect('administrator/ukt');
        }
    
        // Load view with edit form
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/ukt_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function update_ukt($id_ukt) {
        // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be updated
    
        // Handle form submission
        $this->_rules();
        // Add more validation rules as needed
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, redisplay the form with validation errors
            $this->edit_ukt($id_ukt);
        } else {
            // If validation passes, update the tagihan data
            $jenis_ukt = $this->input->post('jenis_ukt');
            $total_ukt = $this->input->post('total');
            $status_ukt= $this->input->post('status_ukt');
            $tenggat_ukt = $this->input->post('tenggat_ukt');
            
    
            $data = array(
                'jenis_ukt' => $jenis_ukt,
                'total_ukt' => (int)$total_ukt,
                'status_ukt' => $status_ukt,
                'tenggat_ukt' => $tenggat_ukt
                
            );
    
            $this->ukt_model->update_ukt($id_ukt, $data);
    
            // Set flashdata or any success message
            $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            UKT Mahasiswa Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function(){
                $("#alert").alert("close");
            }, 5000);
        </script>');
            // Redirect to the appropriate page
            redirect('administrator/ukt');
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
