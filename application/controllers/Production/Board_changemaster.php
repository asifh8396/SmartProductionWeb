<?php
/**
* Mohd Asif
*/
class Board_changemaster extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){

    $data["title"] = "Board change Master";
    $data['template'] = 'Production/Board_changemaster_view';
    $this->load->view('templates/template', $data);
    
	}


	public function save() {
    
    $hdn_icompanyid = $this->input->post('hdn_icompanyid');
    $hdn_userid = $this->input->post('hdn_userid');
    $hdn_id = $this->input->post('hdn_id');
    // print_r($hdn_id);die;
    $txt_particular = $this->input->post('txt_particular');
    $chk = $this->input->post('chk');


        foreach ($hdn_id as $key => $value) {
            $hdn_id_val = $value;
            $txt_particular_val = $txt_particular[$key];
            if(isset($chk[$key])){
                $chk_val = 1;
            } else {
                $chk_val = 0;
            }
             

        
	        if ($hdn_id_val == "" && $hdn_id_val == 0) {

	        	$data["Particular"] = $txt_particular_val;
                $data["IsActive"] = $chk_val;
			    // echo "insert";
			    // echo $key;
			    // echo "<br>";
	          $this->db->insert('item_boardchangemaster', $data); 
	        	
	        }else{   

	        	$data["Particular"] = $txt_particular_val;
                $data["IsActive"] = $chk_val;
                // echo "update";
                // echo $key;
                // echo "<br>";
			    // print_r($data);die;
	          $this->db->where('ID', $hdn_id_val);
	          $this->db->update('item_boardchangemaster', $data);        
	       
	        }

        }

        redirect('Production/Board_changemaster');
    }



  public function data(){
        
		$query=$this->db->query('SELECT * from item_boardchangemaster');
		$data=extract_query($query);
        echo json_encode($data);
	}

}