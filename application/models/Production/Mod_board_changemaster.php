<?php
/**
* Mohd Asif
*/
class Mod_board_changemaster extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}
      
    public function board_detail(){

    	// $this->db->where('ID', $ID);
        $obj=$this->db->select('*');
        $obj=$this->db->get('item_boardchangemaster');
        return $obj->result();
    }

}