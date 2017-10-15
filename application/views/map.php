<div class="map-wrapper">

      <div id="map" class="map" data-transparent-marker-image="http://preview.byaviators.com/template/realsite/assets/img/transparent-marker-image.png">
      </div>
      <!-- /.map -->
      <div class="map-filter-horizontal">
        <div class="container">
          <?php echo form_open_multipart('properties/search');?>
            <div class="row">
            <!--   <div class="form-group col-sm-3">
                <input type="text" class="form-control" placeholder="Keyword">
              </div> -->
              <!-- /.form-group -->
              <div class="form-group col-sm-3">
                <select name="city_id">
                  <option value="0">Select City</option>
                  <?php foreach($cities as $city) : ?>
                    <option value="<?=$city['id']?>" <?=($city['id'] == $search['city_id'])? "selected": ""?>><?=$city['name'];?></option>   
                  <?php endforeach; ?>               
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-sm-3">
               <select name="area_id">
                 <option value="0">Select Areas</option>              
              </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-sm-3">
                <select name="property_type_id">
                   <option value="0">Property Type</option>
                  <?php foreach($property_types as $property_type) : ?>
                      <option value="<?=$property_type['id']?>" <?=($property_type['id'] == $search['property_type_id'])? "selected": ""?>><?=$property_type['name'];?></option>     
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group col-sm-3">
                <button type="submit" class="btn btn-lg btn-block" style="    height: 48px;    margin-top: 16px;">Filter</button>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.row -->
         <?php echo form_close(); ?>
        </div>
        <!-- /.container -->
      </div>
    <!-- /.map-filter-horizontal -->
  </div>