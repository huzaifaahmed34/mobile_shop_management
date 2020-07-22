<!-- Page wrapper  -->
        <!-- ============================================================== -->
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
                        <h4 class="text-themecolor">Product Type</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Product Type</li>
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
                                <div class="alert alert-success" hidden=""></div>
                                <div class="alert alert-danger" hidden=""></div>
                                <h4 class="card-title">Add Product Type</h4>
                                <form class="floating-labels m-t-40" id=form action="<?php echo site_url('Product/addProductType')?>">
                                    <div class="row">
                           
                                        <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="product_type" name=product_type>
                                        <span class="bar"></span>
                                        <label for="product_type">Name</label>
                                    </div>
                        </div>

                                <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="code" name=code>
                                        <span class="bar"></span>
                                        <label for="c_addr">Code</label>
                                    </div>
                                </div>

                         

                             
                                    
                                    <div class="col-md-3" style="float: right;">
                                    <div class="form-group m-b-40">
                    <button class="btn btn-info " type=button id=btnAdd><span class="ti-plus"></span> Add</button>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table color-bordered-table success-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                              
                                                   <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showArea">
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row" style="float: right;">
                                <div class="form-group">
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" id='btnSave'> <i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-warning" id=btnCancel>Cancel</button>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">Product Type List</h4>
                                <div class="table color-bordered-table success-bordered-table table-responsive">
                                    <table class="table">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                
                                                
                                                   <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showCustomer">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


<!------Edit Customer------------------>


<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit_modal">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Product Type</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="editForm">
              <div class="modal-body">
               
               <input type="hidden" name="id">
                
                        <div class=" row">
                                        
      <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="product_type1" name=product_type1>
                                        <span class="bar"></span>
                                        <label for="product_type">Name</label>
                                    </div>
                        </div>

                                <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="code1" name=code1>
                                        <span class="bar"></span>
                                        <label for="c_addr">Code</label>
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

<div id="deleteModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete this record?
                                            </div>
                                            <div class="modal-footer">
                                               <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script>
        $(function () {


var itemListAdd = [];


    var count = 0;
$('#btnAdd').unbind().click(function(){
  



  
    
   
    var product_type = $("input[name=product_type]");
    var code = $("input[name=code]");
 
    var result = '';
    
  if(product_type.val()==''){

        product_type.parent().parent().addClass('has-error');

      }else{

        product_type.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(code.val()==''){

        code.parent().parent().addClass('has-error');

      }else{

        code.parent().parent().removeClass('has-error');

        result +='1';

      }
  





      if(result=='11'){
        code = code.val();
        product_type= product_type.val();
     
               
        itemListAdd.push([product_type,code,count]);

        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {

            htmlAdd +='<tr id='+itemListAdd[iAdd][2]+'>'+
            '<td>'+srNoAdd+'</td>'+
            '<td>'+itemListAdd[iAdd][0]+'</td>'+
            '<td>'+itemListAdd[iAdd][1]+'</td>'+
            '<td>' +
            '<a class="deleteRemove zmdi zmdi-delete item-delete" style="color:red;cursor: pointer;">' +'Remove' +'</a>' +
            '</td>'
                '</tr>';
                  srNoAdd++;
        }
    }
    count++;
    $('#showArea').html(htmlAdd);
          $('#form')[0].reset();

      }
  });

$('#showArea').on('click', '.deleteRemove', function() {
         $(this).parent().parent('tr').remove();
         var m=$(this).parent().parent('tr').attr('id');
     
          
          if(itemListAdd.length > 0){
                 
         if(itemListAdd[m][2]==m){
       itemListAdd[m]=[];
       };
          }
          else{
              itemListAdd = [];
              
          }
   

        });

   $('#btnCancel').click(function(){
        $('#form')[0].reset();
        $('#showArea').html('');
        count=0;
        itemListAdd=[];
   });

   $('#btnSave').unbind().click(function(){

          var url = $('#form').attr('action');
          // alert(url);
        
            if(itemListAdd.length>0){
                // alert(itemListAdd);
            $.ajax({

                type:'POST',

                url:url,
                
                data:{itemListAdd:itemListAdd},

                datatype:"JSON",

                success:function(responce)

                {    

 $('#form')[0].reset();
 $('#showArea tr').remove();
 showProductType();
                $('.alert-success').html('Customer Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('Customer Not  Added!').fadeIn().delay(4000).fadeOut('slow');

                }

            });

            }
   });


   showProductType();
        //function
        function showProductType(){
        //alert('ok');
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Product/showProductType')?>',
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
                  '<td>'+data[i].code+'</td>'+
                

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Edit Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/edit.png"></a>'+
                               '<a href="javascript:;" class="zmdi zmdi-delete item-delete hvr-grow"  title="Delete Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/delete.png"></a>'+
                                    '</td>'+
    
                           
                                '</tr>';
                    }
                    $('#showCustomer').html(html);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }

        $('#showCustomer').on('click', '.item-delete', function(){
            var id = $(this).attr('data');

            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo site_url('Product/deleteProductType')?>',
                    data:{id:id},
                    dataType: 'json',
                    success: function(response){
                     
                            $('#deleteModal').modal('hide');

                            $('.alert-success').html('Record Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showProductType();
                  
                    },
                    error: function(){
                        alert('Error deleting');
                    }
                });
            });
        });

                //edit
        $('#showCustomer').on('click', '.item_edit', function(){
            var id = $(this).attr('data');
            // alert(id);
         
            $('#edit_modal').modal('show');
        
           
            $.ajax({
                type: 'ajax',
                method: 'get',
                url:'<?php echo site_url('Product/editProductType')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
    for(var i=0;i<data.length;i++){
          $("input[name=id]").val(data[i].id);
    $("input[name=code1]").val(data[i].code);
    $("input[name=product_type1]").val(data[i].name);
 
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
                    method: 'post',
                    url: '<?php echo site_url('Product/updateProductType')?>',
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        // alert(responce);
                      
                            $('#edit_modal').modal('hide');
                            $('#editForm')[0].reset();
                           showProductType();
                            $('.alert-success').html('Account updated successfully').fadeIn().delay(4000).fadeOut('slow');
              
                       
                    }
                });
        });

});
    </script>