<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blood Bank System | Login</title>

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
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" id="formUserLogin" name="formUserLogin" action="<?php echo site_url('bloodbank/getUsersData'); ?>">
            <h1>Login</h1>
            <div>
              <input type="email" id="emailLogin" name="emailLogin" class="form-control" placeholder="Email" required/>
            </div>
            <div>
              <input type="password" id="passwordLogin" name="passwordLogin" class="form-control" placeholder="Password" required/>
            </div>
            <div>
              <a class="btn btn-default submit" onclick="loginInput()">Log in</a>
              <a class="reset_pass" href="<?php echo site_url('forgotpassword'); ?>">Forgot Password</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
                <a href="#signup" class="to_register"> Hospital Registration</a>
                <a class="to_register" href="<?php echo site_url('receiverregistration'); ?>">Receiver Registration</a>
              </p>

              <div class="clearfix"></div>
              <br />
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Hospital Registration</h1>
            <div>
              <input type="name" id="name" name="name" class="form-control" placeholder="Name" required/><br>
            </div>
            <div>
              <input type="address" id="address" name="address" class="form-control" placeholder="Address" required/><br>
            </div>
            <div>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
            </div>
            <div>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
            </div>
            <div>
              <input type="text" id="number" name="number" class="form-control" placeholder="Mobile Number" required/>
            </div>
            <div>
              <a class="btn btn-default submit"  onclick="signupInput()">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register">Back to Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />
            </div>
          </form>
        </section>
      </div>
      <?php if ($this->session->flashdata('message_name')) {?>
       <script type="text/javascript">
         swal({   title: "Invalid Login Credentials!",timer: 5000, showConfirmButton: true, closeOnConfirm: true, type:"error" });
       </script>
     <?php }?>
   </div>
 </div>

 <script type="text/javascript">
  function signupInput() {

    var selectedName=$("#name").val();
    var selectedAddress=$("#address").val();
    var selectedEmail=$("#email").val();
    var selectedPassword=$("#password").val();
    var selectedNumber=$("#number").val();

    if(selectedName=='' || selectedName.length==0){
      swal("Name cannot be blank");
    }
    if(selectedAddress=='' || selectedAddress.length==0){
      swal("Address cannot be blank");
    }
    if(selectedEmail=='' || selectedEmail.length==0){
      swal("Email cannot be blank");
    }
    if(selectedPassword=='' || selectedPassword.length==0){
      swal("Please enter a password to proceed");
    }
    if(selectedNumber=='' || selectedNumber.length==0){
      swal("Please enter your mobile number");
    }

    if(selectedName!='' & selectedAddress!='' & selectedNumber!='' & selectedPassword!='' & selectedEmail!='' ){
      swal({title: "Good job", text: "Account Created Successfully!", type: "success"},
        function(){
            window.location.href="http://localhost/bloodbank/";
        });
    }

    $.ajax({
      url:'<?php echo site_url('bloodbank/createAccount'); ?>',
      type:'POST',
      data:{
        name:selectedName,
        address:selectedAddress,
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

  function loginInput() {
    var loginEmail=$("#emailLogin").val();
    var loginPassword=$("#passwordLogin").val();

    if(loginEmail=='' || loginEmail.length==0){
      swal("Email cannot be blank");
      return false;
    }
    if(loginPassword=='' || loginPassword.length==0){
      swal("Please enter a password to proceed");
      return false;
    }

    $('#formUserLogin').submit();
  }
</script>

</body>
</html>
