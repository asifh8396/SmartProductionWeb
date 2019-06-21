<?php
class Jobcard_printout_comm extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index () {
        $this->load->library('PDF');
        $pdf = new PDF('P','mm','A4');
        date_default_timezone_set('Asia/Kolkata');
        $DocId = $_GET['hdn_docid'];
        $icompanyidlogin = $_GET['Icompanyid'];
        $vendorid = "";
        $JobDocketQty = 0;


$proeces = $this->db->query("call Comm_Jobcard_Print_Out_OB('$DocId','$icompanyidlogin','$vendorid');");
$result = $this->db->query("select DocId,date_format(DocDate,'%m/%d/%Y') as DocDate,JobName,JobNo,OrderQty,JobQty, ClientName,PONO, "
        . "date_format(PODate,'%d/%m/%Y') as PODate,Item_Class,EstimationNo,Item_Type,CartonDimension,order_date  from JobInfo_temp;");
    if ($result->num_rows() > 0) {
        $r=$result->result();
            foreach ($r as $row) {
        $DocId = $row->DocId;
        if ($DocId == "") {
            $DocId = "";
        }

        $DocDate = $row->DocDate;
        if ($DocId == "") {
            $DocId = "";
        }
//
        $order_date = $row->order_date;
        if ($order_date == "") {
            $order_date = "";
        }
//

    }
}
$payment_terms='';
$LastDeliveryDate='';

$results = $this->db->query("select JobNo,JobName,JobNo,cast(OrderQty as decimal) as OrderQty,cast(JobQty as decimal) as JobQty, ClientName,PONO,
                                date_format(PODate,'%d/%m/%Y') as PODate,Item_Class,EstimationNo,Item_Type,CartonDimension,
                                prepress_location,final_location,DATE_FORMAT(LastDeliveryDate,'%d-%m-%Y %h:%i:%m %p') as LastDeliveryDate,
                                PaymentTerms, JobCardRemarks,WORemarks,OSVendor_Remarks,BillRemarks from JobInfo_temp;");
if ($results->num_rows() > 0) {
    $r=$results->result();
        foreach ($r as $row) {
        $ClientName = $row->ClientName;
        $JobName = $row->JobName;
        $OrderQty = $row->OrderQty;
        $JobQty = $row->JobQty;
        $EstimationNo = $row->EstimationNo;
        $PONO = $row->PONO;
        $PODate = $row->PODate;
        $JobNo = $row->JobNo;
        $payment_terms = $row->PaymentTerms;
        $prepress_location = $row->prepress_location;
        $final_location = $row->final_location;
        $LastDeliveryDate = $row->LastDeliveryDate;
        $JobCardRemarks = $row->JobCardRemarks;
        $WORemarks = $row->WORemarks;
        $BillRemarks = $row->BillRemarks;
        $OSVendor_Remarks = $row->OSVendor_Remarks;
    }
}

$resultcompanyprofile = $this->db->query("select CompanyName, Address1, Address2, City from companyprofile where icompanyid='$icompanyidlogin';");
if ($resultcompanyprofile->num_rows() > 0) {
    $r=$resultcompanyprofile->result();
        foreach ($r as $row) {
        $CompanyName = $row->CompanyName;
        $Address1 = $row->Address1;
        $Address2 = $row->Address2;
        $City = $row->City;
    }
}

// $pdf = new PDF_MemImage ();
$pdf->AddPage();

$pdf->SetY(5);
$pdf->Cell(139);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont("Arial", "B", "8");

$pdf->Ln();
$pdf->SetFont("Arial", "", "7");
$pdf->Cell(193, 6, 'PRINT DATE AND TIME : ' . date('d-m-Y H:i:s'), 0, 0, "R");
// $pdf->Rect(10, 16, 193, 8, 'Arial');
$pdf->SetFont("Arial", "", "16");
$pdf->Ln();
//$CompanyName
$pdf->Cell(193, 8, $CompanyName, 0, 0, "C");
// $pdf->Ln();
// $pdf->Cell(193, 8, "JOB CARD", 0, 0, "C");


$pdf->Ln();
$pdf->SetFont("Arial", "B", "7");
$pdf->Cell(52, 5, 'Job Docket No. - ' . $DocId, 1, 0, "L");
$pdf->Cell(45, 5, 'Job Docket Date - ' . $DocDate, 1, 0, "L");
$pdf->Cell(55, 5, 'Order Qty. - '.$OrderQty . ', Job Qty. - ' . $JobQty, 1, 0, "L");
$pdf->Cell(41, 5, "Delivery - " . $LastDeliveryDate, 1, 0, "L");

$pdf->Ln();
$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);

$pdf->Cell(52, 5, 'Client Name', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'Payment Terms', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Quotation No.', 1, 0, "C", 1);
$pdf->Cell(55, 5, 'Job Name', 1, 0, "C", 1);
$pdf->Cell(21, 5, 'Po No.', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Po Date', 1, 0, "C", 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);




$pdf->Ln();
$pdf->Cell(52, 5, $ClientName, 1, 0, "L", 1);
$pdf->Cell(25, 5, $payment_terms, 1, 0, "L", 1);
$pdf->Cell(20, 5, $EstimationNo, 1, 0, "L", 1);
$pdf->Cell(55, 5, $JobName, 1, 0, "L", 1);
$pdf->Cell(21, 5, $PONO, 1, 0, "C", 1);
$pdf->Cell(20, 5, $PODate, 1, 0, "C", 1);

// --------------------------------------        
//    $pdf->Ln();
$image1 = "../Img/plus1.jpg";
$pdf->Ln();
$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);

$pdf->Cell(17, 5, 'Open Size', 1, 0, "C", 1);
$pdf->Cell(17, 5, 'Close Size', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Item Type', 1, 0, "C", 1);
$pdf->Cell(25, 5, 'Executive', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'MIS Code', 1, 0, "C", 1);   //MIS Code
$pdf->Cell(22, 5, 'Job No.', 1, 0, "C", 1);
$pdf->Cell(23, 5, '', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
$pdf->Cell(21, 5, '', 1, 0, "L", 1);
$pdf->Cell(20, 5, '', 1, 0, "C", 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
//    $pdf->SetFont("Arial", "", "7");
$results = $this->db->query("select JobNo,Item_Class,Rate,EstimationNo,Item_Type,CartonDimension,OpenSize,CloseSize,MISCodeNo,AccExeName from JobInfo_temp;");
if ($results->num_rows() > 0) {
    $r=$results->result();
        foreach ($r as $row) {
        $JobNo = $row->JobNo;
        $Item_Class = $row->Item_Type;
        $EstimationNo = $row->EstimationNo;
        $Item_Type = $row->Item_Type;
        //AccExeName
        $AccExeName = $row->AccExeName;
        $MISCodeNo = $row->MISCodeNo;
        $OpenSize = $row->OpenSize;
        $CloseSize = $row->CloseSize;
        
        $Rate = $row->Rate;
    }

    $pdf->Ln();
    $pdf->Cell(17, 5, $OpenSize, 1, 0, "C", 1);
    $pdf->Cell(17, 5, $CloseSize, 1, 0, "C", 1);
    $pdf->Cell(18, 5, $Item_Class, 1, 0, "C", 1);
    $pdf->Cell(25, 5, $AccExeName, 1, 0, "C", 1);
    $pdf->Cell(30, 5, $MISCodeNo, 1, 0, "C", 1);
    $pdf->Cell(22, 5, $JobNo, 1, 0, "C", 1);
    $pdf->Cell(23, 5, "", 1, 0, "L", 1);
    $pdf->Cell(21, 5, "", 1, 0, "L", 1);
    $pdf->Cell(20, 5, "", 1, 0, "L", 1);
}

$pdf->Ln();
$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(25, 5, 'Component', 1, 0, "C", 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
//    $pdf->SetFont("Arial", "", "7");
//select JobCardRemarks from JobInfo_temp; 
$results = $this->db->query("SELECT GROUP_CONCAT(ComponentName,' | ') as ComponentName FROM Components;");
if ($results->num_rows() > 0) {
    $r=$results->result();
        foreach ($r as $row) {
        $ComponentName = $row->ComponentName;
    }
}
$ComponentNameStr = substr_replace($ComponentName, " ", -2);

$ComponentName = str_replace(",", "", $ComponentNameStr);

$pdf->Cell(168, 5, $ComponentName, 1, 0, "L", 1);

$pdf->Ln();
$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(211,211,211);
$pdf->SetFillColor(255,0,0);
$pdf->Cell(25, 5, ' Jobcard Remarks', 1, 0, "C", 1);

$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(168, 5, $JobCardRemarks, 1, 0, "L", 1);

$pdf->Ln();
$len = strlen($WORemarks);
$text1 = WordWrap($WORemarks, 120, "\n");

$loop_limit = ceil($len / 120);
$loop_limit1 = substr_count($WORemarks, "\n");

if ($loop_limit > 1 || $loop_limit1 > 1) {
    if ($loop_limit > $loop_limit1) {
        $height = 4 * $loop_limit;
    } elseif ($loop_limit1 > $loop_limit) {
        $height = 4 * $loop_limit1;
    } elseif ($loop_limit1 == $loop_limit) {
        $height = 4 * $loop_limit1;
    }
} else {
    $height = 5 * 1;
}
$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(255,165,0);
$pdf->Cell(25, $height, ' WO Remarks', 1, 0, "C", 1);

$pdf->SetFillColor(255,165,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(168, $height, $text1, 1, 0, "L", 1);

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(193, 5, 'Process Details', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$Res = $this->db->query("select * from Commulative_Details;");
if ($Res->num_rows() > 0) {
    $r=$Res->result();
        foreach ($r as $row) {
        $Label1 = $row->Label1;
        $ProcessDetails1 = $row->ProcessDetails1;
        $FormDetails = $row->FormDetails;
        $color = $row->Color;
        $estimage = $row->Image;
        // echo $estimage;
        if ($color == "Red") {
            $pdf->SetTextColor(255,0,0);
            $pdf->SetFont("Arial", "B", "8");
        } else if($color == "Blue"){
            $pdf->SetTextColor(0,0,255);
            $pdf->SetFont("Arial", "B", "7");
        } else {
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont("Arial", "B", "7");
        }
        $pdf->Ln();

        // $pdf->SetY($y + 30);

//        $ProcessDetails1 = $FormDetails."  ".$ProcessDetails1."  ".$ProcessDetails3."  ".$CutSizeDetails;
//        $pdf->Cell(40, 5, $Label1, 0, 0, "L", 1);
        $pdf->Cell(145, 5, $ProcessDetails1, 0, 0, "L", 1);
        if ($estimage !== "" && $estimage !== NULL) {
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MemImage($estimage, $x, $y, 48, 30);
            
        }
//        $pdf->Cell(28, 5, $FormDetails, 0, 0, "L", 1);
    }
}

$Res = $this->db->query("select * from item_jextraboarddetails_temp;");
if ($Res->num_rows() > 0) {
$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(30, 5, 'Component', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'Component Size', 1, 0, "C", 1);
$pdf->Cell(10, 5, 'Form No', 1, 0, "C", 1);
$pdf->Cell(63, 5, 'Materail', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Qty', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Ups', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Sheet Size', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont("Arial", "", "7");

    $r=$Res->result();
        foreach ($r as $row) {
        $Component = $row->Component;
        $ComponentSize = $row->ComponentSize;
        $CutDeckle = $row->CutDeckle;
        $CutLength = $row->CutLength;
        $Description = $row->Description;
        $Qty = $row->Qty;
        $FormNo = $row->FormNo;
        $UpsInFullSheet = $row->UpsInFullSheet;

        $pdf->Ln();

        $pdf->Cell(30, 5, $Component, 1, 0, "L", 1);
        $pdf->Cell(30, 5, $ComponentSize, 1, 0, "L", 1);
        $pdf->Cell(10, 5, $FormNo, 1, 0, "L", 1);
        $pdf->Cell(63, 5, $Description, 1, 0, "L", 1);
        $pdf->Cell(20, 5, $Qty, 1, 0, "L", 1);
        $pdf->Cell(20, 5, $UpsInFullSheet, 1, 0, "L", 1);
        $pdf->Cell(20, 5, $CutDeckle ." X ". $CutLength, 1, 0, "L", 1);
    }
}

$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(193, 5, 'DELIVERY DETAILS', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(45, 5, 'COMPANY NAME', 1, 0, "C", 1);
$pdf->Cell(75, 5, 'ADDRESS', 1, 0, "C", 1);
$pdf->Cell(33, 5, 'CITY & STATE', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Qty', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Delivery Date', 1, 0, "C", 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont("Arial", "", "7");

$Res = $this->db->query("select CompanyName,Address,City,State,QtyToDeliver,
    IF(DATE_FORMAT(SchDeliveryDate,'%d/%m/%Y')='01/01/1900','',DATE_FORMAT(SchDeliveryDate,'%d/%m/%Y')) as SchDeliveryDate from JobInfo_del_temp;");
if ($Res->num_rows() > 0) {
    $r=$Res->result();
        foreach ($r as $row) {
        $CompanyName = $row->CompanyName;
        $Address = $row->Address;
        $City = $row->City;
        $State = $row->State;
        $QtyToDeliver = $row->QtyToDeliver;
        $SchDeliveryDate = $row->SchDeliveryDate;

        $ADD = $City . " " . $State;
        //State   QtyToDeliver   SchDeliveryDate

        $ADelAddress = $Address;
        // echo $ADelAddress;die;
        $myarray = str_split($ADelAddress, 50);
        // print_r($myarray);die;

        $mystring = "";
        $height = 5;
        foreach ($myarray as $value) {
            $mystring = $mystring . $value . " " . "\n";
            $height = $height + 3;
        }
        $mystringkk = substr_replace($mystring, " ", -1);
        $height = $height - 3;


        $pdf->Ln();
        $pdf->Cell(45, $height, $CompanyName, 1, 0, "L", 1);
        $pdf->Cell(75, $height, $mystringkk, 1, 0, "L", 1);
        $pdf->Cell(33, $height, $ADD, 1, 0, "L", 1);
        $pdf->Cell(20, $height, $QtyToDeliver, 1, 0, "L", 1);
        $pdf->Cell(20, $height, $SchDeliveryDate, 1, 0, "L", 1);
    }
}

$Res = $this->db->query("select * from DocketMaterialDetails;");
if ($Res->num_rows() > 0) {

$pdf->SetFont("Arial", "B", "7");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(211, 211, 211);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(193, 5, 'MATERIAL DETAILS', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(35, 5, 'Component', 1, 0, "C", 1);
$pdf->Cell(70, 5, 'Required Material', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'Required Qty', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'Required Unit', 1, 0, "C", 1);
$pdf->Cell(20, 5, 'GroupName', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Client Paper', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont("Arial", "", "7");
    $r=$Res->result();
        foreach ($r as $row) {
            if ($row->ClientPaper == 1) {
               $paper = 'Yes';
            }else{
               $paper = 'No'; 
            }
        $pdf->Ln();
        $pdf->Cell(35, 5, $row->Component, 1, 0, "C", 1);
        $pdf->Cell(70, 5, $row->RequiredMaterial, 1, 0, "C", 1);
        $pdf->Cell(30, 5, $row->RequiredQty, 1, 0, "C", 1);
        $pdf->Cell(20, 5, $row->RequiredUnit, 1, 0, "C", 1);
        $pdf->Cell(20, 5, $row->GroupName, 1, 0, "C", 1);
        $pdf->Cell(18, 5, $paper, 1, 0, "C", 1);
    }
}
$proeces = $this->db->query("call Jobcard_Print_Details_prod('$DocId','$icompanyidlogin');");
$result = $this->db->query("select DocId,DATE_FORMAT(DocDate,'%d/%m/%Y') as DocDate, JobNo, ClientName, 
        WOID, JobName, ClientCodeNo, MISCodeNo, JobRate, round(JobQty) as JobQty, 
        JobQtyAfterWastage, TotCartonWastage, GPN, QtyDisp, JobProcess, 
         DATE_FORMAT(CommitedDate,'%d/%m/%Y') as CommitedDate, Printing, BoardIssuedSH,
        BoardIssuedKG, KraftIssued, 
        TotalInput, Profit_Loss, FPID, ClientID, CartonDimension, 
        ArtWork_Status, Die_Status,
        Item_Type, Item_Class, Req_Del_Sch, AccExeName, PONO, DocId, JobNo,round(OrderQty) as OrderQty,PlanMachine
        ,BoardKg,BoardPack,FullBoardSH,CutSize1,Flutetype,Createdby,OtherDim,Margins,Gutters,DieNo,
        KeyLineNo,DATE_FORMAT(SchDeliveryDate,'%d/%m/%Y') as SchDeliveryDate,
        DATE_FORMAT(PODate,'%d/%m/%Y') as PODate,JobCardRemarks,Artworkno,referencecode,JobArea,ClientShortName,
        EstimationNo,ADateTime,
        MdateTime,CreatedBy,ShadeCardNo,NewJob,Partial_RePrint,Envolopeno,itemType,BoxLength,BoxBreadth,BoxHeight,sidePaste,topflap,bottomflap,MetPetJob From JobInfo_temp;");
if ($result->num_rows() > 0) {
    $r=$result->result();
        foreach ($r as $row) {
        $MetPetJob = $row->MetPetJob;
        if ($MetPetJob == "") {
            $MetPetJob = "";
        }

        $ShadeCardNo = $row->ShadeCardNo;
        if ($ShadeCardNo == "") {
            $ShadeCardNo = "";
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
        $releaseby = $row->Createdby;
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
            $EstimationNo = "";
        }

        $NewJob = $row->NewJob;
        if (strtoupper($NewJob) == "OLD") {
            $NewJob = "Repeat";
        } elseif ($NewJob == "") {
            $NewJob = "";
        }
        $Partial_RePrint = $row->Partial_RePrint;

        $Envolopeno = $row->Envolopeno;
        if ($Envolopeno == "") {
            $Envolopeno = "";
        }



        $itemType = $row->itemType;
        if ($itemType == "") {
            $itemType = "";
        }

        $BoxLength = $row->BoxLength;
        if ($BoxLength == "") {
            $BoxLength = "";
        }


        $BoxBreadth = $row->BoxBreadth;
        if ($BoxBreadth == "") {
            $BoxBreadth = "";
        }

        $BoxHeight = $row->BoxHeight;
        if ($BoxHeight == "") {
            $BoxHeight = "";
        }


        $sidePaste = $row->sidePaste;
        if ($sidePaste == "") {
            $sidePaste = "";
        }



        $topflap = $row->topflap;
        if ($topflap == "") {
            $topflap = "";
        }



        $bottomflap = $row->bottomflap;
        if ($bottomflap == "") {
            $bottomflap = "";
        }

    }
}
$resultJobDetail = $this->db->query("select DocId,FullSHDescription,GSM,UPS,Deckle,Grain,TotalSHeets,RowType,BoardGrainDirection,WastagePercentage From DocketBoardDetails where rowtype='F';");

if ($resultJobDetail->num_rows() > 0) {
    $r=$resultJobDetail->result();
        foreach ($r as $row) {
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


// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Cell(50, 5, 'CUT SIZE', 1, 0, "C", 1);
// $pdf->Cell(31, 5, 'WITHOUT WAST. SHEET', 1, 0, "C", 1);
// $pdf->Cell(31, 5, 'WASTAGE SHEET', 1, 0, "C", 1);
// $pdf->Cell(31, 5, 'NO. OF CUTS', 1, 0, "C", 1);
// $pdf->Cell(25, 5, 'CUT SHEET UPS', 1, 0, "C", 1);
// $pdf->Cell(25, 5, 'SHEETS WITH WST', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
// $resultInk_temp = $this->db->query("select TotalCutSHeets,UPS,Deckle/25.4 as Deckle,Grain/25.4 as Grain,TotalSHeets,NoOfCutPieces,
//     RowType,GrainDirection,WastageSheets from DocketBoardDetails Where RowType='C';");
// if ($resultInk_temp->num_rows() > 0) {
//     $r=$resultInk_temp->result();
//         foreach ($r as $row) {
//         $BUPS = $row->UPS;
//         $BDeckle = $row->Deckle;
//         $BGrain = $row->Grain;
//         $BTotalSHeets = $row->TotalSHeets;
//         $BNoOfCutPieces = $row->NoOfCutPieces;
//         $GrainDirection = $row->GrainDirection;
//         $WastageSheets = $row->WastageSheets;
//         $TotalCutSHeets = $row->TotalCutSHeets;
//         if ($UPS == 0 || $UPS == Null) {
//             $UPS = 1;
//         }
//         ///(round($BTotalSHeets) - round($JobDocketQty / $UPS) * $BNoOfCutPieces)

//         $pdf->Ln();
//         $pdf->Cell(50, 5, round($BDeckle, 3) . " X " . round($BGrain, 3) . " Inch" . " " . $GrainDirection, 1, 0, "C", 1);
//         $pdf->Cell(31, 5, $BTotalSHeets, 1, 0, "C", 1);
//         $pdf->Cell(31, 5, $WastageSheets, 1, 0, "C", 1);
//         $pdf->Cell(31, 5, $BNoOfCutPieces, 1, 0, "C", 1);
//         $pdf->Cell(25, 5, $BUPS, 1, 0, "C", 1);
//         $pdf->Cell(25, 5, $TotalCutSHeets, 1, 0, "C", 1);
//     }
// }
// $pdf->Ln();

// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Ln();
// $pdf->Cell(100, 5, 'Printing', 1, 0, "C", 1);
// $pdf->Cell(93, 5, 'Machine Name', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
// $resultInk_temp = $this->db->query("select MachineName from PrintMachine_Process_temp;");
// if ($resultInk_temp->num_rows() > 0) {
//     $r=$resultInk_temp->result();
//         foreach ($r as $row) {
//         $pdf->Ln();
//         $pdf->Cell(100, 5, 'Printing Machine Name', 1, 0, "L", 0);
//         $pdf->Cell(93, 5, $row->MachineName, 1, 0, "L", 0);
//     }
// }


// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Cell(100, 5, 'INK FRONT', 1, 0, "C", 1);
// $pdf->Cell(93, 5, 'INK BACK', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
// $resultInk_temp = $this->db->query("select Description1,Description2 from test_manoj_inkcomman;");
// if ($resultInk_temp->num_rows() > 0) {
//     $r=$resultInk_temp->result();
//         foreach ($r as $row) {
//         $fontink = $row->Description1;
//         $backink = $row->Description2;
//         $pdf->Ln();
//         $pdf->Cell(100, 5, $fontink, 1, 0, "L", 0);
//         $pdf->Cell(93, 5, $backink, 1, 0, "L", 0);
//     }
// }
// $pdf->Ln();
// $pdf->Cell(193, 2, '', 0, 0, "C");
// $pdf->Ln();

// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Cell(193, 5, 'OPERATION DETAIL', 1, 0, "C", 1);
// $pdf->Ln();
// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Cell(40, 5, 'OPERATION', 1, 0, "C", 1);
// $pdf->Cell(70, 5, 'DETAIL', 1, 0, "C", 1);
// $pdf->Cell(30, 5, 'Machine Name', 1, 0, "C", 1);
// $pdf->Cell(53, 5, 'REMARK', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
// $resultDocketProcessDetails = $this->db->query("select DocId,ProcessDetails1,ProcessDetails2,ProcessDetails3,FormDetails, Remarks, PrName, 
//     TotalForms,MachineNames from DocketProcessDetails  order by PrUniqueNo asc;");
// $grp_asd = array();
// if ($resultDocketProcessDetails->num_rows() > 0) {
//     $r=$resultDocketProcessDetails->result();
//     $k = 0;
//         foreach ($r as $row) {
//         $grp_asd[$k] = array($row->PrName, $row->ProcessDetails1,
//             $row->ProcessDetails2, $row->ProcessDetails3, $row->Remarks, $row->MachineNames);
//         $k++;
//     }
// }
// $size = sizeof($grp_asd);
// for ($j = 0; $j < $size; $j++) {
//     $grpp = $grp_asd[$j];
//     $pdf->SetFont("Arial", "B", "7");
//     $pdf->Ln();
//     $pdf->Cell(40, 5, $grpp[0], 1, 0, "L", 1);
//     $pdf->Cell(70, 5, $grpp[1] . "" . $grpp[2] . "" . $grpp[3], 1, 0, "L", 1);
//     $pdf->Cell(30, 5, $grpp[5], 1, 0, "L", 1);
//     $pdf->Cell(53, 5, $grpp[4], 1, 0, "L", 1);
// }

$pdf->Ln();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(193, 2, '', 0, 0, "C");
$pdf->Ln();
// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Cell(193, 5, 'Material Required', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
// $pdf->Ln();
// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Cell(10, 5, 'Sr No', 1, 0, "C", 1);
// $pdf->Cell(100, 5, 'Item Name', 1, 0, "C", 1);
// $pdf->Cell(30, 5, 'Req. Qty', 1, 0, "C", 1);
// $pdf->Cell(53, 5, 'Unit', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);
// $resultdocketmaterialdetails = $this->db->query("select DocId,RequiredMaterial,RequiredQty,RequiredUnit,GroupName,AllocatedMaterial,AllocatedQty,MatStatus,ExpDate from docketmaterialdetails");
//     $i = 1;
// if ($resultInk_temp->num_rows() > 0) {
//     $r=$resultInk_temp->result();
//         foreach ($r as $row) {
//         $RequiredMaterial = $row->RequiredMaterial;
//         $RequiredQty = $row->RequiredQty;
//         $RequiredUnit = $row->RequiredUnit;
//         $pdf->Ln();
//         $pdf->Cell(10, 5, $i, 1, 0, "C", 1);
//         $pdf->Cell(100, 5, $RequiredMaterial, 1, 0, "L", 1);
//         $pdf->Cell(30, 5, $RequiredQty, 1, 0, "R", 1);
//         $pdf->Cell(53, 5, $RequiredUnit, 1, 0, "L", 1);
//         $i++;
//     }
// }
$pdf->Ln(15);
$result_image = $this->db->query("select PicInBinary from layouting_jobcard_temp;");
if ($result_image->num_rows() > 0) {
    $r=$result_image->result();
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
$rm_data = $this->db->query("Select concat(docid,' - ',docdate) as issue, concat(MatGRNNo,' - ',MatGRNDt) as grn, itemid, Description, qty, 
    concat(IMRDocID,' - ',IMRDocDate) as IMR, IMr_remarks from job_rawmaterial;");
    $k = 0;
    $grp_rm = array();
if ($rm_data->num_rows() > 0) {
$pdf->AddPage();


$pdf->SetFont("Arial", "", "9");



$pdf->SetFont("Arial", "B", "7");
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
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

    $r=$rm_data->result();
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
$q=0;
$cost  = $this->db->query("select jobqty,Qty,Field1 as 'Material',Field21 as 'ReqQty',Field6 as 'Rate',Field7 as 'UOM',Field5 as 'Value' from qcsheetex1 as a,item_reversecost_master as b where a.recordid=b.estimaterecordid and docid='$DocId' 
and Field7 like '%KG%'  order by cast(field8 as decimal)"); 
if ($cost->num_rows() > 0) {
    $r=$cost->result();
        foreach ($r as $row) {
    if(isset($qty->Qty)){
        $q=$qty->Qty;
    }
}
$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
$pdf->Cell(193, 5, 'RAW MATERIAL COST IN ESTIMATE (Quantity:'.$q.')', 1, 0, "C", 1);
$pdf->Ln();
// $pdf->Cell(30, 5, 'Job Qty', 1, 0, "C", 1);
// $pdf->Cell(23, 5, 'Quantity', 1, 0, "C", 1);
$pdf->Cell(50, 5, 'Material', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'Required Qty', 1, 0, "C", 1);
$pdf->Cell(33, 5, 'Rate', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'UOM', 1, 0, "C", 1);
$pdf->Cell(40, 5, 'Value', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

    $i = 1;
    $grand_req = 0;
    $grand_value = 0;
if ($cost->num_rows() > 0) {
    $r=$cost->result();
        foreach ($r as $row) {


        $pdf->Ln();
        // $pdf->Cell(30, 5, $row->jobqty, 1, 0, "L", 1);
        // $pdf->Cell(23, 5, $row->Qty, 1, 0, "L", 1);
        $pdf->Cell(50, 5, $row->Material, 1, 0, "L", 1);
        $pdf->Cell(35, 5, $row->ReqQty, 1, 0, "L", 1);
        $pdf->Cell(33, 5, $row->Rate, 1, 0, "L", 1);
        $pdf->Cell(35, 5, $row->UOM, 1, 0, "L", 1);
        $pdf->Cell(40, 5, $row->Value, 1, 0, "L", 1);
        $grand_req += $row->ReqQty;
        $grand_value += $row->Value;

        $i++;
    }

        $pdf->Ln();
        // $pdf->Cell(30, 5, 'Grand Total -', 1, 0, "R", 1);
        // $pdf->Cell(23, 5, $grand_qty, 1, 0, "L", 1);
        $pdf->Cell(50, 5, '', 1, 0, "R", 1);
        $pdf->Cell(35, 5, '', 1, 0, "L", 1);
        $pdf->Cell(33, 5, '', 1, 0, "L", 1);
        $pdf->Cell(35, 5, 'Grand Total -', 1, 0, "R", 1);
        $pdf->Cell(40, 5, $grand_value, 1, 0, "L", 1); 
}


$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
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
    $grp_prod = array();
    $k = 0;
if ($prod_data->num_rows() > 0) {
    $r=$prod_data->result();
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
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
$pdf->Cell(193, 5, 'Scuff Test Report', 1, 0, "C", 1);
$pdf->Ln();
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
$pdf->Cell(40, 5, 'Test Date Time', 1, 0, "C", 1);
$pdf->Cell(30, 5, 'Docket No', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'Check By', 1, 0, "C", 1);
$pdf->Cell(35, 5, 'Approved By', 1, 0, "C", 1);
$pdf->Cell(53, 5, 'Remarks', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$grp_asd2='';
$resultDocketProcessDetails2 = $this->db->query("select a.ScuffID,a.ADateTime,a.DocketNo,a.CheckByID,a.ApprovedBy,a.SRemarks,b.UserName as Approvedper,c.UserName as checkedper from  item_scuff_master   as a, usermaster as b  , usermaster as c  where DocketNo = '$DocId' and a.ApprovedBy = b.UserID and a.CheckByID = c.UserID ; ");
    $grp_asd2 = array();
    $k = 0;
if ($resultDocketProcessDetails2->num_rows() > 0) {
    $r=$resultDocketProcessDetails2->result();
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

// $pdf->Ln();
// $y = $pdf->GetY();
// $pdf->SetY($y + 5);
// $y = $pdf->GetY();
// $x = $pdf->GetX();
// $pdf->Rect($x, $y, 193, 5);
// $pdf->SetTextColor(255, 255, 255);
// $pdf->SetFillColor(75,75,75);
// $pdf->Cell(193, 5, 'PACKING SLIP', 1, 0, "C", 1);
// $pdf->Ln();
// $pdf->Cell(103, 5, '', 1, 0, "C", 1);
// $pdf->Cell(90, 5, 'PACKING SLIP / LABELS DETAILS', 1, 0, "C", 1);
// $pdf->Ln();
// $pdf->Cell(15, 5, 'Date', 1, 0, "C", 1);
// $pdf->Cell(8, 5, 'Shift', 1, 0, "C", 1);
// $pdf->Cell(65, 5, 'Job Name - Code', 1, 0, "C", 1);
// $pdf->Cell(15, 5, 'Packed Qty.', 1, 0, "C", 1);
// $pdf->Cell(10, 5, 'Req Nos.', 1, 0, "C", 1);
// $pdf->Cell(25, 5, 'Packed By', 1, 0, "C", 1);
// $pdf->Cell(25, 5, 'Remaining No. Returned', 1, 0, "C", 1);
// $pdf->Cell(30, 5, 'Reason for Returning', 1, 0, "C", 1);
// $pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0, 0, 0);

// $p_slip  = $this->db->query("select * from Packing_slip_temp;");

//     $i = 1;
// if ($cost->num_rows() > 0) {
//     $r=$cost->result();
//         foreach ($r as $row) {
//         $pdf->Ln();
//         $pdf->Cell(15, 5, $row->PackDate, 1, 0, "L", 1);
//         $pdf->Cell(8, 5, $row->Shift, 1, 0, "L", 1);
//         $pdf->Cell(65, 5, $row->ItemDesc, 1, 0, "L", 1);
//         $pdf->Cell(15, 5, $row->Quantity, 1, 0, "L", 1);
//         $pdf->Cell(10, 5, $row->BoxNo, 1, 0, "L", 1);
//         $pdf->Cell(25, 5, $row->PackedBy, 1, 0, "L", 1);
//         $pdf->Cell(25, 5, $row->NosReturned, 1, 0, "L", 1);
//         $pdf->Cell(30, 5, $row->Reason, 1, 0, "L", 1);

//         $i++;
//     }
// }


$pdf->Ln();
$y = $pdf->GetY();
$pdf->SetY($y + 5);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Rect($x, $y, 193, 5);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
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



    $i = 1;
    $Qty_total='0';
    
if ($gpn->num_rows() > 0) {
    $r=$gpn->result();
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
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
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
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(75,75,75);
$pdf->Cell(193, 5, 'DESPATCH DETAIL', 1, 0, "C", 1);
$pdf->Ln();
$pdf->Cell(20, 5, 'Invoice No.', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Invoice Date', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'No. of Boxes', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Packing', 1, 0, "C", 1);
$pdf->Cell(18, 5, 'Total Qty.', 1, 0, "C", 1);
$pdf->Cell(78, 5, 'Destination', 1, 0, "C", 1);
$pdf->Cell(23, 5, 'L.R. No.', 1, 0, "C", 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$desp  = $this->db->query("select b.InvNo, date_format(b.InvDt,'%d-%m-%Y') as InvDt, a.ChallanNo, b.NoofItems, b.ParcelSize, b.Quantity,a.Remarks 
    from item_chmaster as a left join item_chdetail as b on a.docid=b.docId where b.chdisplay = '$DocId' and b.IsActive = 0;");

if ($desp->num_rows() > 0) {
    $r=$desp->result();
    $i = 1;
    $grand_tot_quan = 0;
    $grand_box = 0;
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
        $pdf->Cell(20, $height, $row->InvNo, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->InvDt, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->NoofItems, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->ParcelSize, 1, 0, "L", 1);
        $pdf->Cell(18, $height, $row->Quantity, 1, 0, "L", 1);
        $pdf->Cell(78, $height, $text1, 1, 0, "L", 1);
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

$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->SetY(10);
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "PLATE", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(27, 5, "DATE", 1, 0, "C");
$pdf->Cell(27, 5, "SHIFT", 1, 0, "C");
$pdf->Cell(27, 5, "TOTAL", 1, 0, "C");
$pdf->Cell(27, 5, "NEW", 1, 0, "C");
$pdf->Cell(27, 5, "OLD", 1, 0, "C");
$pdf->Cell(27, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(27, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "PLATE", 1, 0, "C");
$pdf->Cell(27, 5, "PLATE", 1, 0, "C");
$pdf->Cell(27, 5, "PLATE", 1, 0, "C");
$pdf->Cell(27, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(27, 5, "OF SUPER", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "PRINTING", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "No", 1, 0, "C");
$pdf->Cell(19, 5, "Sheet", 1, 0, "C");
$pdf->Cell(19, 5, "Sorting", 1, 0, "C");
$pdf->Cell(19, 5, "Sheet", 1, 0, "C");
$pdf->Cell(19, 5, "Sheet", 1, 0, "C");
$pdf->Cell(19, 5, "Sheet", 1, 0, "C");
$pdf->Cell(19, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(19, 5, "OF SUPER", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(19, 5, "MACH No", 1, 0, "C");
$pdf->Cell(19, 5, "DATE", 1, 0, "C");
$pdf->Cell(19, 5, "J.C. QTY.", 1, 0, "C");
$pdf->Cell(19, 5, "OK", 1, 0, "C");
$pdf->Cell(19, 5, "100%", 1, 0, "C");
$pdf->Cell(19, 5, "SHADECARD", 1, 0, "C");
$pdf->Cell(19, 5, "WASTAGE", 1, 0, "C");
$pdf->Cell(19, 5, "ACTUAL PROD.", 1, 0, "C");
$pdf->Cell(19, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(19, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");
$pdf->Cell(19, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "PRIMER/ VARNISH/ LAMINATION/ UV", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(24, 5, "Mach No", 1, 0, "C");
$pdf->Cell(24, 5, "DATE", 1, 0, "C");
$pdf->Cell(24, 5, "PRINTING", 1, 0, "C");
$pdf->Cell(24, 5, "WASTAGE", 1, 0, "C");
$pdf->Cell(24, 5, "100%", 1, 0, "C");
$pdf->Cell(24, 5, "ACTUAL", 1, 0, "C");
$pdf->Cell(24, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(24, 5, "SUPERVISOR", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "Qty", 1, 0, "C");
$pdf->Cell(24, 5, "Qty", 1, 0, "C");
$pdf->Cell(24, 5, "Sorting", 1, 0, "C");
$pdf->Cell(24, 5, "Prod. Qty", 1, 0, "C");
$pdf->Cell(24, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(24, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "FOILING", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(24, 5, "Mach No", 1, 0, "C");
$pdf->Cell(24, 5, "DATE", 1, 0, "C");
$pdf->Cell(24, 5, "VARNISH", 1, 0, "C");
$pdf->Cell(24, 5, "WASTAGE", 1, 0, "C");
$pdf->Cell(24, 5, "100%", 1, 0, "C");
$pdf->Cell(24, 5, "ACTUAL", 1, 0, "C");
$pdf->Cell(24, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(24, 5, "SUPERVISOR", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "Qty", 1, 0, "C");
$pdf->Cell(24, 5, "Qty", 1, 0, "C");
$pdf->Cell(24, 5, "Sorting", 1, 0, "C");
$pdf->Cell(24, 5, "Prod. Qty", 1, 0, "C");
$pdf->Cell(24, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(24, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "PUNCHING", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(24, 5, "Mach No", 1, 0, "C");
$pdf->Cell(24, 5, "DATE", 1, 0, "C");
$pdf->Cell(24, 5, "FOILING", 1, 0, "C");
$pdf->Cell(24, 5, "WASTAGE", 1, 0, "C");
$pdf->Cell(24, 5, "100%", 1, 0, "C");
$pdf->Cell(24, 5, "ACTUAL", 1, 0, "C");
$pdf->Cell(24, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(24, 5, "SUPERVISOR", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "Qty", 1, 0, "C");
$pdf->Cell(24, 5, "Qty", 1, 0, "C");
$pdf->Cell(24, 5, "Sorting", 1, 0, "C");
$pdf->Cell(24, 5, "Prod. Qty", 1, 0, "C");
$pdf->Cell(24, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(24, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");
$pdf->Cell(24, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "PASTING (RTF)", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(27, 5, "Mach No", 1, 0, "C");
$pdf->Cell(27, 5, "DATE", 1, 0, "C");
$pdf->Cell(27, 5, "PUNCH", 1, 0, "C");
$pdf->Cell(27, 5, "WASTAGE", 1, 0, "C");
$pdf->Cell(27, 5, "ACTUAL", 1, 0, "C");
$pdf->Cell(27, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(27, 5, "SUPERVISOR", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "Qty", 1, 0, "C");
$pdf->Cell(27, 5, "Qty", 1, 0, "C");
$pdf->Cell(27, 5, "Prod. Qty", 1, 0, "C");
$pdf->Cell(27, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(27, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(195, 5, "LOCK BOTTOM (Machine / Manual)", 0, 0, "C");
$pdf->SetFont("Arial", "", "8");
$pdf->Ln();
$pdf->Cell(27, 5, "Mach No", 1, 0, "C");
$pdf->Cell(27, 5, "DATE", 1, 0, "C");
$pdf->Cell(27, 5, "PUNCH", 1, 0, "C");
$pdf->Cell(27, 5, "WASTAGE", 1, 0, "C");
$pdf->Cell(27, 5, "ACTUAL", 1, 0, "C");
$pdf->Cell(27, 5, "OPERATOR", 1, 0, "C");
$pdf->Cell(27, 5, "SUPERVISOR", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "Qty", 1, 0, "C");
$pdf->Cell(27, 5, "Qty", 1, 0, "C");
$pdf->Cell(27, 5, "Prod. Qty", 1, 0, "C");
$pdf->Cell(27, 5, "SIGNATURE", 1, 0, "C");
$pdf->Cell(27, 5, "SIGNATURE", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");
$pdf->Cell(27, 5, "", 1, 0, "C");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(110, 6, "FINISH QTY. :", 0, "C");
$pdf->Cell(24, 6, "WASTAGE % :", 0, "C");


/////////////////////////////// LINE CLEARENCE////////////////////////////////
$pdf->AddPage();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetY($y - 2);
$pdf->SetX($x + 135);
$pdf->SetFont("Arial", "B", "10");
$pdf->MultiCell(50, 4, "RO/BD/QC/32/1-1/01" . "\n" . "Effecive Date: 02/07/2013", 1, "L");

$pdf->Ln();
$y = $pdf->SetY(1);

$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "14");
$pdf->Cell(195, 5, "LINE CLEARANCE CERTIFICATE", 0, 0, "C");

$k = 1;
$my = $this->db->query("select JobNo, JobName, ClientCodeNo, ClientName from item_reversecost_master where Docid='$DocId';");
if ($my->num_rows() > 0) {
        $r=$my->result();
        foreach ($r as $row) {
       $pdf->Ln();
       $pdf->Ln();
       $pdf->SetFont("Arial", "B", "10");
       $pdf->Cell(30, 5, "Job Card No. : ", 0, 0, "L");
       $pdf->Cell(70, 5, $row->JobNo, 0, 0, "L");
       $pdf->Cell(75, 5, "Date :___________", 0, "L");

       $pdf->Ln();
       $pdf->Cell(30, 5, "Job Name : ", 0, 0, "L");
       $pdf->Cell(175, 5, $row->JobName, 0, 0, "L");

       $pdf->Ln();
       $pdf->Cell(15, 5, "Code : ", 0, 0, "L");
       $pdf->Cell(85, 5, $row->ClientCodeNo, 0, 0, "L");
       $pdf->Cell(25, 5, "Client Name : ", 0, "L");
       $pdf->Cell(65, 5, $row->ClientName, 0, 0, "L");

       $k++;
   }
}

//-------------- Prepress --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Prepress :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Positive kept in place/Scrapped", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "No. of positives checked ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Plate Exposing --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Plate Exposing :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Plate kept in place/Scrapped", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "No. of plates checked ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Cutting --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Cutting :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Sheets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Printing --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Printing :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Sheets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Coating --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Coating :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Sheets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Primer / Varnish /Plate shifted to store", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Coating --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Coating :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Sheets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "UV / Plate / Lamination roll shifted to store", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

/////////////////////////// page 2 ///////////////////////////////////////////////
$pdf->AddPage();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetY($y - 2);
$pdf->SetX($x + 135);
$pdf->SetFont("Arial", "B", "10");
$pdf->MultiCell(50, 4, "RO/BD/QC/32/1-1/01" . "\n" . "Effecive Date: 02/07/2013", 1, "L");

$pdf->Ln();
$y = $pdf->SetY(1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "14");
$pdf->Cell(195, 5, "LINE CLEARANCE CERTIFICATE", 0, 0, "C");

//-------------- Cutting (Only for Labels & Leaflets)--------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Cutting (Only for Labels & Leaflets) :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Labels & Leaflets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Foiling --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Foiling :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(90, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(30, 6, "Operator", 1, 0, "C");
$pdf->Cell(30, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(90, 6, "Wastage Sheets & Carton/Catch covers removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(90, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(90, 6, "Foil Block / Foil roll shifted to store", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");

//-------------- Die Punching --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Die Punching :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(90, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(30, 6, "Operator", 1, 0, "C");
$pdf->Cell(30, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(90, 6, "Wastage Sheets & Carton/Catch covers removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(90, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(90, 6, "Die / Punch / Block shifted to store", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");

//-------------- Striping --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Striping :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(90, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(30, 6, "Operator", 1, 0, "C");
$pdf->Cell(30, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(90, 6, "Wastage Carton/Catch covers/Labels/Leaflets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(90, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");

//-------------- Sorting --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Sorting :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(90, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(30, 6, "Operator", 1, 0, "C");
$pdf->Cell(30, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(90, 6, "Wastage Carton/Catch covers/Labels/Leaflets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(90, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(30, 6, "", 1, 0, "C");

//-------------- Folding (Only for Leaflets) --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Folding (Only for Leaflets) :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Leaflets removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

/////////////////////////// page 3 ///////////////////////////////////////////////
$pdf->AddPage();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetY($y - 2);
$pdf->SetX($x + 135);
$pdf->SetFont("Arial", "B", "10");
$pdf->MultiCell(50, 4, "RO/BD/QC/32/1-1/01" . "\n" . "Effecive Date: 02/07/2013", 1, "L");

$pdf->Ln();
$y = $pdf->SetY(1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "14");
$pdf->Cell(195, 5, "LINE CLEARANCE CERTIFICATE", 0, 0, "C");

//-------------- Gluing (For Gluing Machine) --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Gluing (For Gluing Machine) :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Cartons removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");

//-------------- Gluing (For Machine Pasting) --------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, 'Gluing (For Machine Pasting) :', 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(110, 3, "Last Job : ____________________________________________________", 0, "L");
$pdf->Cell(50, 3, "Job No. : ___________________", 0, "L");
$pdf->Cell(40, 3, "Date : _____________", 0, "L");

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "Sr. No.", 1, 0, "C");
$pdf->Cell(80, 6, "Checking", 1, 0, "C");
$pdf->Cell(30, 6, "Remark", 1, 0, "C");
$pdf->Cell(35, 6, "Operator", 1, 0, "C");
$pdf->Cell(35, 6, "QC", 1, 0, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", "9");
$pdf->Cell(15, 6, "1.", 1, 0, "C");
$pdf->Cell(80, 6, "Wastage Cartons removed to scrap area", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Cell(15, 6, "2.", 1, 0, "C");
$pdf->Cell(80, 6, "Job card and Job docket forwarded to next process ", 1, 0, "L");
$pdf->Cell(30, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Cell(35, 6, "", 1, 0, "C");
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(180, 6, "Line Clearance certificate is handed over to Q.C. person by Dispatch Executive", 0, "L");


/////////////////////////////// PREPRESS CHECK LIST /////////////////////////////////////////

$pdf->AddPage();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetY($y - 2);
$pdf->SetX($x + 135);
$pdf->SetFont("Arial", "B", "10");
$pdf->MultiCell(50, 4, "RO/BD/QC/32/1-1/01" . "\n" . "Effecive Date: 02/07/2013", 1, "L");

$pdf->Ln();
$y = $pdf->SetY(1);

$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "B", "14");
$pdf->Cell(195, 5, "PREPRESS CHECK LIST", 0, 0, "C");

$pdf->SetFont("Arial", "B", "9");
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(145, 5, "Shift:________________________", 0, "L");
$pdf->Cell(60, 5, "Date:____________________", 0, "L");

$k = 1;
$my = $this->db->query("select JobNo, JobName, ClientCodeNo, ClientName from item_reversecost_master where Docid='$DocId';");
if ($my->num_rows() > 0) {
    $r=$my->result();
    foreach ($r as $row) {
       $pdf->Ln();
       $pdf->Ln();
       $pdf->Cell(30, 5, "Job Name : ", 0, 0, "L");
       $pdf->Cell(55, 5, $row->JobName, 0, 0, "L");
       $pdf->Cell(15, 5, "Code : ", 0, 0, "L");
       $pdf->Cell(85, 5, $row->ClientCodeNo, 0, 0, "L");
       $pdf->Ln();
       $pdf->Cell(30, 5, "Customer Name : ", 0, "L");
       $pdf->Cell(70, 5, $row->ClientName, 0, 0, "L");

       $k++;
   }
}

$pdf->Ln();
$pdf->Ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(30, 5, "Colour:", 0, "L");
$pdf->Cell(10, 5, "(1.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 38, $y + 4, $x + 70, $y + 4);
$pdf->Cell(10, 5, "(2.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 78, $y + 4, $x + 111, $y + 4);
$pdf->Cell(10, 5, "(3.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 117, $y + 4, $x + 152, $y + 4);
$pdf->Cell(10, 5, "(4.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 157, $y + 4, $x + 190, $y + 4);

$pdf->Ln();
$pdf->Ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Cell(10, 5, "(5.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 38, $y + 4, $x + 70, $y + 4);
$pdf->Cell(10, 5, "(6.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 78, $y + 4, $x + 111, $y + 4);
$pdf->Cell(10, 5, "(7.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 117, $y + 4, $x + 152, $y + 4);
$pdf->Cell(10, 5, "(8.)", 0, "L");
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Line($x + 157, $y + 4, $x + 190, $y + 4);
$pdf->Ln();
$pdf->Cell(70, 9, "Docket No.:               ________________________", 0, "L");
$pdf->Cell(165, 9, "", 0, "L");

$pdf->Ln();
$pdf->Cell(30, 5, "Docket Contain:", 0, "L");
$pdf->Cell(10, 5, "(1.)", 0, "L");
$pdf->Cell(50, 5, "PDF (Yes/ No)", 0, "L");
$pdf->Cell(10, 5, "(2.)", 0, "L");
$pdf->Cell(50, 5, "Approval (Yes/ No)", 0, "L");
$pdf->Ln();
$pdf->Cell(30, 5, "", 0, "L");
$pdf->Cell(10, 5, "(3.)", 0, "L");
$pdf->Cell(50, 5, "Shade Card (Yes/ No)", 0, "L");
$pdf->Cell(10, 5, "(4.)", 0, "L");
$pdf->Cell(50, 5, "New Job (Yes/ No)", 0, "L");
$pdf->Cell(10, 5, "(5.)", 0, "L");
$pdf->Cell(50, 5, "Old Job (Yes/ No)", 0, "L");

$pdf->SetFont("Arial", "B", "9");
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "a)", 0, "L");
$pdf->Cell(50, 5, "If New Job", 0, "L");

$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(35, 5, "Job Code as per PDF", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(35, 5, "Text Mater per PDF", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(55, 5, "Carton/ Label/ Leaflets size(In mm)", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(55, 5, "Job Grain Direction: Short/ Long", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(75, 5, "Positive Screen & Design as per PDF/Approval", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(55, 5, "Positive Registration (OK /Not OK)", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(55, 5, "Job Style (Lock Bottom / RTF)", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(55, 5, "Ups No, Logo, Clock (Yes/ No)", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(100, 5, "Ready to Plate making logo /Clock with year & month (Yes/ No)", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);

$pdf->Ln();
$pdf->Cell(10, 5, "b)", 0, "L");
$pdf->Cell(50, 5, "If Old Job", 0, "L");
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(27, 5, "No. of Plates", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(47, 5, "All Plates are Ok/ Not Ok", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(47, 5, "No of Cancel Plates or Colour", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 5, "", 0, "L");
$pdf->Cell(20, 5, "", 0, "L");
$pdf->Cell(70, 5, "Clock/ Month & Year Up date (Ok / Not Ok)", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 200, $y + 4);
//
////////////////////////////////////////////////////////////
//
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 5, "Production Supervisor:", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 120, $y + 4);

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 5, "Q.C. Inspector:", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 120, $y + 4);

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 5, "Plate Maker:", 0, "L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y + 4, 120, $y + 4);


}
        $pdf->Output();


    }
}
