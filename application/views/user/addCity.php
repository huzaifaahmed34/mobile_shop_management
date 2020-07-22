
    
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
                        <h4 class="text-themecolor">City</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">City</li>
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
                                <h4 class="card-title">Add City</h4>
                                <form class="floating-labels m-t-40" id="myForm" action="<?php echo site_url('City/saveCity')?>">
                                    <div class="row">

                                        <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="city_code" name="city_code">
                                        <span class="bar"></span>
                                        <label for="city_code">City Code</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="city_name" name="city_name">
                                        <span class="bar"></span>
                                        <label for="a_name">City Name</label>
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <button class="btn btn-info" id="btnAddCity" type="button"><span class="ti-plus"></span> Add</button>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table color-bordered-table success-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>City Code</th>
                                                <th>City Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showcity">
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row" style="float: right;">
                                <div class="form-group">
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" id="btnSavecity"> <i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-warning" id="btnCancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">City List</h4>
                        <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>City Code</th>
                                                <th>City Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="shoCity">
                                            
                                        </tbody>
                                    </table>
                                </div>

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
                <!-- .right-sidebar -->
              
        <div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="cityModal">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Area</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="cityForm">
              <div class="modal-body">
               
               
                
                        <div class="form-group row">
                            <div class="col-md-6">
                          <input type="text" name="txtId" hidden="">
                           <label>City Code:</label>
            <input type="number" class="form-control" placeholder="Enter Area Code" id="code" name="c_code">
                            </div>
                             <div class="col-md-6">
                             
                            <label>City Name:</label>
            <input type="text" class="form-control" placeholder="Enter Area Name" id="c_name" name="c_name">
                            </div>
                        </div>
                       
                     
                  </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnCity" class="btn btn-success">Save</button>
                  
                  </div>
                   </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>



<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                </div>

<!-- footer -->
        <!-- ============================================================== -->
        
    <script>
        $(function () {

               showCity();
        //function
        function showCity(){
        //alert('ok');
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('City/cityList')?>',
                async: false,
                dataType: 'json',
                success: function(data){

                    var html = '';
                    var i;
                    var c=0;
                    for(i=0; i<data.length; i++){
                    c++;
                        html +='<tr>'+
                
                '<td>'+data[i].id+'</td>'+
                '<td>'+data[i].code+'</td>'+
                '<td>'+data[i].name+'</td>'+

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Edit Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/edit.png"></a>'+
                               '<a href="javascript:;" class="zmdi zmdi-delete item-delete hvr-grow"  title="Delete Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/delete.png"></a>'+
                                    '</td>'+
    
                           
                                '</tr>';
                    }
                    $('#shoCity').html(html);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }


var itemListAdd = [];
  var count = 0;
$('#btnAddCity').click(function(){
  
    var city_code = $("input[name=city_code]");
    var city_name = $("input[name=city_name]");
    var result = '';

           if(city_code.val()==''){

        city_code.parent().parent().addClass('has-error');

      }else{

        city_code.parent().parent().removeClass('has-error');

        result +='1';

      }

      if(city_name.val()==''){

        city_name.parent().parent().addClass('has-error');

      }else{

        city_name.parent().parent().removeClass('has-error');

        result +='1';

      }

      if(result=='11'){

        city_code= city_code.val();
        city_name= city_name.val();
        itemListAdd.push([city_code,city_name,count]);

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
    $('#showcity').html(htmlAdd);
          $('#myForm')[0].reset();

      }
  });

$('#showcity').on('click', '.deleteRemove', function() {
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
        $('#myForm')[0].reset();
        $('#showcity').html('');
        itemListAdd=[];
        count=0;
   });

   $('#btnSavecity').click(function(){

          var url = $('#myForm').attr('action');
          // alert(url);

            if(itemListAdd.length>0){
            $.ajax({

                type:'POST',

                url:url,
                
                data:{itemListAdd:itemListAdd},

                datatype:"JSON",

                success:function(responce)

                {    

                $('#myForm')[0].reset();
                $('.alert-success').html('city Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('city Not  Added!').fadeIn().delay(4000).fadeOut('slow');

                }

            });

            }
   });



           //edit
        $('#shoCity').on('click', '.item_edit', function(){
            var id = $(this).attr('data');
            // alert(id);
            $('#cityModal').modal('show');
            $('#cityForm')[0].reset();
            $('#cityForm').attr('action', '<?php echo site_url('City/updateCity')?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url:'<?php echo site_url('City/editCity')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
                    // alert(data.id);
                    $('input[name=txtId]').val(data.id);
                    $('input[name=c_code]').val(data.code);
                    $('input[name=c_name]').val(data.name);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });

            $('#btnCity').click(function(){
            var url = $('#cityForm').attr('action');
            var data = $('#cityForm').serialize();
                    // alert(data);
            
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo site_url('City/updateCity')?>',
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        // alert(responce);
                        if(response.success){
                            $('#Modal_Edit').modal('hide');
                            $('#myForm')[0].reset();
                            if(response.type=='add'){
                                var type = 'added'
                            }else if(response.type=='update'){
                                var type ="updated"
                            }
                            $('.alert-success').html('Account '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                        }else{
                            alert('Error');
                        }
                    }
                });
        });

        $('#shoCity').on('click', '.item-delete', function(){
            var id = $(this).attr('data');
            $('#myModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo site_url('City/deleteCity')?>',
                    data:{id:id},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#myModal').modal('hide');

                            $('.alert-success').html('Record Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showCity();
                        }else{
                            alert('There is Error ');
                        }
                    },
                    error: function(){
                        alert('Error deleting');
                    }
                });
            });
        });

});
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2019 17:30:34 GMT -->
</html>