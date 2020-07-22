<?php

class PurchaseModel extends CI_Model

{  



	public function addPurchase()

{
    $print_val='';
    $c=0;
   $purchase_id='';
$product_id='';
$qty='';
$bal=0;
    $date = strtotime(date("Y-m-d h:i:s"),time());
    $date1 =date("Y-m-d");
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
         if($c<1){
$print_val=$arr[12];
    };
       $product_id=$arr[2];
       $qty=$arr[11];
        $data=array(
          'print_value'=>$print_val,     
    'customer_id'=>$arr[0],
   
     'product_id'=> $arr[2],
     'price'=>$arr[3],
     'discount'=>$arr[4],
     'net_price'=>$arr[5],
      'qty'=>$arr[11],
       'remarks'=>$arr[6],
     'created_on'=>$date1,
    );

      
     $this->db->insert('purchase',$data);
          $this->db->query("update product set qty=qty-'$qty' where id='$product_id'");

  $last_row=$this->db->query("SELECT MAX(id) as id FROM purchase ")->result();

        foreach($last_row AS $row)

        {

        $purchase_id=$row->id;

        }
             $data2=array(
             
    'customer_id'=>$arr[0],
    'purchase_id'=>$purchase_id,
    
     'amount'=>-$arr[5],
     'type'=>'Debit',
     'remarks'=>'Quick Sale',
      'date'=>date('Y-m-d'),
       'created_on'=>$date,
    );
     $data3=array(
             
    'customer_id'=>$arr[0],
    'purchase_id'=>$purchase_id,
     'remarks'=>'Quick Sale',
     'amount'=>$arr[13],
     'type'=>'Credit',
     
      'date'=>date('Y-m-d'),
       'created_on'=>$date,
    );
     $bal=$arr[5]-$arr[13];
     if($bal>0){
         $data4=array(
             
    'customer_id'=>$arr[0],
    'purchase_id'=>$purchase_id,
     'remarks'=>'Debt',
     'amount'=>$bal,
     'type'=>'Debt',
     
      'date'=>date('Y-m-d'),
       'created_on'=>$date,
    );
     }
    
    $this->db->insert('transaction',$data2);
        $this->db->insert('transaction',$data3);
  $this->db->insert('transaction',$data4);
    $this->db->query("update customer set balance=balance-'$bal' where id=$arr[0]");
    
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



    public function updatePurchase()

{
$id=$this->input->post('id');
$hid=$this->input->post('hiddenqty');
$qty=$this->input->post('qty1');
$product_id=$this->input->post('product_id1');

    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
    'customer_id'=>$this->input->post('customer_id1'),
  
     'product_id'=> $this->input->post('product_id1'),
     'price'=>$this->input->post('price1'),
     'discount'=>$this->input->post('discount1'),
     'net_price'=>$this->input->post('net_amount1'),
'qty'=>$this->input->post('qty1'),

   'remarks'=>$this->input->post('remarks1'),
   
     'updated_on'=>$date,
 );

    $data2=array( 
    'amount'=>$this->input->post('net_amount1')
);
    $this->db->where('id',$id);
     $this->db->update('purchase',$data);

      $this->db->query("update product set qty=qty-('$qty'-'$hid') where id='$product_id'");


          $this->db->where('id',$id);
     $this->db->update('transaction',$data2);
    
    }

  public function deletePurchase()

{
    $bal=0;
$id=$this->input->post('id');
$qty=$this->input->post('qty');
$product_id=$this->input->post('product_id');
$customer_id=$this->input->post('customer_id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'is_deleted'=>1,
    
     'deleted_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('purchase',$data);
     $qry=$this->db->query("select * from transaction where purchase_id='$id' and type='Debt'")->result();

    foreach ($qry as $q) {
    $bal=$q->amount;
    }
    $this->db->query("update customer set balance=balance+'$bal' where id='$customer_id'");
      $this->db->query("update product set qty=qty+'$qty' where id='$product_id'");

    $this->db->query("delete from transaction where purchase_id='$id'");
   
    }
    

     public function showPurchase()

    {
         $qry=$this->db->query("select p.id,p.price,p.remarks,p.qty,p.discount,p.net_price,pr.name as product_name,pr.id as product_id,pr.type,c.id as customer_id,pr.product_code,c.customer_name  from purchase as p,product as pr,customer as c where c.id=p.customer_id and p.product_id=pr.id  and p.is_deleted=0");

         return $qry->result();

    }

 public function editPurchase()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select * from purchase where id='$id'");

         return $qry->result();

    }


    public function changeProduct()
    {
        $id = $this->input->get('id');
        $this->db->where('product_type_id', $id);
        $query = $this->db->get('product');
        return $query->result();
    }
     public function changePrice()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        return $query->result();
    }


     public function showPrintData()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select p.id,p.price,p.remarks,p.qty,p.discount,p.net_price,pr.name as product_name,c.customer_name  from purchase as p,product as pr,customer as c where c.id=p.customer_id and p.product_id=pr.id  and p.is_deleted=0 and p.print_value='$id'");

         return $qry->result();

    } 


     public function showPrintData1()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select p.id,p.price,p.remarks,p.qty,p.discount,p.net_price,pr.name as product_name,c.customer_name  from purchase as p,product as pr,customer as c where c.id=p.customer_id and p.product_id=pr.id  and  p.is_deleted=0 and p.id='$id'");

         return $qry->result();

    }

}

