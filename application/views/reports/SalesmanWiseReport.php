

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Saleman Wise
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Sales</a></li>
        <li class="active"> Daily Saleman Wise</li>
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
    			<h3 class="box-title">Daily Saleman Wise</h3>
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
                   
  <form method="post" action="<?php echo site_url('Reports/saleManReport');?>" id="myForm" class="no-print">
        <div class="box-body">
        
          <div class="row no-print">
		    
			<div class="col-md-3">
               <div class="from-group">
                   <label>Select  Saleman </label>
                  
                    <select class="selectpicker form-control" id="customer_id" data-container="body" data-live-search="true" title="Select" data-hide-disabled="true" name="customer_id">
                      <option value="">Select  Saleman</option>
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
                        <th>Customer</th>
                        <th>Area</th>
                        <th>Products</th>
                        <th>QTY</th>
                        <th>Rate</th>
                        <th>Bonus</th>
                        <th>Total</th>
                           
                            </tr>
                    </thead>
      <tbody id="getSaleManReport">
          
      </tbody>
       <tr>
                 <th colspan="7" class="tableTotal">Sub Total</th>
                 <th colspan="1" class="tableTotal"><span id="subTotal"></span></th>
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


    <script>
    $(function(){
     showPrice();
		//function
		function showPrice(){

			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Reports/saleManReport')?>',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
                 
                    var c=0;
                var subTotal=0;
					for(i=0; i<data.length; i++){
					c++;
                     subTotal=parseInt(subTotal) + parseInt(data[i].total);
                        
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
		                        '<td>'+data[i].customerName+'</td>'+
		                        '<td>'+data[i].areaName+'</td>'+
                                '<td>'+data[i].productName+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td>'+data[i].bonus+'</td>'+
                            '<td>'+data[i].total+'</td>'+
                             
                               
                              
                           
                                '</tr>';
					}
					
				    
					
					$('#getSaleManReport').html(html);
                    
					$('#subTotal').html(subTotal);
                 
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
				url: '<?php echo site_url('Reports/saleManReport')?>',
				async: false,
				dataType: 'json',
						success: function(data){

					var html = '';
					var i;
                 
                    var c=0;
                var subTotal=0;
					for(i=0; i<data.length; i++){
					c++;
                     subTotal=parseInt(subTotal) + parseInt(data[i].total);
                        
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
		                        '<td>'+data[i].customerName+'</td>'+
		                        '<td>'+data[i].areaName+'</td>'+
                                '<td>'+data[i].productName+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td>'+data[i].bonus+'</td>'+
                            '<td>'+data[i].total+'</td>'+
                             
                               
                              
                           
                                '</tr>';
					}
					
				    
					
					$('#getSaleManReport').html(html);
                    
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
            window.location.href = "<?php echo site_url('Reports/printCustAcountStatement')?>/" + s_date + "/" + e_date  + "/" + c_id;
       
		 });
       
   });
        
        

    }); 

    </script>

</body>
</html>

