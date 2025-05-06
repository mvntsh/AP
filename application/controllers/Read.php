    <?php
        class Read extends CI_Controller{
            function __construct(){
                parent::__construct();
                $this->load->model("read_m");
            }

            function index(){
                $data["title"] = 'Menu';
                $this->load->view("common/aheader",$data);
                $this->load->view("common/bcss");
                $this->load->view("CRUD/read");
                $this->load->view("common/cfooter");
            }

            function viewProduct_c(){
                $data["success"] = false;

                $data["data"] = $this->read_m->viewProduct_m();

                if(count($data["data"])>0){
                    $data["success"] = true;
                }
                echo json_encode($data);
            }

            function getData_c(){
                $data["success"] = false;

                $product_id = $this->input->post("txtnmProductid");

                $data["data"] = $this->read_m->getData_m($product_id);

                if(count($data["data"])>0){
                    $data["success"] = true;
                }
                echo json_encode($data);
            }

            function getOrder_c(){
                $data["success"] = false;

                $values = array(
                    "product_id" => $this->input->post("txtnmProductid"),
                    "quantity" => $this->input->post("txtnmQuantity"),
                    "machineno" => $this->input->post("txtnmMachine"),
                    "orderstatus" => $this->input->post("txtnmOrderstatus"),
                    "priorityno" => $this->input->post("txtnmMachine"),
                );

                $response = $this->read_m->getOrder_m($values);

                if($response){
                    $data["success"] = true;
                }
                echo json_encode($data);
            }

            function getOrderid_c(){
                $data["success"] = false;

                $data["data"] = $this->read_m->getOrderid_m();

                if(count($data["data"])>0){
                    $data["success"] = true;
                }
                echo json_encode($data);
            }

            function tallyOrder_c(){
                $data["success"] = false;

                $order_id = $this->input->post("");

                $data["data"] = $this->read_m->tallyOrder_m($order_id);

                if(count($data["data"])>0){
                    $data["success"] = true;
                }
                echo json_encode($data);
            }

            function myOrder_c(){
                $data["success"] = false;

                $data["data"] = $this->read_m->myOrder_m();

                if(count($data["data"])>0){
                    $data["success"] = true;
                }
                echo json_encode($data);
            }
        }
        
    ?>