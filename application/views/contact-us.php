<?php 

$pgname='contact-us';

// Get a key from https://www.google.com/recaptcha/admin/create

$siteKey = "6LdAoNoZAAAAABJ9AddYK8gAGvvUqPcl4A8GZMUW";
$secretKey = "6LdAoNoZAAAAABa6OLOjv7pHRn99iuRuoYycXOLI";
//$publickey = "6LesOI0UAAAAAGbOPcVShy1tvlj_7Aj3mTXMkAZ9";
//$privatekey = "6LesOI0UAAAAAAYCjqDAQaAigYB_TAizwmVdROs2";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

$meta_title = "Reach Us | Paragon Accessories Pvt. Ltd.";
$meta_keywords = "Two wheeler accessories, honda accessories, yamaha accessories, suzuki accessories, mahindra accessories, tvs accessories, royale enfield accessories, bike accessories, scooter accessories";
$meta_desc = "Reach Us  | Paragon Accessories Pvt. Ltd.";

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
<script src = "<?php echo base_url();?>assets/user/js/countries.js"></script>

<style>
    .error{
        border: 1px solid red !important;
    }
</style>

<!-- /<script src='https://www.google.com/recaptcha/api.js'></script> -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdAoNoZAAAAABJ9AddYK8gAGvvUqPcl4A8GZMUW"></script>

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
          <h2>Reach Us</h2>
          <span><a href="<?php echo base_url();?>">Home</a> / Reach Us</span> </div>
      </div>
    </div>
  </div>
