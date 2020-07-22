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
                        <h4 class="text-themecolor">Product</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
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
                                <h4 class="card-title">Add Product</h4>
                                <form class="floating-labels m-t-40" id=form action="<?php echo site_url('Product/addProduct')?>">
                                    <div class="row">
                                  
                           <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="p_code"  name=p_code>
                                        <span class="bar"></span>
                                        <label for="c_name">Product Code</label>
                                    </div>
                        </div>
                           
                                        <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="p_name" name=p_name>
                                        <span class="bar"></span>
                                        <label for="c_name">Product Name</label>
                                    </div>
                        </div>
                           


                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="category" name=category>
                                        <span class="bar"></span>
                                        <label for="c_addr">Category</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="type" name=type>
                                        <span class="bar"></span>
                                        <label for="c_addr">Type / Detail</label>
                                    </div>
                                </div>
                                     <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
     <select class="form-control" id="dealer" name="dealer">
             <option value="">
                 Select Dealer
             </option> <?php
              $html=''; 
              $qry=$this->db->query('select * from dealer where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                    </div>
                                </div>
                             <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="number" class="form-control" id="purchase_price" name=purchase_price>
                                        <span class="bar"></span>
                                        <label for="area_code">Purchase Price</label>
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="number" class="form-control" id="qty" name=qty>
                                        <span class="bar"></span>
                                        <label for="c_name">Qty</label>
                                    </div>
                        </div>
  
                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="number" class="form-control" id="price" name=price>
                                        <span class="bar"></span>
                                        <label for="area_code">Retail Price</label>
                                    </div>
                                </div>
                                 
                    
                                    
                                    <div class="col-md-3" style="float: right;">
                                    <div class="form-group m-b-40">
                    <button class="btn btn-info " type=button id=btnAdd><span class="ti-plus"></span> Add</button>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                            <div class="col-md-12  table-responsive">
 <table class="table color-bordered-table success-bordered-table ">
                                        <thead>
                                            <tr>
                                        <th>#</th>
                                              <th>Product Code</th>
                                                 <th>Product Name</th>
                                                    <th>Category</th>
                                                     <th>Type/Detail</th>
                                                      <th>Company/Dealer</th>
                                                       <th>Purchase Price</th>
                                                    <th>Qty</th>
                                                <th>Retail Price</th>
                                            
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
                               <h4 class="card-title">Product List</h4>
                               <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                         <th>#</th>
                                              <th>Product Code</th>
                                                 <th>Product Name</th>
                                                    <th>Category</th>
                                                     <th>Type/Detail</th>
                                                      <th>Company/Dealer</th>
                                                       <th>Purchase Price</th>
                                                    <th>Qty</th>
                                                <th>Retail Price</th>
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
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Product</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="editForm">
              <div class="modal-body">
               
               <input type="hidden" name="id">
                
                        <div class=" row">
                                      <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="p_code1"  name=p_code1>
                                        <span class="bar"></span>
                                        <label for="c_name">Product Code</label>
                                    </div>
                        </div>
                           
                                        <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="p_name1" name=p_name1>
                                        <span class="bar"></span>
                                        <label for="c_name">Product Name</label>
                                    </div>
                        </div>
                           


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="category1" name=category1>
                                        <span class="bar"></span>
                                        <label for="c_addr">Category</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="type1" name=type1>
                                        <span class="bar"></span>
                                        <label for="c_addr">Type / Detail</label>
                                    </div>
                                </div>
                                     <div class="col-md-4">
                                    <div class="form-group ">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
     <select class="form-control" id="dealer1" name="dealer1">
             <option value="">
                 Select Dealer
             </option> <?php
              $html=''; 
              $qry=$this->db->query('select * from dealer where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                    </div>
                                </div>
                             
                                 <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="qty1" name=qty1>
                                        <span class="bar"></span>
                                        <label for="c_name">Qty</label>
                                    </div>
                        </div>
  <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="purchase_price1" name=purchase_price1>
                                        <span class="bar"></span>
                                        <label for="area_code">Purchase Price</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="price1" name=price1>
                                        <span class="bar"></span>
                                        <label for="area_code">Retail Price</label>
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
  




  var p_code = $("input[name=p_code]");
var dealername = $("#dealer  option:selected").text();
 var qty = $("input[name=qty]");
    var p_name = $("input[name=p_name]");
    var category = $("input[name=category]");
    var price = $("input[name=price]");
   
    var purchase_price = $("input[name=purchase_price]");
    var type = $("input[name=type]");

   var dealer = $("select[name=dealer]");
    var result = '';

if(purchase_price.val()==''){

        purchase_price.parent().parent().addClass('has-error');

      }else{

        purchase_price.parent().parent().removeClass('has-error');

        result +='1';

      }  
      if(type.val()==''){

        type.parent().parent().addClass('has-error');

      }else{

        type.parent().parent().removeClass('has-error');

        result +='1';

      }  
  if(dealer.val()==''){

        dealer.parent().parent().addClass('has-error');

      }else{

        dealer.parent().parent().removeClass('has-error');

        result +='1';

      }    
  if(p_code.val()==''){

        p_code.parent().parent().addClass('has-error');

      }else{

        p_code.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(p_name.val()==''){

        p_name.parent().parent().addClass('has-error');

      }else{

        p_name.parent().parent().removeClass('has-error');

        result +='1';

      }
        if(qty.val()==''){

        qty.parent().parent().addClass('has-error');

      }else{

        qty.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(category.val()==''){

        category.parent().parent().addClass('has-error');

      }else{

        category.parent().parent().removeClass('has-error');

        result +='1';

      }

    // alert(cityId.val());
      if(price.val()==''){

        price.parent().parent().addClass('has-error');

      }else{

        price.parent().parent().removeClass('has-error');

        result +='1';

      }




      if(result=='11111111'){
       

p_code=p_code.val();

qty=qty.val();
p_name=p_name.val();
category=category.val();
price=price.val();
purchase_price=purchase_price.val();
type=type.val();
dealer=dealer.val();
itemListAdd.push([dealer,p_name,category,price,0,count,dealername,qty,type,purchase_price,p_code]);
 
        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {
                    
            htmlAdd +='<tr id='+itemListAdd[iAdd][5]+'>'+
            '<td>'+srNoAdd+'</td>'+
            '<td>'+itemListAdd[iAdd][10]+'</td>'+
            '<td>'+itemListAdd[iAdd][1]+'</td>'+
              '<td>'+itemListAdd[iAdd][2]+'</td>'+
              '<td>'+itemListAdd[iAdd][8]+'</td>'+
                '<td>'+itemListAdd[iAdd][6]+'</td>'+
                  '<td>'+itemListAdd[iAdd][9]+'</td>'+
                    '<td>'+itemListAdd[iAdd][7]+'</td>'+
            '<td>'+itemListAdd[iAdd][3]+'</td>'+
            
           
            
             
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
                 
         if(itemListAdd[m][5]==m){
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
 showCustomer();
                $('.alert-success').html('Product Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('Product Not  Added!').fadeIn().delay(4000).fadeOut('slow');

                }

            });

            }
   });


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
           
                '<td>'+data[i].product_code+'</td>'+
                  '<td>'+data[i].name+'</td>'+
                 '<td>'+data[i].category+'</td>'+
                '<td>'+data[i].type+'</td>'+
                 '<td>'+data[i].dealer+'</td>'+
                  '<td>'+data[i].purchase_price+'</td>'+
                 '<td>'+data[i].qty+'</td>'+
                '<td>'+data[i].price+'</td>'+
           
                

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
                    url: '<?php echo site_url('Product/deleteProduct')?>',
                    data:{id:id},
                    dataType: 'json',
                    success: function(response){
                     
                            $('#deleteModal').modal('hide');

                            $('.alert-success').html('Record Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showCustomer();
                  
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
                url:'<?php echo site_url('Product/editProduct')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
    for(var i=0;i<data.length;i++){
 
 $("input[name=id]").val(data[i].id);
  $("select[name=dealer1]").val(data[i].dealer_id)
$("input[name=p_name1]").val(data[i].name);
$("input[name=p_code1]").val(data[i].product_code);
 $("input[name=price1]").val(data[i].price);
  $("input[name=category1]").val(data[i].category);
  $("input[name=type1]").val(data[i].type);
  $("input[name=purchase_price1]").val(data[i].purchase_price);
 
$("input[name=qty1]").val(data[i].qty);




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
                    url: '<?php echo site_url('Product/updateProduct')?>',
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        // alert(responce);
                      
                            $('#edit_modal').modal('hide');
                            $('#editForm')[0].reset();
                           showCustomer();
                            $('.alert-success').html('Account updated successfully').fadeIn().delay(4000).fadeOut('slow');
              
                       
                    }
                });
        });

});
    </script>