<?php require 'inc/config.php'; ?>

<?php require 'inc/views/template_head_start.php'; ?>

<?php require 'inc/views/template_head_end.php'; ?>

<?php require 'inc/views/base_head.php'; ?>



<!-- Page Header -->

<div class="content bg-gray-lighter">

    <div class="row items-push">

        <div class="col-sm-8">

            <h1 class="page-heading">

               Settings

            </h1>

        </div>

        <div class="col-sm-4 text-right hidden-xs">

            <ol class="breadcrumb push-10-t">

                <li><a class="link-effect" href="<?php echo base_url('dashboard'); ?>">Home</a></li>

                <li>Settings</li>

            </ol>

        </div>

    </div>

</div>

<!-- END Page Header -->



<!-- Page Content -->

<div class="content content-narrow">

    

    <div class="row">

        <?php if(!empty($Err)){ ?>
            <div class="alert alert-danger">
              <strong>Oops!</strong> <?php echo $Err; ?>
            </div>
        <?php } ?>

        <?php if(!empty($Msg)){ ?>
            <div class="alert alert-success">
              <strong>Oops!</strong> <?php echo $Msg; ?>
            </div>
        <?php } ?>

        <div class="col-md-12">

            <!-- Normal Form -->

            <div class="block">

                <div class="block-header">

                    <ul class="block-options">

                        <li>

                            <button type="button">

                        </li>

                    </ul>

                    <h3 class="block-title">Change Password</h3>

                </div>

                <div class="block-content block-content-narrow">

                     <form class="js-validation-bootstrap form-horizontal" action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label for="old_password">Old Passowrd</label>

                            <div class="col-sm-12">

                          <input class="form-control" type="password" id="old_password" name="old_password" >

                            </div>

                        </div>

                         <div class="form-group">

                            <label for="new_password">New Password</label>

                            <div class="col-sm-12">

                          <input class="form-control" type="password" id="new_password" name="new_password">

                            </div>

                        </div>

                         <div class="form-group">

                            <label for="re_password">Confirm New Password</label>

                            <div class="col-sm-12">

                          <input class="form-control" type="password" id="re_password" name="re_password">

                            </div>

                        </div>

                                   

                        

                        <div class="form-group">

                            <button class="btn btn-sm btn-primary" type="submit" name='update' value='update' >Submit</button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- END Normal Form -->



        </div>

   

</div>

<!-- END Page Content -->



<?php require 'inc/views/base_footer.php'; ?>

<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->

<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>



<!-- Page JS Code -->

<script src="<?php echo $one->assets_folder; ?>/js/pages/settings.js"></script>

<?php require 'inc/views/template_footer_end.php'; ?>