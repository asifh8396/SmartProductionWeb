<?php

class Mod_AppMachine extends CI_Model {

    public function reverse($Fromdate,$todate) {
    $query=$this->db->query("SELECT DocId as docid,date_format(DocDate,'%d/%m/%Y') as docdate,Clientname,fpid,JobName,ClientCodeNo,CartonDimension,JobQty,JobRate,JobQty_Value,
woqty,QtyDisp,Item_Class,woid,date_format(wodate,'%d/%m/%Y') as wodate,Jobno,date_format(Req_Del_Sch,'%d/%m/%Y') as 
Req_Del_Sch,date_format(wodate,'%d/%m/%Y') as Commiteddate,CoatingTypeUV
From item_reversecost_master where DocDate>='$Fromdate'and DocDate<='$todate';");
        return extract_query($query);
    }
    // public function Approved_list($Fromdate,$todate) {
    // $query=$this->db->query("SELECT * from reverse_jobcard_detail where docdate>='$Fromdate'and docdate<='$todate';");
    //     return extract_query($query);
    // }
    public function Approved_list($Fromdate,$todate) {
    $query=$this->db->query("SELECT sno,docid,date_format(docdate,'%d/%m/%Y') as docdate,Jobno,clientname,Productid,productcode,Productname,Jobqty,Rate,GPNQty,
DirectRM,IndirectRM,ProductionCost,DirectLabour,Transportationcost,Contractorcost,Factoryoverhead,officeoverhead,Salesvalue,
Profitandloss from reverse_job_cost_sheet where docdate>='$Fromdate'and docdate<='$todate';");
        return extract_query($query);
    }

    public function processList() {
        $query = $this->db->query("select PrUniqueID, PrName from item_base_process_master order by PrName;");
        return extract_query($query);
    }

    public function ShowList() {
        $query = $this->db->query("select a.RecId, a.MachineName,b.PrName,a.Inuse from item_machinenames as a, item_base_process_master as b where a.BasePrUniqueID=  b.PrUniqueID order by b.PrName, a.BasePrUniqueID;");
        return extract_query($query);
    }

    public function detail($hdn_recid) {
        $query = $this->db->query("select MachineName,INuse,PowerCharges,labourcharges,avgspeed,avgsetuptime,avgwastage,interestAmt,depriamt,maintainpm,consumblepm,
            rentpm,PerHrRunCost,BasePrUniqueId,RecId,CapacityPerDay, MakeReadyCostNr, ProductionCostNr, MakeReadyCostUV, ProductionCostUV, DirectManpowCost, SupportManpowCost, AdminDepManpowCost from item_machinenames where RecId = '$hdn_recid';");
        return extract_query($query);
    }

    public function SaveDataValue($queery, $null, $null) {

        $this->db->query('CALL Save_appmachin("' . $queery . '","' . $null . '","' . $null . '",@res, @message);');
        $query = $this->db->query("SELECT @res as a,@message as b");
        return extract_query($query);
    }
    



}
