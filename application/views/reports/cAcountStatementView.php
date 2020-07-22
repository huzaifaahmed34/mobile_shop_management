

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Account Statement
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
         <li><a href="#">Reports</a></li>
         <li><a href="#">Finance/Accounts</a></li>
         <li><a href="#">Account Statement</a></li>
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
                        <h3 class="box-title">Account Statement</h3>
                     </div>
                     <!-- /.col -->
                     <div class="col-md-6" >
                     </div>
                     <div class="col-md-3" style="text-align: right; padding-top:30px;">
                        <!-- /.form-group -->
                        <div class="form-group no-print">
                           <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="<?php echo base_url()?>/assets/dist/img/print.png"></a>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- /.col -->
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="<?php echo site_url('Reports/showCustomerOrderHistory');?>" id="myForm" class="no-print">
                     <div class="box-body">
                        <div class="row no-print">
                           <div class="col-md-3">
                              <div class="from-group">
                                 <lable>Accounts</lable>
                                 <select class="selectpicker form-control" id="customer_id" data-container="body" data-live-search="true" title="Select" data-hide-disabled="true" name="customer_id">
                                    <option value="">Select Account</option>
                                    <?php
                                       $group_id=$_SESSION['group_id'];
                                       $qry=$this->db->query("SELECT * FROM `aims_account` where mh=$group_id and is_deleted=0");
                                         $res=$qry->result();
                                        foreach($res AS $row)
                                        {
                                        
                                        ?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                    <?php
                                       }
                                          
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="from-group">
                                 <lable>Start Date</lable>
                                 <input type="date" class="form-control datepicker" name="c_date" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="from-group">
                                 <lable>End Date</lable>
                                 <input type="date" class="form-control datepicker" name="e_date" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <button style="background-color:#00A157;margin-top:20px !important;" type="button" class="btn bg-olive margin" id="btnSearch">Search</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  <div class="form-group row">
                     <div class="col-md-12">
                        <div class="alert alert-success" style="display: none;"></div>
                        <div class="table-responsive">
                           <table id="example1" class="table  table-striped table-hover js-basic-example dataTable">
                              <thead>
                                 <tr style="background:black;color:white">
                                    <th>SR#</th>
                                    <th>Vocher#</th>
                                    <th>Date</th>
                                    <th>Account Title</th>
                                    <th>Remarks</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                 </tr>
                              </thead>
                              <tbody id="showPrice">
                              </tbody>
                              <tr>
                                 <th colspan="5" class="tableTotal">Total Debit/Credit</th>
                                 <th colspan="1" class="tableTotal"><span id="totalDebit"></span></th>
                                 <th colspan="1" class="tableTotal"><span id="totalCredit"></span></th>
                              </tr>
                              <tr>
                                 <th colspan="5" class="tableTotal">Balance</th>
                                 <th colspan="2" class="tableTotal text-center"><span id="balance"></span></th>
                              </tr>
                           </table>
                        </div>
                     </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script>
   $(function(){
    //showPrice();
   //function
   function showPrice(){
       
   $.ajax({
   type: 'ajax',
   url: '<?php echo site_url('Reports/customerAcountStatementRes')?>',
   async: false,
   dataType: 'json',
   success: function(data){
   
   	var html = '';
   	var i;
                   var debit = 0;
                   var credit = 0;
                   var c=0;
                   var totalDebit=0;
                   var totalCredit=0;
                   var balance=0;
   	for(i=0; i<data.length; i++){
   	c++;
                       amount=data[i].amount;
                       if(amount < 0)
                           {
                              debit = (amount*-1);
                              credit = 0;
                               totalDebit=parseInt(totalDebit) + parseInt(debit);
                           }
                       else
                       {
                           
                           credit = amount;
                           debit =0;
                           totalCredit=parseInt(totalCredit) + parseInt(credit);
                          
                       }
                       
                       balance= parseInt(balance) + parseInt(data[i].amount);
                       
                       //alert(debit_amount);
   		html +='<tr>'+
   				'<td>'+c+'</td>'+
                         '<td>'+data[i].id+'</td>'+
                         '<td>'+data[i].t_date+'</td>'+
                               '<td>'+data[i].account_name+'</td>'+
                               '<td>'+data[i].remarks+'</td>'+
                              '<td>'+debit+'</td>'+
                              '<td>'+credit+'</td>'+
                              '</tr>';
                               
   	}
   	
                  
   	$('#showPrice').html(html);
                   $('#totalDebit').html(totalDebit);
                   $('#totalCredit').html(totalCredit);
                   $('#balance').html(balance);
   },
   error: function(){
   	alert('Could not get Data from Database');
   }
   });
   }
       
       
       
   $('#btnSearch').click(function(){
   
         var url = $('#myForm').attr('action');
         var data = $('#myForm').serialize();
      //validation      
      
         var customer_id = $('select[name=customer_id]');
         var s_date = $('input[name=c_date]');
         var e_date = $('input[name=e_date]');
        
      
      //customer_id=customer_id.val();
       s_date=s_date.val();
     
        e_date=e_date.val();
        c_id=customer_id.val();
      //alert (c_id);
   
         var result = '';
         if(customer_id.val()==''){
          customer_id.parent().parent().addClass('has-error');
           }else{
         customer_id.parent().parent().removeClass('has-error');
         
               result +='1';
           }
   
          if(result==1)
          {
              
           $.ajax({
   type: 'ajax',
               method:'post',
               data:data,
   url: '<?php echo site_url('Reports/customerAcountStatementRes')?>',
   async: false,
   dataType: 'json',
   success: function(data){
   			var html = '';
   	var i;
                   var debit = 0;
                   var credit = 0;
                   var c=0;
                   var totalDebit=0;
                   var totalCredit=0;
                   var balance=0;
   	for(i=0; i<data.length; i++){
   	c++;
                       amount=data[i].amount;
                       if(amount > 0)
                           {
                              debit = (amount);
                              credit = 0;
                               totalDebit=parseInt(totalDebit) + parseInt(debit);
                           }
                       else
                       {
                           
                           credit = (amount*-1);
                           debit =0;
                           totalCredit=parseInt(totalCredit) + parseInt(credit);
                          
                       }
                       
                       balance= parseInt(balance) + parseInt(data[i].amount);
                       
                       //alert(debit_amount);
   		html +='<tr>'+
   				'<td>'+c+'</td>'+
                         '<td>'+data[i].id+'</td>'+
                         '<td>'+data[i].t_date+'</td>'+
                               '<td>'+data[i].account_name+'</td>'+
                               '<td>'+data[i].remarks+'</td>'+
                              '<td>'+debit+'</td>'+
                              '<td>'+credit+'</td>'+
                              
                             
                          
                               '</tr>';
   	}
   	$('#showPrice').html(html);
                   $('#totalDebit').html(totalDebit);
                   $('#totalCredit').html(totalCredit);
                   $('#balance').html(balance);
                   
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
           window.location.href = "<?php echo site_url('Reports/printCustAcountStatement')?>/" + s_date + "/" + e_date  + "/" + c_id;
      
   });
      
   });
   
   
   }); 
   
</script>

