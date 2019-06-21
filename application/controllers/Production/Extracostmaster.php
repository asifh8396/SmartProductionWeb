<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Extracostmaster extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Production/Mod_Extracostmaster");
    }

    public function index() {

        $data['loginCmp'] = $this->company_id;
        $data["title"] = "Extra Cost Master";
        $data['template'] = 'Production/Extracostmaster_view';
        $data['process'] = $this->Mod_Extracostmaster->processList();
        $data['unit'] = $this->Mod_Extracostmaster->dropdown();
        $this->load->view('templates/template', $data);
    }


    public function show() {

        $data = $this->Mod_Extracostmaster->ShowList();
        echo json_encode($data);
    }
    public function retrivedata() {
        $hdn_costid = $this->input->post('hdn_costid');
        $data = $this->Mod_Extracostmaster->detail($hdn_costid);
        echo json_encode($data);
    }

    public function Save(){
       $txt_pname = $this->input->post('txt_pname');
       $drp_inputunit = $this->input->post('drp_inputunit');
       $hdn_id = $this->input->post('hdn_id');
       $drp_outputunit = $this->input->post('drp_outputunit');
       $txt_mispname = $this->input->post('txt_mispname');
       $drp_process = $this->input->post('drp_process');
       $chk_isactive = $this->input->post('chk_isactive');
        if(isset($chk_isactive)){
            $chk_isactive_val = 1;
        } else {
            $chk_isactive_val = 0;
        }

            
        $qry1 = $this->db->query("SELECT max(CostID)+1 as CostID from extracostmaster;");
        $result_maxid = $qry1->result();
        $num1=sprintf("%05d", $result_maxid[0]->CostID);

        $qry2 = $this->db->query("SELECT max(CProcessNo)+1 as CProcessNo from extracostmaster;");
        $result_max = $qry2->result();
        $number=sprintf($result_max[0]->CProcessNo);
            
       
        // $data1['CostID'] = $num1;
        $data1['PName'] = $txt_pname;
        $data1['CostType'] = "Varable Cost";
        $data1['CalCretria'] = "Per Th. Items";
        // $data1['CProcessNo'] = $number;
        $data1['SlabCretria'] = "Quantity";
        $data1['Unit'] = "PER TH. ITEMS";
        $data1['IsActive'] = $chk_isactive_val;
        $data1['CostCretria'] = "P";
        $data1['InputUOM'] = $drp_inputunit;
        $data1['OutputUOM'] = $drp_outputunit;
        $data1['MISPName'] = $txt_mispname;
        $data1['PrUniqueID'] = $drp_process;
        // print_r($data1);die;
       if ($hdn_id == "" && $hdn_id == 0) {
            $this->db->trans_start();
            $data1['CostID'] = $num1;
            $data1['CProcessNo'] = $number;
            $this->db->insert("extracostmaster" ,$data1);
            $this->db->trans_complete();
        }else{
            $this->db->trans_start();
            $this->db->where("CostID", $hdn_id);
            $this->db->update("extracostmaster" ,$data1);
            $this->db->trans_complete();
        }




        if ($this->db->trans_status() === FALSE) {
            $gly= "<span class='fa fa-exclamation-circle'></span>";
            $this->session->set_flashdata("error_msg", $gly." Error Save Again..!");
        } else {
            $gly= "<span class='fa fa-check-circle'></span>";
            $this->session->set_flashdata("success_msg", $gly." Saved Successfully..!");
        }

        redirect("Production/Extracostmaster");
    }

   
}
