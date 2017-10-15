<div class="row">

  <div class="sidebar col-sm-4 col-md-3">
     <?php    $this->load->view('users/navigation');     ?>
  </div>


  <div class="content col-sm-8 col-md-9">
   <h1 class="page-header"><?=$title?></h1>
    <div class="box">     
      <div class="row property-simple-wrapper">
          <div class="agent-card">
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <a href="#" class="agent-card-image">
              <img src="<?php echo base_url(); ?>uploads/users/<?=$user['profile_image']?>" alt=""  class="img-circle"  width="304" height="236">
              </a><!-- /.agent-card-image -->
            </div>
            <div class="col-sm-12 col-md-6">
            <!--   <h2>Information</h2> -->
             
                <div class="agent-card-info">
                <ul>
                  <li><?=$user['first_name']?> <?=$user['last_name']?></li>
                  <li><?=$user['address']?></li>                 
                </ul>
                <br>
                <ul>
                  <li><i class="fa fa-phone"></i><?=$user['phone_no']?></li>
                  <li><i class="fa fa-at"></i> <a href="#"><?=$user['email']?></a></li>
                  
                </ul>
                 <br>
                <a type="submit" class="btn" href="<?php echo site_url(); ?>users/profile">Update Profile</a>
                <a type="submit" class="btn" href="<?php echo site_url(); ?>users/changepassword">Change Password</a>
              </div>
              <!-- /.agent-card-info -->
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <!-- /.box -->
   
    <!-- /.center -->
  </div>
  <!-- /.content -->
  
  <!-- /.sidebar -->
</div>