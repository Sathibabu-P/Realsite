
  <div class="content">
    <div class="col-sm-4 col-sm-offset-4">
      <h2 class="page-header center"><?=$title;?></h2>
       
      <div class="box">
         <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
        
         <?php  echo form_open('users/register');?>

           <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name')?>">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name')?>">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo set_value('email')?>">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Retype Password" name="cpassword">
          </div>
          <!-- /.form-group -->
          <button type="submit" class="btn">Register</button>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col-* -->
  </div>
  <!-- /.content -->
  
