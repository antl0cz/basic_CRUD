<?php

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function register_user($user)
    {
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm PW', 'trim|required');

        if($this->form_validation->run())
        {
            $query = "INSERT INTO users(name, email, password, created_at) VALUES (?, ?, ?, NOW())";
            $values = array($user['name'], $user['email'], md5($user['password']));

            if($this->db->query($query, $values))
            {
                $id = $this->db->insert_id();
                $success = array('valid', $id);
                return $success;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return array(validation_errors());
        }
    }

    public function get_email($email)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        return $this->db->query($query, array($email))->row_array();
    }

    public function login_user($post)
    {
        $confirm_user = "SELECT * FROM users WHERE users.email = ?";
        $user = $this->db->query($confirm_user, array($post['email']))->row_array();

        if($user)
        {
            if(md5($post['password']) == $user['password'])
            {
                return $user;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}