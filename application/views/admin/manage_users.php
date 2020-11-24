<?php require 'inc/config.php'; ?>

<?php require 'inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css">

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick.min.css">

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick-theme.min.css">

<?php require 'inc/views/template_head_end.php'; ?>

<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->

<div class="content bg-gray-lighter">

  <div class="row items-push">

    <div class="col-sm-8">

      <h1 class="page-heading">Users </h1>

    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li><a class="link-effect" href="<?php echo base_url('add-user'); ?>">Add Usrs</a></li>

      </ol>

    </div>

  </div>

</div>

<!-- END Page Header -->

<!-- END Stats -->

<?php if($this->session->userdata('suc')) {?>

        <div class="alert alert-success">

          <strong>Success!</strong> <?php 
          echo $this->session->userdata('suc'); 
          $this->session->unset_userdata('suc');
          ?>

        </div>

<div class="row"></div>
<?php } ?>

<!-- Page Content -->

<div class="content">

  <!-- Full Table -->

  <div class="block">

    

    <div class="block-content">

   

        <table class="table table-bordered table-striped js-dataTable-full">

          <thead>

            <tr>

              <th class="text-center">NO.</th>

              <th >Name</th>

              <th class="hidden-xs">Email</th>

			 

              <th class="hidden-xs">Date</th>

              <th >Action</th>

              <th class="hidden-xs" style="width:5%;">Status</th>

            </tr>

          </thead>

          <tbody>

            <?php 
            $no = 0;
            foreach ( $record as $data ) 
            {
              $no++
            ?>

            <tr>

              <td class="text-center"><?php echo $no; ?></td>

              <td class="font-w600"><?php echo $data->u_name; ?></td>

              <td class="font-w600 hidden-xs"><?php echo $data->u_email; ?></td>

			 

              <td class="font-w600 hidden-xs"><?php echo date("d-m-Y",strtotime($data->u_create_date)); ?></td>

              <td class="text-center "><div class="btn-group"> <a href="<?php echo base_url('edit-userdetail'); ?>/user_details/<?php echo $data->id; ?>">

                  <button data-original-title="Edit User" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-pencil"></i></button>

                  </a>

				   <a href="<?php base_url('delete'); ?>/user_details/<?php echo $data->id; ?>" onclick="javascript:if(confirm('Esta seguro que desea borrar?'))return true; else return false;" >

                  <button data-original-title="Delete User" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button></a>

				   

                </div></td>

              <td class="text-center hidden-xs">

                <?php if($data->status == 'Y'){ ?>

                <p><i class="fa fa-check text-info"></i></p>

                <?php }else{ ?>

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

<script src="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Page JS Code -->

<script src="<?php echo $one->assets_folder; ?>/js/pages/base_tables_datatables.js"></script>

<!-- Page Plugins -->

<script src="<?php echo $one->assets_folder; ?>/js/plugins/slick/slick.min.js"></script>

<!-- Page JS Code -->

<script>

    $(function(){

        // Init page helpers (Slick Slider plugin)

        App.initHelpers('slick');

    });

</script>

<?php require 'inc/views/template_footer_end.php'; ?>

