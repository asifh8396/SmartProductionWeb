<?php
// ob_start();
/** 
* @author Mohd Asif 
*/
class BaseProcess_master extends MY_Controller {
    
    public function index()

    {  
        $this->load->model('Production/Mod_BaseProcess_master');
        $data['loginCmp'] = $this->company_id;
        $data['UserId'] = $this->user_id;
        $data['process'] = $this->Mod_BaseProcess_master->get_process();
        $data["title"] = "Base Process Master";
        $data['template'] = 'Production/BaseProcess_master_view';
        $this->load->view('templates/template', $data);
     }
    

    public function retrivedata() {
        
        $this->load->model('Production/Mod_BaseProcess_master');
        $data = $this->Mod_BaseProcess_master->get_process();
        echo json_encode($data);
    }

    public function Save(){
        $this->load->model('Production/Mod_BaseProcess_master');
        $hdn_ItemID = $this->input->post("hdn_ItemID");
        $hdn_pruniqueid = $this->input->post("hdn_pruniqueid");
        $txt_Shortname = $this->input->post("txt_Shortname");
        $txt_general_seq = $this->input->post("txt_general_seq");
        $chk_showLoad = $this->input->post("chk_showLoad");
        $txt_prid = $this->input->post("txt_prid");
        $txt_prname = $this->input->post("txt_prname");
        $txt_basetable = $this->input->post("txt_basetable");
        $chk_canbe_online = $this->input->post("chk_canbe_online");
        $chk_isactive = $this->input->post("chk_isactive");
        $txt_ftablename = $this->input->post("txt_ftablename");
        $txt_temptablename = $this->input->post("txt_temptablename");
        $drp_ipunit = $this->input->post("drp_ipunit");
        $drp_outunit = $this->input->post("drp_outunit");

        $data_value_coa = '';
        $datakey = '';
        $cstring = '';
        $withoutkey = '';
        $delete = 'delete from item_base_process_master';
        foreach ($txt_prid as $key => $value) {
            $txt_prid_value = $value;
            $hdn_pruniqueid_value = $hdn_pruniqueid[$key];
            $txt_prname_value = $txt_prname[$key];
            $txt_basetable_value = $txt_basetable[$key];
            $drp_ipunit_value = $drp_ipunit[$key];
            $drp_outunit_value = $drp_outunit[$key];

            if ($hdn_pruniqueid_value != '') {
                
            if(isset($chk_canbe_online[$key])){
                $chk_canbe_online_val = 1;
            } else {
                $chk_canbe_online_val = 0;
            }
            if(isset($chk_isactive[$key])){
                $chk_isactive_val = 1;
            } else {
                $chk_isactive_val = 0;
            }

            $txt_ftablename_value = $txt_ftablename[$key];
            $txt_temptablename_value = $txt_temptablename[$key];


             $cstring = "('" . $hdn_pruniqueid_value . "','" . $txt_prid_value . "', '" . $txt_prname_value . "', '" . $txt_basetable_value . "', '" . $chk_canbe_online_val . "', '" . $chk_isactive_val . "', '" . $txt_ftablename_value . "', '" . $txt_temptablename_value . "', '". $drp_ipunit_value ."','". $drp_outunit_value ."'),";
                    $data_value_coa .= $cstring;
                } else {
                    $withoutkey = "('" . $txt_prid_value . "', '" . $txt_prname_value . "', '" . $txt_basetable_value . "', '" . $chk_canbe_online_val . "', '" . $chk_isactive_val . "', '" . $txt_ftablename_value . "', '" . $txt_temptablename_value . "','". $drp_ipunit_value ."','". $drp_outunit_value ."'),";
                    $datakey .= $withoutkey;
//                }
            }
        }
        $UrlContent = substr_replace($data_value_coa, ";", -1);
        if ($datakey != "") {
            $withoutPkey = substr_replace($datakey, ";", -1);
            $querywithout = "insert into item_base_process_master (PrID,PrName,BaseTableName,CanBeOnLine,ISActive,FPTableName,TempFPTableName,InPutUOM, OutPutUOM)VALUES" . $withoutPkey;
        } else {
            $querywithout = '';
        }
        if ($UrlContent != "") {
            $query = "insert into item_base_process_master (PrUniqueID,PrID,PrName,BaseTableName,CanBeOnLine,ISActive,FPTableName,TempFPTableName,InPutUOM, OutPutUOM)VALUES" . $UrlContent;
        } else {
            $query = '';
        }

//        echo $delete;
//        echo '<br>';
//        echo $query;
//        echo '<br>';
//        echo $querywithout;
//        die();
        $messege = $this->Mod_BaseProcess_master->SaveDataValue($delete, $query, $querywithout);
        // print_r($messege);die;
        if ($messege == 'Record Saved Successfuly') {
            echo "<head><script>
                 alert('Data Save Successfully');     
                  </script></head>";
                  // redirect("BaseProcess_master");
                    // window.location = 'BaseProcess_master'; 
        } else {
            echo "<head><script>
                 alert('Data not Save');     
                  </script></head>";
                  // redirect("BaseProcess_master");
                    // window.location = 'BaseProcess_master'; 
        }

            // $data["PrID"] = $txt_prid_value;
            // $data["PrUniqueID"] = $hdn_pruniqueid_value;
            // $data["PrName"] = $txt_prname_value;
            // $data["BaseTableName"] = $txt_basetable_value;
            // $data["CanBeOnLine"] = $chk_canbe_online_val;
            // $data["ISActive"] = $chk_isactive_val;
            // $data["FPTableName"] = $txt_ftablename_value;
            // $data["TempFPTableName"] = $txt_temptablename_value;
            // $data["InPutUOM"] = $drp_ipunit_value;
            // $data["OutPutUOM"] = $drp_outunit_value;

            // if ($txt_prid_value == "" && $txt_prid_value == 0) {
            //     // echo "insert";
            //     // echo $key;
            //     // echo "<br>";
            //     $this->db->insert('item_base_process_master', $data); 
                
            // }else{    
            //     // echo "update";
            //     // echo $key;
            //     // echo "<br>";
            //     // print_r($data);die;
            //   $this->db->where('ID', $txt_prid_value);
            //   $this->db->update('item_base_process_master', $data);        
           
            // }
        // }
    }

}




