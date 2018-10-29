<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blood Bank System | Forgot Password</title>

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
            <h1>Forgot Password</h1>
            <div>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
            </div>
            <div>
              <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="Enter new password" required/>
            </div>
            <div>
              <a class="btn btn-default submit"  onclick="resetPassword()">Submit</a>
              <a class="btn btn-default submit" href="<?php echo site_url('bloodbank'); ?>">Log in</a>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function resetPassword() {

      var selectedEmail=$("#email").val();
      var selectedPassword=$("#newPassword").val();

      if(selectedEmail==''){
        swal("Email cannot be blank");
      }
      if(selectedPassword==''){
        swal("Please enter a password to proceed");
      }

      if(selectedPassword!='' & selectedEmail!=''){
        swal({title: "Good job", text: "Password Changed Successfully!", type: "success"},
          function(){
            location.reload();
          });
      }

      $.ajax({
        url:'<?php echo site_url('bloodbank/resetPassword'); ?>',
        type:'POST',
        data:{
          email:selectedEmail,
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
