<?php

class Mod_Processname extends CI_Model {



    public function processList() {
        $query = $this->db->query("select PrUniqueID, PrName from item_base_process_master where isactive = 1 order by PrName;");
        return extract_query($query);
    }

    public function dropdown() {
        $query = $this->db->query("select UnitID,UnitName from item_unit_master;");
        return extract_query($query);
    }

    public function ShowList() {
        $query = $this->db->query("select CostID,PName,IsActive from extracostmaster;");
        return extract_query($query);
    }
    public function processname() {
        $query = $this->db->query("select PrID, PrName, Description, UnitID, IsActive, Level, Narration,InputUOM, OutPutUOM, ProdValidation, DisplayInListBox,
        ifnull(BasePrUniqueID,0) as BasePrUniqueID, BaseTableName, CanBeOnLine, FormNo from  item_processname order by BasePrUniqueID;");
        return extract_query($query);
    }


}
