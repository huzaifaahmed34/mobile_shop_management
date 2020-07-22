<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

    function __construct(){
		parent:: __construct();
        $this->load->model('TransactionModel', 'm');
		
    }

       public function index()
    {
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/paidVochar');
        $this->load->view('admin/footer');
    }

    public function saveTransctions()
    {
        $data=$this->m->saveTransctions();
        echo json_encode($data);
        }

    public function receiveVochar()
    {
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/receiveVochar');
        $this->load->view('admin/footer');
        
    
       
    }
    public function saveReceiveVochar()
    {
        $res=$this->m->saveReceiveVochar();
        echo json_encode($res);
    }

    public function editAccounts($id)
    {
       $this->load->model('AccountsModel');
        $res=$this->AccountsModel->editAccounts($id);
     
        if($res)
        {
      
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/editAccounts/',['edit'=>$res]);
        $this->load->view('admin/footer');
        }
    }

     public function updateAccounts()
    {
       $this->load->model('AccountsModel');
        $res=$this->AccountsModel->updateAccounts();
     
        if($res)
        {
        $msg="Record Updated Successfully";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/accountsView',['msg'=>$msg]);
        $this->load->view('admin/footer');
    }
        else
        {
        $msg="Record Not Updated";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/accountsView',['msg'=>$msg]);
        $this->load->view('admin/footer');
    }
        
   
    }

    public function deleteAccount(){
		$result = $this->m->deleteAccount();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
    
   	public function editAccount(){
		$result = $this->m->editAccount();
		echo json_encode($result);
	}
    
    public function updateAccount()
    {
        $result = $this->m->updateAccount();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
    }

}