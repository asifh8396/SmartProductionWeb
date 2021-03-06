<?php

class CommPackingSlip extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index () {

        $this->load->library('PDF');
        $pdf = new PDF('P','mm','A4');


        date_default_timezone_set('Asia/Kolkata');
        $DocId = $_GET['hdn_docid'];
        $icompanyidlogin = $_GET['Icompanyid'];

        $jobType = $_GET['JobType'];
        if($jobType != 'C'){
            $jobType = 'P';
        }

        $this->db->query("call Web_CuttingSlip('$DocId','$jobType','$icompanyidlogin');");

        $result = $this->db->query("select * from BoardCuttingDetails;");

        $JobNo = '';
        $JobName = '';
        $ClientName = '';
        $ComponentName = '';
        $Compcount = $result->num_rows();


        // $pdf = new PDF_MemImage ();
        // $pdf->AddPage();

        $pdf->SetY(5);
        $pdf->Cell(139);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "B", "8");
        //$pdf->Image('../../Images/netgen.png', 9, 3, 18, 12);
        //$pdf->Cell(99, 5, "NPPL/PR/FR/01", 0, 0, 'L');
        $pdf->Cell(99, 5, "", 0, 0, 'L');

        //$pdf->SetAutoPageBreak(FALSE);


        //for ($i = 1; $i <= $Compcount; $i++) {
            
            if ($result->num_rows() > 0) {
                $r=$result->result();
                $i = 1;
                foreach ($r as $row) {
                    
                        if($i == '3' || $i == '5' || $i == '7' || $i == '9'){
                           $pdf->AddPage();
                        }
                    $JobNo = $row->JobNo;
                    // $JobNo = $row['JobNo'];
                    if ($JobNo == "") {
                        $JobNo = "";
                    }

                    $JobName = $row->JobName;
                    if ($JobName == "") {
                        $JobName = "";
                    }

                    $ClientName = $row->ClientName;
                    if ($ClientName == "") {
                        $ClientName = "";
                    }

                    $ComponentName = $row->ComponentName;
                    if ($ComponentName == '') {
                        $ComponentName = '';
                    }
                    $Machine = $row->Machine;
                    if ($Machine == '') {
                        $Machine = '';
                    }
                    
                    $Boardkind = $row->Boardkind;
                    $GSM = $row->GSM;
                    $Deckle = $row->Deckle;
                    $Grain = $row->Grain;
                    $TotalSHeets = $row->TotalSHeets;
                    $CutSize = $row->CutSize;
                    $TotalCutSHeets = $row->TotalCutSHeets;
                    
                    $Remarks = $row->Remarks;
                    $Machine =  $row->Machine;  //"My Machine" ;
                    
                    
               $i++;
            }  
            
            // $pdf->Ln();
            $pdf->Ln();
            $pdf->SetFont("Arial", "", "7");
            $pdf->Cell(193, 6, 'PRINT DATE AND TIME : ' . date('d/m/Y H:i:s'), 0, 0, "R");

            $pdf->SetFont("Arial", "", "16");
            $pdf->Ln();
            //$CompanyName
            $pdf->Cell(193, 8, "JOB CUTTING SLIP", 1, 0, "C");

            $pdf->SetFont("Arial", "B", "8");
            $pdf->Cell(20, 8, '', 0, 0, "C");

            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
            $pdf->Cell(25, 5, 'Job No.', 1, 0, "C", 1);

            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(168, 5, $JobNo, 1, 0, "L", 1);

            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
            $pdf->Cell(25, 5, 'Client Name', 1, 0, "C", 1);

            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(168, 5, $ClientName, 1, 0, "L", 1);

            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
            $pdf->Cell(25, 5, 'Job Description', 1, 0, "C", 1);

            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(168, 5, $JobName, 1, 0, "L", 1);
            
            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
            $pdf->Cell(25, 5, 'Component', 1, 0, "C", 1);

            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(168, 5, $ComponentName, 1, 0, "L", 1);    
            
            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
            $pdf->Cell(25, 5, 'Machine Name', 1, 0, "C", 1);

            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(168, 5, $Machine, 1, 0, "L", 1);   

            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
            $pdf->Cell(25, 5, 'Remarks', 1, 0, "C", 1);

            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(168, 5, $Remarks, 1, 0, "L", 1);      
            //$Remarks

            $pdf->Ln();
            $pdf->SetFont("Arial", "B", "7");
            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFillColor(54, 101, 194);
    // 

    $pdf->Ln();
    $pdf->SetFont("Arial", "B", "7");
    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(54, 101, 194);
//        $pdf->Ln();
//        $pdf->Cell(193, 5, 'DELIVERY DETAILS', 1, 0, "C", 1);
    $pdf->Ln();
    $pdf->Cell(65, 5, 'PAPER / CARD', 1, 0, "C", 1);
    $pdf->Cell(20, 5, 'GSM', 1, 0, "C", 1);
    $pdf->Cell(33, 5, 'SIZE', 1, 0, "C", 1);
    $pdf->Cell(25, 5, 'FULL SHEETS', 1, 0, "C", 1);
    $pdf->Cell(25, 5, 'CUT SIZE', 1, 0, "C", 1);
    $pdf->Cell(25, 5, 'QUANTITY', 1, 0, "C", 1);

    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();
    $pdf->Cell(65, 5, $Boardkind, 1, 0, "C", 1);
    $pdf->Cell(20, 5, $GSM, 1, 0, "C", 1);
    $pdf->Cell(33, 5, $Deckle." X ".$Grain, 1, 0, "C", 1);
    $pdf->Cell(25, 5, $TotalSHeets, 1, 0, "C", 1);
    $pdf->Cell(25, 5, $CutSize, 1, 0, "C", 1);
    $pdf->Cell(25, 5, $TotalCutSHeets, 1, 0, "C", 1);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont("Arial", "B", "7");
    $pdf->Ln();

    $pdf->Ln();
    $pdf->Cell(33, 5, 'SLIPS', 1, 0, "C", 1);
    $pdf->Cell(80, 5, 'INSTRUCATIONS : -', 1, 0, "L", 1);
    $pdf->Cell(80, 5, 'MACHINE : - '.$Machine, 1, 0, "L", 1);

    $pdf->Ln();
    $pdf->Cell(193, 45, "", 1, 0, 'L');

    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->SetY($pdf->GetY());
    $pdf->Cell(33, 5, "1", 1, 0, 'L');

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->Cell(33, 5, "2", 1, 0, 'L');

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->Cell(33, 5, "3", 1, 0, 'L');

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->Cell(33, 15, "Cutter", 1, 0, 'L');

    $pdf->SetY($pdf->GetY() + 15);
    $pdf->Cell(33, 15, "Sign.", 1, 0, 'L');

    $pdf->SetY($pdf->GetY() - 25);
    $pdf->SetX($pdf->GetX() + 40);
    $pdf->Cell(65, 35, '', 1, 0, 'C');  //Text inside second column 

    $pdf->SetY($pdf->GetY());
    $pdf->SetX($pdf->GetX() + 117);
    $pdf->Cell(70, 35, '', 1, 0, 'C'); //Text inside second column 



    $pdf->Ln();
    $pdf->Cell(33, 5, '', 0, 0, "L", 1);
    $pdf->Ln();
    $pdf->Ln();
    
    $i++;
        }

        // $pdf->Output('Cutting Slip.pdf', 'I');
        $pdf->Output();
        }
}

