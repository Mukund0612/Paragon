<?php
$brand_id_array = [];
$pgname = 'brands_details';
$meta_title = "Brands | Paragon Accessories Pvt. Ltd.";
$meta_keywords = "Two wheeler accessories, honda accessories, yamaha accessories, suzuki accessories, mahindra accessories, tvs accessories, royale enfield accessories";
$meta_desc = "Brands | Paragon Accessories Pvt. Ltd.";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->


    <head>
        <?php include('head.php'); ?>
       
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <?php include('nav.php') ?>

			<div id="heading">
            	
              	  <div class="container">
                  	
                    <div class="row">                    	
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2><?php echo $brands_slug[0]->brand_name;// echo $row_brand_list2['brand_name']; ?></h2>
                                <span><a href="<?php echo base_url();?>">Home</a> / <a href="<?php echo base_url('brands');?>">Brands</a> / <?php echo $brands_slug[0]->brand_name; ?></span>
                            </div>
                        </div>
                   
                </div>
                </div>
            </div>

            
            
            <div id="products-post">
                <div class="container">
                    
                    <div class="row">
                        <div class="filters col-md-12 col-xs-12">
                            <ul id="filters" class="clearfix">
                            <?php foreach( $brands_slug2 as $brands_all ){ 
                                $brand_id_array[] = $brands_all->id; /*
                                 ?>
                                 <li><span class="filter" data-filter=".<?php // echo  $brand_name_arr[] = clean_url($row_brand_list['brand_name'])?>"><?php // echo $row_brand_list['brand_name'] ?></span></li>
                            <?php */ } ?>
                             
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 brand_main">
						<div class="row" ><!-- id="Container" -->
						 <?php 
						 	for($c=0;$c<count($brand_id_array);$c++)
                            {
                                $wh_brand_model['brand_id'] = $brand_id_array[$c];
                                $wh_brand_model['status'] = 'Y';
                                $brand_model = $this->Paramodel->select('models','',$wh_brand_model);
                                // echo "<pre>";
                                // print_r($brand_model);
                                // exit;
                                    foreach ($brand_model as $bm ) 
                                    {
                                        // print_r($bm);

                                ?>
								<?php /*?><div class="col-md-3 col-sm-6 mix portfolio-item <?php echo $brand_name_arr[$br] ?>">       
									<div class="portfolio-wrapper">                
										<div class="portfolio-thumb">
											<img src="<?php echo base_url(); ?>assets/user/images/product_images/<?php echo $row_barnd_model['model_display_picture'] ?>" alt="" class="model_img"/>
											<div class="hover">
												<div class="hover-iner">
													<a class="fancybox" href="<?php echo $SITE_URL ?>model/<?php echo $row_barnd_model['slug'] ?>/"><img src="<?php echo base_url(); ?>assets/user/images/open-icon.png" alt="" /></a>
												</div>
											</div>
										</div>  
										<!--<div class="label-text">
											<h3><a href="products_details.html">Product Name</a></h3>
											<span class="text-category">Rs 00.00</span>
										</div>-->
									</div>          
								</div><?php */?>
								
								<div class="col-md-4 col-sm-6 mix brands-item ">       
									<div class="portfolio-wrapper">                
										<div class="brand-thumb">
											<a href="<?php echo base_url('model_new'); ?>/<?php echo $bm->slug; ?>">
                                                <img src="<?php echo base_url().$bm->model_display_image; ?>" alt="<?php echo $bm->model_name; ?>" class="model_img" style="height:237.77px;" /></a>
										</div>  
										<h3><?php echo $bm->model_name; ?></h3>
									</div>          
								</div>
								
								<?php } ?>
							<?php } ?>

						</div>
                  </div>
                  
                  
                   <div class="row" >
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="model-detail-text">


							</div>
						</div>
					</div>


                </div>
            </div>
            
            
            
			

			<?php include_once('sticky-cart.php'); ?>

			<?php include('footer.php'); ?>

    
        <!--<script src="js/vendor/jquery-1.11.0.min.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/user/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery.gmap3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>
       <script src="<?php echo base_url(); ?>assets/user/js/menu_slide.js"></script>

    </body>
</html>