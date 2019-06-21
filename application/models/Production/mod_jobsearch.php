<?php

class Mod_jobsearch extends CI_Model {

    public function pageloaddata($icomapyid, $userid, $docnotion, $drp_limit, $PDocid, $Piprefix, $Pdescrip, $JSType) {
        $userper = $this->db->query("select * from JC_Permissions where userid='$userid' limit 1;");
        $prod = "call WEB_JC_JOBCARD_SEARCH('". $icomapyid ."','". $drp_limit ."','". $docnotion ."', '". $PDocid ."','". $Piprefix ."','". $Pdescrip ."','". $JSType ."');";
//        echo $prod;die;
        $query = $this->db->query($prod);
        $result = $query->result();
        $result1 = $userper->result();
        return array('maindata' => $result, 'userper' => $result1);
        
    }

    public function deleteissue($docid) {
        $query = $this->db->query("select WEB_JC_Deletion_Validation('$docid') as delete_validation");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function deleteJobcard($docid) {
        $this->db->query("call Delete_jobcard('$docid')");
        return true;
    }

    public function showattach($jobno) {
        $query1 = $this->db->query("select concat(FileName,FileFormat) as Filename,SavedInPath from fp_attachments where productid=(select itemid from item_wodetail where jobno='$jobno')");
        $result = $query1->result();
        return $result;
    }

    public function createwo() {
        $query1 = $this->db->query("select ProductID,Description,Iprefix from item_fpmasterext where ProductID <> ''  order by Description;");
        $result = $query1->result();
        return $result;
    }

    public function createwocom($woid, $jobno, $itemid) {
        $q = $this->db->query("call 030913_AddlComponent_AutoWOEntry('" . $woid . "','" . $jobno . "','" . $itemid . "',@c)");
        $res = $this->db->query("SELECT @c");
        return $result1 = $res->result();
    }
    
    public function showosvendor($docid) {
        $query = $this->db->query("SELECT a.Component, a.FormNo, a.PlateNo, b.CompanyId,b.CompanyName from item_jplanning as a, item_osvendor as b 
            where a.RecordID = b.CompanyId and a.PExecution = 3.00 AND a.DocID = '$docid' group by a.RecordID;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {        
            return false;
        }
    }

    public function emailquery($sql){
        $this->db->query($sql);
        $query = $this->db->query("SELECT * FROM Commulative_Details;");
        $result = $query->result();
        return $result;
    }

}
