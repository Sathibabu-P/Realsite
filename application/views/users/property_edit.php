<div class="row">

  <div class="sidebar col-sm-4 col-md-2">
     <?php    $this->load->view('users/navigation');     ?>
  </div>


  <div class="content col-sm-8 col-md-10">
    <h1 class="page-header"><?=$title?></h1>
    <div class="box" style="padding: 25px;">     
      <div class="row property-simple-wrapper">
         
        <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
         <?php echo form_open_multipart('users/property/edit');?>
         <input type="hidden" name="property" value="<?=base64_encode($property['id'])?>">
      <div class="box">       
        
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Title" name="title" value="<?=$property['title']?>">
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <textarea class="form-control" placeholder="Property Description" name="description"><?=$property['description']?></textarea>
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
                    <option value="<?=$city['id']?>" <?=($city['id'] == $property['city_id'])? "selected": ""?>><?=$city['name'];?></option>     
                <?php endforeach; ?>
              </select>
            </div>


             <div class="form-group">
               <select name="area_id">
                 <option value="<?=$property['area_id']?>"><?=$property['area_name']?></option>              
              </select>
            </div>


            <div class="form-group">
               <select name="property_type_id">
                 <option>Property Type</option>
                <?php foreach($property_types as $property_type) : ?>
                    <option value="<?=$property_type['id']?>" <?=($property_type['id'] == $property['property_type_id'])? "selected": ""?>><?=$property_type['name'];?></option>     
                <?php endforeach; ?>
              </select>
            </div>
           
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input class="form-control" type="text" placeholder="Monthly Rent" name="monthly_rent" value="<?=$property['monthly_rent']?>">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col-* -->
          <div class="col-sm-6">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input class="form-control" type="text" placeholder="Fixed Deposit" name="fixed_deposit" value="<?=$property['fixed_deposit']?>">
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tint"></i></span>
              <select name="minimum_stay">
                <option value="">Minimum Stay</option>
                <option value="1" <?=($property['minimum_stay'] == '1')? "selected": ""?>> 1 Month</option>
                <option value="2" <?=($property['minimum_stay'] == '2')? "selected": ""?>> 2 Months</option>
                <option value="3" <?=($property['minimum_stay'] == '3')? "selected": ""?>> 3 Months</option>
                <option value="4" <?=($property['minimum_stay'] == '4')? "selected": ""?>> 4 Months</option>
                <option value="5" <?=($property['minimum_stay'] == '5')? "selected": ""?>> 5 Months</option>
                <option value="6" <?=($property['minimum_stay'] == '6')? "selected": ""?>> 6 Months</option>
                <option value="above 6" <?=($property['minimum_stay'] == 'above 6')? "selected": ""?>> above 6 Months</option>
              </select>            
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
               <select name="total_rooms">
                <option value="">Total Rooms</option>
                <option value="1" <?=($property['total_rooms'] == '1')? "selected": ""?>> 1 Room</option>
                <option value="2" <?=($property['total_rooms'] == '2')? "selected": ""?>> 2 Rooms</option>
                <option value="3" <?=($property['total_rooms'] == '3')? "selected": ""?>> 3 Rooms</option>
                <option value="4" <?=($property['total_rooms'] == '4')? "selected": ""?>> 4 Rooms</option>
                <option value="5" <?=($property['total_rooms'] == '5')? "selected": ""?>> 5 Rooms</option>               
                <option value="above 5" <?=($property['total_rooms'] == 'above 5')? "selected": ""?>> above 5 Rooms</option>
              </select>             
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
               <select name="current_roommates">
                <option value="">Current Roommates</option>
                <option value="0" <?=($property['current_roommates'] == '0')? "selected": ""?>> 0 Roommates</option>
                <option value="1" <?=($property['current_roommates'] == '1')? "selected": ""?>> 1 Roommate</option>
                <option value="2" <?=($property['current_roommates'] == '2')? "selected": ""?>> 2 Roommates</option>
                <option value="3" <?=($property['current_roommates'] == '3')? "selected": ""?>> 3 Roommates</option>
                <option value="4" <?=($property['current_roommates'] == '4')? "selected": ""?>> 4 Roommates</option>
                <option value="5" <?=($property['current_roommates'] == '5')? "selected": ""?>> 5 Roommates</option>               
                <option value="above 5" <?=($property['current_roommates'] == 'above 5')? "selected": ""?>> above 5 Roommates</option>
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
            <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
            <div id="map-canvas"></div>
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input class="form-control" type="text" placeholder="Latitude" id="input-latitude" name="latitude" value="<?=$property['latitude']?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-* -->
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input class="form-control" type="text" placeholder="Lontgitude" id="input-longitude" name="longitude" value="<?=$property['longitude']?>">
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
                  <input class="form-control" type="text" placeholder="Land Mark"  name="landmark" value="<?=$property['landmark']?>">
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
            <ul>
              <?php  foreach($property_images as $property_image ) :?>

                <li  style="display: inline;">
                  <div class="img-thumbnail"> <img  width="150" height="125" src="<?php echo base_url();?>uploads/properties/<?=$property_image['file_name']?>"> 
                    <a href="<?php echo site_url();?>users/property/<?=base64_encode($property['id'])?>/delimg/<?=$property_image['id']?>">
                      <strong style="font-size: 20px">X</strong>
                    </a>           
                  </div>                
                </li>
              <?php endforeach; ?>
            </ul>
           </div>
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
                <option value="Male" <?=($property['preferred_gender'] == 'Male')? "selected": ""?>> Male</option>
                <option value="Female" <?=($property['preferred_gender'] == 'Female')? "selected": ""?>> Female</option>
                <option value="Any one" <?=($property['preferred_gender'] == 'Any one')? "selected": ""?>> Any one</option>
              </select>
            </div>


             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <input class="form-control" type="text" placeholder="Preferred Age From" name="preferred_age_from" value="<?=$property['preferred_age_from']?>">
            </div>

           
           
          </div>
          <!-- /.col-* -->
          <div class="col-sm-6">
           
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <select name="preferred_occupation">
                <option>Preferred Occupation</option>
                <option value="Students" <?=($property['preferred_occupation'] == 'Students')? "selected": ""?>> Students</option>
                <option value="Professional" <?=($property['preferred_occupation'] == 'Professional')? "selected": ""?>> Professional</option>
                <option value="Any one" <?=($property['preferred_occupation'] == 'Any one')? "selected": ""?>> Any one</option>            
              </select>            
            </div>
            <!-- /.form-group -->
          
            <!-- /.form-group -->
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <input class="form-control" type="text" placeholder="Preferred Age To" name="preferred_age_to" value="<?=$property['preferred_age_to']?>">
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
          <?php $amenities_array = explode(",", json_decode($property['amenities']));  ?>
           <?php foreach($amenities as $amenity) : ?>
                   
              <li><label><input type="checkbox" name="amenities[]" value="<?=$amenity['id']?>" <?php if(in_array($amenity['id'], $amenities_array)) echo  'checked';?>> <?=$amenity['name'];?></label></li>

            <?php endforeach; ?>

        </ul>
      </div>

       <h2 class="page-header">My Account</h2>
      <div class="property-amenities">
        <p><label><input type="checkbox" name="show_email" value="1" <?=($property['show_email'] == '1')? "checked": ""?>> Show My Email</label> </p>
        <p><label><input type="checkbox" name="show_phoneno" value="1"  <?=($property['show_phoneno'] == '1')? "checked": ""?>> Show My Phone No</label> </p>
      </div>
      <div class="center">
        <button class="btn btn-xl" type="submit">Submit</button>
        <a  class="btn btn-xl" href="<?php echo site_url(); ?>users/properties">Back</a>
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

