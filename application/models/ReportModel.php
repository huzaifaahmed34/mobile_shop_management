<?php
class ReportModel extends CI_Model
{  


	public function showReport()
{
  $from_date=$this->input->post('from_date');
  $to_date=$this->input->post('to_date');

  $cid=$this->input->post('customer_id');
   $qry=$this->db->query("select * from customer as c,transaction as t where t.customer_id=c.id and (t.date >= '$from_date' and t.date<= '$to_date') and c.id='$cid' and (type='Debit' or type='Credit')");

         return $qry->result();
}

public function showDashboardReport()
{
  $from_date=$this->input->get('from_date');
  $to_date=$this->input->get('to_date');

   $qry=$this->db->query("SELECT  (
   
SELECT sum(net_price) as t FROM `purchase` WHERE is_deleted=0 and (created_on between '$from_date' and '$to_date')
    ) AS net_price,
    (
        
SELECT sum(discount) as d FROM `purchase` WHERE is_deleted=0 and (created_on  between '$from_date' and '$to_date')
    ) AS discount,
    (
  SELECT sum(amount) as t FROM `transaction` WHERE  (date between '$from_date' and '$to_date') and type='Debt'
    ) AS debt_amount,
    (
  SELECT sum(amount) as t FROM `transaction` WHERE  (date between '$from_date' and '$to_date') and remarks='Voucher'
    ) AS voucher_amount,
    (
 SELECT sum(amount) as t FROM expense WHERE (date>='$from_date' and date<='$to_date') and is_deleted=0
    ) AS expense_amount,
    (
 

SELECT sum(p.net_price) as purchase_discount FROM `purchase` as p ,product as pt WHERE pt.id=p.product_id and  (p.created_on between '$from_date' and '$to_date') and p.is_deleted=0
    ) AS purchase_discount,
        (
 

SELECT sum(pt.purchase_price) as purchase_price FROM `purchase` as p ,product as pt WHERE pt.id=p.product_id and pt.purchase_price=pt.purchase_price*p.qty  and  (p.created_on between '$from_date' and '$to_date') and p.is_deleted=0
    ) AS purchase_price");

         return $qry->result();
}







public function showReport1()
{
  $cid=$this->input->post('customer_id');
   $qry=$this->db->query("select * from customer as c,transaction as t where t.customer_id=c.id and c.id='$cid' and (type='Debit' or type='Credit')");

         return $qry->result();
}

	public function showProductWiseReport()
{
	  $product_id=$this->input->post('product_id');
  $from_date=$this->input->post('from_date');
  $to_date=$this->input->post('to_date');
   $qry=$this->db->query("select  p.net_price,pr.name as product_name,pt.name as product_type_name,p.qty,c.customer_name,pr.model ,t.amount,t.date from purchase as p,product as pr,product_type as pt,transaction as t,customer as c where c.id=p.customer_id and p.product_id=pr.id and p.product_type_id=pt.id and pt.id=pr.product_type_id and  p.is_deleted=0 and t.purchase_id=p.id and (t.date >= '$from_date' and t.date<= '$to_date') and p.product_id='$product_id' and t.amount<0 ");

         return $qry->result();
}


public function showProductWiseReport1()
{
	  
   $qry=$this->db->query("select p.qty,p.net_price,pr.name as product_name,pt.name as product_type_name,c.customer_name,pr.model ,t.amount,t.date from purchase as p,product as pr,product_type as pt,transaction as t,customer as c where c.id=p.customer_id and p.product_id=pr.id and p.product_type_id=pt.id and pt.id=pr.product_type_id and  p.is_deleted=0 and t.purchase_id=p.id and t.amount<0 ");

         return $qry->result();
}


    }