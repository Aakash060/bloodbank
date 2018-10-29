<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blood Bank System</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

  <!-- Bootstrap -->
  <link href="<?php echo base_url('/assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('/assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('/assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('/assets/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url('/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url('/assets/vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('/assets/vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('/assets/build/css/custom.min.css'); ?>" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo site_url('dashboard'); ?>" class="site_title"><i class="fa fa-hospital-o"></i> <span>Blood Bank System</span></a>
          </div>

          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_info">
              <span>Welcome,<?php echo $this->session->userdata('name'); ?></span>
            </div>
          </div>
          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-plus-square"></i>Add blood info</a></li>
                <li><a href="<?php echo site_url('availablebloodsamples'); ?>"><i class="fa fa-users"></i>Available blood samples</a></li>
                <li><a href="<?php echo site_url('viewrequests'); ?>"><i class="fa fa-list-alt"></i>View requests</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user">  <?php echo $this->session->userdata('name'); ?></i>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo site_url('bloodbank/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
       <div class="container">
        <?php if ($this->session->userdata('type') == 0) {?>
          <form method="POST" id="bloodInfo" name="bloodInfo" action="<?php echo site_url('bloodbank/insertbloodInfo'); ?>">
           <br><br><b>Available Blood Samples:</b><br><br><textarea rows="4" cols="80" style="width:400px;" name="availableSamples" id="availableSamples" placeholder="Enter available blood samples"></textarea><br><br>

           <b>Blood Sample Type:</b><br><br><textarea rows="4" cols="80" style="width:400px;" name="sampleType" id="sampleType" placeholder="Enter blood sample type"></textarea><br><br>

           <b>Quantity</b>: <br><br><input type="number" name="quantity" id="quantity" placeholder="Enter quantity (in numbers)" style="width:400px;height: 50px;"><br><br>
           <input type="submit" name="send" id="send" value="Submit" class="btn btn-success" onclick="addBloodInfo()">
         </form>
       <?php } else {?>
        <tr><script type="text/javascript">swal({ title: "You may redirected to available blood samples!",text: "You don't have permission to access this page, only hospital can access this page!"});
        window.setTimeout(function(){
          window.location.href="http://localhost/bloodbank/index.php/availablebloodsamples";
        }, 3000);
      </script><?php }?>
    </div>

  </div>
</div>
</div>
<!-- /page content -->

<footer>
  <div class="pull-right">
    &copy;Aakash Sabharwal
  </div>
  <div class="clearfix"></div>
</footer>
</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('/assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('/assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('/assets/vendors/fastclick/lib/fastclick.js'); ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('/assets/vendors/nprogress/nprogress.js'); ?>"></script>
<!-- Chart.js -->
<script src="<?php echo base_url('/assets/vendors/Chart.js/dist/Chart.min.js'); ?>"></script>
<!-- gauge.js -->
<script src="<?php echo base_url('/assets/vendors/gauge.js/dist/gauge.min.js'); ?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url('/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('/assets/vendors/iCheck/icheck.min.js'); ?>"></script>
<!-- Skycons -->
<script src="<?php echo base_url('/assets/vendors/skycons/skycons.js'); ?>"></script>
<!-- Flot -->
<script src="<?php echo base_url('/assets/vendors/Flot/jquery.flot.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/Flot/jquery.flot.pie.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/Flot/jquery.flot.time.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/Flot/jquery.flot.stack.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/Flot/jquery.flot.resize.js'); ?>"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url('/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/flot-spline/js/jquery.flot.spline.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/flot.curvedlines/curvedLines.js'); ?>"></script>
<!-- DateJS -->
<script src="<?php echo base_url('/assets/vendors/DateJS/build/date.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('/assets/vendors/jqvmap/dist/jquery.vmap.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('/assets/vendors/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendors/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('/assets/build/js/custom.min.js'); ?>"></script>

<script type="text/javascript">
  function addBloodInfo() {
    var availableSamples=$("#availableSamples").val();
    var sampleType=$("#sampleType").val();
    var quantity=$("#quantity").val();

    if(availableSamples=='' || availableSamples.length==0){
      swal("Please enter available samples");
      return false;
    }
    if(sampleType=='' || sampleType.length==0){
      swal("Please enter a sample type");
      return false;
    }
    if(quantity=='' || quantity.length==0){
      swal("Please enter quantities to proceed");
      return false;
    }
    if(availableSamples!='' || availableSamples.length!=0 & sampleType!='' || sampleType.length!=0 & quantity!='' || quantity.length!=0){
      swal({ title: "Good job",text: "Record inserted !",timer: 5000, showConfirmButton: true, closeOnConfirm: true, type:"success" });
    }

    $('#bloodInfo').submit();
  }
</script>

</body>
</html>
