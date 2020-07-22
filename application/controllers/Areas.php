<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {

    function __construct(){
		parent:: __construct();
        $this->load->model('AreasModel', 'm');
		
    }

       public function index()
    {
       
  $this->load->view('admin/header');

  $this->load->view('admin/sidebar');

  $this->load->view('admin/rightsidebar');

        $this->load->view('user/addArea');
 $this->load->view('admin/footer');
       }
    
    public function saveAreas()
    {
        $data=$this->m->saveAreas();
        echo json_encode($data);
    }
    
    public function areasList()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('user/areasList');
        $this->load->view('admin/footer');
    }
    public function showAreas()
    {
        $data=$this->m->showArea();
        echo json_encode($data); 
    }

    public function editAreas()
    {
        $data=$this->m->editAreas();
        echo json_encode($data); 
    }
    
     public function deleteAreas()
    {
        $res=$this->m->deleteArea();
        $msg['success'] = false;
        if($res){
            $msg['success'] = true;
        }
        echo json_encode($msg);
      
       
    }
    
        public function editArea(){
        $result = $this->m->editArea();
        echo json_encode($result);
    }
    
    public function updateArea()
    {
        $result = $this->m->updateAreas();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
        $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}