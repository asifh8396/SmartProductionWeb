<?php

Class User extends CI_Model {

    public function finyrdetails() {
        $query = $this->db->query("SELECT FinYear,CIDBName,IsDefault FROM finyeardetails where IsActive = 1;");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    public function companyprofile() {
        $query = $this->db->query("SELECT ICompanyID,concat(CompanyName,' ',City) as CompanyName FROM companyprofile WHERE IsActive=1");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function login($username, $password) {
        $query = $this->db->query("SELECT UserId,UserName,UserPass,ViewUserClient,PersonPost FROM userinfo
                                WHERE BINARY UserName='$username' AND BINARY UserPass='$password' LIMIT 1");

        // $query = $this->db->query("SELECT UserId,UserName,UserPassword as UserPass,1 as ViewUserClient,Post as PersonPost FROM usermaster 
        //     WHERE BINARY UserLoginName='$username' AND BINARY UserPassword='$password' LIMIT 1");

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function checkemail($email) {
        $query = $this->db->query("SELECT Email from usermaster where Email = '". $email ."' limit 1;");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
