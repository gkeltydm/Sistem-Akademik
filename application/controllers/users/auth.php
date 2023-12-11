<?php

class Auth extends CI_Controller{

    public function index(){
        $this->load->view('templates_users/header');
        $this->load->view('users/login');
        $this->load->view('templates_users/footer');
    }

    public function proses_login(){
        $this->form_validation->set_rules('username','username','required', ['required' => 'Username Wajib disi!']);
        $this->form_validation->set_rules('password','password','required', ['required' => 'Password Wajib disi!']);
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates_users/header');
            $this->load->view('users/login');
            $this->load->view('templates_users/footer');
        }

        else{

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->login_model->cek_login($user, $pass);

            if($cek->num_rows() > 0){
                foreach($cek->result() as $ck){
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;
                    $sess_data['nim'] = $ck->nim;

                    $this->session->set_userdata($sess_data);
                }

                if($sess_data['level'] == 'user'){
                    redirect('users/dashboard');
                }
 
                else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username Atau Password Salah! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                    redirect('users/auth');
                }
                
            }

            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username Atau Password Salah! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('users/auth');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('users/auth');
    }
}

?>