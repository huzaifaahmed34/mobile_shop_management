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
                        <h4 class="text-themecolor">Quick Sale</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Quick Sale</li>
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
                               <div class="row">

                    <div class="col-10">
                                <h4 class="card-title">Add Quick Sale</h4>
                              </div>
                                <div class="col-2">
                               <button type="button" class="btn btn-success" id='btnChoose'>Choose Product</button>
                              </div>
                            </div>


                                <form class="floating-labels m-t-40" id=form action="<?php echo site_url('Purchase/addPurchase')?>">
                                    <div class="row">
                                        <input name=printvalue id=text type=hidden>
                                       <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
     <select class="form-control" id="customer_id" name="customer_id">
             <?php
              $html=''; 
              $qry=$this->db->query('select * from customer where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->customer_name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                    </div>
                                </div>
                             
                                   <div class="col-md-4">
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
                                  <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="product_code" name=product_code readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Product Code</label>
                                    </div>
                                </div>
                             <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="type" name=type readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Product Type</label>
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="stock" name=stock readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Available Items </label>
                                         <span id=nostock for="c_addr" style="color:red;display: none">No Stock Available </span >
                                    </div>
                                </div>
                                       
                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="price" name=price readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Price</label>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="qty" name=qty>
                                        <span class="bar"></span>
                                        <label for="area_code">Qty</label>
                                         <span id=exceedstock for="c_addr" style="color:red;display: none">You Exceed the Current Stock </span >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="discount" name=discount>
                                        <span class="bar"></span>
                                        <label for="area_code">Discount</label>
                                          <span id=exceeddiscount for="c_addr" style="color:red;display: none">You Exceed the Price </span >
                                    </div>
                                </div>

                                   
                                        <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="net_amount" name=net_amount readonly="" placeholder= " Net Amount">
                                        <span class="bar"></span>
                                      
                                    </div>
                                </div>
                           
     <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="remarks" name=remarks>
                                        <span class="bar"></span>
                                        <label for="c_cnic">Remarks</label>
                                    </div>
</div>
     <div class="col-md-4">
                                     <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="paid" name=paid>
                                        <span class="bar"></span>
                                        <label for="c_cnic">Customer Paid</label>
                                           <span id=exceedpaid for="c_addr" style="color:red;display: none">You Exceed the Price </span >
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
                                                <th>Customer Name</th>
                                                <th>Product Code</th>
                                                    <th>Product Name</th>
                                                     <th> Type</th>
                                               
                                                  <th>Qty</th>
                                                 <th>Price</th>
                                      <th>Discount</th>
                                        <th>Net Amount</th>
                                         <th>Remarks</th>
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
                                       <button type="button" class="btn btn-success" id='btnSave1'> <i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-success" id='btnSave'> <i class="ti-save"></i> Save and Print</button>
                                        <button type="button" id="btnCancel" class="btn btn-warning">Cancel</button>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">Quick Sale List</h4>
          <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                              
                     
                                                <th>Customer Name</th>
                                               <th>Product Code</th>
                                                    <th>Product Name</th>
                                                     <th> Type</th>
                                                 <th> Qty</th>
                                               

                                                 <th>Price</th>
                                      <th>Discount</th>
                                        <th>Net Amount</th>
                                         <th>Remarks</th>
                                                   <th> Action</th>
                                                   <th> Preview</th>
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
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Purchase</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="editForm">
              <div class="modal-body">
               
               <input type="hidden" name="id">
                   
               <input type="hidden" name="hiddenqty">
                
                        <div class=" row">
                              <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
     <select class="form-control" id="customer_id1" name="customer_id1">
             <?php
              $html=''; 
              $qry=$this->db->query('select * from customer where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->customer_name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                    </div>
                                </div>
                             
                                   <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
      <select class="form-control" id="product_id1" name=product_id1>
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
                                  <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="product_code1" name=product_code1 readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Product Code</label>
                                    </div>
                                </div>
                             <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="type1" name=type1 readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Type</label>
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="stock1" name=stock1 readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Available Items </label>
                                         <span id=nostock for="c_addr" style="color:red;display: none">No Stock Available </span >
                                    </div>
                                </div>
                                       
                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="price1" name=price1 readonly="">
                                        <span class="bar"></span>
                                        <label for="c_addr">Price</label>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="qty1" name=qty1>
                                        <span class="bar"></span>
                                        <label for="area_code">Qty</label>
                                         <span id=exceedstock1 for="c_addr" style="color:red;display: none">You Exceed the Current Stock </span >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="discount1" name=discount1>
                                        <span class="bar"></span>
                                        <label for="area_code">Discount</label>
                                          <span id=exceeddiscount1 for="c_addr" style="color:red;display: none">You Exceed the Price </span >
                                    </div>
                                </div>

                                   
                                        <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="net_amount1" name=net_amount1 readonly="" placeholder= " Net Amount">
                                        <span class="bar"></span>
                                      
                                    </div>
                                </div>
                           
     <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="remarks1" name=remarks1>
                                        <span class="bar"></span>
                                        <label for="c_cnic">Remarks</label>
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
<div id="viewProduct" class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Product</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="row">
          <div class=col-md-5 style="margin-bottom: 20px;">
          <input type="name" id=search class="form-control" placeholder="">
          <label>Search By Product Name Or Product Code</label>
                                                      </div>
                             <div class="col-md-12">

                           <div class="table-responsive">   
         <table class="table  table-striped table-hover ">
                                        <thead>
                                            <tr>
                                        <th>#</th>
                                              <th>Product Code</th>
                                                 <th>Product Name</th>
                                                    <th>Category</th>
                                                     <th>Type/Detail</th>
                                                    
                                                      
                                                    <th>Qty</th>
                                                <th>Retail Price</th>
                                            
                                                   <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showProduct">
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div></div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script>


        $(function () {
          $('#search').keyup(function(){
var val=$('#search').val();

 $.ajax({
                type: 'post',

                url: '<?php echo site_url('Product/showProductBySearch')?>',
               data:{val:val},
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
                
                 '<td>'+data[i].qty+'</td>'+
                '<td>'+data[i].price+'</td>'+
           
                

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_add hvr-grow marginRight20px" title="Add Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/add.png"></a>'+
                             
                                    '</td>'+
    
                           
                                '</tr>';
                    }
                    $('#showProduct').html(html);



                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });

          });



          $('#btnChoose').unbind().click(function(){

$('#viewProduct').modal('show');
  $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Product/showProduct')?>',
               
                dataType: 'json',
                 async: false,
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
                
                 '<td>'+data[i].qty+'</td>'+
                '<td>'+data[i].price+'</td>'+
           
                

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_add hvr-grow marginRight20px" title="Add Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/add.png"></a>'+
                             
                                    '</td>'+
    
                           
                                '</tr>';
                    }
                    $('#showProduct').html(html);



                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        


          });


 $('#showProduct').on('click','.item_add', function(){
            var id = $(this).attr('data');
        
$('#viewProduct').modal('hide');


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
  $("select[name=product_id]").val(data[i].id)
$("input[name=price]").val(data[i].price);
$("input[name=product_code]").val(data[i].product_code);

  $("input[name=type]").val(data[i].type);

$("input[name=stock]").val(data[i].qty);

$('input[name=stock]').focus();
$('input[name=price]').focus();
$('input[name=product_code]').focus();
$('input[name=type]').focus();


  }
                
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });

});
function Generator() {};

