<?php 

 
 $DispCOD = 0;

 $pgname = 'checkout';

 ?>

 <!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> 

<html class="no-js"> <!--<![endif]-->


<?php $meta_title = 'Checkout - Paragon Two Wheeler Accessories'; ?>

<?php $meta_keywords = 'Checkout - Paragon Two Wheeler Accessories'; ?>

<?php $meta_desc = 'Checkout - Paragon Two Wheeler Accessories'; 
	
?>


<head>

      <?php include('head.php') ?>

      <style>
		label.error{
			padding: 5px !important;
			border: unset !important;
			width: 100% !important; 
			font-weight:200 !important;
			color: red !important;
			outline: none !important;
		}

        table{

            border:1px solid  #e7e7e7;

           

        }

          /* table input{

            width: 27%;margin-top:0px;color:#000;text-align:center;height: 25px;

          } */

           table a img {

           margin-left: 5px;

          }

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

                                <h2>Checkout</h2>

                                

                            </div>

                        </div>

                   

                </div>

                </div>

            </div>



            


<?php //print_r($cart); exit ?>


            <div class="cart">

                <div class="container"> 

                    <div class="row">
                       
                       <form method="post" name="customerData" action="<?php echo base_url('do-payment'); ?>" id="checkout_form" >
                       
                       	<div class="col-md-12 text-center"  >
                          
                          	<?php if($this->session->flashdata('error') && $this->session->flashdata('error') == 'validation' ){ ?>
								<p style='color:#FF0000; text-align: center; font-weight: 700;' >Please fill all required fields!</p>
							<?php } ?>
                           
                           	<img src="<?php echo base_url(); ?>assets/user/images/free-delivery.gif" alt="Free Home Delivery" title="Free Home Delivery" style="background: #000;" >
                           
						</div>
                        
                        <div class="col-md-12">
                            
                            <h1 class="text-center" >Billing / Shipping Details</h1>
                            
						</div>
						
                       <div class="message-form" >
                        
                        <div class="col-lg-5" style="border:1px solid #afafaf;padding: 15px;border-radius: 10px;box-shadow:  1px 1px 5px #888888; margin: 10px; " >

                        		<div class="name col-md-12" style="margin-bottom: 10px;" ><h2>Billing Info</h2></div>

                        		<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing Name: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_name" id="billing_name" value="<?php echo $fetchRecord->u_name; ?>" />
									<?= form_error('billing_name'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing Email: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_email" id="billing_email" value="<?php echo $fetchRecord->u_email; ?>" />
									<?= form_error('billing_email'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing Phone: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_tel" id="billing_tel" value="<?php echo $fetchRecord->u_phone; ?>" />
									<?= form_error('billing_tel'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing Address: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_address" id="billing_address" value="" />
									<?= form_error('billing_address'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing City: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_city" id="billing_city" value="" />
									<?= form_error('billing_city'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing State: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_state" id="billing_state" value="" />
									<?= form_error('billing_state'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing Pincode/Zip: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_zip" id="billing_zip" value="" />
									<?= form_error('billing_zip'); ?>
								</div>
								
								<div class="name col-md-12" style="margin-bottom: 10px;" >
                        			<label>Billing Country: </label>
                        			<input style="margin-top: 0px;" type="text" name="billing_country" id="billing_country" value="" />
									<?= form_error('billing_country'); ?>
								</div>

                        </div>


                        <div class="col-lg-5" style="border:1px solid #afafaf;padding: 15px;border-radius: 10px;box-shadow:  1px 1px 5px #888888; float: right; margin: 10px;" >
                        
                        	<div class="name col-md-12" style="margin-bottom: 10px;" ><h2>Shipping Info</h2></div>
                        	
                        	<div class="name col-md-12" style="margin-bottom: 10px;" >                        		
								<label style="float: left; line-height: 25px;" >Same as billing?&nbsp;&nbsp;</label>
								<input style="margin-top: 0px; width: 25px; height: 25px; cursor: pointer;" type="checkbox" name="delivery_same_billing" id="delivery_same_billing" />
							</div>

							<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping Name: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_name" id="delivery_name" value="" />
							</div>
                      
                      		<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping Phone: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_tel" id="delivery_tel" value="" />
							</div>
                       
                       		<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping Address: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_address" id="delivery_address" value="" />
							</div>
                       
                       		<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping City: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_city" id="delivery_city" value="" />
							</div>                       
                       
                      		<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping State: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_state" id="delivery_state" value="" />
							</div>
                       
                       		<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping Pincode/Zip: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_zip" id="delivery_zip" value="" />
							</div>
                       
                       		<div class="name col-md-12" style="margin-bottom: 10px;" >
								<label>Shipping Country: </label>
								<input style="margin-top: 0px;" type="text" name="delivery_country" id="delivery_country" value="" />
							</div>

						</div>
                       
                       </div>
                       
                       
                       <div class="col-md-12" >&nbsp;</div>
                       <div class="col-md-12" >&nbsp;</div>
                       
                       <div class="col-md-12 text-center"  >
                           
                           	<img src="<?php echo base_url(); ?>assets/user/images/free-delivery.gif" alt="Free Home Delivery" title="Free Home Delivery" style="background: #000;" >
                           
						</div>
                       
                       <div class="col-md-12">
                            
                            <h1 class="text-center" >Confirm Your Order</h1>
                            
						</div>
                       
                       <div class="col-md-12" >&nbsp;</div>
                        

                        <div class="col-md-12">
                           

                            <table class="table table-hover">

                              <thead>

                                <tr>

                                  <th width="5%" >#</th>

                                  <th width="35%">Item Name</th>

                                  <th width="20%">Price</th>

                                  <th width="20%">Qty</th>

                                  <th width="20%" >Total</th>

                                </tr>

                              </thead>

                              <tbody>

                              <?php 

								
                                for($i=0;$i<count($cart['item_id']);$i++){

								   $item_total  = $cart['item_price'][$i]*$cart['item_qty'][$i];
								   
								   $sub_total +=   $item_total;
								   
								   if($DispCOD == 0){
									   $whAccess['id'] = $cart['item_id'][$i];
										$ChackIsKit = $this->Paramodel->select('access','a_kit',$whAccess)[0]->a_kit;
										

										// $selPrd = "select `a_kit` from `access` where id = ".$cart['item_id'][$i];
										// $qryPrd = mysqli_query($db, $selPrd);
										// $recPrd = mysqli_fetch_assoc($qryPrd);
										// $ChckIsKit = $recPrd['a_kit'];
										
										if($ChackIsKit){
											$DispCOD = 1;
										}
								    }
                               ?>

                                <tr>

                                  <th scope="row"><?php echo $i+1; ?></th>

                                  <td><?php echo $cart['item_name'][$i] ?></td>

                                  <td>Rs. <?php echo $cart['item_price'][$i] ?></td>

                                  <td><?php echo $cart['item_qty'][$i] ?></td>

                                  <td>Rs. <?php echo $item_total; ?></td>

                                </tr>

                                <?php } 

                                  $GST_charge = ($sub_total*$GST_per)/100;
								  
								  $GST_charge = 0;

                                  $total_of_cart = $sub_total + $GST_charge;

                                ?>

                              </tbody>

                            </table>        

                        </div>

                        <div class="col-md-6" style="float:right">

                            <h1>Cart Total</h1>

                            <table class="table table-hover">

                              <tbody>

                                <tr>

                                  <td><strong>Subtotal</strong></td>

                                  <td>Rs. <?php  echo number_format($sub_total, 2, '.', ''); ?></td>

                                </tr>

                                <?php /*?><tr>

                                  <td><strong>GST(<?php echo $GST_per ?>%)</strong></td>

                                  <td>Rs. <?php  echo number_format($GST_charge, 2, '.', ''); ?></td>

                                </tr><?php */?>

                                <tr>

                                  <td><strong>Total</strong></td>

                                  <td><h3 style="margin: 0px;" >Rs. <?php  echo number_format($total_of_cart, 2, '.', ''); ?></h3></td>
                                  
                                  <?php
									$_SESSION['order_gst_per'] = $GST_per;
									$_SESSION['order_gst_charges'] = $GST_charge;
									$_SESSION['order_sub_total'] = $sub_total;
									$_SESSION['order_total'] = $total_of_cart;
								  ?>

                                </tr>

								<?php if($DispCOD){ ?>
								
								<tr>

                                  <td><strong>Payment Method</strong></td>

                                  <td>

								  	<div class="cart-cod" >
										<div class="radio">
											<input type="radio" name="pay_method" class="pay_method" value="ccavenue" id="pay_method_ccavenue" style="width:auto;" checked />
										</div>
										<div>
											&nbsp;CreditCard/Debit Card | Netbanking | Wallets
										</div>
									</div>

									<div class="cart-cod" >
										<div class="radio">
											<input type="radio" name="pay_method" class="pay_method" value="cod" id="pay_method_cod" style="width:auto;" />
										</div>
										<div>
											&nbsp;Cash on Delivery
										</div>
									</div>

								  </td>
                                  
                                </tr>
								<?php } ?>
                                
                                <tr>
                                	<td colspan="2" class="send" align="center" ><button type="submit" id='btn_ckeckout' style="width: 100%" >Confirm and Pay</button><br />Product price included with <?php echo $GST_per ?>% GST.</td>
                                </tr>

                              </tbody>

                            </table>

                        </div>
                        
                        <div class="col-md-12" >
                        	<div class="send">
                            
                            	
                            	
                            		<input type="hidden" name="tid" id="tid" readonly />
                            		<input type="hidden" name="merchant_id" value="209556"/>
                            		<input type="hidden" name="order_id" value="<?php echo $OrderId; ?>" />
                            		<input type="hidden" name="amount" value="<?php  echo number_format($total_of_cart, 2, '.', ''); ?>"/>
                            		<input type="hidden" name="currency" value="INR"/>
                            		<input type="hidden" name="redirect_url" value="<?php echo base_url('ccavResponseHandler'); ?>"/>
                            		<input type="hidden" name="cancel_url" value="<?php echo base_url('ccavResponseHandler'); ?>"/>
                            		<input type="hidden" name="language" value="EN"/>

                           
                            </div>
                        </div>
                        
                        </form>

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

					$("#checkout_form").validate({



					rules: {

						billing_name: "required",

						billing_email: {
							
							required: true,
							email: true
						},
						billing_tel: {
							
							required: true,
							digits: true
						},
						billing_address: {
							
							required: true,
							minlength: 10
						},

						billing_city: "required",

						billing_state: "required",

						billing_zip: {

							required: true,
							digits: true,
							minlength:6,
							maxlength:6
						}, 
						
						billing_country: "required", 

						delivery_name: "required",

						delivery_tel: {
							
							required: true,
							digits: true
						},

						delivery_address: {
							
							required: true,
							minlength: 10
						},

						delivery_city: "required",

						delivery_state: "required",

						delivery_zip: {

							required: true,
							digits: true
						}, 
						
						delivery_country: "required" 

					},
					messages: {

						billing_name: "Please specify your name.",
						billing_email: {
							required: "We need your email address to contact you.",
							email: "Your email address must be in the format of name@domain.com."
						},
						billing_tel: {
							
							required: "Please specify your Phone-No.",
							digits: "Please specify your Phone-No in number."
						},
						billing_address: {
							
							required: "Please specify your Billing Address.",
							minlength: "Please specify your Billing Address is minimum 10 Character."
						},

						billing_city: "Please specify your Billing City.",

						billing_state: "Please specify your Billing State.",

						billing_zip: {

							required: "Please specify your Billing Pincode/Zip.",
							digits: "Please specify your Pincode/Zip in number.",
							minlength: "Please Specify valid Pincode/Zip.",
							maxlength:"Please Specify valid Pincode/Zip."
						}, 
						
						billing_country: "Please specify your Billing Country.", 

						delivery_name: "Please specify your Delivery Name.",

						delivery_tel: {
							
							required: "Please specify your Delivery Phone-No.",
							digits: "Please specify your Phone-No in number."
						},

						delivery_address: {
							
							required: "Please specify your Delivery Address.",
							minlength: "Please specify your Delivery Address is minimum 10 Character."
						},

						delivery_city: "Please specify your Delivery City.",

						delivery_state: "Please specify your Delivery State.",

						delivery_zip: {

							required: "Please specify your Delivery Pincode/Zip.",
							digits: "Please specify your Phone-No in number."
						}, 
						
						delivery_country: "Please specify your Delivery Country." 

					}

					//  errorPlacement: function(){

					// 	return false;  // suppresses error message text

					//  }

				});

				$("#u_email").keyup(function () {  
					$(this).val($(this).val().toLowerCase());  
				});

			});
		</script>
   		
   		<script>
			window.onload = function() {
				var d = new Date().getTime();
				document.getElementById("tid").value = d;
			};
			
			$("#delivery_same_billing").change(function() {
				if(this.checked) {
					$('#delivery_name').val($('#billing_name').val());
					$('#delivery_tel').val($('#billing_tel').val());
					$('#delivery_address').val($('#billing_address').val());
					$('#delivery_city').val($('#billing_city').val());
					$('#delivery_state').val($('#billing_state').val());
					$('#delivery_zip').val($('#billing_zip').val());
					$('#delivery_country').val($('#billing_country').val());
				}else{
					$('#delivery_name').val('');
					$('#delivery_tel').val('');
					$('#delivery_address').val('');
					$('#delivery_city').val('');
					$('#delivery_state').val('');
					$('#delivery_zip').val('');
					$('#delivery_country').val('');
				}
			});

		</script>

    </body>

</html>