<?php
    class Home extends CI_Controller {

	
	public function index()
	{
        
        
      if ($this->session->userdata('user_name')!='') { 
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('user/main');
        $this->load->view('admin/footer');
            }
        else
        {
            redirect('MyLogin');
        }
	}
  
        
}
?>