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

      <h1 class="page-heading">Models</h1>

    </div>

    <div class="col-sm-4 text-right hidden-xs">

      <ol class="breadcrumb push-10-t">

        <li><a class="link-effect" href="<?php echo base_url('add-model');?>">Add Model</a></li>

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

              <th  width="5%" class="text-center">No.</th>

              <th  width="10%">Model</th>

              <th  width="10%">Brand</th>

              <th class="hidden-xs" >Picture</th>

              

			  <th class="hidden-xs" width="10%">Display Order&nbsp;<br><a href="javascript:void(0);" onClick="javascript:saveorder('models')" title="Save Order">Save</a></th>

              <th width="5%">Action</th>

              <th width="5%" class="hidden-xs">status</th>

            </tr>

          </thead>

          <tbody>

            <?php $no = 0; foreach ($record as $data ) { $no++ ?>
              
            <tr>

              <td class="text-center"><?php echo $no; ?></td>

              <td class="font-w600"><?php echo $data->model_name; ?></td>

              <td class="font-w600"><?php echo $this->Paramodel->get_one('brand','brand_name',array('id' => $data->brand_id ));  ?></td>

              <td class="font-w600 hidden-xs"><img src="<?php echo $data->model_display_image;?>"/ class="img-responsive" style="width:30%"></td>

              

			  <td class="hidden-xs"><input type="text" size="5"  id="setord_<?php echo $data->id;?>" name="setord_<?php echo $data->id;?>" onKeyPress="return numOnly(job_details)" value="<?php echo $data->setord; ?>" class="form-control" style="text-align:center; width:75%;" /></td>

              <td class="text-center "><div class="btn-group"> <a href="<?php echo base_url('models-edit'); ?>/models/<?php echo $data->id; ?>">

                  <button data-original-title="Edit Model" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-pencil"></i></button>

                  </a>

				    <a href="<?php echo base_url('delete-record') ?>/models/<?php echo $data->id; ?>" onclick="javascript:if(confirm('Esta seguro que desea borrar?'))return true; else return false;" >

				   <button data-original-title="Delete Model" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button></a>

                </div></td>

              <td class="text-center hidden-xs">
                <?php if($data->status == 'Y'){ ?>
                <i class="fa fa-check text-info"></i>
                  <?php } else { ?>
                <i class="fa fa-close  text-danger"></i>
                  <?php } ?>
              </td>
              <?php } ?>
            </tr>

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
