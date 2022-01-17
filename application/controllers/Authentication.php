<?php

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function has_verify($plain_text, $hashed_string)
    {
        $hashed_string = password_verify($plain_text, $hashed_string);
        return $hashed_string;
    }

    public function login()
    {
        if (!$this->session->has_userdata('user')) {
            $this->form_validation->set_rules('email', 'email', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim');
            if ($this->form_validation->run() == false) {

                $this->load->view('authentication/login');
            } else {
                $username = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $this->db->select('email, password');
                $this->db->from('user');
                $this->db->where('email =', $username);
                $users = $this->db->get()->row_array();

                if ($users) {
                    // if (password_verify($password, $users['password'])) {
                    if ($password == $users['password']) {
                        $data = [
                            'user' =>
                            [
                                'email' => $users['email'],
                                'password' => $users['password'],
                            ]
                        ];
                        $this->session->set_userdata($data);
                        redirect(base_url());
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!</div>');
                        redirect(base_url('authentication/login'));
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak teregistrasi!</div>');
                    redirect(base_url('authentication/login'));
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function logout()
    {
        if ($this->session->has_userdata('user')) {
            $this->session->unset_userdata('user');
        }
        redirect(base_url('authentication/login'));
    }

    public function testmd5(){
        $this->db->select('email, password');
        $this->db->from('user');
        $this->db->where('email =','fmaurtino@gmail.com');
        $users = $this->db->get()->num_rows();
        $password_md5 = md5($users['password']);
        var_dump($password_md5);
    }
}
