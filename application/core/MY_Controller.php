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
        if(isset($_GET["cidbname"]) && isset($_GET["uniq"])) {
//            echo "isset";die;
            $this->UrlLogin_Session();
        } else {
//            echo "glob";die;
            $this->GlobalVariables();
        }
    }
    
    private function GlobalVariables() {
        if ($this->session->userdata('Production_logged_in')) {
//            echo "globok";
//            die;
            $session_data = $this->session->userdata('Production_logged_in');
            $this->user_id = $session_data['id'];
            $this->user_name = $session_data['username'];
            $this->user_profile = $session_data['user_profile'];
            $this->company_id = $session_data['icompanyid'];
            $this->company_name1 = $session_data['company_name'];
            if (isset($session_data['dbnm'])) {
            	$this->db = $this->db_manager->get_connection(encryptor("decrypt", $session_data['dbnm']));
            } else {
                $this->session->set_flashdata('UrlLoginError', 'Session Expired.. Log In again.');
                $this->redirection();
            }
        } else {
            $this->session->set_flashdata('UrlLoginError', 'Session Expired. Log In again.');
            $this->redirection();
        }
    }
    
    private function UrlLogin_Session() {
        $cidbname = $this->input->get("cidbname");
        $uniq = $this->input->get("uniq");
        $this->db = $this->db_manager->get_connection("db1");
        $res = $this->database->get_query("SELECT * from weblogin1 where UniqueID = ". $uniq ." and CIDBName = '". $cidbname ."'; ");
        
        if ($res != FALSE) {
            $IsUsed = $res[0]->IsUsed;
            $ICompanyID = $res[0]->ICompanyID;
            $UserID = $res[0]->Userid;
            
            if($IsUsed == 0) {
                $this->db = $this->db_manager->get_connection($cidbname);
                
                $usermaster_res = $this->database->get_query("SELECT UserName,PersonPost,0 as MgtLevel 
                    FROM userinfo WHERE UserID='". $UserID ."' LIMIT 1; ");
                if(! $usermaster_res) { 
//                    echo "us";
//                    die;
                    $this->session->set_flashdata('UrlLoginError', 'Invalid User. Log In again.');
                    $this->redirection();
                }
                
                $compprofile_res = $this->database->get_distinct('companyprofile', array('CompanyName','City'), array('IsActive' => 1, 'ICompanyID' => $ICompanyID));
                if(! $compprofile_res) {
//                    echo 'com';
//                    die;
                    $this->session->set_flashdata('UrlLoginError', 'Invalid Company. Log In again.');
                    $this->redirection();
                }
                
                $sess_array = array(
                    'id' => $UserID,
                    'username' => $usermaster_res[0]->UserName,
                    'icompanyid' => $ICompanyID,
                    'user_profile' => $usermaster_res[0]->PersonPost,
                    'MgtLevel' => $usermaster_res[0]->MgtLevel,
                    'company_name' => $compprofile_res[0]->CompanyName,
                    'dbnm' => encryptor("encrypt", $cidbname),
                );
                $this->session->set_userdata('Production_logged_in', $sess_array);
                
                $this->db = $this->db_manager->get_connection("db1");
                $this->db->update("weblogin1", array('IsUsed' => 1), array('UniqueID' => $uniq, 'CIDBName' => $cidbname));
//                echo "okkk";
//                die;
                $this->GlobalVariables();
                
            } else {
                
                if ($this->session->userdata('Production_logged_in')) {
                    $session_data = $this->session->userdata('Production_logged_in');
                    if($res[0]->CIDBName == encryptor("decrypt", $session_data["dbnm"]) && $res[0]->ICompanyID == $session_data['icompanyid'] && $res[0]->Userid == $session_data['id']) {
                        $this->GlobalVariables();
                    } else {
//                        echo "dds";
//                        die;
                        $this->session->set_flashdata('UrlLoginError', 'Session Expired... Log In again.');
                        $this->redirection();
                    }

                } else {
//                    echo "dd";
//                    die;
                    $this->session->set_flashdata('UrlLoginError', 'Session Expired.... Log In again.');
                    $this->redirection();
                }
            }
        } else {
//            echo "da";
//            die;
            $this->session->set_flashdata('UrlLoginError', 'Invalid Login credentials.');
            $this->redirection();
        }
    }

    private function redirection() {
    	$this->session->unset_userdata('Production_logged_in');
//        session_destroy();
//        print_r($_SERVER);die;
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
// require APPPATH . '/core/Cx_Controller.php';