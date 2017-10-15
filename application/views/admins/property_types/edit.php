
  <div class="content">
    <div class="col-sm-6 col-sm-offset-2">
      <h2 class="page-header center"><?=$title;?></h2>
      <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
      <div class="box">
         <?php echo form_open('admins/property_types/edit');?>
          <div class="form-group">
            <input type="name" class="form-control" value="<?=$property_type['name']?>" name="name">
          </div>   
          <input type="hidden"  value="<?=base64_encode($property_type['id']);?>" name="id">     
          <button type="submit" class="btn">Submit</button>
          <a href="<?php echo base_url(); ?>admins/property_types" class="btn">Back</a>
         <?php echo form_close();?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col-* -->
  </div>
  <!-- /.content -->
