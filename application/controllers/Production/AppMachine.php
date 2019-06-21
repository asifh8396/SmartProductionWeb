<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class AppMachine extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Production/Mod_AppMachine");
    }

    public function index() {

        $data['loginCmp'] = $this->company_id;
        $data["title"] = "Application Machine";
        $data['template'] = 'Production/AppMachine_view';
        $data['process'] = $this->Mod_AppMachine->processList();
        $this->load->view('templates/template', $data);
    }


    public function show() {

        $data = $this->Mod_AppMachine->ShowList();
        echo json_encode($data);
    }
    public function retrivedata() {
        $hdn_recid = $this->input->post('hdn_recid');
        $data = $this->Mod_AppMachine->detail($hdn_recid);
        echo json_encode($data);
    }

    public function Save(){
       $txt_mname = $this->input->post('txt_mname');
       $drp_processname = $this->input->post('drp_processname');
       $hdn_id = $this->input->post('hdn_id');
       $txt_avg = $this->input->post('txt_avg');
       $txt_avgtime = $this->input->post('txt_avgtime');
       $txt_power = $this->input->post('txt_power');
       $txt_labr_ch = $this->input->post('txt_labr_ch');
       $txt_avgwast = $this->input->post('txt_avgwast');
       $txt_insrs = $this->input->post('txt_insrs');
       $txt_perrent = $this->input->post('txt_perrent');
       $txt_depre = $this->input->post('txt_depre');
       $txt_mainten = $this->input->post('txt_mainten');
       $txt_consuma = $this->input->post('txt_consuma');
       $txt_rcost = $this->input->post('txt_rcost');
       $txt_capacity = $this->input->post('txt_capacity');
       $txt_makereadynr = $this->input->post('txt_makereadynr');
       $txt_prodnr = $this->input->post('txt_prodnr');
       $txt_makereadyuv = $this->input->post('txt_makereadyuv');
       $txt_produv = $this->input->post('txt_produv');
       $txt_directmp = $this->input->post('txt_directmp');
       $txt_supportmp = $this->input->post('txt_supportmp');
       $txt_admindepartmp = $this->input->post('txt_admindepartmp');
       $chk_inuse = $this->input->post('chk_inuse');
        if(isset($chk_inuse)){
            $chk_inuse_val = 1;
        } else {
            $chk_inuse_val = 0;
        }
                if($txt_rcost == ''){
            $txt_rcost = 0;
        }
        if($txt_capacity == ''){
            $txt_capacity = 0;
        }
        if($txt_avg == ''){
            $txt_avg = 0;
        }
        if($txt_avgtime == ''){
            $txt_avgtime = 0;
        }
        if($txt_power == ''){
            $txt_power = 0;
        }
        if($txt_labr_ch == ''){
            $txt_labr_ch = 0;
        }
        if($txt_avgwast == ''){
            $txt_avgwast = 0;
        }
        if($txt_insrs == ''){
            $txt_insrs = 0;
        }
        if($txt_perrent == ''){
            $txt_perrent = 0;
        }
        if($txt_depre == ''){
            $txt_depre = 0;
        }
        if($txt_mainten == ''){
            $txt_mainten = 0;
        }
        if($txt_consuma == ''){
            $txt_consuma = 0;
        }
        if($txt_makereadynr == ''){
            $txt_makereadynr = 0;
        }
        if($txt_prodnr == ''){
            $txt_prodnr = 0;
        }
        if($txt_makereadyuv == ''){
            $txt_makereadyuv = 0;
        }
        if($txt_produv == ''){
            $txt_produv = 0;
        }
        if($txt_directmp == ''){
            $txt_directmp = 0;
        }
        if($txt_supportmp == ''){
            $txt_supportmp = 0;
        }
        if($txt_admindepartmp == ''){
            $txt_admindepartmp = 0;
        }

            
        $qry = $this->db->query("SELECT max(RecId)+1 as RecId from item_appmachine");
        $result_maxid = $qry->result();
        $num1=sprintf("%05d", $result_maxid[0]->RecId);
            
       
        
        $data1['MachineName'] = $txt_mname;
        $data1['INuse'] = $chk_inuse_val;
        $data1['PowerCharges'] = $txt_power;
        $data1['labourcharges'] = $txt_labr_ch;
        $data1['avgspeed'] = $txt_avg;
        $data1['avgsetuptime'] = $txt_avgtime;
        $data1['avgwastage'] = $txt_avgwast;
        $data1['interestAmt'] = $txt_insrs;
        $data1['depriamt'] = $txt_depre;
        $data1['maintainpm'] = $txt_mainten;
        $data1['consumblepm'] = $txt_consuma;
        $data1['rentpm'] = $txt_rcost;
        $data1['PerHrRunCost'] = $txt_perrent;
        $data1['BasePrUniqueId'] = $drp_processname;
        $data1['CapacityPerDay'] = $txt_capacity;
        $data1['MakeReadyCostNr'] = $txt_makereadynr;
        $data1['ProductionCostNr'] = $txt_prodnr;
        $data1['MakeReadyCostUV'] = $txt_makereadyuv;
        $data1['ProductionCostUV'] = $txt_produv;
        $data1['DirectManpowCost'] = $txt_directmp;
        $data1['SupportManpowCost'] = $txt_supportmp;
        $data1['AdminDepManpowCost'] = $txt_admindepartmp;
        // print_r($data1);die;
       if ($hdn_id == "" && $hdn_id == 0) {
            $this->db->trans_start();
            $data1['MachineID'] = $num1;
            $this->db->insert("item_machinenames" ,$data1);
            $insert_id =$this->db->insert_id("item_machinenames" ,$data1);
            $numid=sprintf("%'.05d\n", $insert_id);
            $this->db->query("UPDATE item_machinenames as a set a.MachineID = '$numid' where a.RecId = '$hdn_id';");
            $this->db->query("UPDATE item_machinenames as a,item_base_process_master as b set a.Prid= b.Prid ,a.ProcessName=b.PrName where a.BasePrUniqueID=b.PrUniqueID;");
            $this->db->query("UPDATE item_machinenames set MachineID='00000' where MachineName like '%dummy%';");
            $this->db->trans_complete();
        }else{
            $this->db->trans_start();
            $this->db->where("Recid", $hdn_id);
            $this->db->update("item_machinenames" ,$data1);
            $this->db->query("UPDATE item_machinenames as a,item_base_process_master as b set a.Prid= b.Prid ,a.ProcessName=b.PrName where a.BasePrUniqueID=b.PrUniqueID;");
            $this->db->query("UPDATE item_machinenames set MachineID='00000' where MachineName like '%dummy%';");
            $this->db->trans_complete();
        }


        if ($this->db->trans_status() === FALSE) {
            $gly= "<span class='fa fa-exclamation-circle'></span>";
            $this->session->set_flashdata("error_msg", $gly." Error Save Again..!");
        } else {
            $gly= "<span class='fa fa-check-circle'></span>";
            $this->session->set_flashdata("success_msg", $gly." Saved Successfully..!");
        }
        redirect('Production/AppMachine');
    }

   
}
