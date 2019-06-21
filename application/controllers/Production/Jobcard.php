<?php

class Jobcard extends MY_Controller {

    public function index() {
        $jobtype = $this->input->post('hdn_jobnew');

        $jobcardno = $this->input->post('hdn_jobcard');
        $icompanyid = $this->input->post('txt_icompanyid');
        $txt_uid = $this->input->post('txt_uid');
        $CP = $this->input->post('hidden_cp');
//          echo $CP;
//          die();
        // die();
        $this->load->model('Production/Mod_jobcard');
        if ($jobtype == 'New') {
            $data['data'] = $this->Mod_jobcard->pageloaddata($jobcardno, $CP);
            $data['Neworold'] = $jobtype;
            $data['docnotionval'] = $this->input->post('docnotionval');
            $data['Icompanyid'] = $icompanyid;
            $data['Uid'] = $txt_uid;
            $data['docid'] = '';
        } else {
            $data['data'] = $this->Mod_jobcard->pageloadOld($jobcardno, $jobtype);
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
        
        $data["title"] = "Jobcard";
        $data['template'] = 'production/View_jobcard_view';
        $this->load->view('templates/template', $data);
    }

    public function index1($data) {
        $this->load->view('Veiw_jobcard', $data);
        // redirect('Jobcard',$data);  
    }

    public function showpop() {
        $JCItemID = $this->input->post('JCItemID');
        $this->load->model('Production/Mod_jobcard');
        $Main_temp = $this->Mod_jobcard->showpopval($JCItemID);
        echo $Main_temp;
    }


    public function inkshowlist(){
        $this->load->model('Production/Mod_jobcard');
        $data = $this->Mod_jobcard->inkdetail();
        echo json_encode($data);
        // echo $data;
    }    

    public function boardata(){
        $this->load->model('Production/Mod_jobcard');
        $data = $this->Mod_jobcard->show_board();
        echo json_encode($data);
        // echo $data;
    }

    public function otpdata(){
        $this->load->model('Production/Mod_jobcard');
        $txt_docid = $this->input->post('txt_docid');
        $data = $this->Mod_jobcard->otpissue($txt_docid);
        echo json_encode($data);
        // echo $data;
    }
        /* Mail function Start */

    public function otpmail() {
        $this->load->model('Production/Mod_jobcard');
        $txt_docid = $this->input->post('txt_docid');
        $hdn_otp = $this->input->post('hdn_otp');
        $hdn_reason = $this->input->post('hdn_reason');
        // print_r($hdn_otp);die;
        $query_mail = $this->db->query("SELECT * FROM otp_mail WHERE ID=1");
        if ($query_mail->num_rows() > 0) {
            $result_full = $query_mail->result();
            $result = $result_full[0];

            $html = "";
            $html .= "<span style='font-size:11.0pt;font-family:&quot;Calibri&quot;,sans-serif;'>Your One-Time Password(OTP) for secure transaction is ".$hdn_otp."</span>";
            $html .= "<br>";
            $html .= "<span style='font-size:11.0pt;font-family:&quot;Calibri&quot;,sans-serif;'>Request you to please enter this to complete transaction.</span>";
            $html .= "<br>";
            $html .= "<span style='font-size:12.0pt;font-family:&quot;Calibri&quot;,sans-serif;background-color:yellow;'><i>Reason : ".$hdn_reason."</i></span>";
            $html .= "<br><br>";
            $html .= "<span style='font-size:14.0pt;font-family:&quot;Calibri&quot;,sans-serif;color:grey;'><q>MK PRINTPACK PVT LTD</q></span>";

        require_once(APPPATH.'libraries/phpmail/class.phpmailer.php');
        require_once(APPPATH.'libraries/phpmail/class.smtp.php'); 


        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        //$mail->SMTPSecure = "tls";
        $mail->Host = "ssl://smtp.googlemail.com";
        $mail->Port = 465;
        $mail->Username = $result->mailid;
        $mail->Password = $result->mailpass;
        $mail->From = $result->mailid;
        $mail->FromName = "MK-Daman";
        $mail->SMTPDebug = 2;
        $mail->AddAddress($result->mailreceiver, "");
        $mail->Subject = 'MK PRINTPACK PVT LTD FOR JOBCARD OTP - ('.$txt_docid.')';
        $mail->Body = $html;
        // $mail->AddCC("",""); 
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Body = $html;
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        // $mail->Send();
        if ($mail->send()) {
            echo "Send mail";
        }else{
            echo "Not Send mail";
        }

            // echo $data;
        }
    }

    public function bidngriddata() {
        $itemid = $this->input->post('itemid');
        $docid = $this->input->post('docid');
        $jobneworold = $this->input->post('jobneworold');
        $dcnotion = $this->input->post('dcnotionval');
        $icompanyid = $this->input->post('icompanyid');
        $jobnodelivery = $this->input->post('jobnodelivery');
        $estimateid = $this->input->post('estimateid');

        $this->load->model('Production/Mod_jobcard');
        if ($jobneworold != 'Old') {
            $Maindata = $this->Mod_jobcard->populategrid($itemid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid);
        } else {
            $Maindata = $this->Mod_jobcard->populategriOld($docid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid);
        }
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function machine() {
        $prid = $this->input->post('prid');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->popmachien($prid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function materaildetail1() {
        $materailid = $this->input->post('materailid');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->materailid1($materailid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function materaildetail2() {
        $materailid = $this->input->post('materailid');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->materailid2($materailid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function showwo() {
        $this->load->model('Production/Mod_jobcard');
        $txt_jobno = $this->input->post('txt_jobno');
        $txt_ProductName = $this->input->post('txt_ProductName');
        $txt_miscode = $this->input->post('txt_miscode');
        $userid = $this->user_id;
        $icompanyid = $this->company_id;
        
        $first = "2017-01-01";
        $last = date("Y-m-d");

        $filter =''; 
        if($txt_jobno!='') {     
            $filter .= " JobNo like '%".$txt_jobno."%' "; 
        }
        if($txt_ProductName!='') {     
            $filter .= " ProductName like '%".$txt_ProductName."%' "; 
        }
        if($txt_miscode!='') {     
            $filter .= " MiSCodeNo like '%".$txt_miscode."%' "; 
        }
        
        $result = $this->Mod_jobcard->showwoval($icompanyid, $first, $last, $filter);
        echo json_encode($result);
    }

    public function jobcardval() {
        $jobcard = $this->input->post('jobval');
        $CP = $this->input->post('CP');
        $jobcardval = trim($jobcard);
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->pageloaddata($jobcardval, $CP);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function info1() {
        $hdn_baseprid = $this->input->post('hdn_baseprid');
        $hdn_itemid = $this->input->post('hdn_itemid');

        $hdn_basepridval = trim($hdn_baseprid);

        $this->load->model('Production/Mod_jobcard');
        if ($hdn_basepridval == 'PN') {
            $Maindata = $this->Mod_jobcard->info1valPN($hdn_itemid);
        } else {
            $Maindata = $this->Mod_jobcard->info1val($hdn_basepridval);
        }
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function info2() {
        $hdn_baseprid = $this->input->post('hdn_baseprid');
        $hdn_basepridval = trim($hdn_baseprid);
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->info2val($hdn_basepridval);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function jobcomplexity() {
        $hdn_baseprid = $this->input->post('hdn_baseprid');
        $hdn_basepridval = trim($hdn_baseprid);
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->jobcomplex($hdn_basepridval);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function processaddnew() {
        $strdata1 = $this->input->post('strdata1');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->processaddnewval($strdata1);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function corrugationdetail() {
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->corrugationval();
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function genertatecode() {
        $icomapyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->generatecodedata($icomapyid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function genertatecodeupdate() {
        $oldno = $this->input->post('oldno');
        $newno = $this->input->post('newno');
        $icomapyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard');
        $this->Mod_jobcard->generateupdatetbl($oldno, $newno, $icomapyid);
    }

    public function estimationdetail() {
        $esitid = $this->input->post('estidval');
        $icomapyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->estimationdata($esitid, $icompanyid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function gangJobitem() {
        $icompanyid = $this->input->post('icompanyid');
        $this->load->model('Production/Mod_jobcard');
        $Maindata = $this->Mod_jobcard->gangjobitmlist($icompanyid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function wastageinfo() {
        $itemid = $this->input->post("itemid");
        $this->load->model("Production/Mod_jobcard");
        $Maindata = $this->Mod_jobcard->wastageinfo($itemid);
        $jobjson1 = json_encode($Maindata);
        echo $jobjson1;
    }

    public function MainBoardCalculate(){
       
       $wastageper = $this->input->post('wastageper');
       $WastageSheets = $this->input->post('WastageSheets');
       $JobnoArray = $this->input->post('JobnoArray');
       $OrderqtyArray = $this->input->post('OrderqtyArray');
       $JobQtyArray = $this->input->post('JobQtyArray');
       $UpsmainArray = $this->input->post('UpsmainArray');
       $FinalQtyArray = $this->input->post('FinalQtyArray');

       $DimArray = $this->input->post('DimArray');
       $boardidArray = $this->input->post('boardidArray');
       $gsmArray = $this->input->post('gsmArray');
       $dackleArray = $this->input->post('dackleArray');
       $grainArray = $this->input->post('grainArray');
       $upsArray = $this->input->post('upsArray');
       $shreqArray = $this->input->post('shreqArray');
       $totalshArray = $this->input->post('totalshArray');
       $kgqtyArray = $this->input->post('kgqtyArray');
       $packetsArray = $this->input->post('packetsArray');

       $sizeJobno = count($JobnoArray);
       $data_value_job = '';
       $cstringJob = '';
        for ($i = 0; $i < $sizeJobno; $i++) {
            $JobnoArray_val = $JobnoArray[$i];
            $OrderqtyArray_val = $OrderqtyArray[$i];
            $JobQtyArray_val = $JobQtyArray[$i];
            $UpsmainArray_val = $UpsmainArray[$i];
            $FinalQtyArray_val = $FinalQtyArray[$i];

            if ($UpsmainArray_val == '') {
                $UpsmainArray_val = 0;
            }            
            if ($JobQtyArray_val == '') {
                $JobQtyArray_val = 0;
            }
            if ($FinalQtyArray_val == '') {
                $FinalQtyArray_val = 0;
            }

            if ($JobnoArray_val != '') {
                $cstringJob = "('".$JobnoArray_val."','".$OrderqtyArray_val."','" . $UpsmainArray_val . "' ,'" . $JobQtyArray_val . "','" . $FinalQtyArray_val . "'),";
                $data_value_job = $data_value_job . $cstringJob;
            }
            
        }

        if ($data_value_job != '') {
            $UrlContentJob = substr_replace($data_value_job, ";", -1);
            $Job = "insert into JobDetails_temp (JobNo, OrdQty, GangUps, JobQty, JobQtyWithWastage)values" . $UrlContentJob;
        } else {
            $Job = '';
        }

       $sizeDim = count($DimArray);
       $data_value_board = '';
       $cstringboard = '';
        for ($i = 0; $i < $sizeDim; $i++) {
            $DimArray_val = $DimArray[$i];
            $boardidArray_val = $boardidArray[$i];
            $gsmArray_val = $gsmArray[$i];
            $dackleArray_val = $dackleArray[$i];
            $grainArray_val = $grainArray[$i];
            $upsArray_val = $upsArray[$i];
            $shreqArray_val = $shreqArray[$i];
            $totalshArray_val = $totalshArray[$i];
            $kgqtyArray_val = $kgqtyArray[$i];
            $packetsArray_val = $packetsArray[$i];

            if ($DimArray_val != 0) {
                $cstringboard = "('".$DimArray_val."','".$boardidArray_val."','" . $dackleArray_val . "' ,'" . $grainArray_val . "','" . $gsmArray_val . "'
                ,'" . $upsArray_val . "','" . $shreqArray_val . "','" . $totalshArray_val . "','" . $kgqtyArray_val . "','" . $packetsArray_val . "'),";
                $data_value_board = $data_value_board . $cstringboard;
            }
        }

        if ($data_value_board != '') {
            $UrlContentBoarddetail = substr_replace($data_value_board, ";", -1);
            $Board = "insert into FullBoardDetails_temp (DimNo, BoardID, Deckle, Grain, GSM, UpsInFullSheet,FullSheets,FullSheetsWithWastage,ReqKg,ReqPackets)values" . $UrlContentBoarddetail;
        } else {
            $Board = '';
        }


        $this->db->query('call WEB_JC_Board_Calculation("' . $Job . '","' . $Board . '","' . $wastageper . '","' . $WastageSheets . '")');
        $query['Boarddetail'] = $this->database->get_query('SELECT * from  FullBoardDetails_temp;');
        $query['Jobdetail'] = $this->database->get_query('SELECT * from  JobDetails_temp;');
        echo json_encode($query);

    }

    public function RMCcalculateval() {
        $pridArray = $this->input->post('pridArray');
        $inkid = $this->input->post('inkid');
        $processtypeArray = $this->input->post('processtypeArray');
        // print_r($processtypeArray);die;
        $raw1_itemidArray = $this->input->post('raw1_itemidArray');
        $raw_id2_ItemID = $this->input->post('raw_id2_ItemID');
        $info3_AddlInfo1 = $this->input->post('info3_AddlInfo1');
        $info9_AddlInfo1 = $this->input->post('info9_AddlInfo1');
        $wpinfo1_AddlInfo1 = $this->input->post('wpinfo1_AddlInfo1');
        $wpinfo2_AddlInfo1 = $this->input->post('wpinfo2_AddlInfo2');
        $int_Info1 = $this->input->post('wpint_Info1');
        $txt_ppfluteidCorrPly = $this->input->post('txt_ppfluteidCorrPly');
        $txt_ppitemidpCorrPly = $this->input->post('txt_ppitemidpCorrPly');
        // print_r($txt_ppfluteidCorrPly);die;
        // $txt_pdeclinefact=$this->input->post('txt_pdeclinefact');
        // $txt_pextracons = $this->input->post('txt_pextracons');
        $txt_ppgsm = $this->input->post('txt_ppgsm_val');
        $BBP_WastagePer = $this->input->post('txt_info1');
        $BBP_NoOfCuts = $this->input->post('txt_info2');

        /* Boar and cut both array */
        $mothrrowArray = $this->input->post('mothrrowArray');
        $dackleArray = $this->input->post('dackleArray');
        $grainArray = $this->input->post('grainArray');
        $totalshArray = $this->input->post('totalshArray');
        $upsArray = $this->input->post('upsArray');
        $kgqtyArray = $this->input->post('kgqtyArray');
        $packetsArray = $this->input->post('packetsArray');
        $mmvalArray = $this->input->post('mmvalArray');
        $boardid = $this->input->post('boardid');
        $mothrrowvalArray = $this->input->post('mothrrowvalArray');
        $breArraycut = $this->input->post('breArraycut');
        $lenArray = $this->input->post('lenArray');
        $wastageArray = $this->input->post('wastageArray');
        $upsArraycut = $this->input->post('upsArraycut');
        $mmvalcutArray = $this->input->post('mmvalcutArray');
        $groupidArray = $this->input->post('groupidArray');
        $txt_info2Array = $this->input->post('txt_info2Array');
        $hdn_itemidArray = $this->input->post('hdn_itemidArray');
        /* Board and cut end array */
        $data_value_ink = '';
        $data_value_FL = '';
        $data_value_FLid2 = '';
        $data_value_FLMat = '';
        $data_value_FLMatid2 = '';
        $data_value_FM = '';
        $data_value_FF = '';
        $data_value_WP = '';
        $data_value_FC = '';
        $data_value_BBP = '';
        $data_value_Pack = '';
        $data_value_other = '';
        $data_value_itemid = '';
        $inklen = count($inkid);
        $itemidArraylen = count($hdn_itemidArray);

        for ($i = 0; $i < $itemidArraylen; $i++) {
            $data_value_itemid = $hdn_itemidArray[$i];
        }        
        $inkstring = '';
        for ($i = 0; $i < $inklen; $i++) {
            $inkidval = $inkid[$i];
            $inkstring = "('Pr','00002','','" . $inkidval . "','','','',0,'',0,0,'',''),";
            $data_value_ink = $data_value_ink . $inkstring;
        }
        $sizeprid = count($pridArray);
        $cstring = '';
        $cstringFC = '';
        $cstringFL = '';
        $cstringFLm = '';
        $cstringFF = '';
        $cstringWP = '';
        $cstringBBP = '';
        $cstringOther = '';
        for ($i = 0; $i < $sizeprid; $i++) {
            $pridArray_val = $pridArray[$i];
            $processtypeArray_val = $processtypeArray[$i];
            $raw1_itemidArray_val = $raw1_itemidArray[$i];
            $raw_id2_ItemID_val = $raw_id2_ItemID[$i];
            $info3_AddlInfo1_val = $info3_AddlInfo1[$i];
            $info9_AddlInfo1_val = $info9_AddlInfo1[$i];
            $wpinfo1_AddlInfo1_val = $wpinfo1_AddlInfo1[$i];
            $wpinfo2_AddlInfo1_val = $wpinfo2_AddlInfo1[$i];
            $groupidArray_val = $groupidArray[$i];
            $txt_info2Array_val = $txt_info2Array[$i];
            if ($wpinfo2_AddlInfo1_val == '') {
                $wpinfo2_AddlInfo1_val = 0;
            }
            $int_Info1_val = $int_Info1[$i];
            if ($int_Info1_val == '') {
                $int_Info1_val = 0;
            }

            $BBP_WastagePer_Val = $BBP_WastagePer[$i];
            $BBP_NoOfCuts_Val = $BBP_NoOfCuts[$i];

            if ($BBP_WastagePer_Val == '') {
                $BBP_WastagePer_Val = 0;
            }

            if ($BBP_NoOfCuts_Val == '') {
                $BBP_NoOfCuts_Val = 0;
            }

            if ($pridArray_val == 'BBP') {
                $cstringBBP = "('BBP','00001','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'',0,0,'',''),";
                $data_value_BBP = $data_value_BBP . $cstringBBP;
            }
            if ($pridArray_val == 'Pack') {
                $cstringPack = "('Pack','00001','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'',".$int_Info1_val.",0,'',''),";
                $data_value_Pack = $data_value_Pack . $cstringPack;
            }
            if ($pridArray_val == 'FC') {
                $cstringFC = "('FC','00035','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'',0,0,'',''),";
                $data_value_FC = $data_value_FC . $cstringFC;
            }
            if ($pridArray_val == 'FL' && $info9_AddlInfo1_val == 0) {
                $cstringFL = "('FL','00006','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'',0,0,'',''),";
                $data_value_FL = $data_value_FL . $cstringFL;
            }
            if ($pridArray_val == 'FL' && $info9_AddlInfo1_val == 0) {
                $cstringFLid2 = "('FL','00006','" . $processtypeArray_val . "' ,'" . $raw_id2_ItemID_val . "','','','',0,'',0,0,'',''),";
                $data_value_FLid2 = $data_value_FLid2 . $cstringFLid2;
            }
            if ($pridArray_val == 'FL' && $info9_AddlInfo1_val == 1) {
                $cstringFLm = "('FL','00006','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'',0,1,'',''),";
                $data_value_FLMat = $data_value_FLMat . $cstringFLm;
            }
            if ($pridArray_val == 'FL' && $info9_AddlInfo1_val == 1) {
                $cstringFLmid2 = "('FL','00006','" . $processtypeArray_val . "' ,'" . $raw_id2_ItemID_val . "','','','',0,'',0,1,'',''),";
                $data_value_FLMatid2 = $data_value_FLMatid2 . $cstringFLmid2;
            }
            if ($pridArray_val == 'FF') {
                $cstringFF = "('FF','00007','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','0','','',0,'',0,0,'',''),";
                $data_value_FF = $data_value_FF . $cstringFF;
            }
            if ($pridArray_val == 'WP') {
                $cstringWP = "('WP','00051','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'','" . $BBP_WastagePer_Val . "','" . $BBP_NoOfCuts_Val . "','',''),";
                $data_value_WP = $data_value_WP . $cstringWP;
            }
            if ($txt_info2Array_val == 'Addl_Process') {
                $cstringOther = "('".$pridArray_val."','".$groupidArray_val."','" . $processtypeArray_val . "' ,'" . $raw1_itemidArray_val . "','','','',0,'',0,0,'',''),";
                $data_value_other = $data_value_other . $cstringOther;
            }
        }


        $txt_ppfluteidCorrPly1 = count($txt_ppfluteidCorrPly);
        $Plycstring = '';
        // echo $txt_ppfluteidCorrPly1;die;
        if ($txt_ppfluteidCorrPly1 > 0) {
            for ($i = 0; $i < $txt_ppfluteidCorrPly1; $i++) {
                $txt_ppfluteidCorrPly_val = $txt_ppfluteidCorrPly[$i];
                $txt_ppitemidpCorrPly_val = $txt_ppitemidpCorrPly[$i];

                $wpinfo1_AddlInfo1_val = $wpinfo1_AddlInfo1[$i];
                $wpinfo2_AddlInfo1_val = $wpinfo2_AddlInfo1[$i];
                $pridArray_val = 'FM';
                $processtypeArray_val = $processtypeArray[$i];
                // $txt_pdeclinefact_val = $txt_pdeclinefact[$i];
                // $txt_pextracons_val = $txt_pextracons[$i];
                $txt_ppgsm_val = $txt_ppgsm[$i];

                if ($pridArray_val == 'FM') {
                    $Plycstring = "('FM','00102','" . $txt_ppfluteidCorrPly_val . "' ,'" . $txt_ppitemidpCorrPly_val . "' 
,'','" . $txt_ppgsm_val . "','',0,'',0,0,'',''),";
                    $data_value_FM = $data_value_FM . $Plycstring;
                }
            }
        }
        if ($data_value_ink != '') {
            $UrlContent = substr_replace($data_value_ink, ";", -1);
            $inkprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit, AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContent;
        } else {
            $inkprocess = '';
        }
        if ($data_value_Pack != '') {
            $UrlContentPack = substr_replace($data_value_Pack, ";", -1);
            $Packprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentPack;
        } else {
            $Packprocess = '';
        }

        if ($data_value_FL != '') {
            $UrlContentFL = substr_replace($data_value_FL, ";", -1);
            $FLprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFL;
        } else {
            $FLprocess = '';
        }
        if ($data_value_FLid2 != '') {
            $UrlContentFLid2 = substr_replace($data_value_FLid2, ";", -1);
            $FLprocessid2 = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFL;
        } else {
            $FLprocessid2 = '';
        }
        if ($data_value_FLMat != '') {
            $UrlContentFLMat = substr_replace($data_value_FLMat, ";", -1);
            $FlMatprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit, AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFLMat;
        } else {
            $FlMatprocess = '';
        }
        if ($data_value_FLMatid2 != '') {
            $UrlContentFLMatid2 = substr_replace($data_value_FLMatid2, ";", -1);
            $FlMatprocessid2 = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit, AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFLMatid2;
        } else {
            $FlMatprocessid2 = '';
        }
        if ($data_value_FM != '') {
            $UrlContentFM = substr_replace($data_value_FM, ";", -1);
            $FMprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit, AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFM;
        } else {
            $FMprocess = '';
        }
        if ($data_value_FF != '') {
            $UrlContentFF = substr_replace($data_value_FF, ";", -1);
            $FFprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFF;
        } else {
            $FFprocess = '';
        }
        if ($data_value_WP != '') {
            $UrlContentWP = substr_replace($data_value_WP, ";", -1);
            $wpprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID,Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,
 AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentWP;
        } else {
            $wpprocess = '';
        }
        if ($data_value_FC != '') {
            $UrlContentFC = substr_replace($data_value_FC, ";", -1);
            $FCprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID,Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,
 AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentFC;
        } else {
            $FCprocess = '';
        }

        if ($data_value_BBP != '') {
            $UrlContentBBP = substr_replace($data_value_BBP, ";", -1);
            $BBPprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentBBP;
        } else {
            $BBPprocess = '';
        }
        if ($data_value_other != '') {
            $UrlContentOther = substr_replace($data_value_other, ";", -1);
            $Otherprocess = "insert into RMC_MaterialDetails_temp (PrID, GroupID, ProcessTypeID, ItemID, Item_DIM_Len, Item_DIM_Bre, ItemID_DIM_Thick, ReqQty, ReqUnit,AddlInfo1, AddlInfo2, CharInfo1, CharInfo2)values" . $UrlContentOther;
        } else {
            $Otherprocess = '';
        }

        $boardsize = count($mothrrowArray);
        $boardstringf = '';
        $boardstring = '';
        for ($j = 0; $j < $boardsize; $j++) {
            $mothrrowArray_val = $mothrrowArray[$j];
            $dackleArray_val = $dackleArray[$j];
            $grainArray_val = $grainArray[$j];
            $totalshArray_val = $totalshArray[$j];
            $upsArray_val = $upsArray[$j];
            $kgqtyArray_val = $kgqtyArray[$j];
            $packetsArray_val = $packetsArray[$j];
            $mmvalArray_val = $mmvalArray[$j];
            $boardid_val = $boardid[$j];
            if ($packetsArray_val == '') {
                $packetsArray_val = 0;
            }
            $boardstring = "('" . $mothrrowArray_val . "','" . $dackleArray_val . "','" . $grainArray_val . "','0','0','" . $totalshArray_val . "','" . $upsArray_val . "','" . $kgqtyArray_val . "','" . $packetsArray_val . "','F','" . $mmvalArray_val . "','" . $boardid_val . "'),";
            $boardstringf = $boardstringf . $boardstring;
        }

        $cutsize = count($mothrrowvalArray);

        $cutsizestring = '';
        $cutstringf = '';

        for ($j = 0; $j < $cutsize; $j++) {
            $mothrrowvalArray_val = $mothrrowvalArray[$j];
            $breArraycut_val = $breArraycut[$j];
            $lenArray_val = $lenArray[$j];
            $wastageArray_val = $wastageArray[$j];
            $upsArraycut_val = $upsArraycut[$j];
            $mmvalcutArray_val = $mmvalcutArray[$j];
            $cutsizestring = "('" . $mothrrowvalArray_val . "','" . $breArraycut_val . "','" . $lenArray_val . "','" . $wastageArray_val . "','" . $upsArraycut_val . "','0' ,'0','0','0','C','" . $mmvalcutArray_val . "'),";
            $cutstringf = $cutstringf . $cutsizestring;
        }

        $UrlContentboard = substr_replace($boardstringf, ";", -1);
        $UrlContentCut = substr_replace($cutstringf, ";", -1);

        if ($UrlContentboard != '') {
            $boardtable = "insert into RMC_BoardDetails_temp(DimNo,Deckle,grain,Cutsheets,UpsInCutSheet,FullSheets,UpsInFullSheet,Reqkg,ReqPackets,CutFull,BoardDivFact,BoardID)values" . $UrlContentboard;
        }if ($UrlContentCut != '') {
            $cuttable = "insert into RMC_BoardDetails_temp(DimNo,Deckle,grain,Cutsheets,UpsInCutSheet,FullSheets,UpsInFullSheet,Reqkg,ReqPackets,CutFull,BoardDivFact)values" . $UrlContentCut;
        }

        // echo 'call WEB_JC_RMC_Temp_Table("' . $boardtable . '","' . $BBPprocess . '","' . $cuttable . '","' . $inkprocess . '","' . $FCprocess . '","' . $FLprocess . '","' . $FlMatprocess . '","' . $FMprocess . '","' . $FFprocess . '","' . $wpprocess . '")';
        // die();
        // $this->db->trans_start();
        $CFC = "";
        // $query = $this->db->query('call WEB_JC_RMC_Temp_Table("' . $boardtable . '","' . $BBPprocess . '","' . $cuttable . '","' . $inkprocess . '","' . $FCprocess . '","' . $FLprocess . '","' . $FlMatprocess . '","' . $FMprocess . '","' . $FFprocess . '","' . $wpprocess . '")');
         $query = $this->db->query('call WEB_JC_RMC_Temp_Table("' . $boardtable . '","' . $BBPprocess . '","' . $cuttable . '","' . $inkprocess . '","' . $FCprocess . '","' . $FLprocess . '","' . $FlMatprocess . '","' . $FMprocess . '","' . $FFprocess . '","' . $wpprocess . '","' . $FlMatprocessid2 . '","' . $Packprocess . '","' . $Otherprocess . '","' . $data_value_itemid . '")');
        //  $this->db->trans_complete();
        if ($query->num_rows() > 0) {
            $rmc_temptable = $query->result();
            $jobjson1 = json_encode($rmc_temptable);
            echo $jobjson1;
        } else {
            return false;
        }
    }

    /* Mail function Start */

    public function email($edit_flag) {
        $this->load->library('mailerClass/SmtpMailer');
        $this->load->model('Production/Mod_jobcard');
        $query_mail = $this->db->query("SELECT * FROM quotemail WHERE ID=6 AND isactive=1");
        // if ($query_mail->num_rows() > 0) {
        //     $result_full = $query_mail->result();
        //     $result = $result_full[0];

        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        //$config['smtp_user'] = $result->SenderEmailId; // Your gmail id
        //$config['smtp_pass'] = $result->SenderEmailPwd; // Your gmail Password
        $config['smtp_user'] = 'shoaib@renukasoftec.com'; // Your gmail id
        $config['smtp_pass'] = 'shoaib1314'; // Your gmail Password
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

        // $this->email->from($result->SenderEmailId, 'Rich Offset Bhillad');
        // $this->email->to($result->ReciverEmailIDs);
        $this->email->from('shoaib@renukasoftec.com', 'Rich Offset Bhillad');
        $this->email->to('tapan@renukasoftec.com');
        // $this->email->cc($result->ReciverEmailIDs);

        $product_array = $this->input->post('hdn_productName');
        $product_code_array = $this->input->post('hdn_productCode');
        $party_array = $this->input->post('hdn_clientName');
        $qty_array = $this->input->post('txt_fqty');
        $company_name = 'Rich Offset Bhillad';
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
        // }
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

            $hdn_gangrecidestid = $this->input->post('hdn_gangrecidestid');

            $dcnotion = $this->input->post('hdn_dcnotionval');
            if ($dcnotion == '') {
                $dcnotion = 17;
            }
            $txt_docdateval = $this->input->post('txt_docdateval');


            $txt_closedatejoba = $this->input->post('txt_closedateval');


            if ($txt_closedatejoba == '') {
                $txt_closedatejob = '2060-01-01';
            } else {
                $txt_closedatejob = $txt_closedatejoba;
            }
            date_default_timezone_set('Asia/Calcutta');
            $ADateTime = date('Y/m/d H:i:s ', time());
            /* Array  Job Item */
            $clientid = $this->input->post('hdn_clientid');
            $ICompanyId = $this->input->post('hdn_icompid');
            $ICompanyId = $this->company_id;
            if ($ICompanyId == '') {
                $ICompanyId = '00001';
            }
            $AUID = $this->input->post('hdn_uid');

            $AUID = $this->user_id;

            $woid = $this->input->post('hdn_woid');
            $itemid = $this->input->post('hdn_itemid');

            // print_r($woid);
            // die();
            $txt_orderqty = $this->input->post('txt_orderqty');
            $txt_jobqty = $this->input->post('txt_orderqty');
            $drp_oldnew = $this->input->post('drp_oldnew');
            $jobno = $this->input->post('hdn_jobnno');
            $txt_printqty = $this->input->post('txt_printqty');
            $txt_fqty = $this->input->post('txt_fqty');
            $txt_specification = $this->input->post('txt_specification');
            $txt_TotQtyProduced = $this->input->post('txt_TotQtyProduced');
            $txt_TotQtyDispatched = $this->input->post('txt_TotQtyDispatched');

            $txt_jreamrks = $this->input->post('txt_jreamrks');
            $txt_woreamrks = $this->input->post('txt_woreamrks');
            $txt_stmreamrks = $this->input->post('txt_stmreamrks');
            $txt_fgstock = $this->input->post('txt_fgstock');
            $drp_shotqty = $this->input->post('drp_shotqty');
            $txt_shortqtyreason = $this->input->post('txt_shortqtyreason');
            if ($txt_fgstock == '') {
                $txt_fgstock = 0;
            }

            /* First table close */

            /* Select Jobkind second table single */
            $drp_repeatjob = $this->input->post('drp_repeatjob');
            $drp_oldnew = $this->input->post('drp_oldnew');
            $drp_noyes = $this->input->post('drp_noyes');
            // $drp_location = $this->input->post('drp_location');
            
            $txt_wsagreamrksper = $this->input->post('txt_wsagreamrksper');
            $txt_wassheet = $this->input->post('txt_wassheet');

            $txt_upsvalmain = $this->input->post('txt_upsvalmain');
            /* End Jobkind second table single */

            /* Hold grid Start */
            $chk_hold = $this->input->post('chk_hold');
            $txt_hreas = $this->input->post('txt_hreas');
            $chk_cancle = $this->input->post('chk_cancle');
            $txt_canreas = $this->input->post('txt_canreas');
            $chk_close = $this->input->post('chk_close');
            $txt_closereas = $this->input->post('txt_closereas');
            $txt_closedate = $this->input->post('txt_closedate');
            $hdn_gangitemid = $this->input->post('hdn_gangitemid');

            $chk_holdval = 0;
            if (isset($chk_hold)) {
                $chk_holdval = 1;
            }

            $chk_cancleval = 0;
            if (isset($chk_cancle)) {
                $chk_cancleval = 1;
            }
            $chk_closeval = 0;
            if (isset($chk_close)) {
                $chk_closeval = 1;
            }

            /* Hold grid End */

            /* Array Board detail start */
            $hdn_borddescrip = $this->input->post('hdn_borddescrip');
            $hdn_mothrrow = $this->input->post('hdn_mothrrow');
            // $hdn_itemid = $this->input->post('hdn_itemid');
            $hdn_mmval = $this->input->post('hdn_mmval');
            $hdn_mil = $this->input->post('hdn_mil');
            $hdn_kind = $this->input->post('hdn_kind');
            $hdn_gsm = $this->input->post('hdn_gsm');
            $hdn_dackle = $this->input->post('hdn_dackle');
            $hdn_grain = $this->input->post('txt_grainnn');
            $hdn_graindis = $this->input->post('hdn_graindis');
            $hdn_ups = $this->input->post('hdn_ups');
            $hdn_shreq = $this->input->post('hdn_shreq');
            $hdn_wastage = $this->input->post('hdn_wastage');
            $hdn_totalsh = $this->input->post('hdn_totalsh');
            $hdn_kgqty = $this->input->post('hdn_kgqty');
            $hdn_packets = $this->input->post('hdn_packets');
            $hdn_paperid = $this->input->post('hdn_paperid');
            $txt_hdn_board = $this->input->post('txt_hdn_board');
            $txt_remarks_board = $this->input->post('txt_remarks_board');

            $txt_wastageper = $this->input->post('txt_wastageper');
            $txt_fullshbefore = $this->input->post('txt_fullshbefore');
            $txt_wastagesjeets = $this->input->post('txt_wastagesjeets');

            /* Array Board detail End */

            /* Process detail grid Start array */
            $hdn_autoid = $this->input->post('hdn_autoid');  // auto id in hidden field
            $hdn_var_id_info1 = $this->input->post('hdn_var_id_info1');
            $hdn_var_id_info2 = $this->input->post('hdn_var_id_info2');
            $hdn_var_id_info3 = $this->input->post('hdn_var_id_info3');
            $hdn_var_id_info4 = $this->input->post('hdn_var_id_info4');
            $hdn_baseprid = $this->input->post('hdn_baseprid');
            $hdn_machienid = $this->input->post('hdn_machienid');
            $drp_fb = $this->input->post('drp_fb');
            $txt_info1 = $this->input->post('txt_info1');
            $txt_info2 = $this->input->post('txt_info2');
            $hdn_info3 = $this->input->post('hdn_info3');
            $drp_inhose = $this->input->post('drp_inhose');
            $drp_pass = $this->input->post('drp_pass');
            $txt_remark = $this->input->post('txt_remark');
            $txt_raw1 = $this->input->post('txt_raw1');
            $txt_raw2 = $this->input->post('txt_raw2');
            $hdn_machinenameval = $this->input->post('hdn_machinenameval');

            $hdn_cutboarddim = $this->input->post('hdn_cutboarddim');
            $hdn_fullboardno = $this->input->post('hdn_fullboardno');
            $hdn_cutdimno = $this->input->post('hdn_cutdimno');
            $hdn_prqty = $this->input->post('hdn_prqty');
            $hdn_PlanUniqueID = $this->input->post('hdn_PlanUniqueID');
            $hdn_dob_info1 = $this->input->post('hdn_dob_info1');
            $hdn_dob_info2 = $this->input->post('hdn_dob_info2');
            $hdn_dob_info3 = $this->input->post('hdn_dob_info3');
            $hdn_dob_info4 = $this->input->post('hdn_dob_info4');



            $txt_mmtime = $this->input->post('hdn_mmtimeval');
            $txt_protime = $this->input->post('hdn_pptimeval');
            $txt_tottimeqty = $this->input->post('hdn_tottimeval');
            // print_r($txt_mmtime);
            // die();

            /* Process detail grid End array */
            /* Ink detail grid Start array */
            $hdn_inkid = $this->input->post('hdn_inkid');
            $txt_inkdescri = $this->input->post('txt_inkdescri');
            $txt_color = $this->input->post('txt_color');
            $txt_shno = $this->input->post('txt_shno');
            $txt_unitink = $this->input->post('txt_unitink');
            $txt_quality = $this->input->post('txt_quality');
            $txt_miscode = $this->input->post('txt_miscode');
            /* Chk box */
            $chk_front = $this->input->post('chk_front');
            $chk_back = $this->input->post('chk_back');
            /* Ink detail grid End array */

            /* Lot detail grid Start array */
            $hdn_srno = $this->input->post('hdn_srno');
            $hdn_lotdescri = $this->input->post('hdn_lotdescri');
            $txt_lotno = $this->input->post('txt_lotno');
            $txt_mfgdate = $this->input->post('txt_mfgdate');
            $Mrplot = $this->input->post('txt_expdate');
            $txt_qtylot = $this->input->post('txt_qtylot');
            $txt_cutsheetlot = $this->input->post('txt_cutsheetlot');
            $txt_upslot = $this->input->post('txt_upslot');
            /* Lot detail grid Start array */

            /* Array cut detail start */
            $hdn_mmvalcut = $this->input->post('hdn_mmvalcut');
            $hdn_mothrrowval = $this->input->post('hdn_mothrrowval');
            $txt_optimizer = $this->input->post('txt_optimizer');
            $txt_bre = $this->input->post('txt_bre');
            $txt_len = $this->input->post('txt_len');
            $txt_n = $this->input->post('txt_n');
            $txt_ups = $this->input->post('txt_ups');
            $txt_cutsh = $this->input->post('txt_cutsh');
            $txt_wastage = $this->input->post('txt_wastage');
            $txt_graindis = $this->input->post('txt_graindis');

            $txt_c_wastageper = $this->input->post('txt_c_wastageper');
            $txt_c_wastagesh = $this->input->post('txt_c_wastagesh');
            $txt_c_shbeforews = $this->input->post('txt_c_shbeforews');
            /* Array cut detail End */

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
            /* Raw  material detail End */

            /* Corrugation string start */
            $corrpid = $this->input->post('txt_ppid');
            $corrfluteid = $this->input->post('txt_ppfluteid');
            $corritemid = $this->input->post('txt_ppitemidp');
            $corrflutedesc = $this->input->post('txt_pflutedesc');
            $corrkraftdesc = $this->input->post('txt_pkraftdesc');
            $corrdeclinefact = $this->input->post('txt_pdeclinefact');
            $corrgsm = $this->input->post('txt_ppgsm');
            $corrkgreq = $this->input->post('txt_pkgreq');
            $corrfact = $this->input->post('txt_ppfact');
            $corrextracons = $this->input->post('txt_pextracons');
            /* Corrugation string end */

            $corrugation_value = '';
            foreach ($corrpid as $key => $value) {
                $corrpidval = $value;
                $corrfluteidval = $corrfluteid[$key];
                $corritemidval = $corritemid[$key];
                $corrflutedescval = $corrflutedesc[$key];
                $corrkraftdescval = $corrkraftdesc[$key];
                $corrdeclinefactval = $corrdeclinefact[$key];
                $corrgsmval = $corrgsm[$key];
                $corrkgreqval = $corrkgreq[$key];
                $corrfactval = $corrfact[$key];
                $corrextraconsval = $corrextracons[$key];
                $dcnotionval = $dcnotion;
                if ($corrkgreqval != '') {
                    $corrstring = "('" . $corrpidval . "','" . $corrfluteidval . "', '" . $corritemidval . "', '" . $corrflutedescval . "','" . $corrkraftdescval . "','" . $corrdeclinefactval . "','" . $corrgsmval . "','" . $corrkgreqval . "','" . $corrfactval . "','" . $corrextraconsval . "','" . $dcnotionval . "'),";

                    $corrugation_value = $corrugation_value . $corrstring;
                } else {
                    $corrugation_value = ';';
                }
            }
            $corrugationval = substr_replace($corrugation_value, ";", -1);

            if ($corrugationval != '' && $corrugationval != ';') {
                $corrugation = "insert into Web_PlyDetails_save_temp(DocId,FluteID,ItemID,FluteDesc,KraftDesc,DeclineFact,GSM,KgReq,Cfact,ExtraConsump,DocNotion)values" . $corrugationval;
            } else {
                $corrugation = '';
            }
            // echo $corrugation;
            // die();
            /* Foreach loop for process detail Start */

            $chk_delte = $this->input->post('chk_delte');

            $process_value = '';
            foreach ($hdn_baseprid as $key => $value) {
                $baseprid = $value;
                $hdn_autoidval = $hdn_autoid[$key];
                $hdn_var_id_info1val = $hdn_var_id_info1[$key];
                $hdn_var_id_info2val = $hdn_var_id_info2[$key];
                $hdn_var_id_info3val = $hdn_var_id_info3[$key];
                $hdn_var_id_info4val = $hdn_var_id_info4[$key];
                $hdn_machienidval = $hdn_machienid[$key];
                $drp_fbval = $drp_fb[$key];
                $txt_info1val = $txt_info1[$key];
                $txt_info2val = $txt_info2[$key];
                $hdn_info3val = $hdn_info3[$key];
                $drp_inhoseval = $drp_inhose[$key];
                $drp_passval = $drp_pass[$key];
                $txt_remarkval = $txt_remark[$key];
                $txt_raw1val = $txt_raw1[$key];
                $txt_raw2val = $txt_raw2[$key];

                $machinenameval = $hdn_machinenameval[$key]; // machine
                $hdn_raw_id1val = $hdn_raw_id1[$key];
                $hdn_raw_id2val = $hdn_raw_id2[$key];
                $hdn_group_id1val = $hdn_group_id1[$key];
                $hdn_group_id2val = $hdn_group_id2[$key];
                $hdn_int_id_info1val = $hdn_int_id_info1[$key];
                $hdn_int_id_info2val = $hdn_int_id_info2[$key];
                $hdn_int_id_info3val = $hdn_int_id_info3[$key];
                $hdn_int_id_info4val = $hdn_int_id_info4[$key];

                $hdn_cutboarddimval = $hdn_cutboarddim[$key];
                $hdn_fullboardnoval = $hdn_fullboardno[$key];
                $hdn_cutdimnoval = $hdn_cutdimno[$key];
                $hdn_prqtyval = $hdn_prqty[$key];
                $hdn_PlanUniqueIDval = $hdn_PlanUniqueID[$key];

                $hdn_dob_info1_val = $hdn_dob_info1[$key];
                $hdn_dob_info2_val = $hdn_dob_info2[$key];
                $hdn_dob_info3_val = $hdn_dob_info3[$key];
                $hdn_dob_info4_val = $hdn_dob_info4[$key];

                $txt_mmtimeval = $txt_mmtime[$key];
                $txt_protimeval = $txt_protime[$key];
                $txt_tottimeqtyval = $txt_tottimeqty[$key];

                $hdn_dob_info5val = $hdn_dob_info5[$key];
                $hdn_dob_info6val = $hdn_dob_info6[$key];
                $hdn_dob_info7val = $hdn_dob_info7[$key];
                $hdn_dob_info8val = $hdn_dob_info8[$key];
                $hdn_group_id3val = $hdn_group_id3[$key];
                $hdn_group_id4val = $hdn_group_id4[$key];
                $hdn_raw_id3val = $hdn_raw_id3[$key];
                $hdn_raw_id4val = $hdn_raw_id4[$key];
                $hdn_dob_info9val = $hdn_dob_info9[$key];
                $hdn_jobcomplexityval = $hdn_jobcomplexity[$key];



                if ($txt_mmtimeval == '') {
                    $txt_mmtimeval = 0;
                }
                if ($txt_protimeval == '') {
                    $txt_protimeval = 0;
                }
                if ($txt_tottimeqtyval == '') {
                    $txt_tottimeqtyval = 0;
                }
                if ($hdn_machienidval == '') {
                    $hdn_machienidval = 0;
                }
                if ($hdn_int_id_info1val == '') {
                    $hdn_int_id_info1val = 0;
                }
                if ($hdn_int_id_info2val == '') {
                    $hdn_int_id_info2val = 0;
                }
                if ($hdn_int_id_info3val == '') {
                    $hdn_int_id_info3val = 0;
                }
                if ($hdn_int_id_info4val == '') {
                    $hdn_int_id_info4val = 0;
                }if ($hdn_fullboardnoval == '') {
                    $hdn_fullboardnoval = 0;
                }if ($hdn_cutdimnoval == '') {
                    $hdn_cutdimnoval = 0;
                }if ($hdn_PlanUniqueIDval == '') {
                    $hdn_PlanUniqueIDval = 0;
                }if ($hdn_dob_info1_val == '') {
                    $hdn_dob_info1_val = 0;
                }if ($hdn_dob_info2_val == '') {
                    $hdn_dob_info2_val = 0;
                }if ($hdn_dob_info3_val == '') {
                    $hdn_dob_info3_val = 0;
                }if ($hdn_dob_info4_val == '') {
                    $hdn_dob_info4_val = 0;
                }if ($hdn_dob_info5val == '') {
                    $hdn_dob_info5val = 0;
                }if ($hdn_dob_info6val == '') {
                    $hdn_dob_info6val = 0;
                }if ($hdn_dob_info7val == '') {
                    $hdn_dob_info7val = 0;
                }if ($hdn_dob_info8val == '') {
                    $hdn_dob_info8val = 0;
                }if ($hdn_dob_info9val == '') {
                    $hdn_dob_info9val = 0;
                }if ($hdn_prqtyval == '') {
                    $hdn_prqtyval = 0;
                }
                $dcnotionval = $dcnotion;
                $chk_delteval = 0;
                if (isset($chk_delte[$key])) {
                    $chk_deltevak = 1;
                    $cstring = "('" . $Docid . "','" . $baseprid . "', '" . $hdn_var_id_info1val . "', '" . $hdn_var_id_info2val . "', '" . $hdn_var_id_info3val . "', '" . $hdn_var_id_info4val . "', '" . $hdn_machienidval . "', '" . $drp_fbval . "', '" . $txt_info1val . "', '" . $txt_info2val . "', '" . $hdn_info3val . "', '" . $drp_inhoseval . "', '" . $drp_passval . "', '" . $txt_remarkval . "', '" . $txt_raw1val . "', '" . $txt_raw2val . "','" . $machinenameval . "','" . $hdn_raw_id1val . "','" . $hdn_raw_id2val . "','" . $hdn_group_id1val . "','" . $hdn_group_id2val . "','" . $hdn_int_id_info1val . "','" . $hdn_int_id_info2val . "','" . $hdn_int_id_info3val . "','" . $hdn_int_id_info4val . "','" . $hdn_cutboarddimval . "','" . $hdn_fullboardnoval . "','" . $hdn_cutdimnoval . "','" . $hdn_prqtyval . "','" . $hdn_PlanUniqueIDval . "','" . $dcnotionval . "','" . $hdn_dob_info1_val . "','" . $hdn_dob_info2_val . "','" . $hdn_dob_info3_val . "','" . $hdn_dob_info4_val . "'," . $txt_mmtimeval . "," . $txt_protimeval . "," . $txt_tottimeqtyval . ",'" . $hdn_dob_info5val . "','" . $hdn_dob_info6val . "','" . $hdn_dob_info7val . "','" . $hdn_dob_info8val . "','" . $hdn_group_id3val . "','" . $hdn_group_id4val . "','" . $hdn_raw_id3val . "','" . $hdn_raw_id4val . "','" . $hdn_dob_info9val . "','" . $chk_deltevak . "','" . $hdn_jobcomplexityval . "','" . $ICompanyId . "'),";
                    $process_value = $process_value . $cstring;
                }
            }
            $process = substr_replace($process_value, ";", -1);

            if ($process != '') {
                $processdetail = "insert into WebJobInfo_Save_temp(Docid,ProcessID,Var_ID_Info1,Var_ID_Info2,Var_ID_Info3,Var_ID_Info4,MachineNo,FB,Var_Info1,Var_Info2,Var_Info3
,ExecutionID,NoOfPass,FP_Remarks1,RawMaterial_1,RawMaterial_2,MachineName,RawMaterialID_1,RawMaterialID_2,GroupID_1,GroupID_2,int_Info1,int_Info2,int_Info3,int_Info4,CutBoardDim,FullBoardNo,CutDimNo,PrQty,PlanUniqueID,DocNotion,Dob_Info1,Dob_Info2,Dob_Info3,Dob_Info4,MrTime,ProcessTime,TotTime,Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8,GroupID_3,GroupID_4,RawMaterialID_3,RawMaterialID_4,Dob_Info9,isativechk,IntricacyID,ICompanyID)values" . $process;
// echo $processdetail;
// die();
            } else {
                $processdetail = '';
            }
            /* Foreach loop for process detail End */

            /* Foreach loop for ink detail start */
            $ink_value = '';
            if (isset($hdn_inkid)) {
                foreach ($hdn_inkid as $key => $value) {
                    $inkid = $value;
                    $txt_inkdescrval = $txt_inkdescri[$key];
                    $txt_colorval = $txt_color[$key];
                    $txt_shnoval = $txt_shno[$key];
                    $txt_unitval = $txt_unitink[$key];
                    $txt_qualityval = $txt_quality[$key];
                    $txt_miscodeval = $txt_miscode[$key];
                    if (isset($chk_front[$key])) {
                        $chk_frontval = 'F';
                    } else if (isset($chk_back[$key])) {
                        $chk_frontval = 'B';
                    } else {
                        $chk_frontval = '0';
                    }
                    if ($txt_unitval == '') {
                        $txt_unitval = 0;
                    }
                    $dcnotionval = $dcnotion;
                    $cstringink = "('" . $Docid . "','" . $inkid . "', '" . $txt_inkdescrval . "', '" . $txt_colorval . "', '" . $txt_shnoval . "', '" . $txt_unitval . "','" . $txt_miscodeval . "', '" . $chk_frontval . "','" . $dcnotionval . "'),";
                    $ink_value = $ink_value . $cstringink;
                }
                /* Foreach loop for ink detail end */
                $inkdetail = substr_replace($ink_value, ";", -1);

                $inkquery = "insert into Web_ink_save_temp(DocID,InkID,Description,Colour,ShadeNo,InkUnit,MISCode,FrontBack,DocNotion)values" . $inkdetail;
            } else {
                $inkquery = '';
            }
// $hdn_itemid1_board = $this->input->post('hdn_itemid1');
            /* Foreach for board detail start */

            $board_value = '';
            foreach ($hdn_mothrrow as $key => $value) {
                $mothrrow = $value;
                $hdn_borddescripval = $hdn_borddescrip[$key];  // not use yet
                $hdn_itemidval = $itemid[1];
                $hdn_milval = $hdn_mil[$key];
                $hdn_kindval = $hdn_kind[$key];
                $hdn_gsmval = $hdn_gsm[$key];
                $hdn_dackleval = $hdn_dackle[$key];
                $hdn_grainval = $hdn_grain[$key];
                $hdn_graindisval = $hdn_graindis[$key];
                $hdn_upsval = $hdn_ups[$key];
                $hdn_shreqval = $hdn_shreq[$key];
                $hdn_wastageval = $hdn_wastage[$key];
                $hdn_totalshval = $hdn_totalsh[$key];
                $hdn_kgqtyval = $hdn_kgqty[$key];
                $hdn_packetsval = $hdn_packets[$key];
                $hdn_paperidval = $hdn_paperid[$key];
                $txt_hdn_boardval = $txt_hdn_board[$key];
                $txt_remarks_boardval = $txt_remarks_board[$key];
                $txt_wastageperval = $txt_wastageper[$key];
                $txt_fullshbeforeval = $txt_fullshbefore[$key];
                $txt_wastagesjeetsval = $txt_wastagesjeets[$key];

                $hdn_mmvalval = $hdn_mmval[$key];
                $txt_wastageperval = $txt_wsagreamrksper;

                $dcnotionval = $dcnotion;
                $txt_wassheetval = $txt_wassheet;
                // '" . $hdn_shreqval . "', '" . $hdn_wastageval . "',
                if ($hdn_gsmval == '') {
                    $hdn_gsmval = 0;
                }if ($hdn_dackleval == '') {
                    $hdn_dackleval = 0;
                }if ($hdn_grainval == '') {
                    $hdn_grainval = 0;
                }if ($txt_wastageperval == '') {
                    $txt_wastageperval = 0;
                }

                $berforews = $hdn_shreqval;
                $shtwastage = $hdn_totalshval - $hdn_shreqval;
                $cstrboard = "('" . $Docid . "','" . $ICompanyId . "','" . $mothrrow . "', '" . $hdn_borddescripval . "', '" . $hdn_milval . "', '" . $hdn_kindval . "', '" . $hdn_gsmval . "','" . $hdn_dackleval . "', '" . $hdn_grainval . "', '" . $hdn_upsval . "', '" . $hdn_totalshval . "', '" . $hdn_kgqtyval . "', '" . $hdn_packetsval . "','" . $hdn_paperidval . "','".$txt_hdn_boardval."','".$txt_remarks_boardval."','0','" . $txt_wastageperval . "','" . $berforews . "','" . $shtwastage . "','" . $dcnotionval . "','" . $hdn_mmvalval . "'),";
                $board_value = $board_value . $cstrboard;
            }
            /* Foreach for board detail end */
            $boarddetail = substr_replace($board_value, ";", -1);
            $boarddetailinsert = "insert into item_jpaper_save_Temp(Docid,ICompanyID,NoofPlates,BoardDescription,Company,Kind,GSM,Length,Breadth,FullSheetUps,FullSheets,Qty,PlateID,PaperID,ChangeID,Board_remarks,TrimSpace,Wastage,FullSHBeforeWastage,WastageSheets,DocNotion,boarddivfact)values" . $boarddetail;

            /* Foreach for cut borard detail start */

            $cut_value = '';
            foreach ($txt_bre as $key => $value) {
                $b = $value;
                $hdn_mothrrowvall = $hdn_mothrrowval[$key];
                $txt_optimizerval = $txt_optimizer[$key];
                $txt_lenval = $txt_len[$key];
                $txt_nval = $txt_n[$key];
                $txt_upsval = $txt_ups[$key];
                $txt_cutshval = $txt_cutsh[$key];
                $txt_wastageval = $txt_wastage[$key];
                $txt_graindisval = $txt_graindis[1];

                // $txt_c_wastageperval= $txt_c_wastageper[$key];
                $txt_c_wastageperval = $txt_wastageperval;
                $txt_c_wastageshval = $txt_c_wastagesh[$key];
                $txt_c_shbeforewsval = $txt_c_shbeforews[$key];

                $hdn_mmvalcutval = $hdn_mmvalcut[$key];
                $dcnotionval = $dcnotion;
                $txt_wassheetval = $txt_wassheet;
                // $wstgsheet =  $txt_wassheetval -$txt_c_shbeforewsval;
                if ($txt_c_wastageperval == '') {
                    $txt_c_wastageperval = 0;
                }

                $wstgsheet = $txt_wastageval - $txt_c_shbeforewsval;
                $cstrcut = "('" . $Docid . "','" . $ICompanyId . "','" . $b . "','" . $txt_lenval . "','" . $txt_nval . "', '" . $txt_upsval . "', '" . $txt_wastageval . "', '" . $txt_graindisval . "','" . $txt_c_wastageperval . "','" . $wstgsheet . "','" . $txt_c_shbeforewsval . "','" . $dcnotionval . "','" . $hdn_mmvalcutval . "'),";
                $cut_value = $cut_value . $cstrcut;
            }
            /* Foreach for cut borard detail end */
            $cutstring = substr_replace($cut_value, ";", -1);
            $cutdetail = "insert into item_CutDetails_save_temp(Docid,ICompanyID,B,L,N,UpsInCutSheet,TCutSheets,Grain,WastagePer,WastageSheets,SheetsBeforeWastage,DocNotion,boarddivfact)values" . $cutstring;
            // print_r($txt_olditemid);
            // die();
            $raw_value = '';
            foreach ($txt_rawmaterial as $key => $value) {
                $txt_rawmaterialval = $value;
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


                $cstraw = "('" . $Docid . "','" . $txt_rawmaterialval . "','" . $txt_Detailsval . "','" . $txt_apprxval . "', '" . $txt_otherdetailval . "', '" . $txt_unitval . "', '" . $txt_requestoccval . "', '" . $txt_materialstaval . "', '" . $txt_qtyallval . "', '" . $txt_imrval . "', '" . $txt_olditemidval . "', '" . $txt_olditemidval . "', '" . $txt_oldmatrialval . "', '" . $txt_recordidval . "', '" . $txt_allcatididval . "', '" . $txt_allocatmaterval . "', '" . $txt_Pridval . "', '" . $txt_processtaval . "', '" . $txt_Jobnoval . "', '" . $txt_codenoval . "', '" . $txt_gnameval . "','" . $dcnotionval . "'),";
                $raw_value = $raw_value . $cstraw;
            }
            /* Foreach for cut borard detail end */
            $raw_detail = substr_replace($raw_value, ";", -1);



            $raw_detail_insert = "insert into web_raw_save_detail(Docid,raw_material, Details, Approxqtyreq, Other_Detail,Unit, 
    ReqtoReserved,Material_status,Qty_allocated,Select_for_IMR,Old_Itmeid,Itmeid, 
    Old_Matieral,RecordId, AllocatedID,AllocatedRawMaterial,Prid,Process_Status,jobno,Code_No,Group_Name,DocNotion
    )values" . $raw_detail;
            /* Job card master */
            // $jobnew
            $jobcard_master = "insert into item_jobcardmaster(DocID,DocDate,Docnotion,ICompanyID,AUID,ADateTime,Processing,Hold,Holdreason,CancelJob,CancelReason,jclose,closedate,closeResaon,ItemDetails,ProcessDetails,EstComments,JobDetails,JobKind,JobType,DocketUniqueID,PlanStatus,GCNote,IsActive,FStatus,ImportFPid,ImportRecordid,ReasonOfShortQty,StockQty,Reprint_Partial)values('$Docid','$txt_docdateval','$dcnotion','$ICompanyId','$AUID','$ADateTime','$drp_oldnew','$chk_holdval','$txt_hreas','$chk_cancleval','$txt_canreas','$chk_closeval','$txt_closedatejob','$txt_closereas','','','$txt_stmreamrks','$txt_jreamrks','M','P','$Docid','0','0','0','0','$hdn_gangitemid','$hdn_gangrecidestid','$txt_shortqtyreason','$txt_fgstock','$drp_shotqty')";
            /* Job Card Master d */
            // echo $jobcard_master;
            // echo $txt_wsagreamrksper;
            // die();
            $jobcard_d = '';
            $txt_printqty_multi = 0;
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
                $txt_fqtyval = $txt_fqty[$key];
                $txt_wsagreamrksperval = $txt_wsagreamrksper;
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
                }

                if ($key == 1) {
                    $majeritme = 1;
                } else {
                    $majeritme = 0;
                }
                if ($txt_printqtya == '' || $txt_printqtya == 0) {
                    $txt_printqty = $txt_orderqtyval;
                } else {
                    // $txt_printqty_multi = $txt_printqty_multi + $txt_printqtya;
                    // $txt_printqty = $txt_printqty_multi;
                    $txt_printqty = $txt_printqtya;
                }
                if ($txt_fqtyval == '') {
                    $txt_fqtyvala = 0;
                } else {
                    $txt_fqtyvala = $txt_fqtyval;
                }
                $dcnotionval = $dcnotion;

                $drp_repeatjobval = $drp_repeatjob;
                $ICompanyIdval = $ICompanyId;
                $cstrijob = "('" . $Docid . "', '" . $clientidval . "', '" . $ICompanyIdval . "', '" . $woidval . "', '" . $itemidval . "','" . $txt_orderqtyval . "' ,'" . $txt_printqty . "', '" . $drp_repeatjobval . "', '" . $jobnoval . "', '" . $txt_fqtyvala . "','','','','2060-01-01','" . $majeritme . "','','','0','','0','0','" . $txt_specificationval . "','" . $txt_TotQtyDispatc . "','" . $txt_TotQtyProduc . "','" . $Docid . "','" . $dcnotionval . "','" . $txt_upsvalmaingrid . "','" . $txt_wsagreamrksperval . "','" . $drp_noyes . "'),";
                $jobcard_d = $jobcard_d . $cstrijob;
            }
            /* Foreach loop for ink detail end */
            $jobcadrdetail_d = substr_replace($jobcard_d, ";", -1);


// Wastage,FilmNo,

            $jobcadrmaster_d = "insert into item_jobcardmaster_d(DocID,ClientID,ICompanyId,WOID,ItemID,OrdQty,JobQty,NewJob,JobNo,PrintQtyAfterWastage,FilmNo,
		DieNo,PlateNo,DilDate,MajorItem,ItemType,JobSpec,ProofApp,ShadeCardId,ProofJob,FullSh2Ups,SpecID,TotQtyDispatched,TotQtyProduced,MasterDocketUniqueID,DocNotion,UpsInCutSheet,Wastage,ShadeCard)values" . $jobcadrdetail_d;
            // echo "<br>";
            // echo $jobcadrmaster_d;
            $jinfoval = "insert into item_jinfo(DocID,RemDesign,BFBS,ShadeCard,IcompanyId,OpenSize,DocNotion,RemScanning,RemPlanning,RemDelivery,ChkListNo,PastProblems,RemPrintLine)values('$Docid','$txt_desinging','$txt_bfbs','$txt_reel','$ICompanyId','$txt_jobopen','$dcnotion','$txt_margins','$rempasting','$RemDelivery','$ChkListNo','$PastProblems','$RemPrintLine');";

            $PLhovala = 0;
            $printval = 0;
            $fcval = 0;
            $fback = 0;
            $flamination = 0;
            $lamback = 0;
            $WPinhovala = 0;
            $PNinhovala = 0;
            $EMinhovala = 0;
            $FCuthovala = 0;
            $FOhovala = 0;
            $ffoil = 0;
            $ffoilback = 0;
            $Packinhovala = 0;
            $Paaainhovala = 0;
            $FMinhovala = 0;
            $jprocessstring = '';
            foreach ($drp_inhose as $key => $value) {
                $inhoval = $value;
                $hdn_basepridval = $hdn_baseprid[$key];
                $drp_fbval = $drp_fb[$key];

                if ($hdn_basepridval == 'Pr') {
                    $printval = $inhoval;
                }
                if ($hdn_basepridval == 'FC') {
                    if ($drp_fbval == 'Front') {
                        $fcval = $inhoval;
                        $fback = 0;
                    } else {
                        $fcval = 0;
                        $fback = $inhoval;
                    }
                }
                if ($hdn_basepridval == 'FL') {
                    if ($drp_fbval == 'Front') {
                        $flamination = $inhoval;
                        $lamback = 0;
                    } else {
                        $flamination = 0;
                        $lamback = $inhoval;
                    }
                }
                if ($hdn_basepridval == 'WP') {
                    $WPinhovala = $inhoval;
                }
                if ($hdn_basepridval == 'PN') {
                    $PNinhovala = $inhoval;
                }

                if ($hdn_basepridval == 'EM') {
                    $EMinhovala = $inhoval;
                }
                if ($hdn_basepridval == 'FF') {
                    if ($drp_fbval == 'Front') {
                        $ffoil = $inhoval;
                        $ffoilback = 0;
                    } else {
                        $ffoil = 0;
                        $ffoilback = $inhoval;
                    }
                }
                if ($hdn_basepridval == 'Pack') {
                    $Packinhovala = $inhoval;
                }


                if ($hdn_basepridval == 'Pa') {
                    $Paaainhovala = $inhoval;
                }
                if ($hdn_basepridval == 'FM') {
                    $FMinhovala = $inhoval;
                }

                if ($hdn_basepridval == 'PL') {
                    $PLhovala = $inhoval;
                }

                if ($hdn_basepridval == 'FO') {
                    $FOhovala = $inhoval;
                }
                if ($hdn_basepridval == 'FCut') {
                    $FCuthovala = $inhoval;
                }
            }

            $jsring = "('" . $Docid . "', '" . $printval . "', '" . $fcval . "', '" . $fback . "', '" . $flamination . "','" . $lamback . "', '" . $WPinhovala . "','" . $PNinhovala . "', '" . $EMinhovala . "', '" . $ffoil . "','" . $ffoilback . "','" . $Packinhovala . "','" . $Paaainhovala . "','" . $FMinhovala . "','0','0','" . $PLhovala . "','" . $FOhovala . "','" . $FCuthovala . "','0','" . $ICompanyId . "','P')";
            // $jprocessstring = $jprocessstring . $jsring;
// $jsring_val = substr_replace($jsring,";",-1);
            $jprocesstbl = "insert into item_jprocess 
    (DocID, Printing, FCoating, BCoating, FLam, BLam,WinPatch,Punching,Embossing, FFoil, BFoil,Packing,Pasting,Corru,Design,ColSep,Plates, Folding, FCut, Coating3, ICompanyID,JType)
    values" . $jsring;
            $jprocesstbl = '';

            foreach ($txt_lotno as $key => $value) {
                $txt_lotnoval = $value;
                $txt_mfgdateval = $txt_mfgdate[$key];
                $txt_qtylotval = $txt_qtylot[$key];
                $txt_cutsheetlotval = $txt_cutsheetlot[$key];
                $txt_upslotval = $txt_upslot[$key];
                $Mrplotval = $Mrplot[$key];
                $hdn_srnoval = $hdn_srno[$key];

                $this->db->query("update lot_detail set CutSHReq ='$txt_cutsheetlotval',ups_lot='$txt_upslotval' where Qty='$txt_qtylotval' and 
        lotno ='$txt_lotnoval' and MfgDate = '$txt_mfgdateval' and Mrplot = '$Mrplotval' and Srno = '$hdn_srnoval';");
            }





            $manualjc = 0;
            $this->load->model('Production/Mod_jobcard');
            $Main_temp = $this->Mod_jobcard->Savedataval($jobcard_master, $jobcadrmaster_d, $boarddetailinsert, $cutdetail, $processdetail, $inkquery, $raw_detail_insert, $jinfoval, $corrugation, $jobnew, $jobnofirst, $Docid, $ICompanyId, $docidset, $manualjc, $dcnotion);
            // print_r($Main_temp);
            // echo $processdetail;
            // echo '<br>';
            $ErrorMessege1 = $Main_temp[0]->abc;
            if ($ErrorMessege1 == 'Record  saved.') {
                $ErrorMessege = $Main_temp[0]->def;
                $ErrorMessege2 = $Main_temp[0]->docnotion;
//                $jobcardno = $ErrorMessege;
//                $jobtype = 'Old';
//                $data['data'] = $this->Mod_jobcard->pageloadOld($jobcardno, $jobtype);
//                $data['Neworold'] = 'Old'; // $this->input->post('hdn_jobnew');
//                $data['docid'] = $jobcardno;
//                $data['docnotionval'] = $ErrorMessege2;

                $chk_email = $this->input->post('chk_email');
                if ($chk_email == 'on') {
                    $this->email(1);
                }
                // print_r($data);
                // die();
                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";
                // $this->session->set_flashdata('lolwut',$data);,
                $gly = "<span class='fa fa-check-circle'></span>";
                $this->session->set_flashdata("success_msg", $gly . " Jobcard saved successfully ..!");
                redirect('Production/Jobsearch');
                // $this->index1($data);
            } else {
                $ErrorMessege1 = $Main_temp[0]->abc;
                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";
                $gly = "<span class='fa fa-exclamation-circle'></span>";
                $this->session->set_flashdata("error_msg", $gly . " Error occured while saving - ". $ErrorMessege1);
                redirect('Production/Jobsearch');
            }
        } else if ($btn == 'Update') {

            $docidset = $this->input->post('txt_docid');
            $jobnofirst = $this->input->post('hdn_jobnno[1]');
            $Docid = $this->input->post('txt_uniquerjcno');
            $dcnotion = $this->input->post('hdn_dcnotionval');
            if ($dcnotion == '') {
                $dcnotion = 17;
            }
            $txt_docdateval = $this->input->post('txt_docdateval');

            
            $txt_closedatejoba = $this->input->post('txt_closedateval');

            
            if ($txt_closedatejoba == '') {
                $txt_closedatejob = '2060-01-01';
            } else {
                $txt_closedatejob = $txt_closedatejoba;
            }
            date_default_timezone_set('Asia/Calcutta');
            $ADateTime = date('Y/m/d H:i:s ', time());
            /* Array  Job Item */
            $clientid = $this->input->post('hdn_clientid');
            $ICompanyId = $this->input->post('hdn_icompid');
            $AUID = $this->input->post('hdn_uid');
            $ICompanyId = $this->company_id;
            $AUID = $this->user_id;

            $woid = $this->input->post('hdn_woid');
            $itemid = $this->input->post('hdn_itemid');
            // print_r($itemid);
            // die();
            $txt_orderqty = $this->input->post('txt_orderqty');
            $txt_jobqty = $this->input->post('txt_orderqty');
            $drp_oldnew = $this->input->post('drp_oldnew');
            $jobno = $this->input->post('hdn_jobnno');
            $txt_printqty = $this->input->post('txt_printqty');
            $txt_fqty = $this->input->post('txt_fqty');
            $txt_specification = $this->input->post('txt_specification');
            $txt_TotQtyProduced = $this->input->post('txt_TotQtyProduced');
            $txt_TotQtyDispatched = $this->input->post('txt_TotQtyDispatched');
            $txt_upsvalmain = $this->input->post('txt_upsvalmain');
            $txt_jreamrks = $this->input->post('txt_jreamrks');
            $txt_woreamrks = $this->input->post('txt_woreamrks');
            $txt_stmreamrks = $this->input->post('txt_stmreamrks');
            $txt_fgstock = $this->input->post('txt_fgstock');
            $txt_shortqtyreason = $this->input->post('txt_shortqtyreason');
            $drp_shotqty = $this->input->post('drp_shotqty');

            if ($txt_fgstock == '') {
                $txt_fgstock = 0;
            }
            /* First table close */

            /* Select Jobkind second table single */
            $drp_repeatjob = $this->input->post('drp_repeatjob');
            $drp_oldnew = $this->input->post('drp_oldnew');
            $drp_noyes = $this->input->post('drp_noyes');
            // $drp_location = $this->input->post('drp_location');
        
            $txt_wsagreamrksper = $this->input->post('txt_wsagreamrksper');
            $txt_wassheet = $this->input->post('txt_wassheet');
            /* End Jobkind second table single */

            /* Hold grid Start */
            $chk_hold = $this->input->post('chk_hold');
            $txt_hreas = $this->input->post('txt_hreas');
            $chk_cancle = $this->input->post('chk_cancle');
            $txt_canreas = $this->input->post('txt_canreas');
            $chk_close = $this->input->post('chk_close');
            $txt_closereas = $this->input->post('txt_closereas');
            $txt_closedate = $this->input->post('txt_closedate');

            $hdn_gangitemid = $this->input->post('hdn_gangitemid');
            $chk_holdval = 0;
            if (isset($chk_hold)) {
                $chk_holdval = 1;
            }

            $chk_cancleval = 0;
            if (isset($chk_cancle)) {
                $chk_cancleval = 1;
            }
            $chk_closeval = 0;
            if (isset($chk_close)) {
                $chk_closeval = 1;
            }

            /* Hold grid End */

            /* Array Board detail start */
            $hdn_borddescrip = $this->input->post('hdn_borddescrip');
            $hdn_mothrrow = $this->input->post('hdn_mothrrow');
            // $hdn_itemid = $this->input->post('hdn_itemid');
            $hdn_mil = $this->input->post('hdn_mil');
            $hdn_kind = $this->input->post('hdn_kind');
            $hdn_gsm = $this->input->post('hdn_gsm');
            $hdn_dackle = $this->input->post('hdn_dackle');
            $hdn_grain = $this->input->post('txt_grainnn');
            $hdn_graindis = $this->input->post('hdn_graindis');
            $hdn_ups = $this->input->post('hdn_ups');
            $hdn_shreq = $this->input->post('hdn_shreq');
            $hdn_wastage = $this->input->post('hdn_wastage');
            $hdn_totalsh = $this->input->post('hdn_totalsh');
            $hdn_kgqty = $this->input->post('hdn_kgqty');
            $hdn_packets = $this->input->post('hdn_packets');
            $hdn_paperid = $this->input->post('hdn_paperid');
            $txt_hdn_board = $this->input->post('txt_hdn_board');
            $txt_remarks_board = $this->input->post('txt_remarks_board');
            // print_r($txt_hdn_board);
            // print_r($txt_remarks_board);
            // die;
            $txt_wastageper = $this->input->post('txt_wastageper');
            $txt_fullshbefore = $this->input->post('txt_fullshbefore');
            $txt_wastagesjeets = $this->input->post('txt_wastagesjeets');
            $hdn_mmval = $this->input->post('hdn_mmval');
            /* Array Board detail End */

            /* Process detail grid Start array */
            $hdn_autoid = $this->input->post('hdn_autoid');  // auto id in hidden field
            $hdn_var_id_info1 = $this->input->post('hdn_var_id_info1');
            $hdn_var_id_info2 = $this->input->post('hdn_var_id_info2');
            $hdn_var_id_info3 = $this->input->post('hdn_var_id_info3');
            $hdn_var_id_info4 = $this->input->post('hdn_var_id_info4');
            $hdn_baseprid = $this->input->post('hdn_baseprid');
            $hdn_machienid = $this->input->post('hdn_machienid');
            $drp_fb = $this->input->post('drp_fb');
            $txt_info1 = $this->input->post('txt_info1');
            $txt_info2 = $this->input->post('txt_info2');
            $hdn_info3 = $this->input->post('hdn_info3');
            $drp_inhose = $this->input->post('drp_inhose');
            $drp_pass = $this->input->post('drp_pass');
            $txt_remark = $this->input->post('txt_remark');
            $txt_raw1 = $this->input->post('txt_raw1');
            $txt_raw2 = $this->input->post('txt_raw2');
            $hdn_machinenameval = $this->input->post('hdn_machinenameval');

            $hdn_cutboarddim = $this->input->post('hdn_cutboarddim');
            $hdn_fullboardno = $this->input->post('hdn_fullboardno');
            $hdn_cutdimno = $this->input->post('hdn_cutdimno');
            $hdn_prqty = $this->input->post('hdn_prqty');
            $hdn_PlanUniqueID = $this->input->post('hdn_PlanUniqueID');

            $hdn_dob_info1 = $this->input->post('hdn_dob_info1');
            $hdn_dob_info2 = $this->input->post('hdn_dob_info2');
            $hdn_dob_info3 = $this->input->post('hdn_dob_info3');
            $hdn_dob_info4 = $this->input->post('hdn_dob_info4');

            $txt_mmtime = $this->input->post('hdn_mmtimeval');
            $txt_protime = $this->input->post('hdn_pptimeval');
            $txt_tottimeqty = $this->input->post('hdn_tottimeval');

            // print_r($hdn_PlanUniqueID);
            // die();
            /* Process detail grid End array */
            /* Ink detail grid Start array */
            $hdn_inkid = $this->input->post('hdn_inkid');
            $txt_inkdescri = $this->input->post('txt_inkdescri');
            $txt_color = $this->input->post('txt_color');
            $txt_shno = $this->input->post('txt_shno');
            // $txt_unit = $this->input->post('txt_unit');
            $txt_quality = $this->input->post('txt_quality');
            $txt_miscode = $this->input->post('txt_miscode');

            $txt_unitink = $this->input->post('txt_unitink');
            // $txt_quality = $this->input->post('txt_quality');
            // $txt_miscode = $this->input->post('txt_miscode');
            /* Chk box */
            $chk_front = $this->input->post('chk_front');
            $chk_back = $this->input->post('chk_back');
            /* Ink detail grid End array */

            /* Lot detail grid Start array */
            $hdn_srno = $this->input->post('hdn_srno');
            $hdn_lotdescri = $this->input->post('hdn_lotdescri');
            $txt_lotno = $this->input->post('txt_lotno');
            $txt_mfgdate = $this->input->post('txt_mfgdate');
            // $txt_expdate = $this->input->post('txt_expdate');
            $Mrplot = $this->input->post('txt_expdate');
            $txt_qtylot = $this->input->post('txt_qtylot');
            $txt_cutsheetlot = $this->input->post('txt_cutsheetlot');
            $txt_upslot = $this->input->post('txt_upslot');
            /* Lot detail grid Start array */

            /* Array cut detail start */
            $hdn_mothrrowval = $this->input->post('hdn_mothrrowval');
            $txt_optimizer = $this->input->post('txt_optimizer');
            $txt_bre = $this->input->post('txt_bre');
            $txt_len = $this->input->post('txt_len');
            $txt_n = $this->input->post('txt_n');
            $txt_ups = $this->input->post('txt_ups');
            $txt_cutsh = $this->input->post('txt_cutsh');
            $txt_wastage = $this->input->post('txt_wastage');
            $txt_graindis = $this->input->post('txt_graindis');
            $txt_c_wastageper = $this->input->post('txt_c_wastageper');
            $txt_c_wastagesh = $this->input->post('txt_c_wastagesh');
            $txt_c_shbeforews = $this->input->post('txt_c_shbeforews');
            $hdn_mmvalcut = $this->input->post('hdn_mmvalcut');
            /* Array cut detail End */

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
            /* Raw  material detail End */

            /* Foreach loop for process detail Start */
            $chk_delte = $this->input->post('chk_delte');
            $process_value = '';
            foreach ($hdn_baseprid as $key => $value) {
                $baseprid = $value;
                $hdn_autoidval = $hdn_autoid[$key];
                $hdn_var_id_info1val = $hdn_var_id_info1[$key];
                $hdn_var_id_info2val = $hdn_var_id_info2[$key];
                $hdn_var_id_info3val = $hdn_var_id_info3[$key];
                $hdn_var_id_info4val = $hdn_var_id_info4[$key];
                $hdn_machienidval = $hdn_machienid[$key];
                $drp_fbval = $drp_fb[$key];
                $txt_info1val = $txt_info1[$key];
                $txt_info2val = $txt_info2[$key];
                $hdn_info3val = $hdn_info3[$key];
                $drp_inhoseval = $drp_inhose[$key];
                $drp_passval = $drp_pass[$key];
                $txt_remarkval = $txt_remark[$key];
                $txt_raw1val = $txt_raw1[$key];
                $txt_raw2val = $txt_raw2[$key];
                $machinenameval = $hdn_machinenameval[$key]; // machine

                $hdn_raw_id1val = $hdn_raw_id1[$key];
                $hdn_raw_id2val = $hdn_raw_id2[$key];
                $hdn_group_id1val = $hdn_group_id1[$key];
                $hdn_group_id2val = $hdn_group_id2[$key];

                $hdn_int_id_info1val = $hdn_int_id_info1[$key];
                $hdn_int_id_info2val = $hdn_int_id_info2[$key];
                $hdn_int_id_info3val = $hdn_int_id_info3[$key];
                $hdn_int_id_info4val = $hdn_int_id_info4[$key];

                $hdn_cutboarddimval = $hdn_cutboarddim[$key];
                $hdn_fullboardnoval = $hdn_fullboardno[$key];
                $hdn_cutdimnoval = $hdn_cutdimno[$key];
                $hdn_prqtyval = $hdn_prqty[$key];
                $hdn_PlanUniqueIDval = $hdn_PlanUniqueID[$key];
                $hdn_dob_info1_val = $hdn_dob_info1[$key];
                $hdn_dob_info2_val = $hdn_dob_info2[$key];
                $hdn_dob_info3_val = $hdn_dob_info3[$key];
                $hdn_dob_info4_val = $hdn_dob_info4[$key];

                $hdn_dob_info5val = $hdn_dob_info5[$key];
                $hdn_dob_info6val = $hdn_dob_info6[$key];
                $hdn_dob_info7val = $hdn_dob_info7[$key];
                $hdn_dob_info8val = $hdn_dob_info8[$key];
                $hdn_dob_info9val = $hdn_dob_info9[$key];
                $hdn_group_id3val = $hdn_group_id3[$key];
                $hdn_group_id4val = $hdn_group_id4[$key];
                $hdn_raw_id3val = $hdn_raw_id3[$key];
                $hdn_raw_id4val = $hdn_raw_id4[$key];
                $hdn_jobcomplexityval = $hdn_jobcomplexity[$key];

                $txt_mmtimeval = $txt_mmtime[$key];
                $txt_protimeval = $txt_protime[$key];
                $txt_tottimeqtyval = $txt_tottimeqty[$key];
                if ($txt_mmtimeval == '') {
                    $txt_mmtimeval = '0';
                }if ($txt_protimeval == '') {
                    $txt_protimeval = '0';
                }if ($txt_tottimeqtyval == '') {
                    $txt_tottimeqtyval = '0';
                }


                if ($hdn_machienidval == '') {
                    $hdn_machienidval = 0;
                }
                if ($hdn_int_id_info1val == '') {
                    $hdn_int_id_info1val = 0;
                }
                if ($hdn_int_id_info2val == '') {
                    $hdn_int_id_info2val = 0;
                }
                if ($hdn_int_id_info3val == '') {
                    $hdn_int_id_info3val = 0;
                }
                if ($hdn_int_id_info4val == '') {
                    $hdn_int_id_info4val = 0;
                }if ($hdn_fullboardnoval == '') {
                    $hdn_fullboardnoval = 0;
                }if ($hdn_cutdimnoval == '') {
                    $hdn_cutdimnoval = 0;
                }if ($hdn_PlanUniqueIDval == '') {
                    $hdn_PlanUniqueIDval = 0;
                }if ($hdn_dob_info1_val == '') {
                    $hdn_dob_info1_val = 0;
                }if ($hdn_dob_info2_val == '') {
                    $hdn_dob_info2_val = 0;
                }if ($hdn_dob_info3_val == '') {
                    $hdn_dob_info3_val = 0;
                }if ($hdn_dob_info4_val == '') {
                    $hdn_dob_info4_val = 0;
                }if ($hdn_dob_info5val == '') {
                    $hdn_dob_info5val = 0;
                }if ($hdn_dob_info6val == '') {
                    $hdn_dob_info6val = 0;
                }if ($hdn_dob_info7val == '') {
                    $hdn_dob_info7val = 0;
                }if ($hdn_dob_info8val == '') {
                    $hdn_dob_info8val = 0;
                }if ($hdn_dob_info9val == '') {
                    $hdn_dob_info9val = 0;
                }if ($hdn_prqtyval == '') {
                    $hdn_prqtyval = 0;
                }


                $chk_delteval = 0;
                if (isset($chk_delte[$key])) {
                    $chk_deltevak = 1;
                    $dcnotionval = $dcnotion;
                    $cstring = "('" . $docidset . "','" . $baseprid . "', '" . $hdn_var_id_info1val . "', '" . $hdn_var_id_info2val . "', '" . $hdn_var_id_info3val . "', '" . $hdn_var_id_info4val . "', '" . $hdn_machienidval . "', '" . $drp_fbval . "', '" . $txt_info1val . "', '" . $txt_info2val . "', '" . $hdn_info3val . "', '" . $drp_inhoseval . "', '" . $drp_passval . "', '" . $txt_remarkval . "', '" . $txt_raw1val . "', '" . $txt_raw2val . "','" . $machinenameval . "','" . $hdn_raw_id1val . "','" . $hdn_raw_id2val . "','" . $hdn_group_id1val . "','" . $hdn_group_id2val . "','" . $hdn_int_id_info1val . "','" . $hdn_int_id_info2val . "','" . $hdn_int_id_info3val . "','" . $hdn_int_id_info4val . "','" . $hdn_cutboarddimval . "','" . $hdn_fullboardnoval . "','" . $hdn_cutdimnoval . "','" . $hdn_prqtyval . "','" . $hdn_PlanUniqueIDval . "','" . $dcnotionval . "','" . $hdn_dob_info1_val . "','" . $hdn_dob_info2_val . "','" . $hdn_dob_info3_val . "','" . $hdn_dob_info4_val . "'," . $txt_mmtimeval . "," . $txt_protimeval . "," . $txt_tottimeqtyval . ",'" . $hdn_dob_info5val . "','" . $hdn_dob_info6val . "','" . $hdn_dob_info7val . "','" . $hdn_dob_info8val . "','" . $hdn_group_id3val . "','" . $hdn_group_id4val . "','" . $hdn_raw_id3val . "','" . $hdn_raw_id4val . "','" . $hdn_dob_info9val . "','" . $chk_deltevak . "','" . $hdn_jobcomplexityval . "','" . $ICompanyId . "'),";
                    $process_value = $process_value . $cstring;
                }
            }
            $process = substr_replace($process_value, ";", -1);
            if ($process != '') {
                $processdetail = "insert into WebJobInfo_Save_temp(Docid,ProcessID,Var_ID_Info1,Var_ID_Info2,Var_ID_Info3,Var_ID_Info4,MachineNo,FB,Var_Info1,Var_Info2,Var_Info3
,ExecutionID,NoOfPass,FP_Remarks1,RawMaterial_1,RawMaterial_2,MachineName,RawMaterialID_1,RawMaterialID_2,GroupID_1,GroupID_2,int_Info1,int_Info2,int_Info3,int_Info4,CutBoardDim,FullBoardNo,CutDimNo,PrQty,PlanUniqueID,DocNotion,Dob_Info1,Dob_Info2,Dob_Info3,Dob_Info4,MrTime,ProcessTime,TotTime,Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8,GroupID_3,GroupID_4,RawMaterialID_3,RawMaterialID_4,Dob_Info9,isativechk,IntricacyID,ICompanyID)values" . $process;
//echo $processdetail;
// die();
            } else {
                $processdetail = '';
            }
            // echo $processdetail ;
            // die();
            /* Foreach loop for process detail End */

            /* Foreach loop for ink detail start */
            $ink_value = '';
            if (isset($hdn_inkid)) {
                foreach ($hdn_inkid as $key => $value) {
                    $inkid = $value;
                    $txt_inkdescrval = $txt_inkdescri[$key];
                    $txt_colorval = $txt_color[$key];
                    $txt_shnoval = $txt_shno[$key];
                    $txt_unitval = $txt_unitink[$key];
                    $txt_qualityval = $txt_quality[$key];
                    $txt_miscodeval = $txt_miscode[$key];
                    if (isset($chk_front[$key])) {
                        $chk_frontval = 'F';
                    } else if (isset($chk_back[$key])) {
                        $chk_frontval = 'B';
                    } else {
                        $chk_frontval = '0';
                    }
                    if ($txt_unitval == '') {
                        $txt_unitval = 0;
                    }
                    $dcnotionval = $dcnotion;
                    $cstringink = "('" . $docidset . "','" . $inkid . "', '" . $txt_inkdescrval . "', '" . $txt_colorval . "', '" . $txt_shnoval . "', '" . $txt_unitval . "','" . $txt_miscodeval . "', '" . $chk_frontval . "','" . $dcnotionval . "'),";
                    $ink_value = $ink_value . $cstringink;
                }
                /* Foreach loop for ink detail end */
                $inkdetail = substr_replace($ink_value, ";", -1);

                $inkquery = "insert into Web_ink_save_temp(DocID,InkID,Description,Colour,ShadeNo,InkUnit,MISCode,FrontBack,DocNotion)values" . $inkdetail;
            } else {
                $inkquery = '';
            }
            /* Foreach for board detail start */
            // print_r($itemid);

            $board_value = '';
            $cstrboard = '';

            foreach ($hdn_mothrrow as $key => $value) {
                // $itemid
                // $hdn_itemidval = $value;
                $mothrrow = $value;
                $hdn_borddescripval = $hdn_borddescrip[$key];  // not use yet
                //[$key];
                $hdn_milval = $hdn_mil[$key];
                $hdn_kindval = $hdn_kind[$key];
                $hdn_gsmval = $hdn_gsm[$key];
                $hdn_dackleval = $hdn_dackle[$key];
                $hdn_grainval = $hdn_grain[$key];
                $hdn_graindisval = $hdn_graindis[$key];
                $hdn_upsval = $hdn_ups[$key];
                $hdn_shreqval = $hdn_shreq[$key];
                $hdn_wastageval = $hdn_wastage[$key];
                $hdn_totalshval = $hdn_totalsh[$key];
                $hdn_kgqtyval = $hdn_kgqty[$key];
                $hdn_packetsval = $hdn_packets[$key];
                $hdn_paperidval = $hdn_paperid[$key];
                $txt_hdn_boardval = $txt_hdn_board[$key];
                $txt_remarks_boardval = $txt_remarks_board[$key];
                $txt_wastageperval = $txt_wastageper[$key];
                $txt_fullshbeforeval = $txt_fullshbefore[$key];
                $txt_wastagesjeetsval = $txt_wastagesjeets[$key];
                $hdn_mmvalval = $hdn_mmval[$key];
                $dcnotionval = $dcnotion;
                $txt_wsagreamrksperval = $txt_wsagreamrksper;

                // '" . $hdn_shreqval . "', '" . $hdn_wastageval . "',
                if ($hdn_gsmval == '') {
                    $hdn_gsmval = 0;
                }if ($hdn_dackleval == '') {
                    $hdn_dackleval = 0;
                }if ($hdn_grainval == '') {
                    $hdn_grainval = 0;
                }


                $txt_wassheetval = $txt_wassheet;
                $berforews = $hdn_totalshval - $txt_wassheetval;
                $shtwastage = $hdn_totalshval - $hdn_shreqval;

                $cstrboard = "('" . $docidset . "','" . $ICompanyId . "','" . $mothrrow . "', '" . $hdn_borddescripval . "', '" . $hdn_milval . "', '" . $hdn_kindval . "', '" . $hdn_gsmval . "','" . $hdn_dackleval . "', '" . $hdn_grainval . "', '" . $hdn_upsval . "', '" . $hdn_totalshval . "', '" . $hdn_kgqtyval . "', '" . $hdn_packetsval . "','" . $hdn_paperidval . "','".$txt_hdn_boardval."','".$txt_remarks_boardval."','0','" . $txt_wsagreamrksperval . "','" . $berforews . "','" . $shtwastage . "','" . $dcnotionval . "','" . $hdn_mmvalval . "'),";
                $board_value = $board_value . $cstrboard;
            }
            /* Foreach for board detail end */
            $boarddetail = substr_replace($board_value, ";", -1);
            $boarddetailinsert = "insert into item_jpaper_save_Temp(Docid,ICompanyID,NoofPlates,BoardDescription,Company,Kind,GSM,Length,Breadth,FullSheetUps,FullSheets,Qty,PlateID,PaperID,ChangeID,Board_remarks,TrimSpace,Wastage,FullSHBeforeWastage,WastageSheets,DocNotion,boarddivfact)values" . $boarddetail;

            /* Foreach for cut borard detail start */
            $cut_value = '';

            foreach ($txt_bre as $key => $value) {
                $b = $value;
                $hdn_mothrrowvall = $hdn_mothrrowval[$key];
                $txt_optimizerval = $txt_optimizer[$key];
                $txt_lenval = $txt_len[$key];
                $txt_nval = $txt_n[$key];
                $txt_upsval = $txt_ups[$key];
                $txt_cutshval = $txt_cutsh[$key];
                $txt_wastageval = $txt_wastage[$key];
                $txt_graindisval = $txt_graindis[$key];
                // $txt_c_wastageperval= $txt_c_wastageper[$key];
                $txt_c_wastageshval = $txt_c_wastagesh[$key];
                $txt_c_shbeforewsval = $txt_c_shbeforews[$key];
                $hdn_mmvalcutval = $hdn_mmvalcut[$key];
                $wstgsheet = $txt_wastageval - $txt_c_shbeforewsval;
                $txt_c_wastageperval = $txt_wastageperval;
                if ($txt_c_wastageperval == '') {
                    $txt_c_wastageperval = 0;
                }
                if ($hdn_mmvalcutval == '') {
                    $hdn_mmvalcutval = 0;
                }if ($txt_c_wastageperval == '') {
                    $txt_c_wastageperval = 0;
                }
                $dcnotionval = $dcnotion;
                $cstrcut = "('" . $Docid . "','" . $ICompanyId . "','" . $b . "','" . $txt_lenval . "','" . $txt_nval . "', '" . $txt_upsval . "', '" . $txt_wastageval . "', '" . $txt_graindisval . "','" . $txt_c_wastageperval . "','" . $wstgsheet . "','" . $txt_c_shbeforewsval . "','" . $dcnotionval . "','" . $hdn_mmvalcutval . "'),";
                $cut_value = $cut_value . $cstrcut;
            }
            /* Foreach for cut borard detail end */
            $cutstring = substr_replace($cut_value, ";", -1);
            $cutdetail = "insert into item_CutDetails_save_temp(Docid,ICompanyID,B,L,N,UpsInCutSheet,TCutSheets,Grain,WastagePer,WastageSheets,SheetsBeforeWastage,DocNotion,boarddivfact)values" . $cutstring;

            $raw_value = '';
            foreach ($txt_rawmaterial as $key => $value) {
                $txt_rawmaterialval = $value;
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


                $cstraw = "('" . $docidset . "','" . $txt_rawmaterialval . "','" . $txt_Detailsval . "','" . $txt_apprxval . "', '" . $txt_otherdetailval . "', '" . $txt_unitval . "', '" . $txt_requestoccval . "', '" . $txt_materialstaval . "', '" . $txt_qtyallval . "', '" . $txt_imrval . "', '" . $txt_olditemidval . "', '" . $txt_olditemidval . "', '" . $txt_oldmatrialval . "', '" . $txt_recordidval . "', '" . $txt_allcatididval . "', '" . $txt_allocatmaterval . "', '" . $txt_Pridval . "', '" . $txt_processtaval . "', '" . $txt_Jobnoval . "', '" . $txt_codenoval . "', '" . $txt_gnameval . "','" . $dcnotionval . "'),";
                $raw_value = $raw_value . $cstraw;
            }
            /* Foreach for cut borard detail end */
            $raw_detail = substr_replace($raw_value, ";", -1);



            $raw_detail_insert = "insert into web_raw_save_detail(Docid,raw_material, Details, Approxqtyreq, Other_Detail,Unit, 
    ReqtoReserved,Material_status,Qty_allocated,Select_for_IMR,Old_Itmeid,Itmeid, 
    Old_Matieral,RecordId, AllocatedID,AllocatedRawMaterial,Prid,Process_Status,jobno,Code_No,Group_Name,DocNotion
    )values" . $raw_detail;
            /* Job card master */
            // 
            // $jobnew
            // echo $raw_detail_insert;
            // die();

            $jobcard_master = "update item_jobcardmaster set DocDate = '$txt_docdateval',Docnotion='$dcnotion',ICompanyID='$ICompanyId' ,MUID= '$AUID',MDateTime='$ADateTime',Processing='$drp_oldnew',Hold='$chk_holdval',Holdreason='$txt_hreas',CancelJob='$chk_cancleval',CancelReason='$txt_canreas',jclose='$chk_closeval',closedate='$txt_closedatejob',closeResaon='$txt_closereas',ItemDetails='',ProcessDetails='',EstComments='$txt_stmreamrks',JobDetails='$txt_jreamrks',JobKind='M',JobType='P',DocketUniqueID='$Docid',PlanStatus='0',ReasonOfShortQty='$txt_shortqtyreason',StockQty='$txt_fgstock',Reprint_Partial='$drp_shotqty' where DocID = '$docidset';";
            /* Job Card Master d */

            $jobcard_d = '';
            // print_r($txt_printqty);
            // die();
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
                $txt_fqtyvaldata = $txt_fqty[$key];
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
                }

                if ($key == 1) {
                    $majeritme = 1;
                } else {
                    $majeritme = 0;
                }
                if ($txt_printqtya == '') {
                    $txt_printqtyval = 0;
                } else {
                    $txt_printqtyval = $txt_printqtya;
                }
                $dcnotionval = $dcnotion;
                $drp_repeatjobval = $drp_repeatjob;
                $ICompanyIdval = $ICompanyId;
                $cstrijob = "('" . $docidset . "', '" . $clientidval . "', '" . $ICompanyIdval . "', '" . $woidval . "', '" . $itemidval . "','" . $txt_orderqtyval . "', '" . $txt_printqtyval . "', '" . $drp_repeatjobval . "', '" . $jobnoval . "', '" . $txt_fqtyvaldata . "','','','','2060-01-01','" . $majeritme . "','','','0','','0','0','" . $txt_specificationval . "','" . $txt_TotQtyDispatc . "','" . $txt_TotQtyProduc . "','" . $Docid . "','" . $dcnotionval . "','" . $txt_upsvalmaingrid . "','" . $txt_wsagreamrksperval . "','" . $drp_noyes . "'),";
                $jobcard_d = $jobcard_d . $cstrijob;
            }
            /* Foreach loop for ink detail end */
            $jobcadrdetail_d = substr_replace($jobcard_d, ";", -1);
            // echo $jobcadrdetail_d;
            // die();
            // Wastage,FilmNo,
            $jobcadrmaster_d = "insert into item_jobcardmaster_d(DocID,ClientID,ICompanyId,WOID,ItemID,OrdQty,JobQty,NewJob,JobNo,PrintQtyAfterWastage,
		FilmNo,DieNo,PlateNo,DilDate,MajorItem,ItemType,JobSpec,ProofApp,ShadeCardId,ProofJob,
		FullSh2Ups,SpecID,TotQtyDispatched,TotQtyProduced,MasterDocketUniqueID,DocNotion,UpsInCutSheet,Wastage,ShadeCard)values" . $jobcadrdetail_d;
            // echo $jobcadrmaster_d;
            // die();

            $jinfoval = "Update item_jinfo set RemDesign= '$txt_desinging',BFBS='$txt_bfbs',ShadeCard='$txt_reel',IcompanyId='$ICompanyId',OpenSize='$txt_jobopen',DocNotion='$dcnotion',RemScanning='$txt_margins',RemPlanning='$rempasting' ,RemDelivery='$RemDelivery',ChkListNo='$ChkListNo',PastProblems='$PastProblems',RemPrintLine='$RemPrintLine' where DocID ='$docidset';";



            /* Corrugation string start */
            $corrpid = $this->input->post('txt_ppid');
            $corrfluteid = $this->input->post('txt_ppfluteid');
            $corritemid = $this->input->post('txt_ppitemidp');
            $corrflutedesc = $this->input->post('txt_pflutedesc');
            $corrkraftdesc = $this->input->post('txt_pkraftdesc');
            $corrdeclinefact = $this->input->post('txt_pdeclinefact');
            $corrgsm = $this->input->post('txt_ppgsm');
            $corrkgreq = $this->input->post('txt_pkgreq');
            $corrfact = $this->input->post('txt_ppfact');
            $corrextracons = $this->input->post('txt_pextracons');
            /* Corrugation string end */

            $corrugation_value = '';
            foreach ($corrpid as $key => $value) {
                $corrpidval = $value;
                $corrfluteidval = $corrfluteid[$key];
                $corritemidval = $corritemid[$key];
                $corrflutedescval = $corrflutedesc[$key];
                $corrkraftdescval = $corrkraftdesc[$key];
                $corrdeclinefactval = $corrdeclinefact[$key];
                $corrgsmval = $corrgsm[$key];
                $corrkgreqval = $corrkgreq[$key];
                $corrfactval = $corrfact[$key];
                $corrextraconsval = $corrextracons[$key];
                $dcnotionval = $dcnotion;
                if ($corrkgreqval != '') {
                    $corrstring = "('" . $corrpidval . "','" . $corrfluteidval . "', '" . $corritemidval . "', '" . $corrflutedescval . "','" . $corrkraftdescval . "','" . $corrdeclinefactval . "','" . $corrgsmval . "','" . $corrkgreqval . "','" . $corrfactval . "','" . $corrextraconsval . "','" . $dcnotionval . "'),";

                    $corrugation_value = $corrugation_value . $corrstring;
                } else {
                    $corrugation_value = ';';
                }
            }
            $corrugationval = substr_replace($corrugation_value, ";", -1);

            if ($corrugationval != '' && $corrugationval != ';') {
                $corrugation = "insert into Web_PlyDetails_save_temp(DocID,FluteID,ItemID,FluteDesc,KraftDesc,DeclineFact,GSM,KgReq,Cfact,ExtraConsump,DocNotion)values" . $corrugationval;
            } else {
                $corrugation = '';
            }

            foreach ($txt_lotno as $key => $value) {
                $txt_lotnoval = $value;
                $txt_mfgdateval = $txt_mfgdate[$key];
                $txt_qtylotval = $txt_qtylot[$key];
                $txt_cutsheetlotval = $txt_cutsheetlot[$key];
                $txt_upslotval = $txt_upslot[$key];
                $Mrplotval = $Mrplot[$key];
                $hdn_srnoval = $hdn_srno[$key];
                $this->db->query("update lot_detail set CutSHReq ='$txt_cutsheetlotval',ups_lot='$txt_upslotval' where Qty='$txt_qtylotval' and 
        lotno ='$txt_lotnoval' and MfgDate = '$txt_mfgdateval' and Mrplot = '$Mrplotval' and Srno = '$hdn_srnoval';");
            }


            $this->load->model('Production/Mod_jobcard');
            $hidden_opt = $this->input->post('hidden_opt');
            $hidden_opt_reason = $this->input->post('hidden_opt_reason');
            $hdn_flag = $this->input->post('hdn_flag');
            $txtdocdateval = $this->input->post('txtdocdateval');
            $query_mail = $this->db->query("SELECT * FROM otp_mail WHERE ID=1");
            $data = $this->Mod_jobcard->otpissue($docidset);

            // if ($query_mail->num_rows() > 0) {
            //     $result_full = $query_mail->result();
            //     $result = $result_full[0];
            //         if ($hdn_flag == 1) {
            //             if($docidset != '' && $data[0]->Issue_status != 0){
            //             $otplog['docid']=$docidset;
            //             $otplog['Transactiontype'] = $result->Transtype;
            //             $otplog['userid'] = $AUID;
            //             $otplog['entrydate'] = date('Y-m-d H:i:s');
            //             $otplog['otp'] = $hidden_opt;
            //             $otplog['otpreason'] = $hidden_opt_reason;
            //             $otplog['mailid'] = $result->mailid;

            //                 $this->db->insert('item_otp_log', $otplog);
            //             }
            //         }
            // }

            $manualjc = 0;
            $Main_temp = $this->Mod_jobcard->Savedataval($jobcard_master, $jobcadrmaster_d, $boarddetailinsert, $cutdetail, $processdetail, $inkquery, $raw_detail_insert, $jinfoval, $corrugation, $jobnew, $jobnofirst, $Docid, $ICompanyId, $docidset, $manualjc, $dcnotion);

            $ErrorMessege1 = $Main_temp[0]->abc;
            if ($ErrorMessege1 == 'Record  saved.') {
                $ErrorMessege = $Main_temp[0]->def;
                $ErrorMessege2 = $Main_temp[0]->docnotion;
//                $jobcardno = $ErrorMessege;
//                $jobtype = 'Old';
//                $data['data'] = $this->Mod_jobcard->pageloadOld($jobcardno, $jobtype);
//                $data['Neworold'] = 'Old'; // $this->input->post('hdn_jobnew');
//                $data['docid'] = $jobcardno;
//                $data['docnotionval'] = $ErrorMessege2;

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
                $ErrorMessege1 = $Main_temp[0]->abc;
                echo "<head><script>
                 alert('" . $ErrorMessege1 . "');
                  </script></head>";
                
                $gly = "<span class='fa fa-exclamation-circle'></span>";
                $this->session->set_flashdata("error_msg", $gly . " Error occured while updation - ". $ErrorMessege1);
                redirect('Production/Jobsearch');
                // redirect('pendingJobcard?ICompanyID='.$ICompanyId.'&userid='.$AUID.'',$data);
            }
        }
    }

}
