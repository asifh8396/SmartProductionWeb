<?php

class JCProduction extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

       public function index () {

        $this->load->library('PDF');
        $pdf = new PDF('P','mm','A4');

        // $pdf = new PDF_MemImage ();
        // date_default_timezone_set('Asia/Kolkata');
        $DocId = $_GET['hdn_docid'];
        // $DocId = 'SOP18-19/2603-1';
        $icompanyidlogin = $_GET['Icompanyid']; //'00001';
        // $icompanyidlogin = '00001';
        $this->db->query("call Jobcard_Print_Details('$DocId','$icompanyidlogin');");
        $result = $this->db->query("select DocId,DATE_FORMAT(DocDate,'%d/%m/%Y') as DocDate, JobNo, ClientName,WOID, JobName, ClientCodeNo, MISCodeNo, JobRate, round(JobQty) as JobQty, 
                     JobQtyAfterWastage, TotCartonWastage, GPN, QtyDisp, JobProcess,DATE_FORMAT(CommitedDate,'%d/%m/%Y') as CommitedDate, Printing, BoardIssuedSH,BoardIssuedKG, KraftIssued, TotalInput, Profit_Loss, FPID, ClientID, CartonDimension, ArtWork_Status, Die_Status,Item_Type, Item_Class, Req_Del_Sch, AccExeName, PONO, DocId, JobNo,round(OrderQty) as OrderQty,PlanMachine,BoardKg,BoardPack,FullBoardSH,CutSize1,Flutetype,Createdby,OtherDim,Margins,Gutters,DieNo,
                      KeyLineNo,DATE_FORMAT(SchDeliveryDate,'%d/%m/%Y') as SchDeliveryDate,DATE_FORMAT(PODate,'%d/%m/%Y') as PODate,JobCardRemarks,Artworkno,referencecode,JobArea,ClientShortName,EstimationNo,ADateTime,MdateTime,CreatedBy,ShadeCardNo,NewJob,Partial_RePrint,EnvelopeNo From JobInfo_temp");
        if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
                $ShadeCardNo = $row->ShadeCardNo;
                if ($ShadeCardNo == "") {
                    $ShadeCardNo = "";
                }
                $EnvelopeNo = $row->EnvelopeNo;
                if ($EnvelopeNo == "") {
                    $EnvelopeNo = "";
                }
                $createdatetime = $row->ADateTime;
                if ($createdatetime == "") {
                    $createdatetime = "";
                }
                $modidatetime = $row->MdateTime;
                if ($modidatetime == "") {
                    $modidatetime = "";
                }
                $createdatetime = $createdatetime . $modidatetime;
                $CreatedBy = $row->CreatedBy;
                if ($CreatedBy == "") {
                    $CreatedBy = "";
                }
                $JobName = $row->JobName;
                if ($JobName == "") {
                    $JobName = "";
                }
                $OrderQty = $row->OrderQty;
                if ($OrderQty == "") {
                    $OrderQty = "";
                }
                $PlanMachine = $row->PlanMachine;
                if ($PlanMachine == "") {
                    $PlanMachine = "";
                }
                $jobQty = $row->JobQty;
                if ($jobQty == "") {
                    $jobQty = "";
                }
                $ClientName = $row->ClientName;
                if ($ClientName == "") {
                    $ClientName = "";
                }
                $ClientCodeNo = $row->ClientCodeNo;
                if ($ClientCodeNo == "") {
                    $ClientCodeNo = "";
                }
                $MISCodeNo = $row->MISCodeNo;
                if ($MISCodeNo == "") {
                    $MISCodeNo = "";
                }
                $PONO = $row->PONO;
                if ($PONO == "") {
                    $PONO = "";
                }
                $WOID = $row->WOID;
                if ($WOID == "") {
                    $WOID = "";
                }
                $CommitedDate = $row->CommitedDate;
                if ($CommitedDate == "") {
                    $CommitedDate = "";
                }
                $CartonDimension = $row->CartonDimension;
                if ($CartonDimension == "") {
                    $CartonDimension = "";
                }
                $AccExeName = $row->AccExeName;
                if ($AccExeName == "") {
                    $AccExeName = "";
                }
                $Item_Class = $row->Item_Class;
                if ($Item_Class == "") {
                    $Item_Class = "";
                }
                $Item_Type = $row->Item_Type;
                if ($Item_Type == "") {
                    $Item_Type = "";
                }
                $JobNo = $row->DocId;
                if ($row->DocId == "") {
                    $JobNo = "";
                }
                $DocDate = $row->DocDate;
                if ($DocDate == "") {
                    $DocDate = "";
                }
                $dsf = $row->JobQty;
                if ($dsf == "") {
                    $dsf = "";
                }
                $TotCartonWastage = $row->TotCartonWastage;
                if ($TotCartonWastage == "") {
                    $TotCartonWastage = "";
                }
                $Die_Status = $row->Die_Status;
                if ($Die_Status == "") {
                    $Die_Status = "";
                }
                $releaseby = $row->CreatedBy;
                if ($releaseby == "") {
                    $releaseby = "";
                }
                $OtherDim = $row->OtherDim;
                if ($OtherDim == "") {
                    $OtherDim = "";
                }
                $Margins = $row->OtherDim;
                if ($Margins == "") {
                    $Margins = "";
                }
                $Gutters = $row->Gutters;
                if ($Gutters == "") {
                    $Gutters = "";
                }
                $DieNo = $row->DieNo;
                if ($DieNo == "") {
                    $DieNo = "";
                }
                $KeyLineNo = $row->KeyLineNo;
                if ($KeyLineNo == "") {
                    $KeyLineNo = "";
                }
                $JobArea = $row->JobArea;
                if ($JobArea == "") {
                    $JobArea = "";
                }
                $packet = "";
                $SchDeliveryDate = $row->SchDeliveryDate;
                if ($SchDeliveryDate == "") {
                    $SchDeliveryDate = "";
                }
                $PODate = $row->PODate;
                if ($PODate == "") {
                    $PODate = "";
                }
                $JobCardRemarks = $row->JobCardRemarks;
                if ($JobCardRemarks == "") {
                    $JobCardRemarks = "";
                }
                $Artworkno = $row->Artworkno;
                if ($Artworkno == "") {
                    $Artworkno = "";
                }
                $referencecode = $row->referencecode;
                if ($referencecode == "") {
                    $referencecode = "";
                }

                $ClientShortName = $row->ClientShortName;

                if ($ClientShortName == "") {
                    $ClientShortName = "";
                }

                $EstimationNo = $row->EstimationNo;

                if ($EstimationNo == "") {
                    $EstimationNo = '';
                }

                $NewJob = $row->NewJob;
                if ($NewJob == "Old") {
                    $NewJob = "Repeat";
                } elseif ($NewJob == "") {
                    $NewJob = "";
                }
                $Partial_RePrint = $row->Partial_RePrint;
                
            }
        }

        $resultJobDetail = $this->db->query("select DocId,FullSHDescription,GSM,UPS,Deckle,Grain,TotalSHeets,RowType,BoardGrainDirection,WastagePercentage From DocketBoardDetails where rowtype='F';");

        if ($resultJobDetail->num_rows() > 0) {
            $r=$resultJobDetail->result();
            foreach ($r as $row ) {
                $UPS = $row->UPS;
                $FullSHDescription = $row->FullSHDescription;
                $Deckle = $row->Deckle;
                $Grain = $row->Grain;
                $TotalSHeets = $row->TotalSHeets;
                $BoardGrainDirection = $row->BoardGrainDirection;
                $WastagePercentage = $row->WastagePercentage;
                $PacketV = '';
            }
        }
        $resultcompanyprofile = $this->db->query("select CompanyName, Address1, Address2, City, Phone1,EmailID from companyprofile where icompanyid='$icompanyidlogin';");
        if ($resultcompanyprofile->num_rows() > 0) {
            $r=$resultcompanyprofile->result();
            foreach ($r as $row) {
                $CompanyName = $row->CompanyName;
                $Address1 = $row->Address1;
                $Address2 = $row->Address2;
                $City = $row->City;
                $Phone1 = $row->Phone1;
                $EmailID = $row->EmailID;
            }
        }
        $pdf->AddPage();

        $pdf->SetAutoPageBreak(true,1.50);
        $pdf->SetY(5);
        $pdf->Cell(139);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "B", "8");
        // $pdf->Image('../../Images/netgen.png', 9, 3, 18, 12);
        // $pdf->Cell(99, 5, "NPPL/PR/FR/01", 0, 0, 'L');
        $pdf->Cell(99, 5, "", 0, 0, 'L');

        //$pdf->SetAutoPageBreak(FALSE);
        $pdf->Ln();
        $pdf->SetFont("Arial", "", "7");
        $pdf->Cell(193, 6, 'PRINT DATE AND TIME : ' . date('d/m/Y H:i:s'), 0, 0, "R");
        $pdf->Rect(10, 16, 193, 8, 'Arial');
        $pdf->SetFont("Arial", "", "16");
        $pdf->Ln();
        //$CompanyName
        $pdf->Cell(193, 8, $CompanyName, 0, 0, "C");
        // $pdf->Cell(193, 8, "JOBCARD", 0, 0, "C");
        $pdf->SetFont("Arial", "B", "7");
        $pdf->Ln();
        $pdf->Cell(50, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->Cell(40, 5, 'JOB DOCKET NO.', 1, 0, "L");
        $pdf->SetFont("Arial", "B", "9");
        $pdf->Cell(41, 5, trim($JobNo, "SOP"), 1, 0, "L");
        $pdf->SetFont("Arial", "B", "7");
        $pdf->Cell(31, 5, 'JOB DOCKET DATE', 1, 0, "L");
        $pdf->Cell(31, 5, $DocDate, 1, 0, "L");
        $pdf->Cell(25, 5, 'Die No', 1, 0, "L");
        $pdf->Cell(25, 5, $DieNo, 1, 0, "L");


        /*$pdf->Cell(11, 5, 'Die No', 1, 0, "C");
        $pdf->Cell(16, 5, $DieNo, 1, 0, "C");*/
        //$pdf->Cell(20, 5, "Envolope No.", 1, 0, "L");
        //$pdf->Cell(41, 5, "",1, 0, "L");
        $pdf->Ln();
        //$pdf->Ln();
        $pdf->SetFont("Arial", "B", "9");
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(73, 5, 'JOB NAME', 1, 0, "C", 1);
        $pdf->SetFont("Arial", "B", "7");
        //$pdf->Cell(15, 5, 'ShortName', 1, 0, "C", 1);
        $pdf->Cell(12, 5, 'ORDQTY', 1, 0, "C", 1);
        $pdf->Cell(9, 5, 'UPS', 1, 0, "C", 1);
        $pdf->SetFont("Arial", "B", "9");
        $pdf->Cell(19, 5, 'BATCH QTY', 1, 0, "C", 1);
        $pdf->SetFont("Arial", "B", "7");
        $pdf->Cell(17, 5, 'PROD. SIZE', 1, 0, "C", 1);
        //$pdf->Cell(15, 5, 'ODR. QTY', 1, 0, "C", 1);

        $pdf->Cell(20, 5, 'Prod. Type', 1, 0, "C", 1);
        //$pdf->Cell(15, 5, 'PO DATE', 1, 0, "C", 1);
        $pdf->Cell(15, 5, 'Order. No', 1, 0, "C", 1);
        $pdf->Cell(14, 5, 'APP DATE', 1, 0, "C", 1);
        $pdf->Cell(14, 5, 'DEL. DATE', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);

        $resultMultiple = $this->db->query("select Description,Jobqty,POqty,PONO,PODate,JobNo,MisCode,OrdQty,UpsInCutSheet,ClientShortnamem,WODate,Cartondimention,DATE_FORMAT(DilDate,'%d/%m/%y') as DilDate,productclass,WOID from Multiple_JobInfo_temp order by AutoID asc;");
        $jobtotal = 0.00;
        $k = 0;


        $fullerpcode = '';
        $cartondim = '';
        $productclass = '';
        if ($resultMultiple->num_rows() > 0) {
            $r=$resultMultiple->result();
            foreach ($r as $row) {


                $productclass = $row->productclass;
                $upscut = explode(".", $row->UpsInCutSheet);

                if ($row->MisCode != "") {

                    $fullerpcode = $fullerpcode . $row->MisCode . "/";
                }

                if ($upscut[1] > 5) {
                    $cutup_rou = $upscut[0] . $upscut[1];
                } else {
                    $cutup_rou = $upscut[0];
                }
                if ($row->Cartondimention == ' X  X ') {
                    $cartondim = "";
                }else{
                    
                    $cartondim = $row->Cartondimention;
                }


                $JobDocketQty = round($row->Jobqty, 2);
                $pdf->Ln();
                $pdf->SetFont("Arial", "B", "9");
                $pdf->Cell(73, 5, $row->Description, 1, 0, "L", 1);
                $pdf->SetFont("Arial", "B", "7");
                $pdf->Cell(12, 5, $row->OrdQty, 1, 0, "C", 1);
                $pdf->Cell(9, 5, $cutup_rou, 1, 0, "C", 1);
                $pdf->SetFont("Arial", "B", "9");
                $pdf->Cell(19, 5, round($JobDocketQty, 2), 1, 0, "C", 1);
                $pdf->SetFont("Arial", "B", "7");
                $pdf->Cell(17, 5, $cartondim, 1, 0, "C", 1);
                $pdf->Cell(20, 5, $row->productclass, 1, 0, "C", 1);
                $pdf->Cell(15, 5, $row->WOID, 1, 0, "C", 1);
                $pdf->Cell(14, 5, $row->WODate, 1, 0, "C", 1);
                $pdf->Cell(14, 5, $row->DilDate, 1, 0, "C", 1);
                $jobtotal = round($jobtotal, 2) + round($row->Jobqty, 2);
                $k++;
            }
        }


        if ($k > 1) {
            $JobDocketQty = round($jobtotal, 2);
            $pdf->Ln();
            $pdf->Cell(94, 5, 'Total', 1, 0, "L", 1);
            $pdf->Cell(13, 5, round($jobtotal, 2), 1, 0, "C", 1);
            $pdf->Cell(86, 5, '', 1, 0, "C", 1);
        }



        $pdf->Ln();
        $pdf->Cell(50, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->SetFont("Arial", "B", "7");
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        //$pdf->Cell(80, 5, 'Job Name', 1, 0, "C", 1);
        $pdf->Cell(20, 5, 'PONO', 1, 0, "C", 1);
        $pdf->Cell(12, 5, 'PODate', 1, 0, "C", 1);
        $pdf->Cell(25, 5, 'CUSTOMER CODE', 1, 0, "C", 1);
        $pdf->SetFont("Arial", "B", "9");
        $pdf->Cell(18, 5, 'ERP CODE', 1, 0, "C", 1);
        $pdf->SetFont("Arial", "B", "7");
        $pdf->Cell(16, 5, 'SHADECARD', 1, 0, "C", 1);
        $pdf->Cell(37, 5, 'Prod. Kind', 1, 0, "C", 1);
        $pdf->Cell(14, 5, 'OPENSIZE', 1, 0, "C", 1);
        $pdf->Cell(16, 5, 'FOLDEDSIZE', 1, 0, "C", 1);
        $pdf->Cell(35, 5, 'RE-PRINT/PARTIAL REMARKS', 1, 0, "C", 1);
        //$pdf->Cell(34, 5, 'SHADECARD NO & EX. Date', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);

        $resultMultiple = $this->db->query("select Description,AccCode,Iprefix,PONO,PODATE,ShadeCard,OpenSize,FoldedSize,RE_PRINT_PARTIAL_remaks,Kind from Multiple_JobInfo_temp order by AutoID asc;");

        if ($resultMultiple->num_rows() > 0) {
            $r= $resultMultiple->result();
            foreach ($r as $row) {
                $ShadeCard = 'NO';

                if ($row->ShadeCard == 1) {
                    $ShadeCard = 'YES';
                }

                $pdf->Ln();
                $pdf->Cell(20, 5, $row->PONO, 1, 0, "C", 1);
                $pdf->Cell(12, 5, $row->PODATE, 1, 0, "C", 1);
                $pdf->Cell(25, 5, $row->Iprefix, 1, 0, "C", 1);
                $pdf->SetFont("Arial", "B", "9");
                $pdf->Cell(18, 5, $row->AccCode, 1, 0, "C", 1);
                $pdf->SetFont("Arial", "B", "7");
                $pdf->Cell(16, 5, $ShadeCard, 1, 0, "C", 1);
                $pdf->Cell(37, 5, $row->Kind, 1, 0, "C", 1);
                $pdf->Cell(14, 5, $row->OpenSize, 1, 0, "C", 1);
                $pdf->Cell(16, 5, $row->FoldedSize, 1, 0, "C", 1);
                $pdf->Cell(35, 5, $row->RE_PRINT_PARTIAL_remaks, 1, 0, "C", 1);
            }
        }
        $pdf->Ln();
        $pdf->Cell(30, 5, 'CLIENT NAME', 1, 0, "L", 1);
        $pdf->Cell(72, 5, $ClientName, 1, 0, "L", 1);
        $pdf->Cell(20, 5, 'NEW/REPEAT', 1, 0, "L", 1);
        $pdf->Cell(20, 5, $NewJob, 1, 0, "L", 1);
        $pdf->Cell(30, 5, "RE-PRINT/PARTIAL", 1, 0, "L", 1);
        $pdf->Cell(21, 5, $Partial_RePrint, 1, 0, "L", 1);
        $pdf->Ln();
        // $pdf->Cell(30, 5, 'SUPERSEED NO.', 1, 0, "L", 1);
        // $pdf->Cell(26, 5, $referencecode, 1, 0, "L", 1);
        $pdf->Cell(30, 5, 'ARTWORKNO', 1, 0, "L", 1);
        $pdf->Cell(72, 5, $Artworkno, 1, 0, "L", 1);
        $pdf->Cell(30, 5, "PRODUCT FILE NO.", 1, 0, "L", 1);
        $pdf->Cell(61, 5, $EnvelopeNo, 1, 0, "L", 1);
        $pdf->Ln();
        $pdf->Cell(30, 5, 'REMARKS', 1, 0, "L", 1);
        $pdf->SetFont("Arial", "BIU", "9");
        $pdf->Cell(163, 5, $JobCardRemarks, 1, 0, "L");
        $pdf->SetFont("Arial", "B", "7");
        $pdf->SetFillColor(0, 0, 0);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Ln();
        $pdf->Cell(50, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->Cell(193, 5, 'DELIVERY DETAILS', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $Res = $this->db->query("select CompanyName,Address,City,State,QtyToDeliver,
                        DATE_FORMAT(SchDeliveryDate,'%d/%m/%Y') as SchDeliveryDate from JobInfo_del_temp;");
        if ($Res->num_rows() > 0) {
            $r=$Res->result();
            foreach ($r as $row ) {
                $AaDelCompanyName = $row->CompanyName;
                $ADelAddress = $row->Address;
                $ADelCity = $row->City;
                $ADelState = $row->State;
                $ADelQtyToDeliver = $row->QtyToDeliver;
                $ADelSchDeliveryDate = $row->SchDeliveryDate;
            }
            $pdf->Ln();
            $pdf->Cell(25, 5, 'COMPANY NAME', 1, 0, "L", 1);
            $pdf->Cell(95, 5, $AaDelCompanyName, 1, 0, "L", 1);
            $pdf->Cell(20, 5, 'CITY & STATE', 1, 0, "L", 1);
            $pdf->Cell(53, 5, $ADelCity . " " . $ADelState, 1, 0, "L", 1);
            $len = strlen($ADelAddress);
            $text1 = WordWrap($ADelAddress, 70, "\n");

            $loop_limit = ceil($len / 70);
            $loop_limit1 = substr_count($ADelAddress, "\n");
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                } elseif ($loop_limit1 == $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }

            $pdf->Ln();
            $pdf->Cell(25, $height, 'ADDRESS', 1, 0, "L", 1);
            $pdf->Cell(95, $height, $text1, 1, 0, "L", 1);
            $pdf->Cell(73, $height, 'Qty :' . $ADelQtyToDeliver . "  " . 'Delivery Date:' . $ADelSchDeliveryDate, 1, 0, "L", 1);
        } else {
            $pdf->Ln();
            $pdf->Cell(25, 5, 'COMPANY NAME', 1, 0, "L", 1);
            $pdf->Cell(90, 5, '', 1, 0, "L", 1);
            $pdf->Cell(25, 5, 'CITY & STATE', 1, 0, "L", 1);
            $pdf->Cell(53, 5, '', 1, 0, "L", 1);
            $pdf->Ln();
            $pdf->Cell(25, 5, 'ADDRESS', 1, 0, "L", 1);
            $pdf->Cell(90, 5, '', 1, 0, "L", 1);
            $pdf->Cell(25, 5, 'QTY & DATE', 1, 0, "L", 1);
            $pdf->Cell(53, 5, '', 1, 0, "L", 1);
        }
        // $pdf->Ln();
        // $pdf->SetFillColor(255, 255, 255);
        // $pdf->SetTextColor(0, 0, 0);
        // $resultInk_temp = $this->db->query("select MachineName from PrintMachine_Process_temp;");
        // if ($resultInk_temp->num_rows() > 0) {
        //     $r=$resultInk_temp->result();
        //     foreach ($r as $row) {
        //         $pdf->Ln();
        //         $pdf->Cell(50, 5, 'Printing Machine Name', 1, 0, "L", 0);
        //         $pdf->Cell(43, 5, $row->MachineName, 1, 0, "L", 0);
        //     }
        // }
        // $pdf->Cell(50, 5, 'Job Area', 1, 0, "L", 0);
        // $pdf->Cell(50, 5, $JobArea, 1, 0, "L", 0);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Ln();
        $pdf->Cell(50, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->Cell(193, 5, 'BOARD DETAILS', 1, 0, "C", 1);
        $pdf->Ln();
        $pdf->Cell(35, 5, 'BOARD SIZE', 1, 0, "C", 1);
        $pdf->Cell(31, 5, 'GSM', 1, 0, "C", 1);
        $pdf->Cell(52, 5, 'TYPE', 1, 0, "C", 1);
        $pdf->Cell(25, 5, 'UPS', 1, 0, "C", 1);
        $pdf->Cell(25, 5, 'SHEETS', 1, 0, "C", 1);
        $pdf->Cell(25, 5, 'KG', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $Res = $this->db->query("select Deckle/10 as Deckle ,Grain/10 as Grain,Gsm,Boardkind,UPS,TotalSHeets,BoardKg from DocketBoardDetails Where RowType='F';");
        if ($Res->num_rows() > 0) {
            $r=$Res->result();
            foreach ($r as $row) {
                $pdf->Ln();
                $pdf->Cell(35, 5, round($row->Deckle, 3) . " X " . round($row->Grain, 3) . " CM", 1, 0, "C", 1);
                $pdf->Cell(31, 5, $row->Gsm, 1, 0, "C", 1);
                $pdf->Cell(52, 5, $row->Boardkind, 1, 0, "C", 1);
                $pdf->Cell(25, 5, $row->UPS, 1, 0, "C", 1);
                $pdf->Cell(25, 5, $row->TotalSHeets, 1, 0, "C", 1);
                $pdf->Cell(25, 5, $row->BoardKg, 1, 0, "C", 1);
            }
        }
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Ln();
        $pdf->Cell(50, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->Cell(30, 5, 'CUT SIZE', 1, 0, "C", 1);
        $pdf->Cell(31, 5, 'WITHOUT WAST. SHEET', 1, 0, "C", 1);
        $pdf->Cell(26, 5, 'WASTAGE SHEET', 1, 0, "C", 1);
        $pdf->Cell(17, 5, 'NO. OF CUTS', 1, 0, "C", 1);
        $pdf->Cell(25, 5, 'CUT SHEET UPS', 1, 0, "C", 1);
        $pdf->Cell(22, 5, 'TO. NO. SHEETS', 1, 0, "C", 1);
        $pdf->Cell(22, 5, 'TO. NO. CARTON', 1, 0, "C", 1);
        $pdf->Cell(20, 5, 'WASTAGE (%)', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $resultInk_temp = $this->db->query("select UPS,Deckle/10 as Deckle,Grain/10 as Grain,TotalSHeets,"
                . "NoOfCutPieces,RowType,GrainDirection,WastagePercentage ,WastageSheets,TotalCutSHeets from DocketBoardDetails Where RowType='C';");
        if ($resultInk_temp->num_rows() > 0) {
            $r=$resultInk_temp->result();
            foreach ($r as $row) {
                $BUPS = $row->UPS;
                $BDeckle = $row->Deckle;
                $BGrain = $row->Grain;
                $BTotalSHeets = $row->TotalSHeets;
                $BNoOfCutPieces = $row->NoOfCutPieces;
                $GrainDirection = $row->GrainDirection;
                $WastagePercentage = $row->WastagePercentage;
                $WastageSheets = $row->WastageSheets;
                $TotalCutSHeets = $row->TotalCutSHeets;
                if ($UPS == 0 || $UPS == Null) {
                    $UPS = 1;
                }
                $pdf->Ln();
                $pdf->Cell(30, 5, round($BDeckle, 3) . " X " . round($BGrain, 3) . " CM" . " " . $GrainDirection, 1, 0, "C", 1);
                $pdf->Cell(31, 5, $BTotalSHeets, 1, 0, "C", 1);
                $pdf->Cell(26, 5, $WastageSheets, 1, 0, "C", 1);
                $pdf->Cell(17, 5, $BNoOfCutPieces, 1, 0, "C", 1);
                $pdf->Cell(25, 5, $BUPS, 1, 0, "C", 1);
                $pdf->Cell(22, 5, $TotalCutSHeets, 1, 0, "C", 1);
                $pdf->Cell(22, 5, $BUPS * $TotalCutSHeets, 1, 0, "C", 1);
                $pdf->Cell(20, 5, round($WastagePercentage, 4), 1, 0, "C", 1);
            }
        }
        // $pdf->Ln();
        // $pdf->SetTextColor(0, 0, 0);
        // $pdf->Cell(50, 4, '', 0, 0, "C");
        // $pdf->Ln();
        // $pdf->Cell(193, 5, '', 1, 0, "C", 1);
        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(50, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->Cell(100, 5, 'INK FRONT', 1, 0, "C", 1);
        $pdf->Cell(93, 5, 'INK BACK', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $resultInk_temp = $this->db->query("select Description1,Description2 from test_manoj_inkcomman;");
        if ($resultInk_temp->num_rows() > 0) {
            $r = $resultInk_temp->result();
            foreach ($r as $row) {
                $fontink = $row->Description1;
                $backink = $row->Description2;
                $pdf->Ln();
                $pdf->Cell(100, 5, $fontink, 1, 0, "L", 0);
                $pdf->Cell(93, 5, $backink, 1, 0, "L", 0);
            }
        }
        $pdf->Ln();
        $pdf->Cell(65, 4, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(193, 5, 'OPERATION DETAIL', 1, 0, "C", 1);
        $pdf->Ln();
        $pdf->Cell(40, 5, 'OPERATION', 1, 0, "C", 1);
        $pdf->Cell(70, 5, 'DETAIL', 1, 0, "C", 1);
        $pdf->Cell(30, 5, 'Machine Name', 1, 0, "C", 1);
        $pdf->Cell(53, 5, 'REMARK', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $resultDocketProcessDetails = $this->db->query("select DocId,ProcessDetails1,ProcessDetails2,ProcessDetails3,FormDetails, Remarks, PrName, TotalForms,MachineNames from DocketProcessDetails  order by PrUniqueNo asc;");
        if ($resultDocketProcessDetails->num_rows() > 0) {
            $r = $resultDocketProcessDetails->result();
            $grp_asd = array();
            $k = 0;
            foreach ($r as $row) {
                $grp_asd[$k] = array($row->PrName, $row->ProcessDetails1,
                    $row->ProcessDetails2, $row->ProcessDetails3, $row->Remarks, $row->MachineNames);
                $k++;
            }
        }
        $size = sizeof($grp_asd);
        for ($j = 0; $j < $size; $j++) {
            $grpp = $grp_asd[$j];
            $pdf->SetFont("Arial", "B", "7");
            $pdf->Ln();
            $pdf->Cell(40, 5, $grpp[0], 1, 0, "L", 1);
            $pdf->Cell(70, 5, $grpp[1] . "" . $grpp[2] . "" . $grpp[3], 1, 0, "L", 1);
            $pdf->Cell(30, 5, $grpp[5], 1, 0, "L", 1);
            $pdf->Cell(53, 5, $grpp[4], 1, 0, "L", 1);
        }
        

        $resultdocketmaterialdetails = $this->db->query("select NoOfFold,FoldSize,Horizontalfold,
                Verticalfold,SizeAfterFold from fpfolding where 
                ProductID=(select FPID from item_reversecost_master where DocID='$DocId' and MajorItem = 1
                and icompanyid='".$this->company_id."');");
    
                
        if ($resultdocketmaterialdetails->num_rows() > 0) {
        $pdf->Ln();
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(50, 2, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFillColor(54, 101, 194);
        $pdf->Cell(193, 5, 'Folding', 1, 0, "C", 1);

        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(41, 5, 'No Of Fold', 1, 0, "C", 1);
        $pdf->Cell(38, 5, 'Open Size', 1, 0, "C", 1);
        $pdf->Cell(38, 5, 'Horizontal Fold', 1, 0, "C", 1);
        $pdf->Cell(38, 5, 'Vertical Fold', 1, 0, "C", 1);
        $pdf->Cell(38, 5, 'Size After Fold', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);

                    $r = $resultdocketmaterialdetails->result();
                    $i = 1;
                    foreach ($r as $row) {

                        $pdf->Ln();
                        $pdf->Cell(41, 5, $row->NoOfFold, 1, 0, "C", 1);
                        $pdf->Cell(38, 5, $row->FoldSize, 1, 0, "C", 1);
                        $pdf->Cell(38, 5, $row->Horizontalfold, 1, 0, "C", 1);
                        $pdf->Cell(38, 5, $row->Verticalfold, 1, 0, "C", 1);
                        $pdf->Cell(38, 5, $row->SizeAfterFold, 1, 0, "C", 1);
                        $i++;
                    }
        }

        $catchcoverdetails = $this->db->query("select ProductID,SidePast,OtherDimension1,OtherDimension2,OtherDimension3,FlapSideGutter,PastSideGutter
 from item_fpmasterext where productid=(select FPID from item_reversecost_master where DocID='$DocId' and MajorItem = 1
                and icompanyid='".$this->company_id."');");
    
                
        if ($catchcoverdetails->num_rows() > 0) {
            if ($productclass == 'Catch Cover') {
                $pdf->Ln();
                $pdf->SetFillColor(255, 255, 255);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Cell(50, 2, '', 0, 0, "C");
                $pdf->Ln();
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(211, 211, 211);
                $pdf->Cell(193, 5, 'Catch Cover Details', 1, 0, "C", 1);

                $pdf->Ln();
                $pdf->SetTextColor(255, 255, 255);
                $pdf->SetFillColor(54, 101, 194);
                $pdf->Cell(41, 5, 'Height', 1, 0, "C", 1);
                $pdf->Cell(30, 5, 'Breadth', 1, 0, "C", 1);
                $pdf->Cell(38, 5, 'Pockect Height', 1, 0, "C", 1);
                $pdf->Cell(30, 5, 'Top Wall', 1, 0, "C", 1);
                $pdf->Cell(38, 5, 'Pasting Flap', 1, 0, "C", 1);
                $pdf->Cell(16, 5, 'Side Wall', 1, 0, "C", 1);
                $pdf->SetFillColor(255, 255, 255);
                $pdf->SetTextColor(0, 0, 0);

                            $r = $catchcoverdetails->result();
                            $i = 1;
                            foreach ($r as $row) {

                                $pdf->Ln();
                                $pdf->Cell(41, 5, round($row->SidePast,2), 1, 0, "C", 1);
                                $pdf->Cell(30, 5, round($row->OtherDimension1,2), 1, 0, "C", 1);
                                $pdf->Cell(38, 5, round($row->OtherDimension2,2), 1, 0, "C", 1);
                                $pdf->Cell(30, 5, round($row->OtherDimension3,2), 1, 0, "C", 1);
                                $pdf->Cell(38, 5, round($row->FlapSideGutter,2), 1, 0, "C", 1);
                                $pdf->Cell(16, 5, round($row->PastSideGutter,2), 1, 0, "C", 1);
                                $i++;
                            }
            }
        }

        // $x = $pdf->GetX();
        // $y = $pdf->GetY();
        // if ($y + 40 > 271) {
        //     $pdf->AddPage();
        //     $x = $pdf->GetX();
        //     $y = $pdf->GetY();
        // }

        $pdf->Ln();
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(50, 2, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(50, 2, '', 0, 0, "C");
        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(193, 5, 'Material Required', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(10, 5, 'Sr No', 1, 0, "C", 1);
        $pdf->Cell(100, 5, 'Item Name', 1, 0, "C", 1);
        $pdf->Cell(30, 5, 'Req. Qty', 1, 0, "C", 1);
        $pdf->Cell(53, 5, 'Unit', 1, 0, "C", 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $resultdocketmaterialdetails = $this->db->query("select DocId,RequiredMaterial,RequiredQty,RequiredUnit,GroupName,AllocatedMaterial,AllocatedQty,MatStatus,ExpDate from docketmaterialdetails");
        if ($resultdocketmaterialdetails->num_rows() > 0) {
            $r = $resultdocketmaterialdetails->result();
            $i = 1;
            foreach ($r as $row) {
                $RequiredMaterial = $row->RequiredMaterial;
                $RequiredQty = $row->RequiredQty;
                $RequiredUnit = $row->RequiredUnit;
                $pdf->Ln();
                $pdf->Cell(10, 5, $i, 1, 0, "C", 1);
                $pdf->Cell(100, 5, $RequiredMaterial, 1, 0, "L", 1);
                $pdf->Cell(30, 5, round($RequiredQty), 1, 0, "R", 1);
                $pdf->Cell(53, 5, $RequiredUnit, 1, 0, "L", 1);
                $i++;
            }
        }
        
        // echo "select PicInBinary from layouting_jobcard_temp;";die;
        $result_image = $this->db->query("select PicInBinary from layouting_jobcard_temp;");
        if ($result_image->num_rows() > 0) {
            $r = $result_image->result();
            foreach ($r as $row) {
                $x = $pdf->GetX();
                $y = $pdf->GetY();
                if ($y + 60 < 271) {
                    $pdf->MemImage($row->PicInBinary, $x, $y, 100, 60);
                    $pdf->SetY($y + 65);
                } else {
                    $pdf->AddPage();
                    $x = $pdf->GetX();
                    $y = $pdf->GetY();
                    $y = $y;
                    $pdf->MemImage($row->PicInBinary, $x, $y, 100, 60);
                    $pdf->SetY($y + 65);
                }
            }
        }
        $pdf->Ln();
        $pdf->Cell(100, 5, 'CREATED USER & DATE TIME :' . $CreatedBy . " " . $createdatetime, 0, 0, "L");
        $pdf->Cell(93, 5, 'APPROVED BY', 0, 0, "R");
        //$pdf->SetAutoPageBreak(true);
$pdf->AddPage();


$pdf->SetFont("Arial", "", "9");
$pdf->SetFont("Arial", "B", "7");
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'RAW MATERIAL DETAIL', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(26, 5, 'Issue No -- Date', 1, 0, "C", 1);
$pdf->Cell(26, 5, 'GRN No -- Date', 1, 0, "C", 1);
$pdf->Cell(55, 5, 'Description', 1, 0, "C", 1);
$pdf->Cell(10, 5, 'Quantity', 1, 0, "C", 1);
$pdf->Cell(28, 5, 'IMR No  --  Date', 1, 0, "C", 1);
$pdf->Cell(48, 5, 'Remarks', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$rm_data = $this->db->query("Select concat(docid,' - ',docdate) as issue, concat(MatGRNNo,' - ',MatGRNDt) as grn, itemid, Description, qty, 
    concat(IMRDocID,' - ',IMRDocDate) as IMR, IMr_remarks from job_rawmaterial;");
if ($rm_data->num_rows() > 0) {
    $r=$rm_data->result();
    $grp_rm = array();
    $k = 0;
    foreach ($r as $row) {
        $Remarks = $row->IMr_remarks;

        $len = strlen($Remarks);
        $text1 = WordWrap($Remarks, 50, "\n");

        $loop_limit = ceil($len / 50);
        $loop_limit1 = substr_count($Remarks, "\n");
        if ($loop_limit > 1 || $loop_limit1 > 1) {
            if ($loop_limit > $loop_limit1) {
                $height = 5 * $loop_limit;
            } elseif ($loop_limit1 > $loop_limit) {
                $height = 5 * $loop_limit1;
            } elseif ($loop_limit1 == $loop_limit) {
                $height = 5 * $loop_limit1;
            }
        } else {
            $height = 5 * 1;
        }

        $pdf->Ln();
        $pdf->Cell(26, $height, $row->issue, 1, 0, "L");
        $pdf->Cell(26, $height, $row->grn, 1, 0, "L");
        $pdf->Cell(55, $height, $row->Description, 1, 0, "L");
        $pdf->Cell(10, $height, $row->qty, 1, 0, "L");
        $pdf->Cell(28, $height, $row->IMR, 1, 0, "L");
        $pdf->Cell(48, $height, $text1, 1, 0, "L");
        $k++;
    }
}


$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'PRODUCTION DETAIL', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(15, 5, 'Date', 1, 0, "C", 1);
$pdf->Cell(8, 5, 'Shift', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'M/C Name', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Process Name', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Qty. Produced', 1, 0, "C", 1);
$pdf->Cell(22, 5, 'Operator Name', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'P. Wastage X NO. Of Ups', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'Sign of Foreman', 1, 0, "C", 1);
$pdf->Cell(40, 5, 'Remarks', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$prod_data = $this->db->query("Select Starttime,Shift,Machinename,Output, operator, Wastage,supervisior,processname,Remarks from job_production_detail;");
if ($prod_data->num_rows() > 0) {
    $r=$prod_data->result();
    $grp_prod = array();
    $k = 0;
    foreach ($r as $row) {
        $pdf->Ln();
        $pdf->Cell(15, 5, $row->Starttime, 1, 0, "L");
        $pdf->Cell(8, 5, $row->Shift, 1, 0, "L");
        $pdf->Cell(20, 5, $row->Machinename, 1, 0, "L");
        $pdf->Cell(20, 5, $row->processname, 1, 0, "L");
        $pdf->Cell(18, 5, $row->Output, 1, 0, "L");
        $pdf->Cell(22, 5, $row->operator, 1, 0, "L");
        $pdf->Cell(25, 5, $row->Wastage, 1, 0, "L");
        $pdf->Cell(25, 5, $row->supervisior, 1, 0, "L");
        $pdf->Cell(40, 5, $row->Remarks, 1, 0, "L");
        $k++;
    }
}


$pdf->Ln();




/*Scuff Test Report */
$pdf->Ln();
$pdf->Cell(65, 1, '', 0, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(65, 1, '', 0, 0, "C", 1);
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'Scuff Test Report', 1, 0, "C", 1);
$pdf->Ln();

$pdf->Cell(40, 5, 'Test Date Time', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'Docket No', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'Check By', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'Approved By', 1, 0, "C", 1);
$pdf->Cell(53, 5, 'Remarks', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$grp_asd2='';
$resultDocketProcessDetails2 = $this->db->query("select a.ScuffID,a.ADateTime,a.DocketNo,a.CheckByID,a.ApprovedBy,a.SRemarks,b.UserName as Approvedper,c.UserName as checkedper from  item_scuff_master   as a, usermaster as b  , usermaster as c  where DocketNo = '$DocId' and a.ApprovedBy = b.UserID and a.CheckByID = c.UserID ; ");
if ($resultDocketProcessDetails2->num_rows() > 0) {
    $r=$resultDocketProcessDetails2->result();
    $grp_asd2 = array();
    $k = 0;
    foreach ($r as $row) {
        $grp_asd2[$k] = array($row2->ADateTime, $row2->DocketNo,
            $row2->checkedper, $row2->Approvedper, $row2->SRemarks);
        $k++;
    }


    $size = sizeof($grp_asd2);
for ($j = 0; $j < $size; $j++) 
{
    $grpp2 = $grp_asd2[$j];
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(40, 5, $grpp2[0], 1, 0, "L", 1);
    $pdf->Cell(30, 5, $grpp2[1], 1, 0, "L", 1);
    $pdf->Cell(35, 5, $grpp2[2], 1, 0, "L", 1);
    $pdf->Cell(35, 5, $grpp2[3], 1, 0, "L", 1);
    $pdf->Cell(53, 5, $grpp2[4], 1, 0, "L", 1);
}
}

$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'PACKING SLIP', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(103, 5, '', 1, 0, "C", 1);
$pdf->Cell(90, 5, 'PACKING SLIP / LABELS DETAILS', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(15, 5, 'Date', 1, 0, "C", 1);
$pdf->Cell(8, 5, 'Shift', 1, 0, "C", 1);
$pdf->Cell(65, 5, 'Job Name - Code', 1, 0, "C", 1);
$pdf->Cell(15, 5, 'Packed Qty.', 1, 0, "C", 1);
$pdf->Cell(10, 5, 'Req Nos.', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'Packed By', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'Remaining No. Returned', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'Reason for Returning', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$p_slip  = $this->db->query("select * from Packing_slip_temp;");

if ($p_slip->num_rows() > 0) {
    $r=$p_slip->result();
    $i = 1;
   foreach ($r as $row) {
        $pdf->Ln();
        $pdf->Cell(15, 5, $row->PackDate, 1, 0, "L", 1);
        $pdf->Cell(8, 5, $row->Shift, 1, 0, "L", 1);
        $pdf->Cell(65, 5, $row->ItemDesc, 1, 0, "L", 1);
        $pdf->Cell(15, 5, $row->Quantity, 1, 0, "L", 1);
        $pdf->Cell(10, 5, $row->BoxNo, 1, 0, "L", 1);
        $pdf->Cell(25, 5, $row->PackedBy, 1, 0, "L", 1);
        $pdf->Cell(25, 5, $row->NosReturned, 1, 0, "L", 1);
        $pdf->Cell(30, 5, $row->Reason, 1, 0, "L", 1);

        $i++;
    }
}


$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'GPN DETAIL', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(50, 5, 'Doc Date Time', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'Quantity', 1, 0, "C", 1);
$pdf->Cell(43, 5, 'Pack Details', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'prepared by', 1, 0, "C", 1);
$pdf->Cell(50, 5, 'Doc ID', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$gpn  = $this->db->query("select a.DocID,a.ItemID,a.ADateTime,a.AUID,c.UserName, date_format(a.DocDate,'%d-%m-%Y') as DocDate, round(sum(a.Qty), 2) as Qty,
SUBSTRING_INDEX(SUBSTRING_INDEX(packDetails, '#', -2),'#',1) as Packets
,group_concat(replace(SUBSTRING_INDEX(PackDetails, '#', 2),'#','x')) as PacketDetails from item_ledger_gpn as a , usermaster as c
    where JobCardID = '$DocId' and a.AUID = c.UserID group by Docid,ItemID;");



if ($gpn->num_rows() > 0) {
    $r=$gpn->result();
    $i = 1;
    $Qty_total='0';
    
    foreach ($r as $row) {
        $pdf->Ln();
        $pdf->Cell(50, 5, $row->ADateTime, 1, 0, "L", 1);
        $pdf->Cell(25, 5, $row->Qty, 1, 0, "L", 1);
        $pdf->Cell(43, 5, $row->PacketDetails, 1, 0, "L", 1);
        $pdf->Cell(25, 5, $row->UserName, 1, 0, "L", 1);
        $pdf->Cell(50, 5, $row->DocID, 1, 0, "L", 1);

         $Qty_total += $row->Qty;
        $i++;
    }
     $pdf->Ln();
        //$pdf->Cell(20, 5, '', 1, 0, "L", 1);
        $pdf->Cell(50, 5, 'Total :', 1, 0, "C", 1);
        $pdf->Cell(143, 5, $Qty_total, 1, 0, "L", 1);
}




/*Finish Product Analysis (FPA) */
$pdf->Ln();
$pdf->SetFont("Arial", "B", "7");
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'Finish Product Analysis (FPA)', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(26, 5, 'Doc Date', 1, 0, "C", 1);
$pdf->Cell(26, 5, 'Packed Qty', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'Rejected Qty', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'Accpted Qty', 1, 0, "C", 1);
$pdf->Cell(28, 5, 'Approved by', 1, 0, "C", 1);
$pdf->Cell(48, 5, 'Remark', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$GPN='KP/PK/19/154';
$rm_data = $this->db->query("select a.Remarks, a.ADateTime, a.PackedQty,a.RejectedQty,a.AccptedQty,a.Approvedby,b.UserName from   Item_gpnsampling as a, usermaster as b   where JobCardID = '$DocId' and a.Approvedby = b.UserID ; ");
if ($rm_data->num_rows() > 0) {
    $r=$rm_data->result();
    $grp_rm = array();
    $k = 0;
    $PackedQty_total='0';
    $RejectedQty_total='0';
    $Accept_total='0';
    foreach ($r as $row) {
        $Remarks = $row->Remarks;

        $len = strlen($Remarks);
        $text1 = WordWrap($Remarks, 50, "\n");

        $loop_limit = ceil($len / 50);
        $loop_limit1 = substr_count($Remarks, "\n");
        if ($loop_limit > 1 || $loop_limit1 > 1) {
            if ($loop_limit > $loop_limit1) {
                $height = 5 * $loop_limit;
            } elseif ($loop_limit1 > $loop_limit) {
                $height = 5 * $loop_limit1;
            } elseif ($loop_limit1 == $loop_limit) {
                $height = 5 * $loop_limit1;
            }
        } else {
            $height = 5 * 1;
        }

        $pdf->Ln();
        $pdf->Cell(26, $height, $row->ADateTime, 1, 0, "L");
        $pdf->Cell(26, $height, $row->PackedQty, 1, 0, "L");
        $pdf->Cell(30, $height, $row->RejectedQty, 1, 0, "L");
        $pdf->Cell(35, $height, $row->AccptedQty, 1, 0, "L");
        $pdf->Cell(28, $height, $row->UserName, 1, 0, "L");
        $pdf->Cell(48, $height, $text1, 1, 0, "L");
        $PackedQty_total += $row->PackedQty;
        $RejectedQty_total += $row->RejectedQty;
        $Accept_total += $row->AccptedQty;
        $k++;
    }

      $pdf->Ln();
        //$pdf->Cell(20, 5, '', 1, 0, "L", 1);
        $pdf->Cell(26, $height, 'Total :', 1, 0, "C", 1);
        $pdf->Cell(26, $height, $PackedQty_total, 1, 0, "L", 1);
        $pdf->Cell(30, $height, $RejectedQty_total, 1, 0, "L", 1);
        $pdf->Cell(35, $height, $Accept_total, 1, 0, "L", 1);
        $pdf->Cell(28, $height, '', 1, 0, "L", 1);
        $pdf->Cell(48, $height, '', 1, 0, "L", 1); 


}


$pdf->Ln();



/*Fpa end */

$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'DESPATCH DETAIL', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(20, 5, 'Invoice No.', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Invoice Date', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'No. of Boxes', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Packing', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Total Qty.', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Wo ID.', 1, 0, "C", 1);
$pdf->Cell(60, 5, 'Destination', 1, 0, "C", 1);
$pdf->Cell(23, 5, 'L.R. No.', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$desp  = $this->db->query("select b.InvNo,b.woid, date_format(b.InvDt,'%d-%m-%Y') as InvDt, a.ChallanNo, b.NoofItems, b.ParcelSize, b.Quantity,a.Remarks 
    from item_chmaster as a left join item_chdetail as b on a.docid=b.docId where b.chdisplay = '$DocId' and b.IsActive = 0;");

if ($desp->num_rows() > 0) {
    $r=$desp->result();
    $i = 1;
    $grand_tot_quan = 0;
    $grand_box = 0;
    foreach ($r as $row) {
        $Remarks = $row->Remarks;

        $len = strlen($Remarks);
        $text1 = WordWrap($Remarks, 40, "\n");

        $loop_limit = ceil($len / 50);
        $loop_limit1 = substr_count($Remarks, "\n");
        if ($loop_limit > 1 || $loop_limit1 > 1) {
            if ($loop_limit > $loop_limit1) {
                $height = 5 * $loop_limit;
            } elseif ($loop_limit1 > $loop_limit) {
                $height = 5 * $loop_limit1;
            } elseif ($loop_limit1 == $loop_limit) {
                $height = 5 * $loop_limit1;
            }
        } else {
            $height = 5 * 1;
        }

        $pdf->Ln();
        $pdf->Cell(20, $height, $row->InvNo, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->InvDt, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->NoofItems, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->ParcelSize, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->Quantity, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->woid, 1, 0, "L", 1);
        $pdf->Cell(60, $height, $text1, 1, 0, "L", 1);
        $pdf->Cell(23, $height, '', 1, 0, "L", 1);
        $grand_tot_quan += $row->Quantity;
        $grand_box += $row->NoofItems;

        $i++;
    }
        $pdf->Ln();
        //$pdf->Cell(20, 5, '', 1, 0, "L", 1);
        $pdf->Cell(38, 5, 'Grand Total -', 1, 0, "R", 1);
        $pdf->Cell(18, 5, $grand_box, 1, 0, "L", 1);
        $pdf->Cell(18, 5, '', 1, 0, "L", 1);
        $pdf->Cell(18, 5, $grand_tot_quan, 1, 0, "L", 1);
        $pdf->Cell(78, 5, '', 1, 0, "L", 1);
        $pdf->Cell(23, 5, '', 1, 0, "L", 1); 
}


$result = $this->db->query("select JClose,date_format(CloseDate, '%d/%m/%Y') as closedate,CloseResaon from item_jobcardmaster where docid = '$DocId';");
if ($result->num_rows() > 0) {
    $r=$result->result();
    foreach ($r as $row) {
        $JClose = $row->JClose;
        if ($JClose == 0) {
            $JClose = "Job Not Close";
        }else{
            $JClose = "Job Close";

        }
        $closedate = $row->closedate;
        if ($closedate == "01/01/2060") {
            $closedate = "";
        }
        $CloseResaon = $row->CloseResaon;
        if ($CloseResaon == "") {
            $CloseResaon = "";
        }
    }
}
$pdf->Ln(20);
$pdf->SetFont("Arial", "B", "7");
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'JOB STATUS', 1, 0, "C", 1);
$pdf->Ln();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(30, 5, 'STATUS', 1, 0, "L", 1);
$pdf->Cell(26, 5, $JClose, 1, 0, "L", 1);
$pdf->Cell(20, 5, 'CLOSE DATE', 1, 0, "L", 1);
$pdf->Cell(26, 5, $closedate, 1, 0, "L", 1);
$pdf->Cell(30, 5, "CLOSE REASON.", 1, 0, "L", 1);
$pdf->Cell(61, 5, $CloseResaon, 1, 0, "L", 1);
$pdf->Ln(10);
$pdf->Cell(193, 5, "THIS  IS A COMPUTER GENERATED DOCUMENT, HENCE NO SIGNATURE IS  REQUIRED", 0, 0, "C");

        $pdf->Output();


        }

}
