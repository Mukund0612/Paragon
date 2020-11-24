<?php require 'inc/config.php'; ?>

<?php require 'inc/views/template_head_start.php'; ?>

<?php require 'inc/views/template_head_end.php'; ?>

<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->



<div class="content bg-gray-lighter">

  <div class="row items-push">

    <div class="col-sm-8">

      <h1 class="page-heading"><?php echo $mode;?> User</h1>

    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li><a class="link-effect" href="<?php echo base_url('dashboard'); ?>">Home</a></li>

        <li><a class="link-effect" href="<?php echo base_url('manage-users'); ?>">Users</a></li>

        <li>Add Users</li>

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
      <?php// echo validation_errors(); ?>

      <div class="block">

        <div class="block-content block-content-narrow">

          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <input  type="hidden" id="hid" name="hid" value="">

            <div class="form-group">

              <label class="col-xs-12" for="example-text-input">Name</label>

              <div class="col-sm-9">

                <input class="form-control" type="text" id="example-text-input" name="u_name" value="<?php 
                if(set_value('u_name'))
                {
                  echo set_value('u_name');
                }
                else if(isset($record))
                {
                  echo $record->u_name;
                }
                ?>">
                <?php echo form_error('u_name'); ?>

              </div>

            </div>

            

            <div class="form-group">

              <label class="col-xs-12" for="example-email-input">Email</label>

              <div class="col-sm-9">

                <input class="form-control" type="email" id="u_email" name="u_email" value="<?php 
                if(set_value('u_email'))
                {
                  echo set_value('u_email');
                }
                else if(isset($record))
                {
                  echo $record->u_email;
                }
                ?>">
                <?php echo form_error('u_email'); ?>

              </div>

            </div>

		

            <div class="form-group">

              <label class="col-xs-12" for="example-email-input">Password</label>

              <div class="col-sm-9">

                <input class="form-control" type="password" id="u_password" name="u_password" value="">
                <?php echo form_error('u_password'); ?>

              </div>

            </div>



			

            <div class="form-group">

              <label class="col-xs-12" for="example-email-input">Phone</label>

              <div class="col-sm-9">

                <input class="form-control" type="text" id="u_phone" name="u_phone"  value="<?php 
                if(set_value('u_phone'))
                {
                  echo set_value('u_phone');
                }
                else if(isset($record))
                {
                  echo $record->u_phone;
                }
                ?>">
                <?php echo form_error('u_phone'); ?>

              </div>

            </div>

            <div class="form-group">

              <label class="col-xs-12" for="u_address">Address</label>

              <div class="col-sm-9">

                <textarea class="form-control" rows="6" id="u_address" name="u_address" ><?php 
                if(set_value('u_address'))
                {
                  echo set_value('u_address');
                }
                else if(isset($record))
                {
                  echo $record->u_address;
                }
                ?></textarea>
                <?php echo form_error('u_address'); ?> 

              </div>

            </div>

			<div class="form-group">

              <label class="col-xs-12" for="example-email-input">City</label>

              <div class="col-sm-9">

                <input class="form-control" type="text" id="u_city" name="u_city"  value="<?php 
                if(set_value('u_city'))
                {
                  echo set_value('u_city');
                }
                else if(isset($record))
                {
                  echo $record->u_city;
                }
                ?>">
                <?php echo form_error('u_city'); ?>

              </div>

            </div>

			<div class="form-group">

              <label class="col-xs-12" for="example-email-input">State</label>

              <div class="col-sm-9">

                <input class="form-control" type="text" id="u_state" name="u_state"  value="<?php 
                if(set_value('u_state'))
                {
                  echo set_value('u_state');
                }
                else if(isset($record))
                {
                  echo $record->u_state;
                }
                ?>">
                <?php echo form_error('u_state'); ?>

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
                else if(isset($record) && $record->status == 'Y' )
                {
                  echo "checked";
                }
                ?> >

                <span></span> Active </label>

                <label class="css-input css-radio css-radio-primary">

                <input type="radio" name="status" value="N" <?php
                if(set_radio('status','N'))
                {
                  echo set_radio('status','N');
                }
                else if(isset($record) && $record->status == 'N' )
                {
                  echo "checked";
                }
                ?> >

                <span></span> Inactive </label>

              <?php echo form_error('status'); ?>
              </div>

            </div>

            <div class="form-group">

              <div class="col-xs-12">

                <button class="btn btn-sm btn-primary" type="submit" name='submit' value="submit"><?php
                if( $mode == 'ADD' )
                {
                ?>ADD USER
              <?php } else { ?>
                UPDATE USER
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

<?php require 'inc/views/template_footer_end.php'; ?>

