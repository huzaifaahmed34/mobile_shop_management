

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Stock Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Inventory/Stock</a></li>
        <li class="active">Daily Stock Report</li>
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
    			<h3 class="box-title">Daily Stock Report</h3>
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
                   
  <form method="post" action="<?php echo site_url('Reports/stockRes')?>" id="myForm" class="no-print">
        <div class="box-body">
        
          <div class="row no-print">
			<div class="col-md-2">
               <div class="from-group">
                   <label>Ware House</label>
                    <select id="g_id" class="form-control" name="g_id">
                      <option value="">Select Ware House</option>
                       <?php
                       $group_id=$_SESSION['group_id'];
                      $qry=$this->db->query("SELECT * FROM `aims_godown` where mh=$group_id");
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
            
            	<div class="col-md-2">
               <div class="from-group">
                   <label>Date</label>
                 <input type="date" class="form-control datepicker" name="c_date">
                    </div>
            </div>
            
         
          
			<div class="col-md-2">
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
                                        <th>Godown#</th>
                                        <th>SKU</th>
                                        <th>Product Name</th>
                                        <th>Packing</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                         <th>Total Amount</th>
                                        
                                        

                            </tr>
                            </thead>
               
                           
                    <tbody id="showStock">
                    </tbody>
                    <tr>
                     <th colspan="7" class="tableTotal">Total Amount</th>
                     <th colspan="1" class="tableTotal"><span id="subTotal"></span></th>
                  </tr>
                  <tr>
                     <th colspan="7" class="tableTotal">Total Product</th>
                     <th colspan="1" class="tableTotal"><span id="totalPro"></span></th>
                  </tr>
                  <tr>
                     <th colspan="7" class="tableTotal">Total QTY</th>
                     <th colspan="1" class="tableTotal"><span id="totalQty"></span></th>
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
     showPrice();
		//function
		function showPrice(){
        
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Reports/stockRes')?>',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
                   
                    var c=0;
                    var subTotal=0;
                    var balance=0;
                    var totalQty=0;
                    var totalPro=0;
					for(i=0; i<data.length; i++){
					   c++;
                        amount=data[i].amount;
                        totalQty=parseInt(totalQty) + parseInt(data[i].qty );
              
                       subTotal=parseInt(subTotal) + parseInt(data[i].qty * data[i].price);
                     
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
		                        '<td>'+data[i].godown_name+'</td>'+
		                        '<td>'+data[i].sku+'</td>'+
                                '<td>'+data[i].product_name+'</td>'+
                                '<td>'+data[i].packing_qty+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                               '<td>'+data[i].qty * data[i].price+'</td>'+
                            
                              
                               
                              
                           
                                '</tr>';
					}
					$('#showStock').html(html);
                    $('#subTotal').html(subTotal);
                    $('#totalQty').html(totalQty);
                    $('#totalPro').html(c);
               
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
       
          var g_id = $('select[name=g_id]');
         
      //alert (data);

          var result = '';
          if(g_id.val()==''){
           g_id.parent().parent().addClass('has-error');
            }else{
          g_id.parent().parent().removeClass('has-error');
          
                result +='1';
            }

           if(result==1)
           { 
            $.ajax({
				type: 'ajax',
                method:'post',
                data:data,
				url: '<?php echo site_url('Reports/stockRes')?>',
				async: false,
				dataType: 'json',
		success: function(data){

					var html = '';
					var i;
                   
                    var c=0;
                    var subTotal=0;
                    var balance=0;
                    var totalQty=0;
                    var totalPro=0;
					for(i=0; i<data.length; i++){
					   c++;
                        amount=data[i].amount;
                        totalQty=parseInt(totalQty) + parseInt(data[i].qty );
              
                       subTotal=parseInt(subTotal) + parseInt(data[i].qty * data[i].price);
                     
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
		                        '<td>'+data[i].godown_name+'</td>'+
		                        '<td>'+data[i].sku+'</td>'+
                                '<td>'+data[i].product_name+'</td>'+
                                '<td>'+data[i].packing_qty+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                               '<td>'+data[i].qty * data[i].price+'</td>'+
                            
                              
                               
                              
                           
                                '</tr>';
					}
					$('#showStock').html(html);
                    $('#subTotal').html(subTotal);
                    $('#totalQty').html(totalQty);
                    $('#totalPro').html(c);
               
				},
                error:function()
                {
                 $('.alert-danger').html('Soory, this record not exist!').fadeIn().delay(4000).fadeOut('slow');
                }
            });
           }
        // Data Send For Printer
      
         
       
   });
         $('#btnPrint').click(function(){
         // alert('ok');
            window.location.href = "<?php echo site_url('Reports/printStockReport')?>/" + 1;
       
		 });


    }); 

    </script>

</body>
</html>

