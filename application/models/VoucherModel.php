<?php

class VoucherModel extends CI_Model

{  



	public function AddPaymentVoucher()

{
   $purchase_id='';
$product_id='';
$qty='';
    $date = strtotime(date("Y-m-d h:i:s"),time());
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
     

     $data2=array(
             
    'customer_id'=>$arr[0],
    
    
     'amount'=>$arr[2],
     'type'=>'Credit',
      'remarks'=>'Voucher',
      'date'=>$arr[1],
       'created_on'=>$date,
    );
    
    $this->db->insert('transaction',$data2);
    $this->db->query("update customer set balance=balance+'$arr[2]' where id=$arr[0]");
    
    $c++;}
    
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