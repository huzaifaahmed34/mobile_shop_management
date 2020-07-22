 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="elegant admin template"></span>
                <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li><a href="<?php echo site_url('');?>">Dashboard<i =></i></a></li>

                         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-shopping-cart"></i><span class="hide-menu">Quick Sale </span></a>
                            <ul aria-expanded="false" class="collapse">
                                
                                   <li><a href="<?php echo site_url('Purchase');?>">Add/View Quick Sale <i class="ti-wallet"></i></a></li>

                  
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layers"></i><span class="hide-menu">Product</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                 <li><a href="<?php echo site_url('Product');?>">Add/View Product <i class="ti-package"></i></a></li>
                                
    
                 <li><a href="<?php echo site_url('Purchase/ViewStock');?>">Update Current Stock <i class="ti-package"></i></a></li>
                  
                            </ul>
                        </li>
                  
                   
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-shopping-cart"></i><span class="hide-menu">Expense</span></a>
                            <ul aria-expanded="false" class="collapse">
                                
                                   <li><a href="<?php echo site_url('Expense');?>">Add/View Expense<i class="ti-wallet"></i></a></li>

                  
                            </ul>
                        </li>
                   
                         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">Voucher</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
       <li><a href="<?php echo site_url('Voucher/PaymentVoucher');?>">Payment Voucher <i class="ti-credit-card"></i></a>
                  
                            </ul>
                        </li>

  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-receipt"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">

                                     <li><a href="<?php echo site_url('Report');?>">
                                        Customer Debt Report <i class="ti-receipt"></i></a></li>
                           
      
                  
                            </ul>
                        </li>
                  
                   
                      
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('City');?>">Add/View City <i class="icon-puzzle"></i></a></li>
                                <li><a href="<?php echo site_url('Areas');?>">Add/View Area <i class="icon-drawar"></i></a></li>
                                <li><a href="<?php echo site_url('Customer');?>">Add/View Customer <i class="ti-user"></i></a></li>
                                  <li><a href="<?php echo site_url('Dealer');?>">Add/View Dealer <i class="ti-user"></i></a></li>

               
                </ul></li>
                  
                   
                        <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="ti ti-lock text-success"></i><span class="hide-menu">Log Out</span></a></li>
                     
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->