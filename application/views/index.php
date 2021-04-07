<?php 

$pgname = 'home';

$meta_title = "Paragon Accessories Pvt. Ltd.";

$meta_keywords = "Two wheeler accessories, honda accessories, yamaha accessories, suzuki accessories, mahindra accessories, tvs accessories, royale enfield accessories";

$meta_desc = "Paragon Accessories Pvt. Ltd.";

// print_r($access_left);
// exit;

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/video-js.css">

    <style></style>
</head>

<body>
    <!-- class="page-is-changing bg-black" -->

    <!--[if lt IE 7]>



            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>



        <![endif]-->

    <!-- <div id="logo_animation"><img src="<?php echo base_url(); ?>assets/user/images/logo.gif" style="width: 100%;height: 700px;position: absolute;z-index: 99999"></div> -->

    <main>
        <div class="cd-index cd-main-content" style=" background-color: transparent;">
            <div style="display:none;">
                <h1>Animated Page Transition</h1>
                <a class="cd-btn" href="#" data-type="page-transition">Start animation</a>
            </div>
        </div>
    </main>
    <?php /*?><div class="loadvideo" style="width: :100%;">



        <video id="my-video" class="video-js vjs-big-play-centered hidden-xs hidden-sm" muted autoplay preload="auto"
            style="width:100%;top: 25%;position: relative;" data-setup='{}'>
            <source src="<?php echo base_url(); ?>images/logo.mp4">



            <p class="vjs-no-js">



                To view this video please enable JavaScript, and consider upgrading to a web browser that



                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>



            </p>



        </video>



        <!--<audio id="audio_logo" controls="false" ><source src="logo2.mp3" type="audio/mpeg"></audio>-->



    </div><?php */?>
    <div class="loadedpage">

        <?php include("nav.php"); ?>
        <?php // print_r($access_left);die(); ?>
        <div id="slider">

            <ul class="jis-trigger">
                <li class="jis-selected"><img src="<?php echo base_url(); ?>assets/user/images/ParagonBanner1.jpg"
                        alt="" /> </li>
                <li> <img src="<?php echo base_url(); ?>assets/user/images/ParagonBanner2.jpg" alt="" /> </li>
                <li> <img src="<?php echo base_url(); ?>assets/user/images/ParagonBanner3.jpg" alt="" /> </li>
            </ul>

        </div>
        <div class="container">
            <div class="shopping-features top-feat">
                <ul>
                    <li> <span class="feat-icon"><i class="fa fa-truck"></i></span>
                        <h3>Free Shipping <?php echo display('hello'); ?> </h3>
                        <p>Free shipping on all orders</p>
                    </li>
                    <li> <span class="feat-icon"><i class="fa fa-shield"></i></span>
                        <h3>Safe Shopping</h3>
                        <p>Safe shopping guarantee</p>
                    </li>
                    <li> <span class="feat-icon"><i class="fa fa-percent"></i></span>
                        <h3>Best price & deals</h3>
                        <p>Upto 20% discount*</p>
                    </li>
                    <li> <span class="feat-icon"><i class="fa fa-credit-card"></i></span>
                        <h3>Payment Secure</h3>
                        <p>We ensure secure payment</p>
                    </li>
                </ul>
            </div>
        </div>
        <?php foreach($brands_view as $brandAdd ) { $brandID = $brandAdd->id; ?>
        <div class="product-slider-section">
            <div class="container">
                <div class="heading-section">
                    <h2><?php echo strtoupper($brandAdd->brand_name); ?> <span>Accessories</span></h2>
                    <a href="<?php echo base_url('brand'); ?>/<?php echo $brands_view[0]->brand_name; ?>"
                        class="view-all">View All</a>
                </div>
                <div class="row">
                    <!-- Product Detail Fetch Data In Two Table -->
                  <?php
                    $access_left = $this->db->query("SELECT `access`.*,`access-model`.`m_id` from `access-model` left join `access` on `access`.`id`=`access-model`.`a_id` WHERE `brand_id`=$brandID AND `access`.`status`='Y' ORDER BY id DESC;")->result(); 
                    //  echo "<pre>";
                    //  print_r($access_left);
                    //  die();
                    foreach( $access_left as $acc_letf ) 
                      {
                        $fetch['id'] = $acc_letf->m_id;
                        $models = $this->Paramodel->select_asc('models','ASC',$fetch);
                        // echo "<pre>";
                        // print_r($models);
                        // die();
                        $model_type = $models[0]->model_type;
                        $model_name = $models[0]->model_name;
                  ?>
                    <div class="col-md-3 col-sm-6 mix portfolio-item ">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-thumb">
                                <!-- Add Discount Lable On Photo -->
                                <a href="<?php echo base_url('product'); ?>/<?php echo $acc_letf->slug; ?>">
                                    <div class="badge_discount"><span><?php echo $acc_letf->a_discount; ?>%
                                            <small>Off</small></span></div>
                                    <!-- Image Display -->
                                    <?php if($acc_letf->a_picture != "") { ?>
                                    <img src="<?php echo $acc_letf->a_picture; ?>"
                                        alt="<?php echo $acc_letf->a_name; ?>" class="model_img" />
                                    <?php } ?>
                                </a>
                            </div>
                            <!-- Name -->
                            <h3>
                                <h3><?php echo $acc_letf->a_name; ?></h3>
                            </h3>
                            <!-- Price -->
                            <p><span class="price">Rs.<?php echo $acc_letf->a_price; ?> Price</span></p>
                            <p><span class="origianl_price">Rs.<?php echo $acc_letf->a_original; ?> Price</span></p>
                            <p><a href="javascript:;" data-id="<?php echo $acc_letf->id; ?>"
                                    data-price="<?php echo $acc_letf->a_price; ?>"
                                    class="add-to-cart-btn add_to_cart">Add to Cart</a></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } //echo "<pre>"; print_r($access_left)."<br/>"; print_r($access_left_four); exit;?>
        <!---------------------------------------------------- Comments ----------------------------------------------------------->
        <!-- <?php //if(isset($brands_view[1]) && $brands_view[1]->brand_name == "TVS" ) { // die('TVS');?>
  <div class="product-slider-section">
    <div class="container">
      <div class="heading-section">
        <h2>TVS <span>Accessories</span></h2>
        <a href="<?php// echo base_url('brand'); ?>/<?php echo $brands_view[1]->brand_name; ?>" class="view-all">View All</a> </div>
      <div class="row">
        <?php
       
      //  foreach( $access_left_four as $acc_four ) 
      //   {
      //     $fetch['id'] = $acc_four->m_id;
      //     $models = $this->Paramodel->select_asc('models','ASC',$fetch);
          
      //     $model_type_four = $models[0]->model_type;
      //     $model_name_four = $models[0]->model_name;

      //  ?>
      <div class="col-md-3 col-sm-6 mix portfolio-item ">
          <div class="portfolio-wrapper">
            <div class="portfolio-thumb"> 
              
              <a href="<?php //echo base_url('product'); ?>/<?php// echo $acc_four->slug; ?>">
                <div class="badge_discount" ><span><?php// echo $acc_four->a_discount; ?>% <small>Off</small></span></div>
                <?php// if($acc_four->a_picture != "") { ?>
                <img src="<?php// echo $acc_four->a_picture; ?>" alt="<?php// echo $acc_four->a_name; ?>" class="model_img"/>
                <?php //} ?>
              </a>
            </div>
            <h3><h3><?php// echo $acc_four->a_name; ?></h3></h3>
            <p><span class="price">Rs.<?php// echo $acc_four->a_price; ?> Price</span></p>
            <p><span class="origianl_price">Rs.<?php// echo $acc_four->a_original; ?> Price</span></p>
            <p><a href="javascript:;" data-id="<?php// echo $acc_four->id; ?>" data-price="<?php// echo $acc_four->a_price; ?>" class="add-to-cart-btn add_to_cart">Add to Cart</a></p>
            
          </div>
        </div> -->
        <?php //} ?>
        <!-- </div>
    </div>
  </div> -->
        <?php// } ?>

        <div class="welcome_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-section">
                            <h2>India’s one stop shop for <span>two wheeler accessories</span></h2>
                        </div>
                    </div>
                    <!-- <div class="col-md-5 welcome text-left">
          <div class="welcome text-left"> <img src="<?php echo base_url(); ?>/w.php?image=images/office.jpg" /></div>
        </div>
        <div class="col-md-7 welcome text-left"> -->
                    <div class="col-md-12 welcome text-left">
                        <p>Founded in the year 2010, Paragon Accessories Pvt Ltd is the flagship company of the Paragon
                            Group of Industries in India with its manufacturing base in Rajkot, Gujarat. We produce the
                            best quality two wheeler accessories that not only look great but also would protect your
                            vehicle from all round damages and scratches.</p>
                        <p>We have a fully equipped manufacturing unit that is capable of producing around 500 to 700
                            accessories daily so as to meet up with your requirements. We ensure to produce the best
                            products which can protect your favorite two wheelers from damages, scratches and with its
                            metal finish can enhance the way your vehicle looks.</p>
                        <div class="space30"></div>
                        <h4>Why Choose Us?</h4>
                        <ul>
                            <li>We provide free shipping all across the country and hence you would not have to pay
                                anything extra in order to get your product delivered at your doorstep.</li>
                            <li>We offer the best deals and discounts on every product and thus you get the highest
                                quality accessory at the best price ever. We offer a discount of up to 20% on all
                                products.</li>
                            <li>We guarantee safe shopping at our website and hence you would not have to worry about
                                any loss of information. We also look after securing your payment and ensure that you
                                have a very safe transaction at our website.</li>
                        </ul>

                    </div>
                    <div class="col-lg-12 welcome text-left">
                        <h4>What do paragon store offer?</h4>
                        <p>Paragon store basically offers guards and accessories for all models of two wheelers
                            available in the market. We use the best materials and highly advanced equipment in order to
                            make the best accessories which would give all round protection to your two wheeler vehicle
                            and would enhance its overall appearance.</p>
                        <p>All the accessories are high in performance, protects the vehicle from damages and scratches
                            along with saving it from rust caused due to changing weather conditions. They all come in
                            metallic chrome finish which adds a great zing to the overall appearance of the scooters.
                        </p>
                        <p>The accessories that online Paragon store produces for different models of two wheelers would
                            include</p>
                        <ul>
                            <li>Front mud guard bumper</li>
                            <li>Front crash guard right and left set</li>
                            <li>Round guard with fitting</li>
                        </ul>
                    </div>

                    <div class="col-lg-12 download-pdf">
                        <a href="<?php echo base_url(); ?>assets/user/images/paragon-accessories-booklet.pdf"
                            download><img src="<?php echo base_url(); ?>assets/user/images/pdf.png"
                                alt="Download Booklate" title="Download Booklate" /></a>
                    </div>

                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <div class="cd-cover-layer" style="z-index: 999;"></div>
    <div class="cd-loading-bar"></div>
    <?php /* ?>



    <div class="cd-cover-layer" style="text-align:center">



        <video id="my-video" class="video-js" controls preload="auto" style="margin-left:15%;width:70%;height:100%"
            data-setup='{}' autoplay>



            <source src="<?php echo base_url(); ?>assets/user/images/logo.mp4">



            <p class="vjs-no-js">



                To view this video please enable JavaScript, and consider upgrading to a web browser that



                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>



            </p>



        </video>



    </div>



    <?php */ ?>

    <!-- Resource jQuery -->

    <script src="<?php echo base_url(); ?>assets/user/js/loader1.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/video.js"></script>
    <script type="text/javascript">
    /*
	$(document).ready(function(e) {



if ($(window).width() > 960) {







  var video = videojs('my-video');



    setTimeout(function(){



    $('body').removeClass('page-is-changing');




     video.play();

	

  },5000);







  video.on('ended', function() {



     $('body').removeClass('bg-black');



     $('.loadvideo').hide();



     $('.loadedpage').show();



  });



}







if ($(window).width() < 960) {







     $('.loadvideo').hide();



     $('.loadedpage').show();  



   setTimeout(function(){



    $('body').removeClass('page-is-changing');



    $('body').removeClass('bg-black');











  },5000);



}



}); */
    </script>

    <!--<script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery-1.11.0.min.js"></script>-->

    <script>
    /*var video = videojs('my-video')



if ($(window).width() > 960) {



   



















   $(window).scroll(function() {



     var hT = $('.welcome_section').offset().top,



         hH = $('.welcome_section').outerHeight(),



         wH = $(window).height(),



         wS = $(this).scrollTop();



     if (wS > (hT-100+hH-wH)){



           video.play();



     }



  });



}*/







    /*var video = videojs('my-video').ready(function(){



      var player = this;







      player.on('ended', function() {



      



      var newPageArray = location.pathname.split('/'),



            //this is the url of the page to be loaded 



    	 newPage = newPageArray[newPageArray.length - 1];



      



       loadNewContent(newPage, false);



       function loadNewContent(url, bool) {



    		url = ('' == url) ? 'index.html' : url;



      	var newSection = 'cd-'+url.replace('.html', '');



      	var section = $('<div class="cd-main-content '+newSection+'"></div>');







    	  //Here to display page contents



          var delay = ( transitionsSupported() ) ? 500 : 0;



          setTimeout(function(){



    		$('body').removeClass('page-is-changing');



            $('.cd-loading-bar').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){



              isAnimating = false;



              $('.cd-loading-bar').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');



            });







              setTimeout(function(){



    			  $('main').hide();



    			  //$('.loadedpage').show();// style="z-index:0;position: relative; display:none;"



    		  }, delay);







          }, delay);







      }



       function transitionsSupported() {



        return $('html').hasClass('csstransitions');



      }



       



       



      });



    });*/
    </script>

    <!--<script src="<?php echo base_url(); ?>assets/user/js/bootstrap.js"></script>-->

    <script src="<?php echo base_url(); ?>assets/user/js/jis.jquery.min.js"></script>
    <script type="text/javascript">
    setInterval(function() {
        $("div.jis-direction-next").click()
    }, 8000);
    </script>
    <script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery.gmap3.min.js"></script>

    <!--<script src="<?php echo base_url(); ?>assets/user/js/plugins.js"></script>



        <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>



        



		<script type="text/javascript" language="javascript">



		$(document).ready(function(){



		  $('.skitter-large').skitter({



			animation: 'random',



			label: false,



			numbers: false,



			theme: 'square'



		  }); 



		 



		});



		



	  </script>-->

    <script type="text/javascript">
    /*$(document).ready(function(e) {
         setTimeout(function()
          {
           ;
            $('#logo_animation img').fadeOut('fast' ,function(){

                $('.loadedpage').show();
            });

            $('#logo_animation img').remove();
     },5000);
      });*/



    if (screen.width >= 1280) {



        $(window).resize(function() {



            setTimeout(function()



                {







                    $('.jis-wrapper').css('width', '100%');



                    $('.jis-trigger').css('width', '100%');



                    $('.jis-trigger li').css('width', '100%');


                    //$('.jis-wrapper').css('height',window.innerHeight+'px');



                    //$('.jis-trigger').css('height',window.innerHeight+'px');



                    //$('.jis-trigger li').css('height',window.innerHeight+'px');



                    //$('.jis-trigger li img').css('height',window.innerHeight+'px');



                }, 100);







        });



        $(document).ready(function(e) {



            setTimeout(function()



                {







                    $('.jis-wrapper').css('width', '100%');



                    $('.jis-trigger').css('width', '100%');



                    $('.jis-trigger li').css('width', '100%');







                    //$('.jis-wrapper').css('height',window.innerHeight+'px');



                    //$('.jis-trigger').css('height',window.innerHeight+'px');



                    //$('.jis-trigger li').css('height',window.innerHeight+'px');



                    //$('.jis-trigger li img').css('height',window.innerHeight+'px');



                }, 100);



        });







    }
    </script>
    <script src="<?php echo base_url(); ?>assets/user/js/imageMapResizer.min.js"></script>
    <script type="text/javascript">
    $('map').imageMapResize();
    </script>
    <script src="<?php echo base_url(); ?>assets/user/js/menu_slide.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/user/css/stickytooltip.css" />
    <div id="mystickytooltip" class="stickytooltip">
        <div style="padding:5px">
            <div id="gujrat" class="atip">
                <div class="thumb"><img src="<?php echo base_url(); ?>assets/user/images/loader-w.gif" /></div>
                Gujrat
            </div>
            <div id="rajasthan" class="atip">
                <div class="thumb"><img src="<?php echo base_url(); ?>assets/user/images/loader-w.gif" /></div>
                Rajasthan
            </div>
            <div id="maharashtra" class="atip">
                <div class="thumb"><img src="<?php echo base_url(); ?>assets/user/images/loader-w.gif" /></div>
                Maharashtra
            </div>
            <div id="mp" class="atip">
                <div class="thumb"><img src="<?php echo base_url(); ?>assets/user/images/loader-w.gif" /></div>
                Madhya Pradesh
            </div>
        </div>
        <div class="stickystatus"></div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".add_to_cart").on('click', function() {
            $.ajax({
                url: "<?php echo base_url('ajax'); ?>/",
                type: "POST",
                data: {
                    flag: "add_to_cart",
                    pro_id: $(this).data('id'),
                    pro_price: $(this).data('price'),
                },
                success: function(data) {
                    var data = data.split(',');
                    if (data[0] == 'success') {
                        //window.location.href = "?add=Y";
                        location.reload();
                    }
                }
            });
        });
    });
    </script>

</body>

</html>