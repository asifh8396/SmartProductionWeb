<?php

class Mod_Extracostmaster extends CI_Model {



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

    public function detail($hdn_costid) {
        $query = $this->db->query("select PName,InputUOM,OutputUOM, MISPName, PrUniqueID, CostID, IsActive from extracostmaster where CostID = '$hdn_costid';");
        return extract_query($query);
    }

    public function SaveDataValue($queery, $null, $null,$formName) {

        $this->db->query('CALL Save_extracostmaster("' . $queery . '","' . $null . '","' . $null . '","' . $formName . '",@res, @message);');
        $query = $this->db->query("SELECT @res as a,@message as b");
        return extract_query($query);
    }
    



}
