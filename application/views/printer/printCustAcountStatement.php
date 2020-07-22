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
            <strong>Customer Account Statement</strong><br>
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
                                        <th>Vocher#</th>
                                        <th>Date</th>
                                        <th>Account Title</th>
                                        <th>Remarks</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                </tr>
                    </thead>
                           
                    <tbody id="showPrice">
                    <?php
                        $c=0;
                $totalDebit=0;
                $totalCredit=0;
                $balance=0;
                $subTotal=0;
                        foreach($res as $row)
                        {
                    $c++;
                             $Amount=$row->amount;
                        if($Amount < 0)
                            {
                               $debit = ($Amount*-1);
                               $credit = 0;
                                $totalDebit=$totalDebit + $debit;
                            }
                        else
                        {
                            
                            $credit = $Amount;
                            $debit =0;
                            $totalCredit=$totalCredit +$credit;
                           
                        }
                        
                        $balance= $balance + $row->amount;
                       
                        ?>
                    <tr>
                        <td><?php echo $c;?></td>
                        <td><?php echo $row->billNo;?></td>
                        <td><?php echo $row->t_date;?></td>
                        <td><?php echo $row->account_name;?></td>
                        <td><?php echo $row->remarks;?></td>
                         <td><?php echo $debit;?></td>
                          <td><?php echo $credit;?></td>
                        
                   
                        
                    </tr>
                    <?php
                            $subTotal=$row->amount;
                         }
                 }
            
                        ?>
                    </tbody>
                    
                <tr style="color:green">
             
               <td></td>
               <td></td>
               <td><b>Grand Total: <span id="subTotal"><?php echo $subTotal;?></span></b></td>
               </tr>
                    </table>
                            <div class="row">
                         <div class="col-md-6">
                             
                         </div>
                         <div class="col-md-3">
                           </div>
                        <div class="col-md-2" >
                            
                  <table id="" class="table  table-striped table-hover js-basic-example dataTable">
              <thead style="color:green">
                <tr>
                <th>Total Debit:</th>
                <th><span id="totalDebit"><?php echo $totalDebit;?></span></th>
                </tr>
                 <tr>
                <th>Total Credit:</th>
                <th><span id="totalCredit"><?php echo $totalCredit;?></span></th>
                </tr>
                 <tr>
                <th>Balance:</th>
                <th><span id="balance"><?php echo $balance;?></span></th>
                </tr>
                </thead>
               
                    </table>
                </div>
                       
                     </div>
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
