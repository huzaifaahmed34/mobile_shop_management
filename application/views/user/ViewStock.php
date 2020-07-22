
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Total Stock</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Total Stock</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-success" style="display: none;"></div>
                                <div class="alert alert-danger" style="display: none;"></div>
                                <h4 class="card-title">View Stock</h4>
                               
                                    <div class="row">

                                    <div class=col-md-3>
                                    </div>
                                   <div class="col-md-5">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
      <select class="form-control" id="product_id" name=product_id>
                         <option value="">Select Product</option>
                         <?php
                              $html=''; 
              $qry=$this->db->query('select * from product where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->name.'</option>';
                  echo $html;
              }

 ?>
                      </select>
                                    </div>
                                </div>

                                    <div class="col-md-2">
                                    <div class="form-group m-b-40">
                                        <button class="btn btn-info" id="btnAdd" type="button"></span> Search By Product</button>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                     <th>#</th>
                                              <th>Product Name</th>
                                              <th>P Code</th>
                                                  <th>Category</th>
                                                 
                                                   
                                                    <th>Qty</th>
                                                <th>Unit Price</th>
                                                 <th>Total Price</th>
                                             
                                               <th>Add Quantity</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody id="showcity">
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row" style="float: right;">
                                  <div class=col-md-12>
                                <div class="form-group">
                                    <div class="form-actions">
                                       
                                        <button type="button" class="btn btn-warning" id="btnCancel">Cancel</button>
                                         
                                    </div></div>
                                </div>
                            </div>
                                </form>
                            
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
 


<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit_modal">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Add Quantity</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="editForm">
              <div class="modal-body">
               
               <input type="hidden" name="id">
                
                        <div class=" row">
                                        
      <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="quantity" name=quantity readonly>
                                        <span class="bar"></span>
                                        <label for="product_type" >Quantity</label>
                                    </div>
                        </div>

                                <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="qty" name=qty>
                                        <span class="bar"></span>
                                        <label for="c_addr">New Quantity</label>
                                    </div>
                                </div>

                               
                     
                     </div>
                  </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSaveModal" class="btn btn-success">Save</button>
                  
                  </div>
                   </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

        <!-- ============================================================== -->
    <script>
    $(function(){
    	//function



       var list=[];
        showCustomer();
        //function
        function showCustomer(){
        //alert('ok');
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Product/showProduct')?>',
                async: false,
                dataType: 'json',
                success: function(data){

                    var html = '';
                    var i;
                    var sno=0;
                     
                    var c=0;
                    for(i=0; i<data.length; i++){
                    
                    sno++;
                        html +='<tr>'+
                '<td>'+sno+'</td>'+
                '<td>'+data[i].name+'</td>'+
               '<td>'+data[i].product_code+'</td>'+
               
             '<td>'+data[i].category+'</td>'+
           
            '<td>'+data[i].qty+'</td>'+
                '<td>'+data[i].price+'</td>'+
               
                 '<td>'+parseInt(data[i].price)*parseInt(data[i].qty)+'</td>'+
            

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Add Quantity" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/add.png"></a>'+
                             
                                    '</td>'+
    
                           
                                '</tr>';
                    }
                    $('#showcity').html(html);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }




       $('#printReport').click(function(){

  $.ajax({
       
        type:'post',
        url: '<?php echo site_url('Report/SessionList')?>',
        data:{'list':list},
       
        datatype: 'json',
        success: function(data){
window.location.href='<?php echo site_url('Report/port')?>';
        },
        error:function(){
          alert('no');
        }

       });
});
		function showReport(){
        var product_id=$('select[name=product_id]').val();
             
             
			$.ajax({
				type: 'ajax',
        method:'get',
				url: '<?php echo site_url('Product/searchProduct')?>',
        data:{'product_id':product_id},
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
		                      '<td>'+data[i].name+'</td>'+
               '<td>'+data[i].product_code+'</td>'+
               
             '<td>'+data[i].category+'</td>'+
             
                 '<td>'+data[i].qty+'</td>'+
                '<td>'+data[i].price+'</td>'+
               '<td>'+parseInt(data[i].price)*parseInt(data[i].qty)+'</td>'+
            

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Add Quantity" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/add.png"></a>'+
                             
                                    '</td>'+
                           '</tr>';
                                
					}
					
                   
					$('#showcity').html(html);
                 
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}





        function showProduct(){
        var product_id=$('select[name=product_id]').val();
            
            
             
            $.ajax({
                type: 'ajax',
        method:'get',
                url: '<?php echo site_url('Product/searchProduct1')?>',
        data:{'product_id':product_id},
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
                              '<td>'+data[i].name+'</td>'+
                  '<td>'+data[i].product_code+'</td>'+
               
             '<td>'+data[i].category+'</td>'+
             
                 '<td>'+data[i].qty+'</td>'+
                '<td>'+data[i].price+'</td>'+
                 '<td>'+parseInt(data[i].price)*parseInt(data[i].qty)+'</td>'+
            
                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Add Quantity" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/add.png"></a>'+
                             
                                    '</td>'+
                           '</tr>';
                                
                    }
                    
                   
                    $('#showcity').html(html);
                 
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }
        
      

   $('#btnAddCity').unbind().click(function(){
   
        showReport();
   }); 


   $('#btnAdd').unbind().click(function(){
   
        showProduct();
   }); 
        
        $('#btnCancel').click(function(){
$('#showcity').html('');
$('#from_date').val('');
$('input[name=to_date]').val('');
        });


  $('#showcity').on('click', '.item_edit', function(){
            var id = $(this).attr('data');
            // alert(id);
         
            $('#edit_modal').modal('show');
        
           
            $.ajax({
                type: 'ajax',
                method: 'get',
                url:'<?php echo site_url('Product/editProduct')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
    for(var i=0;i<data.length;i++){
          $("input[name=id]").val(data[i].id);
    $("input[name=quantity]").val(data[i].qty);
 
  }
                
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });
        

                $('#btnSaveModal').unbind().click(function(){
            var url = $('#editForm').attr('action');
            var data = $('#editForm').serialize();
                    // alert(data);
    
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo site_url('Product/updateQty')?>',
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        // alert(responce);
                      
                            $('#edit_modal').modal('hide');
                            $('#editForm')[0].reset();
                           showCustomer();
                            $('.alert-success').html('Qty updated successfully').fadeIn().delay(4000).fadeOut('slow');
              
                       
                    }
                });
        });

    })
    </script>

</body>
</html>

