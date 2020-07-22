

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Customer Sale History
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
         <li><a href="#">Reports</a></li>
         <li><a href="#">Sales</a></li>
         <li class="active">Customer Sale History</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-success">
               <div class="box-header with-border">
                  
                  <div class="row">
                     <div class="col-md-3">
                         <h3 class="box-title">Customer Sale History</h3>
                     </div>
                     <!-- /.col -->
                     <div class="col-md-6" >
                     </div>
                     <div class="col-md-3" style="text-align: right; padding-top:30px;">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="<?php echo base_url()?>/assets/dist/img/print.png"></a>
                           <a href="<?php echo site_url('Sale/')?>" title="Add Sale" class="hvr-grow" data-toggle="tooltip"><img src="<?php echo base_url()?>/assets/dist/img/add.png"></a>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- /.col -->
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="<?php echo site_url('Reports/customerSaleReport');?>" id="myForm" class="no-print">
                     <div class="box-body">
                        <div class="row no-print">
                           <div class="col-md-2">
                              <div class="from-group">
                                 <label>Route</label>
                                 <select id="route_id" class="form-control" name="route_id">
                                    <option value="">Select Route</option>
                                    <?php
                                       $group_id=$_SESSION['group_id'];
                                       $qry=$this->db->query("SELECT * FROM `aims_route` where mh=$group_id");
                                         $res=$qry->result();
                                        foreach($res AS $row)
                                        {
                                        
                                        ?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->route_name;?></option>
                                    <?php
                                       }
                                          
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label> Area</label>
                                 <select name="area_id" id='area_id' class="form-control area_name">
                                    <option>Select Area</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Customer</label>
                                 <select name="customer_id" id="customer_id" class="form-control customer_name">
                                    <option value="">Select Customer</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="from-group">
                                 <label>Start Date</label>
                                 <input type="date" class="form-control datepicker" name="c_date" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="from-group">
                                 <label>End Date</label>
                                 <input type="date" class="form-control datepicker" name="e_date" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <button style="background-color:#00A157;margin-top:20px !important;" type="button" class="btn bg-olive margin" id="btnSearch">Search</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  <div class="box-body">
                     <!-- MODAL EDIT -->
                     <form id="myForm" action="<?php echo site_url('Sale/print_sale');?>" method="post">
                        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content update-modal" >
                                 <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">View Detail</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <hr class="marginButtom0px">
                                 </div>
                                 <div class="modal-body">
                                    <div class="row form-group">
                                       <div class="col-md-4 text-center">
                                          <p><b>Customer Name: </b><span id="supplier_name"></span></p>
                                       </div>
                                       <div class="col-md-4 text-center">  
                                          <p><b>Bill #: </b></label> <span id="billNo"></span></p>
                                       </div>
                                       <div class="col-md-4 text-center">
                                          <p><b>Date: </b></label> <span id="myDate"></span></p>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-md-12">
                                          <input type="hidden" name="txtId">
                                          <table class="table  table-striped table-hover js-basic-example dataTable">
                                             <thead>
                                                <tr style="background:black;color:white">
                                                   <th>SR#</th>
                                                   <th>Item</th>
                                                   <th>Qty</th>
                                                   <th>Price</th>
                                                   <th>Total</th>
                                                </tr>
                                             </thead>
                                             <tbody id="purchaseInvoice">
                                             </tbody>
                                             <tr>
                                			     <th colspan="4" class="tableTotal">Total Amount</th>
                                			     <th colspan="1" class="tableTotal"><span id="grandTotal"></span></th>
                                             </tr>
                                            
                                             <tr>
                                			     <th colspan="4" class="tableTotal">Discount</th>
                                			     <th colspan="1" class="tableTotal"><span id="discount"></span></th>
                                             </tr>
                                             
                                             <tr>
                                			     <th colspan="4" class="tableTotal">Net Amount</th>
                                			     <th colspan="1" class="tableTotal"><span id="net_total"></span></th>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                    <input type="text" name="id" id="bill_no" style="display:none">
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" name="submit" value="Print" class="btn btn-success">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     <!--END MODAL EDIT-->
                  </div>
                  <div class="alert alert-success" style="display: none;"></div>
                  <div class="table-responsive">
                     <table id="example1" class="table  table-striped table-hover js-basic-example dataTable">
                        <thead>
                           <tr style="background:black;color:white">
                              <th>Invoice#</th>
                              <th>Date</th>
                              <th>Customer</th>
                              <th>Amount</th>
                              <th>Discount</th>
                              <th>Remarks</th>
                              <th>Net Amount</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody id="showInvoice">
                        </tbody>
                         <tr>
                                 <th colspan="6" class="tableTotal">Sub Total</th>
                                 <th colspan="2" class="tableTotal"><span id="subTotal"></span></th>
                              </tr>
                     </table>
                  </div>
                  
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   $(function(){
    //showInvoice();
   //function
   function showInvoice(){
       //alert('ok');
   $.ajax({
   type: 'ajax',
   url: '<?php echo site_url('Sale/saleInvoiceHist')?>',
   async: false,
   dataType: 'json',
   success: function(data){
   
   	var html = '';
   	var i;
                   var c=0;
   	for(i=0; i<data.length; i++){
   	c++;
   		html +='<tr>'+
   
         '<td>'+c+'</td>'+
            '<td>'+data[i].myDate+'</td>'+
               '<td>'+data[i].customerName+'</td>'+
         '<td>'+data[i].net_amount+'</td>'+
               '<td>'+data[i].discount+'</td>'+
               '<td>'+data[i].remarks+'</td>'+
               '<td>'+data[i].net_amount+'</td>'+
               
   
                   '<td class="no-print">'+
                   '<a href="javascript:;" class="zmdi zmdi-edit  item_view hvr-grow" title="Edit Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>/assets/dist/img/view.png"></a>'+
                 
   					'</td>'+
   
                          
   			    '</tr>';
   	}
   	$('#showInvoice').html(html);
   },
   error: function(){
   	alert('Could not get Data from Database');
   }
   });
   }
       
   // Preview
   $('#showInvoice').on('click', '.item_view', function(){
   var id = $(this).attr('data');
   $('#Modal_Edit').modal('show');
   $('#myForm')[0].reset();
   
   $.ajax({
   type: 'ajax',
   method: 'post',
   url:'<?php echo site_url('Sale/saleInvoiceList')?>',
   data: {id: id},
   async: false,
   dataType: 'json',
   success: function(data){
   	var html = '';
   	var i;
                   var c=0;
   	for(i=0; i<data.length; i++){
   		c++;
                       var billNo=data[i].id;
                       var customer_name=data[i].customer_name;
                       var subTotal=data[i].subTotal;
                   var discount=data[i].discount;
                    var net_total=data[i].net_amount;
                       var myDate=data[i].myDate
                     
   		html +='<tr>'+
   				'<td>'+c+'</td>'+
   				'<td>'+data[i].product_name+'</td>'+
                         '<td>'+data[i].qty+'</td>'+
                         '<td>'+data[i].price+'</td>'+
                               '<td>'+data[i].total_price+'</td>'+
              
   			    '</tr>';
   	}
                   $('#supplier_name').html(customer_name);
   	$('#purchaseInvoice').html(html);
                   $('#grandTotal').html(subTotal);
                   $('#discount').html(discount);
                   $('#net_total').html(net_total);
                     $('#billNo').html(billNo);
                    $('input[name=id]').val(billNo);
                
                   
                   $('#myDate').html(myDate);
   },
   error: function(){
   	alert('Could not Edit Data');
   }
   });
   });
       
       
   $('#btnSearch').click(function(){
   
         var url = $('#myForm').attr('action');
         var data = $('#myForm').serialize();
      //validation      
      
         var s_date = $('input[name=c_date]');
         var e_date = $('input[name=e_date]');
        
      //customer_id=customer_id.val();
    
        e_date=e_date.val();
   
   
         var result = '';
         if(s_date.val()==''){
          s_date.parent().parent().addClass('has-error');
           }else{
         s_date.parent().parent().removeClass('has-error');
         
               result +='1';
           }
      
   
          if(result==1)
          {
              
           $.ajax({
   type: 'ajax',
               method:'post',
               data:data,
   url: '<?php echo site_url('Sale/saleInvoiceHist')?>',
   async: false,
   dataType: 'json',
         success: function(data){
   
   	var html = '';
   	var i;
                   var c=0;
                   var subTotal=0;
   	for(i=0; i<data.length; i++){
                       subTotal=parseInt(subTotal) + parseInt(data[i].net_amount);
   	c++;
   		html +='<tr>'+
   
         '<td>'+data[i].id+'</td>'+
            '<td>'+data[i].myDate+'</td>'+
               '<td>'+data[i].customerName+'</td>'+
         '<td>'+data[i].net_amount+'</td>'+
               '<td>'+data[i].discount+'</td>'+
               '<td>'+data[i].remarks+'</td>'+
               '<td>'+data[i].net_amount+'</td>'+
               
   
                   '<td>'+
                   '<a href="javascript:;" class="zmdi zmdi-edit  item_view hvr-grow" title="Edit Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>/assets/dist/img/view.png"></a>'+
                   
                 
   					'</td>'+
   
                          
   			    '</tr>';
   	}
   	$('#showInvoice').html(html);
                   $('#subTotal').html(subTotal);
   },
               error:function()
               {
                $('.alert-danger').html('Soory, this record not exist!').fadeIn().delay(4000).fadeOut('slow');
               }
           });
          }
       // Data Send For Printer
     
         $('#btnPrint').click(function(){
        // alert('ok');
           window.location.href = "<?php echo site_url('Reports/printDailyCashReport')?>/" + s_date + "/" + e_date;
      
   });
      
   });
       
       
       
   $('#route_id').change(function(){
   
                   var route_id = $(this).val();
   
                  
   
   
   
                   // AJAX request
   
                   $.ajax({
   
                       url:'<?=base_url()?>index.php/Sale/getArea',
   
                       method: 'post',
   
                       data: {id: route_id},
   
                       dataType: 'json',
   
                       success: function(response){
   
   
   
                           // Remove options
   
                           $('#customer_id').find('option').not(':first').remove();
   
                           $('#area_id').find('option').not(':first').remove();
   
   
   
                           // Add options
   
                           $.each(response,function(index,data){
   
                               $('#area_id').append('<option value="'+data['id']+'">'+data['area_name']+'</option>');
   
                           });
   
                       }
   
                   });
   
                   
   
                   
   
               // Department change
   
               $('#area_id').change(function(){
   
                   var department = $(this).val();
   
                      // alert(department);
   
                   // AJAX request
   
                   $.ajax({
   
                       url:'<?=base_url()?>index.php/Sale/getCustomer',
   
                       method: 'post',
   
                       data: {id: department},
   
                       dataType: 'json',
   
                       success: function(response){
   
                           
   
                           // Remove options
   
                           $('#customer_id').find('option').not(':first').remove();
   
   
   
                           // Add options
   
                           $.each(response,function(index,data){
   
                               $('#customer_id').append('<option value="'+data['id']+'">'+data['ac_name']+'</option>');
   
                           });
   
                       }
   
                   });
   
               });
   
               });
       
   }); 
   
</script>