Generator.prototype.rand =  Math.floor(Math.random() * 26) + Date.now();

Generator.prototype.getId = function() {
   return this.rand++;
};
var idGen =new Generator();

$('input[name=printvalue]').val(idGen.getId());
$('#discount').val(0); 

$('#discount').keyup(function(){

var price=parseInt($('#price').val());
var qty=parseInt($('#qty').val());
var dis=parseInt($('#discount').val());
$('#net_amount').val(parseInt(price*qty)-parseInt(dis));
var net_amount=$('#net_amount').val();
if(dis>net_amount){
    $('#btnAdd').attr('disabled',true);
    $('#exceeddiscount').removeAttr('style','display:none;color:red');
     $('#exceeddiscount').attr('style','color:red');
}
else{
     $('#exceeddiscount').attr('style','display:none;color:red');
   
   $('#btnAdd').removeAttr('disabled',true);
}

});

$('#qty').keyup(function(){
var qty=parseInt($('#qty').val());
var stock=parseInt($('#stock').val());

if(qty>stock){
    $('#btnAdd').attr('disabled',true);
    $('#exceedstock').removeAttr('style','display:none;color:red');
     $('#exceedstock').attr('style','color:red');
}
else{
     $('#exceedstock').attr('style','display:none;color:red');
   
   $('#btnAdd').removeAttr('disabled',true);
}
var dis=$('#discount').val();
var price=$('#price').val();
$('#net_amount').val((price*qty)-dis);

});

