<?php

class Cx_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mod_db', 'database');

        if (isset($_GET["dbnm"])) {
        	$dbnm = $this->input->get("dbnm");
	        $this->session->set_userdata('dbnm',$dbnm);
	        $dbnm = $this->session->userdata('dbnm');
	        
	    	$this->db = $this->db_manager->get_connection($dbnm);
            // echo "okk";die;
        } else {
        	echo "Login again !!";
        	die;
        }
    }


}
