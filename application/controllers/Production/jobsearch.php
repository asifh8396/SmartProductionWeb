<?php

class Jobsearch extends MY_Controller {

    public function index() {
        
        $userid = $this->user_id;
        // print_r($userid);die;
        $icomapyid = $this->company_id;

        $data['userper'] = $this->database->get_query("select * from JC_Permissions where userid='$userid' limit 1;");
        
        $data['data'] = $this->bindingdata(Docnotion(),'100','','','','Fin');
        $data['Icompanyid'] = $icomapyid;
        $data['userid'] = $userid;
        
        
        $data["title"] = "Jobcard Search";
        $data['template'] = 'production/jobsearch_view';
        $this->load->view('templates/template', $data);
    }

    public function deletedata(){
        $this->load->model('Production/Mod_jobsearch');
        $docid = $this->input->post('docid');
        $data = $this->Mod_jobsearch->deleteissue($docid);
        echo json_encode($data);
        // echo $data;
    }

    public function showgrid() {
        $sessionarry = $this->session->userdata('form_data');
        $userid = $sessionarry['userid'];
        $icomapyid = $this->input->post('icompanyid');
        $drpdoc = $this->input->post('drp_docnotion');
        $drp_limit = $this->input->post('drp_limit');
        $JSType = $this->input->post('JSType');

        $result = $this->bindingdata($drpdoc,$drp_limit,'','','',$JSType);
        echo json_encode($result);
    }
    
    public function showlikegrid() {
        $docid = $this->input->post('docid');
        $iprefix = $this->input->post('iprefix');
        $description = $this->input->post('description');
        $drpdoc = $this->input->post('drp_docnotion');
        $drp_limit = $this->input->post('drp_limit');
        $JSType = $this->input->post('JSType');
        
        $result = $this->bindingdata($drpdoc, $drp_limit, $docid, $iprefix, $description, $JSType);
        echo json_encode($result);
    }

    public function Deletejob() {
        $icomapyid = $this->input->post('icompanyid');
        $docid = $this->input->post('docid');
        $docnotion = $this->input->post('docnotion');
        $JSType = $this->input->post('JSType');
        
        $this->load->model('Production/Mod_jobsearch');
        $result = $this->Mod_jobsearch->deleteJobcard($docid);
        
        echo json_encode($result);
    }

    public function productattachment() {
        $jobno = $this->input->post('jobno');
        $this->load->model('Production/Mod_jobsearch');
        $temp = $this->Mod_jobsearch->showattach($jobno);
        $attachfile = json_encode($temp);
        echo $attachfile;
    }

    public function createwo() {
        $this->load->model('Production/Mod_jobsearch');
        $temp = $this->Mod_jobsearch->createwo();
        $Itemlist = json_encode($temp);
        echo $Itemlist;
    }

    public function createwocom() {
        $woid = $this->input->post('woid');
        $jobno = $this->input->post('hdn_jobcard');
        $itemid = $this->input->post('itemid');
        $this->load->model('Production/Mod_jobsearch');
        $temp = $this->Mod_jobsearch->createwocom($woid, $jobno, $itemid);
        //$Itemlist = json_encode($temp);
        echo $temp;
    }

    public function downloadfile() {
        // echo "Asif";
        $filename = $this->input->post('hdn_filename');
        // print_r($filename);die;
        $file = "C:\Program Files (x86)\Smart MIS NV5\ProductImageExtra\\".$filename;
        // $file = str_replace('#', '', $file1);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    public function create_auto_imr() {
        $sessionarry = $this->session->userdata('form_data');
        $icomapyid = $this->input->post('icompanyid');
        $drpdoc = $this->input->post('drp_docnotion');
        $docid = $this->input->post('docid');
        $this->db->query("call Create_auto_imr('$docid','$icomapyid',$drpdoc,@out)");
    }
    
