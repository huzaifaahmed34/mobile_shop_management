

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
                  <h3 class="box-title">Customer Sale History</h3>
                </div>
          
            <!-- /.box-header -->
            <div class="box-body">
                  
  <form method="post" action="<?php echo site_url('Reports/');?>" id="myForm" class="no-print">
        <div class="box-body">
        
          <div class="row">
		    <div class="col-md-2">
			
			</div>
			
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
          
			<div class="col-md-2">
			
			</div>
          </div>
           
           
          <div class="row">
		    <div class="col-md-2">
			
			</div>
			
			<div class="col-md-2">
               <div class="from-group">
                   <lable>Date</lable>
                    <input type="date" class="form-control datepicker" name="c_date">
                    </div>
            </div>
            
            
            <div class="col-md-3">
                   <div class="form-group">
                   <button style="background-color:#00A157;margin-top:20px !important;" type="button" class="btn bg-olive margin" id="btnSearch">Search</button>
                    </div>
            </div>
            
          
          
			<div class="col-md-2">
			
			</div>
          </div>
   
          </div>
          </form>
          <br>
          <hr> 
             <div class="alert alert-danger" style="display: none;"></div>
          <div class="table-responsive">   
         <table id="example" class="table  table-striped table-hover js-basic-example dataTable">
          <thead>
                <tr style="background:black;color:white">
                    <th>SR#</th>
                    <th>Salesman</th>
                    <th>Product</th>
                    <th>Rate</th>
                    <th>QTY</th>
                    <th>Invoice#</th>
                    <th>Date</th>

                </tr>
                    </thead>
             
             <tbody id="showReport">
            </tbody>

                <tr>
                <td></td>
               <td></td>
                <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td>SubTotal: <h6 id="subTotal"></h6></td>

                </tr>
                    </table>
                    </div>
                     
                     <div class="row">
    		    <div class="col-md-3">
    			
    			</div>
            
                
                <!-- /.col -->
                <div class="col-md-6" >
                 
                </div>
    			<div class="col-md-3" style="text-align: right; padding-top:30px;">
    			 <!-- /.form-group -->
                  <div class="form-group">
                    <button class="btn btn-success no-print" id="btnExport" title="Print" onclick="window.print()"><i class="fas fa-file-pdf"></i></button>
                    <button class="btn btn-success no-print" id="btnExcel" title="Save as Excel"><i class="far fa-file-excel"></i></button>
                  </div>
                  <!-- /.form-group -->
    			
    			</div>
                <!-- /.col -->
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
				url: '<?php echo site_url('Reports/showProductWiseSale')?>',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
                    var subTotal=0;
                    var c=0;
					for(i=0; i<data.length; i++){
                    var subTotal=subTotal + parseFloat(data[i].total);
                    
					c++;
						html +='<tr>'+
                        '<td>'+c+'</td>'+
				        '<td>'+data[i].company_name+'</td>'+
                        '<td>'+data[i].brandName+'</td>'+
                        '<td>'+data[i].product_name+'</td>'+
                        '<td>'+data[i].qty+'</td>'+
                        '<td>'+data[i].bonus+'</td>'+
                        '<td>'+data[i].total+'</td>'+
                        
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
       
   });
    });
    </script>
    
   