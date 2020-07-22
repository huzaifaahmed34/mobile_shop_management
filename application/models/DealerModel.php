<?php

class DealerModel extends CI_Model

{  



	public function addDealer()

{

    $date = strtotime(date("Y-m-d h:i:s"),time());
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
       
        $data=array(
                
    'name'=>$arr[0],
    'address'=>$arr[3],
     'city_id'=> $arr[1],
     'area_id'=>$arr[2],
     'cnic'=>$arr[5],
     'phone'=>$arr[4],
     'created_on'=>$date,
    );
    
     $this->db->insert('dealer',$data);
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



    public function updateDealer()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'name'=>$this->input->post('c_name1'),
    'address'=>$this->input->post('c_addr1'),
     'city_id'=> $this->input->post('city_id1'),
     'area_id'=>$this->input->post('area_id1'),
     'cnic'=>$this->input->post('c_cnic1'),
     'phone'=>$this->input->post('c_mobile1'),
     'updated_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('dealer',$data);
    
    }

  public function deleteDealer()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'is_deleted'=>1,
    
     'deleted_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('dealer',$data);
    
    }
    

     public function showDealer()

    {
         $qry=$this->db->query("select c.id,c.name,c.address,c.phone,c.cnic,ct.name,a.area_name from city as ct,area as a,dealer as c where c.city_id=ct.id and c.area_id=a.id and c.is_deleted=0");

         return $qry->result();

    }

 public function editDealer()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select * from dealer where id='$id'");

         return $qry->result();

    }







}

?>