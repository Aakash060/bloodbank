<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blood Bank System | Receiver Registration</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

  <!-- jQuery -->
  <script src="<?php echo base_url('/assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('/assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('/assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('/assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url('/assets/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('/assets/build/css/custom.min.css'); ?>" rel="stylesheet">
</head>

<body class="login">
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form>
            <h1>Receiver Registration</h1>
            <div>
              <input type="name" id="name" name="name" class="form-control" placeholder="Name" required/><br>
            </div>
            <div>
              <input type="address" id="address" name="address" class="form-control" placeholder="Address" required/><br>
            </div>
            <div>
              <input type="text" id="number" name="number" class="form-control" placeholder="Mobile Number" required/>
            </div>
            <div>
              <input type="text" id="bloodgroup" name="bloodgroup" class="form-control" placeholder="Blood Group" required/>
            </div>
            <div>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
            </div>
            <div>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required/>
            </div>
            <div>
              <a class="btn btn-default submit"  onclick="registerReceiver()">Submit</a>
              <a class="btn btn-default submit" href="<?php echo site_url('bloodbank'); ?>">Back to Log in</a>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function registerReceiver() {

      var selectedName=$("#name").val();
      var selectedAddress=$("#address").val();
      var selectedNumber=$("#number").val();
      var selectedBloodgroup=$("#bloodgroup").val();
      var selectedEmail=$("#email").val();
      var selectedPassword=$("#password").val();

      if(selectedName=='' || selectedName.length==0){
        swal("Name cannot be blank");
      }
      if(selectedAddress=='' || selectedAddress.length==0){
        swal("Address cannot be blank");
      }
      if(selectedNumber=='' || selectedNumber.length==0){
        swal("Please enter your mobile number");
      }
      if(selectedBloodgroup=='' || selectedBloodgroup.length==0){
        swal("Bloodgroup cannot be blank");
      }
      if(selectedEmail=='' || selectedEmail.length==0){
        swal("Email cannot be blank");
      }
      if(selectedPassword=='' || selectedPassword.length==0){
        swal("Please enter a password to proceed");
      }

      if(selectedName!='' & selectedAddress!='' & selectedNumber!='' & selectedBloodgroup!='' & selectedPassword!='' & selectedEmail!='' ){
        swal({title: "Good job", text: "Account Created Successfully!", type: "success"},
          function(){
            window.location.href="http://localhost/bloodbank/";
          });
      }

      $.ajax({
        url:'<?php echo site_url('bloodbank/registerUser'); ?>',
        type:'POST',
        data:{
          name:selectedName,
          address:selectedAddress,
          bloodgroup:selectedBloodgroup,
          email:selectedEmail,
          mobile:selectedNumber,
          password:selectedPassword,
        },

        success: function(data){
          console.log(data);
        },

        fail: function(){
          alert("Unable to fetch Stats");
          return true;
        }
      });
    }

  </script>

</body>
</html>
