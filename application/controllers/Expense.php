<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Expense extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('ExpenseModel', 'm');

		

    }



       public function index()

    {

        

        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
        $this->load->view('admin/rightsidebar');
        $this->load->view('user/addExpense');

        $this->load->view('admin/footer');

    }

    
    public function addExpense()
    {
        $data=$this->m->addExpense();

        echo json_encode($data);
    }

 public function editExpense()
    {
        $data=$this->m->editExpense();

        echo json_encode($data);
    }

     public function updateExpense()
    {
        $data=$this->m->updateExpense();

        echo json_encode($data);
    }
     public function deleteExpense()
    {
        $data=$this->m->deleteExpense();

        echo json_encode($data);
    }

    
    public function showExpense()
    {
        $data=$this->m->showExpense();

        echo json_encode($data);
    }
}

