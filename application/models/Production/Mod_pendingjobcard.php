<?php
class Mod_pendingjobcard extends CI_Model {
    public function index($icompanyid,$first,$last,$job,$userid) {
        $userper = $this->db->query("select * from JC_Permissions where userid='$userid' limit 1;");
    	$this->db->query("call insert_into_WOdetail_temp('$icompanyid','$first','$last',$job);");
        $query = $this->db->query("select SpecAvl,ItemID,SpecID,DocNotion,CP,WOID,ProductName,MiSCodeNo,ClientProductCodeNo,Quantity,EstimateNo,
        	date_format(WODate,'%d-%m-%Y') as WODate,DeliveryRequiredDate,CustomerName,ArtWorkCode,JobNo,Remarks,PONO,TotJobcardQty from item_wodetail_temp ;");
        $result = $query->result();
        $result1 = $userper->result();
        return array('maindata' => $result, 'userper' => $result1);
    }

    public function searchjobdata($icompanyid,$first,$last,$filter,$userid) {
        $userper = $this->db->query("select * from JC_Permissions where userid='$userid' limit 1;");
    	$this->db->query("call insert_into_WOdetail_temp('$icompanyid','$first','$last','4');");
        $query = $this->db->query("select SpecAvl,ItemID,SpecID,DocNotion,CP,WOID,ProductName,MiSCodeNo,ClientProductCodeNo,Quantity,EstimateNo,
        	date_format(WODate,'%d-%m-%Y') as WODate,DeliveryRequiredDate,CustomerName,ArtWorkCode,JobNo,Remarks,PONO,TotJobcardQty from item_wodetail_temp where $filter;");
        $result = $query->result();
        $result1 = $userper->result();
        return array('maindata' => $result, 'userper' => $result1);
    }

    public function docket($hdn_itemid) {
        $query = $this->db->query("select Get_NumberOfOpen_JobDocket('$hdn_itemid') as TotalDocket;");
        return extract_query($query);
    }

}
