<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('main');
    }

    public function index()
    {
        $this->load->view('login_reg');
    }

    public function register()
    {
        $is_valid = $this->user->register_user($this->input->post());
        if($is_valid[0] == 'valid')
        {
            $user = $this->user->get_email($is_valid[1]);
            $this->session->set_userdata('id', $user['id']);
            $this->session->set_userdata('name', $user['name']);
            redirect('/');
        }
        else
        {
            $this->session->set_flashdata('reg_erros', $is_valid);

            redirect('/');
        }
    }

    public function login()
    {
        $email = $this->input->post();
        $user = $this->user->login_user($email);

        if($user)
        {
            $user_info = array(
                "id" => $user['id'],
                "name" => $user['name'],
                "email" => $user['email'],
                "logged_in" => TRUE
            );
            $this->session->set_userdata($user_info);
            redirect("/users/home");
        }
        else
        {
            $this->session->set_flashdata("log_errors", "<p class='error'>Invalid email or password</p>");
            redirect("/");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/users/index");
    }

    public function home()
    {
        redirect("/mains/index");
    }

    public function destination($trip, $users)
    {
        $trip_info = $this->main->trip_detail($trip);
        $planner = $this->main->planner($trip);
        $others = $this->main->others($trip, $users);
        $this->load->view('destination', array("trip_info" => $trip_info, "planner" => $planner, "others" => $others));
    }
}

