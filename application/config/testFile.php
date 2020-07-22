

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Order Management 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
        <li><a href="#"> Order Management </a></li>
        <li class="active">Add New Order</li>
      </ol>
    </section>

   <form id="myForm" action="<?php echo site_url('Purchase/savePurchase')?>" method="post">
       
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Order</h3>
        </div>
            
   <div class="alert alert-success" style="display: none;"></div>
   
   <div class="alert alert-danger" style="display: none;"></div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
      <div class="col-md-3">
              <div class="form-group">
                 <label>Invoice No#</label>
                  <input type="text" name="inv_no" value="<?php echo mt_rand(0,100) ?>" readonly="" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                 <label>Date</label>
                  <input type="date" name="dt" value="<?php echo date('Y-m-d'); ?>" class="form-control">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                 <label>Supplier</label>
                  <select name="sup" id="sup" class="form-control sup" >
                                              <option value="" >Select Supplier</option>
                                               <?php
                                                  
                                                    $qry=$this->db->query("SELECT * FROM `aims_account` where account_type_id=3");
                                                       $resForDD=$qry->result();
                                                       foreach($resForDD AS $row)
                                                       {
                                                           echo "<option value='$row->id'>$row->name</option>";
                                                       }
                                                       
                                                  
                                            ?>
                                            </select>
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                 <label>Cash Recieving</label>
                  <input type="text" name="c_rec" class="form-control" placeholder="Cash Recievable" id="c_rec">
              </div>
            </div> 
          </div>

          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                 <label>Broker</label>
                  <select name="bro" id="bro" class="form-control bro" >
                                              <option value="" >Select Broker</option>
                                               <?php
                                                  
                                                    $qry=$this->db->query("SELECT * FROM `aims_account` where account_type_id=2");
                                                       $resForDD=$qry->result();
                                                       foreach($resForDD AS $row)
                                                       {
                                                           echo "<option value='$row->id'>$row->name</option>";
                                                       }
                                                       
                                                  
                                            ?>
                                            </select>
              </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                 <label>Cash Recieving</label>
                  <input type="text" name="b_rec" class="form-control" placeholder="Cash Recievable"  id="b_rec">
              </div>
            </div> 
          </div>
          <div class="row">
		  <div class="col-md-3">
              <div class="form-group">
                 <label>Product</label>
                     <select name="product" id="product" class="form-control product" >
                                              <option value="" >Select Product</option>
                                               <?php
                                                  
                                                    $qry=$this->db->query("SELECT * FROM `aims_product`");
                                                       $resForDD=$qry->result();
                                                       foreach($resForDD AS $row)
                                                       {
                                                           echo "<option value='$row->id'>$row->name</option>";
                                                       }
                                                       
                                                  
                                            ?>
                                            </select>
              </div>
            </div> 

            <div class="col-md-3">
              <div class="form-group">
                 <label>Type</label>
                 <select name="type" id="type" class="form-control type" >
                                              <option value="" >Select Type</option>
                                               <option value="1">Purchase</option>
                                               <option value="2">Charai</option>
                                            </select>
              </div>
            </div>
            
            
            <div class="col-md-3">
              <div class="form-group">
                <label>Bags Type</label>
                 <select name="b_type" id="b_type" class="form-control b_type">
                                              <option value="">Select Bags Type</option>
                                               <?php
                                                  
                                                  $group_id=$_SESSION['group_id'];
                                                    $qry=$this->db->query("select * from aims_bags");
                                                       $resForDD=$qry->result();
                                                       foreach($resForDD AS $row)
                                                       {
                                                           echo "<option value='$row->id'>$row->name</option>";
                                                       }
                                                       
                                                  
                                            ?>
                                            </select>
              </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
            <label>No# of Bags</label>
               <input type="number" class="form-control" placeholder="Enter No# of Bags" id="no_bg" name="no_bg">
            </div>
            </div>
          
		
          </div>
          
		  
		  		
		  <div class="row">

         
        <div class="col-md-3">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Weight</label>
                  <input type="text" class="form-control" id="w" name="w" placeholder="Weight" readonly="">
           
              </div>
        
            </div>

            <div class="col-md-3">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Kanta Weight</label>
                  <input type="text" class="form-control" id="kw" name="kw" placeholder="Kanta Weight">
           
              </div>
        
            </div>
		  
            <div class="col-md-3">
            <div class="form-group">
            <label id="lblProduct">Deduction</label>
               <input type="text" class="form-control" id="deduction" name="deduction" placeholder="Deduction Narration">
            </div>
            </div>
          
       
        
            
              <div class="col-md-3">
            <label class="label-control">Deduction Value</label>
              <input type="number" class="form-control" id="deductionVal" name="deductionVal" placeholder="Deduction Value">

            </div>
              
              
			 
            </div>
            <div class="row">
              <div class="col-md-10"></div>
              <div class="col-md-2">
            <label class="label-control">Total Weight</label>
              <input type="number" class="form-control" id="t_w" name="t_w" placeholder="Total Weight" readonly="">

            </div>
            </div>
            
          
          <div class="row">
              <div class="col-md-4">
                  
              </div>
                <div class="col-md-4">
              <!-- /.form-group -->
              <div class="form-group">
                 <label>&nbsp;</label>
				 <button style="background-color:#00A157;margin:0px !important;" type="button" class="form-control btn bg-olive margin pull pull-right" id="btnAddItem">Add To Invoice</button>
		
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
                  
              </div>
          </div>

          
      <div class="row">
		  
             <div class="col-md-12">
                       <h3>Purchase Items List:</h3>
              <div class="table-responsive" style="overflow: hidden;">         
			 <table class="table table-striped">
			     <thead>
			         <tr style="background:black;color:white">
                   <th>Inv No#</th>
                   <th>Date</th>
                   <th>Supplier</th>
			             <th>Supplier Cash</th>
                   <th>Broker</th>
                   <th>Broker Cash</th>
                   <th>Product</th>
			            <th>Type</th>
			             <th>Bags Type</th>
			             <th>N# of Bags</th>
			             <th>Weight</th>
			             <th>Deduction</th>
			             <th>Deduction Value</th>
                   <th>Knta Weight</th>
                   <th>Total Weight</th>
			             <th>Action</th>
			         </tr>
			     </thead>
			     <tbody id="showItem">
			      
			     </tbody>
			 </table>
			 </div>
			</div>
            
        </div>
        
       
            
        <div class="row">
		    <div class="col-md-3">
			 
			</div>
        
            
            <!-- /.col -->
            <div class="col-md-6" style="text-align: center;padding-top: 40px;">
              <!-- /.form-group -->
              <div class="form-group">
                 <button style="background-color:#00A157;margin:0px !important;" type="button" class="btn bg-olive margin">Cancel</button>
				 <button style="background-color:#00A157;margin:0px !important;" type="button" class="btn bg-olive margin" id="btnConfirm">Confirm</button>
				 <a href="<?php echo site_url('Purchase/showPurchase');?>" style="background-color:#00A157 ;margin:0px !important;" type="button" class="btn bg-olive margin">View Order List</a>
              </div>
              
              <!-- /.form-group -->
            </div>
			<div class="col-md-3">
			
			</div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
      
        

      <div class="row">
        <div class="col-md-6">


        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
       
   </form>
  </div>
 

  <div class="control-sidebar-bg"></div>


        <!-- MODAL Confirm -->
        <form id="confirmForm">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content update-modal" >
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Confirm Order</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><hr class="marginButtom0px">
                  </div>
                  <div class="modal-body">
                        
                        <div class="row form-group">
                            <input type="hidden" name="txtId">
                            <div class="col-md-4 text-center">
                                    <p><b>Supplier Name: </b><span id="supplier_name">&nbsp;</span></p>
                            </div>
                            <div class="col-md-4 text-center">
                                    <p><b>Total Bill: </b><span id="modalSubTotal">&nbsp;</span></p>
                            </div>
                            <div class="col-md-4 text-center">
                                    <p><b>Date: </b><span id="">&nbsp;Aug 22, 2019</span></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class="col-form-label">Discount %:</label>
                                <input type="text" name="discount_perc" id="discount_perc" class="form-control" placeholder="Enter Discount %" >
                            </div>
                            
                            <div class="col-md-4">
                                <label class="col-form-label">Discount:</label>
                                <input type="text" name="discount_modal"  class="form-control" placeholder="Enter Discount" id="discount_modal">
                            </div>
                            
                            <div class="col-md-4">
                                <label class="col-form-label">Net Total:</label>
                                <input type="text" name="modalNetTotal" class="form-control" style="display:none">
                                <input type="text" name="modalSubTotal" class="form-control" readonly>
                            </div>
                        </div>
                        
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top:10px">Close</button>
                    <button type="button" type="submit" id="btnSave" class="btn btn-success" style="margin-top:10px">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
