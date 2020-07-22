<body onload="window.print();">
    
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
      <h4><b>Bank Voucher</b></h4><br>
      <div class="row invoice-info">
          
        <div class="col-sm-4 invoice-col">
            
            <p><i class="fas fa-warehouse"></i> <b>Company Name: </b><?php echo $_SESSION['group_title'] ?></p>
            <p><i class="fas fa-phone-square"></i> <b>Phone: </b><?php echo $_SESSION['cell'] ?></p>
            <p><i class="fas fa-envelope-square"></i> <b>Email: </b> <?php echo $_SESSION['email'] ?></p>
         
        </div>
        
        <div class="col-sm-4 invoice-col">
           
            <p><i class="fas fa-id-card"></i> <b>Full Name: </b><?php echo $_SESSION['full_name'];?></p>
            <p><i class="fas fa-calendar-alt"></i> <b>Date: </b><?php echo date('d M, Y');?></p>
            <p><i class="fas fa-id-card"></i> <b>Address: </b><?php echo $_SESSION['address'];?></p>
          
        </div>
        
        <div class="col-sm-4 invoice-col">
       
        </div>
        
      </div>
     
      <div class="row">
        <div class="col-xs-12 table-responsive">
         
         <table class="table  table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr style="background:black;color:white">
            
                             
                                    <th>SR#</th>
                                        <th>Vocher#</th>
                                        <th>Date</th>
                                        <th>Account Title</th>
                                        <th>Remarks</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        
                                        

                            </tr>
                            </thead>
               
                           
                    <tbody id="showPrice">
                    </tbody>
                    
                     <tr>
    			     <th colspan="5" class="tableTotal">Total Amount</th>
    			     <th colspan="2" class="tableTotal"><span id="subTotal"></span></th>
                    </tr>
                    
                    </table>
        </div>
        <!-- /.col -->
      </div>
      
     
      <div class="row no-print">
        <div class="col-xs-12">
       
          
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
 
  <div class="control-sidebar-bg"></div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script>
    $(function(){
     showPrice();
		//function
		function showPrice(){
        
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Transactions/showBankList')?>',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
                    var debit = 0;
                    var credit = 0;
                    var c=0;
					for(i=0; i<data.length; i++){
					c++;
                        amount=data[i].amount;
                        if(amount < 0)
                            {
                               debit = (amount*-1);
                               credit = 0;
                            }
                        else
                        {
                            debit =0;
                            credit = amount;
                           
                        }
                        date=data[i].t_date;
                         subtotal=data[i].subtotal;
                        ivoice=data[i].id;
                        //alert(debit_amount);
						html +='<tr>'+
								'<td>'+c+'</td>'+
		                        '<td>'+data[i].id+'</td>'+
		                        '<td>'+data[i].t_date+'</td>'+
                                '<td>'+data[i].account_name+'</td>'+
                             '<td>'+data[i].remarks+'</td>'+
                               '<td>'+debit+'</td>'+
                            '<td>'+credit+'</td>'+
                               
                              
                           
                                '</tr>';
					}
					$('#showPrice').html(html);
                  
                     $('#subtotal').html(subtotal);
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
