<?php if( $mode == "ADD" ){ echo "ADD"; }else{ echo "Edit"; };?>
<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/magnific-popup/magnific-popup.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/summernote/summernote-bs3.min.css">

<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>
<!-- Page Header -->

<div class="content bg-gray-lighter">
  <div class="row items-push">
    <div class="col-sm-8">
      <h1 class="page-heading"><?php echo $mode;?> Model</h1>
    </div>
    <div class="col-sm-4 text-right hidden-xs">
      <ol class="breadcrumb push-10-t">
        <li>Home</li>
        <li><a class="link-effect" href="<?php echo base_url('manage-models'); ?>"> Models </a></li>
        <li><?php echo $mode;?> Model</li>
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
            <input  type="hidden" id="hid" name="hid" value="id"> 
			<input  type="hidden" id="max_ord" name="max_ord" value="mex-order"> 
            <div class="form-group">
              <label class="col-xs-12" for="brand_id">Select Brand</label>
              <div class="col-sm-12">

                <select class="js-select2 form-control" id="brand_id" name="brand_id" style="width: 100%;">
                    	<!-- Select All Record From Brand -->
                    	<?php
                    	foreach($record as $row ) 
                    	{ ?>
                        <option value="<?php echo $row->id; ?>" <?php
                          if(isset($record_model[0]))
                          {
                            if( $row->id == $record_model[0]->brand_id )
                            {
                              echo "selected";
                            }
                          }?> ><?php echo $row->brand_name; ?></option>
                    	<?php } ?>
                   </select>

              </div>
            </div>
             <div class="form-group">
              <label class="col-xs-12" for="model_type">Select Type</label>
              <div class="col-sm-12">
                <select class="js-select2 form-control" id="model_type" name="model_type" style="width: 100%;">
                    	
                        <option value="1" <?php 
                          if(isset($record_model[0]))
                          {
                            if( $record_model[0]->model_type == 1 )
                            {
                              echo "selected"; 
                            } 
                          }?> >Scooter</option>
                        <option value="2" <?php 
                          if(isset($record_model[0]))
                          {
                            if( $record_model[0]->model_type == 2 )
                            { 
                              echo "selected"; 
                            } 
                          }?> >Bike</option>
                  </select>

              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12" for="model_name">Model Name</label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="model_name" name="model_name" value="<?php 
                  if(isset($record_model[0]))
                  { 
                    echo $record_model[0]->model_name; 
                  } ?>" />
              </div>
              <div style="padding-left: 18px"><p><?php echo form_error('model_name'); ?></p></div>
            </div>
            <div class="form-group">
              <label class="col-xs-12" for="model_description">Model Description</label>
              	<div class="col-sm-12">
				        	<textarea class="js-summernote" id="model_description"  name="model_description"><?php 
                    if(isset($record_model[0]))
                      {
                        echo $record_model[0]->model_description;
                      } ?></textarea>
				        </div>
                <div style="padding-left: 18px"><p><?php echo form_error('model_description'); ?></p></div>
            </div>
            
			
			<input  type="hidden" id="h_model_display_picture" name="h_model_display_picture" value="<?php 
      if(isset($record_model[0]))
      {
        echo $record_model[0]->model_display_image; 
      }
      ?>">
			<div class="form-group">
              <label class="col-xs-12" for="model_display_picture">Model Display Picture</label>
              <div class="col-sm-12">
                <input class="form-control" type="file" id="model_display_picture" name="model_display_picture">
           	 </div>
			</div>
			<!-- Update Time Update Photo Display -->
      <?php if(isset($record_model[0])) {?>
			<div class="form-group">
              <div class="col-sm-3 col-md-3">
                <img  src="<?php echo base_url().$record_model[0]->model_display_image; ?>" class="img-responsive"/>   
           	 </div>
			</div>
      <?php } ?>
			<div class="form-group">
              <label class="col-xs-12" for="model_images">Other Model Pictures</label>
              <div class="col-sm-12">
                <input class="form-control" type="file" id="model_images" name="model_images[]" multiple>
           	 </div>
			    <div style="color: red"><?php if(!empty($error)){print_r($error);} ?></div>
			</div>
      <div class="row items-push js-gallery-advanced">
      <?php if(isset($record_model[0])) 
      {
          if($img_count>0)
          {
            foreach ($model_image as $img) 
            {
              if($img->model_image != '' && file_exists("./".$img->model_image))
              {
      ?>
								<div class="col-sm-3 col-md-3 col-lg-3 animated fadeIn">
									<div class="img-container fx-img-rotate-r">
									<img class="img-responsive" src="<?php echo base_url().$img->model_image; ?>" alt="">
										<div class="img-options">
											<div class="img-options-content">
												<!-- + for Zoom Buttom -->
												<a class="btn btn-sm btn-default img-lightbox" href="<?php echo base_url().$img->model_image; ?>">
													<i class="fa fa-search-plus"></i> 
												</a>
												<div class="btn-group btn-group-sm">
												<!-- * for Unselect Image Buttom -->
												<a class="btn btn-default" href="javascript:void(0)" onclick="delImg(<?php echo $img->id; ?>)"><i class="fa fa-times"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
      <?php }}}}  ?>
				      </div>
            
            <div class="form-group">
              <label class="col-xs-12">Status</label>
              <div class="col-xs-6">
                <label class="css-input css-radio css-radio-primary push-10-r">
                <input type="radio" name="status" value="Y" <?php 
                  if(isset($record_model[0]))
                    {
                      if($record_model[0]->status == 'Y')
                      {
                       echo "checked"; 
                      }
                    } ?> >
                <span></span> Active </label>
                <label class="css-input css-radio css-radio-primary">
                <input type="radio" name="status" value="N" <?php 
                  if(isset($record_model[0]))
                    {
                      if($record_model[0]->status == 'N')
                      { 
                        echo "checked"; 
                      } 
                    }?> >
                <span></span> Inactive </label>
              <div style="padding-left: 0px"><p><?php echo form_error('status'); ?></p></div>
              </div>
            </div>
            <hr class="hidden-print" style="border-top: 4px solid #eee;">
			   <div class="form-group">
              <label class="col-xs-12" for="meta_title">Meta Title</label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="meta_title" name="meta_title" value="<?php 
                  if(isset($record_model[0]))
                  {
                   echo $record_model[0]->meta_title; 
                  } ?>" />
              </div>
              <div style="padding-left: 18px"><p><?php echo form_error('meta_title'); ?></p></div>
            </div>

            <div class="form-group">
              <label class="col-xs-12" for="meta_description">Meta Description</label>
              <div class="col-sm-12">
				        <textarea class="form-control" rows="6" id="meta_description"  name="meta_description"><?php 
                  if(isset($record_model[0]))
                    {
                     echo $record_model[0]->meta_descryption; 
                    } ?></textarea>
              </div>
              <div style="padding-left: 18px"><p><?php echo form_error('meta_description'); ?></p></div>
            </div>
            <div class="form-group">
              <label class="col-xs-12" for="meta_keywords">Meta Keywords</label>
              <div class="col-sm-12">
				        <textarea class="form-control" rows="6" id="meta_keywords"  name="meta_keywords"><?php 
                if(isset($record_model[0]))
                {
                 echo $record_model[0]->meta_keywords; 
                } ?></textarea>
              </div>
              <div style="padding-left: 18px"><p><?php echo form_error('meta_keywords'); ?></p></div>
            </div>
		
            <div class="form-group">
              <div class="col-xs-12">
                <button class="btn btn-sm btn-primary" type="submit" name='submit' value="submit"><?php 
                  if($mode == "ADD")
                    {?>
                      ADD MODEL
              <?php }
                    else
                    { ?>
                      Update MODEL
                    <?php }?></button>
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
<script src="<?php echo $one->assets_folder; ?>js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>js/plugins/bootstrap-datepicker/moment.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>js/plugins/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>js/plugins/bootstrap-datepicker/locale/es.js"></script>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>js/plugins/summernote/summernote.min.js"></script>

