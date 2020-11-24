<?php require 'inc/config.php'; ?>

<?php require 'inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/datatables/jquery.dataTables.min.css">

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/slick/slick.min.css">

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>js/plugins/slick/slick-theme.min.css">

<?php require 'inc/views/template_head_end.php'; ?>

<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->

<div class="content bg-gray-lighter">

  <div class="row items-push">

    <div class="col-sm-8">

      <h1 class="page-heading">Subscribers </h1>

    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li>&nbsp;</li>

      </ol>

    </div>

  </div>

</div>

<!-- END Page Header -->

<!-- END Stats -->

<?php// if($Err != ""){ ?>

<!-- <div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">

    <div class="alert alert-info alert-dismissable">

        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>

        <p><?php //echo $Err; ?></p>

    </div>

</div> -->

<div class="row"></div>

<?php //} ?>

<!-- Page Content -->

<div class="content">

  <!-- Full Table -->

  <div class="block">

    

    <div class="block-content">

   

        <table class="table table-bordered table-striped js-dataTable-full">

          <thead>

            <tr>

              <th class="text-center">No.</th>

              <th class="hidden-xs">Email</th>

			 

              <th class="hidden-xs">Date</th>

              <th >Action</th>

            </tr>

          </thead>

          <tbody>

            
            <tr>

              <td class="text-center"></td>

              <td class="font-w600 hidden-xs"></td>

			 

              <td class="font-w600 hidden-xs"></td>

              <td class="text-center "><div class="btn-group"> <a href=""></a>

                 
				   <a href="" onclick="javascript:if(confirm('Are you sure to delete?'))return true; else return false;" >

                  <button data-original-title="Delete User" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button></a>

				   

                </div></td>

              

            </tr>


          </tbody>

        </table>

      

    </div>

  </div>

  <!-- END Full Table -->

  <!-- Partial Table -->

</div>

<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>

<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->

<script src="<?php echo $one->assets_folder; ?>js/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Page JS Code -->

<script src="<?php echo $one->assets_folder; ?>js/pages/base_subscribers_table.js"></script>

<!-- Page Plugins -->

<script src="<?php echo $one->assets_folder; ?>js/plugins/slick/slick.min.js"></script>

<!-- Page JS Code -->

<script>

    $(function(){

        // Init page helpers (Slick Slider plugin)

        App.initHelpers('slick');

    });

</script>

<?php require 'inc/views/template_footer_end.php'; ?>

