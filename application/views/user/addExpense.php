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
                        <h4 class="text-themecolor">Expense</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Expense</li>
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
                                <h4 class="card-title">Add Expense</h4>
                                <form class="floating-labels m-t-40" id=form action="<?php echo site_url('Expense/addExpense')?>">
                                    <div class="row">
                                     

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="expense_name" name=expense_name>
                                        <span class="bar"></span>
                                        <label for="c_addr">Expense Name</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="number" class="form-control" id="expense_amount" name=expense_amount>
                                        <span class="bar"></span>
                                        <label for="area_code">Expense Amount</label>
                                    </div>
                                </div>
                                  

                                        <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="date" class="form-control" id="date" name=date value="<?php echo date('Y-m-d')?>">
                                        <span class="bar"></span>
                                        <label for="c_cnic">Date</label>
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
                                              
                                                <th>Expense Name</th>
                                                <th>Expense Amount</th>
                                                 <th>Date</th>
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
                                        <button type="button" id="btnCancel" class="btn btn-warning">Cancel</button>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">Expense List</h4>
                             <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                       <thead>
                                            <tr>
                                                 <th>#</th>
                                             
                                                <th>Expense Name</th>
                                                <th>Expense Amount</th>
                                                 <th>Date</th>
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
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit 
                                                Expense</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="editForm">
              <div class="modal-body">
               
               <input type="hidden" name="id">
                
                        <div class=" row">
                                    

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="expense_name1" name=expense_name1>
                                        <span class="bar"></span>
                                        <label for="c_addr">Expense Name</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="expense_amount1" name=expense_amount1>
                                        <span class="bar"></span>
                                        <label for="area_code">Expense Amount</label>
                                    </div>
                                </div>
                                  

                                        <div class="col-md-4">
                                    <div class="form-group ">
                                        <input type="date" class="form-control" id="date1" name=date1 value="">
                                        <span class="bar"></span>
                                        <label for="c_cnic">Date</label>
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
var count=0;
$('#btnAdd').unbind().click(function(){
  






    var expense_name = $("input[name=expense_name]");
    var expense_amount = $("input[name=expense_amount]");
    var date = $("input[name=date]");

    var result = '';
    
 
  if(expense_name.val()==''){

        expense_name.parent().parent().addClass('has-error');

      }else{

        expense_name.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(expense_amount.val()==''){

        expense_amount.parent().parent().addClass('has-error');

      }else{

        expense_amount.parent().parent().removeClass('has-error');

        result +='1';

      }

   






      if(result=='11'){
     
        expense_amount= expense_amount.val();
        expense_name= expense_name.val();
       
          date= date.val();
        
         
        itemListAdd.push([0,0,expense_amount,expense_name,count,date]);
  
        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {

            htmlAdd +='<tr id='+itemListAdd[iAdd][4]+'>'+
            '<td>'+srNoAdd+'</td>'+
           
            '<td>'+itemListAdd[iAdd][3]+'</td>'+
            '<td>'+itemListAdd[iAdd][2]+'</td>'+
             '<td>'+itemListAdd[iAdd][5]+'</td>'+
            
             
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
                 
         if(itemListAdd[m][4]==m){
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
                $('.alert-success').html('Expense Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('Expense Not  Added!').fadeIn().delay(4000).fadeOut('slow');

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
                url: '<?php echo site_url('Expense/showExpense')?>',
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
                '<td>'+data[i].amount+'</td>'+
                 '<td>'+data[i].date+'</td>'+
                  
                

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
                    url: '<?php echo site_url('Expense/deleteExpense')?>',
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
        
            $('#editForm').attr('action', '<?php echo site_url('Areas/updateArea')?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url:'<?php echo site_url('Expense/editExpense')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
    for(var i=0;i<data.length;i++){
         
    $("input[name=expense_name1]").val(data[i].name);
    $("input[name=expense_amount1]").val(data[i].amount);
   $("input[name=date1]").val(data[i].date);
 
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
                    url: '<?php echo site_url('Expense/updateExpense')?>',
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