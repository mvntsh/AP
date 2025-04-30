<?php
    class Create extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model("create_m");
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
                'productname' => $this->input->post("txtnmProductname"),
                'productprice' => $this->input->post("txtnmProductprice"),
                'productstatus' => $this->input->post("txtnmProductstatus")
            );

            $response = $this->create_m->insert_m($values);

            if($response){
                $data["success"] = true;
            }
            echo json_encode($data);
        }
    }
    
?>