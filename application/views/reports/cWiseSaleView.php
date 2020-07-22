

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company Wise Sale
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Sales</a></li>
        <li class="active">Company Wise Sale</li>
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
    			<h3 class="box-title">Company Wise Sale</h3>
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
                  
  <form method="post" action="<?php echo site_url('Reports/showCustomerOrderHistory');?>" id="myForm" class="no-print">
        <div class="box-body">
        
          <div class="row no-print">
		    <div class="col-md-3">
			<div class="from-group">
                   <label>Company</label>
                    <select id="company_id" class="form-control" name="company_id">
                      <option value="">Select Company</option>
                       <?php
                       $group_id=$_SESSION['group_id'];
                      $qry=$this->db->query("SELECT * FROM  aims_manufacture where mh=$group_id and is_deleted=0");
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
                   <label>Route</label>
                    <select id="route_id" class="form-control" name="route_id">
                      <option value="">Select Route</option>
                       <?php
                       $group_id=$_SESSION['group_id'];
                      $qry=$this->db->query("SELECT * FROM `aims_route` where mh=$group_id and is_deleted=0");
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
            
            
            <div class="col-md-3">
                   <div class="form-group">
                    <label> Area</label>
                    <select name="area_id" id='area_id' class="form-control area_name">
                     <option>Select Area</option>
                    </select>
                    </div>
            </div>
            
            <div class="col-md-3">
               <div class="form-group">
                         <label>Customer</label>
                        <select name="customer_id" id="customer_id" class="form-control customer_name">
                            <option value="">Select Customer</option>
                        </select>
                    </div>
            </div>
          
		
          </div>
           
           
          <div class="row">
			<div class="col-md-3">
               <div class="from-group">
                   <label>Start Date</label>
                    <input type="date" class="form-control datepicker" name="c_date"  value="<?php echo date('Y-m-d'); ?>">
                    </div>
            </div>
            
            <div class="col-md-3">
               <div class="from-group">
                   <label>End Date</label>
                    <input type="date" class="form-control datepicker" name="e_date"  value="<?php echo date('Y-m-d'); ?>">
                    </div>
            </div>
            
            
            <div class="col-md-3">
                   <div class="form-group">
                   <button style="background-color:#00A157;margin-top:25px !important;" type="button" class="btn bg-olive margin" id="btnSearch">Search</button>
                    </div>
            </div>
            
          
          
			<div class="col-md-2">
			
			</div>
          </div>
   
          </div>
          </form>
          
             <div class="alert alert-danger" style="display: none;"></div>
          <div class="table-responsive">   
         <table id="example1" class="table  table-striped table-hover js-basic-example dataTable">
            
                  
                <thead>
                <tr style="background:black;color:white">
                   <th>SR#</th>
                    <th>Comapny Name</th>
                    <th>Brands</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Net Amount</th>
                    </tr>
                    </thead>
             
             <tbody id="showReport">
            </tbody>
            <tr>
                 <th colspan="5" class="tableTotal">Sub Total</th>
                 <th colspan="1" class="tableTotal"><span id="subTotal"></span></th>
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
    </div>
    


  <div class="control-sidebar-bg"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         
    <script>
    $(function(){
     showGroups();
		//function
		function showGroups(){
       
            
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Reports/showCompanyWiseSale')?>',
				async: false,
				dataType: 'json',
                
				success: function(data){
					var html = '';
					var i;
                    var subTotal=0;
                    var c=0;
					for(i=0; i<data.length; i++){
                    var subTotal=subTotal + parseFloat(data[i].totalAmount);
                    
					c++;
						html +='<tr>'+
                        '<td>'+c+'</td>'+
                            '<td>'+data[i].companyName+'</td>'+
				        '<td>'+data[i].brnadName+'</td>'+
                        
                        '<td>'+data[i].totalAmount+'</td>'+
                        '<td>'+data[i].discount+'</td>'+
                        '<td>'+data[i].netAmount+'</td>'+
                        
	          '</tr>';
					}
					$('#showReport').html(html);
                    $('#subTotal').html(subTotal);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
        
        
    }); 

    </script>
   
    <script>
        
    var baseURL= "<?php echo base_url();?>";
    $(document).ready(function(){
     // City change
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
        
        
   $('#btnSearch').click(function(){
          var url = $('#myForm').attr('action');
          var data = $('#myForm').serialize();
 
       //validation      
         var customer_id = $('select[name=customer_id]');
         var area_id = $('select[name=area_id]');
         var route_id= $('select[name=route_id]');
       
       
          var s_date = $('input[name=c_date]');
          var e_date = $('input[name=e_date]');
         
       
       //customer_id=customer_id.val();
        s_date=s_date.val();
      
        e_date=e_date.val();
       c_id=customer_id.val();
     
      
          var result = '';
          if(customer_id.val()==''){
           customer_id.parent().parent().addClass('has-error').val('This Field is Required');
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
				url: '<?php echo site_url('Reports/showCompanyWiseSale')?>',
				async: false,
				dataType: 'json',
                
				success: function(data){
					var html = '';
					var i;
                    var subTotal=0;
                    var c=0;
					for(i=0; i<data.length; i++){
                    var subTotal=subTotal + parseFloat(data[i].totalAmount);
                    
					c++;
						html +='<tr>'+
                        '<td>'+c+'</td>'+
                        '<td>'+data[i].companyName+'</td>'+
				        '<td>'+data[i].brnadName+'</td>'+
                        '<td>'+data[i].totalAmount+'</td>'+
                        '<td>'+data[i].discount+'</td>'+
                        '<td>'+data[i].netAmount+'</td>'+
                        
	          '</tr>';
					}
					$('#showReport').html(html);
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
          
            window.location.href = "<?php echo site_url('Reports/printCompanySale')?>/" + s_date + "/" + e_date  + "/" + c_id;
       
		 });
       
   });
    });
    </script>