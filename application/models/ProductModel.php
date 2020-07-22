<?php
class ProductModel extends CI_Model
{
 

    public function addProductType()

{

    $date = strtotime(date("Y-m-d h:i:s"),time());
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
       
        $data=array(
                
    'name'=>$arr[0],
    'code'=>$arr[1],
    
     'created_on'=>$date,
    );
    
     $this->db->insert('product_type',$data);
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



    public function updateProductType()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'name'=>$this->input->post('product_type1'),
    'code'=>$this->input->post('code1'),
   
     'updated_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('product_type',$data);
    
    }

  public function deleteProductType()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'is_deleted'=>1,
    
     'deleted_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('product_type',$data);
    
    }
    

     public function showProductType()

    {
         $qry=$this->db->query("select * from product_type where is_deleted=0");

         return $qry->result();

    }

 public function editProductType()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select * from product_type where id='$id'");

         return $qry->result();

    }





 public function addProduct()

{

    $date = strtotime(date("Y-m-d h:i:s"),time());
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
       
        $data=array(
           
                 'dealer_id'=>$arr[0],
    'name'=>$arr[1],
    'category'=>$arr[2],
      'price'=>$arr[3],
      
            'qty'=>$arr[7],
              'type'=>$arr[8],
                'purchase_price'=>$arr[9],
                  'product_code'=>$arr[10],
                    
      
    
     'created_on'=>$date,
    );
    
     $this->db->insert('product',$data);
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



    public function updateProduct()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'name'=>$this->input->post('p_name1'),
    'product_code'=>$this->input->post('p_code1'),
   
    'category'=>$this->input->post('category1'),
      'price'=>$this->input->post('price1'),
      
          'qty'=>$this->input->post('qty1'),
             'type'=>$this->input->post('type1'),
     'purchase_price'=>$this->input->post('purchase_price1'),
          'dealer_id'=>$this->input->post('dealer1'),
                 
      
   
     'updated_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('product',$data);
    
    }

  public function deleteProduct()

{
$id=$this->input->post('id');
    $date = strtotime(date("Y-m-d h:i:s"),time());
  $data=array( 
   
   'is_deleted'=>1,
    
     'deleted_on'=>$date
 );
    
    $this->db->where('id',$id);
     $this->db->update('product',$data);
    
    }
    

     public function showProduct()

    {
         $qry=$this->db->query("select p.id,p.name, p.product_code,p.type,p.category,p.purchase_price,p.price,p.qty,d.name as dealer from product as p,dealer as d where d.id=p.dealer_id and  p.is_deleted=0");

         return $qry->result();

    }
     public function showProductBySearch()

    {
        $val=$this->input->post('val');
         $qry=$this->db->query("select p.id,p.name, p.product_code,p.type,p.category,p.purchase_price,p.price,p.qty,d.name as dealer from product as p,dealer as d where d.id=p.dealer_id and  p.is_deleted=0 and (p.name like '%$val%' or p.product_code like '%$val%')");

         return $qry->result();

    }


     public function searchProduct()

    {
        $product_id=$this->input->get('product_id');
         $qry=$this->db->query("select * from product where  is_deleted=0 and id='$product_id'");

         return $qry->result();

    }



     public function searchProduct1()

    {
       
        $product_id=$this->input->get('product_id');
         $qry=$this->db->query("select * from product where  is_deleted=0 and id='$product_id'");

         return $qry->result();

    }

 public function editProduct()

    {
        $id=$this->input->get('id');
         $qry=$this->db->query("select * from product where id='$id'");

         return $qry->result();

    }


 public function addQty()

    {$date = strtotime(date("Y-m-d h:i:s"),time());
        $id=$this->input->get('id');
        $qty=$this->input->get('qty');;
         $qry=$this->db->query("update product set qty=qty+'$qty',updated_on='$date' where id='$id'");

    }





}
?>