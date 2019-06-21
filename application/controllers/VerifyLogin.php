<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

//    var $companyId = '';
//    var $companyName = '';

    function __construct() {
        parent::__construct();
        $this->load->model('user', 'login', TRUE);
    }

    function index() {
        $location = $this->input->post("locz");
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('finyr', 'Fin Yr', 'trim|required|callback_check_select[finyr]');
        $this->form_validation->set_rules('company', 'Company Name', 'required|callback_check_select[company]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $data['location'] = $location;
            $this->db = $this->db_manager->get_connection("db1");
            $result1 = $this->login->finyrdetails();
            $html = "";
            if ($result1 !== FALSE) {
                foreach ($result1 as $key => $value) {
                    $html .= "<option value='". encryptor("encrypt", $value->CIDBName) ."'>". $value->FinYear ."</option>";
                }
            }
            $data["finyrhtml"] = $html;

            $this->load->view('admin/login_view', $data);
        
        } else {
            if ($this->session->userdata('Production_logged_in')) {
                $session_data = $this->session->userdata('Production_logged_in');
                if ($location == "") {
                    redirect('dashboard');
                } else {
                    redirect($location);
                }
            }
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $companyid = encryptor("decrypt", $this->input->post('company'));
        $finyr = encryptor("decrypt", $this->input->post('finyr'));
        //query the database
        $this->db = $this->db_manager->get_connection($finyr);
        $result = $this->login->login($username, $password);

        if ($result) {
            $this->load->model('Mod_db', 'database');
            $compprofile_result = $this->database->get_query('SELECT CompanyName,City FROM companyprofile WHERE IsActive = 1 and ICompanyID = "'. $companyid .'"; ');
            if($compprofile_result) {
                $companyname = $compprofile_result[0]->CompanyName;
            } else {
                $this->form_validation->set_message('check_database', 'Invalid Company');
                return false;
            }
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->UserId,
                    'username' => $row->UserName,
                    'icompanyid' => $companyid,
                    'user_profile' => $row->PersonPost,
                    'MgtLevel' => $row->MgtLevel,
                    'company_name' => $companyname,
                    'dbnm' => encryptor("encrypt", $finyr)
                );
                $this->session->set_userdata('Production_logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid Username or Password');
            return false;
        }
    }

    public function check_select($name = '') {
        if ($name === 'xxxxx') {
            $this->form_validation->set_message('check_select', 'This field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
