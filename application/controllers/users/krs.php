<?php 

class Krs extends CI_Controller{
    public function index(){
        $nim = $this->session->userdata('nim');
        $data = array(
            'nim' => $nim,
            'id_thn_akad' => set_value('id_thn_akad')
        );



      $this->load->model('mahasiswa_model');
        
        // Dapatkan data mahasiswa berdasarkan nim
        $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);

        // Kirim data mahasiswa ke view
        $data1['mahasiswa'] = $mahasiswa_data;
        
        $this->load->view('templates_users/header');
        $this->load->view('templates_users/sidebar',$data1);
        $this->load->view('users/masuk_krs', $data);
        $this->load->view('templates_users/footer');
    }
    public function krs_aksi() {
        $this->_rulesKrs();
        if($this->form_validation->run() == FALSE) {
            $this->index();
            } else {
                $nim=$this->input->post('nim',TRUE);
                $thn_akad=$this->input->post('id_thn_akad',TRUE);
                
}
        if($this->mahasiswa_model->get_by_id($nim)==null){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Mahasiswa yang Anda Input Belum Terdaftar <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>');
            redirect('users/krs');
        }

        $data = array(
            'nim' => $nim,
            'id_thn_akad'=>$thn_akad,
            'nama_lengkap' =>$this->mahasiswa_model->get_by_id($nim)->nama_lengkap
        );
        $dataKrs = array(
            'krs_data' => $this->baca_krs($nim,$thn_akad),
            'nim' => $nim,
            'id_thn_akad' => $thn_akad,
            'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester== 1?'Ganjil' : 'Genap',
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'prodi' => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
        );

        $this->load->model('mahasiswa_model');
        
        // Ambil nim dari session
        $nim = $this->session->userdata('nim');

        // Dapatkan data mahasiswa berdasarkan nim
        $mahasiswa_data = $this->mahasiswa_model->getMahasiswaByNIM($nim);

        // Kirim data mahasiswa ke view
        $data1['mahasiswa'] = $mahasiswa_data;
        
        $this->load->view('templates_users/header');
        $this->load->view('templates_users/sidebar',$data1);
        $this->load->view('users/krs_list', $dataKrs);
        $this->load->view('templates_users/footer');

    }

    public function baca_krs($nim,$thn_akad){
        $this->db->select('k.id_krs,k.kode_matakuliah, m.nama_matakuliah,m.sks');
        $this->db->from('krs as k');
        $this->db->where('k.nim', $nim);
        $this->db->where('k.id_thn_akad', $thn_akad);
        $this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');

        $krs = $this->db->get()->result();
        return $krs;
    }

    public function _rulesKrs() {
        $this->form_validation->set_rules('nim','nim','required');
        $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required');
        
    }
public function _rules() {
    $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required');
    $this->form_validation->set_rules('nim','nim','required');
    $this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required');
    
}

}

?>