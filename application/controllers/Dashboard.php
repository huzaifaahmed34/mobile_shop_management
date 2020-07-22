<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __Construct(){
        parent::__Construct ();

 
       
    }

    public function index()
    {
      if ($this->session->userdata('user_name')!='') { 
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('dashboard');
        $this->load->view('admin/footer');
    }
        else
        {
            redirect('MyLogin');
        }
    }
    
     
    
   
}