<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class home extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            echo $data['username'];
           // $this->load->view('home_view', $data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

}
