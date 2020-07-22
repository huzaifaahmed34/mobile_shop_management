
<?php
class Report extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('ReportModel', 'm');

		

    }
    public function index()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
  

        $this->load->view('reports/purchase_report');
  $this->load->view('admin/rightsidebar');
        $this->load->view('admin/footer');

    }
        public function ProductWiseReport()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
   
        $this->load->view('reports/ProductWiseReport');
 $this->load->view('admin/rightsidebar');

        $this->load->view('admin/footer');

    }

    

     public function printProductWiseReport()

    {
        $data=$_SESSION['product_wise_report'];
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
    
        $this->load->view('printer/printProductWiseReport',['data'=>$data]);
    $this->load->view('admin/rightsidebar');

        $this->load->view('admin/footer');

    }

     public function printReport()

    {
        $data=$_SESSION['purchase_report'];
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
    $this->load->view('admin/rightsidebar');

        $this->load->view('printer/printPurchaseReport',['data'=>$data]);

        $this->load->view('admin/footer');

    }
  

   
  
 public function showProductWiseReport()

    {
        $data=$this->m->showProductWiseReport();

        echo json_encode($data);
    

    }
    public function showDashboardReport()

    {
        $data=$this->m->showDashboardReport();

        echo json_encode($data);
    

    }     public function showProductWiseReport1()

    {
        $data=$this->m->showProductWiseReport1();

        echo json_encode($data);
    

    }
   public function showReport()

    {
        $data=$this->m->showReport();

        echo json_encode($data);
    

    }

public function showReport1()

    {
        $data=$this->m->showReport1();

        echo json_encode($data);
    

    }

 
   public function SessionList()

    {
        $list=$this->input->post('list');
        
    $_SESSION['purchase_report']=$list;
echo json_encode($list);

    }

   public function SessionProductList()

    {
        $list=$this->input->post('list');
        
    $_SESSION['product_wise_report']=$list;
echo json_encode($list);

    }

}