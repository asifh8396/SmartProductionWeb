<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class ProcessName extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Production/Mod_ProcessName");
    }

    public function index() {

        $data['loginCmp'] = $this->company_id;
        $data["title"] = "Process Master";
        $data['template'] = 'Production/ProcessName_view';
        $data['process'] = $this->Mod_ProcessName->processList();
        $data['unit'] = $this->Mod_ProcessName->dropdown();
        $this->load->view('templates/template', $data);
    }


    public function retrivedata() {

        $data = $this->Mod_ProcessName->processname();
        echo json_encode($data);
    }
    public function drp_unit() {

        $data = $this->Mod_ProcessName->dropdown();
        echo json_encode($data);
    }
    public function drp_process() {

        $data = $this->Mod_ProcessName->processList();
        echo json_encode($data);
    }


    public function Save(){
       $txt_prid = $this->input->post('txt_prid');
       $txt_prname = $this->input->post('txt_prname');
       $txt_Description = $this->input->post('txt_Description');
       $txt_Level = $this->input->post('txt_Level');
       $drp_ipunit = $this->input->post('drp_ipunit');
       $drp_outunit = $this->input->post('drp_outunit');
       $chk_ProdValidation = $this->input->post('chk_ProdValidation');
       $chk_DisplayInListBox = $this->input->post('chk_DisplayInListBox');
       $drp_baseprid = $this->input->post('drp_baseprid');
       $txt_BaseTableName = $this->input->post('txt_BaseTableName');
       $chk_isactive = $this->input->post('chk_isactive');
        

        foreach ($txt_prid as $key => $value) {
            $txt_prid_value = $value;
            $txt_prname_value = $txt_prname[$key];
            $txt_Description_value = $txt_Description[$key];
            $txt_Level_value = $txt_Level[$key];
            $drp_ipunit_value = $drp_ipunit[$key];
            $drp_outunit_value = $drp_outunit[$key];
            $drp_baseprid_value = $drp_baseprid[$key];
            $txt_BaseTableName_value = $txt_BaseTableName[$key];

                if(isset($chk_ProdValidation[$key])){
                    $chk_ProdValidation_value = 1;
                } else {
                    $chk_ProdValidation_value = 0;
                }
                if(isset($chk_DisplayInListBox[$key])){
                    $chk_DisplayInListBox_value = 1;
                } else {
                    $chk_DisplayInListBox_value = 0;
                }
                if(isset($chk_isactive[$key])){
                    $chk_isactive_val = 1;
                } else {
                    $chk_isactive_val = 0;
                }
            
       
                $data1['PrID'] = $txt_prid_value;
                $data1['PrName'] = $txt_prname_value;
                $data1['Description'] = $txt_Description_value;
                $data1['IsActive'] = $chk_isactive_val;
                $data1['InputUOM'] = $drp_ipunit_value;
                $data1['OutPutUOM'] = $drp_outunit_value;
                $data1['ProdValidation'] = $chk_ProdValidation_value;
                $data1['DisplayInListBox'] = $chk_DisplayInListBox_value;
                $data1['BasePrUniqueID'] = $drp_baseprid_value;
                $data1['BaseTableName'] = $txt_BaseTableName_value;
                $data1['Level'] = $txt_Level_value;
                // print_r($data1);die;


               if ($txt_prid_value == "") {
                    $this->db->trans_start();
                    $this->db->insert("item_processname" ,$data1);
                    $this->db->trans_complete();
                }else{
                    $this->db->trans_start();
                    $this->db->where("PrID", $txt_prid_value);
                    $this->db->update("item_processname" ,$data1);
                    $this->db->trans_complete();
                }
        }




        if ($this->db->trans_status() === FALSE) {
            $gly= "<span class='fa fa-exclamation-circle'></span>";
            $this->session->set_flashdata("error_msg", $gly." Error Save Again..!");
        } else {
            $gly= "<span class='fa fa-check-circle'></span>";
            $this->session->set_flashdata("success_msg", $gly." Saved Successfully..!");
        }

        redirect("Production/ProcessName");
    }

   
}
