<body onload="window.print()">
    
<div class="wrapper" >


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      
    </section>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>
              Allied Tajar
           
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
       <h4><b>Receipt Voucher</b></h4><br>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            
            <p><i class="fas fa-warehouse"></i> <b>Company Name: </b> <?php echo $_SESSION['group_title'] ?> </p>
            <p><i class="fas fa-phone-square"></i> <b>Phone: </b> <?php echo $_SESSION['cell'] ?> </p>
            <p><i class="fas fa-envelope-square"></i> <b>Email: </b> <?php echo $_SESSION['email'] ?> </p>
            
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
           
            <p><i class="fas fa-id-card"></i> <b>Full Name: </b><?php echo $_SESSION['full_name'];?></p>
            <p><i class="fas fa-calendar-alt"></i> <b>Date: </b><?php echo date('d M, Y');?></p>
            <p><i class="fas fa-id-card"></i> <b>Address: </b><?php echo $_SESSION['address'];?></p>
            
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        
        </div>
        <!-- /.col -->
   
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
       
         <table id="" class="table  table-striped table-hover js-basic-example dataTable">
                 <thead>
                <tr style="background:black;color:white">
            
                                    <th>SR#</th>
                                         <th>Date</th>
                                        <th> Account</th>
                                        <th>Remarks</th>
                                        <th>Amount</th>
                                        

                            </tr>
                            </thead>
                           
                    <tbody id="showPrice">
                    </tbody>
                
               
               <tr>
    			     <th colspan="4" class="tableTotal">Grand Total</th>
    			     <th colspan="1" class="tableTotal"><span id="subTotal"></span></th>
                    </tr>
                    </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
       
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"></p>

          <div class="table-responsive">
            <table class="table">
           
             
             
           
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
       
          
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
 
  <div class="control-sidebar-bg"></div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script>
    $(function(){
     showPrice();

		function showPrice(){
        
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Transactions/receiveVocherList')?>',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
                    var c=0;
                    var subTotal=0;
                   
					for(i=0; i<data.length; i++){
                    subTotal=parseInt(subTotal) + parseInt(data[i].transaction_amount * -1);
                   date=data[i].tr_date;
					c++;
					html +='<tr>'+
                   '<td>'+c+'</td>'+
                   '<td>'+data[i].tr_date+'</td>'+
		           '<td>'+data[i].account_name+'</td>'+
		           '<td>'+data[i].remarks+'</td>'+
                   '<td>'+data[i].transaction_amount * -1+'</td>'+
                   '</tr>';
					}
					$('#showPrice').html(html);
                    $('#subTotal').html(subTotal);
                     $('#s_date').html(date);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
    }); 

    </script>

</body>
