    <?php
        class Read extends CI_Controller{
            function __construct(){
                parent::__construct();
                $this->load->model("read_m");
            }

            function index(){
                $data["title"] = 'Order';
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
        }
        
    ?>