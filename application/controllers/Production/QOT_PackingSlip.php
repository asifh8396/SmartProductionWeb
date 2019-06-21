<?php

include '../../Model/Mod_Connection.php';
include '../../Model/Report/mod_Job_Card_DocketReport.php';
require '../fpdf/fpdf.php';

class PDF extends FPDF {

    function WordWrap(&$text, $maxwidth) {
        $text = trim($text);
        if ($text === '')
            return 0;
        $space = $this->GetStringWidth(' ');
        $lines = explode("\n", $text);
        $text = '';
        $count = 0;

        foreach ($lines as $line) {
            $words = preg_split('/ +/', $line);
            $width = 0;

            foreach ($words as $word) {
                $wordwidth = $this->GetStringWidth($word);
                if ($width + $wordwidth <= $maxwidth) {
                    $width += $wordwidth + $space;
                    $text .= $word . ' ';
                } else {
                    $width = $wordwidth + $space;
                    $text = rtrim($text) . "\n" . $word . ' ';
                    $count++;
                }
            }
            $text = rtrim($text) . "\n";
            $count++;
        }
        $text = rtrim($text);
        return $count;
    }

    //Page header
    function Header() {
        
    }

    //Page footer
    function Footer() {
//Position at 1.5 cm from bottom
        $this->SetY(-10);
//Arial italic 8
        //$this->SetFont('Arial', 'B', 15);
        // $this->image('Sapcon LH - Footer.jpg', 05, 277, 200, 18);
        //$this->SetFont('Arial', '', 8);
        //Page number
        //$this->Cell(120);
        //$this->Ln(42);
        //$this->SetY(-15);
        //$this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
        //$this->Cell(120);
        //$this->Ln(42);
    }

