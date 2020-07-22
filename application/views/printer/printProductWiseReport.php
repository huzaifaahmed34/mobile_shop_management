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
                        <h4 class="text-themecolor">Product Wise Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Product Wise  Report</li>
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
                                <h4 class="card-title">Product Wise Report</h4>
      <!-- title row -->
 
      
      
      
      
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <p><i class="fas fa-calendar-alt"></i> <b>From Date: </b><?php echo $data[0][6]?></p>
            
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            

              <p><i class="fas fa-calendar-alt"></i> <b>To Date: </b><?php echo $data[0][7]?></p>
            
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
                                                  <th>Amount</th>   <th>Qty</th>
                                                  <th>Date</th>
                                        

                            </tr>
                            </thead>
                           
                    <tbody id="showPrice">

                      <?php $c=0;
                      $total=0;
                      if($data!=''){

                      foreach($data as $d){
                    $c++;
                     ?>
                        <tr>
                             <td><?php echo $c?></td>
                          <td><?php echo $d[0]?></td>
                            <td><?php echo $d[1]?></td>
                              <td><?php echo $d[2].' '.$d[3]?></td>
                              
                                <td><?php echo $d[4]?></td>
                                  <td><?php echo $d[9]?></td>
                                <td><?php echo $d[5]?></td>
                               

                        </tr>
<?php
$total+=$d[4];
                    }}?>
                    </tbody>
                               <tr>
                 <th colspan=6 class="tableTotal">Sub Total</th>
                 <th colspan="1" class="tableTotal"><?php echo $total?><span id="totalamount"></span></th>
              </tr>
               
                    </table>
        </div>
        <!-- /.col -->
      </div>
   
  
    </div>
  </div></div></div></div>
    