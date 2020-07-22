

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Departure
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Inventory/Stock</a></li>
        <li class="active">Departure</li>
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
    			<h3 class="box-title">Departure</h3>
    			</div>
            
                
                <!-- /.col -->
                <div class="col-md-6" >
                 
                </div>
    			<div class="col-md-3" style="text-align: right; padding-top:30px;">
    			 <!-- /.form-group -->
                  <div class="form-group">
                      <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="<?php echo base_url()?>/assets/dist/img/print.png"></a>
                  </div>
                  <!-- /.form-group -->
    			
    			</div>
                <!-- /.col -->
        </div>
                </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                   
  <form method="post" action="<?php echo site_url('Reports/getDeparture');?>" id="myForm" class="no-print">
        <div class="box-body">
        
          <div class="row no-print">
		    
			<div class="col-md-3">
               <div class="from-group">
                   <label>Saleman</label>
                    <select class="selectpicker form-control" id="customer_id" data-container="body" data-live-search="true" title="Select" data-hide-disabled="true" name="saleMAn_id">
                      <option value="">Select Saleman</option>
                       <?php
                       $group_id=$_SESSION['group_id'];
                      $qry=$this->db->query("SELECT * FROM `aims_user` where group_id=$group_id and is_deleted=0");
                         $res=$qry->result();
                        foreach($res AS $row)
                        {
                        
                        ?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->full_name;?></option>
                        <?php
                        }
                           
                        ?>
                    </select>
                    </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="from-group">
                   <label>Start Date</label>
                    <input type="date" class="form-control datepicker" name="c_date" value="<?php echo date('Y-m-d'); ?>">
                    </div>   
            </div>
            
            <div class="col-md-3">
               <div class="from-group">
                   <label>End Date</label>
                    <input type="date" class="form-control datepicker" name="e_date" value="<?php echo date('Y-m-d'); ?>">
                    </div>
            </div>
          
			<div class="col-md-3">
			 <div class="form-group">
                   <button style="background-color:#00A157;margin-top:25px !important;" type="button" class="btn bg-olive margin" id="btnSearch">Search</button>
                
                    </div>
			</div>
			
          </div>
           
         
   
          </div>
          </form>
   
    
          <div class="alert alert-success" style="display: none;"></div>
         <div class="table-responsive">    
         <table id="example1" class="table  table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr style="background:black;color:white">
            
                             
                                    <th>SR#</th>
                                    <th>Date</th>
                                        <th>Saleman</th>
                                      
                                        <th>Godown</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Amount</th>
                                        
                                        

                            </tr>
                            </thead>
               
                           
                    <tbody id="showPrice">
                    </tbody>
                    <tr>
                     <th colspan="6" class="tableTotal">Total Amount</th>
                     <th colspan="1" class="tableTotal"><span id="balance"></span></th>
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
     //showPrice();
		//function
		function showPrice(){
        
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Reports/getDeparture')?>',
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
                    
                        
                        balance= parseInt(balance) + parseInt(data[i].amount);
                        
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
                               '<td>'+data[i].tDate+'</td>'+
		                        '<td>'+data[i].saleMan+'</td>'+
		                        '<td>'+data[i].godown+'</td>'+
                                '<td>'+data[i].product_name+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                               '<td>'+data[i].amount+'</td>'+
                   
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
  
          var saleMAn_id = $('select[name=saleMAn_id]');
          var s_date = $('input[name=c_date]');
          var e_date = $('input[name=e_date]');
   
          var result = '';
          if(saleMAn_id.val()==''){
           saleMAn_id.parent().parent().addClass('has-error');
            }else{
          saleMAn_id.parent().parent().removeClass('has-error');
          
                result +='1';
            }

           if(result==1)
           {
               
            $.ajax({
				type: 'ajax',
                method:'post',
                data:data,
				url: '<?php echo site_url('Reports/getDeparture')?>',
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
                    
                        
                        balance= parseInt(balance) + parseInt(data[i].amount);
                        
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
                               '<td>'+data[i].tDate+'</td>'+
		                        '<td>'+data[i].saleMan+'</td>'+
		                        '<td>'+data[i].godown+'</td>'+
                                '<td>'+data[i].product_name+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                               '<td>'+data[i].amount+'</td>'+
                   
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

</body>
</html>