    function VCell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false) {
//Output a cell
        $k = $this->k;
        if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak()) {
//Automatic page break
            $x = $this->x;
            $ws = $this->ws;
            if ($ws > 0) {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            $this->AddPage($this->CurOrientation, $this->CurPageSize);
            $this->x = $x;
            if ($ws > 0) {
                $this->ws = $ws;
                $this->_out(sprintf('%.3F Tw', $ws * $k));
            }
        }
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $s = '';
// begin change Cell function 
        if ($fill || $border > 0) {
            if ($fill)
                $op = ($border > 0) ? 'B' : 'f';
            else
                $op = 'S';
            if ($border > 1) {
                $s = sprintf('q %.2F w %.2F %.2F %.2F %.2F re %s Q ', $border, $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
            } else
                $s = sprintf('%.2F %.2F %.2F %.2F re %s ', $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
        }
        if (is_string($border)) {
            $x = $this->x;
            $y = $this->y;
            if (is_int(strpos($border, 'L')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'l')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);

            if (is_int(strpos($border, 'T')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);
            else if (is_int(strpos($border, 't')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);

            if (is_int(strpos($border, 'R')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'r')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);

            if (is_int(strpos($border, 'B')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'b')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
        }
        if (trim($txt) != '') {
            $cr = substr_count($txt, "\n");
            if ($cr > 0) { // Multi line
                $txts = explode("\n", $txt);
                $lines = count($txts);
                for ($l = 0; $l < $lines; $l++) {
                    $txt = $txts[$l];
                    $w_txt = $this->GetStringWidth($txt);
                    if ($align == 'U')
                        $dy = $this->cMargin + $w_txt;
                    elseif ($align == 'D')
                        $dy = $h - $this->cMargin;
                    else
                        $dy = ($h + $w_txt) / 2;
                    $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
                    if ($this->ColorFlag)
                        $s .= 'q ' . $this->TextColor . ' ';
                    $s .= sprintf('BT 0 1 -1 0 %.2F %.2F Tm (%s) Tj ET ', ($this->x + .5 * $w + (.7 + $l - $lines / 2) * $this->FontSize) * $k, ($this->h - ($this->y + $dy)) * $k, $txt);
                    if ($this->ColorFlag)
                        $s .= ' Q ';
                }
            }
            else { // Single line
                $w_txt = $this->GetStringWidth($txt);
                $Tz = 100;
                if ($w_txt > $h - 2 * $this->cMargin) {
                    $Tz = ($h - 2 * $this->cMargin) / $w_txt * 100;
                    $w_txt = $h - 2 * $this->cMargin;
                }
                if ($align == 'U')
                    $dy = $this->cMargin + $w_txt;
                elseif ($align == 'D')
                    $dy = $h - $this->cMargin;
                else
                    $dy = ($h + $w_txt) / 2;
                $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
                if ($this->ColorFlag)
                    $s .= 'q ' . $this->TextColor . ' ';
                $s .= sprintf('q BT 0 1 -1 0 %.2F %.2F Tm %.2F Tz (%s) Tj ET Q ', ($this->x + .5 * $w + .3 * $this->FontSize) * $k, ($this->h - ($this->y + $dy)) * $k, $Tz, $txt);
                if ($this->ColorFlag)
                    $s .= ' Q ';
            }
        }
// end change Cell function 
        if ($s)
            $this->_out($s);
        $this->lasth = $h;
        if ($ln > 0) {
//Go to next line
            $this->y += $h;
            if ($ln == 1)
                $this->x = $this->lMargin;
        } else
            $this->x += $w;
    }

    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '') {
//Output a cell
        $k = $this->k;
        if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak()) {
//Automatic page break
            $x = $this->x;
            $ws = $this->ws;
            if ($ws > 0) {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            $this->AddPage($this->CurOrientation, $this->CurPageSize);
            $this->x = $x;
            if ($ws > 0) {
                $this->ws = $ws;
                $this->_out(sprintf('%.3F Tw', $ws * $k));
            }
        }
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $s = '';
// begin change Cell function
        if ($fill || $border > 0) {
            if ($fill)
                $op = ($border > 0) ? 'B' : 'f';
            else
                $op = 'S';
            if ($border > 1) {
                $s = sprintf('q %.2F w %.2F %.2F %.2F %.2F re %s Q ', $border, $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
            } else
                $s = sprintf('%.2F %.2F %.2F %.2F re %s ', $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
        }
        if (is_string($border)) {
            $x = $this->x;
            $y = $this->y;
            if (is_int(strpos($border, 'L')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'l')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);

            if (is_int(strpos($border, 'T')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);
            else if (is_int(strpos($border, 't')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);

            if (is_int(strpos($border, 'R')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'r')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);

            if (is_int(strpos($border, 'B')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'b')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
        }
        if (trim($txt) != '') {
            $cr = substr_count($txt, "\n");
            if ($cr > 0) { // Multi line
                $txts = explode("\n", $txt);
                $lines = count($txts);
                for ($l = 0; $l < $lines; $l++) {
                    $txt = $txts[$l];
                    $w_txt = $this->GetStringWidth($txt);
                    if ($align == 'R')
                        $dx = $w - $w_txt - $this->cMargin;
                    elseif ($align == 'C')
                        $dx = ($w - $w_txt) / 2;
                    else
                        $dx = $this->cMargin;

                    $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
                    if ($this->ColorFlag)
                        $s .= 'q ' . $this->TextColor . ' ';
                    $s .= sprintf('BT %.2F %.2F Td (%s) Tj ET ', ($this->x + $dx) * $k, ($this->h - ($this->y + .5 * $h + (.7 + $l - $lines / 2) * $this->FontSize)) * $k, $txt);
                    if ($this->underline)
                        $s .= ' ' . $this->_dounderline($this->x + $dx, $this->y + .5 * $h + .3 * $this->FontSize, $txt);
                    if ($this->ColorFlag)
                        $s .= ' Q ';
                    if ($link)
                        $this->Link($this->x + $dx, $this->y + .5 * $h - .5 * $this->FontSize, $w_txt, $this->FontSize, $link);
                }
            }
            else { // Single line
                $w_txt = $this->GetStringWidth($txt);
                $Tz = 100;
                if ($w_txt > $w - 2 * $this->cMargin) { // Need compression
                    $Tz = ($w - 2 * $this->cMargin) / $w_txt * 100;
                    $w_txt = $w - 2 * $this->cMargin;
                }
                if ($align == 'R')
                    $dx = $w - $w_txt - $this->cMargin;
                elseif ($align == 'C')
                    $dx = ($w - $w_txt) / 2;
                else
                    $dx = $this->cMargin;
                $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
                if ($this->ColorFlag)
                    $s .= 'q ' . $this->TextColor . ' ';
                $s .= sprintf('q BT %.2F %.2F Td %.2F Tz (%s) Tj ET Q ', ($this->x + $dx) * $k, ($this->h - ($this->y + .5 * $h + .3 * $this->FontSize)) * $k, $Tz, $txt);
                if ($this->underline)
                    $s .= ' ' . $this->_dounderline($this->x + $dx, $this->y + .5 * $h + .3 * $this->FontSize, $txt);
                if ($this->ColorFlag)
                    $s .= ' Q ';
                if ($link)
                    $this->Link($this->x + $dx, $this->y + .5 * $h - .5 * $this->FontSize, $w_txt, $this->FontSize, $link);
            }
        }
// end change Cell function
        if ($s)
            $this->_out($s);
        $this->lasth = $h;
        if ($ln > 0) {
//Go to next line
            $this->y += $h;
            if ($ln == 1)
                $this->x = $this->lMargin;
        } else
            $this->x += $w;
    }

}

class VariableStream {

    private $varname;
    private $position;

    function stream_open($path, $mode, $options, &$opened_path) {
        $url = parse_url($path);
        $this->varname = $url['host'];
        if (!isset($GLOBALS[$this->varname])) {
            trigger_error('Global variable ' . $this->varname . ' does not exist', E_USER_WARNING);
            return false;
        }
        $this->position = 0;
        return true;
    }

    function stream_read($count) {
        $ret = substr($GLOBALS[$this->varname], $this->position, $count);
        $this->position += strlen($ret);
        return $ret;
    }

    function stream_eof() {
        return $this->position >= strlen($GLOBALS[$this->varname]);
    }

    function stream_tell() {
        return $this->position;
    }

    function stream_seek($offset, $whence) {
        if ($whence == SEEK_SET) {
            $this->position = $offset;
            return true;
        }
        return false;
    }

    function stream_stat() {
        return array();
    }

}

class PDF_MemImage extends PDF {

    function __construct($orientation = 'P', $unit = 'mm', $format = 'A4') {
        parent::__construct($orientation, $unit, $format);
        // Register var stream protocol
        stream_wrapper_register('var', 'VariableStream');
    }

    function MemImage($data, $x = null, $y = null, $w = 0, $h = 0, $link = '') {
        // Display the image contained in $data
        $v = 'img' . md5($data);
        $GLOBALS[$v] = $data;
        $a = getimagesize('var://' . $v);
        if (!$a)
            $this->Error('Invalid image data');
        $type = substr(strstr($a['mime'], '/'), 1);
        $this->Image('var://' . $v, $x, $y, $w, $h, $type, $link);
        unset($GLOBALS[$v]);
    }

    function GDImage($im, $x = null, $y = null, $w = 0, $h = 0, $link = '') {
        // Display the GD image associated with $im
        ob_start();
        imagepng($im);
        $data = ob_get_clean();
        $this->MemImage($data, $x, $y, $w, $h, $link);
    }

}

date_default_timezone_set('Asia/Kolkata');
$DocId = $_GET['hdn_docid'];
$icompanyidlogin = $_GET['Icompanyid'];

$jobType = $_GET['JobType'];
if($jobType != 'C'){
    $jobType = 'P';
}

$proeces = mysqli_query($con, "call Web_CuttingSlip('$DocId','$jobType','$icompanyidlogin');");

$result = mysqli_query($con, "select * from BoardCuttingDetails;");

$JobNo = '';
$JobName = '';
$ClientName = '';
$ComponentName = '';
$Compcount = mysqli_num_rows($result);


$pdf = new PDF_MemImage ();
$pdf->AddPage();

$pdf->SetY(5);
$pdf->Cell(139);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont("Arial", "B", "8");
//$pdf->Image('../../Images/netgen.png', 9, 3, 18, 12);
//$pdf->Cell(99, 5, "NPPL/PR/FR/01", 0, 0, 'L');
$pdf->Cell(99, 5, "", 0, 0, 'L');

//$pdf->SetAutoPageBreak(FALSE);


//for ($i = 1; $i <= $Compcount; $i++) {
    
    if (mysqli_num_rows($result) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            
                if($i == '3' || $i == '5' || $i == '7' || $i == '9'){
                   $pdf->AddPage();
                }
            
            $JobNo = $row['JobNo'];
            if ($JobNo == "") {
                $JobNo = "";
            }

            $JobName = $row['JobName'];
            if ($JobName == "") {
                $JobName = "";
            }

            $ClientName = $row['ClientName'];
            if ($ClientName == "") {
                $ClientName = "";
            }

            $ComponentName = $row['ComponentName'];
            if ($ComponentName == '') {
                $ComponentName = '';
            }
            
            $Boardkind = $row['Boardkind'];
            $GSM = $row['GSM'];
            $Deckle = $row['Deckle'];
            $Grain = $row['Grain'];
            $TotalSHeets = $row['TotalSHeets'];
            $CutSize = $row['CutSize'];
            $TotalCutSHeets = $row['TotalCutSHeets'];
            
            $Remarks = $row['Remarks'];
            $Machine =  $row['Machine'];  //"My Machine" ;
            
            
        
    
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont("Arial", "", "7");
    $pdf->Cell(193, 6, 'PRINT DATE AND TIME : ' . date('d-m-Y H:i:s'), 0, 0, "R");

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
    }
//}

$pdf->Output('Cutting Slip.pdf', 'I');

