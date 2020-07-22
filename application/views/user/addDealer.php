                       
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
                        <h4 class="text-themecolor">Dealer</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dealer</li>
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
                                <h4 class="card-title">Add Dealer</h4>
                                <form class="floating-labels m-t-40" id=form action="<?php echo site_url('Dealer/AddDealer')?>">
                                    <div class="row">
                                       <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
     <select class="form-control" id="city_id" name="city_id">
             <option value="">
                 Select City
             </option> <?php
              $html=''; 
              $qry=$this->db->query('select * from city where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
      <select class="form-control" id="area_id" name=area_id>
                         <option value="">Select Area</option>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                        <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="c_name" name=c_name>
                                        <span class="bar"></span>
                                        <label for="c_name">Dealer Name</label>
                                    </div>
                        </div>

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="c_addr" name=c_addr>
                                        <span class="bar"></span>
                                        <label for="c_addr">Dealer Address</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="c_mobile" name=c_mobile>
                                        <span class="bar"></span>
                                        <label for="area_code">Dealer Mobile</label>
                                    </div>
                                </div>
                                    </div>

                            <div class="row">
                                        <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="c_cnic" name=c_cnic>
                                        <span class="bar"></span>
                                        <label for="c_cnic">Dealer CNIC</label>
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
                                                <th>Dealer Name</th>
                                                <th>Dealer Address</th>
                                                <th>Dealer Mobile</th>
                                                 <th>Dealer Cnic</th>
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
                               <h4 class="card-title">Dealer List</h4>
                            <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Dealer Name</th>
                                                <th>Address</th>
                                                <th>Mobile No</th>
                                                 <th>Cnic</th>
                                                 <th> City</th>
                                                 <th> Area</th>
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
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Dealer</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="editForm">
              <div class="modal-body">
               
               <input type="hidden" name="id">
                
                        <div class=" row">
                                         <div class="col-md-6">
                                    <div class="form-group ">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
                                            <label for="c_addr">Dealer City</label>
     <select class="form-control" id="city_id1" name="city_id1">
             <option value="">
                 Select City
             </option> <?php
              $html=''; 
              $qry=$this->db->query('select * from city where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                               <label for="c_addr">Dealer Area</label>
      <select class="form-control" id="area_id1" name=area_id1>
                         <option value="">Select Area</option>
                                        
                                        </select>
                                      
                                    </div>
                                </div>
                           
                                        <div class="col-md-6">
                                    <div class="form-group ">
                                            <label for="c_name">Dealer Name</label>
                                        <input type="text" class="form-control" id="c_name1" name=c_name1>
                                        <span class="bar"></span>
                                    
                                    </div>
                        </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                          <label for="c_addr">Dealer Address</label>
                                        <input type="text" class="form-control" id="c_addr1" name=c_addr1>
                                        <span class="bar"></span>
                                      
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  ">
                                            <label for="area_code">Dealer Mobile</label>
                                        <input type="text" class="form-control" id="c_mobile1" name=c_mobile1>
                                        <span class="bar"></span>
                                    
                                    </div>
                                </div>
                                   
                                        <div class="col-md-6">
                                    <div class="form-group  ">
                                          <label for="c_cnic">Dealer CNIC</label>
                                        <input type="text" class="form-control" id="c_cnic1" name=c_cnic1>
                                        <span class="bar"></span>
                                      
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

$('#city_id').change(function(){

   var id=$('#city_id').val();

      $.ajax({
   type:'get',
   data:{id:id},
   url:"<?php echo site_url('Customer/changeCity')?>",
   dataType:'json',
   success:function(res){
 

 var html='';
  html+='<option value=0>Select Area</option>';
    for(var i=0;i<res.length;i++){

    html+='<option value='+res[i].id+'>'+res[i].area_name+'</option>';




$('#area_id').html(html);
}




   },
   error:function(){
    alert('error');
   }



    })


});

$('#city_id1').change(function(){
changeeditcity();
});

function changeeditcity(){
var id=$('#city_id1').val();

      $.ajax({
   type:'get',
   data:{id:id},
   url:"<?php echo site_url('Customer/changeCity')?>",
   dataType:'json',
   success:function(res){
 
 var html='';

    for(var i=0;i<res.length;i++){

    html+='<option value='+res[i].id+'>'+res[i].area_name+'</option>';




$('#area_id1').html(html);
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
  



    var area_id = $("select[name=area_id]");
 
    var c_name = $("input[name=c_name]");
    var c_addr = $("input[name=c_addr]");
    var c_mobile = $("input[name=c_mobile]");
    var c_cnic = $("input[name=c_cnic]");

    
  var cityId = $('select[id=city_id] option:selected');
    var result = '';
    
  if(c_addr.val()==''){

        c_addr.parent().parent().addClass('has-error');

      }else{

        c_addr.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(c_mobile.val()==''){

        c_mobile.parent().parent().addClass('has-error');

      }else{

        c_mobile.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(c_cnic.val()==''){

        c_cnic.parent().parent().addClass('has-error');

      }else{

        c_cnic.parent().parent().removeClass('has-error');

        result +='1';

      }

    // alert(cityId.val());
      if(cityId.val()==''){

        cityId.parent().parent().addClass('has-error');

      }else{

        cityId.parent().parent().removeClass('has-error');

        result +='1';

      }

           if(area_id.val()==''){

        area_id.parent().parent().addClass('has-error');

      }else{

        area_id.parent().parent().removeClass('has-error');

        result +='1';

      }

      if(c_name.val()==''){

        c_name.parent().parent().addClass('has-error');

      }else{

        c_name.parent().parent().removeClass('has-error');

        result +='1';

      }







      if(result=='111111'){
        cityId = cityId.val();
        area_id= area_id.val();
        c_name= c_name.val();
          c_addr= c_addr.val();
            c_mobile= c_mobile.val();
              c_cnic= c_cnic.val();
                var image=0;
         
        itemListAdd.push([c_name,cityId,area_id,c_addr,c_mobile,c_cnic,image,count]);
  
        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {

            htmlAdd +='<tr id='+itemListAdd[iAdd][7]+'>'+
            '<td>'+srNoAdd+'</td>'+
            '<td>'+itemListAdd[iAdd][0]+'</td>'+
            '<td>'+itemListAdd[iAdd][3]+'</td>'+
            '<td>'+itemListAdd[iAdd][4]+'</td>'+
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
                 
         if(itemListAdd[m][7]==m){
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
                $('.alert-success').html('Dealer Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('Dealer Not  Added!').fadeIn().delay(4000).fadeOut('slow');

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
                url: '<?php echo site_url('Dealer/showDealer')?>',
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
                '<td>'+data[i].address+'</td>'+
                '<td>'+data[i].phone+'</td>'+
                 '<td>'+data[i].cnic+'</td>'+
                   '<td>'+data[i].name+'</td>'+
                  '<td>'+data[i].area_name+'</td>'+
                

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
                    url: '<?php echo site_url('Dealer/deleteDealer')?>',
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
                url:'<?php echo site_url('Dealer/editDealer')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
    for(var i=0;i<data.length;i++){
         $('select[name=city_id1]').val(data[i].city_id);
         changeeditcity();
    $("input[name=c_addr1]").val(data[i].address);
    $("input[name=c_mobile1]").val(data[i].phone);
   $("input[name=c_cnic1]").val(data[i].cnic);
 $('select[name=city_id1]').val(data[i].city_id);
 $("input[name=c_name1]").val(data[i].name);
 $("input[name=id]").val(data[i].id);
     $("select[name=area_id1]").val(data[i].area_id);
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
                    url: '<?php echo site_url('Dealer/updateDealer')?>',
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