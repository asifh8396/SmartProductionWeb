<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author Manoj
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once './fpdf/fpdf.php';
require_once dirname(__FILE__) . '/phpmail/class.phpmailer.php';
require_once dirname(__FILE__) . '/phpmail/class.smtp.php';

class Mail extends PHPMailer {

    function __construct() {
        parent::__construct();
    }

    //put your code here
}
