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
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong>
                 <p>
               <span><?php
                echo $_SESSION['group_title']
                ?></span>
                </strong><br>
         
            <br>
            <span>
                   Phone:<?php
                echo $_SESSION['cell']
                ?><br>
            </span>
         
            Email:abtech@gmail.com
            
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong>Product Wise Sale</strong><br>
            <p><span><?php echo $_SESSION['user_name'];?></span><br>
            <span id="s_date"><?php echo date('d-m-y');?></span><br>
            <span id="e_date">Haroon Abad Road</span><br>
          
            </p>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        
        </div>
        <!-- /.col -->
   
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
       <?php
            if(isset($res))
            {
               
           
            ?>
         <table id="" class="table  table-striped table-hover js-basic-example dataTable">
                 <thead>
                 <tr style="background:black;color:white">
         
                                 
                                    <th>SR#</th>
                                        <th>Godown#</th>
                                        <th>SKU</th>
                                        <th>Product Name</th>
                                        <th>Packing</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        
                </tr>
                    </thead>
                           
                    <tbody id="showPrice">
                    <?php
                        $c=0;
                       $subTotal=0;
                       $totalPrice=0;
                $totalQty=0;
                        foreach($res as $row)
                        {
                            $totalPrice=$totalPrice +$row->price;
                            $totalQty=$totalQty + $row->qty;
                    $c++;
                       
                        ?>
                    <tr>
                        <td><?php echo $c;?></td>
                        <td><?php echo $row->godown_name;?></td>
                        <td><?php echo $row->sku;?></td>
                     
                        <td><?php echo $row->product_name;?></td>
                          <td><?php echo $row->packing_qty;?></td>
                            <td><?php echo $row->price;?></td>
                            <td><?php echo $row->qty;?></td>
                   
                        
                    </tr>
                    <?php
                            $subTotal=$subTotal+$row->price;
                         }
                 }
            
                        ?>
                    </tbody>
                    
                <tr style="color:green">
             
               <td>Total No:<?php echo $c;?></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
                <td>Total Price: <span id=""><?php echo $totalPrice;?></span></td>
               <td><b>Total Qty: <span id="subTotal"><?php echo $totalQty;?></span></b></td>
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


</body>