</div>
<div class="contact-us">
  <div class="container">
    <div class="row">
      <div class="product-item col-md-12">
      <?php if(isset($insert)) {?>
        <div class="alert alert-success">
          <strong>Thank you!</strong> Your inquiry has been sent to Admin. We will contact you soon.
        </div>
        <?php } 
		if($error != ''){ ?>
		<div class="alert alert-error"><?php echo $error; ?></div>
		<?php } ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="message-form">
              <form  method="post" class="send-message" id="contact_form">
                <div class="row">
                  <div class="name col-md-4">
                    <input type="text" name="c_name" id="c_name" placeholder="Your Name" />
                  </div>
                  <div class="email col-md-4">
                    <input type="text" name="cc_name" id="cc_name" placeholder="Company Name" />
                  </div>
                  <div class="name col-md-4">
                    <input type="email" name="c_email" id="c_email" placeholder="Email" />
                  </div>
                  <div class="email col-md-4">
                    <input type="text" name="c_mobile" id="c_mobile" placeholder="Mobile" />
                  </div>
                  <div class="subject col-md-4">
                    <input type="text" name="c_phone" id="c_phone" placeholder="Telephone No." />
                  </div>
                  <div class="subject col-md-4">
                    <select class="form-control" name="c_subject" id="c_subject">
                      <option disabled selected value >Select Subject</option>
                      <option value="Sales Support">Sales Support</option>
                      <option value="Apply for Dealership">Apply for Dealership</option>
                      <option value="Transporter Enquiry">Transporter Enquiry</option>
                      <option value="Feedback Regarding Services">Feedback Regarding Services</option>
                      <option value="Feedback Regarding Product">Feedback Regarding Product</option>
                      <option value="Bulk Enquiry">Bulk Enquiry</option>
                      <option value="Vendor Registration">Vendor Registration</option>
                      <option value="Raw material Supply">Raw material Supply</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="subject col-md-3">
                    <select class="form-control" id="country" name ="country">
                      <option value="">Select Country</option>
                    </select>
                  </div>
                  <div class="state col-md-3">
                    <select class="form-control" name ="state" id ="state">
                      <option value="">Select State</option>
                    </select>
                  </div>
                  <div class="email col-md-3">
                    <input type="text" name="city" id="city" placeholder="Enter City" />
                  </div>
                  <div class="email col-md-3">
                    <input type="text" name="zip_pincode" id="zip_pincode" placeholder="Enter Pincode/Zip" />
                  </div>
                  <div class="text col-md-12">
                    <textarea name="message" placeholder="Message" id="message"></textarea>
                  </div>
                  
                  <div class="text col-md-12">
                  	<div data-sitekey="6LdAoNoZAAAAABJ9AddYK8gAGvvUqPcl4A8GZMUW"></div>
                  </div>
                </div>
                <div class="send">
                  <button type="submit" name="submit_btn" value="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="map">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading-section">
            <h2>Find Us <span>On Map</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="TabbedPanels1" class="TabbedPanels">
            <ul class="TabbedPanelsTabGroup">
              <li class="TabbedPanelsTab" tabindex="0"><span>Corporate</span> office
                <div class="arrow-d"></div>
              </li>
              <li class="TabbedPanelsTab" tabindex="0">Unit 1
                <div class="arrow-d"></div>
              </li>
              <li class="TabbedPanelsTab" tabindex="0">Unit 2
                <div class="arrow-d"></div>
              </li>
              <?php /*?><li class="TabbedPanelsTab" tabindex="0">Unit 3
                <div class="arrow-d"></div>
              </li><?php */?>
              <li class="TabbedPanelsTab" tabindex="0">Unit 3
                <div class="arrow-d"></div>
              </li>
            </ul>
            <div class="TabbedPanelsContentGroup">
              <div class="TabbedPanelsContent">
                <div class="info">
                  <div class="col-md-4">
                    <ul>
                      <li><i class="fa fa-map-signs"></i> <strong>Paragon House</strong><br>
                        4-Bhaktinagar station plot, Opp. Metro offset,<br>
                        Gondal road, Rajkot - 360002 </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                      <li><i class="fa fa-phone"></i>+91 92276 28929</li>
                      <li><i class="fa fa-phone"></i>+91 97223 32211</li>
                      <li><i class="fa fa-envelope"></i><a href="mailto:sales@paragontwowheeleraccessories.com">sales@paragontwowheeleraccessories.com</a></li>
                    </ul>
                  </div>
                </div>
                <div id="googleMap">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.785255670942!2d70.9413463154202!3d22.36173594631181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b10347e00067%3A0x44c01778b531e340!2sPARAGON+ACCESSORIES+PVT.+LTD.!5e0!3m2!1sen!2sin!4v1470208817018" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="TabbedPanelsContent">
                <div class="info">
                  <div class="col-md-6">
                    <ul>
                      <li><i class="fa fa-map-signs"></i> <strong>Paragon Accessories Pvt. Ltd.</strong><br>
                        Survey No.197, Plot No.7-A, Plasama Road, Gondal Highway,<br>
                        Veraval(Shapar), Rajkot - 360024 </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                      <li><i class="fa fa-phone"></i>+91 92276 28929</li>
                      <li><i class="fa fa-phone"></i>+91 97223 32211</li>
                      <li><i class="fa fa-envelope"></i><a href="mailto:sales@paragontwowheeleraccessories.com">sales@paragontwowheeleraccessories.com</a></li>
                    </ul>
                  </div>
                </div>
                <div id="googleMap">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12428.282300119337!2d70.78673407452223!3d22.165958683486043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x16820c6b1cec41b0!2sAirtel+Store!5e0!3m2!1sen!2sin!4v1553861713209!5m2!1sen!2sin" width="600"  style="border:0" allowfullscreen></iframe>
                  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.785255670942!2d70.9413463154202!3d22.36173594631181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b10347e00067%3A0x44c01778b531e340!2sPARAGON+ACCESSORIES+PVT.+LTD.!5e0!3m2!1sen!2sin!4v1470208817018" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                </div>
              </div>
              <div class="TabbedPanelsContent">
                <div class="info">
                  <div class="col-md-7">
                    <ul>
                      <li><i class="fa fa-map-signs"></i> <strong>Paragon Accessories Pvt. Ltd.</strong><br>
                        Survey No.197, Plot No.7-B, Opp.Micro Melt, Gondal Highway,<br>
                        Veraval(Shapar), Rajkot - 360024 </li>
                    </ul>
                  </div>
                  <div class="col-md-5">
                    <ul>
                      <li><i class="fa fa-phone"></i>+91 92276 28929</li>
                      <li><i class="fa fa-phone"></i>+91 97223 32211</li>
                      <li><i class="fa fa-envelope"></i><a href="mailto:sales@paragontwowheeleraccessories.com">sales@paragontwowheeleraccessories.com</a></li>
                    </ul>
                  </div>
                </div>
                <div id="googleMap">
                 	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236776.8484044814!2d70.73215536394952!3d21.986842527021015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xefb5f046175c6282!2sMicro+Melt+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1553861603935!5m2!1sen!2sin"  frameborder="0" style="border:0" allowfullscreen></iframe>
                  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.785255670942!2d70.9413463154202!3d22.36173594631181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b10347e00067%3A0x44c01778b531e340!2sPARAGON+ACCESSORIES+PVT.+LTD.!5e0!3m2!1sen!2sin!4v1470208817018" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                </div>
              </div>
              <?php /*?><div class="TabbedPanelsContent">
                <div class="info">
                  <div class="col-md-7">
                    <ul>
                      <li><i class="fa fa-map-signs"></i> <strong>Paragon Accessories Pvt. Ltd.</strong><br>
                        Survey No.161,Plot No.4,Opp.Regal Pump, Nr.Primeseal Industries, SIDCO Road, <br>
                        Veraval(Shapar), Tal.Kotda Sangani. Dist.Rajkot - 360024 </li>
                    </ul>
                  </div>
                  <div class="col-md-5">
                    <ul>
                      <li><i class="fa fa-phone"></i>+91 92276 28929</li>
                      <li><i class="fa fa-phone"></i>+91 97223 32211</li>
                      <li><i class="fa fa-envelope"></i><a href="mailto:sales@paragontwowheeleraccessories.com">sales@paragontwowheeleraccessories.com</a></li>
                    </ul>
                  </div>
                </div>
                <div id="googleMap">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.785255670942!2d70.9413463154202!3d22.36173594631181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b10347e00067%3A0x44c01778b531e340!2sPARAGON+ACCESSORIES+PVT.+LTD.!5e0!3m2!1sen!2sin!4v1470208817018" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div><?php */?>
              <div class="TabbedPanelsContent">
                <div class="info">
                  <div class="col-md-6">
                    <ul>
                      <li><i class="fa fa-map-signs"></i> <strong>Paragon Accessories Pvt. Ltd.</strong><br>
                        Plot no.-219,220,221, Kuvadava G.I.D.C, 8-B national highway, <br>
                        Kuvadava - 360023 Dist- Rajkot </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                      <li><i class="fa fa-phone"></i>+91 92276 28929</li>
                      <li><i class="fa fa-phone"></i>+91 97223 32211</li>
                      <li><i class="fa fa-envelope"></i><a href="mailto:sales@paragontwowheeleraccessories.com">sales@paragontwowheeleraccessories.com</a></li>
                    </ul>
                  </div>
                </div>
                <div id="googleMap">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.6141377211743!2d70.95532661443039!3d22.368194046080607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b0552988afed%3A0x25b90c19709a2258!2skuvadva+gidc!5e0!3m2!1sen!2sin!4v1553861504603!5m2!1sen!2sin"  frameborder="0" style="border:0" allowfullscreen></iframe>
                  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.785255670942!2d70.9413463154202!3d22.36173594631181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b10347e00067%3A0x44c01778b531e340!2sPARAGON+ACCESSORIES+PVT.+LTD.!5e0!3m2!1sen!2sin!4v1470208817018" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>