    function bindingdata($drpdoc, $limit, $PDocid, $Piprefix, $Pdescrip, $JSType) {
        $icompanyid = $this->company_id;
        $userid = $this->user_id;
        $this->load->model('Production/Mod_jobsearch');
        $data = $this->Mod_jobsearch->pageloaddata($icompanyid, $userid, $drpdoc, $limit, $PDocid, $Piprefix, $Pdescrip, $JSType);
        
        $html = "";
        if (! empty($data)) {

            $data1 = $data['userper'];
            $griddata = $data['maindata'];
            $i = 1;
            $Icompanyid = $icompanyid;
            $userid = $userid;
            
            foreach ($data1 as $key => $value) {
                $saveper = $value->save_perm;
                $deletper = $value->delete_perm;
                $updatper = $value->update_perm;
                $printper = $value->print;

                foreach ($griddata as $key => $value) {
                    
                    $JobStatus = $value->JobStatus;
                    if($JobStatus == "Job Cancelled" || $JobStatus == "Job Hold") {
                        $jsts_color = 'background-color:red;';
                    } else {
                        $jsts_color = 'background-color:#f39c12;';
                    }
                    
                    $JobType = $value->JobType;
                    if($JobType == "C"){
                            $jobt = "Jobcard_printout_comm";
                            $jcomm = "CommPackingSlip";
                    } else {
                            $jobt = "Jobcard_printout";
                            $jcomm = "PackingSlip";
                    }
                    
                    if ($updatper == 1) { 
                        $openjc = " onclick=\"return openjobcard(". $i .", '". $JobType ."')\" ";
                    } else { 
                        $openjc = " ";
                    }
                    // <a id='a_autoimr' onclick='return autoimr(". $i .");'>Create IMR</a>
                    
                    $html .="<tr>";
                       if ($printper == 1) { 
                           $html .= "<td>
                                <a target='_blank' href='".site_url()."Production/". $jobt ."?hdn_docid=". $value->DocID ."&Icompanyid=". $Icompanyid ."' class='button'>Print</a>
                                <a target='_blank' href='".site_url()."Production/". $jcomm ."?hdn_docid=". $value->DocID ."&JobType=". $JobType ."&Icompanyid=". $Icompanyid ."' class='button'>CuttingSlip</a>
                            </td>";
                        }
                        $html .= "<td>
                            <input type='hidden' name='hdn_icompanyid' id='hdn_icompanyid' value='". $Icompanyid ."'>
                            <input type='hidden' name='hdn_uid' id='hdn_uid' value='". $userid ."'>
                            <input type='hidden' name='txt_uniquerjcno' id='txt_uniquerjcno' value='". $value->DocID ."'>
                            <input type='hidden' name='hdn_docid[". $i ."]' id='hdn_docid[". $i ."]' value='". $value->DocID ."'>
                            <input type='hidden' name='hdn_jobnno[". $i ."]' id='hdn_jobnno[". $i ."]' value='". $value->JobNo ."'>
                            <input type='hidden' name='hdn_clientid[". $i ."]' id='hdn_clientid[". $i ."]'>
                            <input type='hidden' name='hdn_woid". $i ."' id='hdn_woid". $i ."' value='". $value->WOID ."'>
                            <a href='#' name='btn_attachment(". $i .");' id='btn_attachment(". $i .");' onclick='return showopenattach(". $i .");' data-toggle='modal' data-target='#myModaldata'>Show Attachmnts</a>
                        </td>
                        <td>
                            <a href='#' name='btn_vendoremail(". $i .");' id='btn_vendoremail(". $i .");' class='button' onclick='return showosvendor(". $i .");'>Show</a>
                        </td>
                        <td style ='cursor: pointer;white-space: nowrap;' ". $openjc ." >". $value->DocID ."</td>
                        <td>". $value->DocDate ."</td>
                        <td style ='cursor: pointer;' ". $openjc ." >". $value->WOID ."</td>

                        <td>". $value->Product ."</td>
                        <td style='". $jsts_color ."'>". $value->JobStatus ."</td>
                        <td>". $value->iprefix ."</td>
                        <td>". $value->AccCode ."</td>
                        <td>". $value->PONO ."</td>

                        <td>". $value->Jobqty ."</td>
                        <td>". $value->wodate ."</td>
                        <td>". $value->TotQtyDispatched ."</td>
                        <td hidden>". $value->lastDespatchdate ."</td>

                        <td>". $value->CompanyName ."</td>";
                        if ($deletper == 1) { 
                            $html .= "<td>
                                <center><a onclick='return DeleteRowmain(". $i .");' class='btn btn-danger btn-xs' style='padding: 0px 5px;'><i class='fa fa-trash'></i></a></center>
                            </td>";
                        }
                    $html .= "</tr>";
                    
                    $i++;
                }
            }
        }
        return $html;
    }
    
    public function showosvendor() {
        $docid = $this->input->post('docid');
        $this->load->model('Production/Mod_jobsearch');
        $result = $this->Mod_jobsearch->showosvendor($docid);
        $jsonData = json_encode($result);
        echo $jsonData;
    }

