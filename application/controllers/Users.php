<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
		parent:: __construct();
        $this->load->model('UsersModel', 'm');
		
    }

       public function index()
    {
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/usersView');
        $this->load->view('admin/footer');
    }

    public function saveUsers()
    {
        $data=$this->m->saveUsers();
        echo json_encode($data);
        }

    public function usersView()
    {
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/showUsers');
        $this->load->view('admin/footer');
        
        
       
    }
    public function usersList()
    {
        $res=$this->m->usersList();
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

    public function deleteUser(){
		$result = $this->m->deleteUser();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
    
   	public function editUsers(){
		$result = $this->m->editUsers();
		echo json_encode($result);
	}
    
    public function updateUsers()
    {
        $result = $this->m->updateUsers();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
    }

}