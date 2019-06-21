<?php

//require_once dirname(__FILE__) . '/fpdf/fpdf.php';


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

require_once dirname(__FILE__) . '/fpdf/fpdf.php';

class F_PDF extends FPDF {

    function __construct($orientation = 'P', $unit = 'mm', $format = 'A4') {
//        parent::__construct();
        parent::__construct($orientation, $unit, $format);
        $existed = in_array("var", stream_get_wrappers());
        if ($existed) {
            stream_wrapper_unregister("var");
        }
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

//    function __construct() {
//        parent::__construct();
//    }

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
        $this->SetY(-5);
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

    function SetCharSpacing($cs) {
        $this->_out(sprintf('BT %.10F Tc ET', $cs * $this->k));
    }

    function AutoPrint($dialog = false) {
        //Open the print dialog or start printing immediately on the standard printer
        $param = ($dialog ? 'true' : 'false');
        $script = "print($param);";
        $this->IncludeJS($script);
    }

    function AutoPrintToPrinter($server, $printer, $dialog = false) {
        //Print on a shared printer (requires at least Acrobat 6)
        $script = "var pp = getPrintParams();";
        if ($dialog)
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
        else
            $script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
        $script .= "pp.printerName = '\\\\\\\\" . $server . "\\\\" . $printer . "';";
        $script .= "print(pp);";
        $this->IncludeJS($script);
    }

    var $javascript;
    var $n_js;

    function IncludeJS($script) {
        $this->javascript = $script;
    }

    function _putjavascript() {
        $this->_newobj();
        $this->n_js = $this->n;
        $this->_out('<<');
        $this->_out('/Names [(EmbeddedJS) ' . ($this->n + 1) . ' 0 R]');
        $this->_out('>>');
        $this->_out('endobj');
        $this->_newobj();
        $this->_out('<<');
        $this->_out('/S /JavaScript');
        $this->_out('/JS ' . $this->_textstring($this->javascript));
        $this->_out('>>');
        $this->_out('endobj');
    }

    function _putresources() {
        parent::_putresources();
        if (!empty($this->javascript)) {
            $this->_putjavascript();
        }
    }

    function _putcatalog() {
        parent::_putcatalog();
        if (!empty($this->javascript)) {
            $this->_out('/Names <</JavaScript ' . ($this->n_js) . ' 0 R>>');
        }
    }

//        var $javascript;
//	var $n_js;
//
//	function IncludeJS($script) {
//		$this->javascript=$script;
//	}
//
//	function _putjavascript() {
//		$this->_newobj();
//		$this->n_js=$this->n;
//		$this->_out('<<');
//		$this->_out('/Names [(EmbeddedJS) '.($this->n+1).' 0 R]');
//		$this->_out('>>');
//		$this->_out('endobj');
//		$this->_newobj();
//		$this->_out('<<');
//		$this->_out('/S /JavaScript');
//		$this->_out('/JS '.$this->_textstring($this->javascript));
//		$this->_out('>>');
//		$this->_out('endobj');
//	}
//
//	function _putresources() {
//		parent::_putresources();
//		if (!empty($this->javascript)) {
//			$this->_putjavascript();
//		}
//	}
//
//	function _putcatalog() {
//		parent::_putcatalog();
//		if (!empty($this->javascript)) {
//			$this->_out('/Names <</JavaScript '.($this->n_js).' 0 R>>');
//		}
//	}
//            var $widths;
//    var $aligns;
//    var $widthsmu;
//    var $alignsmu;
//
//    function SetWidths($w) {
//        //Set the array of column widths
//        $this->widths = $w;
//    }
//
//    function SetAligns($a) {
//        //Set the array of column alignments
//        $this->aligns = $a;
//        //die();
//    }
//
//    function Row($data) {
//        //Calculate the height of the row
//        // print_r($data);
//        $nb = 0;
//        for ($i = 0; $i < count($data); $i++)
//            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
//        //print_r($nb);
//        //die();
//        $h = 5 * $nb;
//        //Issue a page break first if needed
//        $this->CheckPageBreak($h);
//        //Draw the cells of the row
//        for ($i = 0; $i < count($data); $i++) {
//            $w = $this->widths[$i];
//            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
//            //Save the current position
//            $x = $this->GetX();
//            $y = $this->GetY();
//            //Draw the border
//            $this->Rect($x, $y, $w, $h);
//            //Print the text
//            $this->MultiCell($w, 5, $data[$i], 0, $a);
//            //Put the position to the right of the cell
//            $this->SetXY($x + $w, $y);
//        }
//        //Go to the next line
//        $this->Ln($h);
//    }
//
//    function RowManoj($data) {
//        //Calculate the height of the row
//        // print_r($data);
//        $nb = 0;
//        for ($i = 0; $i < count($data); $i++)
//            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
//        //print_r($nb);
//        //die();
//        $h = 5 * $nb;
//        //Issue a page break first if needed
//        $this->CheckPageBreak($h);
//        //Draw the cells of the row
//        for ($i = 0; $i < count($data); $i++) {
//            $w = $this->widths[$i];
//            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
//            //Save the current position
//            $x = $this->GetX();
//            $y = $this->GetY();
//            //Draw the border
//            $this->Rect($x, $y, $w, $h);
//            //Print the text
//            $this->MultiCell($w, 5, number_format($data[$i]), 'LR', 0, $a);
//            //$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
//            //Put the position to the right of the cell
//            $this->SetXY($x + $w, $y);
//        }
//        //Go to the next line
//        $this->Ln($h);
//    }
//
//    function CheckPageBreak($h) {
//        //If the height h would cause an overflow, add a new page immediately
//        if ($this->GetY() + $h > $this->PageBreakTrigger)
//            $this->AddPage($this->CurOrientation);
//    }
//
//    function NbLines($w, $txt) {
//        //Computes the number of lines a MultiCell of width w will take
//        $cw = &$this->CurrentFont['cw'];
//        if ($w == 0)
//            $w = $this->w - $this->rMargin - $this->x;
//        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
//        $s = str_replace("\r", '', $txt);
//        $nb = strlen($s);
//        if ($nb > 0 and $s[$nb - 1] == "\n")
//            $nb--;
//        $sep = -1;
//        $i = 0;
//        $j = 0;
//        $l = 0;
//        $nl = 1;
//        while ($i < $nb) {
//            $c = $s[$i];
//            if ($c == "\n") {
//                $i++;
//                $sep = -1;
//                $j = $i;
//                $l = 0;
//                $nl++;
//                continue;
//            }
//            if ($c == ' ')
//                $sep = $i;
//            $l += $cw[$c];
//            if ($l > $wmax) {
//                if ($sep == -1) {
//                    if ($i == $j)
//                        $i++;
//                } else
//                    $i = $sep + 1;
//                $sep = -1;
//                $j = $i;
//                $l = 0;
//                $nl++;
//            } else
//                $i++;
//        }
//        return $nl;
//    }
//
//    function SetWidthsMu($w) {
//        //Set the array of column widths
//        $this->widthsmu = $w;
//    }
//
//    function SetAlignsMu($a) {
//        //Set the array of column alignments
//        $this->alignsmu = $a;
//        //die();
//    }
//
//    function RowMu($data) {
//        $nb = 0;
//        for ($i = 0; $i < count($data); $i++)
//            $nb = max($nb, $this->NbLines($this->widthsmu[$i], $data[$i]));
//        $h = 5 * $nb;
//        $this->CheckPageBreak($h);
//        for ($i = 0; $i < count($data); $i++) {
//            $w = $this->widthsmu[$i];
//            $a = isset($this->alignsmu[$i]) ? $this->alignsmu[$i] : 'L';
//            //Save the current position
//            // $x = $this->GetX();
//            $y = $this->GetY();
//            //Draw the border
//            $this->SetDrawColor(255, 255, 255);
//            $this->Rect($x, $y, $w, $h);
//            //Print the text
//            $this->MultiCell($w, 5, $data[$i], 0, $a);
//            //Put the position to the right of the cell
//            $this->SetXY($x + $w, $y);
//        }
//        $this->Ln($h);
//    }
//
//    protected $B = 0;
//    protected $I = 0;
//    protected $U = 0;
//    protected $HREF = '';
//
//    function WriteHTML($html) {
//        // HTML parser
//        $html = str_replace("\n", ' ', $html);
//        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
//        foreach ($a as $i => $e) {
//            if ($i % 2 == 0) {
//                // Text
//                if ($this->HREF)
//                    $this->PutLink($this->HREF, $e);
//                else
//                    $this->Write(5, $e);
//            }
//            else {
//                // Tag
//                if ($e[0] == '/')
//                    $this->CloseTag(strtoupper(substr($e, 1)));
//                else {
//                    // Extract attributes
//                    $a2 = explode(' ', $e);
//                    $tag = strtoupper(array_shift($a2));
//                    $attr = array();
//                    foreach ($a2 as $v) {
//                        if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
//                            $attr[strtoupper($a3[1])] = $a3[2];
//                    }
//                    $this->OpenTag($tag, $attr);
//                }
//            }
//        }
//    }
//
//    function OpenTag($tag, $attr) {
//        // Opening tag
//        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
//            $this->SetStyle($tag, true);
//        if ($tag == 'A')
//            $this->HREF = $attr['HREF'];
//        if ($tag == 'BR')
//            $this->Ln(5);
//    }
//
//    function CloseTag($tag) {
//        // Closing tag
//        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
//            $this->SetStyle($tag, false);
//        if ($tag == 'A')
//            $this->HREF = '';
//    }
//
//    function SetStyle($tag, $enable) {
//        // Modify style and select corresponding font
//        $this->$tag += ($enable ? 1 : -1);
//        $style = '';
//        foreach (array('B', 'I', 'U') as $s) {
//            if ($this->$s > 0)
//                $style .= $s;
//        }
//        $this->SetFont('', $style);
//    }
//
//    function PutLink($URL, $txt) {
//        // Put a hyperlink
//        $this->SetTextColor(0, 0, 255);
//        $this->SetStyle('U', true);
//        $this->Write(5, $txt, $URL);
//        $this->SetStyle('U', false);
//        $this->SetTextColor(0);
//    }




    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    
    
    
    function Rowwithoutline($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
           // $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

}
