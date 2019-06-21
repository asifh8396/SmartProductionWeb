<?php

class Mod_jcPermissions extends CI_Model{


    public function pageloaddata(){
        $query = $this->db->query("SELECT a.*, b.UserName, b.UserId from jc_permissions as a left join userinfo as b on a.userid = b.UserId and UActive=1");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    public function userinfo(){
        $query = $this->db->query("SELECT UserId, UserName from userinfo where UserId not in (select userid from jc_permissions) and UActive = 1 order by 2;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    public function deleterow($userid, $autoid){
        $this->db->query("DELETE from jc_permissions where userid = '$userid' and ID = $autoid;");
        
    }

    public function addnewrow($save) {
        $this->db->insert("jc_permissions", $save);
        $insert_id = $this->db->insert_id();
        $query = $this->db->query("SELECT a.*, b.UserName, b.UserId FROM jc_permissions as a, userinfo as b where a.userid = b.UserId and a.ID = $insert_id;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function updaterow($autoid, $userid, $save, $update, $delete, $print){
        $this->db->query("UPDATE jc_permissions SET save_perm = '$save', update_perm='$update', delete_perm='$delete', print='$print' WHERE ID='$autoid' AND userid='$userid';");
    }

}