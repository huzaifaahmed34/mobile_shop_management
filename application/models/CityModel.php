<?php

class CityModel extends CI_Model

{  



	public function saveCity()

{

    $date = strtotime(date("Y-m-d h:i:s"));
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
        $data=array(
                
    'code'=>$arr[0],
    'name'=>$arr[1],
     'is_deleted'=> 0,
     'created_on'=>$date
    );
    
     $this->db->insert('city',$data);
    }
    
    if($this->db->affected_rows()>0)
    {
        return true;
    }
    else
    {
        return false;
    }

	}

    

     public function cityList()

    {
         $qry=$this->db->query("select * from city where is_deleted=0");

         return $qry->result();

    }

    public function editCity()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('city');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
    }
    }

    
    
        
    public function deleteCity()
    {
        $id =$this->input->get('id');
        $is_deleted = 1;

        $data = array(
            'is_deleted' => $is_deleted
        );
        $this->db->set($data);
        $this->db->where("id",$id);
        $this->db->update("city",$data);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateCity()
    {
           $id =$this->input->post('txtId');
        $field = array(
            'code'=>$this->input->post('c_code'),
            'name'=>$this->input->post('c_name'),
        );
        $this->db->where('id', $id);
        $this->db->update('city', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
        
    public function showStaff()

    {

          $group_id=$_SESSION['group_id'];

         $qry=$this->db->query("select * from aims_account where is_deleted='0' and account_type_id=1 and mh='$group_id' order by id desc");

         return $qry->result();

    }

    public function godownList()

    {

         $group_id=$_SESSION['group_id'];

         $qry=$this->db->query("select * from aims_godown  where mh=$group_id and is_deleted='0'");

         return $qry->result();

    }

    public function deleteStaff()
    {
        $id =$this->input->get('id');
        $deleted_on = round(microtime(true) * 1000);
        $is_deleted = 1;

        $data = array(
            'deleted_on' => $deleted_on,
            'is_deleted' => $is_deleted
        );
        $this->db->set($data);
        $this->db->where("id",$id);
        $this->db->update("aims_account",$data);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateStaff($id)
    {
           // $id = $this->input->post('txtId');
        $field = array(
            'name'=>$this->input->post('edit_name'),
            'father_name'=>$this->input->post('father_name'),
            'cnic'=>$this->input->post('cnic'),
            'cell_no'=>$this->input->post('mobile_no'),
            'address'=>$this->input->post('address'),
            'salary'=>$this->input->post('salary'),
            'updated_on'=>round(microtime(true) * 1000)
        );
        $this->db->where('id', $id);
        $this->db->update('aims_account', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function editStaff()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('aims_account');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
    }
    }





}

?>