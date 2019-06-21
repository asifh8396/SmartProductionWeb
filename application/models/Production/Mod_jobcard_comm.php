<?php

class Mod_jobcard_comm extends CI_Model {

    public function get_query($sql) {
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function pageloaddata($jobno, $CP) {
        $query = $this->db->query("call New_jobcard('$jobno', '$CP');");     //953/E16-17-1
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function pageloadOld($jobcardno, $jobtype) {

        $query = $this->db->query("call Web_Jc_Oldjob('$jobcardno');");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function upddendval($jobcardval) {
        $query = $this->db->query("call New_jobcard('$jobcardval');");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function paperdesclist($boardkind, $gsm, $grain, $deckle) {
        $query = $this->db->query("SELECT a.ItemID,a.Description, b.length,b.breadth,b.thickness,a.Manufacturer,a.Quality 
            from item_master as a, item_dimension as b where a.ItemID = b.ItemID and a.Quality='$boardkind' 
            and b.thickness like '%$gsm%' and b.length like '%$grain%' and b.breadth like '%$deckle%' 
            and groupid IN('00001','00005');");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function boardkindfilter() {
        $query = $this->db->query("SELECT distinct(Quality) from item_master where GroupID IN('00001','00005') order by 1;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function processaddnewval($strdata1) {
        $query = $this->db->query("select Prid,PrName from item_processname where PrID not in(" . $strdata1 . ")");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function generatecodedata($icomapyid) {
        $query = $this->db->query("select Current_no from generate_code where table_name = 'item_jobcardmaster' and IcompanyID='$icomapyid'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_vendor_detail() {
        $query = $this->db->query("SELECT CompanyId, CompanyName FROM item_osvendor");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function gangjobitmlist($icompanyid) {
        /* $query = $this->db->query("select ProductID,Description,IPrefix,AccCode from item_fpmasterext where IcompanyId='$icompanyid'"); */
        $query = $this->db->query("select a.ProductID,a.Description,a.IPrefix,a.AccCode,c.RecordID,c.EstimateId from item_fpmasterext as a,quotationnewex2 as b
,quotationnew as c where a.ProductID = b.FPProductID and b.RecordID=c.RecordID and
 a.IcompanyId = c.IcompanyId and b.FPProductID !='' and  a.IcompanyId='$icompanyid'");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function generateupdatetbl($oldno, $newno, $icomapyid) {
        $this->db->query("update generate_code set Current_no = '$newno' where table_name ='item_jobcardmaster' and IcompanyID='$icomapyid'");
    }

/*	
    public function populategriOld($docid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid) {
        // echo "call web_JC_process_info_IN_Single_table_Search('$docid',$dcnotion,'$estimateid');";
        // die;
        $this->db->query("call web_JC_process_info_IN_Single_table_Search('$docid',$dcnotion,'$estimateid');");
        $chdetailquery = $this->db->query('select DocID,B, L, N, TCutSheets, UpsInCutSheet,GridNo, Grain,CutDimNo,WastagePer,cast(WastageSheets as decimal) as WastageSheets,cast(SheetsBeforeWastage AS decimal) as SheetsBeforeWastage,boarddivfact from item_cutdetails_temp');
        $jpaperquery = $this->db->query('SELECT DocID, ICompanyID, Company, Kind, GSM, ROUND(Length,2) as Length , Round(Breadth,2) as Breadth,
 FullSheets,
 round(Qty,2) as Qty, TrimSpace, PlateID, NoofPlates, Remarks,FullSheetUps,
 CutSheetUps, NoofCutSheets,
 ItemType, FormNo, PlateNo, ClientPaper, CutSheetB, CutSheetL, PrUniqueNo, Grain,PaperID, PaperRoll, UniqueID,
 BoardDescription, Wastage, FullSHBeforeWastage,WastageSheets, 
UniqueID,boarddivfact FROM item_jpaper_Temp');
        $machiendetail = $this->db->query('select   AutoId_PK, InfoTable_PK, DocId, ProcessID, ProcessName, FB, 
    SeqNo, int_Info1, int_Info2, int_Info3, int_Info4, Dob_Info1, Dob_Info2, Dob_Info3, Dob_Info4, Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8,Dob_Info9, 
    Var_Info1, Var_Info2, Var_Info3, Var_Info4, FP_Remarks1, FP_Remarks2, MachineNo, MachineName, RawMaterial_1,RawMaterial_2,RawMaterial_3,RawMaterial_4,RawMaterialID_1,RawMaterialID_2, RawMaterialID_3,RawMaterialID_4, GroupID_1,GroupID_2,GroupID_3,GroupID_4,ExecutionID,BasePrUniqueID,NoOfPass,PrUniqueNo,ICompanyID,Var_ID_Info1,Var_ID_Info2, 
    Var_ID_Info3,Var_ID_Info4, InputUOM,OutPutUOM,CutBoardDim,FullBoardNo,CutDimNo,PrQty, PlanUniqueID,
sec_to_time(MrTime) as MrTime,sec_to_time(ProcessTime) as ProcessTime,sec_to_time(TotTime) as TotTime,IntricacyID, IntricacyDesc from webjobinfo_temp order by AutoId_PK');
        $inkdetial = $this->db->query('select autoid,Inkid,Description,colour,ShadeNo,InkUnit,MisCode,FrontBack from Web_ink_temp');
        $rawdetailval = $this->db->query('select * from web_raw_detail');

        $plydetailval = $this->db->query('select DocID,FluteID,FluteDesc,ItemID,KraftDesc,DeclineFact,ExtraConsump,KgReq,RowNo,GSM,Cfact from Web_PlyDetails_temp');

        $otherdetail = $this->db->query("select RemDesign,BFBS,ShadeCard,IcompanyId,OpenSize,DocNotion,RemScanning,RemPlanning,RemDelivery,ChkListNo,PastProblems,RemPrintLine from item_jinfo where 
DocID='$docid'");
        $lotdetial = $this->db->query("select a.LotID,b.Description,a.LotNo,date_format(a.MfgDate,'%Y-%m-%d') as MfgDate,Mrplot as 
ExpDate,a.Qty,a.Srno from  item_master as b, lot_detail as a where 
a.itemid=b.Itemid and a.ICompanyID= '$icompanyid' and a.Jobno in($jobnodelivery);");
        $result = $chdetailquery->result();
        $result1 = $jpaperquery->result();
        $machiendetailval = $machiendetail->result();
        $inkdetialval = $inkdetial->result();
        $rawdetail = $rawdetailval->result();
        $otherdetailval = $otherdetail->result();
        $plydetail = $plydetailval->result();
        $oterinfo = $otherdetail->result();
        $lotdetial = $lotdetial->result();
        return array('chdetail' => $result, 'query2' => $result1, 'query3' => $machiendetailval, 'inkdetial' => $inkdetialval, 'Rawdetail' => $rawdetail, 'Plyde' => $plydetail, 'otherdetail' => $otherdetailval, 'lotdetail' => $lotdetial);
    }
	
	*/

    public function showwoval() {
        $this->db->query("call insert_into_WOdetail_temp('00001','2016-01-01','2020-03-31',3);");
        $query = $this->db->query("select * from item_wodetail_temp");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function showpopval() {
        $query = $this->db->query("Call Cr_Show_Actual_Allocated_stock('', 'Board')");

        $htmlData = "";
        $i = 0;
        $row = $query->result();
        $color = sizeof($row);
        if ($query->num_rows() > 0) {
            $j = 1;
            foreach ($query->result() as $row) {
                $htmlData .="<tr class='odd' onclick='return update($j);'><input type='hidden' name='hdn_al' id='hdn_al' value='$color'><td hidden style='font-size: 13px;  width=50px; border-style: solid; border-width: 1px;'>
                <input type= 'hidden' name='hdn_divfact$j' id='hdn_divfact$j' value=" . $row->BoardDivFact . "><input type= 'hidden' name='hdn_id$j' id='hdn_id$j' value=" . $row->itemid . "><input type= 'hidden' name='hdn_baseid$j' id='hdn_baseid$j' value=" . $row->ItemCode . ">
                <input type= 'hidden' name='hdn_mid$j' id='hdn_mid$j' value=" . $row->Mill . ">
                <input type= 'hidden' name='hdn_mkind$j' id='hdn_mkind$j' value=" . $row->Kind . ">
                <input type= 'hidden' name='hdn_gsm$j' id='hdn_gsm$j' value=" . $row->GSM . ">
                <input type= 'hidden' name='hdn_deckel$j' id='hdn_deckel$j' value=" . $row->Deckel . ">
                <input type= 'hidden' name='hdn_grain$j' id='hdn_grain$j' value=" . $row->Grain . ">
                <input type= 'hidden' name='hdn_packet$j' id='hdn_packet$j' value=" . $row->Packet . ">
                <input type= 'hidden' name='hdn_graindir$j' id='hdn_graindir$j' value=" . $row->GrainDir . ">
                <input type= 'hidden' name='hdn_boarddetailval$j' id='hdn_boarddetailval$j' value='" . $row->Description . "'></td>
                <td class='border'  style='font-size: 13px; width=720px; border-style: solid; border-width: 1px;'>&nbsp<a id = 'a_itemname[$j]' name='a_tempprname[$j]' style='color: black; width: 100%; text-decoration: none;' href='#'>" . $row->Description . "</a></td>
                <td class='border'  style='font-size: 13px; width=720px; border-style: solid; border-width: 1px;'>&nbsp<a id = 'a_cstock[$j]' name='a_cstock[$j]' style='color: black; width: 100%; text-decoration: none;' href='#'>" . $row->Currentstock . "</a></td>
                <td class='border'  style='font-size: 13px; width=720px; border-style: solid; border-width: 1px;'>&nbsp<a id = 'a_allstock[$j]' name='a_allstock[$j]' style='color: black; width: 100%; text-decoration: none;' href='#'>" . $row->AllocatedStock . "</a></td>
                <td class='border'  style='font-size: 13px; width=720px; border-style: solid; border-width: 1px;'>&nbsp<a id = 'a_avistock[$j]' name='a_avistock[$j]' style='color: black; width: 100%; text-decoration: none;' href='#'>" . $row->Avialblestock . "</a></td></tr>";
                $j++;
            }
            return $htmlData;
        }
    }

    public function populategrid($itemid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid, $recordid, $txt_fqty) {
        //echo "call COMM_JC_INFO_IN_Single_Table_xx('$recordid','$icompanyid','$estimateid');";die();
        $this->db->query("call COMM_JC_INFO_IN_Single_Table_xx('$recordid','$icompanyid','$estimateid', '$txt_fqty');");
        $processtable = $this->db->query("SELECT AutoId_PK,DocId, Component, FormNo,PlateNo, ProcessID, ProcessName, FB, SeqNo,
            int_Info1, int_Info2, int_Info3, int_Info4, Dob_Info1,Dob_Info2, Dob_Info3 ,Dob_Info4,Dob_Info5,Dob_Info6, Dob_Info7, Dob_Info8, Dob_Info9, 
            Var_Info1, Var_Info2,Var_Info3, Var_Info4, Var_ID_Info1,Var_ID_Info2, Var_ID_Info3, Var_ID_Info4, 
            FP_Remarks1, MachineID, MachineName, MachineNo, RawMaterial_1,RawMaterial_2,RawMaterial_3,RawMaterial_4, 
            RawMaterialID_1, RawMaterialID_2,RawMaterialID_3,RawMaterialID_4, ExecutionID, NoOfPass,BasePrUniqueID, PrUniqueNo, 
            InputUOM, OutPutUOM, FullBoardNo, CutDimNo, PrQty, PlanUniqueID, IntricacyID, NoOfRepeats, 
            MrTime,ProcessTime,TotTime,MrTime_Format, ProcessTime_Format, TotTime_Format,
            Mill, GSM, PaperKind, PaperKG, UpsInFullSheet, UpsInCutSheets, CutsFromFullSH,
            TotCutSHRequired,WastagePer, CutSH_WithoutWastage, Impression_WithoutWastage, TotFullSHRequired,FullSH_WithoutWastage, PaperMulFact, 
            concat(cast(FullHeight AS decimal),' x ',cast(FullBre AS decimal)) as plansize, cast(FullHeight AS decimal) as planheight, cast(FullBre AS decimal) as planbreadth, 
            concat(cast(CutHeight AS decimal),' x ',cast(CutBre AS decimal)) as printsize, cast(CutHeight AS decimal) as printheight, cast(CutBre AS decimal) as printbreadth, 
            TotImpressions as impressions,BoardDivFact,ProcessStatus,CutBoardDim,MrTime_Format,ProcessTime_Format,TotTime_Format,OsVendorID,ClientPaper
            from WebJobInfo_temp order by Component;");
        $processresult = $processtable->result();

        $ink_query = $this->db->query("SELECT Component,FormNo,PlateNo,PLateNew,PLateOld,PlateRemarks,OS,
            Ink1,Ink2,Ink3,Ink4,Ink5,InkDesc1,InkDesc2,InkDesc3,InkDesc4,InkDesc5
                 FROM WebJobInfo_temp WHERE ProcessID='Pr' order by Component");
        $inkdetialval = $ink_query->result();

        $plate_query = $this->db->query("SELECT ItemID,Description FROM item_master WHERE Groupid='00004'");
        $plate_result = $plate_query->result();

        $addit_query = $this->db->query("SELECT * FROM Web_Addational_Material;");
        $addit_result = $addit_query->result();

        $rawdetail_query = "";
        $rawdetail = "";

        $otherdetail_query = $this->db->query("select * from Comm_JobSizeInfo_temp;"); // 
        $otherdetailval = $otherdetail_query->result();

        return array('processresult' => $processresult, 'inkdetial' => $inkdetialval, 'Rawdetail' => $rawdetail, 'otherdetail' => $otherdetailval, 
            'plate' => $plate_result, 'additionlmtrl' => $addit_result);
    }

    public function populategridOld($docid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid, $recordid) {
   //     echo "call COMM_JC_process_info_IN_Single_table_Search('$docid','$dcnotion','$estimateid');";die();
        $this->db->query("call COMM_JC_process_info_IN_Single_table_Search('$docid','$dcnotion','$estimateid');");
        $processtable = $this->db->query("SELECT AutoId_PK,DocId, Component, FormNo,PlateNo, ProcessID, ProcessName, FB, SeqNo,
            int_Info1, int_Info2, int_Info3, int_Info4, Dob_Info1,Dob_Info2, Dob_Info3 ,Dob_Info4,Dob_Info5,Dob_Info6, Dob_Info7, Dob_Info8, Dob_Info9, 
            Var_Info1, Var_Info2,Var_Info3, Var_Info4, Var_ID_Info1,Var_ID_Info2, Var_ID_Info3, Var_ID_Info4, 
            FP_Remarks1, MachineID, MachineName, MachineNo, RawMaterial_1,RawMaterial_2,RawMaterial_3,RawMaterial_4, 
            RawMaterialID_1, RawMaterialID_2,RawMaterialID_3,RawMaterialID_4, ExecutionID, NoOfPass,BasePrUniqueID, PrUniqueNo, 
            InputUOM, OutPutUOM, FullBoardNo, CutDimNo, PrQty, PlanUniqueID, IntricacyID, NoOfRepeats, 
            MrTime,ProcessTime,TotTime,MrTime_Format, ProcessTime_Format, TotTime_Format,
            Mill, GSM, PaperKind, PaperKG, UpsInFullSheet, UpsInCutSheets, CutsFromFullSH,
            TotCutSHRequired,WastagePer, CutSH_WithoutWastage, Impression_WithoutWastage, TotFullSHRequired,FullSH_WithoutWastage, PaperMulFact, 
            concat(cast(FullHeight AS decimal),' x ',cast(FullBre AS decimal)) as plansize, cast(FullHeight AS decimal) as planheight, cast(FullBre AS decimal) as planbreadth, 
            concat(cast(CutHeight AS decimal),' x ',cast(CutBre AS decimal)) as printsize, cast(CutHeight AS decimal) as printheight, cast(CutBre AS decimal) as printbreadth, 
            TotImpressions as impressions,BoardDivFact,ProcessStatus,CutBoardDim,OsVendorID,ClientPaper,MrTime_Format,ProcessTime_Format,TotTime_Format
            from WebJobInfo_temp order by Component;");
        $processresult = $processtable->result();

        $ink_query = $this->db->query("SELECT a.Component,a.FormNo,a.PlateNo,a.PLateID,a.PLateNew,a.PLateOld,a.PlateRemarks,a.OS,
            a.Ink1,a.Ink2,a.Ink3,a.Ink4,a.Ink5,InkDesc1,InkDesc2,InkDesc3,InkDesc4,InkDesc5,a.OsVendorID from RMC_INK_temp as a;");
        $inkdetialval = $ink_query->result();

        $plate_query = $this->db->query("SELECT ItemID,Description FROM item_master WHERE Groupid='00004'");
        $plate_result = $plate_query->result();

        $addit_query = $this->db->query("SELECT * FROM Web_Addational_Material;");
        $addit_result = $addit_query->result();
        //print_r($addit_result);die;

        $rawdetail_query = $this->db->query("select * from web_raw_detail;");
        $rawdetail = $rawdetail_query->result();

        $otherdetail_query = $this->db->query("select * from Comm_JobSizeInfo_temp;"); // 
        $otherdetailval = $otherdetail_query->result();

        return array('processresult' => $processresult, 'inkdetial' => $inkdetialval, 'Rawdetail' => $rawdetail, 'otherdetail' => $otherdetailval, 
            'plate' => $plate_result, 'additionlmtrl' => $addit_result);
    }

    public function popmachien($prid) {
        $machine = $this->db->query("select RecId,MachineID,MachineName from item_machinenames where InUse=1 and PrID='$prid'");
        $result = $machine->result();
        return $result; // array('machinedata'=>$result);
    }
    public function popplatedetail($drp_machine) {
        $machine = $this->db->query("select c.Itemid,c.Description from item_machine_relation as a , item_machinenames as b,item_master as c where b.RecId=a.MachineID and a.itemid=c.itemid and a.MachineID = '$drp_machine';");
        $result = $machine->result();
        return $result; // array('machinedata'=>$result);
    }

    public function materailid1($materailid) {
        $machine = $this->db->query("select itemid,Description from item_master where GroupID='$materailid'");
        $result = $machine->result();
        return $result;
    }

    public function materailid2($materailid) {
        $machine = $this->db->query("select itemid,Description from item_master where GroupID='$materailid'");
        $result = $machine->result();
        return $result;
    }

    public function info1val($hdn_basepridval) {
        $this->db->query("call Web_JC_Create_ListBox_SingleTables(1);");
        $query = $this->db->query("select SPID,Description from JobCard_List_Table where ListTableName='$hdn_basepridval' and Col_No =1;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function info2val($hdn_basepridval) {
        $this->db->query("call Web_JC_Create_ListBox_SingleTables(2);");
        $query = $this->db->query("select SPID,Description from JobCard_List_Table where ListTableName='$hdn_basepridval' and Col_No =2;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function jobcomplex($hdn_basepridval) {
        $query = $this->db->query("select ID,Name from est_jobcomplexity where prid='$hdn_basepridval';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function estimationdata($esitid, $icompanyid) {
        $query = $this->db->query("select a.Product,a.Quantity,a.PaperBoard,a.WastagePer,date_format(a.QDate,'%d/%m/%Y') as QDate,b.UserName from quotationnew as a
,usermaster as b where EstimateId = '$esitid' and ICompanyID='$icompanyid' and a.CreatedBy = b.userid;");
        $cdetail = $this->db->query("select RecordId,`35` as itemid,`4` as cutLen,`5` as CutBre,`18` as UPS,'mm' as Unit,`1` as Cuts
 from QcutGData where RecordID = (select RecordID from quotationnew where EstimateId = '$esitid' and ICompanyID='$icompanyid');");
        $bdetail = $this->db->query("select `35` as itemid,`1` as FullSHUps ,b.Description,c.Length as Deckel,c.Breadth as Grain,c.Thickness as GSM from
QcutGData as a, item_master as b,item_dimension as c where a.35 = b.ItemID and b.ItemID = c.itemid 
and a.RecordID = (select RecordID from quotationnew where EstimateId = '$esitid' and ICompanyID='$icompanyid');");


        $result = $query->result();
        $result1 = $bdetail->result();
        $resutl2 = $cdetail->result();
        return array('pdetial' => $result, 'bdetail' => $result1, 'cdetial' => $resutl2);
    }

    public function lotdetailval($jobnoin, $icompanyid) {
        $query = $this->db->query("select a.LotID,b.Description,a.LotNo,date_format(a.MfgDate,'%d-%m-%Y') as MfgDate,Mrplot as 
ExpDate,a.Qty,a.Srno from  item_master as b,item_wodetail as c , lot_detail as a where a.woid=c.woid and a.LotID = c.lotidval and b.itemid=c.Itemid and a.ICompanyID = '$icompanyid' and c.Jobno in($jobnoin);");
        $result = $query->result();
        return $result;
    }

    public function Savedataval($jobcard_master, $jobcadrmaster_d, $additmtrlquery, $processdetail, $inkquery, $raw_detail_insert, $otherquery, $jobnew, $jobnofirst, $Docid, $ICompanyId, $docidset, $manualjc, $dcnotion) {

        $this->db->query('call COMM_JC_SAVE_Create_Temp_Tables();');

/*       
        echo 'call Comm_JC_Save("' . $jobcard_master . '","' . $jobcadrmaster_d . '","' . $additmtrlquery . '",
            "","' . $processdetail . '","' . $inkquery . '","' . $raw_detail_insert . '","' . $otherquery . '",
            "","' . $jobnew . '","' . $jobnofirst . '","' . $Docid . '","' . $ICompanyId . '","' . $docidset . '",
            "' . $manualjc . '","' . $dcnotion . '",@a,@b,@c);';
        die();
*/
		
        $query = $this->db->query('call Comm_JC_Save("' . $jobcard_master . '","' . $jobcadrmaster_d . '","' . $additmtrlquery . '", "",
            "' . $processdetail . '","' . $inkquery . '","' . $raw_detail_insert . '","' . $otherquery . '",
            "","' . $jobnew . '","' . $jobnofirst . '","' . $Docid . '","' . $ICompanyId . '","' . $docidset . '",
            "' . $manualjc . '","' . $dcnotion . '",@a,@b,@c);');

//        $sql = $this->db->last_query();
//        echo $sql;
//        die();
        $res = $this->db->query("SELECT @a as abc,@b as def,@c as docnotion");
        return $result1 = $res->result();
    }

    public function get_ink() {
        $ink = $this->db->query("SELECT ItemID,Description FROM item_master WHERE GroupID='00002'");
        $result = $ink->result();
        return $result;
    }

    public function get_popup_data() {
        $query = $this->db->query("SELECT ItemID,Description FROM item_master WHERE GroupID='00006'");
        $result = $query->result();
        return $result;
    }

    public function additionalmtrl_grouplist() {
        $query = $this->db->query("SELECT GroupID, GroupName from item_group_master where IsActive = 1;");
        $result = $query->result();
        return $result;
    }

    public function additionalmtrl_itemlist($groupid) {
        $query = $this->db->query("SELECT ItemID, Description from item_master where GroupID = '$groupid';");
        $result = $query->result();
        return $result;
    }

}
