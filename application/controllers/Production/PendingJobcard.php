<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PendingJobcard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {

        $job = 3;
        $userid = $this->user_id;
        $icompanyid = $this->company_id;
        
        $first = "2017-04-01";
        $last = date("Y-m-d");

        $data['userper'] = $this->database->get_query("select * from JC_Permissions where userid='$userid' limit 1;");
        $data['datahtml'] = $this->databinding($icompanyid, $first, $last, $job, $userid);
        $data['Icompanyid'] = $icompanyid;
        $data['userid'] = $userid;

        $data["title"] = "Pending Jobcard";
        $data['template'] = 'production/pendingJobcard_view';
        $this->load->view('templates/template', $data);
    }

    public function showtotaldocket() {
        $this->load->model('Production/Mod_pendingjobcard','modell');
        $hdn_itemid = $this->input->post('hdn_itemid');
       
        $result = $this->modell->docket($hdn_itemid);
        echo json_encode($result);
        
    } 

    public function showgrid() {
        $job = $this->input->post('job');
        $userid = $this->user_id;
        $icompanyid = $this->company_id;
        
        $first = "2017-01-01";
        $last = date("Y-m-d");
        
        $result = $this->databinding($icompanyid, $first, $last, $job, $userid);
        echo json_encode($result);
        
    }    
    
    public function databinding($icompanyid, $first, $last, $job ,$userid) {
        $this->load->model('Production/Mod_pendingjobcard','modell');
        
        $data = $this->modell->index($icompanyid, $first, $last, $job, $userid);
        
        $html = "";
        if (!empty($data)) {
            $i = 1;
            $Icompanyid = $this->company_id;
            $userid = $this->user_id;
            $data1 = $data['userper'];
            $griddata = $data['maindata'];
            foreach ($data1 as $key => $value) {
                $saveper = $value->save_perm;
        
            foreach ($griddata as $key => $value) {
                if ($value->SpecAvl == '1') {
                    $style = 'background-color:#fff;';
                } else {
                    $style = 'background-color:#780000; color:white';
                }
                if ($value->CP == 'C') {
                    $style2 = 'background-color: yellow;';
                } elseif ($value->CP == 'P') {
                    $style2 = 'background-color: #8699e8;';
                } else {
                    $style2 = "";
                }
                if($value->TotJobcardQty != '0.00000'){
                    $tdcolor1 = 'background-color:white;';
                }else{
                    $tdcolor1= 'background-color:white;'; 
                }
                    if ($saveper == 1) { 
                        $openjc = " onclick=\"return openjobcard(". $i .")\" ";
                    } else { 
                        $openjc = " ";
                    }
                
                $html .= '<tr '.$openjc.'>
                    <td hidden>'. $value->ItemID .'</td>
                    <td hidden>'. $value->SpecID .'</td>
                    <td style="'. $style .'">
                        <input type="hidden" name="hdn_icompanyid" id="hdn_icompanyid" value="'. $Icompanyid .'">
                        <input type="hidden" name="hdn_uid" id="hdn_uid" value="'. $userid .'">
                        <input type="hidden" name="hdn_docnotion'. $i .'" id="hdn_docnotion'. $i .'" value="'. $value->DocNotion .'">
                        <input type="hidden" name="hdn_itemid'. $i .'" id="hdn_itemid'. $i .'" value="'. $value->ItemID .'">
                        '. $value->WOID .'</td>
                        <td>'. $value->PONO .'</td>
                    <td>'. $value->JobNo .' <input type="hidden" name="hdn_jobno'. $i .'" id="hdn_jobno'. $i .'" value="'. $value->JobNo .'">
                    <td style='.$tdcolor1.'>'. $value->ProductName .'</td>
                    <td style="'. $style2 .'">
                        <input type="hidden" id="hdn_cp'. $i .'" name="hdn_cp'. $i .'" value="'. $value->CP .'">
                        '. $value->MiSCodeNo .'
                    </td>
                    <td>'. $value->ClientProductCodeNo .'</td>
                    <td>'. $value->Quantity .'</td>
                    <td>'. $value->TotJobcardQty .'</td>
                    <td>'. $value->EstimateNo .'</td>
                    <td>'. $value->WODate .'</td>
                    <td hidden>'. $value->DeliveryRequiredDate .'</td>
                    <td>'. $value->CustomerName .'</td>
                    <td>'. $value->ArtWorkCode .'</td>

                    </td>
                    <td>'. $value->Remarks .'</td>
                </tr>';
                $i++;
            }
          }
        }
        return $html;
    }
    
    public function showsearch() {
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
        
        $result = $this->datasearchjob($icompanyid, $first, $last, $filter,$userid);
        echo json_encode($result);
        
    }
    
    public function datasearchjob($icompanyid, $first, $last, $filter,$userid) {
        $this->load->model('Production/Mod_pendingjobcard','modell');

        
        $data = $this->modell->searchjobdata($icompanyid, $first, $last, $filter,$userid);
        
        $html = "";
        if (!empty($data)) {
            $i = 1;
            $Icompanyid = $this->company_id;
            $userid = $this->user_id;
            $data1 = $data['userper'];
            $griddata = $data['maindata'];
            foreach ($data1 as $key => $value) {
                $saveper = $value->save_perm;
        
            foreach ($griddata as $key => $value) {
                if ($value->SpecAvl == '1') {
                    $style = 'background-color:#fff;';
                } else {
                    $style = 'background-color:#780000; color:white';
                }
                if ($value->CP == 'C') {
                    $style2 = 'background-color: white;';
                } elseif ($value->CP == 'P') {
                    $style2 = 'background-color: #8699e8;';
                } else {
                    $style2 = "";
                }
                if($value->TotJobcardQty != '0.00000'){
                    $tdcolor1 = 'background-color:white;';
                }else{
                    $tdcolor1= 'background-color:white;'; 
                }
                    if ($saveper == 1) { 
                        $openjc = " onclick=\"return openjobcard(". $i .")\" ";
                    } else { 
                        $openjc = " ";
                    }
                
                $html .= '<tr '.$openjc.'>
                
                    <td hidden>'. $value->ItemID .'</td>
                    <td hidden>'. $value->SpecID .'</td>
                    <td style="'. $style .'">
                        <input type="hidden" name="hdn_icompanyid" id="hdn_icompanyid" value="'. $Icompanyid .'">
                        <input type="hidden" name="hdn_uid" id="hdn_uid" value="'. $userid .'">
                        <input type="hidden" name="hdn_docnotion'. $i .'" id="hdn_docnotion'. $i .'" value="'. $value->DocNotion .'">
                        <input type="hidden" name="hdn_itemid'. $i .'" id="hdn_itemid'. $i .'" value="'. $value->ItemID .'">
                        '. $value->WOID .'</td>
                        <td>'. $value->PONO .'</td>
                    <td>'. $value->JobNo .' <input type="hidden" name="hdn_jobno'. $i .'" id="hdn_jobno'. $i .'" value="'. $value->JobNo .'">
                    <td style='.$tdcolor1.'>'. $value->ProductName .'</td>
                    <td style="'. $style2 .'">
                        <input type="hidden" id="hdn_cp'. $i .'" name="hdn_cp'. $i .'" value="'. $value->CP .'">
                        '. $value->MiSCodeNo .'
                    </td>
                    <td>'. $value->ClientProductCodeNo .'</td>
                    <td>'. $value->Quantity .'</td>
                    <td>'. $value->TotJobcardQty .'</td>
                    <td>'. $value->EstimateNo .'</td>
                    <td>'. $value->WODate .'</td>
                    <td hidden>'. $value->DeliveryRequiredDate .'</td>
                    <td>'. $value->CustomerName .'</td>
                    <td>'. $value->ArtWorkCode .'</td>

                    </td>
                    <td>'. $value->Remarks .'</td>
                </tr>';
                $i++;
            }
          }
        }
        return $html;
    }

}
