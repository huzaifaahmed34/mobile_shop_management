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
                        <h4 class="text-themecolor">Voucher</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Payment Voucher</li>
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
                                <h4 class="card-title">Add Payment Voucher</h4>
                                <form class="floating-labels m-t-40" id=form action="<?php echo site_url('Voucher/AddPaymentVoucher')?>">
                                    <div class="row">
                                       <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
     <select class="form-control" id="customer_id" name="customer_id">
             <option value="">
                 Select Customer
             </option> <?php
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
                                        <input type="text" class="form-control" id="amount" name=amount>
                                        <span class="bar"></span>
                                        <label for="c_name">Amount</label>
                                    </div>
                        </div>

                                <div class="col-md-4">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="date" name=date value="<?php echo date('Y-m-d')?>">
                                        <span class="bar"></span>
                                        <span for="c_addr">Date</span>
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
                                             <th>Amount</th>
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
              
                    </div>
                </div>


                                    <!-- /.modal-dialog -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
    
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== --></div></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script>
        $(function () {



var itemListAdd = [];
var count=0;
$('#btnAdd').unbind().click(function(){
  



    var customer_id = $("select[name=customer_id]");
 
    var date = $("input[name=date]");
    var amount = $("input[name=amount]");
   
  var customer_name = $('select[id=customer_id] option:selected');
    var result = '';
    
  if(date.val()==''){

        date.parent().parent().addClass('has-error');

      }else{

        date.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(customer_id.val()==''){

        customer_id.parent().parent().addClass('has-error');

      }else{

        customer_id.parent().parent().removeClass('has-error');

        result +='1';

      }
  if(amount.val()==''){

        amount.parent().parent().addClass('has-error');

      }else{

        amount.parent().parent().removeClass('has-error');

        result +='1';

      }

   





      if(result=='111'){
        customer_id = customer_id.val();
        date= date.val();
        amount= amount.val();
       customer_name=customer_name.text();
         
        itemListAdd.push([customer_id,date,amount,count,customer_name]);
  
        var htmlAdd = '';

          var iAdd;
                var srNoAdd = 1;
                for(iAdd=0; iAdd<itemListAdd.length; iAdd++){
                    if(itemListAdd[iAdd]!='')
                {

            htmlAdd +='<tr id='+itemListAdd[iAdd][3]+'>'+
            '<td>'+srNoAdd+'</td>'+
            '<td>'+itemListAdd[iAdd][4]+'</td>'+
            '<td>'+itemListAdd[iAdd][2]+'</td>'+
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
                 
         if(itemListAdd[m][3]==m){
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


});
    </script>