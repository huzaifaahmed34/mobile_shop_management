<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dealer extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('DealerModel', 'm');

		

    }



       public function index()

    {

        

        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
        $this->load->view('admin/rightsidebar');
        $this->load->view('user/addDealer');

        $this->load->view('admin/footer');

    }

    
    public function AddDealer()
    {
        $data=$this->m->addDealer();

        echo json_encode($data);
    }

 public function editDealer()
    {
        $data=$this->m->editDealer();

        echo json_encode($data);
    }

     public function updateDealer()
    {
        $data=$this->m->updateDealer();

        echo json_encode($data);
    }
     public function deleteDealer()
    {
        $data=$this->m->deleteDealer();

        echo json_encode($data);
    }

    
    public function showDealer()
    {
        $data=$this->m->showDealer();

        echo json_encode($data);
    }



}