<script>
$(function(){
 
   
		var itemList = [];
		var subTotal=0;
             // On change discount_perc
              $("#discount_perc").keyup(function(){
             
            var modalNetTotal= $('input[name=modalNetTotal]').val();
            var modalSubTotal= $('input[name=modalSubTotal]').val();
            var discount_perc= $('input[name=discount_perc]').val();
            var remTotal=0;
                   if(discount_perc != '')
                      {
                    $("#discount_modal").attr("disabled", true);
                    var countDiscount= parseFloat(discount_perc /100) * parseFloat(modalNetTotal);
                    $('input[name=discount_modal]').val(countDiscount);
                    var discount_modal= $('input[name=discount_modal]').val();
                          remTotal=modalNetTotal - discount_modal;
                        
                   $('input[name=modalSubTotal]').val(remTotal);
               
                  	$('#modalSubTotal').html(remTotal);
                 
                      }
                else{
                      $("#discount_modal").attr("disabled", false);
                     $('input[name=modalSubTotal]').val(modalNetTotal);
                      $('input[name=discount_modal]').val(0);
                    $('#modalSubTotal').html(modalNetTotal);
                }
             
                 
                 
                    //alert(remTotal);
		      });
        
           // On change DISCOUNT
              $("#discount_modal").keyup(function(){

            var modalNetTotal= $('input[name=modalNetTotal]').val();
            var modalSubTotal= $('input[name=modalSubTotal]').val();
            var discount_modal= $('input[name=discount_modal]').val();
                 // alert(modalSubTotal);
		      if(discount_modal!= ''){
		       $("#discount_perc").attr("disabled", true);
              var countModalDiscount=(discount_modal*100)/modalSubTotal;
                
                  var remAmount=modalNetTotal - discount_modal;
                   
                $('input[name=modalSubTotal]').val(remAmount);
                $('input[name=discount_perc]').val(countModalDiscount.toFixed(2));
                  $('#modalSubTotal').html(remAmount);
               

		    }
                  else{
                       $("#discount_perc").attr("disabled", false);
                     $('input[name=modalSubTotal]').val(modalNetTotal);
                      $('input[name=discount_perc]').val(0);
                    $('#modalSubTotal').html(modalNetTotal);
                  }
                  
		    
		    
		});
    
    
    $("#deduction").keyup(function(){
      var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                  $('#deductionVal').focus();
                }
    });
    $("#deductionVal").keyup(function(){
      if(parseInt($('input[name=deductionVal]').val()) < parseInt($('input[name=kw]').val())){
        $('input[name=t_w]').val(parseInt($('input[name=kw]').val())-$('input[name=deductionVal]').val());
        }
              else
              {
                $('.alert-danger').html('Please Check Your Value!').fadeIn().delay(1000).fadeOut('slow');
                $('input[name=t_w]').val(parseInt($('input[name=w]').val()));
                $('input[name=deductionVal]').val(parseInt($('input[name=kw]').val()));
              }
      
      var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                  $('#btnAddItem').focus();
                }

    });
    
    $("#no_bg").keyup(function(){
           var no= $('input[name=no_bg]').val();
               var bags= $('select[name=b_type] option:selected').val();
                // alert(no);
  var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                  $('#deduction').focus();
                }
              
               $.ajax({
        type: 'ajax',
        method: 'get',
        url:'<?php echo site_url('Production/getProVal')?>',
        data: {id: bags},
        async: false,
        dataType: 'json',
        success: function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            $('input[name=w]').val(data[i].value*no+" KG");
            // alert(parseFloat($('input[name=w]').val()));

          }
        },
        error: function(){
          alert('Error');
        }


      });
             });
    
     var count=0;
		$('#btnAddItem').click(function(){
            
            var inv_no = $('input[name=inv_no]');
            var dt = $('input[name=dt]');
            var crec = $('input[name=c_rec]');
            var brec = $('input[name=b_rec]');
            var kweight = $('input[name=kw]');
            var sup = $('select[name=sup] option:selected');
            var bro = $('.bro option:selected');
            var supVal = $('select[name=sup] option:selected');
            var broVal = $('.bro option:selected');
            var product = $('select[name=product] option:selected');
            var productVal = $('select[name=product] option:selected');
             var type = $('select[name=type] option:selected');
             var btype = $('select[name=b_type] option:selected');
             var sbVal = $('select[name=sb] option:selected');
             var typeVal = $('select[name=type] option:selected');
             var btypeVal = $('select[name=b_type] option:selected');
             var no = $('input[name=no_bg]');
             var weight = $('input[name=w]');
             var deduction = $('input[name=deduction]');
             var deductionVal = $('input[name=deductionVal]');
             var total = $('input[name=t_w]');           

// alert(kw.val());
			var result = '';

      if(brec.val()==''){
        brec.parent().parent().addClass('has-error');
      }else{
        brec.parent().parent().removeClass('has-error');
        result +='1';
      }

      if(kweight.val()==''){
        kweight.parent().parent().addClass('has-error');
      }else{
        kweight.parent().parent().removeClass('has-error');
        result +='1';
      }


      if(sup.val()==''){
        sup.parent().parent().addClass('has-error');
      }else{
        sup.parent().parent().removeClass('has-error');
        result +='1';
      }

      if(bro.val()==''){
        bro.parent().parent().addClass('has-error');
      }else{
        bro.parent().parent().removeClass('has-error');
        result +='1';
      }

      if(crec.val()==''){
        crec.parent().parent().addClass('has-error');
      }else{
        crec.parent().parent().removeClass('has-error');
        result +='1';
      }

      if(dt.val()==''){
        dt.parent().parent().addClass('has-error');
      }else{
        dt.parent().parent().removeClass('has-error');
        result +='1';
      }
      if(product.val()==''){
        product.parent().parent().addClass('has-error');
      }else{
        product.parent().parent().removeClass('has-error');
        result +='1';
      }
            
           if(type.val()==''){
				type.parent().parent().addClass('has-error');
			}else{
				type.parent().parent().removeClass('has-error');
				result +='1';
			}
            
        
            
              if(btype.val()==''){
              btype.parent().parent().addClass('has-error');
			}else{
             btype.parent().parent().removeClass('has-error');
            result +='1';
			}

              if(no.val()==''){
              no.parent().parent().addClass('has-error');
			}else{
             no.parent().parent().removeClass('has-error');
            result +='1';
			}

      if(weight.val()==''){
              weight.parent().parent().addClass('has-error');
      }else{
             weight.parent().parent().removeClass('has-error');
            result +='1';
      }
      if(deduction.val()==''){
              deduction.parent().parent().addClass('has-error');
      }else{
             deduction.parent().parent().removeClass('has-error');
            result +='1';
      }
      if(deductionVal.val()==''){
              deductionVal.parent().parent().addClass('has-error');
      }else{
             deductionVal.parent().parent().removeClass('has-error');
            result +='1';
      }
      if(total.val()==''){
              total.parent().parent().addClass('has-error');
      }else{
             total.parent().parent().removeClass('has-error');
            result +='1';
      }
		    // alert(total.val());
			    
			if(result=='11111111111111'){
           product = product.text();
           productVal = productVal.text();
           sup = sup.text();
           bro = bro.text();
           supVal = supVal.val();
           broVal = broVal.val();
           dt = dt.val();
           kweight = kweight.val();
           crec = crec.val();
           brec = brec.val();
           type = type.text();
           btype = btype.text();
           typeVal = typeVal.val();
           btypeVal = btypeVal.val();
           no = no.val();
           weight = weight.val();
           deduction = deduction.val();
           deductionVal = deductionVal.val();
           total = total.val();
           inv_no = inv_no.val();
           // alert(weight);
			    itemList.push([type,btype,typeVal,btypeVal,no,weight,deduction,deductionVal,total,count,product,productVal,sup,bro,supVal,broVal,dt,crec,brec,inv_no,kweight]);
            
        
    			var html = '';
    			var i;
                var subTotal=0;
                    
    			for(i=0; i<itemList.length; i++){
                    if(itemList[i]!='')
                    {
    				html +='<tr id='+itemList[i][9]+'>'+
                        '<td>'+itemList[i][19]+'</td>'+
                        '<td>'+itemList[i][16]+'</td>'+
                        '<td>'+itemList[i][12]+'</td>'+
                        '<td>'+itemList[i][17]+'</td>'+
                        '<td>'+itemList[i][13]+'</td>'+
                        '<td>'+itemList[i][18]+'</td>'+
                        '<td>'+itemList[i][10]+'</td>'+
                        '<td>'+itemList[i][0]+'</td>'+
                        '<td>'+itemList[i][1]+'</td>'+
                        '<td>'+itemList[i][4]+'</td>'+
                        '<td>'+itemList[i][5]+'</td>'+
                        '<td>'+itemList[i][6]+'</td>'+
                        '<td>'+itemList[i][7]+'</td>'+
                        '<td>'+itemList[i][20]+'</td>'+
                        '<td>'+itemList[i][8]+'</td>'+
                    
                         '<td>' +
                            '<a class="zmdi zmdi-delete item-delete delete" style="color:red;cursor: pointer;">' +'Remove' +'</a>' +
                            '</td>'
                           
                        

    							
    					    '</tr>';
    			}}
                   count++;
    			$('#showItem').html(html);	
          $('#myForm')[0].reset();
          $('input[name=inv_no]').val(<?php echo mt_rand(0,100); ?>);
			
            }
		});
    
    
     $('#showItem').on('click', '.delete', function() {
         $(this).parent().parent('tr').remove();
         var m=$(this).parent().parent('tr').attr('id');
     
          // alert(m);
          if(itemList.length > 0){
                 
         if(itemList[m][11]==m){
       itemList[m]=[];
       };
          }
          else{
              itemList = [];
              
          }
   

        });
    
       $('#btnConfirm').click(function(){
	      var url = $('#myForm').attr('action');
          var data = $('#myForm').serialize();
           
          alert(url);
			if(itemList.length>0){
            $.ajax({
                type:'POST',
                url:url,
                data:{itemList:itemList},
                datatype:"JSON",
                success:function(responce)
                {    
                $('#myForm')[0].reset();
                $('#Modal_Edit').modal('hide');
                $('.alert-success').html('Purchase  Added successfully').fadeIn().delay(4000).fadeOut('slow'); 
                    itemList = [];
                    
                },
                error:function()
                {
                    $('.alert-danger').html('Purchase Not  Added!').fadeIn().delay(4000).fadeOut('slow');
                }
            });
            }
           
       
   });



		//product
	 $("#product_id").change(function () {
         
    var baseURL= "<?php echo base_url();?>";
			var id = $('.product_name').val();
        
			$.ajax({
				type: 'ajax',
				method:'get',
				url:'<?=base_url()?>index.php/Purchase/getPrice',
				data:{id:id},
				async: false,
				dataType: 'json',
				success: function(data){

					var html =  '<select class="form-control showPrice" name="showPrice" id="showPrice">';				
				
					var i;
					for(i=0; i<data.length; i++){
                        var tp = data[i].tp
                        var unitInPack = data[i].pack_qty
                        
						html += '<option value="'+data[i].tp+'">'+data[i].tp+'</option>';
                     
					}
                       
                  
					html += '</select>';
					$('#showPrice').html(html);
                    
                    var qty = $('input[name=qty_p]').val();
                    
		              var total;
		    
                    if(tp != '' && qty !=''){
		              total = qty * tp;
		    }
		    $('input[name=total]').val(total);
            $('input[name=backUpTotal]').val(total);
                    
            $("#qty_p").keyup(function(){
		   
		    var qty = $('input[name=qty_p]').val();
		    var total;
		    
		      if(tp != '' && qty !=''){
		      total = qty * tp;
		    }
		    $('input[name=total]').val(total);
            $('input[name=backUpTotal]').val(total);
		  
		    
		});
         // Quantity Log
            $("#qty_p").keyup(function(){
		   
		    var qty_p = $('input[name=qty_p]').val();
		    var total;
		    
		      if(unitInPack != '' && qty_p !=''){
		      qty_log = qty_p * unitInPack;
		    }
		    $('input[name=qty_l]').val(qty_log);
		    
		});
        
            // On Change Qty Loss
            $("#qty_l").keyup(function(){
		   
		    var qty_l = $('input[name=qty_l]').val();
		    var total;
		    
		      if(unitInPack != '' && qty_l !=''){
		      qty_log =  Math.round(qty_l/unitInPack,2);
		      pricePerUnit = tp/unitInPack;
		      total = qty_l*pricePerUnit;
		    }
		    $('input[name=qty_p]').val(qty_log);
		    $('input[name=total]').val(total);
            $('input[name=backUpTotal]').val(total);
		    
		});
                
                    
            // On change GST
              $("#gst").keyup(function(){
		       var gst= $('input[name=gst]').val();
              var qty_p= $('input[name=qty_p]').val();
              var total;
		      if(gst!= ''){
		      var count_gst=gst*qty_p;
              var total_price=qty_p*tp+count_gst;

		    }
		     $('input[name=total]').val(total_price);
		    
		});

				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		});
    
                 
              // On change GST%
              $("#gst_per").keyup(function(){
                 
                var total= $('input[name=total]').val();
                var backUpTotal= $('input[name=backUpTotal]').val();
		       var gst= $('input[name=gst_per]').val();
               var qty_p= $('input[name=qty_p]').val();
               var tp= $('select[name=showPrice]').val();
               
               var total;
		       if(gst!= ''){
                $("#gst").attr("disabled", true);
		       var count_gst=(gst/100*tp)*qty_p;
               var total_price=parseFloat(total) + parseFloat(count_gst);
               $('input[name=total]').val(total_price);
                $('input[name=gst]').val(count_gst);
                   
		    }
                  else{
                     
                       $('input[name=total]').val(backUpTotal);
                        $('input[name=gst]').val(0);
                        $("#gst").attr("disabled", false);
                  }
		    
		    
		});
    
    
            // On change Amount%
                   // On change GST%
              $("#gst").keyup(function(){
                 
                var total= $('input[name=total]').val();
                var backUpTotal= $('input[name=backUpTotal]').val();
		        var gst= $('input[name=gst]').val();
              
		       if(gst!= ''){
                   
                $("#gst_per").attr("disabled", true);
		        var count_gst=(gst * 100)/total;
                   //alert(count_gst);
               var total_price=parseFloat(total) + parseFloat(gst);
               $('input[name=total]').val(total_price);
                $('input[name=gst_per]').val(count_gst);
                   
		    }
                  else{
                     
                  
                       $('input[name=total]').val(000);
                      $("#gst_per").attr("disabled", false);
                  }
		    
		    
		});
    
    
            // On change %
              $("#to_amount").keyup(function(){
		       var to_amount= $('input[name=to_amount]').val();
               var qty_p= $('input[name=qty_p]').val();
               var tp= $('select[name=showPrice]').val();
               
               var total;
		       if(qty_p!='' && tp!=''){
		      var countAmount=to_amount*qty_p;
              var total_price=qty_p*tp+countAmount;
		    }
		     $('input[name=total]').val(total_price);
		    
		});
   
    
            
    
    
            // Discount%
              $("#discount_amount").keyup(function(){
		       var discount_amount= $('input[name=discount_amount]').val();
               var qty_p= $('input[name=qty_p]').val();
               var tp= $('select[name=showPrice]').val();
              
               var total;
		       if(qty_p!='' && tp!=''){
		      var countDiscount=discount_amount*qty_p;
              var total_price=(qty_p*tp)-countDiscount;
		    }
		     $('input[name=total]').val(total_price);
             //alert(total_price);
		    
		});
    
    
          // On change Discount%
                    
              $("#per_discount").keyup(function(){
                 
                  
               var per_discount= $('input[name=per_discount]').val();
                
                var backUpTotal= $('input[name=backUpTotal]').val();
                var total= $('input[name=total]').val();
        
                   if(per_discount !=''){
                       
                $("#discount_amount").attr("disabled", true);  
                var count_dis=(per_discount/100) * total;
                    
               var total_price=(total)-(count_dis);
                $('input[name=total]').val(total_price);
             
             $('input[name=discount_amount]').val(count_dis);
                   }
                   
                  else{
                      
                    $('input[name=total]').val(backUpTotal);
                    $("#discount_amount").attr("disabled", false); 
                    $('input[name=discount_amount]').val(0);
                  }
		     
		    
		   
		     });
    
    
         // Bonus%
              $("#bonus").keyup(function(){
		       var bonus= $('input[name=bonus]').val();
               var qty_p= $('input[name=qty_p]').val();
               var tp= $('select[name=showPrice]').val();
              
               var total;
		       if(qty_p!='' && tp!=''){
		      var countBonus=bonus*qty_p;
              var total_price=(qty_p*tp)-countBonus;
		    }
		     $('input[name=total]').val(total_price);
             //alert(total_price);
		    
		});

});
</script>



</body>
</html>
