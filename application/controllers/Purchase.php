
<?php
class Purchase extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('PurchaseModel', 'm');

		

    }
    public function index()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
    $this->load->view('admin/rightsidebar');

        $this->load->view('user/addPurchase');

        $this->load->view('admin/footer');

    }
        public function  ViewStock()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
    $this->load->view('admin/rightsidebar');

        $this->load->view('user/ViewStock');

        $this->load->view('admin/footer');

    }
  
   public function printInvoice()

    {
        $this->load->view('admin/header');

      
        $this->load->view('printer/printInvoice');


    }
    public function printEditInvoice()

    {
        $this->load->view('admin/header');

      
        $this->load->view('printer/printEditInvoice');


    }
   

   public function showPrintData()

    {
        $data=$this->m->showPrintData();

        echo json_encode($data);

    }


   public function showPrintData1()

    {
        $data=$this->m->showPrintData1();

        echo json_encode($data);

    }
   

  public function addPurchase()
    {
        $data=$this->m->addPurchase();

        echo json_encode($data);
    }

 public function editPurchase()
    {
        $data=$this->m->editPurchase();

        echo json_encode($data);
    }

     public function updatePurchase()
    {
        $data=$this->m->updatePurchase();

        echo json_encode($data);
    }
     public function deletePurchase()
    {
        $data=$this->m->deletePurchase();

        echo json_encode($data);
    }

  public function showPurchase()
    {
        $data=$this->m->showPurchase();

        echo json_encode($data);
    }  
     public function changeprice()
    {
        $data=$this->m->changeprice();

        echo json_encode($data);
    }  
      public function changeproduct()
    {
        $data=$this->m->changeproduct();

        echo json_encode($data);
    }  

    
}
?>