<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JobCardColse extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Production/Mod_JobCardColse');
    }

    public function index() {
        $data["title"] = "JobCard Closing";
        $data['variable'] = $this->input->get('type', TRUE);
        $data['template'] = 'production/View_jobcard_close';
        $this->load->view('templates/template', $data);
    }

    public function bindproduct() {
        $fromdate = $this->input->post("fromdate");
        $todate = $this->input->post("todate");
        $type = $this->input->post("type");
        $data = $this->Mod_JobCardColse->saleregisterdata($fromdate, $todate, $type);
        $html = "";
        if (!empty($data)) {
            $a = 0;
            foreach ($data as $key => $value) {
                if ($value->jclose == 1 || $value->jclose == 2 || $value->jclose == 3) {
                    $IsActive = "checked='checked'";
                } else {
                    $IsActive = "";
                }
                $html .= "<tr>
                    <td nowrap id='WOID'>" . $value->docid . "<input type='hidden' name='hdn_DOCID[" . $a . "]' id='hdn_DOCID[" . $a . "]' value='" . $value->docid . "'>
                                                             <input type='hidden' name='hdn_JobNo[" . $a . "]' id='hdn_JobNo[" . $a . "]' value='" . $value->jobno . "'></td>
                    <td nowrap id='docdate'>" . $value->docdate . "</td>
                    <td nowrap id='jobno'>" . $value->jobno . "</td>
                    <td nowrap id='iprefix'>" . $value->iprefix . "</td>
                    <td nowrap id='description'>" . $value->description . "</td>
                    <td nowrap id='jobqty'>" . $value->jobqty . "</td>
                    <td nowrap id='totqtyproduced'>" . $value->totqtyproduced . "</td>
                    <td nowrap id='totqtydispatched' onclick=\"showdespatch('" . $value->docid . "');\" style='cursor:pointer'>" . $value->totqtydispatched . "</td>
                    <td nowrap id='jclose' style='text-align: center;'>
                    <input type='hidden' name='hdn_flag[" . $a . "]' id='hdn_flag[" . $a . "]' value='0'>
                    <input type='checkbox' id='chkk[" . $a . "]' onclick='return changeflag(" . $a . ");' name='chkk[" . $a . "]' " . $IsActive . " style='padding: 7px;'>
                    </td>
                    <td nowrap id='balanceQty'>" . $value->closedate . "</td>
                    <td nowrap id='CloseReason'><input type='text' id='CloseReas[" . $a . "]' class='form-control controlmy' name='CloseReas[" . $a . "]' value='" . $value->closeResaon . "' style='border:none'></td>
                    <td nowrap id='balanceval'>" . $value->woid . "</td>
                    <td nowrap id='CompanyName'>" . $value->companyname . "</td>
                    <td nowrap id='ArtWorkNumber'>" . $value->blanceproduceqty . "</td>
                    <td nowrap id='ArtWorkNumber'>" . $value->balancedispatchqty . "</td>
                </tr>";
                $a++;
            }
        }
        echo json_encode($html);
    }

    function save() {
//        if (!$this->UserPerm("User", "modify", "82")) {
//            $gly = "<span class='fa fa-exclamation-circle'></span>";
//            $this->session->set_flashdata("error_msg", $gly . " You do not have permission to modify Work order Closing ..!");
//            redirect("Dashboard");
//        }

        $hdn_DOCID = $this->input->post('hdn_DOCID');
        //    $hdn_JobNo = $this->input->post('hdn_JobNo');
        $CloseReas = $this->input->post('CloseReas');
        $chkk = $this->input->post('chkk');
        $hdn_flag = $this->input->post('hdn_flag');
        $hdn_type = $this->input->post('hdn_type');


        $this->db->trans_start();
        if (!empty($hdn_DOCID)) {
            foreach ($hdn_DOCID as $key => $value) {
                $DOCID_val = $value;
                $CloseReason_val = $CloseReas[$key];
                $flag = $hdn_flag[$key];
                if ($flag == 1) {
                    if (isset($chkk[$key])) {
                        $data["closeResaon"] = $CloseReason_val;
                        $data["closedate"] = date("Y-m-d");
                        $data["jclose"] = $hdn_type;
                        print_r($data);
                        $this->db->where('docid', $DOCID_val);
                        $this->db->update('item_jobcardmaster', $data);

                        $this->db->query("call Cr_remove_allocation_from_jobcard_close('$DOCID_val','$this->company_id');");
                        $this->db->query("call CR_insert_into_group_rmcost('$DOCID_val','');");
                    } else {
                        $data["closeResaon"] = '';
                        $data["closedate"] = '';
                        $data["jclose"] = 0;
                        print_r($data);
                        $this->db->where('docid', $DOCID_val);
                        $this->db->update('item_jobcardmaster', $data);

                        $this->db->query("call Cr_remove_allocation_from_jobcard_close('$DOCID_val','$this->company_id');");
                        $this->db->query("call CR_insert_into_group_rmcost('$DOCID_val','');");
                    }
                }
            }
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $gly = "<span class='fa fa-exclamation-circle'></span>";
            $this->session->set_flashdata("error_msg", $gly . " Error in JobCard Closing try again !!");
            echo "False";
        } else {
            echo "true";
            $gly = "<span class='fa fa-check-circle'></span>";
            $this->session->set_flashdata("success_msg", $gly . "  JobCard Closing updated successfully !!");
        }

        redirect('Production/JobCardColse?type=' . $hdn_type);
    }

    function binddetail() {
        $DOCID = $this->input->post('DOCID');
        $query = $this->database->get_query("select concat(b.docid,' - ',date_format(b.docdate,'%d-%m-%Y'),' - ',a.Quantity)as Datastring 
        from item_chdetail as a,item_chmaster as b where a.docid=b.docid and chdisplay='$DOCID';");
        echo json_encode($query);
    }

}
