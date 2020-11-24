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
      <h1 class="page-heading"><?php echo $mode;?> Accessories</h1>
    </div>
    <div class="col-sm-4 text-right hidden-xs">
      <ol class="breadcrumb push-10-t">
        <li>Home</li>
        <li><a class="link-effect" href="<?php echo base_url('manage-access') ?>"> Accessories </a></li>
        <li><?php echo $mode;?> Accessories</li>
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
			<input  type="hidden" id="max_ord" name="max_ord" value=""> 
       		<div class="form-group">
              <label class="col-xs-12" for="brand_id">Select Brand</label>
              <div class="col-sm-12">
                <select class="js-select2 form-control" id="brand_id" name="brand_id" style="width: 100%;" onchange="modelTYP(this.value)">
                    	<?php 
                    	foreach ($tbl_brand as $brand ) 
                    	{
                    	?>
                    	<option value="<?php 
                    	if(isset($brand))
                    	{
                    		echo $brand->id;
                    	} ?>" <?php if(set_select('brand_id',$brand->id))
                      {
                        echo set_select('brand_id',$brand->id);
                      }
                      else
                      {
                        if(isset($access) && $access->brand_id ==$brand->id)
                        {
                          echo "selected";
                        }
                      }  ?> ><?php if(isset($brand))
                    	{
                    		echo $brand->brand_name;  
                    	} ?></option>
                   	<?php } ?>
                   </select>

              </div>
            </div>
             <div class="form-group">
              <label class="col-xs-12" for="a_type">Select Type</label>
              <div class="col-sm-12">
                <select class="js-select2 form-control" id="a_type" name="a_type" style="width: 100%;"  onchange="modelTYP(this.value)">
                    	
                        <option value="1" <?php if(set_select('a_type',"1"))
                        {
                          echo set_select('a_type',"1");
                        }
                        else
                        {
                          if(isset($access) && $access->a_type == "1")
                          {
                            echo "selected";
                          }
                        } ?> >Scooter</option>
                        <option value="2" <?php if(set_select('a_type',"2"))
                        {
                          echo set_select('a_type',"2");
                        }
                        else
                        {
                          if(isset($access) && $access->a_type == "2")
                          {
                            echo "selected";
                          }
                        } ?> >Bike</option>
                     
                   </select>

              </div>
            </div>
           
           <div class="form-group">
              <label class="col-xs-12" for="brand_id">Select Model</label>
              <div class="col-sm-12">
                <select class="js-select2 form-control" id="model_id" name="model_id[]" style="width: 100%;" multiple >
					<?php
          $select_default_model = $this->db->query("SELECT id,model_name FROM models Where brand_id=1 and model_type=1")->result();
          // echo "<pre>";
          // print_r($select_default_model);
          // exit;
					foreach ($select_default_model as $model )
					{
					?>
					<option value="<?php echo $model->id; ?>" ><?php echo $model->model_name; ?></option>
					<?php } ?>
			   </select>
              </div>
              <div style="padding-left: 18px;"><?php echo form_error('model_id[]'); ?></div>
            </div>

            <div class="form-group">
              <label class="col-xs-12" for="a_name">Accessories Name</label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="a_name" name="a_name" value="<?php 
                if(set_value('a_name'))
                        {
                          echo set_value('a_name');
                        }
                        else
                        {
                          if(isset($access) && $access->a_name)
                          {
                            echo $access->a_name;
                          }
                        } ?>" />
              </div>
              <div style="padding-left: 18px;"><?php echo form_error('a_name'); ?></div>
            </div>

			<div class="form-group">
              <label class="col-xs-12" for="a_name">Original Price <small>(For display only)</small></label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="a_original" name="a_original" value="<?php 
                if(set_value('a_original'))
                        {
                          echo set_value('a_original');
                        }
                        else
                        {
                          if(isset($access) && $access->a_original)
                          {
                            echo $access->a_original;
                          }
                        } ?>" />
              </div>
              <div style="padding-left: 18px;"><?php echo form_error('a_original'); ?></div>
            </div>

			<div class="form-group">
              <label class="col-xs-12" for="a_name">Accessories Price (Sell Price)</label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="a_price" name="a_price" value="<?php 
                if(set_value('a_price'))
                        {
                          echo set_value('a_price');
                        }
                        else
                        {
                          if(isset($access) && $access->a_price)
                          {
                            echo $access->a_price;
                          }
                        } ?>" />
              </div>
              <div style="padding-left: 18px;"><?php echo form_error('a_price'); ?></div>
            </div>

			<div class="form-group">
              <label class="col-xs-12" for="a_name">Discount % <br /><small>(Please enter only digit not %)</small></label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="a_discount" name="a_discount" value="<?php 
                if(set_value('a_discount'))
                        {
                          echo set_value('a_discount');
                        }
                        else
                        {
                          if(isset($access) && $access->a_discount)
                          {
                            echo $access->a_discount;
                          }
                        } ?>" />
              </div>
              <div style="padding-left: 18px;"><?php echo form_error('a_discount'); ?></div>
            </div>

            <div class="form-group">
              <label class="col-xs-12" for="a_description">Accessories Description</label>
              <div class="col-sm-12">
				 <textarea class="js-summernote" id="a_description"  name="a_description"><?php 
                if(set_value('a_description'))
                        {
                          echo set_value('a_description');
                        }
                        else
                        {
                          if(isset($access) && $access->a_description)
                          {
                            echo $access->a_description;
                          }
                        } ?></textarea>
				</div>
				<div style="padding-left: 18px;"><?php echo form_error('a_description'); ?></div>
            </div>
            
			
			<input  type="hidden" id="h_a_picture" name="h_a_picture" value="">
			<div class="form-group">
              <label class="col-xs-12" for="a_picture">Accessories Display Picture</label>
              <div class="col-sm-12">
                <input class="form-control" type="file" id="a_picture" name="a_picture">
                <div style="color: red"><?php 
                  if(isset($error))
                     {
                       echo $error;
                     } 
                     ?>
                </div>
              </div>
			</div>
      <?php if(isset($access)){ ?>
			<div class="form-group">
              <div class="col-sm-3 col-md-3">
                <img  src="<?php echo base_url().$access->a_picture; ?>" class="img-responsive"/>   
           	 </div>
			</div>
    <?php } ?>
			<div class="form-group">
              <label class="col-xs-12" for="access_images">Other Accessories Pictures</label>
              <div class="col-sm-12">
                <input class="form-control" type="file" id="access_images" name="access_images[]" multiple>
                <div style="color: red"><?php 
                  if(isset($multi_error))
                     {
                       echo $multi_error;
                     } 
                     ?>
                </div>
           	 </div>
			</div>
					<div class="row items-push js-gallery-advanced">
          <?php 
          if(isset($access_image))
          {
            // echo "<pre>";
            // print_r($access_image);
            // exit;
              foreach ($access_image as $img ) 
              {
          ?>
						<div class="col-sm-3 col-md-3 col-lg-3 animated fadeIn">
							<div class="img-container fx-img-rotate-r">
							<img class="img-responsive" src="<?php echo base_url().$img->a_image; ?>" alt="">
								<div class="img-options">
									<div class="img-options-content">
										<a class="btn btn-sm btn-default img-lightbox" href="<?php echo base_url().$img->a_image; ?>">
											<i class="fa fa-search-plus"></i> 
										</a>
										<div class="btn-group btn-group-sm">
											<a class="btn btn-default" href="javascript:void(0)" onClick="delImg(<?php echo $img->id; ?>)"><i class="fa fa-times"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
			 <?php } } ?>	
				</div>
			<div class="form-group">
              <!-- <label class="col-xs-12">Status</label> -->
              <div class="col-xs-6">
                <label class="css-input css-radio css-radio-primary push-10-r">
                <input type="radio" name="a_kit" value="1" <?php 
                if(set_radio('a_kit','1'))
                        {
                          echo set_radio('a_kit','1');
                        }
                        else
                        {
                          if(isset($access) && $access->a_kit == '1' )
                          {
                            echo "checked";
                          }
                        } ?> >
                <span></span> Kit product </label>
                <label class="css-input css-radio css-radio-primary">
                <input type="radio" name="a_kit" value="0" <?php 
                if(set_radio('a_kit','0'))
                        {
                          echo set_radio('a_kit','0');
                        }
                        else
                        {
                          if(isset($access) && $access->a_kit == '0' )
                          {
                            echo "checked";
                          }
                        } ?> >
                <span></span> Not a kit product </label>
                <div><?php echo form_error('a_kit'); ?></div>
              </div>

            </div>

            <div class="form-group">
              <label class="col-xs-12">Status</label>
              <div class="col-xs-6">
                <label class="css-input css-radio css-radio-primary push-10-r">
                <input type="radio" name="status" value="Y" <?php 
                if(set_radio('status','Y'))
                        {
                          echo set_radio('status','Y');
                        }
                        else
                        {
                          if(isset($access) && $access->status == 'Y' )
                          {
                            echo "checked";
                          }
                        } ?> >
                <span></span> Active </label>
                <label class="css-input css-radio css-radio-primary">
                <input type="radio" name="status" value="N" <?php 
                if(set_radio('status','N'))
                        {
                          echo set_radio('status','N');
                        }
                        else
                        {
                          if(isset($access) && $access->status == 'N' )
                          {
                            echo "checked";
                          }
                        } ?> >
                <span></span> Inactive </label>
              	<div><?php echo form_error('status'); ?></div>
              </div>
            </div>
            <hr class="hidden-print" style="border-top: 4px solid #eee;">
			   <div class="form-group">
              <label class="col-xs-12" for="meta_title">Meta Title</label>
              <div class="col-sm-12">
                <input class="form-control" type="text" id="meta_title" name="meta_title" value="<?php 
                if(set_value('meta_title'))
                        {
                          echo set_value('meta_title');
                        }
                        else
                        {
                          if(isset($access) && $access->meta_title)
                          {
                            echo $access->meta_title;
                          }
                        } ?>" />
              </div>
              <div style="padding-left: 18px;"><?php echo form_error('meta_title'); ?></div>
            </div>

            <div class="form-group">
              <label class="col-xs-12" for="meta_description">Meta Description</label>
              <div class="col-sm-12">
				 <textarea class="form-control" rows="6" id="meta_description"  name="meta_description"><?php 
                if(set_value('meta_description'))
                        {
                          echo set_value('meta_description');
                        }
                        else
                        {
                          if(isset($access) && $access->meta_description)
                          {
                            echo $access->meta_description;
                          }
                        } ?></textarea>
				</div>
				<div style="padding-left: 18px;"><?php echo form_error('meta_description'); ?></div>
            </div>
            <div class="form-group">
              <label class="col-xs-12" for="meta_keywords">Meta Keywords</label>
              <div class="col-sm-12">
				 <textarea class="form-control" rows="6" id="meta_keywords"  name="meta_keywords"><?php 
                if(set_value('meta_keywords'))
                        {
                          echo set_value('meta_keywords');
                        }
                        else
                        {
                          if(isset($access) && $access->meta_keywords)
                          {
                            echo $access->meta_keywords;
                          }
                        } ?></textarea>
				</div>
				<div style="padding-left: 18px;"><?php echo form_error('meta_keywords'); ?></div>
            </div>
		
            <div class="form-group">
              <div class="col-xs-12">
                <button class="btn btn-sm btn-primary" type="submit" name='submit' value="submit"><?php
                if($mode == 'ADD')
                {
                ?>ADD ACCESS
                <?php
                }
                else
                {
                ?>
                EDIT ACCESS
              <?php } ?>
              </button>
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
                
                'model_id': {
                    required: true
                },
                        
                'a_type': {
                    required: true
                },
              
                'a_name': {
                    required: true
                },
                'a_price':{
                    required: true
                },

                <?php if(isset($id) && $id==''){ ?>
                'a_picture': {
                    required: true
                },
                <?php } ?>
                
                'a_description': {
                    required: true
                }
            },
            messages: {
                
                'brand_id': 'Please Select Brand',
                'model_id': 'Please Select Model',
                'a_type': 'Please Select Accessories Type',
                'a_price': 'Please Enter Accessories Price',
               
               'a_name': 'Please Enter Name',
                
                <?php if(isset($id) && $id==''){?>
                'a_picture': 'Please Select Picture',
                 <?php } ?>
                
                'a_description': 'Please Enter Details'
               
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
jQuery(function(){ BaseFormValidation.init(); });
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

// $( document ).ready(function() {
  
//   <?php// if(isset($id) && $id==''){?>
// 	update_model_options();
// 	<?php// } ?>
	
//   $("#brand_id").on('change',function(){
// 		update_model_options();
// 	});
	
//   $("#a_type").on('change',function(){
// 		update_model_options();
// 	});

// });

function modelTYP(type){

  var type = $('#a_type').val();
  // console.log(type);
  var brand = $('#brand_id').val();
  jQuery.ajax({
      url: "<?= base_url('admin-ajax'); ?>",
      type: "POST",
      data: {
        flag: "modeltype",
        model_type: type,
        select_brand: brand
      },
      dataType: 'json',
      success:function(response){
          // console.log(response);
          var len = response.length;
          $("#model_id").empty();
          for( var i = 0; i<len; i++){
              var id = response[i]['id'];
              var name = response[i]['name'];
              
              $("#model_id").append("<option value='"+id+"'>"+name+"</option>");
          }
      }
  });
}

// function update_model_options(){

// 	var brand_id = $("#brand_id").val();
//     var model_type = $("#a_type").val();
//      $('#model_id').val(null).trigger("change");
//     jQuery.ajax({
// 				url: "<?= base_url('admin-ajax'); ?>",
// 				type : "POST",
// 				data: {
// 					flag: "select_on_load",
// 					brand_id : brand_id,
// 					model_type : model_type
// 				},
// 				success:function(data){
// 					$('#model_id').html(data); 
// 					$('#model_id').select2('refresh'); 
// 				}
// 			});
// }
	
function delImg(img_id)
{	
		 jQuery.ajax({
				url: "<?php echo base_url('admin-ajax'); ?>",
				type : "POST",
				data: {
					flag: "delete_access_image",
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