<?php 

class Users extends CI_Controller{

    public function index(){
        $data['user'] = $this->user_model->tampil_data('user')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/daftar_users', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_users(){
        $data = array(
            'username' => set_value('username'),
            'password' => set_value('password'),
            'nim' => set_value('nim'),
            'email' => set_value('email'),
            'level' => set_value('level'),
            'blokir' => set_value('blokir'),
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/users_form', $data);
        $this->load->view('templates_administrator/footer');
}

public function tambah_users_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
        $this->tambah_users();
    }
    else{
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => md5($this->input->post('password', TRUE)),
            'email' => $this->input->post('email', TRUE),
            'nim' => $this->input->post('nim', TRUE),
            'level' => $this->input->post('level', TRUE),
            'blokir' => $this->input->post('blokir', TRUE),
            'id_session' => md5($this->input->post('id_session', TRUE)),
        );

        $this->user_model->insert_data($data,'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Users Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>');
        redirect('administrator/users');
    }


}

public function _rules(){
    $this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib diisi']);
    $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib diisi']);
    $this->form_validation->set_rules('email','Email','required',['required' => 'Email wajib diisi']);
    $this->form_validation->set_rules('level','Level','required',['required' => 'Level wajib diisi']);
    $this->form_validation->set_rules('blokir','Blokir','required',['required' => 'Blokir wajib diisi']);
}

public function update($id){
    $where = array(
        'id' =>$id
    );

    $data['user']= $this->user_model->edit_data($where,'user')->result();
    $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/users_update', $data);
        $this->load->view('templates_administrator/footer');
}

public function update_aksi(){
    
    $id = $this->input->post('id');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $nim = $this->input->post('nim');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
    $blokir = $this->input->post('blokir');
    $id_sessions = $this->input->post('id_sessions');

    $data = array(
        'username' => $username,
        'password' => $password,
        'nim' => $nim,
        'email' => $email,
        'level' => $level,
        'blokir' => $blokir,
        

    );

    $where = array(
        'id'=> $id
    );

    $this->user_model->update_data($where,$data,'user');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data Users Berhasil Diupdate! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
    redirect('administrator/users');
}

public function hapus($id){
    $where = array('id'=> $id);
    $this->user_model->hapus_data($where,'user');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Data Users Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>');
    redirect('administrator/users');
}

}

?>