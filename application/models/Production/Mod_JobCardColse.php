<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mod_JobCardColse extends CI_Model {

    public function __construct() {
        parent ::__construct();
    }

    public function saleregisterdata($fromdate, $todate, $variable) {
        if ($variable == 1) {
            $qry = "select a.docid,DATE_FORMAT(a.docdate,'%d-%m-%Y') as docdate,b.woid,d.description,c.companyname,a.jclose,
                DATE_FORMAT(a.closedate,'%d-%m-%Y') as closedate,a.closeResaon,b.jobqty,b.totqtyproduced
                ,b.totqtydispatched ,a.canceljob,a.hold,b.jobno,d.iprefix,b.itemid,(b.jobqty-b.totqtyproduced)as blanceproduceqty,
                (b.jobqty-b.totqtydispatched) as balancedispatchqty from item_jobcardmaster as a,item_jobcardmaster_d as b
                ,companymaster as c,item_master as d where a.docid=b.docid and  b.clientid=c.companyid  and b.itemid=d.itemid and a.isactive=0  
                and a.icompanyid='" . $this->company_id . "'  and DATE_FORMAT(a.docdate,'%Y-%m-%d')>=DATE_FORMAT('" . $fromdate . "','%Y-%m-%d')
                and DATE_FORMAT(a.docdate,'%Y-%m-%d')<=DATE_FORMAT('" . $todate . "','%Y-%m-%d')";
        } else if ($variable == 2) {
            $qry = "select a.docid,DATE_FORMAT(a.docdate,'%d-%m-%Y') as docdate,b.woid,d.description,c.companyname,a.jclose,
                DATE_FORMAT(a.closedate,'%d-%m-%Y') as closedate,a.closeResaon,b.jobqty,b.totqtyproduced
                ,b.totqtydispatched ,a.canceljob,a.hold,b.jobno,d.iprefix,b.itemid,(b.jobqty-b.totqtyproduced)as blanceproduceqty,
                (b.jobqty-b.totqtydispatched) as balancedispatchqty from item_jobcardmaster as a,item_jobcardmaster_d as b
                ,companymaster as c,item_master as d where a.docid=b.docid and  b.clientid=c.companyid  and b.itemid=d.itemid and a.isactive=0  
                and a.icompanyid='" . $this->company_id . "'  and DATE_FORMAT(a.docdate,'%Y-%m-%d')>=DATE_FORMAT('" . $fromdate . "','%Y-%m-%d')
                and DATE_FORMAT(a.docdate,'%Y-%m-%d')<=DATE_FORMAT('" . $todate . "','%Y-%m-%d') 
                and b.totqtyproduced <= b.totqtydispatched;";
        } else if ($variable == 3) {
            $qry = "select a.docid,DATE_FORMAT(a.docdate,'%d-%m-%Y') as docdate,b.woid,d.description,c.companyname,a.jclose,
                DATE_FORMAT(a.closedate,'%d-%m-%Y') as closedate,a.closeResaon,b.jobqty,b.totqtyproduced
                ,b.totqtydispatched ,a.canceljob,a.hold,b.jobno,d.iprefix,b.itemid,(b.jobqty-b.totqtyproduced)as blanceproduceqty,
                (b.jobqty-b.totqtydispatched) as balancedispatchqty from item_jobcardmaster as a,item_jobcardmaster_d as b
                ,companymaster as c,item_master as d where a.docid=b.docid and  b.clientid=c.companyid  and b.itemid=d.itemid and a.isactive=0  
                and a.icompanyid='" . $this->company_id . "'  and DATE_FORMAT(a.docdate,'%Y-%m-%d')>=DATE_FORMAT('" . $fromdate . "','%Y-%m-%d')
                and DATE_FORMAT(a.docdate,'%Y-%m-%d')<=DATE_FORMAT('" . $todate . "','%Y-%m-%d') 
                and b.totqtyproduced > b.totqtydispatched;";
        }
        $query = $this->db->query($qry);
        return extract_query($query);
    }

}
