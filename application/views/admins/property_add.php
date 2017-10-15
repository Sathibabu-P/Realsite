<div class="admin-content-main">
  <div class="admin-content-main-inner">
    <div class="container-fluid">
      <div class="box">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Title">
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <textarea class="form-control" placeholder="Property Description"></textarea>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.box -->
      <h2 class="page-header">Attributes</h2>
      <div class="box">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <select name="property" style="display: none;">
                <option>Property Type</option>
                <option>Apartment</option>
                <option>Condo</option>
                <option>House</option>
                <option>Villa</option>
              </select>
             
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <select name="contract" style="display: none;">
                <option>Contract</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <select name="location" style="display: none;">
                <option>Location</option>
                <option>Kensal</option>
                <option>Braymer</option>
                <option>Horton Bay</option>
            
              </select>
             
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input class="form-control" type="text" placeholder="Price">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col-* -->
          <div class="col-sm-6">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-arrows"></i></span>
              <input class="form-control" type="text" placeholder="Size">
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tint"></i></span>
              <input class="form-control" type="text" placeholder="Baths">
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
              <input class="form-control" type="text" placeholder="Rooms">
            </div>
            <!-- /.form-group -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-car"></i></span>
              <input class="form-control" type="text" placeholder="Garages">
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
                        <input class="form-control" type="text" placeholder="Latitude" id="input-latitude">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->

                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="Lontgitude" id="input-longitude">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.box -->
          <!-- /.box -->
        </div>
        <div class="col-sm-12">
          <h2 class="page-header">Gallery</h2>
         <div class="box">
            <input type="file" id="input-file">
        </div><!-- /.box -->
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <h2 class="page-header">Amenities</h2>
      <div class="property-amenities">
        <ul>
          <li><label><input type="checkbox"> Air conditioning</label></li>
          <li><label><input type="checkbox"> Balcony</label></li>
          <li><label><input type="checkbox"> Bedding</label></li>
          <li><label><input type="checkbox"> Cable TV</label></li>
          <li><label><input type="checkbox"> Cleaning after exit</label></li>
          <li><label><input type="checkbox"> Cofee pot</label></li>
   
        </ul>
      </div>
      <div class="center">
        <button class="btn btn-xl">Submit Property<small>I agree with Terms &amp; Conditions</small></button>
      </div>
      <!-- /.center -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.admin-content-main-inner -->
</div>