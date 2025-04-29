<?php
    class Signup extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model("signup_m");
        }

        function index(){
            $data["title"] = 'Create';

            $this->load->view("common/aheader",$data);
            $this->load->view("common/bcss");
            $this->load->view("CRUD/create");
            $this->load->view("common/cfooter");
        }

        function insert_c(){
            $data["success"] = false;

            $values = array(
                'firstname' => $this->input->post("txtnmFirstname"),
                'lastname' => $this->input->post("txtnmLastname"),
                'accountstatus' => $this->input->post("txtnmStatus")
            );

            $response = $this->signup_m->insert_m($values);

            if($response){
                $data["success"] = true;
            }
            echo json_encode($data);
        }
    }
    
?>