$('#paid').keyup(function(){
var net_amount=parseInt($('#net_amount').val());
var paid=parseInt($('#paid').val());

if(paid>net_amount){
    $('#btnAdd').attr('disabled',true);
    $('#exceedpaid').removeAttr('style','display:none;color:red');
     $('#exceedpaid').attr('style','color:red');
}
else{
     $('#exceedpaid').attr('style','display:none;color:red');
   
   $('#btnAdd').removeAttr('disabled',true);
}


});



$('#qty1').keyup(function(){
    
var qty=parseInt($('#qty1').val());
var stock=parseInt($('#stock1').val());

if(qty>stock){
    $('#btnSaveModal').attr('disabled',true);
    $('#exceedstock1').removeAttr('style','display:none;color:red');
     $('#exceedstock1').attr('style','color:red');
}
else{
     $('#exceedstock1').attr('style','display:none;color:red');
   
   $('#btnSaveModal').removeAttr('disabled',true);
}
var dis=$('#discount1').val();
var price=$('#price1').val();
$('#net_amount1').val((price*qty)-dis);

});


$('#discount1').keyup(function(){
var dis=$('#discount1').val();
var price=$('#price1').val();
var qty=$('#qty1').val();
$('#net_amount1').val((price*qty)-dis);
var net_amount=$('#net_amount1').val();
if(dis>net_amount){
    $('#btnSaveModal').attr('disabled',true);
    $('#exceeddiscount1').removeAttr('style','display:none;color:red');
     $('#exceeddiscount1').attr('style','color:red');
}
else{
     $('#exceeddiscount1').attr('style','display:none;color:red');
   
   $('#btnSaveModal').removeAttr('disabled',true);
}

});

$('#product_id').unbind().change(function(){

var id=$('#product_id').val();

      $.ajax({
   type:'get',
   data:{id:id},
   url:"<?php echo site_url('Purchase/changePrice')?>",
   dataType:'json',
   success:function(res){
 
 var html='';

    for(var i=0;i<res.length;i++){
$('input[name=price]').val(res[i].price);

$('input[name=stock]').val(res[i].qty);
$('input[name=type]').val(res[i].type);
$('input[name=product_code]').val(res[i].product_code);
$('input[name=stock]').focus();
$('input[name=price]').focus();
$('input[name=product_code]').focus();
$('input[name=type]').focus();
var dis=$('#discount').val();

var price=$('#price').val();
var qty=$('#qty').val();
var stock=$('#stock').val();
if(qty!=''){
$('#net_amount').val((price*qty)-dis);
}
else{
    $('#net_amount').val(0);
}
if(qty>stock){
    $('#btnAdd').attr('disabled',true);
    $('#exceedstock').removeAttr('style','display:none;color:red');
     $('#exceedstock').attr('style','color:red');
}
else{
     $('#exceedstock').attr('style','display:none;color:red');
   
   $('#btnAdd').removeAttr('disabled',true);
}
}
},
   error:function(){
    alert('error');
   }
    })


});
$('#product_id1').unbind().change(function(){
changeeditprice();
var stock=parseInt($('#stock1').val());
var qty=parseInt($('#qty1').val());
if(qty>stock){
    $('#btnSaveModal').attr('disabled',true);
    $('#exceedstock1').removeAttr('style','display:none;color:red');
     $('#exceedstock1').attr('style','color:red');
}
else{
     $('#exceedstock1').attr('style','display:none;color:red');
   
   $('#btnSaveModal').removeAttr('disabled',true);
}


});


