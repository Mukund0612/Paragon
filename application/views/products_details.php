<?php  
$pgname = 'brands_details';
$meta_title = "Product | ".$get_access[0]->meta_title;
$meta_keywords = $get_access[0]->meta_keywords;
$meta_desc = $get_access[0]->meta_description;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<?php include('head.php'); ?>
<style>
           .lSSlideOuter .lSPager.lSGallery{
            margin-top: 50px !important;
           }
           .lightSlider.lsGrab > *{
            height: 300px;
           }
       </style>
</head>
<body>
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
<?php include('nav.php'); ?>
<div id="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-content">
          <h2>Product Detail</h2>
          <span><a href="<?php echo base_url(); ?>">Home</a> / <a href="<?php echo base_url('brands'); ?>">Brands</a> / <a href="<?php echo base_url('brand'); ?>/<?php echo $brand_list[0]->slug; ?>"><?php echo $brand_list[0]->brand_name; ?></a> / <a href="<?php echo base_url('model'); ?>/<?php echo $model_fetch[0]->slug; ?>"><?php echo $model_fetch[0]->model_name; ?></a> / <?php echo $get_access[0]->a_name; ?></span> </div>
      </div>
    </div>
  </div>
</div>

<div id="product-post">
  <div class="container">
    <div class="row">
      <div id="show_alert"> </div>
      <div class="product-item col-md-12">
        <?php// if(isset($_GET['add']) && $_GET['add']=='Y') {?>
        <!-- <div class="alert alert-success"> <strong>Success!</strong> Product added to your Cart. Visit your <a href="<?php// echo base_url(); ?>cart/">Cart Here.</a> </div> -->
        <?php //} ?>
        <div class="row">
         	
				  <div class="col-md-6">
					<div class="image">
					  <div class="image-post">              
					   <div class="flexslider"> 
             <?php if($get_access[0]->a_discount){ ?>
                <div class="badge_discount_big" ><span><?php echo $get_access[0]->a_discount; ?>% <small>Off</small></span></div>
              <?php } ?>
              	<div class="genuine-stamp" ></div>
						   <ul class="slides ">
							<?php /*?><li data-thumb="<?php echo base_url(); ?>images/product_images/<?php echo $model_display_picture; ?>"><?php */?>
							<li data-thumb="<?php echo  base_url().$model_fetch[0]->model_display_image; ?>" style="height:563px;width:563px;">
								<?php /*?><img class="img_box" src="<?php echo base_url(); ?>images/product_images/<?php echo $model_display_picture; ?>" /><?php */?>
								<img src="<?php echo base_url().$get_access[0]->a_picture; ?>" style="height:563px;width:563px;"/>
							</li>
							<?php /*?><li data-thumb="<?php echo base_url(); ?>watermark.php?image=images/product_images/<?php echo $model_display_picture; ?>&amp;watermark=images/watermark.png"> <img class="img_box" src="<?php echo base_url(); ?>watermark.php?image=images/product_images/<?php echo $model_display_picture; ?>&amp;watermark=images/watermark.png" style="max-height: 400px; width: auto; display: inline-block;" /> </li><?php */?>
							<?php 
  					  foreach ($access_image as $a_imgs ) 
              {
                // print_r($a_imgs);
                  if( $a_imgs->a_image !='' && file_exists($a_imgs->a_image))
                  {
              ?>
							<?php /*?><li data-thumb="<?php echo base_url(); ?>images/product_images/other_images/<?php echo $row_other_imgs['a_images'] ?>"><?php */?>
							<li data-thumb="<?php echo base_url().$a_imgs->a_image; ?>" >
								<?php /*?><img  class="img_box" src="<?php echo base_url(); ?>images/product_images/other_images/<?php echo $row_other_imgs['a_images'] ?>" /><?php */?>
								
								<img src="<?php echo base_url().$a_imgs->a_image; ?>"  class="img_box" />

							</li>

							<?php /*?><li data-thumb="<?php echo base_url(); ?>watermark.php?image=images/product_images/other_images/<?php echo $row_other_imgs['a_images'] ?>&amp;watermark=images/watermark.png"> <img class="img_box" src="<?php echo base_url(); ?>watermark.php?image=images/product_images/other_images/<?php echo $row_other_imgs['a_images'] ?>&amp;watermark=images/watermark.png" /> </li><?php */?>

							<?php }
						  } ?>

						</ul>
					   </div>
					  </div>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="product-content">
					  <div class="product-title">
						<h3><?php echo $get_access[0]->a_name;?></h3>
					  </div>
					  <p class="mid"><?php echo $get_access[0]->a_description;?></p>
					  <h4 class="hide">Product Price</h4>
					  <ul class="">
						<li>
						  <h2>Rs. <?php echo $get_access[0]->a_price;?></h2>
						</li>
					  </ul>
            <?php 
              if( $get_access[0]->a_original > 0) { ?>
                <p><span class="origianl_price">Rs. <?php echo $get_access[0]->a_original; ?></span></p>
              <?php } ?>
					  <?php /*?><div class="send">
						<button id="buy_now">Buy now</button>
            </div><?php */
            // if(!in_array($_SESSION['V_Country'], $HideCountry)){
            ?>
					  <div class="send">
						  <button id="add_to_cart" >Add to Cart</button>
					  </div>
            <?php //} ?>
					</div>
				  </div>
          	
        </div>
        <div class="other-iteam">
          <div class="row">
            <div class="col-md-12">
              <div class="heading-section">
                <h2>Other <span>Products</span></h2>
              </div>
            </div>
          </div>
          <div class="row">
          <?php 
            //$qry_relate = "SELECT * FROM access WHERE brand_id = ".$brand_id." AND a_type = ".$a_type." AND status = 'Y' ORDER BY id ASC LIMIT 4";
			
            foreach ( $access_left_join as $a_left_j ) {
           ?>
            <div class="col-md-3 col-sm-6">
              <div class="portfolio-wrapper">
                <div class="portfolio-thumb">
                  <!-- <img src="<?php // echo base_url().$a_left_j->a_picture; ?>" alt="" />
                  <?php ?><img src="#" alt="" /><?php ?> -->

                  <img src="<?php echo base_url().$a_left_j->a_picture; ?>" />

                  <div class="hover">
                    <div class="hover-iner"> <a class="fancybox" href="<?php echo base_url('product'); ?>/<?php echo $a_left_j->slug; ?>"><img src="<?php echo base_url(); ?>assets/user/images/link-icon.png" alt="" /></a> </div>
                  </div>
                </div>
                <div class="label-text">
                  <h3><?php echo $a_left_j->a_name; ?></h3>
                  <span class="text-category hide">Rs <?php echo $a_left_j->a_price; ?></span> </div>
              </div>
            </div>
            <?php } ?>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('sticky-cart.php'); ?>
