<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Multiquery extends CI_Model {

    private $CI, $Data, $mysqli, $ResultSet;

    /**
     * The constructor
     */
    function __construct() {
        $this->CI = & get_instance();
        $this->Data = '';
        $this->ResultSet = array();
        $this->mysqli = $this->CI->db->conn_id;
    }

    public function GetMultiResults($SqlCommand) {
        $index = 0;
        $ResultSet = array();
        /* execute multi query */
        if (mysqli_multi_query($this->mysqli, $SqlCommand)) {
            do {
                if ($result = $this->mysqli->store_result()) {
//                    while ($row = $result->fetch_array()) {
//                        $this->Data[] = $row;
//                         $rowID = 0;                    
//                    }
                    $rowID = 0;
                    while ($row = $result->fetch_assoc()) {
                        $ResultSet[$index][$rowID] = $row;
                        $rowID++;
                    }
                    mysqli_free_result($result);
                }
                $index++;
            } while (mysqli_more_results($this->mysqli) && mysqli_next_result($this->mysqli));
        }
        return $ResultSet;
    }

}
