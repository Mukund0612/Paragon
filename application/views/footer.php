<footer>

        <div class="container">
            
            <div class="shopping-features">
                <ul>
                    <li>
                        <span class="feat-icon"><i class="fa fa-truck"></i></span>
                        <h3>Free Shipping</h3>
                        <p>Free shipping on all orders</p>
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fa fa-shield"></i></span>
                        <h3>Safe Shopping</h3>
                        <p>Safe shopping guarantee</p>
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fa fa-percent"></i></span>
                        <h3>Best price & deals</h3>
                        <p>Upto 20% discount*</p>
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fa fa-credit-card"></i></span>
                        <h3>Payment Secure</h3>
                        <p>We ensure secure payment</p>
                    </li>
                </ul>
          </div>
           	<div class="row">
	           	<div class="col-lg-12">
                	<div id="subscribe-form" class="clearer">
                        
                           
                                <label for="newsletter">Get free updates and exclusive deals</label>
                                <div class="input-box">
                                    <input type="email" name="email" id="newsletter" title="Sign up for our newsletter" class="input-text">
                                </div>
                                <button type="button" title="Subscribe" class="button btn-inline" id="email_subscribers_btn" name="email_subscribers_btn" ><span><span>Subscribe</span></span></button>
                        
                    </div>
                </div>
            </div>
        	<div class="row">

	           	<div class="col-lg-12">
                   <div class="col-sm-3 social-top">
                    	<h4>Follow us<span></span></h4>                    
                        <ul>
                            <li><a href="#" class="fa fa-facebook"> <span>facebook</span></a></li>
                            <li><a href="#" class="fa fa-twitter"> <span>Twitter</span></a></li>
                            <li><a href="#" class="fa fa-pinterest"> <span>Pinterest</span></a></li>
                            <li><a href="#" class="fa fa-instagram"> <span>Instagram</span></a></li>
                            <li><a href="#" class="fa fa-linkedin"> <span>Linkedin</span></a></li>
                        </ul>
                   </div>

                   <div class="col-sm-3 usefull-links"><h4>Quick Links<span></span></h4>

                   	<ul>
                    	<li><a href="<?php echo base_url('profile'); ?>">My Account</a></li>
                        <li><a href="<?php echo base_url('shipping-delivery'); ?>">Shipping & Delivery</a></li>
                        <li><a href="<?php echo base_url('payment'); ?>">Payments</a></li>

                    	<li><a href="<?php echo base_url('about-us'); ?>">About us</a></li>

                        <!--<li><a href="<?php// echo base_url(); ?>products/">Products</a></li>-->						

                        <li><a href="<?php echo base_url('faq'); ?>">FAQ?</a></li>

						            <li><a href="<?php echo base_url('contact-us'); ?>">Reach us</a></li>
                        <li><a href="<?php echo base_url('terms'); ?>">Terms & Condition</a></li>

                    </ul>

                   </div>
                   
                   <div class="col-sm-2 usefull-links"><h4>Categories<span></span></h4>

                   	<ul>
                       <?php 
                       $all_brand_links = $this->Paramodel->select('brand','brand_name');
                    //    echo "<pre>";
                    //    print_r($all_brand_links);
                    //    exit;
                        foreach($all_brand_links as $brandLink ) { ?>
                    	<li><a href="<?= base_url('brand').'/'.$brandLink->brand_name; ?>"><?= $brandLink->brand_name; ?></a></li>
                        <?php } ?>
                        <!-- <li><a href="#">Mahindra</a></li>
                    	<li><a href="#">Hero</a></li>
                        <li><a href="#">TVS</a></li> -->
						<!-- <li><a href="<?php echo base_url(); ?>brands/royal-enfild/">Royal Enfild</a></li> -->
						<!-- <li><a href="#">Suzuki</a></li>
                        <li><a href="#">Yamaha</a></li> -->
                    </ul>

                   </div>

                   <div class="col-sm-4"><h4>Contact Us<span></span></h4>

                   	<div class="contact_footer">

                        <strong>Paragon House</strong>					

                        

                        <div class="footer_icon">

                            <div><i class="fa fa-paper-plane" aria-hidden="true"></i>4-Bhaktinagar station plot, 

                        Opp. Metro offset, 

                        Gondal road, 

                        Rajkot - 360002.</div>

                            <div><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:sales@paragontwowheeleraccessories.com">sales@paragontwowheeleraccessories.com</a></div>

                            <div><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+91 97223 32211">+91 97223 32211</a></div>                        

                        </div>

                    </div>

                   </div>

               </div>

            </div>

        </div>

        

         <div class="bottom-footer">

          <div class="container">

                <p>

                    <span>Copyright © <?php echo date('Y'); ?></span>  <a href="http://paragontwowheeleraccessories.com">Paragon Two Wheeler Accessories</a> |


                    <span><img src="<?php echo base_url(); ?>assets/user/images/free-delivery.gif" alt="Free Home Delivery" title="Free Home Delivery" /></span>

                </p>

            </div>

          </div>

    </footer>

   <!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> -->      

        





     <script type = "text/javascript"  src = "<?php echo base_url(); ?>assets/user/js/vendor/jquery.min.js"></script>		





     <script type="text/javascript" src="<?php echo base_url(); ?>assets/user/js/stickytooltip.js">



        /***********************************************

        * Sticky Tooltip script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)

        * Please keep this notice intact

        * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more

        ***********************************************/

        

        </script>

      <?php /*?><script src="<?php echo base_url(); ?>assets/user/js/loader2.js"></script><?php */?> <!-- Modernizr -->
        <!-- tab index -->
         <script src="<?php echo base_url(); ?>assets/user/js/SpryTabbedPanels.js" type="text/javascript"></script>

     

    <script type = "text/javascript"  src = "<?php echo base_url(); ?>assets/user/js/vendor/jquery-ui.min.js"></script>     

    <!-- sweetalert -->
    <script src="<?php echo base_url(); ?>assets/user/sweetalert2/sweetalert2.min.js"></script>

	

      <script type = "text/javascript" language = "javascript">

    

         $(document).ready(function() {



            $("#button").click(function(){

               $(".target").effect("bounce", { direction:'right', times:4 }, 1000);

            });



         });

		 

		 function hide(target) {

 			 document.getElementById(target).style.display = 'none';

		}

			

      </script>
      
    <?php if(basename($_SERVER['PHP_SELF']) != "cart"){ ?>
     <script language="javascript" >
			$(".delete_item").each(function(){

                  $(this).on('click',function(){

                    var pro_id = $(this).data('id');

                     $.ajax({

                              url: "<?php echo base_url('ajax'); ?>",

                              type : "POST",

                              data: {

                                  flag: "delete_item",

                                  pro_id : pro_id 

                                 

                              },

                              success:function(data){

                                  if(data=='success')

                                  {

                                     location.reload();

                                  }

                              }

                          });

                  });

                });
		</script>
		<?php } ?>
		
	
<script language="javascript" >
$(document).ready(function() {

    // process the form
    $('#email_subscribers_btn').click(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'email' : $('#newsletter').val(),
			'flag'  : 'subscribers'
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '<?php echo base_url(); ?>assets/user/ajax.inc.php', // the url where we want to POST
            data        : formData
        })
            // using the done promise callback
            .success(function(data) {

                // log data to the console so we can see
                alert(data); 
				$('#newsletter').val('');

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
$(document).ready(function(){
    $('#cart').click(function(){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'your Cart is Empty.!'
        })
    });
});
</script>

