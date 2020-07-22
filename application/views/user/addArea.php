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
                        <h4 class="text-themecolor">Areas</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Areas</li>
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
                                <h4 class="card-title">Add Areas</h4>
                                <form class="floating-labels m-t-40" id="myForm" action="<?php echo site_url('Areas/saveAreas')?>">
                                    <div class="row">

                                        <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
                                        <select class="form-control" id="city_id" name="city_id">
                                            <option>Select City</option>
                                            <?php
                                            $qry=$this->db->query("SELECT * FROM `city` where is_deleted=0");
                                                $resForDD=$qry->result();
                                                foreach($resForDD AS $row)
                                                {
                                                echo "<option value='$row->id'>$row->name</option>";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                        <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="area_code" name="area_code">
                                        <span class="bar"></span>
                                        <label for="area_code">Area Code</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="area_name" name="area_name">
                                        <span class="bar"></span>
                                        <label for="a_name">Area Name</label>
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                    <div class="form-group m-b-40">
                                        <button class="btn btn-info" id="btnAddAreas" type="button"><span class="ti-plus"></span> Add</button>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table color-bordered-table success-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>City Name</th>
                                                <th>Area Code</th>
                                                <th>Area Name</th>
                                                <th>Action</th>
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
                                        <button type="button" class="btn btn-success" id="btnSaveArea"> <i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-warning" id="btnCancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">Areas List</h4>
                            <div class="table-responsive">   
         <table id="example2" class="table  table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>City Name</th>
                                                <th>Area Code</th>
                                                <th>Area Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="shoAreas">
                                            
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
           
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>

<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="area_modal">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Area</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" id="areaForm">
              <div class="modal-body">
               
               
                
                        <div class="form-group row">
                            <div class="col-md-4">
                          
                           <label>City Name:</label>
                            <select id="city_code" class="form-control" name="city_code">
                                <?php
                                            $qry=$this->db->query("SELECT * FROM `city` where is_deleted=0");
                                                $resForDD=$qry->result();
                                                foreach($resForDD AS $row)
                                                {
                                                echo "<option value='$row->id'>$row->name</option>";
                                                }
                                                ?>
                            </select>
                            </div>
                            <div class="col-md-4">
                          <input type="text" name="txtId" hidden="">
                           <label>Area Code:</label>
            <input type="number" class="form-control" placeholder="Enter Area Code" id="code" name="a_code">
                            </div>
                             <div class="col-md-4">
                             
                            <label>Area Name:</label>
            <input type="text" class="form-control" placeholder="Enter Area Name" id="c_name" name="a_name">
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

    <script>
        $(function () {
var itemListAdd = [];    
var count = 0;
$('#btnAddAreas').unbind().click(function(){

    var city = $('select[id=city_id] option:selected');
    var cityId = $('select[id=city_id] option:selected');
    var area_code = $("input[name=area_code]");
    var area_name = $("input[name=area_name]");
    var result = '';
    // alert(cityId.val());
      if(city.val()==''){

        city.parent().parent().addClass('has-error');

      }else{

        city.parent().parent().removeClass('has-error');

        result +='1';

      }

           if(area_code.val()==''){

        area_code.parent().parent().addClass('has-error');

      }else{

        area_code.parent().parent().removeClass('has-error');

        result +='1';

      }

      if(area_name.val()==''){

        area_name.parent().parent().addClass('has-error');

      }else{

        area_name.parent().parent().removeClass('has-error');

        result +='1';

      }

      if(result=='111'){

        city = city.text();
        cityId = cityId.val();
        area_code= area_code.val();
        area_name= area_name.val();
        itemListAdd.push([city,cityId,area_code,area_name,count]);

        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {

            htmlAdd +='<tr id='+itemListAdd[iAdd][4]+'>'+
            '<td>'+srNoAdd+'</td>'+
            '<td>'+itemListAdd[iAdd][1]+'</td>'+
            '<td>'+itemListAdd[iAdd][2]+'</td>'+
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
          $('#myForm')[0].reset();

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

   $('#btnCancel').click(function(){
        $('#myForm')[0].reset();
        $('#showArea').html('');
        itemListAdd=[];
        count=0;
   });

   $('#btnSaveArea').click(function(){

          var url = $('#myForm').attr('action');
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

                $('#myForm')[0].reset();
                $('.alert-success').html('Area Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                $('.alert-success').show();
                    itemListAdd = [];
                    count=0;

                },

                error:function()

                {

                    $('.alert-danger').html('Area Not  Added!').fadeIn().delay(4000).fadeOut('slow');

                }

            });

            }
   });


   showAreas();
        //function
        function showAreas(){
        //alert('ok');
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Areas/showAreas')?>',
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
                '<td>'+data[i].city_name+'</td>'+
                '<td>'+data[i].area_code+'</td>'+
                '<td>'+data[i].area_name+'</td>'+

                                '<td class="no-print">'+
                                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit hvr-grow marginRight20px" title="Edit Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/edit.png"></a>'+
                               '<a href="javascript:;" class="zmdi zmdi-delete item-delete hvr-grow"  title="Delete Item" data-toggle="tooltip" data="'+data[i].id+'"><img src="<?php echo base_url()?>assets/images/delete.png"></a>'+
                                    '</td>'+
    
                           
                                '</tr>';
                    }
                    $('#shoAreas').html(html);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }

        $('#shoAreas').on('click', '.item-delete', function(){
            var id = $(this).attr('data');
            $('#myModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo site_url('Areas/deleteAreas')?>',
                    data:{id:id},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#myModal').modal('hide');

                            $('.alert-success').html('Record Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAreas();
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

                //edit
        $('#shoAreas').on('click', '.item_edit', function(){
            var id = $(this).attr('data');
            // alert(id);
            $('#area_modal').modal('show');
            $('#areaForm')[0].reset();
            $('#areaForm').attr('action', '<?php echo site_url('Areas/updateArea')?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url:'<?php echo site_url('Areas/editAreas')?>',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function(data){
                    // alert(data.id);
                    $('input[name=txtId]').val(data.id);
                    $('input[name=city_code]').val(data.c_id);
                    $('input[name=a_code]').val(data.area_code);
                    $('input[name=a_name]').val(data.area_name);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });
        

                $('#btnSaveModal').click(function(){
            var url = $('#areaForm').attr('action');
            var data = $('#areaForm').serialize();
                    // alert(data);
            
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo site_url('Areas/updateArea')?>',
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

});
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2019 17:30:34 GMT -->
</html>