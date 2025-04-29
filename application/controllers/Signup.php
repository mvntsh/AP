<?php
    class Signup extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model("signup_m");
            $this->load->helper('form');
            $this->load->library('form_validation');
        }

        function index(){
            $data["title"] = 'Create';

            $this->load->view("common/aheader",$data);
            $this->load->view("common/bcss");
            $this->load->view("CRUD/create");
            $this->load->view("common/cfooter");
        }

        function insert_c(){

            $this->form_validation->set_rules('txtnmFirstname','Firstname','required');
            $this->form_validation->set_rules('txtnmLastname','Lastname','required');
            $this->form_validation->set_rules('txtnmStatus','Account Status','required');

            if($this->form_validation->run() === FALSE){
                $data["title"] = 'Create';

                $this->load->view("common/aheader",$data);
                $this->load->view("common/bcss");
                $this->load->view("CRUD/create");
                $this->load->view("common/cfooter");
            }else{
                $this->signup_m->insert_m();
                $data["title"] = 'Create';

            }
        }
    }
    
?>