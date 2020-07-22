<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Product extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('ProductModel', 'm');

		

    }
    public function index()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
    $this->load->view('admin/rightsidebar');

        $this->load->view('user/addProduct');

        $this->load->view('admin/footer');

    }
    public function ProductType()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
    $this->load->view('admin/rightsidebar');

        $this->load->view('user/productType');

        $this->load->view('admin/footer');

    }

  public function addProductType()
    {
        $data=$this->m->addProductType();

        echo json_encode($data);
    }

 public function showProductBySearch()
    {
        $data=$this->m->showProductBySearch();

        echo json_encode($data);
    }

 public function editProductType()
    {
        $data=$this->m->editProductType();

        echo json_encode($data);
    }

     public function updateProductType()
    {
        $data=$this->m->updateProductType();

        echo json_encode($data);
    }
     public function deleteProductType()
    {
        $data=$this->m->deleteProductType();

        echo json_encode($data);
    }

  public function showProductType()
    {
        $data=$this->m->showProductType();

        echo json_encode($data);
    }  


 public function addProduct()
    {
        $data=$this->m->addProduct();

        echo json_encode($data);
    }

 public function editProduct()
    {
        $data=$this->m->editProduct();

        echo json_encode($data);
    }

     public function updateProduct()
    {
        $data=$this->m->updateProduct();

        echo json_encode($data);
    }
     public function deleteProduct()
    {
        $data=$this->m->deleteProduct();

        echo json_encode($data);
    }

  public function showProduct()
    {
        $data=$this->m->showProduct();

        echo json_encode($data);
    }  


  public function updateQty()
    {
        $data=$this->m->addQty();

        echo json_encode($data);
    }  

  public function searchProduct()
    {
        $data=$this->m->searchProduct();

        echo json_encode($data);
    }  

  public function searchProduct1()
    {
        $data=$this->m->searchProduct1();

        echo json_encode($data);
    }  

}
?>