<?php
/** 
* @author Mohd Asif 
*/
defined('BASEPATH') OR exit('No direct script access allowed');


class Mod_ActivityMaster extends CI_Model {

    public function index() {

        $query = $this->db->query("select HeadID, HeadDesc from item_head where IsActive = 1;");
        return extract_query($query);
    }
    
    public function defaultProcess(){
        $query = $this->db->query("select * from item_processname where isactive = '1' order by prname;");
        return extract_query($query);        
        
    }

    public function interIds($headid) {
        $query = $this->db->query("select distinct interid, intername from item_interprostage where ahead = '$headid' ;");
        return extract_query($query);
    }
    
    public function process($headid,$interid) {
        $query = $this->db->query("select a.prid, b.prname, a.isactive from item_interprostage as a, item_processname as b  where a.prid = b.prid 
         and a.aHead = '$headid' and a.interid = '$interid' and b.isactive = '1' order by b.prname;");
        return extract_query($query);
    }  
    
    public function newInterID() {
        $query = $this->db->query("select AutoIncrement_Check_item_interprostage('00001') as newInterId;");
        return extract_query($query);
    }    
    
    public function save($whatThe) {
//        echo $whatThe; die();
        $query = $this->db->query("$whatThe;");
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return FALSE;
//        }
    }         
        
    

}


