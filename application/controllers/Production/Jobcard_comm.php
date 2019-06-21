<?php

class Jobcard_comm extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Production/Mod_jobcard_comm');
    }

    public function index() {
        $jobtype = $this->input->post('hdn_jobnew');

        $jobcardno = $this->input->post('hdn_jobcard');
        $icompanyid = $this->input->post('txt_icompanyid');
        $txt_uid = $this->input->post('txt_uid');
        $docnotion = $this->input->post('docnotionval');
        $CP = $this->input->post('hidden_cp');

        if ($jobtype == 'New') {
            $data['data'] = $this->Mod_jobcard_comm->pageloaddata($jobcardno, $CP);
            $data['Neworold'] = $jobtype;
            $data['docnotionval'] = $docnotion;
            $data['Icompanyid'] = $icompanyid;
            $data['Uid'] = $txt_uid;
            $data['docid'] = '';
        } else {
            $data['data'] = $this->Mod_jobcard_comm->pageloadOld($jobcardno, $jobtype, $CP);
            $data['Neworold'] = $jobtype;
            $data['docnotionval'] = '';
            $data['Icompanyid'] = $icompanyid;
            $data['Uid'] = $txt_uid;
            $data['docid'] = $jobcardno;
        }
        if(empty($data['data'])) {
            $gly = "<span class='fa fa-exclamation-circle'></span>";
            $this->session->set_flashdata("error_msg", $gly . " Error occured while loading, try again ..!");
            redirect("Production/Jobsearch");
        }
        
        $data["title"] = "Commercial Jobcard";
        $data['template'] = 'production/View_jobcard_comm_view';
        $this->load->view('templates/template', $data);
    }

    public function index1($data) {
        $this->load->view('Veiw_jobcard', $data);
        // redirect('Jobcard',$data);  
    }

    public function showpop() {
        $Main_temp = $this->Mod_jobcard_comm->showpopval();
        echo $Main_temp;
    }

    public function bidngriddata() {
        $itemid = $this->input->post('itemid');
        $docid = $this->input->post('docid');
        $jobneworold = $this->input->post('jobneworold');
        $dcnotion = $this->input->post('dcnotionval');
        $icompanyid = $this->input->post('icompanyid');
        $jobnodelivery = $this->input->post('jobnodelivery');
        $estimateid = $this->input->post('estimateid');
        $recordid = $this->input->post('recordid');

        $txt_fqty = $this->input->post('txt_fqty');
        $this->load->model('Production/Mod_jobcard_comm');
        if ($jobneworold != 'Old') {
            $Maindata = $this->Mod_jobcard_comm->populategrid($itemid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid, $recordid, $txt_fqty);
        } else {
            $Maindata = $this->Mod_jobcard_comm->populategridOld($docid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid, $recordid, $txt_fqty);
        }
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function machine() {
        $prid = $this->input->post('prid');
        $Maindata = $this->Mod_jobcard_comm->popmachien($prid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }
    public function drp_Platedetail() {
        $drp_machine = $this->input->post('drp_machine');
        $Maindata = $this->Mod_jobcard_comm->popplatedetail($drp_machine);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function materaildetail1() {
        $materailid = $this->input->post('materailid');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->materailid1($materailid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function materaildetail2() {
        $materailid = $this->input->post('materailid');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->materailid2($materailid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function showwo() {
        $jobno = $this->input->post('jobno');
        $woid = $this->input->post('woid');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->showwoval();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function jobcardval() {
        $jobcard = $this->input->post('jobval');
        $jobcardval = trim($jobcard);
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->upddendval($jobcardval);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function info1() {
        $hdn_baseprid = $this->input->post('hdn_baseprid');
        $hdn_itemid = $this->input->post('hdn_itemid');

        $hdn_basepridval = trim($hdn_baseprid);

        $this->load->model('Production/Mod_jobcard_comm');
        if ($hdn_basepridval == 'PN') {
            $Maindata = $this->Mod_jobcard_comm->info1valPN($hdn_itemid);
        } else {
            $Maindata = $this->Mod_jobcard_comm->info1val($hdn_basepridval);
        }
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function info2() {
        $hdn_baseprid = $this->input->post('hdn_baseprid');
        $hdn_basepridval = trim($hdn_baseprid);
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->info2val($hdn_basepridval);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function jobcomplexity() {
        $hdn_baseprid = $this->input->post('hdn_baseprid');
        $hdn_basepridval = trim($hdn_baseprid);
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->jobcomplex($hdn_basepridval);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function processaddnew() {
        $strdata1 = $this->input->post('strdata1');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->processaddnewval($strdata1);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function genertatecode() {
        $icomapyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->generatecodedata($icomapyid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function genertatecodeupdate() {
        $oldno = $this->input->post('oldno');
        $newno = $this->input->post('newno');
        $icomapyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard_comm');
        $this->Mod_jobcard_comm->generateupdatetbl($oldno, $newno, $icomapyid);
    }

    public function estimationdetail() {
        $esitid = $this->input->post('estidval');
        $icomapyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->estimationdata($esitid, $icompanyid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function gangJobitem() {
        $icompanyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->gangjobitmlist($icompanyid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function paperdesclist() {
        $boardkind = $this->input->post('boardkind');
        $gsm = $this->input->post('gsm');
        $grain = $this->input->post('grain');
        $deckle = $this->input->post('deckle');
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->paperdesclist($boardkind, $gsm, $grain, $deckle);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function get_ink_details() {
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->get_ink();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function get_vendor_details() {
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->get_vendor_detail();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function popup_data() {
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->get_popup_data();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function boardkindfilter() {
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->boardkindfilter();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function additionalmtrl_grouplist() {
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->additionalmtrl_grouplist();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function additionalmtrl_itemlist() {
        $groupid = $this->input->post("groupid");
        $this->load->model('Production/Mod_jobcard_comm');
        $Maindata = $this->Mod_jobcard_comm->additionalmtrl_itemlist($groupid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

	public function IMRcalculatevalComm(){
		
        $docid = $this->input->post('docid');		
        $icomapyid = $this->input->post('icomp');
        $docnotion = $this->input->post('docnotion');
		
		$imrnoArray = $this->input->post('imrnoArray');
		$imrqtyArray = $this->input->post('imrqtyArray');
		$imrreqArray = $this->input->post('imrreqArray');
		$itemidArray = $this->input->post('itemidArray');
								
        $IMR_array = '';
        foreach ($imrreqArray as $key => $value) {
            if ($value != '0') {
                $IMR_detail = "(" . $imrqtyArray[$key] . ",'" . $itemidArray[$key] . "'),";
                $IMR_array = $IMR_array . $IMR_detail;
            }
        }
        $UrlIMR = substr_replace($IMR_array, ";", -1);
        if ($UrlIMR != '') {
            $IMRQuery = "insert into IMR_Temp (qtyrequired, Itemid)
							values" . $UrlIMR;
        }
  
        $query = $this->db->query('call Comm_Create_auto_imr("' . $IMRQuery . '","' . $docid . '","' . $icomapyid . '","' . $docnotion. '",@abc)');       
        if ($query->num_rows() > 0) {
			$ImrFlag = $query->result();
            $jobjson1 = json_encode($ImrFlag);
            echo $jobjson1;
        } else {
            return false;
        }		
/**/		
	}
	
    public function RMCcalculatevalComm() {

        $pridArray = $this->input->post('PridArray');
//        print_r($pridArray);


        $Var_ID_Info1Array = $this->input->post('Var_ID_Info1Array');
        $txt_pVar_Info2Array = $this->input->post('txt_pVar_Info2Array');
        $hdn_pRawMaterialID_4Array = $this->input->post('hdn_pRawMaterialID_4Array');
        $hdn_pint_Info1Array = $this->input->post('hdn_pint_Info1Array');
        // print_r($txt_pVar_Info2Array);
        // die();

        $rawmaterialidArray = $this->input->post('rawmaterialidArray');
        $wasteperArray = $this->input->post('wasteperArray');
        //$ComponentArray = $this->input->post('ComponentArray');
       // $FormNoArray= $this->input->post('FormNoArray');

      
       $ComponentArray = $this->input->post('ComponentArray');
        $FormNoArray = $this->input->post('FormNoArray');
        $PlateNoArray = $this->input->post('PlateNoArray');
        // print_r($PlateNoArray);
        // die();

        $data_value_ink = '';
        $data_value_FL = '';
        $data_value_FLMat = '';
        $data_value_FM = '';
        $data_value_FF = '';
        $data_value_WP = '';
        $data_value_FC = '';
        $data_value_BBP = '';
        $data_value_Pr = '';

        $sizeprid = count($pridArray);
        $cstring = '';
        $cstringFC = '';
        $cstringFL = '';
        $cstringFLm = '';
        $cstringFF = '';
        $cstringWP = '';
        $cstringBBP = '';
        $cstringBBP = '';
        $cstringPr = '';


        for ($i = 0; $i < $sizeprid - 1; $i++) {
            $pridArray_val = $pridArray[$i];
            $rawmaterialidArray_val = $rawmaterialidArray[$i];
            $wasteperArray_val = $wasteperArray[$i];
            $Var_ID_Info1Array_val = $Var_ID_Info1Array[$i];
            $txt_pVar_Info2Array_val = $txt_pVar_Info2Array[$i];
            if (isset($hdn_pRawMaterialID_4Array[$i])) {
                $hdn_pRawMaterialID_4Array_val = $hdn_pRawMaterialID_4Array[$i];
            }else{
            	$hdn_pRawMaterialID_4Array_val = 0;
            }
            $PlateNoArray_val = $PlateNoArray[$i];
            if (isset($hdn_pint_Info1Array[$i])) {
                $hdn_pint_Info1Array_val = $hdn_pint_Info1Array[$i];
            }else{
            	$hdn_pint_Info1Array_val = 0;
            }


              $ComponentArray_val =$ComponentArray[$i];
              $FormNoArray_val=$FormNoArray[$i];

            if ($pridArray_val == 'BBP') {
                $cstringBBP = "('BBP','00001',''," . $rawmaterialidArray_val . "','','','','0','','" . $wasteperArray_val[$key] . "','','',''),";
                $data_value_BBP = $data_value_BBP . $cstringBBP;
            }
            if ($pridArray_val == 'FC') {
                $cstringFC = "('FC','00035','" . $Var_ID_Info1Array_val . "' ,'" . $rawmaterialidArray_val . "','','','',0,'',0,0,'','','".$ComponentArray_val."',".
                $FormNoArray_val.",0),";
                $data_value_FC = $data_value_FC . $cstringFC;
            }
            if ($pridArray_val == 'FL') {
                $cstringFL = "('FL','00006','" . $Var_ID_Info1Array_val . "' ,'" . $rawmaterialidArray_val . "','','','',0,'',0,0,'','','".$ComponentArray_val."',"
                .$FormNoArray_val.",0,'".$txt_pVar_Info2Array_val."'),";
                $data_value_FL = $data_value_FL . $cstringFL;
            }
//
            if ($pridArray_val == 'FF') {
                $cstringFF = "('FF','00007','" . $Var_ID_Info1Array_val . "' ,'" . $rawmaterialidArray_val . "','','','',0,'',0,0,'','','".$ComponentArray_val."',"
                .$FormNoArray_val.",0),";
                $data_value_FF = $data_value_FF . $cstringFF;
            }

            if ($pridArray_val == 'Pr') {
                $cstringPr = "('PL','00004','" . $Var_ID_Info1Array_val . "' ,'" . $hdn_pRawMaterialID_4Array_val . "','','','','".$hdn_pint_Info1Array_val."','',0,0,'','','".$ComponentArray_val."',"
                .$FormNoArray_val.",'".$PlateNoArray_val."'),";
                $data_value_Pr = $data_value_Pr . $cstringPr;
            }
        }

        if ($data_value_Pr != '') {
            $UrlContentPr = substr_replace($data_value_Pr, ";", -1);
            $Prprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2,Component,formno,plateno)values" . $UrlContentPr;
        } else {
            $Prprocess = '';
        }   

        // echo      $Prprocess;die();

        if ($data_value_FL != '') {
            $UrlContentFL = substr_replace($data_value_FL, ";", -1);
            $FLprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2,Component,formno,plateno,OtherDetail)values" . $UrlContentFL;
        } else {
            $FLprocess = '';
        }

        if ($data_value_FF != '') {
            $UrlContentFF = substr_replace($data_value_FF, ";", -1);
            $FFprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2,Component,formno,plateno)values" . $UrlContentFF;
        } else {
            $FFprocess = '';
        }

        if ($data_value_FC != '') {
            $UrlContentFC = substr_replace($data_value_FC, ";", -1);
            $FCprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID,Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,
         AddlInfo1, AddlInfo2, CharInfo1, CharInfo2,Component,formno,plateno)values" . $UrlContentFC;
        } else {
            $FCprocess = '';
        }

        if ($data_value_BBP != '') {
            $UrlContentBBP = substr_replace($data_value_BBP, ";", -1);
            $BBPprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentBBP;
        } else {
            $BBPprocess = '';
        }


        $boardIDArray = $this->input->post('boardIDArray');
        $grainArray = $this->input->post('grainArray');
        $deckleArray = $this->input->post('deckleArray');
        $CutDeckleArray = $this->input->post('CutDeckleArray');
        $CutGrainArray = $this->input->post('CutGrainArray');
        $CutSheetsArray = $this->input->post('CutSheetsArray');
        $UpsInCutSheetArray = $this->input->post('UpsInCutSheetArray');
        $FullSheetsArray = $this->input->post('FullSheetsArray');
        $UpsInFullSheetArray = $this->input->post('UpsInFullSheetArray');
        $CutsFromFullSheetArray = $this->input->post('CutsFromFullSheetArray');
        $ReqKgArray = $this->input->post('ReqKgArray');
        $ReqPacketsArray = $this->input->post('ReqPacketsArray');
        $CutFullArray = $this->input->post('CutFullArray');
        $BoardDivFactArray = $this->input->post('BoardDivFactArray');
       
        $JobQtyArray = $this->input->post('JobQtyArray');

        $rmcalc_arrayB = '';
        foreach ($boardIDArray as $key => $value) {
            if ($value != '') {
                $arrayB_detail = "('" . $value . "','" . $deckleArray[$key] . "','" . $grainArray[$key] . "',
                    '" . $CutDeckleArray[$key] . "','" . $CutGrainArray[$key] . "',
                    '" . $CutSheetsArray[$key] . "','" . $UpsInCutSheetArray[$key] . "',
                    '" . $FullSheetsArray[$key] . "','" . $UpsInFullSheetArray[$key] . "','" . $CutsFromFullSheetArray[$key] . "',
                    '" . $ReqKgArray[$key] . "','" . $ReqPacketsArray[$key] . "','" . $CutFullArray[$key] . "',
                    '" . $BoardDivFactArray[$key] . "','" . $ComponentArray[$key] . "','" . $FormNoArray[$key] . "',    
                    '" . $JobQtyArray[$key] . "'),";
                $rmcalc_arrayB = $rmcalc_arrayB . $arrayB_detail;
            }
        }
        $UrlRMCalcB = substr_replace($rmcalc_arrayB, ";", -1);
        if ($UrlRMCalcB != '') {
            $rmc_Board = "insert into RMC_BoardDetails_temp
                            (BoardID, Deckle, Grain, CutDeckle, CutGrain, CutSheets, UpsInCutSheet, 
                            FullSheets, UpsInFullSheet, CutsFromFullSheet, ReqKg, ReqPackets, 
                            CutFull, BoardDivFact, Component, FormNo, JobQty)
                            values" . $UrlRMCalcB;
        }



        $wasteTotal = $this->input->post('wasteTotal');

        $plateArray = $this->input->post('plateArray');
        $ComponentArray = $this->input->post('ComponentArray');
        $formNoArray = $this->input->post('formNoArray');
        $plateNewArray = $this->input->post('plateNewArray');
        $plateOldArray = $this->input->post('plateOldArray');

        $ink1Array = $this->input->post('ink1Array');
        $ink2Array = $this->input->post('ink2Array');
        $ink3Array = $this->input->post('ink3Array');
        $ink4Array = $this->input->post('ink4Array');
        $ink5Array = $this->input->post('ink5Array');

        $rmcalc_array = '';
        foreach ($plateArray as $key => $value) {
            $array_detail = "('" . $value . "','" . $ComponentArray[$key] . "','" . $formNoArray[$key] . "',
                    '" . $plateNewArray[$key] . "','" . $plateOldArray[$key] . "',
                    '" . $ink1Array[$key] . "','" . $ink2Array[$key] . "',
                    '" . $ink3Array[$key] . "','" . $ink4Array[$key] . "','" . $ink5Array[$key] . "'),";
            $rmcalc_array = $rmcalc_array . $array_detail;
        }
        $UrlRMCalc = substr_replace($rmcalc_array, ";", -1);
        if ($UrlRMCalc != '') {
            $rmc_ink = "insert into RMC_INK_temp(PlateID,Component,FormNo,PlateNew,PlateOld,Ink1,Ink2,Ink3,Ink4,Ink5)values" . $UrlRMCalc;
        }


        $query = $this->db->query('call comm_JC_RMC_Temp_Table("","' . $rmc_Board . '","' . $BBPprocess . '","' . $FCprocess . '","' . $FFprocess . '","' . $FLprocess . '","'.$Prprocess.'","","","")');
        if ($query->num_rows() > 0) {
            $rmc_temptable = $query->result();
            $jobjson1 = json_encode($rmc_temptable);
            echo $jobjson1;
        } else {
            return false;
        }

//        echo '';
    }

   
    /* Mail function Start */

    public function email($edit_flag) {
        $this->load->library('mailerClass/SmtpMailer');
        $this->load->model('Production/Mod_jobcard_comm');
        $query_mail = $this->db->query("SELECT * FROM quotemail WHERE ID=1 AND isactive=1");
        if ($query_mail->num_rows() > 0) {
            $result_full = $query_mail->result();
            $result = $result_full[0];

        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = $result->SenderEmailId; // Your gmail id
        $config['smtp_pass'] = $result->SenderEmailPwd; // Your gmail Password
        // $config['smtp_user'] = 'shoaib@renukasoftec.com'; // Your gmail id
        // $config['smtp_pass'] = 'shoaib1314'; // Your gmail Password
        $config['smtp_port'] = 465;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";

        // $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from($result->SenderEmailId, 'CDC Printers Pvt. Ltd.');
        $this->email->to($result->ReciverEmailIDs);
        // $this->email->from('shoaib@renukasoftec.com', 'CDC Printers Pvt. Ltd.');
        // $this->email->to('behlah@renukasoftec.com');
        // $this->email->cc($result->ReciverEmailIDs);

        $product_array = $this->input->post('hdn_productName');
        $product_code_array = $this->input->post('hdn_productCode');
        $party_array = $this->input->post('hdn_clientName');
        $qty_array = $this->input->post('txt_fqty');
        $company_name = 'CDC Printers Pvt. Ltd.';
        if (count($product_array) === 1) {
            $subject = "Product: $product_array[1]; Code: $product_code_array[1]; Party: $party_array[1]; Qty: $qty_array[1]; (for $company_name)";
            $this->email->subject($subject);
        } else {
            $this->email->subject('Gang Job');
        }
        // $edit_flag = ''; // it comes from hidden field
        if ($edit_flag == 1) {
            $messege = $this->mail_body($product_array, $product_code_array, $qty_array);
        } else {
            // $txtare_email = $this->input->post('txtare_email');
            $revised_text = $this->input->post('txtare_email'); //  Put reason text here
            $messege = $this->mail_body_revised($product_array, $product_code_array, $qty_array, $revised_text);
        }
        $this->email->message($messege);
        $this->email->send();
        }
    }

    function mail_body($product_array = '', $product_code_array = '', $qty_array = '') {

        $estimate_no_str = '';
        $product_name_str = '';
        $product_code_str = '';
        $size = '';
        $paper_board_str = '';
        $process_name_str = '';
        $finishing = '';
        $sheet_qty_str = '';
        $qty_str = '';
        $cutting_size = '';
        $no_of_ups_in_cut_size = '';
        $size_of_board_str = '';
        $pono_str = '';
        $job_no_str = '';
        $txt_remark_str = '';

        $jobno_array = $this->input->post('hdn_jobnno');
        $estimate_no_array = $this->input->post('txt_estidno');
        $order_qty_array = $this->input->post('txt_orderqty');
        $pono_array = $this->input->post('hdn_poNo');
        foreach ($product_array as $key => $value) {
            $product_name_str .= $value . "/";
            $product_code_str .= $product_code_array[$key] . "/";
            $estimate_no_str .= $estimate_no_array[$key] . "/";
            $qty_str .= $qty_array[$key] . "/";
            $order_qty_str .= $order_qty_array[$key] . "/";
            $pono_str .= $pono_array[$key] . "/";
            $job_no_str .= $jobno_array[$key] . "/";
        }
        $product_name = substr($product_name_str, 0, -1);
        $product_code = substr($product_code_str, 0, -1);
        $estimate_no = substr($estimate_no_str, 0, -1);
        $qty = substr($qty_str, 0, -1);
        $order_qty = substr($order_qty_str, 0, -1);
        $pono = substr($pono_str, 0, -1);
        $job_no = substr($job_no_str, 0, -1);

        $mill_array = $this->input->post('hdn_mil');
        $kind_array = $this->input->post('hdn_kind');
        $gsm_array = $this->input->post('hdn_gsm');
        $dackle_array = $this->input->post('hdn_dackle');
        $grain_array = $this->input->post('txt_grainnn');
        $sheet_qty_array = $this->input->post('hdn_totalsh');
        $kg_qty_array = $this->input->post('hdn_kgqty');
        foreach ($mill_array as $key => $value) {
            $paper_board_str .= $value . "-" . $kind_array[$key] . "-" . $gsm_array[$key] . "/";
            $size_of_board_str .= $dackle_array[$key] . " x " . $grain_array[$key] . " Inch/";
            $kq_qty_str = $kg_qty_array[$key] . "/";
            $sheet_qty_str = $sheet_qty_array[$key] . "/";
        }
        $paper_board = substr($paper_board_str, 0, -1);
        $size_of_board = substr($size_of_board_str, 0, -1);
        $kq_qty = substr($kq_qty_str, 0, -1);
        $sheet_qty = substr($sheet_qty_str, 0, -1);


        $process_name_array = $this->input->post('hdn_processName');
        $txt_remark_array = $this->input->post('txt_remark');
        foreach ($process_name_array as $key => $value) {
            $process_name_str .= $value . "/";
            $txt_remark_str .=$txt_remark_array[$key] . "/";
        }
        $process_name = substr($process_name_str, 0, -1);
        $remark_stingval = substr($txt_remark_str, 0, -1);

        $breath_array = $this->input->post('txt_bre');
        $length_array = $this->input->post('txt_len');
        $height_array = $this->input->post('txt_bre');
        $ups_array = $this->input->post('txt_ups');
        $short_direction_array = $this->input->post('txt_graindis');
        foreach ($length_array as $key => $value) {
            $length = $value;
            $breath = $breath_array[$key];
            $no_of_ups_in_cut_size .= $ups_array[$key] . "/";
            if ($short_direction_array[$key] == 'Short') {
                if ($length > $breath) {
                    $size_str = $length . " x " . $breath . " Inch Short Grain/";
                } else {
                    $size_str = $breath . " x " . $length . " Inch Short Grain/";
                }
            } else {
                if ($length > $breath) {
                    $size_str = $breath . " x " . $length . " Inch Long Grain/";
                } else {
                    $size_str = $length . " x " . $breath . " Inch Long Grain/";
                }
            }
        }
        $cutting_size = substr($size_str, 0, -1);
        $ups = substr($no_of_ups_in_cut_size, 0, -1);
        $html = '<style>
                    table {
                        border-collapse: collapse;
                    }

                    table, td, th {
                        border: 1px solid black;
                    }
                 </style>';
        //        size : 43 x 43 x 133 mm (L x B x H) [Tuck-In Flap Box]
        $html .= "<table><thead>";
        $html .= "<tr><th>Heading</th><th>Values</th></tr>";
        $html .= "<tr><td>Estimate No.</td><td>$estimate_no</td></tr>";
        $html .= "<tr><td>Job Card No.</td><td>$job_no</td></tr>";
        $html .= "<tr><td>Product</td><td>$product_name</td></tr>";
        $html .= "<tr><td>Product Code</td><td>$product_code</td></tr>";
        $html .= "<tr><td>Order Quantity</td><td>$order_qty</td></tr>";
        $html .= "<tr><td>Job Quantity</td><td>$qty</td></tr>";
        $html .= "<tr><td>P.O. No.</td><td>$pono</td></tr>";
        $html .= "<tr><td>Finishing</td><td>$process_name</td></tr>";
        $html .= "<tr><td>Paper/Board</td><td>$paper_board</td></tr>";
        $html .= "<tr><td>Size of the board</td><td>$size_of_board</td></tr>";
        $html .= "<tr><td>Qty. of the Board in Sheet</td><td>$sheet_qty</td></tr>";
        $html .= "<tr><td>Qty. of the Board in Kg</td><td>$kq_qty</td></tr>";
        $html .= "<tr><td>Cutting Size</td><td>$cutting_size</td></tr>";
        $html .= "<tr><td>No. of ups in cut size</td><td>$ups</td></tr>";
        $html .= "<tr><td>Delivery Date</td><td></td></tr>";
        $html .= "<tr><td>Remarks</td><td>$remark_stingval</td></tr>";
        $html .= "</table>";

        echo $html;
        return $html;
    }

    function mail_body_revised($product_array = '', $product_code_array = '', $qty_array = '', $revised_text = '') {

        $estimate_no_str = '';
        $product_name_str = '';
        $product_code_str = '';
        $size = '';
        $paper_board_str = '';
        $process_name_str = '';
        $finishing = '';
        $sheet_qty_str = '';
        $qty_str = '';
        $cutting_size = '';
        $no_of_ups_in_cut_size = '';
        $size_of_board_str = '';
        $pono_str = '';
        $job_no_str = '';
        $txt_remark_str = '';

        $jobno_array = $this->input->post('hdn_jobnno');
        $estimate_no_array = $this->input->post('txt_estidno');
        $order_qty_array = $this->input->post('txt_orderqty');
        $pono_array = $this->input->post('hdn_poNo');
        foreach ($product_array as $key => $value) {
            $product_name_str .= $value . "/";
            $product_code_str .= $product_code_array[$key] . "/";
            $estimate_no_str .= $estimate_no_array[$key] . "/";
            $qty_str .= $qty_array[$key] . "/";
            $order_qty_str = $order_qty_array[$key] . "/";
            $pono_str = $pono_array[$key] . "/";
            $job_no_str = $jobno_array[$key] . "/";
        }
        $product_name = substr($product_name_str, 0, -1);
        $product_code = substr($product_code_str, 0, -1);
        $estimate_no = substr($estimate_no_str, 0, -1);
        $qty = substr($qty_str, 0, -1);
        $order_qty = substr($order_qty_str, 0, -1);
        $pono = substr($pono_str, 0, -1);
        $job_no = substr($job_no_str, 0, -1);

        $mill_array = $this->input->post('hdn_mil');
        $kind_array = $this->input->post('hdn_kind');
        $gsm_array = $this->input->post('hdn_gsm');
        $dackle_array = $this->input->post('hdn_dackle');
        $grain_array = $this->input->post('txt_grainnn');
        $sheet_qty_array = $this->input->post('hdn_totalsh');
        $kg_qty_array = $this->input->post('hdn_kgqty');
        foreach ($mill_array as $key => $value) {
            $paper_board_str .= $value . "-" . $kind_array[$key] . "-" . $gsm_array[$key] . "/";
            $size_of_board_str .= $dackle_array[$key] . " x " . $grain_array[$key] . " Inch/";
            $kq_qty_str = $kg_qty_array[$key] . "/";
            $sheet_qty_str = $sheet_qty_array[$key] . "/";
        }
        $paper_board = substr($paper_board_str, 0, -1);
        $size_of_board = substr($size_of_board_str, 0, -1);
        $kq_qty = substr($kq_qty_str, 0, -1);
        $sheet_qty = substr($sheet_qty_str, 0, -1);
        $process_name_array = $this->input->post('hdn_processName');
        $txt_remark_array = $this->input->post('txt_remark');
        foreach ($process_name_array as $key => $value) {
            $process_name_str .= $value . "/";
            $txt_remark_str .=$txt_remark_array[$key] . "/";
        }

        $process_name = substr($process_name_str, 0, -1);
        $remark_stingval = substr($txt_remark_str, 0, -1);

        $breath_array = $this->input->post('txt_bre');
        $length_array = $this->input->post('txt_len');
        $height_array = $this->input->post('txt_bre');
        $ups_array = $this->input->post('txt_ups');
        $short_direction_array = $this->input->post('txt_graindis');
        foreach ($length_array as $key => $value) {
            $length = $value;
            $breath = $breath_array[$key];
            $no_of_ups_in_cut_size .= $ups_array[$key] . "/";
            if ($short_direction_array[$key] == 'Short') {
                if ($length > $breath) {
                    $size_str = $length . " x " . $breath . " Inch Short Grain/";
                } else {
                    $size_str = $breath . " x " . $length . " Inch Short Grain/";
                }
            } else {
                if ($length > $breath) {
                    $size_str = $breath . " x " . $length . " Inch Long Grain/";
                } else {
                    $size_str = $length . " x " . $breath . " Inch Long Grain/";
                }
            }
        }
        $cutting_size = substr($size_str, 0, -1);
        $ups = substr($no_of_ups_in_cut_size, 0, -1);
        $html = '<style>
                    table {
                        border-collapse: collapse;
                    }

                    table, td, th {
                        border: 1px solid black;
                    }
                 </style>';
        //        size : 43 x 43 x 133 mm (L x B x H) [Tuck-In Flap Box]
        $html .= "<table><thead>";
        $html .= "<tr><th>Heading</th><th>Values</th></tr>";
        $html .= "<tr><td>Reason For Revision</td><td><b>$revised_text</b></td></tr>";
        $html .= "<tr><td>Estimate No.</td><td>$estimate_no</td></tr>";
        $html .= "<tr><td>Job Card No.</td><td>$job_no</td></tr>";
        $html .= "<tr><td>Product</td><td>$product_name</td></tr>";
        $html .= "<tr><td>Product Code</td><td>$product_code</td></tr>";
        $html .= "<tr><td>Order Quantity</td><td>$order_qty</td></tr>";
        $html .= "<tr><td>Job Quantity</td><td>$qty</td></tr>";
        $html .= "<tr><td>P.O. No.</td><td>$pono</td></tr>";
        $html .= "<tr><td>Finishing</td><td>$process_name</td></tr>";
        $html .= "<tr><td>Paper/Board</td><td>$paper_board</td></tr>";
        $html .= "<tr><td>Size of the board</td><td>$size_of_board</td></tr>";
        $html .= "<tr><td>Qty. of the Board in Sheet</td><td>$sheet_qty</td></tr>";
        $html .= "<tr><td>Qty. of the Board in Kg</td><td>$kq_qty</td></tr>";
        $html .= "<tr><td>Cutting Size</td><td>$cutting_size</td></tr>";
        $html .= "<tr><td>No. of ups in cut size</td><td>$ups</td></tr>";
        $html .= "<tr><td>Delivery Date</td><td></td></tr>";
        $html .= "<tr><td>Remarks</td><td>$remark_stingval</td></tr>";
        $html .= "</table>";

        echo $html;
        return $html;
    }

    /* Mail function end */

    public function savedata() {
        // Job Number
        $btn = $this->input->post('btn_saveval');
        $jobnew = $this->input->post('txt_jobneworold');

        if ($btn == 'Save') {

            $docidset = '';
            $jobnofirst = $this->input->post('hdn_jobnno[1]');

            $Docid = $this->input->post('txt_uniquerjcno');
            $dcnotion = $this->input->post('hdn_dcnotionval');

            $ICompanyId = $this->input->post('hdn_icompid');
            $ICompanyId = $this->company_id;

            date_default_timezone_set('Asia/Calcutta');
            $ADateTime = date('Y/m/d H:i:s ', time());
            $AUID = $this->input->post('hdn_uid');
            $AUID = $this->user_id;

            $hdn_gangrecidestid = $this->input->post('hdn_gangrecidestid');

            $txt_docdateval = $this->input->post('txt_docdateval');

            $hdn_recordid = $this->input->post('hdn_recordid');


            /* Array  Job Item */
            $clientid = $this->input->post('hdn_clientid');
            $woid = $this->input->post('hdn_woid');
            $itemid = $this->input->post('hdn_itemid');

            $openSize_Array = $this->input->post('hdn_openSize');
            $closeSize_Array = $this->input->post('hdn_closeSize');

            $txt_orderqty = $this->input->post('txt_orderqty');
            $txt_jobqty = $this->input->post('txt_orderqty');
            $jobno = $this->input->post('hdn_jobnno');
            $txt_printqty = $this->input->post('txt_printqty');
            $txt_fqty = $this->input->post('txt_fqty');
            $txt_specification = $this->input->post('txt_specification');
            $txt_TotQtyProduced = $this->input->post('txt_TotQtyProduced');
            $txt_TotQtyDispatched = $this->input->post('txt_TotQtyDispatched');

            $drp_oldnew = $this->input->post('drp_oldnew');
            $txt_jreamrks = $this->input->post('txt_jreamrks');
            $txt_woreamrks = $this->input->post('txt_woreamrks');
            $txt_stmreamrks = $this->input->post('txt_stmreamrks');
            $txt_fgstock = $this->input->post('txt_fgstock');
            $hdn_gangitemid = $this->input->post('hdn_gangitemid');
            $drp_shotqty = $this->input->post('drp_shotqty');
            $txt_shortqtyreason = $this->input->post('txt_shortqtyreason');
            if ($txt_fgstock == '') {
                $txt_fgstock = 0;
            }

            $drp_repeatjob = $this->input->post('drp_repeatjob');
            $drp_noyes = $this->input->post('drp_noyes');
            $txt_wsagreamrksper = $this->input->post('txt_wsagreamrksper');
            $txt_wassheet = $this->input->post('txt_wassheet');
            $txt_upsvalmain = $this->input->post('txt_upsvalmain');


            /* Hold grid Start */

            $chk_hold = $this->input->post('chk_hold');
            $txt_holdreason = $this->input->post('txt_holdreason');
            $chk_cancel = $this->input->post('chk_cancel');
            $txt_cancelreason = $this->input->post('txt_cancelreason');
            $chk_close = $this->input->post('chk_close');
            $txt_closereason = $this->input->post('txt_closereason');
            $txt_closedate = $this->input->post('txt_closedate');
            $txt_closedatejobval = $this->input->post('txt_closedateval');
            // print_r($txt_closedatejobval);
            if ($txt_closedatejobval == '') {
                $txt_closedatejob = '2060-01-01';
            } else {
                $txt_closedatejob = $txt_closedatejobval;
            }

            $chk_holdval = 0;
            if (isset($chk_hold)) {
                $chk_holdval = 1;
            }

            $chk_cancelval = 0;
            if (isset($chk_cancel)) {
                $chk_cancelval = 1;
            }
            $chk_closeval = 0;
            if (isset($chk_close)) {
                $chk_closeval = 1;
            }

            /* Hold grid End */

            /* Other Detail start */
            $txt_jobopen = $this->input->post('txt_jobopen');
            $txt_desinging = $this->input->post('txt_desinging');
            $txt_bfbs = $this->input->post('txt_bfbs');
            $txt_reel = $this->input->post('txt_reel');

            $txt_margins = $this->input->post('txt_margins');
            $rempasting = $this->input->post('txt_pasting');
            $RemDelivery = $this->input->post('txt_delivery');
            $ChkListNo = $this->input->post('txt_checklist');
            $PastProblems = $this->input->post('txt_pastprob');
            $RemPrintLine = $this->input->post('txt_printline');
            /* Other Detail End */


            /* ItemjInfo */
            // $jinfoval = "insert into item_jinfo(DocID,RemDesign,BFBS,ShadeCard,IcompanyId,OpenSize,DocNotion,RemScanning,RemPlanning,RemDelivery,
            //         ChkListNo,PastProblems,RemPrintLine)values
            //         ('$Docid','$txt_desinging','$txt_bfbs','$txt_reel','$ICompanyId','$txt_jobopen','$dcnotion','$txt_margins','$rempasting',
            //         '$RemDelivery','$ChkListNo','$PastProblems','$RemPrintLine');";
            $jinfoval = '';
            // echo $jinfoval;
            // die();
            //echo "<br>";

            /* Job card master */

            $jobcard_master = "INSERT into item_jobcardmaster(DocID,DocDate,DocNotion,ICompanyID,AUID,ADateTime,Processing,Hold,Holdreason,
                    CancelJob,CancelReason,jclose,closedate,closeResaon,ItemDetails,ProcessDetails,EstComments,JobDetails,JobKind,JobType,
                    DocketUniqueID,PlanStatus,GCNote,IsActive,FStatus,ImportFPid,ImportRecordid,ReasonOfShortQty,StockQty,Reprint_Partial)values
                    ('$Docid','$txt_docdateval','$dcnotion','$ICompanyId','$AUID','$ADateTime','$drp_oldnew','$chk_holdval','$txt_holdreason',
                    '$chk_cancelval','$txt_cancelreason','$chk_closeval','$txt_closedatejob','$txt_closereason','','','$txt_stmreamrks','$txt_jreamrks',
                    'G','C','$Docid','0','0','0','0','$hdn_gangitemid','$hdn_gangrecidestid','$txt_shortqtyreason','$txt_fgstock','$drp_shotqty');";

            // echo $jobcard_master;
            // die();
            //echo "<br>";


            /* Job Card Master d */

            $jobcard_d = '';
            foreach ($clientid as $key => $value) {
                $clientidval = $value;
                $woidval = $woid[$key];
                $closeSize = $closeSize_Array[$key];
                $openSize = $openSize_Array[$key];
                $itemidval = $itemid[$key];
                $txt_orderqtyval = $txt_orderqty[$key];
                $txt_jobqtyval = $txt_jobqty[$key];
                $jobnoval = $jobno[$key];
                $txt_printqtya = $txt_printqty[$key];
                $txt_specificationval = $txt_specification[$key];
                $txt_TotQtyProducedval = $txt_TotQtyProduced[$key];
                $txt_TotQtyDispatchedval = $txt_TotQtyDispatched[$key];
                $txt_upsvalmaingrida = $txt_upsvalmain[$key];
                $txt_fqtyval = $txt_fqty[$key];
                $txt_wsagreamrksperval = $txt_wsagreamrksper;
                $hdn_recordidval = $hdn_recordid;
                if ($txt_upsvalmaingrida == '') {
                    $txt_upsvalmaingrid = 0;
                } else {
                    $txt_upsvalmaingrid = $txt_upsvalmaingrida;
                }
                if ($txt_TotQtyProducedval == '') {
                    $txt_TotQtyProduc = 0;
                }
                if ($txt_TotQtyDispatchedval == '') {
                    $txt_TotQtyDispatc = 0;
                } else {
                    $txt_TotQtyDispatc = $txt_TotQtyDispatchedval;
                }
                if ($key == 1) {
                    $majeritme = 1;
                } else {
                    $majeritme = 0;
                }
                if ($txt_printqtya == '' || $txt_printqtya == 0) {
                    $txt_printqty = $txt_orderqtyval;
                } else {
                    $txt_printqty = $txt_printqtya;
                }
                if ($txt_fqtyval == '') {
                    $txt_fqtyvala = 0;
                } else {
                    $txt_fqtyvala = $txt_fqtyval;
                }
                $dcnotionval = $dcnotion;

                $drp_oldnewval = $drp_oldnew;
                $ICompanyIdval = $ICompanyId;

                $cstrijob = "('" . $Docid . "', '" . $clientidval . "', '" . $ICompanyIdval . "', '" . $woidval . "', '" . $itemidval . "',
                        '" . $hdn_recordidval . "','" . $txt_orderqtyval . "' ,'" . $txt_printqty . "', '" . $drp_oldnewval . "', '" . $jobnoval . "', 
                        '" . $txt_fqtyvala . "','','','','2060-01-01','" . $majeritme . "','','','0','','0','0','" . $txt_specificationval . "',
                        '" . $txt_TotQtyDispatc . "','" . $txt_TotQtyProduc . "','" . $Docid . "','" . $dcnotionval . "','" . $txt_upsvalmaingrid . "',
                        '" . $txt_wsagreamrksperval . "','" . $drp_noyes . "','" . $closeSize . "','" . $openSize . "'),";
                $jobcard_d = $jobcard_d . $cstrijob;
            }

            $jobcadrdetail_d = substr_replace($jobcard_d, ";", -1);

            $jobcadrmaster_d = "INSERT INTO item_jobcardmaster_d(DocID,ClientID,ICompanyId,WOID,ItemID,RecordID, OrdQty,JobQty,NewJob,JobNo,
                    PrintQtyAfterWastage,FilmNo,DieNo,PlateNo,DilDate,MajorItem,ItemType,JobSpec,ProofApp,ShadeCardId,ProofJob,FullSh2Ups,SpecID,
                    TotQtyDispatched,TotQtyProduced,MasterDocketUniqueID,DocNotion,UpsInCutSheet,Wastage,ShadeCard,NotExecutedPr,ExecutedPr)values" . $jobcadrdetail_d;

            // echo $jobcadrmaster_d;
            // die();
            //echo "<br>";

            /* Process detail Grid Start */

            $hdn_pAutoId_PK = $this->input->post("hdn_pAutoId_PK");
            $txt_pcomponentname = $this->input->post("txt_pcomponentname");
            $txt_pformno = $this->input->post("txt_pformno");
            $txt_pplateno = $this->input->post("txt_pplateno");
            $hdn_pprid = $this->input->post("hdn_pprid");
            $txt_pprocessname = $this->input->post("txt_pprocessname");
            $txt_pfb = $this->input->post("txt_pfb");

            $hdn_pSeqNo = $this->input->post("hdn_pSeqNo");
            $hdn_pint_Info1 = $this->input->post("hdn_pint_Info1");
            $hdn_pint_Info2 = $this->input->post("hdn_pint_Info2");
            $hdn_pint_Info3 = $this->input->post("hdn_pint_Info3");
            $hdn_pint_Info4 = $this->input->post("hdn_pint_Info4");

            $hdn_pDob_Info1 = $this->input->post("hdn_pDob_Info1");
            $hdn_pDob_Info2 = $this->input->post("hdn_pDob_Info2");
            $hdn_pDob_Info3 = $this->input->post("hdn_pDob_Info3");
            $hdn_pDob_Info4 = $this->input->post("hdn_pDob_Info4");
            $hdn_pDob_Info5 = $this->input->post("hdn_pDob_Info5");
            $hdn_pDob_Info6 = $this->input->post("hdn_pDob_Info6");
            $hdn_pDob_Info7 = $this->input->post("hdn_pDob_Info7");
            $hdn_pDob_Info8 = $this->input->post("hdn_pDob_Info8");
            $hdn_pDob_Info9 = $this->input->post("hdn_pDob_Info9");

            $txt_pVar_Info1 = $this->input->post("txt_pVar_Info1");
            $txt_pVar_Info2 = $this->input->post("txt_pVar_Info2");
            $hdn_pVar_Info3 = $this->input->post("hdn_pVar_Info3");
            $hdn_pVar_Info4 = $this->input->post("hdn_pVar_Info4");

            $txt_pVar_ID_Info1 = $this->input->post("txt_pVar_ID_Info1");
            $txt_pVar_ID_Info2 = $this->input->post("txt_pVar_ID_Info2");
            $hdn_pVar_ID_Info3 = $this->input->post("hdn_pVar_ID_Info3");
            $hdn_pVar_ID_Info4 = $this->input->post("hdn_pVar_ID_Info4");

            $txt_prawmaterial_1 = $this->input->post("txt_prawmaterial_1");
            $hdn_pRawMaterial_2 = $this->input->post("hdn_pRawMaterial_2");
            $hdn_pRawMaterial_3 = $this->input->post("hdn_pRawMaterial_3");
            $hdn_pRawMaterial_4 = $this->input->post("hdn_pRawMaterial_4");

            $hdn_prawmaterialid_1 = $this->input->post("hdn_prawmaterialid_1");
            $hdn_pRawMaterialID_2 = $this->input->post("hdn_pRawMaterialID_2");
            $hdn_pRawMaterialID_3 = $this->input->post("hdn_pRawMaterialID_3");
            $hdn_pRawMaterialID_4 = $this->input->post("hdn_pRawMaterialID_4");

            $hdn_pBasePrUniqueID = $this->input->post("hdn_pBasePrUniqueID");
            $hdn_pPrUniqueNo = $this->input->post("hdn_pPrUniqueNo");
            $hdn_pInputUOM = $this->input->post("hdn_pInputUOM");
            $hdn_pOutPutUOM = $this->input->post("hdn_pOutPutUOM");
            $hdn_pFullBoardNo = $this->input->post("hdn_pFullBoardNo");
            $hdn_pCutDimNo = $this->input->post("hdn_pCutDimNo");
            $hdn_pPrQty = $this->input->post("hdn_pPrQty");
            $hdn_pPlanUniqueID = $this->input->post("hdn_pPlanUniqueID");
            $hdn_pintricacy = $this->input->post("hdn_pintricacy");
            $txt_prepeat = $this->input->post("txt_prepeat");
            $hdn_pmachineid = $this->input->post("hdn_pmachineid");
            $hdn_pmachineno = $this->input->post("hdn_pmachineno");
            $txt_pmachinename = $this->input->post("txt_pmachinename");
            $txt_premarks = $this->input->post("txt_premarks");
            $drp_pexecution = $this->input->post("drp_pexecution");
            $drp_ppass = $this->input->post("drp_ppass");
            $hdn_pBoardDivFact = $this->input->post("hdn_pBoardDivFact");
            $hdn_pCutBoardDim = $this->input->post("hdn_pCutBoardDim");
            $hdn_pProcessStatus = $this->input->post("hdn_pProcessStatus");

            $txt_pmrtime = $this->input->post("hdn_pmrtimesec");
            $txt_pprocesstime = $this->input->post("hdn_pprocesstimesec");
            $txt_ptotaltime = $this->input->post("hdn_ptotaltimesec");

            $hdn_pmill = $this->input->post("hdn_pmill");
            $hdn_ppaperkind = $this->input->post("hdn_ppaperkind");
            $hdn_pgsm = $this->input->post("hdn_pgsm");
            $hdn_pplanheight = $this->input->post("hdn_pplanheight"); //FullHeight
            $hdn_pplanbreadth = $this->input->post("hdn_pplanbreadth"); //FullBre
            $hdn_pprintheight = $this->input->post("hdn_pprintheight"); //CutHeight
            $hdn_pprintbreadth = $this->input->post("hdn_pprintbreadth"); //CutBre
            $hdn_pUpsInFullSheet = $this->input->post("hdn_pUpsInFullSheet");
            $hdn_pupsincutsh = $this->input->post("hdn_pupsincutsh");
            $hdn_pcutfromfullsh = $this->input->post("hdn_pcutfromfullsh");
            $txt_pwastageper = $this->input->post("txt_pwastageper");
            $hdn_ptotcutshreq = $this->input->post("hdn_ptotcutshreq");
            $txt_pimpressions = $this->input->post("txt_pimpressions");
            $hdn_pcutshwithoutwstge = $this->input->post("hdn_pcutshwithoutwstge");
            $hdn_pImpression_WithoutWastage = $this->input->post("hdn_pImpression_WithoutWastage");
            $hdn_pTotFullSHRequired = $this->input->post("hdn_pTotFullSHRequired");
            $hdn_pFullSH_WithoutWastage = $this->input->post("hdn_pFullSH_WithoutWastage");
            $hdn_ppapermulfact = $this->input->post("hdn_ppapermulfact");
            $OsVendorIdArray = $this->input->post("hdn_pvendorId");
            $chk_client = $this->input->post("chk_clientpaper");

            /* Process detail Grid End */

            /* Foreach loop for process detail Start */

            $chk_delte = $this->input->post('chk_delte');

            $process_value = '';
            foreach ($hdn_pprid as $key => $value) {
                $ProcessID = $value;
                $AutoId_PK = $hdn_pAutoId_PK[$key];
                $Component = $txt_pcomponentname[$key];
                $FormNo = $txt_pformno[$key];
                $PlateNo = $txt_pplateno[$key];
                $ProcessName = $txt_pprocessname[$key];
                $FB = $txt_pfb[$key];

                $SeqNo = $hdn_pSeqNo[$key];
                $int_Info1 = $hdn_pint_Info1[$key];
                $int_Info2 = $hdn_pint_Info2[$key];
                $int_Info3 = $hdn_pint_Info3[$key];
                $int_Info4 = $hdn_pint_Info4[$key];
                $Dob_Info1 = $hdn_pDob_Info1[$key];
                $Dob_Info2 = $hdn_pDob_Info2[$key];
                $Dob_Info3 = $hdn_pDob_Info3[$key];
                $Dob_Info4 = $hdn_pDob_Info4[$key];
                $Dob_Info5 = $hdn_pDob_Info5[$key];
                $Dob_Info6 = $hdn_pDob_Info6[$key];
                $Dob_Info7 = $hdn_pDob_Info7[$key];
                $Dob_Info8 = $hdn_pDob_Info8[$key];
                $Dob_Info9 = $hdn_pDob_Info9[$key];

                $Var_Info1 = $txt_pVar_Info1[$key];
                $Var_Info2 = $txt_pVar_Info2[$key];
                $Var_Info3 = $hdn_pVar_Info3[$key];
                $Var_Info4 = $hdn_pVar_Info4[$key];
                $Var_ID_Info1 = $txt_pVar_ID_Info1[$key];
                $Var_ID_Info2 = $txt_pVar_ID_Info2[$key];
                $Var_ID_Info3 = $hdn_pVar_ID_Info3[$key];
                $Var_ID_Info4 = $hdn_pVar_ID_Info4[$key];

                $RawMaterial_1 = $txt_prawmaterial_1[$key];
                $RawMaterial_2 = $hdn_pRawMaterial_2[$key];
                $RawMaterial_3 = $hdn_pRawMaterial_3[$key];
                $RawMaterial_4 = $hdn_pRawMaterial_4[$key];
                $RawMaterialID_1 = $hdn_prawmaterialid_1[$key];
                $RawMaterialID_2 = $hdn_pRawMaterialID_2[$key];
                $RawMaterialID_3 = $hdn_pRawMaterialID_3[$key];
                $RawMaterialID_4 = $hdn_pRawMaterialID_4[$key];

                $FP_Remarks1 = $txt_premarks[$key];
                $BasePrUniqueID = $hdn_pBasePrUniqueID[$key];
                $PrUniqueNo = $hdn_pPrUniqueNo[$key];
                $InputUOM = $hdn_pInputUOM[$key];
                $OutPutUOM = $hdn_pOutPutUOM[$key];
                $FullBoardNo = $hdn_pFullBoardNo[$key];
                $CutDimNo = $hdn_pCutDimNo[$key];
                $PrQty = $hdn_pPrQty[$key];
                $PlanUniqueID = $hdn_pPlanUniqueID[$key];
                $IntricacyID = $hdn_pintricacy[$key];
                $NoOfRepeats = $txt_prepeat[$key];
                $ExecutionID = $drp_pexecution[$key];
                $NoOfPass = $drp_ppass[$key];
                $BoardDivFact = $hdn_pBoardDivFact[$key];
                $CutBoardDim = $hdn_pCutBoardDim[$key];
                $ProcessStatus = $hdn_pProcessStatus[$key];

                $MachineID = $hdn_pmachineid[$key]; // machine
                $MachineNo = $hdn_pmachineno[$key];
                $MachineName = $txt_pmachinename[$key];

                $MrTime = $txt_pmrtime[$key];
                $ProcessTime = $txt_pprocesstime[$key];
                $TotTime = $txt_ptotaltime[$key];

                $Mill = $hdn_pmill[$key];
                $PaperKind = $hdn_ppaperkind[$key];
                $GSM = $hdn_pgsm[$key];
                $FullHeight = $hdn_pplanheight[$key];
                $FullBre = $hdn_pplanbreadth[$key];
                $CutHeight = $hdn_pprintheight[$key];
                $CutBre = $hdn_pprintbreadth[$key];
                $UpsInFullSheet = $hdn_pUpsInFullSheet[$key];
                $UpsInCutSheets = $hdn_pupsincutsh[$key];
                $CutsFromFullSH = $hdn_pcutfromfullsh[$key];
                $WastagePer = $txt_pwastageper[$key];
                $TotCutSHRequired = $hdn_ptotcutshreq[$key];
                $TotImpressions = $txt_pimpressions[$key];
                $CutSH_WithoutWastage = $hdn_pcutshwithoutwstge[$key];
                $Impression_WithoutWastage = $hdn_pImpression_WithoutWastage[$key];
                $TotFullSHRequired = $hdn_pTotFullSHRequired[$key];
                $FullSH_WithoutWastage = $hdn_pFullSH_WithoutWastage[$key];
                $PaperMulFact = $hdn_ppapermulfact[$key];
                $osVendorID = $OsVendorIdArray[$key];

                if ($MrTime == '') {
                    $MrTime = 0;
                }if ($ProcessTime == '') {
                    $ProcessTime = 0;
                }if ($TotTime == '') {
                    $TotTime = 0;
                }
                if ($IntricacyID == 1) {
                    $IntricacyDesc = "Simple Job";
                } elseif ($IntricacyID == 2) {
                    $IntricacyDesc = "Average Job";
                } elseif ($IntricacyID == 3) {
                    $IntricacyDesc = "Complex Job";
                } else {
                    $IntricacyDesc = "";
                }
                if ($int_Info1 == '') {
                    $int_Info1 = 0;
                }if ($int_Info2 == '') {
                    $int_Info2 = 0;
                }if ($int_Info3 == '') {
                    $int_Info3 = 0;
                }if ($int_Info4 == '') {
                    $int_Info4 = 0;
                }
                if ($Dob_Info1 == '') {
                    $Dob_Info1 = 0;
                }if ($Dob_Info2 == '') {
                    $Dob_Info2 = 0;
                }if ($Dob_Info3 == '') {
                    $Dob_Info3 = 0;
                }if ($Dob_Info4 == '') {
                    $Dob_Info4 = 0;
                }
                if (isset($chk_client[$key])) {
                  $chk_clientpaper = 1;
                }else{
                   $chk_clientpaper = 0; 
                }

                $dcnotionval = $dcnotion;
                $chk_delteval = 0;
                if (isset($chk_delte[$key])) {
                    $chk_deltevak = 1;
                    $cstring = "('" . $AutoId_PK . "','" . $Docid . "','" . $Component . "','" . $FormNo . "','" . $PlateNo . "','" . $ProcessID . "', 
                        '" . $ProcessName . "', '" . $FB . "', '" . $SeqNo . "', '" . $int_Info1 . "', '" . $int_Info2 . "', '" . $int_Info3 . "',
                        '" . $int_Info4 . "', '" . $Dob_Info1 . "', '" . $Dob_Info2 . "', '" . $Dob_Info3 . "', '" . $Dob_Info4 . "', '" . $Dob_Info5 . "', 
                        '" . $Dob_Info6 . "', '" . $Dob_Info7 . "', '" . $Dob_Info8 . "', '" . $Dob_Info9 . "', 
                        '" . $Var_Info1 . "', '" . $Var_Info2 . "', '" . $Var_Info3 . "','" . $Var_Info4 . "','" . $Var_ID_Info1 . "','" . $Var_ID_Info2 . "',
                        '" . $Var_ID_Info3 . "','" . $Var_ID_Info4 . "','" . $FP_Remarks1 . "','" . $MachineID . "','" . $MachineNo . "','" . $MachineName . "',
                        '" . $RawMaterial_1 . "','" . $RawMaterial_2 . "','" . $RawMaterial_4 . "','" . $RawMaterial_3 . "',
                        '" . $RawMaterialID_1 . "','" . $RawMaterialID_2 . "','" . $RawMaterialID_3 . "','" . $RawMaterialID_4 . "','" . $ExecutionID . "',
                        '" . $BasePrUniqueID . "','" . $NoOfPass . "','" . $PrUniqueNo . "','" . $ICompanyId . "','" . $InputUOM . "','" . $OutPutUOM . "',
                        '" . $FullBoardNo . "','" . $CutDimNo . "','" . $PrQty . "','" . $PlanUniqueID . "','" . $MrTime . "'," . $ProcessTime . "," . $TotTime . ",
                        " . $IntricacyID . ",'" . $IntricacyDesc . "','" . $NoOfRepeats . "','" . $RawMaterialID_1 . "','" . $Mill . "',
                        '" . $GSM . "','" . $PaperKind . "','" . $CutHeight . "','" . $CutBre . "','" . $FullHeight . "','" . $FullBre . "',
                        '" . $UpsInFullSheet . "','" . $UpsInCutSheets . "','" . $CutsFromFullSH . "','" . $WastagePer . "','" . $TotCutSHRequired . "',
                        '" . $TotImpressions . "','" . $CutSH_WithoutWastage . "','" . $Impression_WithoutWastage . "','" . $TotFullSHRequired . "',
                        '" . $FullSH_WithoutWastage . "','" . $PaperMulFact . "','" . $BoardDivFact . "','" . $CutBoardDim . "','" . $ProcessStatus . "','" . $dcnotionval . "','" . $osVendorID . "','" . $chk_clientpaper . "'),";
                    $process_value = $process_value . $cstring;
                }
            }
            $process = substr_replace($process_value, ";", -1);

            if ($process != '') {
                $processdetail = "INSERT INTO webjobinfo_save_temp 
                    (AutoId_PK, DocId, Component, FormNo, PlateNo, ProcessID, ProcessName, FB, SeqNo, int_Info1, int_Info2, int_Info3, int_Info4, 
                    Dob_Info1, Dob_Info2, Dob_Info3, Dob_Info4, Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8, Dob_Info9, Var_Info1, Var_Info2, Var_Info3, 
                    Var_Info4, Var_ID_Info1, Var_ID_Info2, Var_ID_Info3, Var_ID_Info4, 
                    FP_Remarks1, MachineID, MachineNo, MachineName, RawMaterial_1, RawMaterial_2, RawMaterial_3, RawMaterial_4,
                    RawMaterialID_1, RawMaterialID_2, RawMaterialID_3, RawMaterialID_4, ExecutionID, BasePrUniqueID, 
                    NoOfPass, PrUniqueNo, ICompanyID, InputUOM, OutPutUOM, FullBoardNo, CutDimNo, PrQty, PlanUniqueID, MrTime, ProcessTime, TotTime, 
                    IntricacyID, IntricacyDesc, NoOfRepeats, PaperID, Mill, GSM, PaperKind, CutHeight, CutBre, FullHeight, FullBre, UpsInFullSheet, 
                    UpsInCutSheets, CutsFromFullSH, WastagePer, TotCutSHRequired, TotImpressions, CutSH_WithoutWastage, Impression_WithoutWastage, 
                    TotFullSHRequired, FullSH_WithoutWastage, PaperMulFact,BoardDivFact,CutBoardDim,ProcessStatus, DocNotion,OsVendorID,ClientPaper)VALUES" . $process;
            } else {
                $processdetail = '';
            }

            /* Foreach loop for process detail End */
            // echo $processdetail;
            // die();
            //echo "<br>";


            /* Ink detail Grid start */

            $txt_ink1 = $this->input->post("txt_ink1");
            $hdn_inkItemID1 = $this->input->post("hdn_inkItemID1");
            $txt_ink2 = $this->input->post("txt_ink2");
            $hdn_inkItemID2 = $this->input->post("hdn_inkItemID2");
            $txt_ink3 = $this->input->post("txt_ink3");
            $hdn_inkItemID3 = $this->input->post("hdn_inkItemID3");
            $txt_ink4 = $this->input->post("txt_ink4");
            $hdn_inkItemID4 = $this->input->post("hdn_inkItemID4");
            $txt_ink5 = $this->input->post("txt_ink5");
            $hdn_inkItemID5 = $this->input->post("hdn_inkItemID5");

            $ink_execution_array = $this->input->post('drp_inkExecution');

            $drp_plate = $this->input->post("drp_plate");
            $txt_plateNew = $this->input->post("txt_plateNew");
            $txt_plateOld = $this->input->post("txt_plateOld");
            $txt_plateRemarks = $this->input->post("txt_plateRemarks");
            $OsVendorIdPlateArray = $this->input->post("hdn_PlOsVendor");

            $txt_pcomponentname = $this->input->post("hdn_Plcomponent");
            $txt_pformno = $this->input->post("hdn_Plformno");
            $txt_pplateno = $this->input->post("hdn_PlPlateNo");

            /* Ink detail Grid end */


            /* Foreach loop for ink detail start */

            $ink_value = '';
            if (isset($hdn_inkItemID1)) {
                foreach ($hdn_inkItemID1 as $key => $value) {
                    $InkID1 = $value;
                    $InkID2 = $hdn_inkItemID2[$key];
                    $InkID3 = $hdn_inkItemID3[$key];
                    $InkID4 = $hdn_inkItemID4[$key];
                    $InkID5 = $hdn_inkItemID5[$key];
                    $PlateID = $drp_plate[$key];
                    $PlateRemarks = $txt_plateRemarks[$key];
                    $NewPlates = $txt_plateNew[$key];
                    $OldPlates = $txt_plateOld[$key];
                    $NoOfPlates = $NewPlates + $OldPlates;

                    $txt_pcomponentnameVal = $txt_pcomponentname[$key];
                    $txt_pformnoVal = $txt_pformno[$key];
                    $txt_pplatenoVal = $txt_pplateno[$key];

                    $InkUnit = '';

                    $ink_execution = $ink_execution_array[$key];
                    if ($InkUnit == '') {
                        $InkUnit = 0;
                    }
                    $chk_frontval = 0;

                    $vendorPlate = $OsVendorIdPlateArray[$key];
                    $dcnotionval = $dcnotion;
                    $cstringink = "('" . $Docid . "','" . $InkID1 . "', '" . $InkID2 . "', '" . $InkID3 . "', '" . $InkID4 . "','" . $InkID5 . "',
                         '" . $InkUnit . "','" . $PlateID . "', '" . $NoOfPlates . "', '" . $PlateRemarks . "', '" . $NewPlates . "', '" . $OldPlates . "', 
                         '" . $chk_frontval . "','" . $txt_pcomponentnameVal . "','" . $txt_pformnoVal . "',
                         '" . $txt_pplatenoVal . "','" . $dcnotionval . "','" . $ink_execution . "','" . $vendorPlate . "'),";
                    $ink_value = $ink_value . $cstringink;
                }
                /* Foreach loop for ink detail end */
                $inkdetail = substr_replace($ink_value, ";", -1);

                $inkquery = "INSERT INTO Web_ink_save_temp(DocID,InkID1,InkID2,InkID3,InkID4,InkID5,InkUnit,PlateID,NoOfPlates,
                        PlateRemarks,NewPlates,OldPlates,FrontBack,component,formno,plateno,DocNotion,OS,OSVendorID)values" . $inkdetail;
            } else {
                $inkquery = '';
            }

            /* Foreach loop for ink detail End */
            // echo $inkquery;
            // die();

            /* Raw  material detail start */
            $txt_rawmaterial = $this->input->post('txt_rawmaterial');
            $txt_Details = $this->input->post('txt_Details');
            $txt_apprx = $this->input->post('txt_apprx');
            $txt_otherdetail = $this->input->post('txt_otherdetail');
            $txt_unit = $this->input->post('txt_unit');
            $txt_requestocc = $this->input->post('txt_requestocc');
            $txt_materialsta = $this->input->post('txt_materialsta');
            $txt_qtyall = $this->input->post('txt_qtyall');
            $txt_imr = $this->input->post('txt_imr');
            $txt_olditemid = $this->input->post('txt_olditemid');
            $txt_oldmatrial = $this->input->post('txt_oldmatrial');
            $txt_recordid = $this->input->post('txt_recordid');
            $txt_allcatidid = $this->input->post('txt_allcatidid');
            $txt_allocatmater = $this->input->post('txt_allocatmater');
            $txt_Prid = $this->input->post('txt_Prid');
            $txt_processta = $this->input->post('txt_processta');
            $txt_Jobno = $this->input->post('txt_Jobno');
            $txt_codeno = $this->input->post('txt_codeno');
            $txt_gname = $this->input->post('txt_gname');

            //hidden field
            $hdn_raw_id1 = $this->input->post('hdn_raw_id1');
            $hdn_raw_id2 = $this->input->post('hdn_raw_id2');
            $hdn_group_id1 = $this->input->post('hdn_group_id1');
            $hdn_group_id2 = $this->input->post('hdn_group_id2');


            $hdn_int_id_info1 = $this->input->post('hdn_int_id_info1');
            $hdn_int_id_info2 = $this->input->post('hdn_int_id_info2');
            $hdn_int_id_info3 = $this->input->post('hdn_int_id_info3');
            $hdn_int_id_info4 = $this->input->post('hdn_int_id_info4');


            $hdn_dob_info5 = $this->input->post('hdn_dob_info5');
            $hdn_dob_info6 = $this->input->post('hdn_dob_info6');
            $hdn_dob_info7 = $this->input->post('hdn_dob_info7');
            $hdn_dob_info8 = $this->input->post('hdn_dob_info8');
            $hdn_dob_info9 = $this->input->post('hdn_dob_info9');
            $hdn_group_id3 = $this->input->post('hdn_group_id3');
            $hdn_group_id4 = $this->input->post('hdn_group_id4');
            $hdn_raw_id3 = $this->input->post('hdn_raw_id3');
            $hdn_raw_id4 = $this->input->post('hdn_raw_id4');
            $hdn_jobcomplexity = $this->input->post('hdn_jobcomplexity');

            $txt_pcomponentname = $this->input->post("hdn_RComponent");
            $txt_pformno = $this->input->post("hdn_RFormNo");
            $hdn_RPlateNo = $this->input->post("hdn_RPlateNo");

            /* Raw  material detail End */


            /* Foreach Loop Raw Material Start */
            $raw_value = '';
            if (isset($txt_rawmaterial)) {
                foreach ($txt_rawmaterial as $key => $value) {
                    $txt_rawmaterialval = $value;
					
					if(isset($txt_pcomponentname[$key])){
						$txt_pcomponentnameval = $txt_pcomponentname[$key];
					}else{
						$txt_pcomponentnameval = '';
					}
					
					if(isset($txt_pformno[$key])){
						$txt_pformnoval = $txt_pformno[$key];
					}else{
						$txt_pformnoval = '0';
					}
                    // if(isset($hdn_RPlateNo[$key])){
                        $hdn_RPlateNoval = $hdn_RPlateNo[$key];
                    // }else{
                    //     $hdn_RPlateNoval = '0';
                    // }					
                    
                    
					
					if($txt_pformno[$key] == ''){
						$formno = '0';
						
					}else{
						$formno = $txt_pformno[$key];
					}
					
					
					
                    $txt_Detailsval = $txt_Details[$key];
                    $txt_apprxval = $txt_apprx[$key];
                    $txt_otherdetailval = $txt_otherdetail[$key];
                    $txt_unitval = $txt_unit[$key];
                    $txt_materialstaval = $txt_materialsta[$key];
                    $txt_qtyallval = $txt_qtyall[$key];
                    $txt_imrval = $txt_imr[$key];
                    $txt_olditemidval = $txt_olditemid[$key];
                    $txt_oldmatrialval = $txt_oldmatrial[$key];
                    $txt_recordidval = $txt_recordid[$key];
                    if ($txt_recordidval == '') {
                        $txt_recordidval = 0;
                    }
                    $txt_allcatididval = $txt_allcatidid[$key];
                    $txt_allocatmaterval = $txt_allocatmater[$key];
                    $txt_Pridval = $txt_Prid[$key];
                    $txt_processtaval = $txt_processta[1];
                    $txt_Jobnoval = $txt_Jobno[$key];
                    $txt_codenoval = $txt_codeno[$key];
                    $txt_gnameval = $txt_gname[$key];
                    $dcnotionval = $dcnotion;
                    if (isset($txt_requestocc[$key])) {
                        $txt_requestoccval = '1';
                    } else {
                        $txt_requestoccval = '0';
                    }
                    $cstraw = "('" . $Docid . "','" . $txt_rawmaterialval . "','" . $txt_pcomponentnameval . "','" . $formno . "','" . $txt_Detailsval . "','" . $txt_apprxval . "', '" . $txt_otherdetailval . "', '" . $txt_unitval . "', '" . $txt_requestoccval . "', '" . $txt_materialstaval . "', '" . $txt_qtyallval . "', '" . $txt_imrval . "', '" . $txt_olditemidval . "', '" . $txt_olditemidval . "', '" . $txt_oldmatrialval . "', '" . $txt_recordidval . "', '" . $txt_allcatididval . "', '" . $txt_allocatmaterval . "', '" . $txt_Pridval . "', '" . $txt_processtaval . "', '" . $txt_Jobnoval . "', '" . $txt_codenoval . "', '" . $txt_gnameval . "','" . $dcnotionval . "','" . $hdn_RPlateNoval . "'),";
                    $raw_value = $raw_value . $cstraw;
                }
                $raw_detail = substr_replace($raw_value, ";", -1);
                $raw_detail_insert = "INSERT into web_raw_save_detail(Docid,raw_material,Component,formno, Details, Approxqtyreq, Other_Detail,Unit, 
                 ReqtoReserved,Material_status,Qty_allocated,Select_for_IMR,Old_Itmeid,Itmeid, 
                 Old_Matieral,RecordId, AllocatedID,AllocatedRawMaterial,Prid,Process_Status,jobno,Code_No,Group_Name,DocNotion,PlateNo)values" . $raw_detail;
            } else {
                $raw_detail_insert = '';
            }
            /* Foreach Loop Raw Material End */
            // echo "Khushal<br>"; 
            //  echo $raw_detail_insert;
            //  die();
            //  $raw_detail_insert = '';
            //  ---------------
            /* other detail Grid start */

            $othComponent = $this->input->post("txt_othComponent");
            $othOpenSize = $this->input->post("txt_othOpenSize");
            $othCloseSize = $this->input->post("txt_othCloseSize");
            $othNoOfPage = $this->input->post("txt_othNoOfPage");
            $othSpine = $this->input->post("txt_othSpine");
            $desinging = $this->input->post("txt_desinging");
            $checklist = $this->input->post("txt_checklist");

            /* other detail Grid end */


            /* Foreach loop for other detail start */

            $other_value = '';
            if (isset($othComponent)) {
                foreach ($othComponent as $key => $value) {
                    $othComponentVal = $value;
                    $othOpenSizeVal = $othOpenSize[$key];
                    $othCloseSizeVal = $othCloseSize[$key];
                    $othNoOfPageVal = $othNoOfPage[$key];
                    $othSpineVal = $othSpine[$key];
                    $desingingVal = $desinging[$key];
                    $checklistVal = $checklist[$key];

					if($othNoOfPageVal == ''){
						$othNoOfPageVal = '0';
					}
					
					if($othSpineVal == ''){
						$othSpineVal = '0';
					}					
                    $InkUnit = '';
                    if ($othOpenSizeVal != '' || $othOpenSizeVal != 'OpenSize') {
                        $othOpenSizeVal = addslashes($othOpenSizeVal);
                    }

                    $cstringother = "('" . $Docid . "','" . $othComponentVal . "','" . $othOpenSizeVal . "', '" . $othCloseSizeVal . "', '" . $othNoOfPageVal . "', '" . $othSpineVal . "','" . $desingingVal . "','" . $checklistVal . "'),";

                    $other_value = $other_value . $cstringother;
                }

                $otherdetail = substr_replace($other_value, ";", -1);

                $otherquery = "INSERT INTO Comm_JobSizeInfo_Save(docid,Component,OpenSize,CloseSize,NoOfPages,Spine,DesignAW,ChecklistNo)values" . $otherdetail;
            } else {
                $otherquery = '';
            }


            /* Additional Mtrl detail Grid start */

            $am_AutoId_PK = $this->input->post("txt_am_AutoId_PK");
            $am_Component = $this->input->post("hdn_am_Component");
            $am_FormNo = $this->input->post("hdn_am_FormNo");
            $am_itemid = $this->input->post("txt_am_itemid");
            $am_Description = $this->input->post("txt_am_Description");
            $am_Qty = $this->input->post("txt_am_Qty");
            $am_QtyAfterWastage = $this->input->post("txt_am_QtyAfterWastage");
            $am_UpsInFullSheet = $this->input->post("txt_am_UpsInFullSheet");
            $am_ComponentSize = $this->input->post("txt_am_ComponentSize");
            $am_CutDeckle = $this->input->post("txt_am_CutDeckle");
            $am_CutLength = $this->input->post("txt_am_CutLength");
            $am_NoOfLeaves = $this->input->post("txt_am_NoOfLeaves");

            /* Additional Mtrl detail Grid end */


            /* Foreach loop for Additional Mtrl detail start */

            $addit_val = '';
            if (isset($am_Component)) {
                foreach ($am_Component as $key => $value) {
                    $Component = $value;
                    $FormNo = $am_FormNo[$key];
                    $itemid = $am_itemid[$key];
                    $Description = $am_Description[$key];
                    $Qty = $am_Qty[$key];
                    $QtyAfterWastage = $am_QtyAfterWastage[$key];
                    $UpsInFullSheet = $am_UpsInFullSheet[$key];
                    $ComponentSize = $am_ComponentSize[$key];
                    $CutDeckle = $am_CutDeckle[$key];
                    $CutLength = $am_CutLength[$key];
                    $NoOfLeaves = $am_NoOfLeaves[$key];
                    // $AutoId_PK = $am_AutoId_PK[$key];

                    $dcnotionval = $dcnotion;
                    
                    $cstringother = "('" . $Docid . "','" . $Component . "', '" . $FormNo . "',  '" . $Qty . "',
                        '" . $QtyAfterWastage . "', '" . $UpsInFullSheet . "','" . $ComponentSize . "','" . $CutDeckle . "','" . $CutLength . "',
                        '" . $NoOfLeaves . "','" . $Description . "','" . $itemid . "','" . $dcnotionval . "'),";

                    $addit_val = $addit_val . $cstringother;
                }

                $additmtrldetail = substr_replace($addit_val, ";", -1);

                $additmtrlquery = "INSERT INTO Web_Addational_Material_Save(DocID,Component,FormNo,Qty,QtyAfterWastage,UpsInFullSheet,
                    ComponentSize,CutDeckle,CutLength,NoOfLeaves,Description,itemid,DocNotion)values" . $additmtrldetail;
            } else {
                $additmtrlquery = '';
            }
            //echo $additmtrlquery;die;
            /* Foreach loop for Additional Mtrl detail end */
            

            //die();

            $manualjc = 0;
            $this->load->model('Production/Mod_jobcard_comm');
            // echo $raw_detail_insert;
            // die();
            $Main_temp = $this->Mod_jobcard_comm->Savedataval($jobcard_master, $jobcadrmaster_d, $additmtrlquery, $processdetail, $inkquery, 
                $raw_detail_insert, $otherquery, $jobnew, $jobnofirst, $Docid, $ICompanyId, $docidset, $manualjc, $dcnotion);
            //print_r($Main_temp);



            $ErrorMessege1 = $Main_temp[0]->abc;
            if ($ErrorMessege1 == 'Record  saved.') {

                $chk_email = $this->input->post('chk_email');
                if ($chk_email == 'on') {
                    $this->email(1);
                }
                
                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";

                $gly = "<span class='fa fa-check-circle'></span>";
                $this->session->set_flashdata("success_msg", $gly . " Jobcard saved successfully ..!");
                redirect('Production/Jobsearch');

            } else {
                $ErrorMessege = $Main_temp[0]->def;
                $ErrorMessege2 = $Main_temp[0]->docnotion;
                $jobcardno = $ErrorMessege;
                $jobtype = 'Old';
                $data['data'] = $this->Mod_jobcard_comm->pageloadOld($jobcardno, $jobtype);
                $data['Neworold'] = 'Old';
                $data['docid'] = $jobcardno;
                $data['docnotionval'] = $ErrorMessege2;


                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";

                 $gly = "<span class='fa fa-exclamation-circle'></span>";
                $this->session->set_flashdata("error_msg", $gly . " Error occured while saving - ". $ErrorMessege1);
                redirect('Production/Jobsearch');
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        } else if ($btn == 'Update') {

            
            $docidset = $this->input->post('txt_docid');
            $jobnofirst = $this->input->post('hdn_jobnno[1]');
            $Docid = $this->input->post('txt_uniquerjcno');
            $dcnotion = $this->input->post('hdn_dcnotionval');
            $txt_docdateval = $this->input->post('txt_docdateval');

            $ICompanyId = $this->input->post('hdn_icompid');
          //  $ICompanyId = $_SESSION['ICompanyID'];

            date_default_timezone_set('Asia/Calcutta');
            $ADateTime = date('Y/m/d H:i:s ', time());
            $AUID = $this->input->post('hdn_uid');
           // $AUID = $_SESSION['userid'];

            $txt_closedatejoba = $this->input->post('txt_closedateval');
            // print_r($txt_closedatejoba);
            if ($txt_closedatejoba == '') {
                $txt_closedatejob = '2060-01-01';
            } else {
                $txt_closedatejob = $txt_closedatejoba;
            }

            $hdn_recordid = $this->input->post('hdn_recordid');

            /* Array  Job Item */
            $clientid = $this->input->post('hdn_clientid');
            $woid = $this->input->post('hdn_woid');
            $itemid = $this->input->post('hdn_itemid');

            $txt_orderqty = $this->input->post('txt_orderqty');
            $txt_jobqty = $this->input->post('txt_orderqty');
            $jobno = $this->input->post('hdn_jobnno');
            $txt_printqty = $this->input->post('txt_printqty');
            $txt_fqty = $this->input->post('txt_fqty');
            $txt_specification = $this->input->post('txt_specification');
            $txt_TotQtyProduced = $this->input->post('txt_TotQtyProduced');
            $txt_TotQtyDispatched = $this->input->post('txt_TotQtyDispatched');

            $drp_oldnew = $this->input->post('drp_oldnew');
            $txt_jreamrks = $this->input->post('txt_jreamrks');
            $txt_woreamrks = $this->input->post('txt_woreamrks');
            $txt_stmreamrks = $this->input->post('txt_stmreamrks');
            $txt_fgstock = $this->input->post('txt_fgstock');
            $hdn_gangitemid = $this->input->post('hdn_gangitemid'); //////////
            $drp_shotqty = $this->input->post('drp_shotqty');
            $txt_shortqtyreason = $this->input->post('txt_shortqtyreason');
            if ($txt_fgstock == '') {
                $txt_fgstock = 0;
            }

            $drp_repeatjob = $this->input->post('drp_repeatjob');
            $drp_noyes = $this->input->post('drp_noyes');
            $txt_wsagreamrksper = $this->input->post('txt_wsagreamrksper');
            $txt_wassheet = $this->input->post('txt_wassheet');
            $txt_upsvalmain = $this->input->post('txt_upsvalmain');

            /* Hold grid Start */

            $chk_hold = $this->input->post('chk_hold');
            $txt_holdreason = $this->input->post('txt_holdreason');
            $chk_cancel = $this->input->post('chk_cancel');
            $txt_cancelreason = $this->input->post('txt_cancelreason');
            $chk_close = $this->input->post('chk_close');
            $txt_closereason = $this->input->post('txt_closereason');
            $txt_closedate = $this->input->post('txt_closedate');
            // $txt_closedatejob = $this->input->post('txt_closedateval');
            // if ($txt_closedatejob == '') {
            //     $txt_closedatejob = '2060-01-01';
            // } else {
            //     $txt_closedatejob = $txt_closedatejob;
            // }

            $chk_holdval = 0;
            if (isset($chk_hold)) {
                $chk_holdval = 1;
            }

            $chk_cancelval = 0;
            if (isset($chk_cancel)) {
                $chk_cancelval = 1;
            }
            $chk_closeval = 0;
            if (isset($chk_close)) {
                $chk_closeval = 1;
            }

            /* Hold grid End */

            /* other detail Grid start */

            $othComponent = $this->input->post("txt_othComponent");
            $othOpenSize = $this->input->post("txt_othOpenSize");
            $othCloseSize = $this->input->post("txt_othCloseSize");
            $othNoOfPage = $this->input->post("txt_othNoOfPage");
            $othSpine = $this->input->post("txt_othSpine");
            $desinging = $this->input->post("txt_desinging");
			
						
            $checklist = $this->input->post("txt_checklist");

            /* other detail Grid end */


            /* Foreach loop for other detail start */

            $other_value = '';
            if (isset($othComponent)) {
                foreach ($othComponent as $key => $value) {
                    $othComponentVal = $value;
                    $othOpenSizeVal = $othOpenSize[$key];
                    $othCloseSizeVal = $othCloseSize[$key];
                    $othNoOfPageVal = $othNoOfPage[$key];
                    $othSpineVal = $othSpine[$key];
					
					if(isset($desinging[$key])){
						$desingingVal = $desinging[$key];
					}else{
						$desingingVal = '';
					}					
					
					if(isset($checklist[$key])){
						$checklistVal = $checklist[$key];
					}else{
						$checklistVal = '';
					}					
					
					if($othNoOfPageVal == ''){
						$othNoOfPageVal = '0';
					}
					
					if($othSpineVal == ''){
						$othSpineVal = '0';
					}					

                    $InkUnit = '';

                // echo $othOpenSizeVal;
                // die();
                // if ($othOpenSizeVal != '') {
                //     $k = explode('"', $othOpenSizeVal);
                //     $othOpenSizeVal = $k[0];
                // }

                    $cstringother = "('" . $Docid . "','" . $othComponentVal . "', '" . $othOpenSizeVal . "', '" . $othCloseSizeVal . "', '" . $othNoOfPageVal . "', '" . $othSpineVal . "','" . $desingingVal . "','" . $checklistVal . "'),";

                    $other_value = $other_value . $cstringother;
                }
                /* Foreach loop for ink detail end */
                $otherdetail = substr_replace($other_value, ";", -1);

                $otherquery = "INSERT INTO Comm_JobSizeInfo_Save(docid,Component,OpenSize,CloseSize,NoOfPages,Spine,DesignAW,ChecklistNo)values" . $otherdetail;
            } else {
                $otherquery = '';
            }


            /* Job card master */

            $jobcard_master = "UPDATE item_jobcardmaster set DocDate = '$txt_docdateval',Docnotion='$dcnotion',ICompanyID='$ICompanyId' ,
                    MUID= '$AUID',MDateTime='$ADateTime',Processing='$drp_oldnew',Hold='$chk_holdval',Holdreason='$txt_holdreason',
                    CancelJob='$chk_cancelval',CancelReason='$txt_cancelreason',jclose='$chk_closeval',closedate='$txt_closedatejob',
                    closeResaon='$txt_closereason',ItemDetails='',ProcessDetails='',EstComments='$txt_stmreamrks',JobDetails='$txt_jreamrks',
                    JobKind='G',JobType='C', DocketUniqueID='$Docid',PlanStatus='0',ReasonOfShortQty='$txt_shortqtyreason',
                    StockQty='$txt_fgstock',Reprint_Partial='$drp_shotqty' where DocID = '$docidset';";


            /* Job Card Master d */
            // echo $jobcard_master;
            // die();

            $jobcard_d = '';
            foreach ($clientid as $key => $value) {
                $clientidval = $value;
                $woidval = $woid[$key];
                $itemidval = $itemid[$key];
                $txt_orderqtyval = $txt_orderqty[$key];
                $txt_jobqtyval = $txt_jobqty[$key];
                $jobnoval = $jobno[$key];
                $txt_printqtya = $txt_printqty[$key];
                $txt_specificationval = $txt_specification[$key];
                $txt_TotQtyProducedval = $txt_TotQtyProduced[$key];
                $txt_TotQtyDispatchedval = $txt_TotQtyDispatched[$key];
                $txt_upsvalmaingrida = $txt_upsvalmain[$key];
                $txt_wsagreamrksperval = $txt_wsagreamrksper;
                $hdn_recordidval = $hdn_recordid;
                $txt_fqtyval = $txt_fqty[$key];

                if ($txt_upsvalmaingrida == '') {
                    $txt_upsvalmaingrid = 0;
                } else {
                    $txt_upsvalmaingrid = $txt_upsvalmaingrida;
                }
                if ($txt_TotQtyProducedval == '') {
                    $txt_TotQtyProduc = 0;
                }
                if ($txt_TotQtyDispatchedval == '') {
                    $txt_TotQtyDispatc = 0;
                } else {
                    $txt_TotQtyDispatc = $txt_TotQtyDispatchedval;
                }
                if ($txt_fqtyval == '') {
                    $txt_fqtyvala = 0;
                } else {
                    $txt_fqtyvala = $txt_fqtyval;
                }

                if ($key == 1) {
                    $majeritme = 1;
                } else {
                    $majeritme = 0;
                }
                if ($txt_printqtya == '' || $txt_printqtya == 0) {
                    $txt_printqty = $txt_orderqtyval;
                } else {
                    $txt_printqty = $txt_printqtya;
                }
                $dcnotionval = $dcnotion;
                $drp_oldnewval = $drp_oldnew;
                $ICompanyIdval = $ICompanyId;

                $cstrijob = "('" . $docidset . "', '" . $clientidval . "', '" . $ICompanyIdval . "', '" . $woidval . "', '" . $itemidval . "',
                        '" . $hdn_recordidval . "','" . $txt_orderqtyval . "', '" . $txt_printqty . "', '" . $drp_oldnewval . "', '" . $jobnoval . "', 
                        '" . $txt_fqtyvala . "','','','','2060-01-01','" . $majeritme . "','','','0','','0','0','" . $txt_specificationval . "',
                        '" . $txt_TotQtyDispatc . "','" . $txt_TotQtyProduc . "','" . $Docid . "','" . $dcnotionval . "','" . $txt_upsvalmaingrid . "',
                        '" . $txt_wsagreamrksperval . "','" . $drp_noyes . "'),";
                $jobcard_d = $jobcard_d . $cstrijob;
            }

            $jobcadrdetail_d = substr_replace($jobcard_d, ";", -1);

            $jobcadrmaster_d = "INSERT into item_jobcardmaster_d(DocID,ClientID,ICompanyId,WOID,ItemID,RecordID,OrdQty,JobQty,NewJob,JobNo,
                    PrintQtyAfterWastage,FilmNo,DieNo,PlateNo,DilDate,MajorItem,ItemType,JobSpec,ProofApp,ShadeCardId,ProofJob,FullSh2Ups,SpecID,
                    TotQtyDispatched,TotQtyProduced,MasterDocketUniqueID,DocNotion,UpsInCutSheet,Wastage,ShadeCard)values" . $jobcadrdetail_d;

            //echo $jobcadrmaster_d;
            //echo "<br>";


            /* Process detail Grid Start */

            $hdn_pAutoId_PK = $this->input->post("hdn_pAutoId_PK");
            $txt_pcomponentname = $this->input->post("txt_pcomponentname");
            $txt_pformno = $this->input->post("txt_pformno");
            $txt_pplateno = $this->input->post("txt_pplateno");
            $hdn_pprid = $this->input->post("hdn_pprid");
            $txt_pprocessname = $this->input->post("txt_pprocessname");
            $txt_pfb = $this->input->post("txt_pfb");

            $hdn_pSeqNo = $this->input->post("hdn_pSeqNo");
            $hdn_pint_Info1 = $this->input->post("hdn_pint_Info1");
            $hdn_pint_Info2 = $this->input->post("hdn_pint_Info2");
            $hdn_pint_Info3 = $this->input->post("hdn_pint_Info3");
            $hdn_pint_Info4 = $this->input->post("hdn_pint_Info4");

            $hdn_pDob_Info1 = $this->input->post("hdn_pDob_Info1");
            $hdn_pDob_Info2 = $this->input->post("hdn_pDob_Info2");
            $hdn_pDob_Info3 = $this->input->post("hdn_pDob_Info3");
            $hdn_pDob_Info4 = $this->input->post("hdn_pDob_Info4");
            $hdn_pDob_Info5 = $this->input->post("hdn_pDob_Info5");
            $hdn_pDob_Info6 = $this->input->post("hdn_pDob_Info6");
            $hdn_pDob_Info7 = $this->input->post("hdn_pDob_Info7");
            $hdn_pDob_Info8 = $this->input->post("hdn_pDob_Info8");
            $hdn_pDob_Info9 = $this->input->post("hdn_pDob_Info9");

            $txt_pVar_Info1 = $this->input->post("txt_pVar_Info1");
            $txt_pVar_Info2 = $this->input->post("txt_pVar_Info2");
            $hdn_pVar_Info3 = $this->input->post("hdn_pVar_Info3");
            $hdn_pVar_Info4 = $this->input->post("hdn_pVar_Info4");

            $txt_pVar_ID_Info1 = $this->input->post("txt_pVar_ID_Info1");
            $txt_pVar_ID_Info2 = $this->input->post("txt_pVar_ID_Info2");
            $hdn_pVar_ID_Info3 = $this->input->post("hdn_pVar_ID_Info3");
            $hdn_pVar_ID_Info4 = $this->input->post("hdn_pVar_ID_Info4");

            $txt_prawmaterial_1 = $this->input->post("txt_prawmaterial_1");
            $hdn_pRawMaterial_2 = $this->input->post("hdn_pRawMaterial_2");
            $hdn_pRawMaterial_3 = $this->input->post("hdn_pRawMaterial_3");
            $hdn_pRawMaterial_4 = $this->input->post("hdn_pRawMaterial_4");

            $hdn_prawmaterialid_1 = $this->input->post("hdn_prawmaterialid_1");
            $hdn_pRawMaterialID_2 = $this->input->post("hdn_pRawMaterialID_2");
            $hdn_pRawMaterialID_3 = $this->input->post("hdn_pRawMaterialID_3");
            $hdn_pRawMaterialID_4 = $this->input->post("hdn_pRawMaterialID_4");

            $hdn_pBasePrUniqueID = $this->input->post("hdn_pBasePrUniqueID");
            $hdn_pPrUniqueNo = $this->input->post("hdn_pPrUniqueNo");
            $hdn_pInputUOM = $this->input->post("hdn_pInputUOM");
            $hdn_pOutPutUOM = $this->input->post("hdn_pOutPutUOM");
            $hdn_pFullBoardNo = $this->input->post("hdn_pFullBoardNo");
            $hdn_pCutDimNo = $this->input->post("hdn_pCutDimNo");
            $hdn_pPrQty = $this->input->post("hdn_pPrQty");
            $hdn_pPlanUniqueID = $this->input->post("hdn_pPlanUniqueID");
            $hdn_pintricacy = $this->input->post("hdn_pintricacy");
            $txt_prepeat = $this->input->post("txt_prepeat");
            $hdn_pmachineid = $this->input->post("hdn_pmachineid");
            $hdn_pmachineno = $this->input->post("hdn_pmachineno");
            $txt_pmachinename = $this->input->post("txt_pmachinename");
            $txt_premarks = $this->input->post("txt_premarks");
            $drp_pexecution = $this->input->post("drp_pexecution");
            $drp_ppass = $this->input->post("drp_ppass");
            $hdn_pBoardDivFact = $this->input->post("hdn_pBoardDivFact");
            $hdn_pCutBoardDim = $this->input->post("hdn_pCutBoardDim");
            $hdn_pProcessStatus = $this->input->post("hdn_pProcessStatus");

            $txt_pmrtime = $this->input->post("hdn_pmrtimesec");
            $txt_pprocesstime = $this->input->post("hdn_pprocesstimesec");
            $txt_ptotaltime = $this->input->post("hdn_ptotaltimesec");

            $hdn_pmill = $this->input->post("hdn_pmill");
            $hdn_ppaperkind = $this->input->post("hdn_ppaperkind");
            $hdn_pgsm = $this->input->post("hdn_pgsm");
            $hdn_pplanheight = $this->input->post("hdn_pplanheight"); //FullHeight
            $hdn_pplanbreadth = $this->input->post("hdn_pplanbreadth"); //FullBre
            $hdn_pprintheight = $this->input->post("hdn_pprintheight"); //CutHeight
            $hdn_pprintbreadth = $this->input->post("hdn_pprintbreadth"); //CutBre
            $hdn_pUpsInFullSheet = $this->input->post("hdn_pUpsInFullSheet");
            $hdn_pupsincutsh = $this->input->post("hdn_pupsincutsh");
            $hdn_pcutfromfullsh = $this->input->post("hdn_pcutfromfullsh");
            $txt_pwastageper = $this->input->post("txt_pwastageper");
            $hdn_ptotcutshreq = $this->input->post("hdn_ptotcutshreq");
            $txt_pimpressions = $this->input->post("txt_pimpressions");
            $hdn_pcutshwithoutwstge = $this->input->post("hdn_pcutshwithoutwstge");
            $hdn_pImpression_WithoutWastage = $this->input->post("hdn_pImpression_WithoutWastage");
            $hdn_pTotFullSHRequired = $this->input->post("hdn_pTotFullSHRequired");
            $hdn_pFullSH_WithoutWastage = $this->input->post("hdn_pFullSH_WithoutWastage");
            $hdn_ppapermulfact = $this->input->post("hdn_ppapermulfact");
            $OsVendorIdArray = $this->input->post("hdn_pvendorId");
            $chk_client = $this->input->post("chk_clientpaper");
            // if (isset($chk_client)) {
            //     $chk_clientpaper = 1;
            // }else{
            //    $chk_clientpaper = 0; 
            // }

            /* Process detail Grid End */

            /* Foreach loop for process detail Start */

            $chk_delte = $this->input->post('chk_delte');

            $process_value = '';
            foreach ($hdn_pprid as $key => $value) {
                $ProcessID = $value;
                $AutoId_PK = $hdn_pAutoId_PK[$key];
                $Component = $txt_pcomponentname[$key];
                $FormNo = $txt_pformno[$key];
                $PlateNo = $txt_pplateno[$key];
                $ProcessName = $txt_pprocessname[$key];
                $FB = $txt_pfb[$key];

                $SeqNo = $hdn_pSeqNo[$key];
                $int_Info1 = $hdn_pint_Info1[$key];
                $int_Info2 = $hdn_pint_Info2[$key];
                $int_Info3 = $hdn_pint_Info3[$key];
                $int_Info4 = $hdn_pint_Info4[$key];
                $Dob_Info1 = $hdn_pDob_Info1[$key];
                $Dob_Info2 = $hdn_pDob_Info2[$key];
                $Dob_Info3 = $hdn_pDob_Info3[$key];
                $Dob_Info4 = $hdn_pDob_Info4[$key];
                $Dob_Info5 = $hdn_pDob_Info5[$key];
                $Dob_Info6 = $hdn_pDob_Info6[$key];
                $Dob_Info7 = $hdn_pDob_Info7[$key];
                $Dob_Info8 = $hdn_pDob_Info8[$key];
                $Dob_Info9 = $hdn_pDob_Info9[$key];
                $Var_Info1 = $txt_pVar_Info1[$key];
                $Var_Info2 = $txt_pVar_Info2[$key];
                $Var_Info3 = $hdn_pVar_Info3[$key];
                $Var_Info4 = $hdn_pVar_Info4[$key];
                $Var_ID_Info1 = $txt_pVar_ID_Info1[$key];
                $Var_ID_Info2 = $txt_pVar_ID_Info2[$key];
                $Var_ID_Info3 = $hdn_pVar_ID_Info3[$key];
                $Var_ID_Info4 = $hdn_pVar_ID_Info4[$key];

                $RawMaterial_1 = $txt_prawmaterial_1[$key];
                $RawMaterial_2 = $hdn_pRawMaterial_2[$key];
                $RawMaterial_3 = $hdn_pRawMaterial_3[$key];
                $RawMaterial_4 = $hdn_pRawMaterial_4[$key];
                $RawMaterialID_1 = $hdn_prawmaterialid_1[$key];
                $RawMaterialID_2 = $hdn_pRawMaterialID_2[$key];
                $RawMaterialID_3 = $hdn_pRawMaterialID_3[$key];
                $RawMaterialID_4 = $hdn_pRawMaterialID_4[$key];

                $FP_Remarks1 = $txt_premarks[$key];
                $BasePrUniqueID = $hdn_pBasePrUniqueID[$key];
                $PrUniqueNo = $hdn_pPrUniqueNo[$key];
                $InputUOM = $hdn_pInputUOM[$key];
                $OutPutUOM = $hdn_pOutPutUOM[$key];
                $FullBoardNo = $hdn_pFullBoardNo[$key];
                $CutDimNo = $hdn_pCutDimNo[$key];
                $PrQty = $hdn_pPrQty[$key];
                $PlanUniqueID = $hdn_pPlanUniqueID[$key];
                $IntricacyID = $hdn_pintricacy[$key];
                $NoOfRepeats = $txt_prepeat[$key];
                $ExecutionID = $drp_pexecution[$key];
                $NoOfPass = $drp_ppass[$key];
                $BoardDivFact = $hdn_pBoardDivFact[$key];
                $CutBoardDim = $hdn_pCutBoardDim[$key];
                $ProcessStatus = $hdn_pProcessStatus[$key];

                $MachineID = $hdn_pmachineid[$key]; // machine
                $MachineNo = $hdn_pmachineno[$key];
                $MachineName = $txt_pmachinename[$key];

                $MrTime = $txt_pmrtime[$key];
                $ProcessTime = $txt_pprocesstime[$key];
                $TotTime = $txt_ptotaltime[$key];

                $Mill = $hdn_pmill[$key];
                $PaperKind = $hdn_ppaperkind[$key];
                $GSM = $hdn_pgsm[$key];
                $FullHeight = $hdn_pplanheight[$key];
                $FullBre = $hdn_pplanbreadth[$key];
                $CutHeight = $hdn_pprintheight[$key];
                $CutBre = $hdn_pprintbreadth[$key];
                $UpsInFullSheet = $hdn_pUpsInFullSheet[$key];
                $UpsInCutSheets = $hdn_pupsincutsh[$key];
                $CutsFromFullSH = $hdn_pcutfromfullsh[$key];
                $WastagePer = $txt_pwastageper[$key];
                $TotCutSHRequired = $hdn_ptotcutshreq[$key];
                $TotImpressions = $txt_pimpressions[$key];
                $CutSH_WithoutWastage = $hdn_pcutshwithoutwstge[$key];
                $Impression_WithoutWastage = $hdn_pImpression_WithoutWastage[$key];
                $TotFullSHRequired = $hdn_pTotFullSHRequired[$key];
                $FullSH_WithoutWastage = $hdn_pFullSH_WithoutWastage[$key];
                $PaperMulFact = $hdn_ppapermulfact[$key];
                $osVendorID = $OsVendorIdArray[$key];

                if ($MrTime == '') {
                    $MrTime = 0;
                }if ($ProcessTime == '') {
                    $ProcessTime = 0;
                }if ($TotTime == '') {
                    $TotTime = 0;
                }
                if ($IntricacyID == 1) {
                    $IntricacyDesc = "Simple Job";
                } elseif ($IntricacyID == 2) {
                    $IntricacyDesc = "Average Job";
                } elseif ($IntricacyID == 3) {
                    $IntricacyDesc = "Complex Job";
                } else {
                    $IntricacyDesc = "";
                }
                if ($int_Info1 == '') {
                    $int_Info1 = 0;
                }if ($int_Info2 == '') {
                    $int_Info2 = 0;
                }if ($int_Info3 == '') {
                    $int_Info3 = 0;
                }if ($int_Info4 == '') {
                    $int_Info4 = 0;
                }
                if ($Dob_Info1 == '') {
                    $Dob_Info1 = 0;
                }if ($Dob_Info2 == '') {
                    $Dob_Info2 = 0;
                }if ($Dob_Info3 == '') {
                    $Dob_Info3 = 0;
                }if ($Dob_Info4 == '') {
                    $Dob_Info4 = 0;
                }
                if (isset($chk_client[$key])) {
                  $chk_clientpaper = 1;
                }else{
                   $chk_clientpaper = 0; 
                }

                $dcnotionval = $dcnotion;
                $chk_delteval = 0;
                if (isset($chk_delte[$key])) {
                    $chk_deltevak = 1;
                    $cstring = "('" . $AutoId_PK . "','" . $docidset . "','" . $Component . "','" . $FormNo . "','" . $PlateNo . "','" . $ProcessID . "', 
                        '" . $ProcessName . "', '" . $FB . "', '" . $SeqNo . "', '" . $int_Info1 . "', '" . $int_Info2 . "', '" . $int_Info3 . "',
                        '" . $int_Info4 . "', '" . $Dob_Info1 . "', '" . $Dob_Info2 . "', '" . $Dob_Info3 . "', '" . $Dob_Info4 . "', '" . $Dob_Info5 . "', 
                        '" . $Dob_Info6 . "', '" . $Dob_Info7 . "', '" . $Dob_Info8 . "', '" . $Dob_Info9 . "', 
                        '" . $Var_Info1 . "', '" . $Var_Info2 . "', '" . $Var_Info3 . "','" . $Var_Info4 . "','" . $Var_ID_Info1 . "','" . $Var_ID_Info2 . "',
                        '" . $Var_ID_Info3 . "','" . $Var_ID_Info4 . "','" . $FP_Remarks1 . "','" . $MachineID . "','" . $MachineNo . "','" . $MachineName . "',
                        '" . $RawMaterial_1 . "','" . $RawMaterial_2 . "','" . $RawMaterial_4 . "','" . $RawMaterial_3 . "',
                        '" . $RawMaterialID_1 . "','" . $RawMaterialID_2 . "','" . $RawMaterialID_3 . "','" . $RawMaterialID_4 . "','" . $ExecutionID . "',
                        '" . $BasePrUniqueID . "','" . $NoOfPass . "','" . $PrUniqueNo . "','" . $ICompanyId . "','" . $InputUOM . "','" . $OutPutUOM . "',
                        '" . $FullBoardNo . "','" . $CutDimNo . "','" . $PrQty . "','" . $PlanUniqueID . "','" . $MrTime . "'," . $ProcessTime . "," . $TotTime . ",
                        " . $IntricacyID . ",'" . $IntricacyDesc . "','" . $NoOfRepeats . "','" . $RawMaterialID_1 . "','" . $Mill . "',
                        '" . $GSM . "','" . $PaperKind . "','" . $CutHeight . "','" . $CutBre . "','" . $FullHeight . "','" . $FullBre . "',
                        '" . $UpsInFullSheet . "','" . $UpsInCutSheets . "','" . $CutsFromFullSH . "','" . $WastagePer . "','" . $TotCutSHRequired . "',
                        '" . $TotImpressions . "','" . $CutSH_WithoutWastage . "','" . $Impression_WithoutWastage . "','" . $TotFullSHRequired . "',
                        '" . $FullSH_WithoutWastage . "','" . $PaperMulFact . "','" . $BoardDivFact . "','" . $CutBoardDim . "','" . $ProcessStatus . "','" . $dcnotionval . "','" . $osVendorID . "','" . $chk_clientpaper . "'),";
                    $process_value = $process_value . $cstring;
                }
            }
            $process = substr_replace($process_value, ";", -1);

            if ($process != '') {
                $processdetail = "INSERT INTO webjobinfo_save_temp 
                    (AutoId_PK, DocId, Component, FormNo, PlateNo, ProcessID, ProcessName, FB, SeqNo, int_Info1, int_Info2, int_Info3, int_Info4, 
                    Dob_Info1, Dob_Info2, Dob_Info3, Dob_Info4, Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8, Dob_Info9, Var_Info1, Var_Info2, Var_Info3, 
                    Var_Info4, Var_ID_Info1, Var_ID_Info2, Var_ID_Info3, Var_ID_Info4, 
                    FP_Remarks1, MachineID, MachineNo, MachineName, RawMaterial_1, RawMaterial_2, RawMaterial_3, RawMaterial_4,
                    RawMaterialID_1, RawMaterialID_2, RawMaterialID_3, RawMaterialID_4, ExecutionID, BasePrUniqueID, 
                    NoOfPass, PrUniqueNo, ICompanyID, InputUOM, OutPutUOM, FullBoardNo, CutDimNo, PrQty, PlanUniqueID, MrTime, ProcessTime, TotTime, 
                    IntricacyID, IntricacyDesc, NoOfRepeats, PaperID, Mill, GSM, PaperKind, CutHeight, CutBre, FullHeight, FullBre, UpsInFullSheet, 
                    UpsInCutSheets, CutsFromFullSH, WastagePer, TotCutSHRequired, TotImpressions, CutSH_WithoutWastage, Impression_WithoutWastage, 
                    TotFullSHRequired, FullSH_WithoutWastage, PaperMulFact,BoardDivFact,CutBoardDim,ProcessStatus, DocNotion,OSVendorID,ClientPaper)VALUES" . $process;
            } else {
                $processdetail = '';
            }


            /* Ink detail Grid start */

            $txt_ink1 = $this->input->post("txt_ink1");
            $hdn_inkItemID1 = $this->input->post("hdn_inkItemID1");
            $txt_ink2 = $this->input->post("txt_ink2");
            $hdn_inkItemID2 = $this->input->post("hdn_inkItemID2");
            $txt_ink3 = $this->input->post("txt_ink3");
            $hdn_inkItemID3 = $this->input->post("hdn_inkItemID3");
            $txt_ink4 = $this->input->post("txt_ink4");
            $hdn_inkItemID4 = $this->input->post("hdn_inkItemID4");
            $txt_ink5 = $this->input->post("txt_ink5");
            $hdn_inkItemID5 = $this->input->post("hdn_inkItemID5");

            $ink_execution_array = $this->input->post('drp_inkExecution');

            $drp_plate = $this->input->post("drp_plate");
            $txt_plateNew = $this->input->post("txt_plateNew");
            $txt_plateOld = $this->input->post("txt_plateOld");
            $txt_plateRemarks = $this->input->post("txt_plateRemarks");
            $OsVendorIdPlateArray = $this->input->post("hdn_PlOsVendor");

            $txt_pcomponentname = $this->input->post("hdn_Plcomponent");
            $txt_pformno = $this->input->post("hdn_Plformno");
            $txt_pplateno = $this->input->post("hdn_PlPlateNo");

            /* Ink detail Grid end */


            /* Foreach loop for ink detail start */

            $ink_value = '';
            if (isset($hdn_inkItemID1)) {
                foreach ($hdn_inkItemID1 as $key => $value) {
                    $InkID1 = $value;
                    $InkID2 = $hdn_inkItemID2[$key];
                    $InkID3 = $hdn_inkItemID3[$key];
                    $InkID4 = $hdn_inkItemID4[$key];
                    $InkID5 = $hdn_inkItemID5[$key];
                    $PlateID = $drp_plate[$key];
                    $PlateRemarks = $txt_plateRemarks[$key];
                    $NewPlates = $txt_plateNew[$key];
                    $OldPlates = $txt_plateOld[$key];
                    $NoOfPlates = $NewPlates + $OldPlates;

                    $txt_pcomponentnameVal = $txt_pcomponentname[$key];
                    $txt_pformnoVal = $txt_pformno[$key];
                    $txt_pplatenoVal = $txt_pplateno[$key];

                    $InkUnit = '';

                    $ink_execution = $ink_execution_array[$key];
                    if ($InkUnit == '') {
                        $InkUnit = 0;
                    }
                    $chk_frontval = 0;

                    $vendorPlate = $OsVendorIdPlateArray[$key];
                    $dcnotionval = $dcnotion;
                    $cstringink = "('" . $docidset . "','" . $InkID1 . "', '" . $InkID2 . "', '" . $InkID3 . "', '" . $InkID4 . "','" . $InkID5 . "',
                         '" . $InkUnit . "','" . $PlateID . "', '" . $NoOfPlates . "', '" . $PlateRemarks . "', '" . $NewPlates . "', '" . $OldPlates . "', 
                         '" . $chk_frontval . "','" . $txt_pcomponentnameVal . "','" . $txt_pformnoVal . "',
                         '" . $txt_pplatenoVal . "','" . $dcnotionval . "','" . $ink_execution . "','" . $vendorPlate . "'),";
                    $ink_value = $ink_value . $cstringink;
                }
                /* Foreach loop for ink detail end */
                $inkdetail = substr_replace($ink_value, ";", -1);

                $inkquery = "INSERT INTO Web_ink_save_temp(DocID,InkID1,InkID2,InkID3,InkID4,InkID5,InkUnit,PlateID,NoOfPlates,
                        PlateRemarks,NewPlates,OldPlates,FrontBack,component,formno,plateno,DocNotion,OS,OSVendorID)values" . $inkdetail;
            } else {
                $inkquery = '';
            }

            /* Foreach loop for ink detail End */
            // echo $inkquery;
            // die();


            /* Raw  material detail start */
            $txt_rawmaterial = $this->input->post('txt_rawmaterial');
            $txt_Details = $this->input->post('txt_Details');
            $txt_apprx = $this->input->post('txt_apprx');
            $txt_otherdetail = $this->input->post('txt_otherdetail');
            $txt_unit = $this->input->post('txt_unit');
            $txt_requestocc = $this->input->post('txt_requestocc');
            $txt_materialsta = $this->input->post('txt_materialsta');
            $txt_qtyall = $this->input->post('txt_qtyall');
            $txt_imr = $this->input->post('txt_imr');
            $txt_olditemid = $this->input->post('txt_olditemid');
            $txt_oldmatrial = $this->input->post('txt_oldmatrial');
            $txt_recordid = $this->input->post('txt_recordid');
            $txt_allcatidid = $this->input->post('txt_allcatidid');
            $txt_allocatmater = $this->input->post('txt_allocatmater');
            $txt_Prid = $this->input->post('txt_Prid');
            $txt_processta = $this->input->post('txt_processta');
            $txt_Jobno = $this->input->post('txt_Jobno');
            $txt_codeno = $this->input->post('txt_codeno');
            $txt_gname = $this->input->post('txt_gname');

            //hidden field
            $hdn_raw_id1 = $this->input->post('hdn_raw_id1');
            $hdn_raw_id2 = $this->input->post('hdn_raw_id2');
            $hdn_group_id1 = $this->input->post('hdn_group_id1');
            $hdn_group_id2 = $this->input->post('hdn_group_id2');


            $hdn_int_id_info1 = $this->input->post('hdn_int_id_info1');
            $hdn_int_id_info2 = $this->input->post('hdn_int_id_info2');
            $hdn_int_id_info3 = $this->input->post('hdn_int_id_info3');
            $hdn_int_id_info4 = $this->input->post('hdn_int_id_info4');


            $hdn_dob_info5 = $this->input->post('hdn_dob_info5');
            $hdn_dob_info6 = $this->input->post('hdn_dob_info6');
            $hdn_dob_info7 = $this->input->post('hdn_dob_info7');
            $hdn_dob_info8 = $this->input->post('hdn_dob_info8');
            $hdn_dob_info9 = $this->input->post('hdn_dob_info9');
            $hdn_group_id3 = $this->input->post('hdn_group_id3');
            $hdn_group_id4 = $this->input->post('hdn_group_id4');
            $hdn_raw_id3 = $this->input->post('hdn_raw_id3');
            $hdn_raw_id4 = $this->input->post('hdn_raw_id4');
            $hdn_jobcomplexity = $this->input->post('hdn_jobcomplexity');

            $txt_rpcomponentname = $this->input->post("hdn_RComponent");
            $txt_rformno = $this->input->post("hdn_RFormNo");
            $hdn_RPlateNo = $this->input->post("hdn_RPlateNo");

            /* Raw  material detail End */


            /* Foreach Loop Raw Material Start */
            $raw_value = '';
            if (isset($txt_rawmaterial)) {
                foreach ($txt_rawmaterial as $key => $value) {
                    $txt_rawmaterialval = $value;

					if(isset($txt_rpcomponentname[$key])){
						$txt_pcomponentnamevalll = $txt_rpcomponentname[$key];
					}else{
						$txt_pcomponentnamevalll = '';
					}
					
					if(isset($hdn_RPlateNo[$key])){
						$hdn_RPlateNoval = $hdn_RPlateNo[$key];
					}else{
						$hdn_RPlateNoval = '0';
					}                    
										                    
					
					if(isset($txt_rformno[$key])){						
						$rformno = $txt_rformno[$key];
					}else{
						$rformno = '0';
					}
					
                    $txt_Detailsval = $txt_Details[$key];
                    $txt_apprxval = $txt_apprx[$key];
                    $txt_otherdetailval = $txt_otherdetail[$key];
                    $txt_unitval = $txt_unit[$key];
                    $txt_materialstaval = $txt_materialsta[$key];
                    $txt_qtyallval = $txt_qtyall[$key];
                    $txt_imrval = $txt_imr[$key];
                    $txt_olditemidval = $txt_olditemid[$key];
                    $txt_oldmatrialval = $txt_oldmatrial[$key];
                    $txt_recordidval = $txt_recordid[$key];
                    if ($txt_recordidval == '') {
                        $txt_recordidval = 0;
                    }
                    $txt_allcatididval = $txt_allcatidid[$key];
                    $txt_allocatmaterval = $txt_allocatmater[$key];
                    $txt_Pridval = $txt_Prid[$key];
                    $txt_processtaval = $txt_processta[1];
                    $txt_Jobnoval = $txt_Jobno[$key];
                    $txt_codenoval = $txt_codeno[$key];
                    $txt_gnameval = $txt_gname[$key];
                    $dcnotionval = $dcnotion;
                    if (isset($txt_requestocc[$key])) {
                        $txt_requestoccval = '1';
                    } else {
                        $txt_requestoccval = '0';
                    }
                    $cstraw = "('" . $docidset . "','" . $txt_rawmaterialval . "','" . $txt_pcomponentnamevalll . "','" .$rformno . "','" . $txt_Detailsval . "','" . $txt_apprxval . "', '" . $txt_otherdetailval . "', '" . $txt_unitval . "', '" . $txt_requestoccval . "', '" . $txt_materialstaval . "', '" . $txt_qtyallval . "', '" . $txt_imrval . "', '" . $txt_olditemidval . "', '" . $txt_olditemidval . "', '" . $txt_oldmatrialval . "', '" . $txt_recordidval . "', '" . $txt_allcatididval . "', '" . $txt_allocatmaterval . "', '" . $txt_Pridval . "', '" . $txt_processtaval . "', '" . $txt_Jobnoval . "', '" . $txt_codenoval . "', '" . $txt_gnameval . "','" . $dcnotionval . "','".$hdn_RPlateNoval."'),";
                    $raw_value = $raw_value . $cstraw;
                }
                $raw_detail = substr_replace($raw_value, ";", -1);
                $raw_detail_insert = "insert into web_raw_save_detail(Docid,raw_material,Component,formno, Details, Approxqtyreq, Other_Detail,Unit, 
                 ReqtoReserved,Material_status,Qty_allocated,Select_for_IMR,Old_Itmeid,Itmeid, 
                 Old_Matieral,RecordId, AllocatedID,AllocatedRawMaterial,Prid,Process_Status,jobno,Code_No,Group_Name,DocNotion,PlateNo)values" . $raw_detail;
            } else {
                $raw_detail_insert = '';
            }


            /* Additional Mtrl detail Grid start */

            $am_AutoId_PK = $this->input->post("txt_am_AutoId_PK");
            $am_Component = $this->input->post("hdn_am_Component");
            $am_FormNo = $this->input->post("hdn_am_FormNo");
            $am_itemid = $this->input->post("txt_am_itemid");
            $am_Description = $this->input->post("txt_am_Description");
            $am_Qty = $this->input->post("txt_am_Qty");
            $am_QtyAfterWastage = $this->input->post("txt_am_QtyAfterWastage");
            $am_UpsInFullSheet = $this->input->post("txt_am_UpsInFullSheet");
            $am_ComponentSize = $this->input->post("txt_am_ComponentSize");
            $am_CutDeckle = $this->input->post("txt_am_CutDeckle");
            $am_CutLength = $this->input->post("txt_am_CutLength");
            $am_NoOfLeaves = $this->input->post("txt_am_NoOfLeaves");

            /* Additional Mtrl detail Grid end */


            /* Foreach loop for Additional Mtrl detail start */

            $addit_val = '';
            if (isset($am_Component)) {
                foreach ($am_Component as $key => $value) {
                    $Component = $value;
                    $FormNo = $am_FormNo[$key];
                    $itemid = $am_itemid[$key];
                    $Description = $am_Description[$key];
                    $Qty = $am_Qty[$key];
                    $QtyAfterWastage = $am_QtyAfterWastage[$key];
                    $UpsInFullSheet = $am_UpsInFullSheet[$key];
                    $ComponentSize = $am_ComponentSize[$key];
                    $CutDeckle = $am_CutDeckle[$key];
                    $CutLength = $am_CutLength[$key];
                    $NoOfLeaves = $am_NoOfLeaves[$key];
                    // $AutoId_PK = $am_AutoId_PK[$key];

                    $dcnotionval = $dcnotion;
                    
                    $cstringother = "('" . $docidset . "','" . $Component . "', '" . $FormNo . "',  '" . $Qty . "',
                        '" . $QtyAfterWastage . "', '" . $UpsInFullSheet . "','" . $ComponentSize . "','" . $CutDeckle . "','" . $CutLength . "',
                        '" . $NoOfLeaves . "','" . $Description . "','" . $itemid . "','" . $dcnotionval . "'),";

                    $addit_val = $addit_val . $cstringother;
                }

                $additmtrldetail = substr_replace($addit_val, ";", -1);

                $additmtrlquery = "INSERT INTO Web_Addational_Material_Save(DocID,Component,FormNo,Qty,QtyAfterWastage,UpsInFullSheet,
                    ComponentSize,CutDeckle,CutLength,NoOfLeaves,Description,itemid,DocNotion)values" . $additmtrldetail;
            } else {
                $additmtrlquery = '';
            }
            //echo $additmtrlquery;die;
            /* Foreach loop for Additional Mtrl detail end */
            


            $manualjc = 0;
            $this->load->model('Production/Mod_jobcard_comm');
            //echo $raw_detail_insert;
           // die();
            $Main_temp = $this->Mod_jobcard_comm->Savedataval($jobcard_master, $jobcadrmaster_d, $additmtrlquery, $processdetail, $inkquery, 
                $raw_detail_insert, $otherquery, $jobnew, $jobnofirst, $Docid, $ICompanyId, $docidset, $manualjc, $dcnotion);
            //print_r($Main_temp);
            //die;

            $ErrorMessege1 = $Main_temp[0]->abc;
            if ($ErrorMessege1 == 'Record  saved.') {

                $chk_email = $this->input->post('chk_email');
                if ($chk_email == 'on') {
                    $this->email(0);
                }

                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";

                $gly = "<span class='fa fa-check-circle'></span>";
                $this->session->set_flashdata("success_msg", $gly . " Jobcard updated successfully ..!");
                redirect('Production/Jobsearch');

            } else {
                $ErrorMessege = $Main_temp[0]->def;
                $ErrorMessege2 = $Main_temp[0]->docnotion;
                $jobcardno = $ErrorMessege;
                $jobtype = 'Old';
                $data['data'] = $this->Mod_jobcard_comm->pageloadOld($jobcardno, $jobtype);
                $data['Neworold'] = 'Old';
                $data['docid'] = $jobcardno;
                $data['docnotionval'] = $ErrorMessege2;

                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";
                  
                  $gly = "<span class='fa fa-exclamation-circle'></span>";
                $this->session->set_flashdata("error_msg", $gly . " Error occured while updation - ". $ErrorMessege1);
                redirect('Production/Jobsearch');

                // $this->load->view('Veiw_jobcard?ICompanyID=' . $ICompanyId . '&userid=' . $AUID . '', $data);
            }
        }
    }

    function time_to_sec() {
        $make_ready_time = $this->input->post('make_ready_time');
        $process_time = $this->input->post('process_time');

        $query1 = $this->db->query("select time_to_sec('$make_ready_time') as mk_time");
        $result1 = $query1->result();
        $mk_time = $result1[0]->mk_time;

        $query2 = $this->db->query("select time_to_sec('$process_time') as process_time");
        $result2 = $query2->result();
        $procos_time = $result2[0]->process_time;

        $total = $mk_time + $procos_time;
        $query3 = $this->db->query("select sec_to_time('$total') as total_time");
        $result3 = $query3->result();
        $total_time = $result3[0]->total_time;

        $array = array();
        $array['mk_sec'] = $mk_time;
        $array['mk_time'] = $make_ready_time;
        $array['process_sec'] = $procos_time;
        $array['p_time'] = $process_time;
        $array['total_sec'] = $total;
        $array['total_time'] = $total_time;
        echo json_encode($array);
    }

    function manualjc_processdrp() {
        $this->load->model('Production/Mod_jobcard_comm');
        $result = $this->Mod_jobcard_comm->get_query("SELECT PrID, PrName, BasePrUniqueID from item_processname where IsActive = 1 order by 2;");

        echo json_encode($result);
        
    }


}
