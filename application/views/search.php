<?php

$pgname = 'search';

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

    <style type="text/css">
    .portfolio-item {
        min-height: 400px;
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

                        <h2>Search Results</h2>

                    </div>

                </div>



            </div>

        </div>

    </div>

    <div id="products-post">

        <div class="container">

            <div class="col-md-12 col-sm-12 col-xs-12 brand_main">

                <div class="row" id="Container">

                    <?php
                    // echo "<pre>";
                    // print_r($SearchRecords);
                    // exit;
					if (count($SearchRecords) > 0) {
                        
                        $NoProduct = 0;
						foreach($SearchRecords AS $srec ) {

                            // $model_id = $srec->m_id ;
                            // $wh_model['id'] = $model_id; 
                            // $record_models = $this->Paramodel->select('models','',$wh_model,'ASC')[0];
                            // echo "<pre>";
                            // print_r($record_models);
							// $model_type = $record_models->model_type;
                            // $model_name = $record_models->model_name;
                    ?>

                    <div class="col-md-3 col-sm-6 mix portfolio-item">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-thumb">
								<a href="<?php echo base_url().'/'.$srec->slug; ?>">
								<?php if($srec->a_discount){ ?>
										<div class="badge_discount" ><span><?php echo $srec->a_discount; ?>% <small>Off</small></span></div>
									<?php } ?>

                                    <?php if ($srec->a_picture != '') { ?>
                                    <img src="<?php echo base_url().$srec->a_picture; ?>"
                                        alt="<?php echo $srec->a_name; ?>" class="model_img" />
                                    <?php } ?>
                                </a>
                            </div>
                            <h3><?php echo $srec->a_name; ?></h3>
							<p><?php if($srec->a_original > 0){ ?><span class="origianl_price">Rs. <?php echo $srec->a_original; ?></span><?php } ?>
                                    <span class="price">Rs. <?php echo $srec->a_price; ?></span>
                                </p>
                            <p><a href="javascript:;" data-id="<?php echo $srec->id; ?>"
                                    data-price="<?php echo $srec->a_price; ?>"
                                    class="add-to-cart-btn add_to_cart">Add to Cart</a></p>
                        </div>
                    </div>

                    <?php } ?>

                    <?php } else {
					/*
							$qry_srch = "SELECT models.* FROM models WHERE models.status = 'Y' AND (model_name LIKE '%".$term ."%' OR model_description LIKE '%".$term ."%') ORDER BY `id` DESC ";

							$res_srch = mysqli_query($db,$qry_srch);

							$toral_search = mysqli_num_rows($res_srch);

                            if($toral_search>0)
                            {

								$NoProduct = 0;
                                while($row_srch = mysqli_fetch_assoc($res_srch)){

                            	$model_id = $row_srch['id'];
								$model_name = $row_srch['model_name'];
								$model_slug = $row_srch['slug'];
								$model_pic = $row_srch['model_display_picture'];
                            	?>

                    <div class="col-md-3 col-sm-6 mix portfolio-item ">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-thumb">
                                <a href="<?php echo $SITE_URL ?>model/<?php echo $model_slug; ?>/">
                                    <?php if($model_pic!=''){ ?>
                                    <img src="<?php echo $SITE_URL ?>images/product_images/<?php echo $model_pic; ?>"
                                        alt="<?php echo $model_name; ?>" class="model_img" />
                                    <?php } ?>
                                </a>
                            </div>
                            <h3><?php echo $model_name; ?></h3>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>

                    <?php } ?>

                    <?php } 
						
						
						$qry_srch = "SELECT brands.* FROM brands WHERE brands.status = 'Y' AND LOWER(brand_name) LIKE '%".strtolower($term)."%' ORDER BY `id` DESC ";

							$res_srch = mysqli_query($db,$qry_srch);

							$toral_search = mysqli_num_rows($res_srch);

                            if($toral_search>0)
                            {

								$NoProduct = 0;
                                while($row_srch = mysqli_fetch_assoc($res_srch)){

                            	$model_id = $row_srch['id'];
								$model_name = $row_srch['brand_name'];
								$model_slug = $row_srch['slug'];
								$model_pic = $row_srch['brand_image'];
                            	?>

                    <div class="col-md-3 col-sm-6 mix portfolio-item ">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-thumb">
                                <a href="<?php echo $SITE_URL ?>brand/<?php echo $model_slug; ?>/">
                                    <?php if($model_pic!=''){ ?>
                                    <img src="<?php echo $SITE_URL ?>images/product_images/<?php echo $model_pic; ?>"
                                        alt="<?php echo $model_name; ?>" class="model_img" />
                                    <?php } ?>
                                </a>
                            </div>
                            <h3><?php echo $model_name; ?></h3>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>

                    <?php } ?>

                    <?php } */

                    
					
						echo '
								<h3>No search product</h3>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
							';
					}

					?>



                </div>

            </div>

        </div>

    </div>

    <?php include_once('sticky-cart.php'); ?>

    <?php include('footer.php') ?>



    <!--<script src="js/vendor/jquery-1.11.0.min.js"></script>-->

    <script src="<?php echo base_url(); ?>assets/user/js/bootstrap.js"></script>

    <script src="<?php echo base_url(); ?>assets/user/js/vendor/jquery.gmap3.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/user/js/plugins.js"></script>

    <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>

    <script src="<?php echo base_url(); ?>assets/user/js/menu_slide.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".add_to_cart").on('click', function() {
            $.ajax({
                url: "<?php echo base_url('ajax') ?>/",
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