<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User', 'login');
    }

    function index() {
    	if(isset($_GET["locz"])){
    		$data["location"] = $this->input->get("locz");;
    	} else {
    		$data["location"] = "";
    	}
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
    }

    function companyload() {
        $val = encryptor("decrypt",$this->input->post("val"));
        if ($val == "") {
            $result["msg"] =  "Fin Yr cannot be empty !!";
            $result["err"] = 1;
        } else {
            $this->db = $this->db_manager->get_connection($val);
            $result["err"] = 0;
            $result["msg"] = "";
            $result1 = $this->login->companyprofile();
            $html = "";
            $html .= '<option value="xxxxx">--Select--</option>';
            if ($result1 !== FALSE) {
                foreach ($result1 as $val) {
                    $html .= "<option value='". encryptor("encrypt", $val->ICompanyID) ."'>". $val->CompanyName ."</option>";
                }
            }
            $result["companyprof"] = $html;
        }

        echo json_encode($result);

    }

}
