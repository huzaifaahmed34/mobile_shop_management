
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
                        <h4 class="text-themecolor">Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Product Wise Report</li>
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
                                <h4 class="card-title">View Product Wise Report</h4>
                                <form class="floating-labels m-t-40" id="myForm" action="<?php echo site_url('City/saveCity')?>">
                                    <div class="row">
 <div class="col-md-5">
                                    <div class="form-group m-b-40">
                                         <select class="form-control" id="product_type_id" name=product_type_id>
                         <option value="">Select Product_type</option>
                                      
                <?php
              $html=''; 
              $qry=$this->db->query('select * from product_type where is_deleted=0')->result();
              foreach ($qry as $q) {
                  $html='<option value='.$q->id.'>'.$q->name.'</option>';
                  echo $html;
              }


                ?>
                                        </select>
                                    </div>
                                </div>
<div class="col-md-5">
                                    <div class="form-group m-b-40">
                                        <!-- <input type="text" class="form-control" id="area_code"> -->
      <select class="form-control" id="product_id" name=product_id>
                         <option value="">Select Product</option>
                      </select>
                                    </div>
                                </div>

                                        <div class="col-md-5">
                                    <div class="form-group m-b-40">
                                        <input type="date" class="form-control" id="from_date" name="from_date">
                                        <span class="bar"></span>
                                        <span for="city_code">From  Date</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group m-b-40">
                                        <input type="date" class="form-control" id="to_date
                                      " name="to_date">
                                        <span class="bar"></span>
                                        <span for="a_name">To Date</span>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group m-b-40">
                                        <button class="btn btn-info" id="btnAddCity" type="button"></span> Check Report</button>
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
                                                <th>Product_type</th>
                                                <th>Product</th>
                                                  <th>Amount</th>
                                                   <th>Qty</th>
                                                  <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showcity">
                                        </tbody>
                                          <tr>
                 <th colspan="6" class="tableTotal">Sub Total</th>
                 <th colspan="1" class="tableTotal"><span id="totalamount"></span></th>
              </tr>
                                    </table>
                                    </div>
                                </div>
                                <div class="row" style="float: right;">
                                  <div class=col-md-12>
                                <div class="form-group">
                                    <div class="form-actions">
                                       
                                        <button type="button" class="btn btn-warning" id="btnCancel">Cancel</button>
                                          <button type="button" class="btn btn-warning" id="printReport">Print</button>
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
 </div></div>
        <!-- ============================================================== -->
    <script>
    $(function(){
      //function

$('#product_type_id').unbind().change(function(){

   var id=$('#product_type_id').val();

      $.ajax({
   type:'get',
   data:{id:id},
   url:"<?php echo site_url('Purchase/changeProduct')?>",
   dataType:'json',
   success:function(res){
 

 var html='';
  html+='<option value=0>Select Product </option>';
    for(var i=0;i<res.length;i++){

    html+='<option value='+res[i].id+'>'+res[i].name+' '+res[i].model+  '</option>';




$('#product_id').html(html);
}




   },
   error:function(){
    alert('error');
   }



    })


});

       var list=[];

       $('#printReport').unbind().click(function(){

  $.ajax({
       
        type:'post',
        url: '<?php echo site_url('Report/SessionProductList')?>',
        data:{'list':list},
       
        datatype: 'json',
        success: function(data){
window.location.href='<?php echo site_url('Report/printProductWiseReport')?>';
$('#myForm')[0].reset();
        },
        error:function(){
          alert('no');
        }

       });
});
    function showReport(){
   var url='';
        var product_id=$('select[name=product_id]').val();
        
var product_type_id=$('select[name=product_type_id]').val();
             var from_date=$('input[name=from_date]').val();
              var to_date=$('input[name=to_date]').val();
             if(to_date==''){
          to_date=from_date;
        }   
        if(product_id=='' && from_date=='' && product_type_id==''){
          url='<?php echo site_url('Report/showProductWiseReport1')?>';
        }
        else{
         url='<?php echo site_url('Report/showProductWiseReport')?>';
        }
      $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data:{'product_id':product_id,'from_date':from_date,'to_date':to_date},
        async: false,
        dataType: 'json',
        success: function(data){
        
          var html = '';
          var i;
            var c=0;     
            var amount =0;
            list=[];
          for(i=0; i<data.length; i++){
          c++;
                 list.push([data[i].customer_name,data[i].product_type_name,data[i].product_name,data[i].model,data[i].net_price,data[i].date,from_date,to_date,amount,data[i].qty]);
                      html +='<tr>'+
                '<td>'+c+'</td>'+
                            '<td>'+data[i].customer_name+'</td>'+
                              '<td>'+data[i].product_type_name+'</td>'+
                            '<td>'+data[i].product_name+' '+data[i].model+'</td>'+
                               '<td>'+data[i].net_price+'</td>'+
                                   '<td>'+data[i].qty+'</td>'+
                                '<td>'+data[i].date+'</td>'+
                           '</tr>';
                                amount+=parseInt(data[i].net_price);
          }
          $('#totalamount').html(amount);
                   
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
        
        $('#btnCancel').click(function(){
$('#showcity').html('');
$('#from_date').val('');
list=[];
$('input[name=to_date]').val('');
        });

    })
    </script>

