<?php
class Pendaftaran_online extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model'); // Ganti dengan nama model yang sesuai
    }

    public function index() {
        $data_admin = $this->getAdminData();
        $data['prodi'] = $this->mahasiswa_model->tampil_data('prodi')->result();
        
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/pendaftaran_online',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function daftar_online_aksi(){
        $this->_rules();
    if($this->form_validation->run() == FALSE){
        $this->tambah_mahasiswa();
}
else{
    $nama_depan=$this->input->post('nama_depan');
    $nama_belakang=$this->input->post('nama_belakang');
    $alamat=$this->input->post('alamat');
    $tanggal_lahir=$this->input->post('tanggal_lahir');
    $jenis_kelamin=$this->input->post('jenis_kelamin');
    $email=$this->input->post('email');
    $nomor_handphone=$this->input->post('nomor_handphone');
    $program_studi=$this->input->post('program_studi');
    $tahun_masuk=$this->input->post('tahun_masuk');

   

    $data = array(
        'nama_depan'=> $nama_depan,
        'nama_belakang'=> $nama_belakang,
        'alamat'=> $alamat,
        'tanggal_lahir'=> $tanggal_lahir,
        'jenis_kelamin'=> $jenis_kelamin,
        'email'=> $email,
        'no_handphone'=> $nomor_handphone,
        'program_studi'=> $program_studi,
        'tahun_masuk'=> $tahun_masuk,
    );
    

    $this->pendaftaran_model->insert_data($data,'dokumen_pendaftaran');
    
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Pendaftaran berhasil!! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>');
    redirect('administrator/mahasiswa');
}
}

public function _rules(){
    $this->form_validation->set_rules('nama_depan','nama_depan', 'required', ['required' => 'nama depan wajib diisi!']);
    $this->form_validation->set_rules('nama_belakang','nama_belakang', 'required', ['required' => 'Nama belakang wajib diisi!']);
    $this->form_validation->set_rules('alamat','alamat', 'required', ['required' => 'Alamat wajib diisi!']);
    $this->form_validation->set_rules('tanggal_lahir','tanggal_lahir', 'required', ['required' => 'Tanggal Lahir wajib diisi!']);
    $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin', 'required', ['required' => 'Jenis Kelamin wajib diisi!']);
    $this->form_validation->set_rules('email','email', 'required', ['required' => 'Email wajib diisi!']);
    $this->form_validation->set_rules('nomor_handphone','nomor_handphone', 'required', ['required' => 'nomor handphone wajib diisi!']);
    $this->form_validation->set_rules('program_studi','program_studi', 'required', ['required' => 'Program Studi wajib diisi!']);
    $this->form_validation->set_rules('tahun_masuk','tahun_masuk', 'required', ['required' => 'tahun masuk wajib diisi!']);
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
