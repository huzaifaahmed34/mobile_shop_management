
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
                                <li class="breadcrumb-item active">Transaction Report</li>
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
                                <h4 class="card-title">View Report</h4>
                                <form class="floating-labels m-t-40" id="myForm" action="<?php echo site_url('City/saveCity')?>">
                                    <div class="row">
 <div class="col-md-6">
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
                                               
                                                  <th>Debit</th>
                                                  <th>Credit</th>
                                                  <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showcity">
                                        </tbody>
                                         <tr>
                                            <th></th>
                                            <th></th>
                                            
                 <th  class="tableTotal"><span id="debit"></span></th>
                 <th  class="tableTotal"><span id="credit"></span></th>
                 <th></th>
              </tr>
              <tr>
                                
                 <th colspan="4" class="Remaining Balance">Remaining Balance</th>
                 <th colspan="1" class="tableTotal"><span id="total"></span></th>
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
 
        <!-- ============================================================== -->
    <script>
    $(function(){
    	//function


       var list=[];

       $('#printReport').unbind().click(function(){

  $.ajax({
       
        type:'post',
        url: '<?php echo site_url('Report/SessionList')?>',
        data:{'list':list},
       
        datatype: 'json',
        success: function(data){
window.location.href='<?php echo site_url('Report/printReport')?>';
        },
        error:function(){
          alert('no');
        }

       });
});
		function showReport(){
        var from_date=$('input[name=from_date]').val();
              var to_date=$('input[name=to_date]').val();
              var customer_id=$('select[name=customer_id]').val();
    var url='';
    if(to_date=='' && from_date==''){
url='<?php echo site_url('Report/showReport1')?>';
    }
    else{
        url='<?php echo site_url('Report/showReport')?>';
    }

          if(to_date==''){
          to_date=from_date;
        } 

			$.ajax({
				type: 'ajax',
        method:'post',
				url: url,
        data:{'from_date':from_date,'to_date':to_date,'customer_id':customer_id},
				async: false,
				dataType: 'json',
				success: function(data){
   
					var html = '';
					var i;
            var c=0;     var credit=0;
           var debit=0;
           var totaldebit=0;
           var totalcredit=0;
                 list=[];
          
					for(i=0; i<data.length; i++){
					c++;
                    if(data[i].amount<0){
                        debit=-1*data[i].amount;
                        totaldebit+=parseInt(-1*data[i].amount);
                        credit=0;
                    }
                    else{
                        credit=data[i].amount;
                          totalcredit+=parseInt(data[i].amount);
                          debit=0;
                    }
                 list.push([data[i].customer_name,credit,debit,data[i].date,from_date,to_date,data[i].balance]);
                     	html +='<tr>'+
								'<td>'+c+'</td>'+
		                        '<td>'+data[i].customer_name+'</td>'+
                              '<td>'+debit+'</td>'+
		                        '<td>'+credit+'</td>'+
                             
                                '<td>'+data[i].date+'</td>'+
                           '</tr>';
                              $('#total').html(data[i].balance);     
					}

			var total=parseInt(totaldebit)-parseInt(totalcredit);
                 
                    $('#debit').html(totaldebit);
                    $('#credit').html(totalcredit);                   
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
$('input[name=to_date]').val('');
        });

    })
    </script>

</body>
</html>

