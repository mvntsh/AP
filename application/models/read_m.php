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

            function getOrder_m($values){
                $this->db->insert("tblorders",$values);

                if($this->db->affected_rows()>0){
                    return true;
                }else{
                    return false;
                }
            }

            function viewOrder_m($machineno){
                $query = $this->db->query("SELECT * FROM `tblproduct` INNER JOIN `tblorders` ON tblproduct.product_id=tblorders.product_id WHERE machineno='$machineno' AND orderstatus='set' ORDER BY order_id ASC;")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }

            function getOrderid_m(){
                $query = $this->db->query("SELECT * FROM `tblorders`")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }

            function tallyOrder_m($order_id){
                $query = $this->db->query("SELECT *,COALESCE(FORMAT(REPLACE(productprice * quantity,',',''),2),'') AS ordertally FROM `tblproduct` INNER JOIN `tblorders` ON tblproduct.product_id=tblorders.product_id WHERE order_id='$order_id';")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }

            function myOrder_m(){
                $query = $this->db->query("SELECT productname,quantity,productprice,COALESCE(FORMAT(REPLACE(productprice * quantity,',',''),2),'') AS ordertally FROM `tblproduct` INNER JOIN `tblorders` ON tblproduct.product_id=tblorders.product_id WHERE machineno='1' AND orderstatus='Set' ORDER BY order_id ASC;")->result_array();

                if(count($query)>0){
                    return $query;
                }else{
                    return array();
                }
            }
        }
    ?>