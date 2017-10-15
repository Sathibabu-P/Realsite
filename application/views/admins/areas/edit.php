
  <div class="content">
    <div class="col-sm-6 col-sm-offset-2">
      <h2 class="page-header center"><?=$title;?></h2>
      <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
      <div class="box">
         <?php echo form_open('admins/areas/edit');?>
          <div class="form-group">
           <select name="city_id">
            <?php foreach($cities as $city) : ?>
                <option value="<?=$city['id']?>" <?=($city['id'] == $area['city_id'])? "selected": ""?>><?=$city['name']?></option>     
            <?php endforeach; ?>
          </select>
          </div> 
          <div class="form-group">
            <input type="name" class="form-control" value="<?=$area['name']?>" name="name">
          </div>   
          <input type="hidden"  value="<?=base64_encode($area['id']);?>" name="id">     
          <button type="submit" class="btn">Submit</button>
          <a href="<?php echo base_url(); ?>admins/areas" class="btn">Back</a>
         <?php echo form_close();?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col-* -->
  </div>
  <!-- /.content -->
