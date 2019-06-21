<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard extends MY_Controller {

    public function index() {

        $data['title'] = $this->company_name1;
        $data['template'] = 'admin/dashboard';
        $this->load->view('templates/template', $data);
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
