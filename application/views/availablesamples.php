<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blood Bank System | Available Blood Samples</title>

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
  <style type="text/css">
  table {
    counter-reset: tableCount;
  }
  .counterCell:before {
    content: counter(tableCount);
    counter-increment: tableCount;
  }
</style>
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
          <h2>Available Blood Samples</h2>

          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Available Blood Sample</th>
                    <th>Hospital Name</th>
                    <th>Available Blood Type</th>
                    <th>Available Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($sample) > 0) {?>
                   <?php foreach ($sample as $row) {?>
                    <tr>
                      <th scope="row" class="counterCell"></th>
                      <td><?php echo $row->samples; ?></td>
                      <td><?php echo $row->hospital_name; ?></td>
                      <td><?php echo $row->bloodtype; ?></td>
                      <td><?php echo $row->quantity; ?></td>
                      <td><button type="button" class="btn btn-primary requestSample" data-for="<?php echo $row->type; ?>" data-toggle="modal" data-target="#exampleModalCenter">Request Sample</button></td>
                    </tr>
                  <?php }} else {?>
                    <tr><td colspan="5">No sample(s) found.....</td></tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Request Samples</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" id="bloodInfo" name="bloodInfo" action="<?php echo site_url('availablebloodsamples/requestedSamples'); ?>">
               <b>Quantity</b>: &ensp;&ensp;&ensp;<input type="number" name="quantity" id="quantity" placeholder="Enter quantity (in numbers)" style="width:400px;height: 30px;" required><br><br>
               <b>Description</b>: <input type="text" name="description" id="description" placeholder="Enter description about sample you want ..." style="width:400px;height: 100px;" required>
             </form>

           </div>
           <div class="modal-footer">
            <button type="submit" class="btn btn-success submitBtn" data-dismiss="modal">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        &copy;Aakash Sabharwal
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
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
  $('.requestSample').on('click',function(){
    var selectedBtn=$(this).data('for');

    if (<?php echo $this->session->userdata('type'); ?>!=selectedBtn) {

      $('.submitBtn').on('click',function(){
        var quantity=$("#quantity").val();
        var description=$("#description").val();

        if(quantity=='' || quantity.length==0){
          swal("Please enter how much quantity do you want?");
          return;
        }
        if (quantity!='' || quantity.length!=0) {
          swal({ title: "Sample requested!"});
          window.setTimeout(function(){
            location.reload();
          }, 3000);
        }

        $.ajax({
          url:'<?php echo site_url('availablebloodsamples/requestedSamples'); ?>',
          type:'POST',
          data:{
            quantity:quantity,
            description:description,
          },

          success: function(data){
            console.log(data);
          },

          fail: function(){
            alert("Unable to fetch Stats");
            return true;
          }
        });

      });

    }
    else{
      alert("You don't have permission to request samples, only receiver can request samples!");
      location.reload();
      return;
    }
  });
</script>

</body>
</html>
