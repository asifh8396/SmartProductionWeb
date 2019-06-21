<?php

class JobDocketReport extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index () {

        $this->load->library('PDF');
        $pdf = new PDF('P','mm','A4');

        // $pdf = new PDF_MemImage ();
        // date_default_timezone_set('Asia/Kolkata');
        $docidno = $_GET['hdn_docid'];

    $this->db->query("call JobcardReport_Pine('$docidno');");


    $pdf->AddPage();
    $pdf->SetLeftMargin(10);
    $pdf->SetFont("Arial", "B", "10");
    $result = $this->db->query("select DocID,OperatorName,Asd,Remarks,MachineID,Pshift,DateAndShift,
        AMrtime,APrTime,ATotalTime,Wastage,Plateqty from item_Docket_report where Ptype='JobInfo';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(35, 7, 'PINETREE', 1, 0, "L");
            $pdf->Cell(40, 7, 'JOB DOCKET', 1, 0, 'C');
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(24, 7, 'Docket No.', 1, 0, 'L');
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(48, 7, $row->DocID, 1, 0, 'L');
            $pdf->SetFont("Arial", "B", "10");
            $pdf->Cell(48, 7, 'F/7/08/00', 1, 0, 'L');
            $pdf->SetFont("Arial", "", "7");
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Customer:', 1, 0, "L");
            $pdf->Cell(82, 5, $row->OperatorName, 1, 0, "L");
            $pdf->Cell(24, 5, 'Date:', 1, 0, 'L');
            $pdf->Cell(24, 5, $row->Asd, 1, 0, 'L');
            $pdf->Cell(24, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, 'C.List inputs', 1, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Job Name:', 1, 0, "L");
            $pdf->Cell(82, 5, $row->Remarks, 1, 0, "L");
            $pdf->Cell(24, 5, 'P.O. No.:', 1, 0, 'L');
            $pdf->Cell(48, 5, $row->MachineID, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Approvals', 1, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Job code:', 1, 0, "L");
            $pdf->Cell(82, 5, $row->Pshift, 1, 0, "L");
            $pdf->Cell(24, 5, 'Carton Dimension:', 1, 0, 'L');
            $pdf->Cell(48, 5, $row->DateAndShift, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Paper/boards', 1, 0, 'L');
            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "8");
            $pdf->Cell(17, 5, 'Batch No.', 1, 0, "L");
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(26, 5, '', 1, 0, "L");
            $pdf->SetFont("Arial", "B", "9");
            $pdf->Cell(18, 5, 'EXP', 1, 0, 'L');
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(38, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, 'Order Qty. (ctns):', 1, 0, 'L');
            $pdf->Cell(24, 5, $row->AMrtime, 1, 0, 'L');
             $pdf->Cell(24, 5, "Print Qty.", 1, 0, 'L');
            $pdf->Cell(24, 5, $row->Plateqty, 1, 0, 'L');
            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "8");
            $pdf->Cell(17, 5, 'MFD', 1, 0, "L");
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(26, 5, '', 1, 0, "L");
            $pdf->SetFont("Arial", "B", "9");
            $pdf->Cell(18, 5, 'MRP', 1, 0, 'L');
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(38, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, 'Qty.Executed:', 1, 0, 'L');
            $pdf->Cell(48, 5, $row->APrTime, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Coatings', 1, 0, 'L');
            $dispatchqty = $row->ATotalTime;
            $qtydispatch = $row->APrTime;
            $Wastagef = $row->APrTime-$row->ATotalTime;
            $ExecutedQty=$row->APrTime;
            
            
        }
    } else {
        $pdf->Ln();
        $pdf->Cell(35, 7, 'PINETREE', 1, 0, "L");
        $pdf->Cell(40, 7, 'JOB DOCKET', 1, 0, 'C');
        $pdf->SetFont("Arial", "", "7");
        $pdf->Cell(24, 7, 'Docket No.', 1, 0, 'L');
        $pdf->SetFont("Arial", "B", "10");
        $pdf->Cell(48, 7, '', 1, 0, 'L');
        $pdf->Cell(48, 7, 'F/7/08/00', 1, 0, 'L');
        $pdf->SetFont("Arial", "", "7");
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Customer:', 1, 0, "L");
        $pdf->Cell(82, 5, '', 1, 0, "L");
        $pdf->Cell(24, 5, 'Date:', 1, 0, 'L');
        $pdf->Cell(24, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'C.List inputs', 1, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Job Name:', 1, 0, "L");
        $pdf->Cell(82, 5, '', 1, 0, "L");
        $pdf->Cell(24, 5, 'P.O. No.:', 1, 0, 'L');
        $pdf->Cell(48, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Approvals', 1, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Job code:', 1, 0, "L");
        $pdf->Cell(82, 5, '', 1, 0, "L");
        $pdf->Cell(24, 5, 'Form size:', 1, 0, 'L');
        $pdf->Cell(48, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Paper/boards', 1, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont("Arial", "B", "8");
        $pdf->Cell(17, 5, 'Batch No.', 1, 0, "L");
        $pdf->SetFont("Arial", "", "7");
        $pdf->Cell(26, 5, '', 1, 0, "L");
        $pdf->SetFont("Arial", "B", "9");
        $pdf->Cell(18, 5, 'EXP', 1, 0, 'L');
        $pdf->SetFont("Arial", "", "7");
        $pdf->Cell(38, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Order Qty. (ctns):', 1, 0, 'L');
        $pdf->Cell(48, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Special inks', 1, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont("Arial", "B", "8");
        $pdf->Cell(17, 5, 'MFD', 1, 0, "L");
        $pdf->SetFont("Arial", "", "7");
        $pdf->Cell(26, 5, '', 1, 0, "L");
        $pdf->SetFont("Arial", "B", "9");
        $pdf->Cell(18, 5, 'MRP', 1, 0, 'L');
        $pdf->SetFont("Arial", "", "7");
        $pdf->Cell(38, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Qty.Executed:', 1, 0, 'L');
        $pdf->Cell(48, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Coatings', 1, 0, 'L');
        $dispatchqty = "";
        $qtydispatch = "";
        $Wastagef = "";
    }
    $result = $this->db->query("select OperatorName,Remarks,AMrTime,MachineId,PShift,
            DateAndShift,ATotalTime from item_Docket_report where Ptype='FullSize';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Paper details:', 1, 0, "L");
            $pdf->Cell(82, 5, $row->OperatorName, 1, 0, "L");
            $pdf->Cell(24, 5, 'Qty. Dispatch:', 1, 0, 'L');
            $pdf->Cell(48, 5, $dispatchqty, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Die', 1, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Board size:', 1, 0, "L");
            $pdf->Cell(44, 5, $row->Remarks, 1, 0, "L");
            $pdf->Cell(18, 5, 'GSM:', 1, 0, 'L');
            $pdf->Cell(20, 5, $row->AMrTime, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Wastage', 1, 0, 'L');
            $pdf->Cell(48, 5, $Wastagef, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Emboss. Block', 1, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Paper Req.(PKT.)', 1, 0, "L");
            $pdf->Cell(26, 5, $row->MachineId, 1, 0, "L");
            $pdf->Cell(18, 5, '', 1, 0, 'R');
            $pdf->Cell(18, 5, 'Ups 1:', 1, 0, 'L');
            $pdf->Cell(20, 5, $row->PShift, 1, 0, 'L');
            //  $pdf->Cell(24, 5, 'REMARKS', 1, 0, 'L');
            $pdf->Cell(24, 5, 'Wastage (%)', 1, 0, 'L');
            $pdf->Cell(48, 5, round($Wastagef*100/$ExecutedQty,2), 1, 0, 'L');
            $pdf->Cell(24, 5, 'Foil material', 1, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(17, 5, 'Sheets/PKT.', 1, 0, "L");
            $pdf->Cell(26, 5, '', 1, 0, "R");
            $pdf->Cell(18, 5, '', 1, 0, 'R');
            $pdf->Cell(18, 5, 'UPS 2:', 1, 0, 'L');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(72, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, 'Any other', 1, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(21, 5, 'Impressions/UP:', 1, 0, "L");
            $pdf->Cell(40, 5, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(18, 5, 'Wastage(%)', 1, 0, 'L');
            $pdf->Cell(20, 5, $row->ATotalTime, 1, 0, 'L');
            $pdf->Cell(72, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, 'Any other', 1, 0, 'L');
            $pdf->SetFont("Arial", "B", "7");
        }
    } else {
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Paper details:', 1, 0, "L");
        $pdf->Cell(82, 5, '', 1, 0, "C");
        $pdf->Cell(24, 5, 'Qty. Dispatch:', 1, 0, 'L');
        $pdf->Cell(48, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Die', 1, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Board size:', 1, 0, "L");
        $pdf->Cell(44, 5, '', 1, 0, "R");
        $pdf->Cell(18, 5, 'GSM:', 1, 0, 'L');
        $pdf->Cell(20, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Wastage', 1, 0, 'L');
        $pdf->Cell(48, 5, '', 1, 0, 'L');
        
        $pdf->Cell(24, 5, 'Emboss. Block', 1, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Paper Req.(PKT.)', 1, 0, "L");
        $pdf->Cell(26, 5, '', 1, 0, "R");
        $pdf->Cell(18, 5, '', 1, 0, 'R');
        $pdf->Cell(18, 5, 'Ups 1:', 1, 0, 'L');
        $pdf->Cell(20, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Foil material', 1, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(17, 5, 'Sheets/PKT.', 1, 0, "L");
        $pdf->Cell(26, 5, '', 1, 0, "R");
        $pdf->Cell(18, 5, '', 1, 0, 'R');
        $pdf->Cell(18, 5, 'UPS 2:', 1, 0, 'L');
        $pdf->Cell(20, 5, '', 1, 0, 'L');
        $pdf->Cell(72, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Any other', 1, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(21, 5, 'Impressions/UP:', 1, 0, "L");
        $pdf->Cell(40, 5, '', 1, 0, "L");
        $pdf->Cell(18, 5, 'Wastage(%)', 1, 0, 'L');
        $pdf->Cell(20, 5, '', 1, 0, 'L');
        $pdf->Cell(72, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'Any other', 1, 0, 'L');
        $pdf->SetFont("Arial", "B", "7");
    }
    $pdf->Ln();
    $pdf->Cell(195, 5, 'PROCESS INVOLVED', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $result = $this->db->query("select ProcessID,ProcessString  from jobcardoldprocess_temp;");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(50, 5, $row->ProcessID, 1, 0, "L");
            $pdf->Cell(145, 5, $row->ProcessString, 1, 0, "L");
        }
    }
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(37, 5, 'CUTTING', 1, 0, "L");
    $result = $this->db->query("select OperatorName, Remarks from item_Docket_report where PType = 'CutSize';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Cell(20, 5, 'CUT SIZE 1:', 1, 0, 'L');
            $pdf->Cell(40, 5, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(24, 5, 'CUT SIZE 2 :', 1, 0, 'L');
            $pdf->Cell(24, 5, $row->Remarks, 1, 0, 'C');
        }
    } else {
        $pdf->Cell(20, 5, 'CUT SIZE 1 :', 1, 0, 'L');
        $pdf->Cell(40, 5, '', 1, 0, 'L');
        $pdf->Cell(24, 5, 'CUT SIZE 2 :', 1, 0, 'L');
        $pdf->Cell(24, 5, '', 1, 0, 'C');
    }

    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(17, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(28, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(16, 5, 'Prodn Hrs', 1, 0, 'C');
    $pdf->Cell(18, 5, 'T. Production', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Avg.Production', 1, 0, 'C');
    $pdf->Cell(24, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(24, 5, 'wastage (sheets)', 1, 0, 'C');
    $pdf->Cell(48, 5, 'Remarks', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,APrTime,PSheets,0,
            OperatorName,Wastage,Remarks  from item_Docket_report  where PType='PCut';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                } elseif ($loop_limit1 == $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
                // $height = 5 * $loop_limit1;
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(17, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(28, $height, $text, 1, 0, "L");
            $pdf->Cell(16, $height, $row->APrTime, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->PSheets, 1, 0, 'L');
            $pdf->Cell(20, $height, '0', 1, 0, 'L');
            $pdf->Cell(24, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(24, $height, $row->Wastage, 1, 0, 'L');
            $pdf->Cell(48, $height, $text1, 1, 0, 'L');
        }
    }




    $result = $this->db->query("select PTotal,AMrTime,PSheets,Wastage from item_docket_report_total1 where PType='PCut';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(17, 5, $row->PTotal, 1, 0, "L");
            $pdf->Cell(26, 5, '', 1, 0, "L");
            $pdf->Cell(18, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, '', 1, 0, 'L');
            $pdf->Cell(24, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(48, 5, '', 1, 0, 'L');
        }
    }















    $pdf->Ln();
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Cell(195, 5, 'PRINTING', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(25, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(30, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(14, 5, 'Mk.Rd. Hrs.', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (Sht.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(18, 5, '100%SORTING', 1, 0, 'C');
    $pdf->Cell(15, 5, 'W.SHEETS', 1, 0, 'C');
    $pdf->Cell(35, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,AMrTime,APrTime,PSheets,OperatorName,
        Sorting,Wastage,Remarks  from item_Docket_report where PType='Pr';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(25, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(30, $height, $text, 1, 0, "L");
            $pdf->Cell(14, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, $height, $text1, 1, 0, 'L');
        }
    }











    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,Wastage,Sorting from item_docket_report_total1  where PType='Pr';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(25, 5, $row->PTotal, 1, 0, "L");
            $pdf->Cell(30, 5, '', 1, 0, "L");
            $pdf->Cell(14, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(18, 5, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, 5, '', 1, 0, 'L');
        }
    }










    $pdf->Ln();
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Cell(10, 5, 'INK', 1, 0, "C");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Cell(40, 5, 'CODE/NAME', 1, 0, "C");
    $pdf->Cell(20, 5, 'Issue Slip no.', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Return Slip no.', 1, 0, 'C');
    $pdf->Cell(15, 5, 'Release', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Consumption', 1, 0, 'C');
    $pdf->Cell(20, 5, 'G.S.M.', 1, 0, 'C');
    $pdf->Cell(50, 5, 'INK Density', 1, 0, 'C');



//    for ($i = 1; $i < 7; $i++) {
//        $pdf->Ln();
//        $pdf->Cell(10, 5, $i, 1, 0, "R");
//        $pdf->Cell(40, 5, '', 1, 0, "L");
//        $pdf->Cell(20, 5, '', 1, 0, 'L');
//        $pdf->Cell(20, 5, '', 1, 0, 'L');
//        $pdf->Cell(15, 5, '', 1, 0, 'L');
//        $pdf->Cell(20, 5, '', 1, 0, 'L');
//        $pdf->Cell(20, 5, '', 1, 0, 'L');
//        $pdf->Cell(50, 5, '', 1, 0, 'L');
//    }



    $i = 1;

    $result = $this->db->query("select OperatorName,DocID,AMrTime,Wastage,MachineID,APrTime from item_docket_report  where PType='Ink';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(10, 5, $i, 1, 0, "R");
            $pdf->Cell(40, 5, $row->OperatorName, 1, 0, "L");
            $pdf->Cell(20, 5, $row->DocID, 1, 0, 'L');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(15, 5, $row->AMrTime, 1, 0, 'L');
            $pdf->Cell(20, 5, $row->Wastage, 1, 0, 'L');
            $pdf->Cell(20, 5, $row->MachineID, 1, 0, 'L');
            //$pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(50, 5, $row->APrTime, 1, 0, 'L');
            $i++;
        }
    }





    $result = $this->db->query("select Wastage,Sorting from item_docket_report_total1  where PType='Ink';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {

            $pdf->Ln();
            //$pdf->Cell(10, 5, '', 1, 0, "R");
            $pdf->Cell(50, 5, 'Total', 1, 0, "L");
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(15, 5, '', 1, 0, 'L');
            $pdf->Cell(20, 5, $row->Wastage, 1, 0, 'L');
            $pdf->Cell(20, 5, $row->Sorting, 1, 0, 'L');
            $pdf->Cell(50, 5, '', 1, 0, 'L');
        }
    }



    $k = 0;
    $result = $this->db->query("select Blanketqty,PlateQty from item_docket_report  where PType='Ink';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            
            $pdf->Ln();
            $pdf->Cell(77, 5, 'Job Approved By:', 1, 0, "L");
            $pdf->Cell(44, 5, 'Blanket Qty.:' . $row->Blanketqty, 1, 0, 'L');
            $pdf->Cell(24, 5, 'Plate Qty.:' . $row->PlateQty, 1, 0, 'L');
            $pdf->Cell(50, 5, '', 1, 0, 'C');
        }
    }


    $pdf->Ln();
    $pdf->Cell(37, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(25, 5, 'Sign', 1, 0, 'C');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(57, 5, 'HOT FOIL STAMPING', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Cell(113, 5, 'Type:', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(57, 5, 'L-Pull', 1, 0, "L");
    $pdf->Cell(40, 5, 'S-Pull', 1, 0, 'L');
    $pdf->Cell(48, 5, 'Total Pull', 1, 0, 'C');
    $pdf->Cell(50, 5, 'Size:', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(25, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(30, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(14, 5, 'Mk.Rd. Hrs.', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (Sht.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(18, 5, '100%SORTING', 1, 0, 'C');
    $pdf->Cell(15, 5, 'W.SHEETS', 1, 0, 'C');
    $pdf->Cell(35, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,AMrTime,APrTime,PSheets,OperatorName,
            Sorting,Wastage,Remarks  from item_Docket_report where PType in ('FF','BF');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(25, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(30, $height, $text, 1, 0, "L");
            $pdf->Cell(14, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, $height, $text1, 1, 0, 'L');
        }
    }




    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,Wastage,Sorting from item_docket_report_total1  where PType in ('FF','BF');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {


            $pdf->Ln();
            $pdf->Cell(25, 5, $row->PTotal, 1, 0, "L");
            $pdf->Cell(30, 5, '', 1, 0, "L");
            $pdf->Cell(14, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(18, 5, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, 5, '', 1, 0, 'L');
        }
    }

    $pdf->Ln();
    $pdf->Cell(57, 5, 'Job Approved By:', 1, 0, "L");
    $pdf->Cell(64, 5, 'Avg. Production/Shifts:', 1, 0, 'L');
    $pdf->Cell(74, 5, 'Consumption:', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(37, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(25, 5, 'Sign', 1, 0, 'C');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Cell(195, 5, 'VARNISH/U.V./LAMINATION', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(25, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(30, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(14, 5, 'Mk.Rd. Hrs.', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (Sht.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(18, 5, '100%SORTING', 1, 0, 'C');
    $pdf->Cell(15, 5, 'W.SHEETS', 1, 0, 'C');
    $pdf->Cell(35, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,AMrTime,APrTime,PSheets,OperatorName,Sorting,Wastage,
            Remarks  from item_Docket_report where PType in ('FC','BC','FL','BL');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(25, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(30, $height, $text, 1, 0, "L");
            $pdf->Cell(14, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, $height, $text1, 1, 0, 'L');
        }
    }
    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,Wastage,Sorting from 
            item_docket_report_total1  where PType in ('FC','BC','FL','BL');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(25, 5, $row->PTotal, 1, 0, "L");
            $pdf->Cell(30, 5, '', 1, 0, "L");
            $pdf->Cell(14, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(18, 5, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, 5, '', 1, 0, 'L');
        }
    }






    $pdf->Ln();
    $pdf->Cell(37, 5, '', 0, 0, "C");
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Cell(60, 5, 'TOTAL PRODUCTION:', 0, 0, 'L');
    $pdf->SetFont("Arial", "", "7");
    $pdf->Cell(48, 5, 'Consumption:', 1, 0, 'L');
    $pdf->Cell(25, 5, 'Remarks', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(37, 5, 'Coating Details:', 0, 0, "L");
    //$pdf->Cell(60, 5, 'Code No./Batch No.:', 1, 0, 'L');

    $result = $this->db->query("select OperatorName from item_Docket_report where Ptype='Varnish';");
    $varnishcode="";
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            //  $pdf->Cell(48, 5,  $row->OperatorName, 1, 0, 'L');
            //$pdf->Cell(60, 5, 'Code No./Batch No.:' . $row->OperatorName, 1, 0, 'L');
            $varnishcode=$varnishcode.$row->OperatorName."/";
        }
    } 
    $lastvarnishcode=substr_replace($varnishcode, "", -1);
//    else {
//        $pdf->Cell(60, 5, 'Code No./Batch No.:', 1, 0, 'L');
//    }
    $pdf->Cell(108, 5, 'Code No./Batch No.:' . $lastvarnishcode, 1, 0, 'L');
    //$pdf->Cell(48, 5, '', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(77, 5, '', 0, 0, "L");
    $pdf->Cell(44, 5, '', 1, 0, 'L');
    $pdf->Cell(49, 5, '', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(121, 5, 'Job Approved By:', 0, 0, "L");
    $pdf->Cell(74, 5, 'Remarks:', 0, 0, 'L');
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(195, 5, 'OFFLINE EMBOSSING', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(25, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(30, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(14, 5, 'Mk.Rd. Hrs.', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (Sht.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(18, 5, '100%SORTING', 1, 0, 'C');
    $pdf->Cell(15, 5, 'W.SHEETS', 1, 0, 'C');
    $pdf->Cell(35, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,AMrTime,APrTime,PSheets,OperatorName,Sorting,
            Wastage,Remarks  from item_Docket_report where PType in ('EM');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(25, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(30, $height, $text, 1, 0, "L");
            $pdf->Cell(14, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, $height, $text1, 1, 0, 'L');
        }
    }
    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,Wastage,Sorting from item_docket_report_total1  where PType in ('EM');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(25, 5, $row->PTotal, 1, 0, "L");
            $pdf->Cell(30, 5, '', 1, 0, "L");
            $pdf->Cell(14, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(18, 5, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, 5, '', 1, 0, 'L');
        }
    }
    $pdf->Ln();
    $pdf->Cell(97, 5, 'Job Approved By:', 1, 0, "L");
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(49, 5, 'Remarks:', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(57, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(40, 5, '', 1, 0, 'L');
    $pdf->Cell(48, 5, '', 1, 0, 'L');
    $pdf->Cell(50, 5, 'Sign', 1, 0, 'L');
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(195, 5, 'DIE CUTTING/INLINE EMBOSSING', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(25, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(30, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(14, 5, 'Mk.Rd. Hrs.', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (Sht.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(18, 5, '100%SORTING', 1, 0, 'C');
    $pdf->Cell(15, 5, 'W.SHEETS', 1, 0, 'C');
    $pdf->Cell(35, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,AMrTime,APrTime,PSheets,
            OperatorName,Sorting,Wastage,Remarks  from item_Docket_report where PType in ('PN');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(25, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(30, $height, $text, 1, 0, "L");
            $pdf->Cell(14, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, $height, $text1, 1, 0, 'L');
        }
    }











    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,Wastage,Sorting from item_docket_report_total1  where PType in ('PN');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(25, 5, $row->PTotal, 1, 0, "L");
            $pdf->Cell(30, 5, '', 1, 0, "L");
            $pdf->Cell(14, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(18, 5, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, 5, '', 1, 0, 'L');
        }
    }











    $pdf->Ln();
    $pdf->Cell(57, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(40, 5, '', 1, 0, 'L');
    $pdf->Cell(48, 5, '', 1, 0, 'L');
    $pdf->Cell(50, 5, 'Sign', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(97, 5, 'Job Approved By:', 1, 0, "L");
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(49, 5, 'Remarks:', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(195, 5, 'SORTING', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(13, 5, 'Date', 1, 0, "C");
    $pdf->Cell(13, 5, 'shift', 1, 0, "C");
    $pdf->Cell(20, 5, 'Sorter Name', 1, 0, 'C');
    $pdf->Cell(15, 5, 'Prodn. Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (ctns)', 1, 0, 'C');
    $pdf->Cell(18, 5, 'Avg. Prod/Hrs', 1, 0, 'C');
    $pdf->Cell(15, 5, 'Waste c/ts', 1, 0, 'C');
    $pdf->Cell(81, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select Asd,PShift,OperatorName,APrTime,PSheets,0,Wastage,
            Remarks  from item_Docket_report where PType in ('SO');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->Remarks, 50, "\n");
            $len = strlen($row->Remarks);
            $loop_limit = ceil($len / 50);
            if ($loop_limit > 1) {
                $height = 5 * $loop_limit;
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(13, 5, $row->Asd, 1, 0, "C");
            $pdf->Cell(13, 5, $row->PShift, 1, 0, "C");
            $pdf->Cell(20, 5, $row->OperatorName, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(18, 5, '0', 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(81, 5, $text, 1, 0, 'C');
        }
    }






    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,
            Wastage from item_docket_report_total1 where PType in ('SO');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(13, 5, $row->PTotal, 1, 0, "C");
            $pdf->Cell(13, 5, '', 1, 0, "C");
            $pdf->Cell(20, 5, '', 1, 0, 'C');
            $pdf->Cell(15, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(18, 5, '', 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(81, 5, '', 1, 0, 'C');
        }
    }









    $pdf->Ln();
    $pdf->Cell(57, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(40, 5, '', 1, 0, 'L');
    $pdf->Cell(48, 5, '', 1, 0, 'L');
    $pdf->Cell(50, 5, 'Sign', 1, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(97, 5, 'Job Approved By:', 1, 0, "L");
    $pdf->Cell(24, 5, '', 1, 0, 'C');
    $pdf->Cell(49, 5, 'Remarks:', 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'C');
    $pdf->SetFont("Arial", "B", "7");
    
	
	
	 $pdf->Ln();
    $pdf->Cell(195, 5, 'PASTING', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(15, 5, 'Date', 1, 0, "C");
    $pdf->Cell(10, 5, 'Shift', 1, 0, "C");
    $pdf->Cell(24, 5, 'Machine', 1, 0, 'C');
    $pdf->Cell(15, 5, 'Mk.Rd.Hrs', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production(ctns.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Waste c/ts', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Avg. Production', 1, 0, 'C');
    $pdf->Cell(33, 5, 'Remarks', 1, 0, 'C');
    $result = $this->db->query("select Asd,PShift,MachineID,AMrTime,APrTime,PSheets,OperatorName,
            Wastage,Remarks  from item_Docket_report where PType in ('Pa');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
//            $text = WordWrap($row->MachineID, 22, "\n");
//            $len = strlen($row->MachineID);
//            $loop_limit = ceil($len / 22);
//            if ($loop_limit > 1) {
//                $height = 5 * $loop_limit;
//            } else {
//                $height = 5 * 1;
//            }
            
            
            
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            
            $pdf->Ln();
            $pdf->Cell(15, $height, $row->Asd, 1, 0, "C");
            $pdf->Cell(10, $height, $row->PShift, 1, 0, "C");
            $pdf->Cell(24, $height, $text, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(20, $height, '', 1, 0, 'C');
            $pdf->Cell(33, $height, $text1, 1, 0, 'C');
        }
    }





    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,
            Wastage from item_docket_report_total1  where PType in ('Pa');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(25, 5, $row->PTotal, 1, 0, "C");
            $pdf->Cell(24, 5, '', 1, 0, 'C');
            $pdf->Cell(15, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'C');
            $pdf->Cell(20, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'C');
            $pdf->Cell(33, 5, '', 1, 0, 'C');
        }
    }
    $pdf->Ln();
    $pdf->Cell(49, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(53, 5, '', 1, 0, 'L');
    $pdf->Cell(60, 5, '', 1, 0, 'L');
    $pdf->Cell(33, 5, 'Sign', 1, 0, 'L');
    $pdf->SetFont("Arial", "B", "7");
    ;





































    $pdf->Ln();
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Cell(195, 5, 'Corrugation', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(25, 5, 'Date/shift', 1, 0, "C");
    $pdf->Cell(30, 5, 'Machine', 1, 0, "C");
    $pdf->Cell(14, 5, 'Mk.Rd. Hrs.', 1, 0, 'C');
    $pdf->Cell(18, 5, 'M.running Hrs', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Production (Sht.)', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Operator`s Name', 1, 0, 'C');
    $pdf->Cell(18, 5, '100%SORTING', 1, 0, 'C');
    $pdf->Cell(15, 5, 'W.SHEETS', 1, 0, 'C');
    $pdf->Cell(35, 5, 'REMARKS', 1, 0, 'C');
    $result = $this->db->query("select DateAndShift,MachineID,AMrTime,APrTime,PSheets,OperatorName,Sorting,Wastage,
            Remarks  from item_Docket_report where PType in ('FM','FP');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->MachineID, 22, "\n");
            $text1 = WordWrap($row->Remarks, 27, "\n");
            $len = strlen($row->MachineID);
            $len1 = strlen($row->Remarks);
            $loop_limit = ceil($len / 22);
            $loop_limit1 = ceil($len1 / 27);
            if ($loop_limit > 1 || $loop_limit1 > 1) {
                if ($loop_limit > $loop_limit1) {
                    $height = 5 * $loop_limit;
                } elseif ($loop_limit1 > $loop_limit) {
                    $height = 5 * $loop_limit1;
                }
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(25, $height, $row->DateAndShift, 1, 0, "L");
            $pdf->Cell(30, $height, $text, 1, 0, "L");
            $pdf->Cell(14, $height, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, $height, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, $height, $row->OperatorName, 1, 0, 'L');
            $pdf->Cell(18, $height, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, $height, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, $height, $text1, 1, 0, 'L');
        }
    }
    $result = $this->db->query("select PTotal,AMrTime,APrTime,AToTalTime,PSheets,Wastage,Sorting from 
            item_docket_report_total1  where PType in ('FM','FP');");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(25, 5, $row->AMrTime, 1, 0, "L");
            $pdf->Cell(30, 5, '', 1, 0, "L");
            $pdf->Cell(14, 5, $row->AMrTime, 1, 0, 'C');
            $pdf->Cell(18, 5, $row->APrTime, 1, 0, 'C');
            $pdf->Cell(20, 5, $row->PSheets, 1, 0, 'C');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(18, 5, $row->Sorting, 1, 0, 'C');
            $pdf->Cell(15, 5, $row->Wastage, 1, 0, 'C');
            $pdf->Cell(35, 5, '', 1, 0, 'L');
        }
    }
//    $pdf->Ln();
//    $pdf->Cell(37, 5, '', 0, 0, "C");
//    $pdf->SetFont("Arial", "B", "7");
//    $pdf->Cell(60, 5, 'TOTAL PRODUCTION:', 0, 0, 'L');
//    $pdf->SetFont("Arial", "", "7");
//    $pdf->Cell(48, 5, 'Consumption:', 1, 0, 'L');
//    $pdf->Cell(25, 5, 'Remarks', 1, 0, 'L');
//    $pdf->Cell(25, 5, '', 1, 0, 'L');
//    $pdf->Ln();
//    $pdf->Cell(37, 5, 'Coationg Details:', 0, 0, "L");
//    $pdf->Cell(60, 5, 'Code No./Batch No.:', 1, 0, 'L');
//    $pdf->Cell(48, 5, '', 1, 0, 'L');
//    $pdf->Cell(25, 5, '', 1, 0, 'L');
//    $pdf->Cell(25, 5, '', 1, 0, 'L');
//    $pdf->Ln();
//    $pdf->Cell(77, 5, '', 0, 0, "L");
//    $pdf->Cell(44, 5, '', 1, 0, 'L');
//    $pdf->Cell(49, 5, 'Yield/GSM achvd.', 1, 0, 'L');
//    $pdf->Cell(25, 5, '', 1, 0, 'L');
//    $pdf->Ln();
//    $pdf->Cell(121, 5, 'Job Approved By:', 0, 0, "L");
//    $pdf->Cell(74, 5, 'Remarks:', 0, 0, 'L');
//    $pdf->SetFont("Arial", "B", "7");




    $pdf->Ln();
    $pdf->Cell(57, 5, 'Line Area Clearance Report', 1, 0, "L");
    $pdf->Cell(40, 5, '', 1, 0, 'L');
    $pdf->Cell(48, 5, '', 1, 0, 'L');
    $pdf->Cell(50, 5, 'Sign', 1, 0, 'L');






































    $pdf->Ln();
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Cell(195, 5, 'DESPATCH DETAILS', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(26, 5, 'Date', 1, 0, "C");
    $pdf->Cell(13, 5, 'Challan', 1, 0, "C");
    $pdf->Cell(16, 5, 'No. of Boxes', 1, 0, 'C');
    $pdf->Cell(13, 5, 'Packing', 1, 0, 'C');
    $pdf->Cell(16, 5, 'Odd Box Qty.', 1, 0, 'C');
    $pdf->Cell(15, 5, 'Total Qty.', 1, 0, 'C');
    $pdf->Cell(20, 5, 'L.R.NO.', 1, 0, 'C');
    $pdf->Cell(76, 5, 'Remarks', 1, 0, 'C');
    $result = $this->db->query("select DocDate,ChallanNo,NoOfItems,ParcelSize,0,Quantity,Vehchle,
            Remarks from Item_ReverseCost_Dispatch as a;");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $text = WordWrap($row->Remarks, 48, "\n");
            $len = strlen($row->Remarks);
            $loop_limit = ceil($len / 48);
            if ($loop_limit > 1) {
                $height = 5 * $loop_limit;
            } else {
                $height = 5 * 1;
            }
            $pdf->Ln();
            $pdf->Cell(26, $height, $row->DocDate, 1, 0, "L");
            $pdf->Cell(13, $height, $row->ChallanNo, 1, 0, "L");
            $pdf->Cell(16, $height, $row->NoOfItems, 1, 0, 'L');
            $pdf->Cell(13, $height, $row->ParcelSize, 1, 0, 'L');
            $pdf->Cell(16, $height, '0', 1, 0, 'L');
            $pdf->Cell(15, $height, $row->Quantity, 1, 0, 'L');
            $pdf->Cell(20, $height, $row->Vehchle, 1, 0, 'L');
            $pdf->Cell(76, $height, $text, 1, 0, 'L');
        }
    }
//     $result = $this->db->query("select DocDate,ChallanNo,NoOfItems,ParcelSize,0,Quantity,Vehchle,
//            Remarks from Item_ReverseCost_Dispatch as a;");
//    if (mysqli_num_rows($result) > 0) {
//        while ($row = mysqli_fetch_array($result)) {
//            $text = WordWrap($row->Remarks, 48, "\n");
//            $len = strlen($row->Remarks);
//            $loop_limit = ceil($len / 48);
//            if ($loop_limit > 1) {
//                $height = 5 * $loop_limit;
//            } else {
//                $height = 5 * 1;
//            }
//            $pdf->Ln();
//            $pdf->Cell(26, $height, $row->DocDate, 1, 0, "L");
//            $pdf->Cell(13, $height, $row->ChallanNo, 1, 0, "L");
//            $pdf->Cell(16, $height, $row->NoOfItems, 1, 0, 'L');
//            $pdf->Cell(13, $height, $row->ParcelSize, 1, 0, 'L');
//            $pdf->Cell(16, $height, $row->0, 1, 0, 'L');
//            $pdf->Cell(15, $height, $row->Quantity, 1, 0, 'L');
//            $pdf->Cell(20, $height, $row->Vehchle, 1, 0, 'L');
//            $pdf->Cell(76, $height, $text, 1, 0, 'L');
//        }
//    }
    $result = $this->db->query("select PSheets,Wastage,Sorting from item_docket_report_total1  where PType='Disp';");
    if ($result->num_rows() > 0) {
            $r=$result->result();
            foreach ($r as $row) {
            $pdf->Ln();
            $pdf->Cell(26, 5, 'Total', 1, 0, "L");
            $pdf->Cell(13, 5, '', 1, 0, "L");
            $pdf->Cell(16, 5, $row->Wastage, 1, 0, 'L');
            $pdf->Cell(13, 5, $row->Sorting, 1, 0, 'L');
            $pdf->Cell(16, 5, '', 1, 0, 'L');
            $pdf->Cell(15, 5, $row->PSheets, 1, 0, 'L');
            $pdf->Cell(20, 5, '', 1, 0, 'L');
            $pdf->Cell(76, 5, '', 1, 0, 'L');
        }
    }










    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(195, 5, 'CONTROL SAMPLE (Q.A.)', 1, 0, "L");
    $pdf->SetFont("Arial", "", "7");
    $pdf->Ln();
    $pdf->Cell(15, 5, 'Cont.Sample', 1, 0, "C");
    $pdf->Cell(42, 5, 'Collected By', 1, 0, "C");
    $pdf->Cell(20, 5, 'No. Of Sample', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Checked By', 1, 0, 'C');
    $pdf->Cell(24, 5, 'Date', 1, 0, 'C');
    $pdf->Cell(24, 5, 'All Sec.Details', 1, 0, 'C');
    $pdf->Cell(50, 5, 'Remarks', 1, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(77, 5, 'Mgr.Printing', 0, 0, "L");
    $pdf->Cell(68, 5, 'Mgr.Postprinting', 0, 0, 'L');
    $pdf->Cell(50, 5, 'Q.A.Mgr.', 0, 0, 'L');
    // $pdf->Output('JobDocket.pdf', 'I');
    $pdf->Output();
}
     }   