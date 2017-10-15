<div class="row">

  <div class="sidebar col-sm-4 col-md-3">
  <?php    $this->load->view('users/navigation');     ?>
  </div>


  <div class="content col-sm-8 col-md-9">
    <h1 class="page-header"><?=$title?></h1>
    <div class="box">     
      <div class="row property-simple-wrapper">
        <div class="box">
          <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
          <?php  echo form_open('users/changepassword');?>
            <div class="form-group">            
              <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" >
            </div>
            <div class="form-group">            
              <input type="password" class="form-control" placeholder="New Password" name="newpassword" >
            </div>
            <div class="form-group">            
              <input type="password" class="form-control" placeholder="New Confirm Password" name="confirmpassword" >
            </div>
            <button type="submit" class="btn">Update</button>
            <a  class="btn" href="<?php echo site_url(); ?>users/dashboard">Back</a>
          <?php echo form_close();?>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.box -->
    <!-- /.center -->
  </div>
  <!-- /.content -->

<!-- /.sidebar -->
</div>