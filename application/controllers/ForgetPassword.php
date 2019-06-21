<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ForgetPassword extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', 'login', TRUE);
    }

    function index() {
        $data["msg"] = "";
        $this->load->view('admin/forgetPassword_view');
    }

    function check() {
        if ($this->input->post("submit") == "Cancel") {
            redirect("login", "refresh");
        }

        $email = $this->input->post("email");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/forgetPassword_view');
        } else {
            $result = $this->login->checkemail($email);
            if ($result == false) {
                $data["msg"] = "";
                $this->load->view('admin/forgetPassword_view',$data);
            }
        }
        
    }

}
