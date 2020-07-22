<body onload="window.print();">

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
                        <h4 class="text-themecolor">Purchase</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Purchase</li>
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
                                <h4 class="card-title">Invoice</h4>
      <!-- title row -->
 
      
      
      
      
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            
            <p><i class="fas fa-warehouse"></i> <b>Company Name: </b> </p>
            <p><i class="fas fa-phone-square"></i> <b>Phone: </b></p>
            <p><i class="fas fa-envelope-square"></i> <b>Email: </b> </p>
            
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            
            
            <p><i class="fas fa-id-card"></i> <b>Full Name: </b></p>
            <p><i class="fas fa-calendar-alt"></i> <b>Date: </b><?php echo date('d M, Y');?></p>
            <p><i class="fas fa-id-card"></i> <b>Address: </b></p>
            
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        
        </div>
        <!-- /.col -->
   
      <!-- /.row -->

      <!-- Table row -->
      
      <!-- /.row -->
    </div>
    
    <div class="row">
        <div class="col-xs-12 table-responsive">
       
         <table id="" class="table  table-striped ">
                 <thead>
                <tr >
              <th>#</th>
                                              
                                            
                                                <th>Customer Name</th>
                                                <th>Product_type</th>
                                                <th>Product</th>
                                                  <th>Qty</th>

                                                 <th>Price</th>
                                      <th>Discount</th>
                                        <th>Net Amount</th>
                                         <th>Remarks</th>
                                        

                            </tr>
                            </thead>
                           
                    <tbody id="showPrice">
                    </tbody>
                       
               
                    </table>
        </div>
        <!-- /.col -->
      </div>
   
  
    </div>
    

    <div class="clearfix"></div>
  
  
  
 
  <div class="control-sidebar-bg"></div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <?php
    $id=$this->uri->segment(3);
   
    ?>
    <script>
    $(function(){
     showPrice();
    //function
            function showPrice(){
        //alert('ok');
      $.ajax({
        type: 'get',
        
        url: '<?php echo site_url('Purchase/showPrintData1')?>',
        data:{'id':'<?php echo $id?>'},
        async: false,

        dataType:
         'json',
        success: function(data){
       

          var html = '';
          var i;
                    var c=0;
                    var subTotal=0;
          for(i=0; i<data.length; i++){
                 
          c++;
            html +='<tr>'+
                '<td>'+c+'</td>'+
                                '<td>'+data[i].customer_name+'</td>'+
                '<td>'+data[i].product_type_name+'</td>'+
                '<td>'+data[i].product_name+'</td>'+
                   '<td>'+data[i].qty+'</td>'+
                 '<td>'+data[i].price+'</td>'+
                   '<td>'+data[i].discount+'</td>'+
                  '<td>'+data[i].net_price+'</td>'+
                '<td>'+data[i].remarks+'</td>'+
                               
                               
                  '</tr>';
          }
        
        $('#showPrice').html(html);
        },
        error: function(){
          alert('Could not get Data from Database');
        }
      });
    }
        


    }); 

    </script>

</body>
