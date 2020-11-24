<?php require 'inc/config.php'; ?>

<?php require 'inc/views/template_head_start.php'; ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/js/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/js/plugins/summernote/summernote-bs3.min.css">

<?php require 'inc/views/template_head_end.php'; ?>

<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->

<?php if(!empty($error)){ print_r($error); } ?>


<div class="content bg-gray-lighter">

  <div class="row items-push">

    <div class="col-sm-8">

      <h1 class="page-heading"> Brands </h1>

    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li>Home</li>

        <li><a class="link-effect" href="<?php echo base_url('manage-brands'); ?>">Brands</a></li>

        <li> Brand</li>

      </ol>

    </div>

  </div>

</div>

<!-- END Page Header -->

<!-- Page Content -->

<div class="content content-narrow">

  <!-- Bootstrap Design -->

  <div class="row">

    <div class="col-md-12">

      <!-- Default Elements -->

      <div class="block">

        <div class="block-content block-content-narrow">

          <form class="js-validation-bootstrap form-horizontal" action="" method="post" enctype="multipart/form-data">

            <input  type="hidden" id="hid" name="hid" value="">

            <div class="form-group">

              <label class="col-xs-12" for="brand_name">Brand Name</label>

              <div class="col-sm-9">

                <input class="form-control" type="text" id="example-text-input" name="brand_name" value="<?php
                if(isset($record))
                {
                  echo $record->brand_name;
                }
                ?>">

              </div>

            </div>
            
            
            <div class="form-group">
              <label class="col-xs-12" for="model_description">Brand Description</label>
              <div class="col-sm-12">
      				<textarea class="js-summernote" id="brand_description"  name="brand_description"><?php
              if(isset($record))
                {
                  echo $record->brand_description;
                }
              ?></textarea>
              </div>
              <div style="padding-left: 15px;"><p><?php echo form_error('brand_description'); ?></p></div>
              
            </div>
            
            
            <input  type="hidden" id="h_brand_image" name="h_brand_image" value="<?php if(isset($record)){echo $record->brand_image;  } ?>">
			<div class="form-group">
              <label class="col-xs-12" for="brand_image">Brand Banner</label>
              <div class="col-sm-12">
                <input class="form-control" type="file" id="brand_image" name="brand_image">
                <br />
                <span style="color: red;" >Image size: 530px(W) X 330px(H)</span>
           	 </div>
			</div>

			<!-- Update Time Image Display -->
			<?php if(isset($record)){?>
			<div class="form-group">
              <div class="col-sm-3 col-md-3">
                <img  src="<?php echo base_url().$record->brand_image; ?>" class="img-responsive"/>   
           	 </div>
			</div>
			<?php }?>


            <div class="form-group">

              <label class="col-xs-12">Status</label>

              <div class="col-xs-6">

                <label class="css-input css-radio css-radio-primary push-10-r">

                <input type="radio" name="status" value="1" <?php 
                if(isset($record) && $record->status == "1" )
                {
                  echo "checked";
                }
                ?> >

                <span></span> Active </label>

                <label class="css-input css-radio css-radio-primary">

                <input type="radio" name="status" value="0" <?php 
                if(isset($record) && $record->status == "0" )
                {
                  echo "checked";
                }
                ?> >

                <span></span> InActive </label>

              </div>

            </div>

            <div class="form-group">

              <div class="col-xs-12">

                <button class="btn btn-sm btn-primary" type="submit" name='<?php if(isset($record)) { ?>update<?php }else{ ?>add<?php }?>' value="add"><?php
                if(isset($record)) { ?> UPDATE BRAND <?php }else{ ?>ADD BRAND <?php }?></button>

              </div>

            </div>

          </form>

        </div>

      </div>

      <!-- END Default Elements -->

    </div>

  </div>

  <!-- Bootstrap Design -->

</div>

<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>

<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->

<script src="<?php echo $one->assets_folder; ?>js/plugins/jquery-validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/plugins/summernote/summernote.min.js"></script>

<!-- Page JS Code -->

<script src="<?php echo $one->assets_folder; ?>js/pages/brands.js"></script>

<script>
    $(function(){
        // Init page helpers (Magnific Popup plugin)
        App.initHelpers(['summernote','select2','magnific-popup']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>

