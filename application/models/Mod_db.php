<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author shoaib
 */
class Mod_db extends CI_Model {

    public function get_row($table_name = '', $id_array = array(), $id = '', $id_array2 = array(), $select_array = array(), $order_by = array(), $join_array = array(), $likeArray = array(), $orLikeArray = array()) {
        if (!empty($select_array)):
            $i = 1;
            $select = '';
            foreach ($select_array as $value) {
                if ($i > 1)
                    $select .= "," . $value;
                else {
                    $select .= $value;
                    $i++;
                }
            }
            $this->db->select($select);
        endif;

        $this->db->from($table_name);

        if (!empty($join_array)):
            foreach ($join_array as $value) {
                $this->db->join($value['alias'], $value['cmpBase']);
            }
        endif;

        if (!empty($order_by)):
            $this->db->order_by($order_by['columnName'], $order_by['sortOrder']);
        else:
            $pos = strpos($table_name, ' as ');
            // var_dump($pos);
            // die();
            if ($pos === false) {
                $this->db->order_by($id, 'DESC');
            } else {
                $prefix = end(explode(' ', $table_name));
                $this->db->order_by($prefix . '.' . $id, 'DESC');
            }
        endif;

        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;

        if (!empty($id_array2)):
            foreach ($id_array2 as $key => $value) {
                $this->db->or_where($key, $value);
            }
        endif;

        if (!empty($likeArray)):
            $this->db->like($likeArray);
        endif;

        if (!empty($orLikeArray)):
            $this->db->or_like($orLikeArray);
        endif;

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->row();
        else
            return FALSE;
    }