function changeeditprice(){
var id=$('#product_id1').val();

      $.ajax({
   type:'get',
   data:{id:id},
   url:"<?php echo site_url('Purchase/changePrice')?>",
   dataType:'json',
   async:false,
   success:function(res){

 var html='';

    for(var i=0;i<res.length;i++){
       
$('input[name=price1]').val(res[i].price);

$('input[name=type1]').val(res[i].type);
$('input[name=product_code1]').val(res[i].product_code);

$('input[name=stock1]').val(res[i].qty);
var dis=$('#discount1').val();
var price=$('#price1').val();
var qty=$('#qty1').val();

$('#net_amount1').val((price*qty)-dis);
}
},
   error:function(){
    alert('error');
   }
    })
}

var itemListAdd = [];
var count=0;
$('#btnAdd').unbind().click(function(){
  
    var customer_id = $("select[name=customer_id]");
     var paid = $("input[name=paid]");
 
   
    var product_id = $("select[name=product_id]");
    var price = $("input[name=price]");
    var discount = $("input[name=discount]");
 var net_amount = $("input[name=net_amount]");
 var remarks = $("input[name=remarks]");
 var qty = $("input[name=qty]");
var printvalue=$('input[name=printvalue]');
var type=$('input[name=type]');
var product_code=$('input[name=product_code]');

  var customerId = $('select[id=customer_id] option:selected');
  
    var productId = $('select[id=product_id] option:selected');
    var result = '';
    
  if(customer_id.val()==''){

        customer_id.parent().parent().addClass('has-error');

      }else{

        customer_id.parent().parent().removeClass('has-error');

        result +='1';

      }

  if(paid.val()==''){

        paid.parent().parent().addClass('has-error');

      }else{

        paid.parent().parent().removeClass('has-error');

        result +='1';

      }
 
      if(qty.val()==''){

        qty.parent().parent().addClass('has-error');

      }else{

        qty.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(product_id.val()==''){

        product_id.parent().parent().addClass('has-error');

      }else{

        product_id.parent().parent().removeClass('has-error');

        result +='1';

      }

    // alert(cityId.val());
      if(price.val()==''){

        price.parent().parent().addClass('has-error');

      }else{

        price.parent().parent().removeClass('has-error');

        result +='1';

      }

           if(discount.val()==''){

        discount.parent().parent().addClass('has-error');

      }else{

        discount.parent().parent().removeClass('has-error');

        result +='1';

      }

      if(net_amount.val()==''){

        net_amount.parent().parent().addClass('has-error');

      }else{

        net_amount.parent().parent().removeClass('has-error');

        result +='1';

      }

 if(type.val()==''){

        type.parent().parent().addClass('has-error');

      }else{

        type.parent().parent().removeClass('has-error');

        result +='1';

      }

 if(product_code.val()==''){

        product_code.parent().parent().addClass('has-error');

      }else{

        product_code.parent().parent().removeClass('has-error');

        result +='1';

      }







      if(result=='111111111'){
      customer_id=customer_id.val();
type=type.val();
product_id=product_id.val();
price=price.val();
discount=discount.val();
net_amount=net_amount.val();
qty=qty.val();
product_code=product_code.val();
paid=paid.val();
remarks=remarks.val();
customerId=customerId.text();

productId=productId.text();
         printvalue=printvalue.val();
        itemListAdd.push([customer_id,product_code,product_id,price,discount,net_amount,remarks,customerId,type,productId,count,qty,printvalue,paid]);
  
        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {

            htmlAdd +='<tr id='+itemListAdd[iAdd][10]+'>'+
            '<td>'+srNoAdd+'</td>'+
            '<td>'+itemListAdd[iAdd][7]+'</td>'+
            '<td>'+itemListAdd[iAdd][1]+'</td>'+
            '<td>'+itemListAdd[iAdd][9]+'</td>'+
                    '<td>'+itemListAdd[iAdd][8]+'</td>'+
               '<td>'+itemListAdd[iAdd][11]+'</td>'+
               '<td>'+itemListAdd[iAdd][3]+'</td>'+
                 '<td>'+itemListAdd[iAdd][4]+'</td>'+
                   '<td>'+itemListAdd[iAdd][5]+'</td>'+
                     '<td>'+itemListAdd[iAdd][6]+'</td>'+

             
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
                 
         if(itemListAdd[m][10]==m){
       itemListAdd[m]=[];
       };
          }
          else{
              itemListAdd = [];
              
          }
   

        });

   $('#btnCancel').unbind().click(function(){
        $('#form')[0].reset();
            $('#showArea').html('');
        itemListAdd =[];
       

count=0;
$('input[name=printvalue]').val(idGen.getId());
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
var id=itemListAdd[0][12];
window.location.href='<?php echo site_url('Purchase/printInvoice')?>/'+id+'';
 $('#form')[0].reset();
 $('#showArea tr').remove();
 showCustomer();
                $('.alert-success').html('Purchase Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;
$('input[name=printvalue]').val(idGen.getId());
                },

                error:function()

                {

                    $('.alert-danger').html('Purchase Not  Added!').fadeIn().delay(4000).fadeOut('slow');

                }

            });

            }
   });




 $('#btnSave1').unbind().click(function(){

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
                $('.alert-success').html('Purchase Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('Purchase Not  Added!').fadeIn().delay(4000).fadeOut('slow');

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
                url: '<?php echo site_url('Purchase/showPurchase')?>',
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
                '<td>'+data[i].customer_name+'</td>'+
                '<td>'+data[i].product_code
                +'</td>'+
                '<td>'+data[i].product_name+'</td>'+
                  '<td>'+data[i].type+'</td>'+
                
                   '<td>'+data[i].qty+'</td>'+
                 '<td>'+data[i].price+'</td>'+
                   '<td>'+data[i].discount+'</td>'+
                  '<td>'+data[i].net_price+'</td>'+
                '<td>'+data[i].remarks+'</td>'+
                

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Edit Item" data-toggle="tooltip" data="'+data[i].id+' "><img src="<?php echo base_url()?>assets/images/edit.png"></a>'+
                               '<a href="javascript:;" class="zmdi zmdi-delete item-delete hvr-grow"  title="Delete Item" data-toggle="tooltip" data2='+data[i].customer_id+' data="'+data[i].id+'" data3='+data[i].qty+' data4='+data[i].product_id+'><img src="<?php echo base_url()?>assets/images/delete.png"></a>'+
                                  '</td>'+
 '<td>'+
                                 '<a href="javascript:;" class="zmdi zmdi-delete item-print hvr-grow"  data-toggle="tooltip" data="'+data[i].id+'" >Print Preview</a>'+
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
 var customer_id = $(this).attr('data2');
var qty= $(this).attr('data3');
var product_id= $(this).attr('data4');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo site_url('Purchase/deletePurchase')?>',
                    data:{id:id,customer_id:customer_id,product_id:product_id,qty:qty},
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





           //print preview
        $('#showCustomer').on('click', '.item-print', function(){
            var id = $(this).attr('data');
         window.location.href='<?php echo site_url('Purchase/printEditInvoice')?>/'+id+'';
});


                //edit
        $('#showCustomer').on('click', '.item_edit', function(){
            var id = $(this).attr('data');
            $('#editForm')[0].reset();
            // alert(id);
         
            $('#edit_modal').modal('show');
        
            $('#editForm').attr('action', '<?php echo site_url('Areas/updateArea')?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url:'<?php echo site_url('Purchase/editPurchase')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
    for(var i=0;i<data.length;i++){
             $('select[name=customer_id1]').val(data[i].customer_id);
         
            $('select[name=product_id1]').val(data[i].product_id);
     changeeditprice();
    $("input[name=price1]").val(data[i].price);
    $("input[name=discount1]").val(data[i].discount);
   $("input[name=net_amount1]").val(data[i].net_price);
 $('input[name=remarks1]').val(data[i].remarks);
  $('input[name=hiddenqty]').val(data[i].qty);
  $('input[name=qty1]').val(data[i].qty);
   

   
 $("input[name=id]").val(data[i].id);
   
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
                    url: '<?php echo site_url('Purchase/updatePurchase')?>',
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