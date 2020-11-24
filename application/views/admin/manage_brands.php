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

      <h1 class="page-heading">Brands</h1>

    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li><a class="link-effect" href="<?php echo base_url('add-brand'); ?>">Add Brand</a></li>

      </ol>

    </div>

  </div>

</div>

<!-- END Page Header -->

<!-- END Stats -->

<?php if($this->session->flashdata('update')){ ?>

<div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">

    <div class="alert alert-primary" role="alert">

      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>

      <p style="color: green"><?php echo $this->session->flashdata('update'); ?></p>

    </div>

</div>

<?php } ?>
<?php if($this->session->flashdata('insert')){ ?>

<div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">

    <div class="alert alert-primary" role="alert">

      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>

      <p style="color: green"><?php echo $this->session->flashdata('insert'); ?></p>

    </div>

</div>

<?php } ?>
<?php if($this->session->flashdata('delete')){ ?>

<div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">

    <div class="alert alert-primary" role="alert">

      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>

      <p style="color: red"><?php echo $this->session->flashdata('delete'); ?></p>

    </div>

</div>

<?php } ?>


<div class="row"></div>
<!-- Page Content -->

<div class="content">

  <!-- Full Table -->

  <div class="block">

    

    <div class="block-content">

   

        <table class="table table-bordered table-striped js-dataTable-full">

          <thead>

            <tr>

              <th class="text-center" width="10%">No.</th>

              <th >Brand Image</th>

              <th >Brand Name</th>

		          <th width="10%">Action</th>

			        <th  width="10%">Status</th>

            </tr>

          </thead>

          <tbody>

            <?php 
              $no = 0;

              foreach($record as $row)
              {
                $no++;
              ?>
          <tr>

                <td class="text-center"><?php echo $no; ?></td>
                <td class=""><img src="<?php echo base_url('').$row->brand_image; ?>" style="width:100px" /></td>
                <td class=""><?php echo $row->brand_name; ?></td>
                <td class="text-center ">
                  <div class="btn-group"> 
                      <a href="<?php echo base_url('edit'); ?>/brand/<?php echo $row->id; ?>">
                        <button data-original-title="Edit Brand" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-pencil"></i></button>
                      </a>
                      <a href="<?php echo base_url('delete-record'); ?>/brand/<?php echo $row->id; ?>" onclick="javascript:if(confirm('Are you sure to delete this brand?'))return true; else return false;" >
                        <button data-original-title="Delete Brand" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>
                      </a>
                  </div>

				    </td>
        <?php // die(); ?>
			  <td class="text-center hidden-xs">

			  <?php if( $row->status == 1 ) { ?>

                <p><i class="fa fa-check text-info"></i></p>

                <?php }else{?>

                <p><i class="fa fa-close  text-danger"></i></p>

                <?php } ?>

              </td>

              

            </tr>

            <?php } ?>

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

<!-- <script src="<?php// echo $one->assets_folder; ?>js/pages/slider_datatables.js"></script> -->

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

