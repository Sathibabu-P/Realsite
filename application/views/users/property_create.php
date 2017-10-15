<div class="row">

  <div class="sidebar col-sm-4 col-md-2">
     <?php    $this->load->view('users/navigation');     ?>
  </div>


  <div class="content col-sm-8 col-md-10">
    <h1 class="page-header"><?=$title?></h1>
    <div class="box" style="padding: 25px;">     
      <div class="row property-simple-wrapper">
         
        <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
         <?php echo form_open_multipart('users/property/create');?>
   <div class="box">       
        
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Title" name="title" value="<?php echo set_value('title');?>">
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <textarea class="form-control" placeholder="Property Description" name="description"><?php echo set_value('description');?></textarea>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.box -->
      <h2 class="page-header">Attributes</h2>
      <div class="box">
        <div class="row">
          <div class="col-sm-6">

             <div class="form-group">
               <select name="city_id">
                 <option value="">Select City</option>
                <?php foreach($cities as $city) : ?>
                    <option value="<?=$city['id']?>" <?=($city['id'] == set_value('city_id'))? "selected": ""?>><?=$city['name'];?></option>     
                <?php endforeach; ?>
              </select>
            </div>


             <div class="form-group">
               <select name="area_id">
                 <option value="">Select Areas</option>              
              </select>
            </div>


            <div class="form-group">
               <select name="property_type_id">
                 <option>Property Type</option>
                <?php foreach($property_types as $property_type) : ?>
                    <option value="<?=$property_type['id']?>" <?=($property_type['id'] == set_value('property_type_id'))? "selected": ""?>><?=$property_type['name'];?></option>     
                <?php endforeach; ?>
              </select>
            </div>
           
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input class="form-control" type="text" placeholder="Monthly Rent" name="monthly_rent" value="<?php echo set_value('monthly_rent');?>">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col-* -->
          <div class="col-sm-6">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input class="form-control" type="text" placeholder="Fixed Deposit" name="fixed_deposit" value="<?php echo set_value('fixed_deposit');?>">
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tint"></i></span>
              <select name="minimum_stay">
                <option value="">Minimum Stay</option>
                <option value="1"> 1 Month</option>
                <option value="2"> 2 Months</option>
                <option value="3"> 3 Months</option>
                <option value="4"> 4 Months</option>
                <option value="5"> 5 Months</option>
                <option value="6"> 6 Months</option>
                <option value="above 6"> above 6 Months</option>
              </select>            
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
               <select name="total_rooms">
                <option value="">Total Rooms</option>
                <option value="1"> 1 Room</option>
                <option value="2"> 2 Rooms</option>
                <option value="3"> 3 Rooms</option>
                <option value="4"> 4 Rooms</option>
                <option value="5"> 5 Rooms</option>               
                <option value="above 5"> above 5 Rooms</option>
              </select>             
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
               <select name="current_roommates">
                <option value="">Current Roommates</option>
                <option value="0"> 0 Roommates</option>
                <option value="1"> 1 Roommate</option>
                <option value="2"> 2 Roommates</option>
                <option value="3"> 3 Roommates</option>
                <option value="4"> 4 Roommates</option>
                <option value="5"> 5 Roommates</option>               
                <option value="above 5"> above 5 Roommates</option>
              </select> 
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col-* -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box -->
      <div class="row">
        <div class="col-sm-12">
          <h2 class="page-header">Map Position</h2>
          <div class="box">
            <input id="pac-input" class="controls" type="text" placeholder="Enter a location" >
            <div id="map-canvas"></div>
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input class="form-control" type="text" placeholder="Latitude" id="input-latitude" name="latitude" value="<?php echo set_value('latitude');?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-* -->
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input class="form-control" type="text" placeholder="Lontgitude" id="input-longitude" name="longitude" value="<?php echo set_value('longitude');?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-* -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input class="form-control" type="text" placeholder="Land Mark"  name="landmark" value="<?php echo set_value('landmark');?>">
                </div>
                <!-- /.form-group -->
              </div>

            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-sm-12">
          <h2 class="page-header">Gallery</h2>
          <div class="box">
              <input type="file" class="file" data-preview-file-type="text"  name="userFiles[]" multiple id="input-file" />
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

       <h2 class="page-header">Ideal Roomamte</h2>
      <div class="box">
        <div class="row">
          <div class="col-sm-6">

             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-venus-double"></i></span>
               <select name="preferred_gender">               
                <option>Preferred Gender</option>
                <option value="Male"> Male</option>
                <option value="Female"> Female</option>
                <option value="Any one"> Any one</option>
              </select>
            </div>


             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <input class="form-control" type="text" placeholder="Preferred Age From" name="preferred_age_from" value="<?php echo set_value('preferred_age_from');?>">
            </div>

           
           
          </div>
          <!-- /.col-* -->
          <div class="col-sm-6">
           
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <select name="preferred_occupation">
                <option>Preferred Occupation</option>
                <option value="Students"> Students</option>
                <option value="Professional"> Professional</option>
                <option value="Any one"> Any one</option>            
              </select>            
            </div>
            <!-- /.form-group -->
          
            <!-- /.form-group -->
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <input class="form-control" type="text" placeholder="Preferred Age To" name="preferred_age_to" value="<?php echo set_value('preferred_age_to');?>">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col-* -->
        </div>
        <!-- /.row -->
      </div>



      <h2 class="page-header">Amenities</h2>
      <div class="property-amenities">
        <ul>

           <?php foreach($amenities as $amenity) : ?>
                   
              <li><label><input type="checkbox" name="amenities[]" value="<?=$amenity['id']?>"> <?=$amenity['name'];?></label></li>

            <?php endforeach; ?>

        </ul>
      </div>

       <h2 class="page-header">My Account</h2>
      <div class="property-amenities">
        <p><label><input type="checkbox" name="show_email" value="1"> Show My Email</label> </p>
        <p><label><input type="checkbox" name="show_phoneno" value="1"> Show My Phone No</label> </p>
      </div>
      <div class="center">
        <button class="btn btn-xl" type="submit">Submit Property<small>I agree with Terms &amp; Conditions</small></button>
      </div>
      <!-- /.center -->
    </div>
    <!-- /.content -->
  <?php echo form_close();?>
      </div>
    </div>
    <!-- /.box -->
   
    <!-- /.center -->

  <!-- /.content -->
  
  <!-- /.sidebar -->
</div>