    public function vendoremaildata() {
        $vendorid = $this->input->post("vendorid");
        $docid = $this->input->post("docid");
        $icompanyid = $this->input->post("icompanyid");

        $this->load->model('Production/Mod_jobsearch');
        $result = $this->Mod_jobsearch->showosvendor($docid);

        $html = "<table id='maildatatable' style='font-size:12px;border:none;' cellspacing='0' cellpadding=''><tbody>";

        $sql = "CALL Comm_Jobcard_Print_Out_OB('$docid','$icompanyid','$vendorid');";
        $arr = $this->Mod_jobsearch->emailquery($sql);
        // $jsonData = json_encode($arr);
        // echo $jsonData;
        $trid = 1;
        $tdid = 11;
        foreach ($arr as $key => $value) {
            $html .= "<tr id='$trid'>";
            $html .= "<td hidden><input type='text' id='label1[$trid]' name='label1[$trid]' value='$value->Label1' style='width:110px;border:0.2px dotted #eee;'></td>";
            $html .= "<td><input type='text' id='ProcessDetails1[$trid]' name='ProcessDetails1[$trid]' value='$value->ProcessDetails1' style='width:900px;border:0.2px dotted #eee;'></td>";
            $html .= "<td hidden><input type='text' id='FormDetails[$trid]' name='FormDetails[$trid]' value='$value->FormDetails' style='width:110px;border:0.2px dotted #eee;'></td>";
            $html .= "</tr>";

            $trid++;
        }
        $trid++;
        for ($i=0; $i < 2; $i++) { 
            
            $html .= "<tr id='$trid'>";
            $html .= "<td hidden><input type='text' id='label1[$trid]' name='label1[$trid]' value='' style='width:110px; border:0.2px dotted #eee;'></td>";
            $html .= "<td><input type='text' id='ProcessDetails1[$trid]' name='ProcessDetails1[$trid]' value='' style='width:900px; border:0.2px dotted #eee;'></td>";
            $html .= "<td hidden><input type='text' id='FormDetails[$trid]' name='FormDetails[$trid]' value='' style='width:110px; border:0.2px dotted #eee;'></td>";
            $html .= "</tr>";
            $trid++;
        }
        
        $html .= "</tbody></table>";
        $html .= "<hr style='color:#000;border-bottom: 1px solid;'>";
        $html .= "<textarea hidden id='ta_maildata' name='ta_maildata' style='width: 900px;height: 150px;'></textarea>";


        echo $html;
    }

    /* Mail Vendor function Start */

    public function email_vendor() {
        echo "Behlah";die;
        $this->load->library('mailerClass/SmtpMailer');

        $jobname = $this->input->post("pop2jobname");
        $emailid = $this->input->post("emailid");
        $emailid = preg_replace('/\s+/', '', $emailid);
        
        $youremailid = $this->input->post("youremailid");
        $youremailpass = $this->input->post("youremailpass");

        
        $query_mail = $this->db->query("SELECT * FROM quotemail WHERE ID=7 AND isactive=1");
        if ($query_mail->num_rows() > 0) {
            $result_full = $query_mail->result();
            $result = $result_full[0];
        } else {
            echo "Mail Not Sent no email ids found";
            die;
        }

        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = $result->SenderEmailId; // Your gmail id
        $config['smtp_pass'] = $result->SenderEmailPwd; // Your gmail Password
        // $config['smtp_user'] = 'info@renukasoftec.com'; // Your gmail id
        // $config['smtp_pass'] = 'info1001'; // Your gmail Password
        $config['smtp_port'] = 465;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";

        $this->email->initialize($config);

        // $this->email->from($result->SenderEmailId, 'Rich Offset Bhillad');
        // $this->email->to($result->ReciverEmailIDs);
        // $this->email->cc($result->ReciverEmailIDs);

        $this->email->from($result->SenderEmailId, 'Job OutSource');
        $this->email->to($emailid);

        $this->email->subject("Job Details : (".$jobname.")");

        $messege = $this->mail_body_vendor();
        //$message = '';
        $this->email->message($messege);
        $this->email->send();

        echo "<script type='text/javascript'>alert('Mail Sent');window.close();</script>";
    }

    function mail_body_vendor() {

        $jobname = $this->input->post("pop2jobname");
        $clientname = $this->input->post("pop2clientname");
        $docid = $this->input->post("pop2docid");
        $vendorname = $this->input->post("pop2vendorname");
        $label1 = $this->input->post("label1");
        $ProcessDetails1 = $this->input->post("ProcessDetails1");
        $FormDetails = $this->input->post("FormDetails");
        $ta_maildata = $this->input->post("ta_maildata");
        //print_r($label1);
        //die;

        $html = "<h4>Dear Sir/Madam,</h4>";
        $html .= "<h4>Greetings !!</h4>";
        $html .= "<h4>Please find Job Details Below</h4>";
        $html .= "<h3>Client Name : ".$clientname."</h3>";
        $html .= "<h3>Job Name : ".$jobname."</h3><br>";
        $html .= "<h3>Docket No : ".$docid."</h3><br>";

        $html .= "<table><tbody>";

        foreach ($label1 as $key => $value) {
            $ProcessDetails1val = $ProcessDetails1[$key];
            $FormDetailsval = $FormDetails[$key];

            // $html .= "<tr><td>$value</td><td>$ProcessDetails1val</td><td>$FormDetailsval</td></tr>";
            $html .= "<tr><td>$ProcessDetails1val</td></tr>";

        }
        $html .= "</tbody></table>";
        $html .= "<div style='font-size:15px;'>$ta_maildata</div>";

        $html .= "<br><br><br>";
//        $html .= "Regards ,<br>Nived / Sagar<br><br>";
//        $html .= "--<br>Nived Shetty / Sagar | External Coordinator| PrintStop India Pvt Ltd.<br>E: external@printstop.co.in | O: + 91 22 42705033 | M: 99879 83666 / 88796 88291 | W: www.printstop.co.in";
        //echo $html;
        return $html;
    }

    /* Mail Vendor function end */

}
