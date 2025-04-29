    <?php
        class read_m extends CI_Model{
            function __construct(){
                $this->load->database();
            }

            function viewUser_m(){
                $query = $this->db->query("SELECT * FROM `tbluser` ORDER BY user_id ASC;")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }

            function getData_m($userid){
                $query = $this->db->query("SELECT * FROM `tbluser` WHERE user_id='$userid'")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }
        }
    ?>