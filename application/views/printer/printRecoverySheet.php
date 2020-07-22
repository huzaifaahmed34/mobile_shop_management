
<body onload="window.print()">

    
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>Recovery Sheet </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
        <li><a href="#">Finance/Account</a></li>
        <li class="active">Recovery Sheet</li>
      </ol>
    </section>

   <form id="myForm" action="<?php echo site_url('Sale/saveSale')?>" method="post">

    <section class="content">

      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Generate Recovery Sheet</h3>
        </div>
   <div class="alert alert-success" style="display: none;"></div>

   <div class="alert alert-danger" style="display: none;"></div>

    

        <!-- /.box-header -->

        <div class="box-body">

         <?php
            if(isset($data))
            {
                
            foreach ($data as $key) {
            $saleman_id=$key->saleMan_id; 
            $area_id=$key->area_id;
            }
                
            $qry=$this->db->query("select * from aims_account  WHERE id=$saleman_id");
            $res=$qry->result();
                
            foreach ($res as $row) {
             $saleMan=$row->name;
            }
              
          
            ?>

      <div class="row">
          
            <div class="col-md-2">
		    </div>
		    
            <div class="col-md-2">
                <div class="from-group">
                   <p><b>Saleman: </b> <?php echo $saleMan;?></p>
                  
                    </div>
            </div>
            
            
            
            <div class="col-md-2">

                <div class="form-group">
                   <?php
            $qry=$this->db->query("select * from aims_area  WHERE id=$area_id");
            $res=$qry->result();
                
            foreach ($res as $row) {
             $areaName=$row->name;
            }
                    ?>
                    <p><b>Area: </b> <?php  echo $areaName?></p>
                        
                </div>

            </div>
            
            <div class="col-md-2">

                <div class="form-group">
                    <p><b>Date: </b><?php echo date('d-m-Y');?></p>
            
                </div>
              
            </div>
		    
            <div class="col-md-2">

                <div class="form-group">
                    <p><b>Time: </b>
                    <?php 
                    date_default_timezone_set('Asia/Karachi'); 
                    echo date('h:i:s');
                    ?>
                    </p>
                  
                </div>

            </div>
            
            <div class="col-md-2">
		    </div>
		    
          </div>

		  <div class="row">
		    <div class="col-md-2">
		    </div>
		
            
            <div class="col-md-2">

			</div>

          </div>

          <br>



          

      <div class="row">
          <div class="col-md-2">

			</div>
			
             <div class="col-md-8">
            <div class="table-responsive">
			 <table class="table table-striped table-bordered" style="border:3px">
			     <thead>
			         <tr style="background:black;color:white ">
                        <th>Sr#</th>
                         <th>Account Title</th>
			             <th>Address</th>
			             <th>Balance</th>
			             <th>Receive</th>
			         </tr>
			     </thead>
			     
			     <tbody id="showReport">
			 <?php
            $qry=$this->db->query("SELECT * FROM aims_account ac WHERE balance < 0 AND area_id=$area_id");
            $res=$qry->result();
                $c=1;
                $subTotal=0;
            foreach ($res as $row) {
                $subTotal=$subTotal + $row->balance * -1;
            
                    ?>
			     <tr>
                     <td><?php echo $c++;?></td> 
			        <td><?php echo $row->name;?></td> 
			        <td><?php echo $row->address;?></td>
			        <td><?php echo $row->balance * -1;?></td> 
			         <td></td> 
			     </tr>
			     <?php
                     }
            }
                     ?>
			     </tbody>
			     <tr>
    			     <th colspan="3" class="tableTotal">Sub Total</th>
    			     <th colspan="2" class="tableTotal"><span id="subTotal"><?php echo $subTotal;?></span></th>
                    </tr>
			 </table>
			 </div>

			</div>
			
			<div class="col-md-2">

			</div>

            </div>
        </div>

      </div>

    </section>

    <!-- /.content -->

       

   </form>

  </div>

</body>

 



  <div class="control-sidebar-bg"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      
      

      