<script src="<?php echo $one->assets_folder; ?>js/plugins/magnific-popup/magnific-popup.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script>
	var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function(){
        jQuery('.js-validation-bootstrap').validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'brand_id': {
                    required: true
                   
                },
                'model_type': {
                    required: true
            
                },
                'model_name': {
                    required: true
                   
                },
                <?php if(isset($id) && $id==''){ ?>
                'model_display_picture': {
                    required: true
                   
                },
                <?php } ?>
                'model_description': {
                    required: true
                   
                }
            },
            messages: {
                
                'brand_id': 'Please Select Brand',
                'model_type': 'Please Model Type',
                'model_name': 'Please Enter Model Name',
                 <?php if(isset($id) && $id==''){ ?>
                'model_display_picture': 'Please Select Picture',
                <?php } ?>
                'model_description': 'Please Enter Details'
               
            }
        });
    };

    // Init Material Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
  

    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();

          
        }
    };
}();

// Initialize when page loads
jQuery( function(){ BaseFormValidation.init(); });
</script>
<!-- Page JS Code -->
<script>
    $(function(){
        // Init page helpers (Magnific Popup plugin)
        App.initHelpers(['summernote','select2','magnific-popup']);
    });
</script>


<?php require 'inc/views/template_footer_end.php'; ?>
<script>
 /*jQuery('.js-datetimepicker').datetimepicker({
            weekStart: 1,
            autoclose: true,
            todayHighlight: true
        });*/

	
function delImg(img_id)
{	

		 jQuery.ajax({
				url: "<?php echo base_url('admin-ajax'); ?>",
				type : "POST",
				data: {
					flag: "delete_pro_image",
					id : img_id
				},
				success:function(response){
          console.log(response);
					if(response == '"success"')
					{
						location.reload();
					}
				}
			});
}	
</script>