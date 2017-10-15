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
        
          <?php  echo  form_open_multipart('users/profile');?>

           <div class="form-group">            
            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?=$user['first_name']?>">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?=$user['last_name']?>">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?=$user['email']?>">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone Number" name="phone_no" value="<?=$user['phone_no']?>">
          </div>
          <div class="form-group">
           <select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" <?=($user['gender'] == 'Male')? "selected": ""?>>Male</option>
            <option value="Female" <?=($user['gender'] == 'Female')? "selected": ""?>>Female</option>
           </select>
           </div>  
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Date of birth" name="dob" value="<?=$user['dob']?>">
          </div>
           <div class="form-group">
           <select name="occupation">
            <option value="">Select Occupation</option>
            <option value="Working" <?=($user['occupation'] == 'Working')? "selected": ""?> >Working</option>
            <option value="Student" <?=($user['occupation'] == 'Student')? "selected": ""?>>Student</option>
             <option value="Others" <?=($user['occupation'] == 'Others')? "selected": ""?>>Others</option>
           </select>
           </div> 
            <div class="form-group">
              <label>Profile Image</label>
              <input type="file" class="file" data-preview-file-type="text"  name="userfile"  id="input-file" />
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" placeholder="Address"><?=$user['address']?></textarea>            
          </div>       
          <!-- /.form-group -->
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