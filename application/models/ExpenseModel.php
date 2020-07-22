<?php

class ExpenseModel extends CI_Model

{  



	public function addExpense()

{
$da=date("Y-m-d");
    $date = strtotime(date("Y-m-d h:i:s"),time());
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
       
        $data=array(

    'name'=>$arr[3],
     'amount'=> $arr[2],
     'date'=>$arr[5],
    
     'created_on'=>$date,
    );
     
    $this->db->insert('expense',$data);
    if($this->db->affected_rows()>0)
    {
        return true;
    }
    else
    {
        return false;
    }

	}
}



    public function updateExpense()

{
$id=$this->input->post('id');
  
 $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
    'name'=>$this->input->post('expense_name1'),
     'amount'=> $this->input->post('expense_amount1'),
     'date'=>$this->input->post('date1'),
    
     'updated_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('expense',$data);
    
    }

  public function deleteExpense()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'is_deleted'=>1,
    
     'deleted_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('expense',$data);
    
    }
    

     public function showExpense()

    {
         $qry=$this->db->query("select * from expense  where is_deleted=0");

         return $qry->result();

    }

 public function editExpense()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select * from expense where id='$id'");

         return $qry->result();

    }








}

?>