<?php // echo $get_access[0]->id; exit; ?>
<?php //echo "<pre>"; print_r($get_access); exit; ?>

<?php include('footer.php'); ?>
<script src="<?php echo base_url(); ?>assets/user/js/loader1.js"></script>
<!-- Resource jQuery -->
<!--<script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.0.min.js"></script>-->
<!--<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>-->
<script src="<?php echo base_url(); ?>assets/user/js/jis.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery.gmap3.min.js"></script>

    <script type="text/javascript">
       $(document).ready(function(){
              // click on add to cart button to call this function
              $("#add_to_cart").on('click',function(){
                  $.ajax({
                      url: "<?php echo base_url('ajax'); ?>/",
                      type : "POST",
                      data: {
                          flag: "add_to_cart",
                          pro_id : '<?php echo $get_access[0]->id; ?>',
                          pro_price: '<?php echo $get_access[0]->a_price; ?>'
                      },
                      success:function(data){
                          var data = data.split(',');
                          if(data[0]=='success')
                          {
                            window.location.href = "?add=Y";
                          }
                      }
                  });
              });
       });
      </script>
      <script src="<?php echo base_url(); ?>assets/user/js/jquery.flexslider.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
        $('.flexslider').flexslider({
          animation: "fade",
           slideshow: false,
          controlNav: "thumbnails",
          directionNav: false,
         before : function(slider) {
              $('.img_box').imagezoomsl({ 
                    zoomrange: [1, 10],
                    magnifiereffectanimate: "fadeIn",
                    magnifiersize: [500, 400],
                  });
                }
        });
      });

      </script>
     <script src="<?php echo base_url(); ?>assets/user/js/zoomsl-3.0.min.js"></script>
     <script>
    jQuery(function(){
      $('.img_box').imagezoomsl({ 
        zoomrange: [1, 10],
        magnifiereffectanimate: "fadeIn",
        magnifiersize: [500, 400],
      });  
    });
    </script>
    <script src="<?php echo base_url(); ?>assets/user/js/menu_slide.js"></script>

</body>
</html>
