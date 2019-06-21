<?php

class JcPermissions extends MY_Controller {
    
    public function __Construct() {
        parent::__construct();
        $this->load->model('Production/Mod_jcPermissions', 'model');
    }

    public function index() {

        $this->session->set_userdata('userid', $this->user_id);
        $this->session->set_userdata('ICompanyID', $this->company_id);

        $data["uid"] = $this->session->userdata("userid");
        $data["icompanyid"] = $this->session->userdata("ICompanyID");
        $data['data']=$this->model->pageloaddata();
        $data['userinfo']=$this->model->userinfo();
        $data["title"] = "Jobcard Permissions";
        $data['template'] = 'production/view_jcPermissions';
        $this->load->view('templates/template', $data);
    }
    
    public function deleterow() {
        $userid = $this->input->post("userid");
        $autoid = $this->input->post("autoid");
        
        $this->model->deleterow($userid,$autoid);
    }

    public function addnewrow() {
        $save["userid"] = $this->input->post("userid");
        $save["save_perm"] = $this->input->post("chk_save");
        $save["update_perm"] = $this->input->post("chk_update");
        $save["delete_perm"] = $this->input->post("chk_delete");
        $save["print"] = $this->input->post("chk_print");

        $data = $this->model->addnewrow($save);
        $jsondata = json_encode($data);
        echo $jsondata;

    }

    public function updaterow() {
        $autoid = $this->input->post("autoid");
        $userid = $this->input->post("userid");
        $save = $this->input->post("chk_save");
        $update = $this->input->post("chk_update");
        $delete = $this->input->post("chk_delete");
        $print = $this->input->post("chk_print");

        $this->model->updaterow($autoid, $userid, $save, $update, $delete, $print);
    }


}