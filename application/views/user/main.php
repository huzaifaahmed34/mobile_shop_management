<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2019 17:28:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <title>Mobile Shop</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin/" />
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?php echo base_url(); ?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="<?php echo base_url(); ?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
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
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <button type="button" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
            
                 
                    <!-- card -->
                    <div class="card">
                        <div class="p-20 p-t-25">
                            <h4 class="card-title">Reports</h4>
                        </div>
                         <div class="row">
 
                                        <div class="col-md-5">
                                    <div class="form-group m-b-40 p-l-15 p-r-15 ">
                                        <input type="date" class="form-control" id="from_date" name="from_date">
                                        <span class="bar"></span>
                                        <span for="city_code">From  Date</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group m-b-40 p-l-15 p-r-15 ">
                                        <input type="date" class="form-control" id="to_date
                                      " name="to_date">
                                        <span class="bar"></span>
                                        <span for="a_name">To Date</span>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group m-b-40 p-l-15 p-r-15 ">
                                        <button class="btn btn-success" id="btnAddCity" type="button"> Check Report</button>
                                    </div>
                                    </div>
                               </div>
                        <div class=row>
                             <div class=col-md-4>
                        <div class="d-flex no-block p-15 align-items-center">
                            <div class="round round-info"><i class="icon-wallet font-16"></i></div>
                            <div class="m-l-10 ">
                                <h3 class="m-b-0" id=sale><?php
                                $date=date('Y-m-d');
        $qry=$this->db->query("SELECT sum(net_price) as t,sum(discount) as d FROM `purchase` WHERE is_deleted=0 and created_on='$date'")->result();
        foreach ($qry as $q) {
               if($q->t!=''){
                echo $q->t+$q->d;
 }else{
echo 0;
        }
            
        }
                                ?>
                                </h3>
                                <h6 class="text-muted font-light m-b-0">SALE</h6> </div>
                        </div></div>

                        <hr> <div class=col-md-4>
                        <div class="d-flex no-block p-15 align-items-center">
                            <div class="round round-primary"><i class="icon-umbrella font-16"></i></div>
                            <div class="m-l-10">
                                <h3 class="m-b-0" id=debt><?php
                            
        $qry=$this->db->query("SELECT (select sum(amount) as t FROM `transaction` WHERE  date='$date' and type='Debt') as debt,
            (
select sum(amount) as t FROM `transaction` WHERE  date='$date' and remarks='Voucher'
        ) as voucher")->result();
        foreach ($qry as $q) {
             if($q->debt!=''){
                echo $q->debt-$q->voucher;
  }else{
echo 0;
        }
            
        }
                                ?></h3>
                                <h6 class="text-muted font-light m-b-0">Debt</h6></div>
                        </div></div>
                        <hr>
                        <div class=col-md-4>
                        <div class="d-flex no-block p-15 m-b-15 align-items-center">
                            <div class="round round-danger"><i class="icon-chart font-16"></i></div>
                            <div class="m-l-10">
                          <h3 class="m-b-0" id=expense><?php
                              $expense=0; 

        $qry=$this->db->query("SELECT sum(amount) as t FROM expense WHERE  date='$date' and is_deleted=0")->result();
        foreach ($qry as $q) {
            if($q->t!=''){echo $q->t;
        $expense+=$q->t;
    }else{
echo 0;
        }
    }
                                ?></h3>
                                <h6 class="text-muted font-light m-b-0">Expense</h6></div>
                        </div></div>
                    </div>
                     <div class=row>
                             <div class=col-md-4>
                        <div class="d-flex no-block p-15 align-items-center">
                            <div class="round round-info"><i class="icon-wallet font-16"></i></div>
                            <div class="m-l-10 ">
                                <h3 class="m-b-0" id=profit><?php
                        $total=0;

        $qry=$this->db->query("SELECT pt.purchase_price,p.qty,p.net_price FROM `purchase` as p ,product as pt WHERE pt.id=p.product_id and  p.created_on='$date' and p.is_deleted=0")->result();
        foreach ($qry as $q) {
            $total+=($q->net_price-($q->purchase_price*$q->qty));
        
    }
echo $total;
    ?>
                                </h3>
                                <h6 class="text-muted font-light m-b-0">Profit</h6> </div>
                        </div></div>

                        <hr> <div class=col-md-4>
                        <div class="d-flex no-block p-15 align-items-center">
                            <div class="round round-primary"><i class="icon-umbrella font-16"></i></div>
                            <div class="m-l-10">
                                <h3 class="m-b-0" id=nprofit><?php
                        $total=0;

        $qry=$this->db->query("SELECT pt.purchase_price,p.qty,p.net_price FROM `purchase` as p ,product as pt WHERE pt.id=p.product_id and  p.created_on='$date' and p.is_deleted=0")->result();
        foreach ($qry as $q) {
            $total+=($q->net_price-($q->purchase_price*$q->qty));
        
    }
echo $total-$expense;
    ?>
                  </h3>
                                <h6 class="text-muted font-light m-b-0">Profit (Including Expense)</h6></div>
                        </div></div>
                        <hr>
                        <div class=col-md-4>
                       
                                        </div>
                    </div>
                </div>
                                <!-- ============================================================== -->
                <!-- Yearly Sales -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card oh">
                            <div class="card-body">
                                <div class="d-flex m-b-30 align-items-center no-block">
                                    <h5 class="card-title ">Yearly Sales</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12">
                                            <li><i class="fa fa-circle text-info"></i> Iphone</li>
                                            <li><i class="fa fa-circle text-primary"></i> Ipad</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart" style="height: 350px;"></div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row text-center m-b-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">6000</h2><span class="text-muted">Total sale</span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">4000</h2><span class="text-muted">Iphone</span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">2000</h2><span class="text-muted">Ipad</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Today's Schedule</h5>
                                <h6 class="card-subtitle">check out your daily schedule</h6>
                                <div class="steamline m-t-40">
                                    <div class="sl-item">
                                        <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                            <div class="desc">you can write anything </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium">Send documents to Clark</div>
                                            <div class="desc">Lorem Ipsum is simply </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url(); ?>assets/images/users/1.jpg"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium">John Doe <span class="sl-date"> 5pm</span></div>
                                            <div class="desc">Call today with gohn doe </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url(); ?>assets/images/users/2.jpg"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                            <div class="desc">Contrary to popular belief</div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url(); ?>assets/images/users/3.jpg"> </div>
                                        <div class="sl-right">
                                            <div><a href="#">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span></div>
                                            <div class="desc">Approve meeting with tiger
                                                <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Apporve</a> <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Refuse</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- News -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- column -->
                        <div class="card news-slide" style="background:url(<?php echo base_url(); ?>assets/images/background/img5.jpg) center center / cover;">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active carousel-item">
                                        <div class="carousel-caption">
                                            <span class="label label-danger label-rounded">News</span>
                                            <h3 class="m-t-5 font-light">Market Stock exchange status</h3>
                                            <p class="op-5">It has survived not only five centuries, but also the leap into electronic typesetting</p>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 m-t-10">
                                                    <h4 class="m-b-0 text-success"><i class="ti-arrow-up"></i>350</h4><span class="text-muted">Reliance</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 m-t-10">
                                                    <h4 class="m-b-0 text-danger"><i class="ti-arrow-down"></i>-150</h4><span class="text-muted">Birla</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 m-t-10">
                                                    <h4 class="m-b-0 text-success"><i class="ti-arrow-up"></i>650</h4><span class="text-muted">Tata</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="carousel-caption">
                                            <span class="label label-danger label-rounded">Personal</span>
                                            <h4 class="m-t-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-rounded">Read More</a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="carousel-caption">
                                            <span class="label label-info label-rounded">Design</span>
                                            <h4 class="m-t-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-rounded">comming...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">Product A Revenue</h5>
                                        <div class="stats-row m-t-20 m-b-20">
                                            <div class="stat-item">
                                                <h6>Growth</h6> <b>80.40%</b></div>
                                            <div class="stat-item">
                                                <h6>Montly</h6> <b>20.40%</b></div>
                                            <div class="stat-item">
                                                <h6>Daily</h6> <b>5.40%</b></div>
                                        </div>
                                    </div>
                                    <div id="sales1"></div>
                                </div>
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-info">Product B Revenue</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="m-t-20 m-b-20">
                                                    <h6>Yearly</h6>
                                                    <b>80.40%</b>
                                                </div>
                                                <div class="m-t-20 m-b-20">
                                                    <h6>Montly</h6>
                                                    <b>5.40%</b>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <div id="sales2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                        <!-- column -->
                    </div>
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Sales Overview</h5>
                                        <h6 class="card-subtitle">Check the monthly sales </h6>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="custom-select b-0">
                                            <option>January</option>
                                            <option value="1">February</option>
                                            <option value="2" selected="">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>March 2017</h3>
                                        <h5 class="font-light m-t-0">Report for this month</h5></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success">$3,690</h2></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td><span class="badge badge-success badge-pill">sale</span> </td>
                                            <td class="txt-oflo">April 18, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="txt-oflo">Real Homes WP Theme</td>
                                            <td><span class="badge badge-info badge-pill">extended</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="txt-oflo">Ample Admin</td>
                                            <td><span class="badge badge-info badge-pill">extended</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="txt-oflo">Medical Pro WP Theme</td>
                                            <td><span class="badge badge-danger badge-pill">tax</span></td>
                                            <td class="txt-oflo">April 20, 2017</td>
                                            <td><span class="text-danger">-$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="txt-oflo">Hosting press html</td>
                                            <td><span class="badge badge-success badge-pill">sale</span></td>
                                            <td class="txt-oflo">April 21, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="txt-oflo">Digital Agency PSD</td>
                                            <td><span class="badge badge-success badge-pill">sale</span> </td>
                                            <td class="txt-oflo">April 23, 2017</td>
                                            <td><span class="text-danger">-$14</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td><span class="badge badge-warning badge-pill">member</span></td>
                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td><span class="badge badge-warning badge-pill">member</span></td>
                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td class="txt-oflo">Ample Admin</td>
                                            <td><span class="badge badge-info badge-pill">extended</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- To do chat and message -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h5 class="card-title m-b-0">Task list</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="float-right btn btn-circle btn-success" data-toggle="modal" data-target="#myModal"><i class="ti-plus"></i></button>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- To do list widgets -->
                                <!-- ============================================================== -->
                                <div class="to-do-widget m-t-20">
                                    <!-- .modal for add task -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Task</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Task name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Task Name"> </div>
                                                        <div class="form-group">
                                                            <label>Assign to</label>
                                                            <select class="custom-select form-control float-right">
                                                                <option selected="">Sachin</option>
                                                                <option value="1">Sehwag</option>
                                                                <option value="2">Pritam</option>
                                                                <option value="3">Alia</option>
                                                                <option value="4">Varun</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</span> <span class="badge badge-pill badge-danger float-right">Today</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto">
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">
                                                    <span>Lorem Ipsum is simply dummy text of the printing</span><span class="badge badge-pill badge-primary float-right">1 week </span>
                                                </label>
                                            </div>
                                            <div class="item-date"> 26 jun 2017</div>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">
                                                    <span>Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto">
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">
                                                    <span>Lorem Ipsum is simply dummy text of the printing </span> <span class="badge badge-pill badge-warning float-right">2 weeks</span>
                                                </label>
                                            </div>
                                            <div class="item-date"> 26 jun 2017</div>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">
                                                    <span>Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto">
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li><img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Messages (5 New)</h5>
                                <div class="message-box">
                                    <div class="message-widget message-scroll">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <span class="round">A</span> <span class="profile-status away float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">Simply dummy text of the printing and typesetting industry.</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Welcome to the elite Admin</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chat</h5>
                                <div class="chat-box">
                                    <!--chat Row -->
                                    <ul class="chat-list">
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>James Anderson</h5>
                                                <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                            </div>
                                            <div class="chat-time">10:56 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>Bianca Doe</h5>
                                                <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                            </div>
                                            <div class="chat-time">10:57 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li class="odd">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse">I would love to join the team.</div>
                                                <br>
                                            </div>
                                            <div class="chat-time">10:58 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>Angelina Rhodes</h5>
                                                <div class="box bg-light-info">Well we have good budget for the project</div>
                                            </div>
                                            <div class="chat-time">11:00 am</div>
                                        </li>
                                        <!--chat Row -->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea placeholder="Type your message here" class="form-control border-0"></textarea>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme working">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      
   <script>
    $(function(){
        //function


       var list=[];


        function showReport(){
        var from_date=$('input[name=from_date]').val();
              var to_date=$('input[name=to_date]').val();
             
  
          var url='<?php echo site_url('Report/showDashboardReport')?>';
   

          if(to_date==''){
          to_date=from_date;
        } 
            $.ajax({
                type: 'ajax',
      method:'get',
        data:{'from_date':from_date,'to_date':to_date},
                 url: '<?php echo site_url('Report/showDashboardReport')?>',
              async:false,
                dataType: 'json',
                success: function(data){

                    var html = '';
                    var i;
            
        
                    for(i=0; i<data.length; i++){

 $('#sale').html(parseInt(data[i].net_price)+parseInt(data[i].discount));
 $('#debt').html(data[i].debt_amount-data[i].voucher_amount);
  $('#expense').html(data[i].expense_amount);
             $('#profit').html(data[i].purchase_discount-data[i].purchase_price);
             $('#nprofit').html(data[i].purchase_discount-data[i].purchase_price-data[i].expense_amount);
                        
                    }
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }
        
      

   $('#btnAddCity').click(function(){
   
        showReport();
   }); 
        
        $('#btnCancel').click(function(){
$('#showcity').html('');
$('#from_date').val('');
$('input[name=to_date]').val('');
        });

    })
    </script>
