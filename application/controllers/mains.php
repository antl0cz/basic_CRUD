<?php

class Mains extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('main');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $user = $this->session->userdata('id');
        $trips = $this->main->my_trips($user);
        $other_trips = $this->main->user_trips($user);
        $this->load->view('home', array("trips" => $trips, "other_trips" => $other_trips));
    }

    public function add()
    {
        $this->load->view('add');
    }

    public function add_trip($user)
    {
        $this->form_validation->set_rules('destination', 'Destination', 'trim|required|is_unique[trips.destination]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');

        $trip = array(
            "destination" => $this->input->post('destination'),
            "description" => $this->input->post('description'),
            "start" => $this->input->post('start'),
            "end" => $this->input->post('end')
        );

        $start_date = strtotime($this->input->post('start'));
        $end_date = strtotime($this->input->post('end'));

        if($this->form_validation->run() == TRUE && ($start_date < $end_date))
        {
            $this->main->new_trip($trip, $user);
            $destination = $trip['destination'];
            $trip_id = $this->main->trip_id($destination);
            $this->main->add_userinfo($user, $trip_id);
            redirect('/mains/index');
        }
    }

    public function join($user, $trip)
    {
        $this->main->join_trip($user, $trip);
        redirect('/mains/index');
    }


}