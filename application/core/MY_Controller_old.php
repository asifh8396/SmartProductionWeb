<?php

class MY_Controller extends CI_Controller {

    var $user_id = '';
    var $user_name = '';
    var $user_profile = '';
    var $company_name1 = '';
    var $company_id = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('Mod_db', 'database');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $this->user_id = $session_data['id'];
            $this->user_name = $session_data['username'];
            $this->user_profile = $session_data['user_profile'];
            $this->company_id = $session_data['icompanyid'];
            if (isset($session_data['dbnm'])) {
            	$this->db = $this->db_manager->get_connection(encryptor("decrypt", $session_data['dbnm']));
            } else {
                $this->redirection();

            }
            $result = $this->database->get_distinct('companyprofile', array('CompanyName','City'), array('IsActive' => 1, 'ICompanyID' => $session_data['icompanyid']));
            //   $com_array = explode(' ', $result[0]->CompanyName);
            if ($result != FALSE) {
                $this->company_name1 = $result[0]->CompanyName." ".$result[0]->City;
            } else {
                $this->redirection();
            }

            
        } else {
            
            $this->redirection();
        }
    }

    private function redirection() {
    	$this->session->unset_userdata('logged_in');
        session_destroy();
        // print_r($_SERVER);die;
        if (strpos($_SERVER["REQUEST_URI"], "index.php") == false) {
            $link = str_replace("url=","","$_SERVER[REDIRECT_QUERY_STRING]");
        } else {
            $actual_link = "$_SERVER[PATH_INFO]";
            $linkarr = explode("/", $actual_link);
            unset($linkarr[0]);
            $link = implode("/", $linkarr);
        }
        $get_string = "$_SERVER[QUERY_STRING]";
        if ($get_string !== "") {
            $link = $link ."?". $get_string;
        }
        
        redirect("login?locz=" . $link);
    }


}
require APPPATH . '/core/Cx_Controller.php';