<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class City extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('CityModel', 'm');

		

    }



       public function index()

    {

  $this->load->view('admin/header');

  $this->load->view('admin/sidebar');

  $this->load->view('admin/rightsidebar');

        $this->load->view('user/addCity');
 $this->load->view('admin/footer');
    }

    
    public function saveCity()
    {
        $data=$this->m->saveCity();

        echo json_encode($data);
    }
     public function editCity()
    {
        $data=$this->m->editCity();

        echo json_encode($data);
    }

    public function saveStaff()

    {

        $mh = $_SESSION['group_id'];
        $uname= $this->input->post('uname');
        $doj= $this->input->post('s_doj');
        
        $father_name= $this->input->post('ufather_name');
        $gender= $this->input->post('gender');
        $cnic= $this->input->post('cnic');
        $mobile_no= $this->input->post('mobile_no');
        $dob= $this->input->post('dob');
        $address= $this->input->post('address');
        $salary= $this->input->post('salary');
        $shift= $this->input->post('shift');
        $jobType= $this->input->post('jobType');
      $account_type_id=1;
        $this->load->model('InsertData');
        $data=$this->InsertData->addstaff($uname,$father_name,$gender,$cnic,$mobile_no,$dob,$address,$doj,$salary,$shift,$jobType,$account_type_id,$mh);
        echo json_encode($data);
    // }


    }

    public function saveWareHouse()

    {

        

            // $this->form_validation->set_rules('uname', 'Name', 'required');
            // $this->form_validation->set_rules('fathername', 'Father Name', 'required');
            // $this->form_validation->set_rules('gender', 'Gender', 'required');
            // $this->form_validation->set_rules('cnic', 'CNIC', 'required');
            // $this->form_validation->set_rules('mobile_no', 'Phone No', 'required|numeric');
            // $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
            // $this->form_validation->set_rules('address', 'Address', 'required');
            // $this->form_validation->set_rules('doj', 'Date Of Joining', 'required');
            // $this->form_validation->set_rules('salary', 'Salary', 'required');
            // $this->form_validation->set_rules('shift', 'Shift', 'required');
            // $this->form_validation->set_rules('jobType', 'Job Type', 'required');

            // if ($this->form_validation->run())
            // {
        $w_code= $this->input->post('code');
        $name= $this->input->post('name');
        $address= $this->input->post('address');
        $created_on = strtotime(date('Y-m-d h:i:s A'));
        $this->load->model('InsertData');
        $this->InsertData->addWarehouse($w_code,$name,$address,$created_on);
    // }


    }



    public function showCity()

    {

        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');

        $this->load->view('user/showCity');

        $this->load->view('admin/footer');

    }
    
    public function deleteCity()
    {
        $res=$this->m->deleteCity();
        $msg['success'] = false;
        if($res){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function cityList()

    {

         $data=$this->m->cityList();

        echo json_encode($data);

    }

    public function staffList()

    {

         $data=$this->m->showStaff();

        echo json_encode($data);

    }
    public function showGodown()

    {

         $data=$this->m->godownList();

        echo json_encode($data);

    }

    public function editStaff(){
        $result = $this->m->editStaff();
        echo json_encode($result);
    }

    public function updateStaff(){
        $id = $this->input->post('txtId');
        $result = $this->m->updateStaff($id);
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
        $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function updateCity(){
        $result = $this->m->updateCity();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
        $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteStaff()
    {
        $res=$this->m->deleteStaff();
        $msg['success'] = false;
        if($res){
            $msg['success'] = true;
        }
        echo json_encode($msg);
      
       
    }



}