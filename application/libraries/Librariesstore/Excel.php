<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Excel
 *
 * @author Manoj
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once './fpdf/fpdf.php';
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) . '/Classes/PHPExcel/Worksheet.php';
require_once dirname(__FILE__) . '/Classes/PHPExcel/Worksheet/HeaderFooterDrawing.php';

class Excel extends PHPExcel {
    //put your code here
       function __construct() {
        parent::__construct();
    }
}
