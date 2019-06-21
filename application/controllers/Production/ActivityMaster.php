<?php
// ob_start();
/** 
* @author Mohd Asif 
*/
class ActivityMaster extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Production/Mod_activityMaster');
    }
    
    public function index() {
        $data['loginCmp'] = $this->company_id;
        $data["title"] = "Activity Master";
        $data['template'] = 'Production/ActivityMaster_view';
        $data['head'] = $this->Mod_activityMaster->index();
        $data['defaultProcess'] = $this->Mod_activityMaster->defaultProcess();
        $this->load->view('templates/template', $data);
     }
    
    public function interIds() {
        $headid = $this->input->post('headid');
//        echo $headid;

        $interIds = $this->Mod_activityMaster->interIds($headid);
        $jsonData = json_encode($interIds);
        echo $jsonData;
    }

    public function process() {
        $headid = $this->input->post('headid');
//        echo $headid;
        $interid = $this->input->post('interid');
//        echo $interid;

        $interIds = $this->Mod_activityMaster->process($headid, $interid);
        $jsonData = json_encode($interIds);
        echo $jsonData;
    }

    public function defaultprocess() {

        $defaultProcess = $this->Mod_activityMaster->defaultProcess();

        $jsonData = json_encode($defaultProcess);
        echo $jsonData;
    }

    public function save() {
        echo "SAVE";
        echo "<br>";

        $headid = $this->input->post('headid');
        echo $headid;
        echo "<br>";

        $interId = $this->input->post('interid');
        echo $interId;
        echo "<br>";

        $ActivityName = $this->input->post('activityName');
        echo $ActivityName;
        echo "<br>";

        $prid = $this->input->post('txt_prid');
        print_r($prid);
        echo "<br>";

        $isAct = $this->input->post('txt_isAct');
        print_r($isAct);
        echo "<br>";

        if ($interId == '') {
            echo "New Entry"; 
            
            $results = $this->Mod_activityMaster->newInterID();
            
            $interId = $results['0']->newInterId;


            $myStringfinal = "";
            foreach ($prid as $key => $value) {

                $headidVal = $headid;
                $interIdVal = $interId;
                $ActivityNameVal = $ActivityName;
                $tableNo = 1;

                $pridVal = $prid[$key];
                $isActVal = isset($isAct[$key]);
                if ($isActVal == 'on') {
                    $isActVal = 1;
                } else {
                    $isActVal = 0;
                }


                $myString = "(" . '"' . $interIdVal . '","' . $ActivityNameVal . '","' . $pridVal . '","' . $tableNo . '","' . $isActVal . '","' . $headidVal . '"' . "),";

                $myStringfinal .= $myString;
            }

            $myStringfinalFinal = substr_replace($myStringfinal, " ", -1);
           
            $whatThe = "";
            $whatThe.="replace into item_interprostage (interID, InterName, PrID, TableNo, Isactive, AHead)  values ";
            $whatThe.= $myStringfinalFinal;

            $this->Mod_activityMaster->save($whatThe);
            // redirect('Production/ActivityMaster');
        } else {
            echo "Update Old Entry";
            
            $myStringfinal = "";
            foreach ($prid as $key => $value) {

                $headidVal = $headid;
                $interIdVal = $interId;
                $ActivityNameVal = $ActivityName;
                $tableNo = 1;

                $pridVal = $prid[$key];
                $isActVal = isset($isAct[$key]);
                if ($isActVal == 'on') {
                    $isActVal = 1;
                } else {
                    $isActVal = 0;
                }


                $myString = "(" . '"' . $interIdVal . '","' . $ActivityNameVal . '","' . $pridVal . '","' . $tableNo . '","' . $isActVal . '","' . $headidVal . '"' . "),";

                $myStringfinal .= $myString;
            }

            $myStringfinalFinal = substr_replace($myStringfinal, " ", -1);
           
            $whatThe = "";
            $whatThe.="replace into item_interprostage (interID, InterName, PrID, TableNo, Isactive, AHead)  values ";
            $whatThe.= $myStringfinalFinal;

            $this->Mod_activityMaster->save($whatThe);
            // redirect('Production/ActivityMaster');           
        }
    }

    public function search() {
        $data['title'] = 'Test';
        $data['template'] = 'test';
        $this->load->view('templates/template', $data);
//        $this->load->view('test');
    }

    public function add() {
        
    }

    public function edit($id) {
        
    }

    public function delete($id) {
        
    }

    public function check_select($name = '') {
        if ($name === 'xxxxx') {
            $this->form_validation->set_message('check_select', 'This field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


}




