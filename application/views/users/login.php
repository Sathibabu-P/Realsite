
  <div class="content">
    <div class="col-sm-4 col-sm-offset-4">
      <h2 class="page-header center"><?=$title;?></h2>
      <div class="box">
        <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
        
         <?php  echo form_open('users/login');?>
       
          <div class="form-group">
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo set_value('email')?>">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <!-- /.form-group -->
          <button type="submit" class="btn">Login</button>
          <a href="<?php echo $google; ?>">Google</a>
          <a href="<?php echo $facebook; ?>">Facebook</a>
        <?php  echo form_close();?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col-* -->
  </div>
  <!-- /.content -->

<div class="content col-sm-8 col-md-9 col-sm-offset-2">
    <article id="page-151" class="post-151 page type-page status-publish hentry">
      <h1 class="page-header">Please login or register</h1>
      <div class="progressbar">
        <div class="progressbar-inner">
          <div class="progressbar-item">
            <div class="progressbar-item-value">
              <div class="progressbar-item-circle">
                <span><i class="fa fa-sign-in"></i></span>
              </div>
              <!-- /.progressbar-item-circle -->
              <div class="progressbar-item-description">
                <h4>Sign in or register</h4>
                <p>
                  Create new account or use already existing credentials to access submission.                                        
                </p>
              </div>
              <!-- /.progress-item-description -->                                    
            </div>
            <!-- /.progress-item-value -->
            <div class="progressbar-line"></div>
          </div>
          <!-- /.progress-item -->
          <div class="progressbar-item">
            <div class="progressbar-item-value">
              <div class="progressbar-item-circle">
                <span><i class="fa fa-upload"></i></span>
              </div>
              <!-- /.progressbar-item-circle -->
              <div class="progressbar-item-description">
                <h4>Submit property</h4>
                <p>
                  Upload new property with galleries, attributes and all mandatory data.                                        
                </p>
              </div>
              <!-- /.progress-item-description -->                                    
            </div>
            <!-- /.progress-item-value -->
            <div class="progressbar-line"></div>
          </div>
          <!-- /.progress-item -->                            
          <div class="progressbar-item">
            <div class="progressbar-item-value">
              <div class="progressbar-item-circle">
                <span><i class="fa fa-check"></i></span>
              </div>
              <!-- /.progressbar-item-circle -->
              <div class="progressbar-item-description">
                <h4>Get approved</h4>
                <p>
                  Once it will be reviewed, your property will be published at the front&nbsp;end by admin.                                        
                </p>
              </div>
              <!-- /.progress-item-description -->                                    
            </div>
            <!-- /.progress-item-value -->
          </div>
          <!-- /.progress-item -->                                                        
        </div>
        <!-- /.progress-inner -->
      </div>
      <!-- /.progress -->

    </article>
</div>
<style type="text/css">

  .progressbar {
  display: table;
  margin: 0 0 50px 0;
  width: 100%; }

  .progressbar-inner {
    display: table-row; }

  .progressbar-item {
    display: table-cell;
    position: relative;
    width: 33.33%; }

  .progressbar-item-value p {
    color: #616161; }

  .progressbar-item-description {
    padding: 0 15px;
    text-align: center; }

  .progressbar-item-circle {
    background-color: #EEEEEE;
    border: 2px solid #E0E0E0;
    border-radius: 50%;
    height: 88px;
    line-height: 84px;
    margin: 0 auto 30px auto;
    text-align: center;
    width: 88px;
    z-index: 9999; }
    .progressbar-item-circle span {
      color: #03A9F4;
      font-size: 20px; }

  .progressbar-line {
    background-color: #E0E0E0;
    height: 2px;
    position: absolute;
    right: 0;
    top: 42px;
    transform: translateX(50%);
    -webkit-transform: translateX(50%);
    width: 33.33%; }
</style>