    public function get_result($table_name = '', $id = '', $id_array = array(), $id_array2 = array(), $select_array = array(), $order_by = array(), $join_array = array(), $likeArray = array(), $orLikeArray = array()) {
        if (!empty($select_array)):
            $i = 1;
            $select = '';
            foreach ($select_array as $value) {
                if ($i > 1)
                    $select .= "," . $value;
                else {
                    $select .= $value;
                    $i++;
                }
            }
            $this->db->select($select);
        endif;

        $this->db->from($table_name);

        if (!empty($join_array)):
            foreach ($join_array as $value) {
                $this->db->join($value['alias'], $value['cmpBase']);
            }
        endif;

        if (!empty($order_by)):
            $this->db->order_by($order_by['columnName'], $order_by['sortOrder']);
        else:
            $pos = strpos($table_name, ' as ');
            // var_dump($pos);
            // die();
            if ($pos === false) {
                $this->db->order_by($id, 'ASC');
            } else {
                $prefix = end(explode(' ', $table_name));
                $this->db->order_by($prefix . '.' . $id, 'ASC');
            }
        endif;

        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;

        if (!empty($id_array2)):
            foreach ($id_array2 as $key => $value) {
                $this->db->or_where($key, $value);
            }
        endif;

        if (!empty($likeArray)):
            $this->db->like($likeArray);
        endif;

        if (!empty($orLikeArray)):
            $this->db->or_like($orLikeArray);
        endif;

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    public function get_rows($table_name = '', $id_array = array(), $id = '', $id_array2 = array(), $select_array = array(), $order_by = array(), $join_array = array(), $likeArray = array(), $orLikeArray = array()) {
        if (!empty($select_array)):
            $i = 1;
            $select = '';
            foreach ($select_array as $value) {
                if ($i > 1)
                    $select .= "," . $value;
                else {
                    $select .= $value;
                    $i++;
                }
            }
            $this->db->select($select);
        endif;

        $this->db->from($table_name);

        if (!empty($join_array)):
            foreach ($join_array as $value) {
                $this->db->join($value['alias'], $value['cmpBase']);
            }
        endif;

        if (!empty($order_by)):
            $this->db->order_by($order_by['columnName'], $order_by['sortOrder']);
        else:
            $pos = strpos($table_name, ' as ');
            // var_dump($pos);
            // die();
            if ($pos === false) {
                $this->db->order_by($id, 'DESC');
            } else {
                $prefix = end(explode(' ', $table_name));
                $this->db->order_by($prefix . '.' . $id, 'DESC');
            }
        endif;

        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;

        if (!empty($id_array2)):
            foreach ($id_array2 as $key => $value) {
                $this->db->or_where($key, $value);
            }
        endif;

        if (!empty($likeArray)):
            $this->db->like($likeArray);
        endif;

        if (!empty($orLikeArray)):
            $this->db->or_like($orLikeArray);
        endif;

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    public function get_distinct($table_name = '', $select_array = array(), $id_array = array()) {

        $this->db->distinct();

        if (!empty($select_array)):
            $i = 1;
            $select = '';
            foreach ($select_array as $value) {
                if ($i > 1)
                    $select .= "," . $value;
                else {
                    $select .= $value;
                    $i++;
                }
            }
            $this->db->select($select);
        endif;

        $this->db->from($table_name);

        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    public function get_count($table_name = '', $select_array = array(), $id_array = array()) {

        if (!empty($select_array)):
            $i = 1;
            $select = '';
            foreach ($select_array as $value) {
                if ($i > 1)
                    $select .= "," . $value;
                else {
                    $select .= $value;
                    $i++;
                }
            }
            $this->db->select($select);
        endif;

        $this->db->from($table_name);

        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->num_rows();
        else
            return FALSE;
    }

    public function get_query($sql = '') {
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return 0;
    }

    public function get_data($prid, $machineName, $apf, $todate) {
        $this->db->query("CALL InsertInto_Item_Jplanning_Produ('$prid','$machineName','$apf','00001','$todate')");
        $query = $this->db->query("Select * from item_jplanning_produ ORDER BY ScheduleNo,uniqueid");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function custom_column() {
        $query = $this->db->query("Select a.Field_Name,a.Col_Heading from custom_column_master as a, custom_column_detail as b where a.colID=b.colID and a.IsActive=1 and a.form_name='ProductionSearch' And b.PrID='Pr' AND IsDisplay=1 Order By Col_No");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function activity($ProcessId = '') {
        $query = $this->db->query("select InterID,HeadDesc,InterName,HeadID from item_interProStage as a,Item_Head as b where PrID = '$ProcessId' and a.AHead = b.HeadID and a.IsActive = 1 and b.IsActive =1 ORDER BY InterName");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_supervisor($processId) {
        switch ($processId) {
            case "Pr":
                $query = $this->db->query("select depttid from item_deptt where depttname='Printing'");
                break;
            case "FC":
                $query = $this->db->query("select depttid from item_deptt where depttname='Coating'");
                break;
            case "BC":
                $query = $this->db->query("select depttid from item_deptt where depttname='Coating'");
                break;
            case "FL":
                $query = $this->db->query("select depttid from item_deptt where depttname='Lamination'");
                break;
            case "BL":
                $query = $this->db->query("select depttid from item_deptt where depttname='Lamination'");
                break;
            case "WP":
                $query = $this->db->query("select depttid from item_deptt where depttname='Window Patching'");
                break;
            case "FF":
                $query = $this->db->query("select depttid from item_deptt where depttname='Foiling'");
                break;
            case "BF":
                $query = $this->db->query("select depttid from item_deptt where depttname='Foiling'");
                break;
            case "PN":
                $query = $this->db->query("select depttid from item_deptt where depttname='Punching'");
                break;
            case "EM":
                $query = $this->db->query("select depttid from item_deptt where depttname='Embossing'");
                break;
            case "Pa":
                $query = $this->db->query("select depttid from item_deptt where depttname='Pasting'");
                break;
            case "FO":
                $query = $this->db->query("select depttid from item_deptt where depttname='Folding'");
                break;
            case "FM":
                $query = $this->db->query("select depttid from item_deptt where depttname='Flute Making'");
                break;
            case "FP":
                $query = $this->db->query("select depttid from item_deptt where depttname='Flute Pasting'");
                break;
            case "SC":
                $query = $this->db->query("select depttid from item_deptt where depttname='Sheet Checking'");
                break;
            case "ST":
                $query = $this->db->query("select depttid from item_deptt where depttname='Sheet Checking'");
                break;
            case "PCut":
                $query = $this->db->query("select depttid from item_deptt where depttname='Cutting'");
                break;
            case "FCut":
                $query = $this->db->query("select depttid from item_deptt where depttname='Cutting'");
                break;
            case "SO":
                $query = $this->db->query("select depttid from item_deptt where depttname='Sorting'");
                break;
            default:
                $query = $this->db->query("select depttid from item_deptt where depttname not in ('Printing','Coating','Lamination','Window Patching','Foiling','Punching','Embossing','Pasting','Folding')");
                break;
        }
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $string = "";
            $main_array = array();
            foreach ($result as $value) {
                $string .= $value->depttid . ",";
            }
            $string = substr_replace($string, "", -1);
            if (!empty($string)) {

                $this->db->trans_start();
                $query_user = $this->db->query("SELECT USERNAME,USERID FROM userinfo WHERE PERSONPOST='Supervisor' AND PERSONNAME IN('$string')");
                $query_operator = $this->db->query("SELECT USERNAME,USERID FROM userinfo WHERE PERSONPOST='Operator' AND PERSONNAME IN('$string')");
                $this->db->trans_complete();

                $result1 = $query_user->result();
                $result2 = $query_operator->result();

                $main_array['Supervisor'] = $result1;
                $main_array['Operator'] = $result2;
                return $main_array;
            } else {
                return FALSE;
            }
        } else {
            return false;
        }
    }

    
    public function getallclients() {
        $this->db->select("CompanyId, CompanyName");
        $this->db->where("IsActive", "1");
        $this->db->order_by("CompanyName");
        $query= $this->db->get("companymaster");
        return extract_query($query);
    }

}
