<?php 

$pgname = "register";

$meta_title = "Register | Paragon Accessories Pvt. Ltd.";

$meta_keywords = "Two wheeler accessories, honda accessories, yamaha accessories, suzuki accessories, mahindra accessories, tvs accessories, royale enfield accessories, bike accessories, scooter accessories";

$meta_desc = "Register | Paragon Accessories Pvt. Ltd.";

 ?>

 <!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> 

<html class="no-js"> <!--<![endif]-->





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



          <?php  include('nav.php'); ?>


            <div id="heading">            	

              	  <div class="container">                  	

                    <div class="row">                    	

                        <div class="col-md-12">

                            <div class="heading-content">

                                <h2>Register</h2>

                                <span><a href="<?php echo base_url(); ?>">Home</a> / Register</span>

                            </div>

                        </div>

                   

                </div>

                </div>

            </div>



            





            <div class="contact-us">

                <div class="container">                                       

                    <div class="row">

                                <div class="product-item col-md-12">
                    <!-- For Error -->
                                <?php // if(isset($_GET['reg']) && $_GET['reg']=='N') { ?>
<!-- 
                                <div class="alert alert-danger">

                                  <strong>Oops!</strong> This user is already exist.

                                </div>
 -->
                                <?php// } 

									//if(!empty($Err)){ ?>
									
									<!-- <div class="alert alert-danger">

									  <strong>Oops!</strong> <?php echo $Err; ?>

									</div>
									 -->
									<?php// } ?>
                                    <?php echo form_error(''); ?>

                                    <div class="row">

                                        <div class="text-center login-box">  

                                        <form method="post" id="user_register" >

                                            <div class="message-form">

                                                <form action="#" method="post" class="send-message">

                                                    <div class="row">

                                                     <div class="name col-md-12">

                                                        <input type="text" name="u_name" id="u_name" placeholder="Name" value="" />
                                                        <small><?php echo form_error('u_name'); ?></small>

                                                    </div>

                                                    <div class="name col-md-12">

                                                        <input type="text" name="u_email" id="u_email" placeholder="Email" value="" />
                                                        <small><?php echo form_error('u_email'); ?></small>

                                                    </div>

                                                    <div class="email col-md-12">

                                                        <input type="password" name="u_password" id="u_password" placeholder="Password"  value="" />
                                                        <small><?php echo form_error('u_password'); ?></small>

                                                    </div>

                                                    <div class="name col-md-12">

                                                        <input type="text" name="u_phone" id="u_phone" placeholder="Phone No." value="" />
                                                        <small><?php echo form_error('u_phone'); ?></small>
                                                        

                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="name col-md-12">

                                                        <input type="text" name="u_address" id="u_address" placeholder="Address" value="" />
                                                        <small><?php echo form_error('u_address'); ?></small>

                                                    </div>

                                                   <div class="name col-md-12">

                                                        <input type="text" name="u_pincode" id="u_pincode" placeholder="Pincode" value="" />
                                                        <small><?php echo form_error('u_pincode'); ?></small>

                                                    </div>

                                                    <div class="send" id="register_btn_div" >

                                                        <p>&nbsp;</p>

                                                        <button name="submit" value="submit" type="submit" >Register</button>

                                                    </div>

                                                    <!-- <div class="name col-md-12" id="verify_div" style="padding-top: 10px;" ></div>

                                                    <div class="name col-md-12" id="verify_div_main" style="display: none;" >

														<div class="name col-md-12">

															<input type="text" name="u_otp" id="u_otp" placeholder="OTP" value="" />

														</div>

                                                  		<div class="send">
                                                  		
                                                  			<p>&nbsp;</p>

															<button name="submit_btn" id="submit_btn" value="submit" type="submit" >Verify OTP</button>

														</div>
                                                   
													</div> -->
                                                   
                                                   </div>  
                                                    

                                                </form>

                                            </div>

                                           </form>

                                        </div>                                             

                                    </div>

                                </div>

                            </div>

                    

                   

                    

                </div>

            </div>





            <?php include('footer.php') ?>



        <!--<script src="assets/user/js/vendor/jquery-1.11.0.min.js"></script>-->

        <!--<script src="assets/user/js/bootstrap.js"></script>-->

        <script src="assets/user/js/jis.jquery.min.js"></script>         

        <script src="assets/user/js/vendor/jquery.gmap3.min.js"></script>

        <script src="assets/user/js/menu_slide.js"></script>
        
        <script src="assets/user/js/jquery.validate.min.js"></script>
        
        
        <script language="javascript" >
			$('#register_btn').on('click',function(){
				
					$(this).html('Wait...');
				
                    var phoneNo = $('#u_phone').val();
					var emailAd = $('#u_email').val();
				
					if(phoneNo.length == 10){

						 $.ajax({

								  url: "<?php echo base_url(); ?>data/",

								  type : "POST",

								  data: {

									  flag: "phone_varify",

									  phone_no : phoneNo,
									  
									  email_ad : emailAd

								  },

								  success:function(data){
									  
									  if(data == 'success'){

										    $('#register_btn_div').hide();
										    $('#verify_div').html('<span style="color:green; font-weight:bold;" >OTP sent successfully to your phone no. and email.!</span>');
									  		$('#verify_div_main').show();
										    $('#register_btn').html('Register');
										  
									  }else{

										$('#verify_div').html(data);
									  	$('#verify_div').show();
										$('#register_btn').html('Register');
										  
									  }

								  }

							  });
					}else{
						$('#verify_div').html('<span style="color:red; font-weight:bold;" >Please enter valid mobile no.</span>');
						$('#verify_div').show();
						$('#register_btn').html('Register');
					}

                  });
			
			$(document).ready(function() {
			
				$("#user_register").validate({



				rules: {

					u_name: "required",

					u_email: "required",

					u_phone: "required",

					u_password: "required",
					
					u_otp: "required",

					u_address: "required",

					u_pincode: "required"

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