<?php
    class signup_m extends CI_Model{

        function __construct(){
            $this->load->database();
        }

        function insert_m(){
            $this->load->helper('url');

            $values = array(
                'firstname' => $this->input->post("txtnmFirstname"),
                'lastname' => $this->input->post("txtnmLastname"),
                'accountstatus' => $this->input->post("txtnmStatus")
            );

            return $this->db->insert("tbluser",$values);
        }
    }
    
?>