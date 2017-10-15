
<div class="content">
    <div class="col-sm-6 col-sm-offset-2">
      <h2 class="page-header center"><?=$title;?></h2>
      <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
      <div class="box">
         <?php echo form_open('admins/amenities/create');?>
          <div class="form-group">
            <input type="name" class="form-control" placeholder="Amenity Name"  name="name" value="<?php echo set_value('name')?>">
          </div> 
          <button type="submit" class="btn">Create</button>
          <a href="<?php echo base_url(); ?>admins/amenities" class="btn">Back</a>
         <?php echo form_close();?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col-* -->
  </div>
  <!-- /.content -->
