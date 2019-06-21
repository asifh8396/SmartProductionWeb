<?php
/** 
* @author Mohd Asif 
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_BaseProcess_master extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    

    function SaveDataValue($delete, $query,$querywithout) {
        $this->db->query('CALL save_production_general("' . $delete . '","' . $query . '","' . $querywithout . '",@ELocal,@EMessege);');
        $query = $this->db->query("SELECT @ELocal,@EMessege");
        return extract_query($query);
    }


    public function get_process() {
       
        $qry2 = $this->db->query('select PrID,PrName,ShortName,PrUniqueID,General_Seq,ShowLoad,
BaseTableName,CanBeOnLine,ISActive,FPTableName,TempFPTableName,PrUniqueID,InPutUOM, OutPutUOM
 from item_base_process_master;');
        return extract_query($qry2);
    }


//     call Production_comparison_between_actual_vs_estimateprocesswise('Pr','2018-04-1','2018-04-31');

// select PrID,PrName from item_base_process_master;
   

}

