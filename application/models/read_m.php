    <?php
        class read_m extends CI_Model{
            function __construct(){
                $this->load->database();
            }

            function viewProduct_m(){
                $query = $this->db->query("SELECT * FROM `tblproduct` ORDER BY product_id ASC;")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }

            function getData_m($product_id){
                $query = $this->db->query("SELECT * FROM `tblproduct` WHERE product_id='$product_id'")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }
        }
    ?>