<?php
    class Signup extends CI_Controller {

        function __construct(){
            parent::__construct();

        }

        function index(){
            $data["title"] = 'Create';

            $this->load->view("common/aheader",$data);
            $this->load->view("common/bcss");
            $this->load->view("CRUD/create");
            $this->load->view("common/cfooter");
        }
    }
    
?>