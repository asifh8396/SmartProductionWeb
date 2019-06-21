<?php

class Mod_jobcard extends CI_Model {

    public function pageloaddata($jobno, $CP) {
        $query = $this->db->query("call New_jobcard('$jobno','$CP');");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    } 

    public function otpissue($txt_docid){
        $query = $this->db->query("select Get_Issue_status_of_RM_against_jobcard('$txt_docid') as Issue_status;");
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

    public function pageloadOld($jobcardno, $jobtype) {

        $query = $this->db->query("call Web_Jc_Oldjob('$jobcardno');");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function populategriOld($docid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid) {
        // echo "call web_JC_process_info_IN_Single_table_Search('$docid',$dcnotion,'$estimateid');";
        // die;
        $this->db->query("call web_JC_process_info_IN_Single_table_Search('$docid',$dcnotion,'$estimateid');");
        $chdetailquery = $this->db->query('select DocID,B, L, N, TCutSheets, UpsInCutSheet,GridNo, Grain,CutDimNo,WastagePer, 
            cast(WastageSheets as decimal) as WastageSheets,cast(SheetsBeforeWastage AS decimal) as SheetsBeforeWastage,boarddivfact from item_cutdetails_temp');
        $jpaperquery = $this->db->query('SELECT DocID, ICompanyID, Company, Kind, GSM, ROUND(Length,2) as Length , Round(Breadth,2) as Breadth, FullSheets, 
            round(Qty,2) as Qty, TrimSpace, PlateID, NoofPlates, Remarks,FullSheetUps, CutSheetUps, NoofCutSheets, ItemType, FormNo, PlateNo, ClientPaper, CutSheetB, 
            CutSheetL, PrUniqueNo, Grain,PaperID,ChangeID, Board_remarks, PaperRoll, UniqueID, BoardDescription, Wastage, FullSHBeforeWastage,WastageSheets, UniqueID,boarddivfact, 
            CurrentStock, AllocatedStock, AvailableStock FROM item_jpaper_Temp');
        $machiendetail = $this->db->query('select   AutoId_PK, InfoTable_PK, DocId, ProcessID, ProcessName, FB, 
            SeqNo, int_Info1, int_Info2, int_Info3, int_Info4, Dob_Info1, Dob_Info2, Dob_Info3, Dob_Info4, Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8,Dob_Info9, 
            Var_Info1, Var_Info2, Var_Info3, Var_Info4, FP_Remarks1, FP_Remarks2, MachineNo, MachineName, RawMaterial_1,RawMaterial_2,RawMaterial_3,RawMaterial_4,
            RawMaterialID_1,RawMaterialID_2, RawMaterialID_3,RawMaterialID_4, GroupID_1,GroupID_2,GroupID_3,GroupID_4,ExecutionID,BasePrUniqueID,NoOfPass,
            PrUniqueNo,ICompanyID,Var_ID_Info1,Var_ID_Info2, Var_ID_Info3,Var_ID_Info4, InputUOM,OutPutUOM,CutBoardDim,FullBoardNo,CutDimNo,PrQty, 
            PlanUniqueID,sec_to_time(MrTime) as MrTime,sec_to_time(ProcessTime) as ProcessTime,sec_to_time(TotTime) as TotTime,
            IntricacyID, IntricacyDesc from webjobinfo_temp order by AutoId_PK');
        $inkdetial = $this->db->query('select autoid,Inkid,Description,colour,ShadeNo,InkUnit,MisCode,FrontBack from Web_ink_temp');
        $rawdetailval = $this->db->query('select * from web_raw_detail');

        $plydetailval = $this->db->query('select DocID,FluteID,FluteDesc,ItemID,KraftDesc,DeclineFact,ExtraConsump,KgReq,RowNo,GSM,Cfact from Web_PlyDetails_temp');

        $otherdetail = $this->db->query("select RemDesign,BFBS,ShadeCard,IcompanyId,OpenSize,DocNotion,RemScanning,RemPlanning,RemDelivery,ChkListNo,PastProblems,
            RemPrintLine from item_jinfo where DocID='$docid'");
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

    // now not in use - using through pageloaddata()
    public function upddendval($jobcardval) {
        $query = $this->db->query("call New_jobcard('$jobcardval');");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // public function showwoval() {
    //     $this->db->query("call insert_into_WOdetail_temp('". $this->company_id ."','2016-04-01','2035-03-31',3);");
    //     $query = $this->db->query("select * from item_wodetail_temp");
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return FALSE;
    //     }
    // }

    public function showwoval($icompanyid,$first,$last,$filter) {
        $this->db->query("call insert_into_WOdetail_temp('$icompanyid','$first','$last','4');");
        $query = $this->db->query("select *,date_format(WODate,'%d/%m/%Y') as WODate from item_wodetail_temp where $filter;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function show_board(){
        $query = $this->db->query("select * from item_boardchangemaster");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function showpopval($JCItemID) {
        $query = $this->db->query("Call Cr_Show_Actual_Allocated_stock('". $JCItemID ."', 'Board','". $this->company_id ."')");

        $htmlData = "";
        $i = 0;
        $row = $query->result();
        $color = sizeof($row);
        if ($query->num_rows() > 0) {
            $j = 1;
            foreach ($query->result() as $row) {
                $htmlData .="<tr class='odd' style='cursor: pointer;'  onclick='return board_data($j);'>
                <td hidden>
                    <input type='hidden' name='hdn_al' id='hdn_al' value='$color'>
                    <input type= 'hidden' name='hdn_divfact$j' id='hdn_divfact$j' value=" . $row->BoardDivFact . ">
                    <input type= 'hidden' name='hdn_id$j' id='hdn_id$j' value=" . $row->itemid . ">
                    <input type= 'hidden' name='hdn_baseid$j' id='hdn_baseid$j' value='" . $row->ItemCode . "'>
                    <input type= 'hidden' name='hdn_mid$j' id='hdn_mid$j' value='" . $row->Mill . "'>
                    <input type= 'hidden' name='hdn_mkind$j' id='hdn_mkind$j' value='" . $row->Kind . "'>
                    <input type= 'hidden' name='hdn_gsm$j' id='hdn_gsm$j' value=" . $row->GSM . ">
                    <input type= 'hidden' name='hdn_deckel$j' id='hdn_deckel$j' value=" . $row->Deckel . ">
                    <input type= 'hidden' name='hdn_grain$j' id='hdn_grain$j' value=" . $row->Grain . ">
                    <input type= 'hidden' name='hdn_packet$j' id='hdn_packet$j' value=" . $row->Packet . ">
                    <input type= 'hidden' name='hdn_graindir$j' id='hdn_graindir$j' value=" . $row->GrainDir . ">
                    <input type= 'hidden' name='hdn_boarddetailval$j' id='hdn_boarddetailval$j' value='" . $row->Description . "'>
                </td>
                <td><a id = 'a_itemname[$j]' style='color: black; text-decoration: none;' href='#'>" . $row->Description . "</a></td>
                <td><a id = 'a_cstock[$j]' style='color: black; text-decoration: none;' href='#'>" . $row->Currentstock . "</a></td>
                <td><a id = 'a_allstock[$j]' style='color: black; text-decoration: none;' href='#'>" . $row->AllocatedStock . "</a></td>
                <td><a id = 'a_avistock[$j]' style='color: black; text-decoration: none;' href='#'>" . $row->Avialblestock . "</a></td></tr>";
                $j++;
            }
            return $htmlData;
        }
    }

    public function populategrid($itemid, $icompanyid, $dcnotion, $jobnodelivery, $estimateid) {

        $this->db->query("call Web_JC_FP_INFO_IN_Single_Table('$itemid','$icompanyid','$estimateid');");
        $chdetailquery = $this->db->query('select DocID,B, L, N, TCutSheets, UpsInCutSheet,GridNo, Grain,CutDimNo,WastagePer,cast(WastageSheets as decimal) as WastageSheets,cast(SheetsBeforeWastage AS decimal) as SheetsBeforeWastage,boarddivfact from item_cutdetails_temp');
        $jpaperquery = $this->db->query('SELECT DocID, ICompanyID, Company, Kind, GSM, ROUND(Length,2) as Length , Round(Breadth,2) as Breadth, CAST(FullSheets AS DECIMAL) as FullSheets,
            round(Qty,2) as Qty, TrimSpace, PlateID, NoofPlates, Remarks,Cast(FullSheetUps as decimal) as FullSheetUps, cast(CutSheetUps as decimal) as CutSheetUps, 
            cast(NoofCutSheets as decimal) as NoofCutSheets, ItemType, FormNo, PlateNo, ClientPaper, CutSheetB, CutSheetL, PrUniqueNo, Grain,PaperID, ChangeID, Board_remarks,PaperRoll, UniqueID, BoardDescription, Wastage, cast(FullSHBeforeWastage as decimal) as FullSHBeforeWastage,cast(WastageSheets as decimal) as WastageSheets, UniqueID,boarddivfact, CurrentStock, AllocatedStock, AvailableStock FROM item_jpaper_Temp');
        $machiendetail = $this->db->query('select  AutoId_PK, InfoTable_PK, DocId, ProcessID, ProcessName, FB, 
            SeqNo, int_Info1, int_Info2, int_Info3, int_Info4, Dob_Info1, Dob_Info2, Dob_Info3, Dob_Info4, Dob_Info5, Dob_Info6, Dob_Info7, Dob_Info8,Dob_Info9,
            Var_Info1, Var_Info2, Var_Info3, Var_Info4, FP_Remarks1, FP_Remarks2, MachineNo, MachineName, RawMaterial_1,RawMaterial_2,RawMaterial_3,RawMaterial_4,
            RawMaterialID_1,RawMaterialID_2, RawMaterialID_3,RawMaterialID_4, GroupID_1,GroupID_2,GroupID_3,GroupID_4,ExecutionID,BasePrUniqueID,NoOfPass,
            PrUniqueNo,ICompanyID,Var_ID_Info1,Var_ID_Info2, Var_ID_Info3,Var_ID_Info4, InputUOM,OutPutUOM,CutBoardDim,FullBoardNo,
            CutDimNo,PrQty, PlanUniqueID,sec_to_time(MrTime) as MrTime,sec_to_time(ProcessTime) as ProcessTime,sec_to_time(TotTime) as TotTime,
            IntricacyID, IntricacyDesc from webjobinfo_temp order by seqNo');
        $inkdetial = $this->db->query('select autoid,Inkid,Description,colour,ShadeNo,InkUnit,MisCode,FrontBack from Web_ink_temp');

        $plydetailval = $this->db->query('select DocId,FluteID,FluteDesc,ItemID,KraftDesc,DeclineFact,ExtraConsump,KgReq,RowNo,GSM,Cfact from Web_PlyDetails_temp');

        $otherdetail = $this->db->query("select concat('Left ',a.Left_Margin,' Top ' ,a.Top_Margin,' Right ', a.Right_Margin) as margin, concat('Flap ',a.FlapSide_Gutter,' Pasting ', a.PastingSide_Gutter) as gutter,a.Plate_Gripper,b.Job_LPI from  item_fp_margin as a,item_fpmasterext as b where a.itemid=b.ProductID and a.itemid = '$itemid'");
        $lotdetial = $this->db->query("select a.LotID,b.Description,a.LotNo,date_format(a.MfgDate,'%Y-%m-%d') as MfgDate,Mrplot as 
            ExpDate,a.Qty,a.Srno from  item_master as b, lot_detail as a where 
            a.itemid=b.Itemid and a.ICompanyID= '$icompanyid' and a.Jobno in($jobnodelivery);");
        $result = $chdetailquery->result();
        $result1 = $jpaperquery->result();
        $machiendetailval = $machiendetail->result();
        $inkdetialval = $inkdetial->result();
        $plydetail = $plydetailval->result();
        $otherdetailval = $otherdetail->result();
        $rawdetail = '';
        $lotdetial = $lotdetial->result();
        return array('chdetail' => $result, 'query2' => $result1, 'query3' => $machiendetailval, 'inkdetial' => $inkdetialval, 'Rawdetail' => $rawdetail, 'Plyde' => $plydetail, 'otherdetail' => $otherdetailval, 'lotdetail' => $lotdetial);
    }

    public function popmachien($prid) {
        $machine = $this->db->query("select RecId,MachineName from item_machinenames where PrID='$prid'");
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

    public function inkdetail() {
        $ink = $this->db->query("select a.ItemID,a.GroupID,a.Description,a.Quality,b.Length,b.Breadth,a.IPrefix,a.PackingUnit from 
        item_master as a,item_dimension as b where a.ItemId = b.ItemID and ISActive=1 and groupID='00002';");
        $result = $ink->result();
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

    public function wastageinfo($itemid) {
        $query = $this->db->query("SELECT a.DocID, date_format(a.DocDate, '%d-%m-%Y') as DocDate, a.FPID, 
            cast(a.WoQty as decimal) as WoQty, cast(a.JobQty as decimal) as JobQty, cast(a.QtyDisp as decimal) as QtyDisp, 
            b.Wastage, cast(a.GPN as decimal) as GPN, cast(FullBoardSH as decimal) as Issue, 
            cast(if(a.gpn>0, ((a.JobQty + (a.JobQtyAfterWastage - a.JobQty))-a.GPN),0) as decimal) as ActualWastage, 
            cast(if(a.GPN> 0,ROUND(((a.JobQtyAfterWastage-a.GPN)/a.JobQty)*100,0),0) as decimal) as ActualWastagePer,
            cast((a.JobQtyAfterWastage - a.JobQty) as decimal) as ExpectedWastage, 
            cast((a.JobQty + (a.JobQtyAfterWastage - a.JobQty)) as decimal) as QtywithWastge,
            cast(ROUND((((a.JobQtyAfterWastage - a.JobQty)/a.JobQtyAfterWastage)*100),2) as decimal) as ExpWastagePer, 
            concat(boardkind,' - ',BoardGSM ,' GSM') as Kind, Concat(CutSize1,' - ',CutSize1_Ups ,' UPS') as PrintSize, 
            cast((a.GPN - a.QtyDisp) as decimal) as RemainingQty
            from item_reversecost_master as a, item_jobcardmaster_d as b WHERE a.DocID = b.DocID and a.jobno = b.jobno
            AND FPID = '$itemid' order by DocDate desc;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Corrugation */

    public function corrugationval() {
        $corrug = $this->db->query("Select a.ItemID,a.Description,d.Breadth from Item_Master as a,Item_Unit_Master as b,
            Item_Group_Master as c,Item_Dimension as d where  a.ICompanyID = '00001' and  a.ItemID = d.ItemID and a.GroupID = c.GroupID and  a.UOM=b.UnitID 
            and a.IsActive = 1 and a.GroupID in('00102','00103','00105','00101') 
            and a.Type <>'W' group by a.Description,a.ItemID,a.Manufacturer,a.Quality,b.UnitName");
        $result = $corrug->result();
        return $result;
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
            ExpDate,a.Qty,a.Srno from  item_master as b,item_wodetail as c , lot_detail as a where a.woid=c.woid and a.LotID = c.lotidval 
            and b.itemid=c.Itemid and a.ICompanyID = '$icompanyid' and c.Jobno in($jobnoin);");
        $result = $query->result();
        return $result;
    }

    public function Savedataval($jobcard_master, $jobcadrmaster_d, $boarddetailinsert, $cutdetail, $processdetail, $inkquery, $raw_detail_insert, $jinfoval, $corrugation, $jobnew, $jobnofirst, $Docid, $ICompanyId, $docidset, $manualjc, $dcnotion) {
        // echo 'call Web_JC_Save("' . $jobcard_master . '","' . $jobcadrmaster_d . '","' . $boarddetailinsert . '",
        //     "' . $cutdetail . '","' . $processdetail . '","' . $inkquery . '","' . $raw_detail_insert . '","' . $jinfoval . '",
        //     "' . $corrugation . '","' . $jobnew . '","' . $jobnofirst . '","' . $Docid . '","' . $ICompanyId . '","' . $docidset . '",
        //     "' . $manualjc . '","' . $dcnotion . '",@a,@b,@c);';
        // die();
        // $this->load->database();
        // $this->db->trans_start();
        if ($dcnotion == '') {
            $dcnotion = 17;
        }
        $this->db->query('call Web_JC_Save_Temp_Tables();');
        $query = $this->db->query('call Web_JC_Save("' . $jobcard_master . '","' . $jobcadrmaster_d . '","' . $boarddetailinsert . '",
            "' . $cutdetail . '","' . $processdetail . '","' . $inkquery . '","' . $raw_detail_insert . '","' . $jinfoval . '",
            "' . $corrugation . '","' . $jobnew . '","' . $jobnofirst . '","' . $Docid . '","' . $ICompanyId . '","' . $docidset . '",
            "' . $manualjc . '","' . $dcnotion . '",@a,@b,@c);');

        $res = $this->db->query("SELECT @a as abc,@b as def,@c as docnotion");
        return $result1 = $res->result();
    }

}
