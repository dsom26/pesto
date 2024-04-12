<?php



class Login extends CI_Controller
{
    //functions

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');

        session_regenerate_id();
    }

    public function index()
    {
        $data['title'] = 'Login';

        //$this->load->view('templates/header', $data);
        $this->load->view("login", $data);
        //$this->load->view('templates/footer');
    }
    public function login_validation()
    {

        $this->form_validation->set_rules('email_id', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {

            $email = $this->input->post('email_id');
            $password = $this->input->post('password');

            $res_user_login = $this->login_model->can_login_admin($email, $password);
            // print_r($res_user_login); exit();

            if (count($res_user_login) > 0) {

                $session_data = array(
                    'user_id' => $res_user_login['id'],
                    'user_name' => $res_user_login['name'],
                    'user_email' => $res_user_login['email_id'],
                    'user_role' => $res_user_login['type']

                );

                $this->session->set_userdata($session_data);

                redirect(base_url() . 'task');

            } else {


                $this->session->set_flashdata('login_error', 'Invalid Email and Password');
                redirect(base_url() . 'login');
            }



        } else {
            $this->session->set_flashdata('login_error', 'Invalid Email / Password');
            $this->index();
            //redirect(base_url() . 'login');
        }
    } //login_validation

    public function enter()
    {
        if ($this->session->userdata('email_id') != '') {
            echo '<h2>Welcome - ' . $this->session->userdata('email') . '</h2>';
            echo '<label><a href="' . base_url() . 'Login/logout">Logout</a></label>';
        } else {
            redirect(base_url() . 'login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email_id');
        unset($_SESSION);
        session_destroy();
        redirect(base_url() . 'login');
    }


}