<script language="javascript">
                populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
</script>
<!--<script src="js/vendor/jquery-1.11.0.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/user/js/jquery.validate.min.js"></script>
<!--<script src="js/bootstrap.js"></script>-->
<script type="text/javascript">
    
    $(document).ready(function() {

        $("#contact_form").validate({

            rules: {

                c_name: "required",
                c_email: "required",
                cc_name: "required",
                c_phone: "required",
                c_mobile: "required",
                c_subject: "required",
                message: "required",
                country: "required",
                state: "required",
                city: "required",
                zip_pincode: "required",
            },
             errorPlacement: function(){
                return false;  // suppresses error message text
             }

        });

    });

</script>
<!-- <script type="text/javascript">
  console.log(c_name);
  $.ajax({
    url : "<?php// echo base_url('contact-us'); ?>",
    type : "POST",
    dataType : "json",
    data : {
      'c_name': c_name,
      'c_email': c_email,
      'cc_name': cc_name,
      'c_phone': c_phone,
      'c_mobile': c_mobile,
      'c_subject': c_subject,
      'message': message,
      'country': country,
      'state': state,
      'city': city,
      'zip_pincode': zip_pincode,
      },
    success : function(data) {
        // do something
    },
    error : function(data) {
        // do something
    }
  });
</script> -->

<script src="<?php echo base_url(); ?>assets/user/js/jis.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery.gmap3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/js/menu_slide.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
       </script>
<script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdAoNoZAAAAABJ9AddYK8gAGvvUqPcl4A8GZMUW', {action: 'submit'}).then(function(token) {
              console.log(token);
          });
        });
      }
  </script>
       
</body>
</html>
