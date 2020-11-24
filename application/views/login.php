<?php 

$pgname = "Login";

$meta_title = "Login | Paragon Accessories Pvt. Ltd.";

$meta_keywords = "Two wheeler accessories, honda accessories, yamaha accessories, suzuki accessories, mahindra accessories, tvs accessories, royale enfield accessories, bike accessories, scooter accessories";

$meta_desc = "Login | Paragon Accessories Pvt. Ltd.";

 ?>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js">

<!--<![endif]-->

<head>

<?php include('head.php') ?>

<style>

        .error{

            border: 1px solid red !important;

        }

    </style>

</head>

<body>

<!--[if lt IE 7]>

            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>

        <![endif]-->

<?php include('nav.php');  ?>
<?php ?>

<div id="heading">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="heading-content">

          <h2>Login</h2>

          <span><a href="<?php echo base_url(); ?>">Home</a> / Login</span> </div>

      </div>

    </div>

  </div>

</div>

<div class="contact-us">

  <div class="container">

    <div class="row">

      <div class="product-item col-md-12">

       <?php if(isset($_GET['msg']) && $_GET['msg']=='I') {?>

        <div class="alert alert-danger">

          <strong>Oops!</strong> This user is blocked by Admin.

        </div>
        
        <?php } ?>

        <!-- Error for checkout user is not login -->
        <?php if( $this->session->flashdata('chk_msg') && $this->session->flashdata('chk_msg') == 'checkout') {?>

        <div class="alert alert-danger">

          <strong>Oops!</strong> Please login to Checkout items.

        </div>

        <?php } ?>

         <?php if(isset($_GET['msg']) && $_GET['msg']=='Err') {?>

        <div class="alert alert-danger">

          <strong>Oops!</strong> Login details not found. Please Enter coreect details.

        </div>

        <?php } ?>

        <?php if(isset($_GET['chk']) && $_GET['chk']=='N') {?>

        <div class="alert alert-danger">

          <strong>Oops!</strong> Please Login to checkout the items.

        </div>

        <?php } ?>

        <?php if(isset($_GET['msg']) && $_GET['msg']=='P') {?>

        <div class="alert alert-success">

          <strong>Success!</strong> Your Password has been sent in email. Please check and login here.

        </div>

        <?php } ?>

        <?php if(isset($_GET['lg']) && $_GET['lg']=='Y') {?>

        <div class="alert alert-success">

          <strong>Success!</strong> Your are logged out. Please Login to purchase.

        </div>

        <?php } 

		if(!empty($Err)){ ?>

		<div class="alert alert-danger">

		  <strong>Oops!</strong> <?php echo $Err; ?>

		</div>

		<?php } ?>

        <div class="row">

          <div class="text-center login-box">

            <div class="message-form">

              <form  method="post" class="send-message" id="user_login" >

                <div class="row">

                  <div class="name col-md-12">

                    <input type="text" name="u_email" id="u_email" placeholder="Email / Mobile No." />

                  </div>
                  
					  <div class="name col-md-12"><hr /></div>

					  <div class="email col-md-12">

						<input type="password" name="u_password" id="u_password" placeholder="Password" style="margin-top: 0px;" />

					  </div>
                
                	  <div class="name col-md-12" style="margin-top: 10px; margin-bottom: 0px;" >OR</div>
                	  
                	  <div class="name col-md-12"><a href="javascript:;" id="send_login_otp" >Send otp to registered mobile/email.</a></div>
                	  
                	  <div class="name col-md-12" id="verify_div" style="margin-top: 10px; margin-bottom: 0px; display: none;" ></div>
                	  
                	  <div class="email col-md-12 login_otp" style="display: none;" >

						<input type="text" name="otp_sent" id="otp_sent" placeholder="OTP" />

					  </div>

                </div>

                <div class="send">

                  <button type="submit" name="u_login" value="u_login">Login</button>

                </div>

              </form>

            </div>

            <br>

            <div class="text-right col-lg-12 text-center"><a href="<?php echo base_url();?>forgot-password/">Forgot Password?</a></div>

            <hr>

          </div>

          <div class="clearfix"></div>

          <div class="text-center login-box" style="margin-top:20px;">

            <h5 class="text-center">Don't have an Account?</h5>

            <div class="send">

              <button onClick="javascript:window.location.href='<?php echo base_url(); ?>'">Register</button>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<?php include('footer.php') ?>

<!--<script src="js/vendor/jquery-1.11.0.min.js"></script>-->

<!--<script src="js/bootstrap.js"></script>-->

<script src="<?php echo base_url(); ?>assets/user/js/jis.jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery.gmap3.min.js"></script>

<script src="<?php echo base_url(); ?>assets/user/js/menu_slide.js"></script>

<script src="<?php echo base_url(); ?>assets/user/js/jquery.validate.min.js"></script>

<script language="javascript" >
	$(document).ready(function() {
		
				$('#send_login_otp').on('click',function(){
				
					$(this).html('Wait...');
				
					var emailAd = $('#u_email').val();
				
					

						 $.ajax({

								  url: "<?php echo base_url(); ?>data/",

								  type : "POST",

								  data: {

									  flag: "send_login_otp",
									  
									  email_ad : emailAd

								  },

								  success:function(data){
									  
									  if(data == 'success'){

										    $('#verify_div').html('<span style="color:green; font-weight:bold;" >OTP sent successfully to your phone no. and email.!</span>');
										  	$('#verify_div').show();
									  		$('.login_otp').show();
										    $('#send_login_otp').html('Send otp to registered mobile.');

									  }else{

										$('#verify_div').html(data);
										$('#verify_div').show();
									  	$('.login_otp').show();
										$('#send_login_otp').html('Send otp to registered mobile.');
										  
									  }

								  }

							  });
					

                  });
			
				$("#user_login").validate({



				rules: {

					u_email: "required"


				},

				 errorPlacement: function(){

					return false;  // suppresses error message text

				 }

			});
		
			$("#u_email").keyup(function () {  
				$(this).val($(this).val().toLowerCase());  
			});

		});
</script>

</body>

</html>

