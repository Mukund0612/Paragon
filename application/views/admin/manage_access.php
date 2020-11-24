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

      <h1 class="page-heading">Accessories</h1>
      <?php if($this->session->userdata('msg_del')) {?>

        <div class="alert alert-success">

          <strong>Success!</strong> <?php 
          echo $this->session->userdata('msg_del'); 
          $this->session->unset_userdata('msg_del');
          ?>

        </div>

        <?php } ?>
    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li><a class="link-effect" href="<?php echo base_url('add-access'); ?>">Add Accessories</a></li>

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

<!-- Page Content -->

<div class="content">

  <!-- Full Table -->

  <div class="block">

    

    <div class="block-content">

     <form id="manage" name="manage"  method="post">

        <table class="table table-bordered table-striped js-dataTable-full">

          <thead>

            <tr>

              <th  width="5%" class="text-center"></th>

              <th  width="10%">Accessories</th>

              <th  width="10%">Brand</th>

              <th  width="10%">Model / Type</th>

              <th class="hidden-xs" >Picture</th>

              

			  <th class="hidden-xs" width="10%">Display Order&nbsp;<br><a href="javascript:void(0);" onClick="javascript:saveorder('access')" title="Save Order">Save</a></th>

              <th width="5%">Action</th>

              <th width="5%" class="hidden-xs">status</th>

            </tr>

          </thead>

          <tbody>
            <?php
              foreach ($access_record as $access ) 
              {

            ?>
            <tr>

              <td class="text-center"><?php echo $access->setord; ?></td>

              <td class="font-w600"><?php echo $access->a_name; ?></td>

              <td class="hidden-xs"><?php 
                $wh_brand['id']=$access->brand_id;
                echo $this->Paramodel->get_one('brand','brand_name',$wh_brand);
              ?></td>
               <td class="text-center"><?php
               $wh_model['id'] = $access->m_id;
               echo $this->Paramodel->get_one('models','model_name',$wh_model);
               ?> / <?php
               if( $access->a_type == 1 )
               {
                echo "Scooter";
               }
               else
               {
                echo "Bike";
               }
               ?> </td>

              <td class="font-w600 hidden-xs"><img src="<?php echo $access->a_picture; ?>"/ class="img-responsive" style="width:30%"></td>
			       <td class="hidden-xs"><input type="text" size="5"  id="setord_<?php echo $access->id;?>" name="setord_<?php  echo $access->id; ?>" onKeyPress="return numOnly(job_details)" value="<?php echo $access->setord; ?>" class="form-control" style="text-align:center; width:75%;" /></td>

              <td class="text-center "><div class="btn-group"> <a href="<?php echo base_url('edit-access'); ?>/access/<?php echo $access->id; ?>">

                  <button data-original-title="Edit Accessories" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-pencil"></i></button>

                  </a>

				    <a href="<?php echo base_url('delete-record'); ?>/access/<?php echo $access->id; ?>" onclick="javascript:if(confirm('Esta seguro que desea borrar?'))return true; else return false;" >

				   <button data-original-title="Delete Accessories" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button></a>

                </div></td>

              <td class="text-center hidden-xs">
                <?php if($access->status == 'Y'){ ?>
                <i class="fa fa-check text-info"></i>
                <?php  } else { ?>
                <i class="fa fa-close  text-danger"></i>
              <?php } ?>
              </td>

            </tr>

          <?php } ?>

          </tbody>

        </table>

      </form>

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

<script src="<?php echo $one->assets_folder; ?>js/pages/base_tables_datatables.js"></script>

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

