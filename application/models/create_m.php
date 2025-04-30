<?php
    class create_m extends CI_Model{

        function __construct(){
            $this->load->database();
        }

        function insert_m($values){
            $this->db->insert("tblproduct",$values);

            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }
    
?>