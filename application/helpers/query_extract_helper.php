<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function extract_query($query) {
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        if ($query->num_rows() == 0) {
            return 0;
        }
        return FALSE;
    }
}


function extract_nextresultObj($querydata) {
    $res = $querydata->result_array();
    $querydata->next_result();
    $querydata->free_result();
    
    if (count($res) > 0) {
        return $res;
    } else {
        if (count($res) == 0) {
            return 0;
        }
        return FALSE;
    }
}

function extract_nextresultArray($querydata) {
    $res = $querydata->result_array();
    $querydata->next_result();
    $querydata->free_result();
    
    if (count($res) > 0) {
        return $res;
    } else {
        if (count($res) == 0) {
            return 0;
        }
        return FALSE;
    }
}