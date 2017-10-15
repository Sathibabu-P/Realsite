<div class="row">
  <div class="content col-sm-8 col-md-9">
    <h1 class="page-header">Row Properties</h1>
    <div class="properties-sort">
      <form method="get" action="?">
        <h3 class="page-header">Display Options</h3>
        <div class="row">
          <div class="col-sm-4">
            <select style="display: none;">
              <option>Rating</option>
              <option>Most Viewed</option>
              <option>Best Rated</option>
            </select>
          </div>
          <!-- /.col-* -->
          <div class="col-sm-4">
            <select style="display: none;">
              <option>Sort by</option>
              <option>Price</option>
              <option>Name</option>
              <option>Date</option>
            </select>
          </div>
          <!-- /.col-* -->
          <div class="col-sm-4">
            <select style="display: none;">
              <option>Order</option>
              <option>ASC</option>
              <option>DESC</option>
            </select>
          </div>
          <!-- /.col-* -->
        </div>
        <!-- /.row -->
      </form>
    </div>
    <!-- /.properties-sort -->
    <?php if($properties): foreach($properties as $property):?>    
      <div class="property-row">
        <a href="<?php echo site_url();?>properties/view/<?=base64_encode($property['id']);?>" class="property-row-image">
        <span class="property-badge">Featured</span>
        <img src="<?php echo base_url();?><?#=$property['filename'];?>" alt="">
        </a>
        <!-- /.property-row-image -->
        <div class="property-row-content">
          <h2 class="property-row-title">
            <a class="alert-danger" style="text-decoration: none" href="<?php echo site_url();?>properties/view/<?=base64_encode($property['id']);?>"><?=truncate($property['title'],50);?></a>
          </h2>
          <ul class="property-row-location">
            <span><i class="fa fa-map-marker"></i></span>
            <li><a href="#"><?=$property['city_name'];?></a>,</li>
            <li><a href="#"><?=$property['area_name'];?></a>
            </li>
          </ul>
          <div class="property-row-body">
            <p><?=truncate($property['description']);?></p>
          </div>
          <!-- /.property-row-body -->
          <div class="property-row-meta">
            <div class="property-row-meta-item">
              <span><i class="fa fa-dollar"></i></span>
              <strong><?=$property['monthly_rent'];?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <div class="property-row-meta-item">
              <span><i class="fa fa-bed"></i></span>
              <strong><?=$property['total_rooms'];?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <div class="property-row-meta-item">
              <span><i class="fa fa-male"></i></span>
              <strong><?=$property['current_roommates'];?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <div class="property-row-meta-item">
              <span><i class="fa fa-home"></i></span>
              <strong><?=$property['property_type'];?></strong>
            </div>
            <!-- /.property-box-meta-item -->
              <div class="property-row-meta-item">
              <span><i class="fa fa-eye"></i></span>
              <strong><?=$property['property_views'];?></strong>
            </div>
            <!-- /.property-box-meta-item -->
          </div>
          <!-- /.property-row-meta -->
        </div>
        <!-- /.property-row-content -->
      </div>
    <?php endforeach; else:?>
    <p>No Properties form search criteria...</p>
    <?php endif; ?>
    <!-- /.property-row -->
    <div class="center">
       <ul class="pagination"><?php echo $links; ?></ul>
    <!--   <ul class="pagination">
        <li><a href="#"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a>
        </li>
        <li><a href="#">1</a>
        </li>
        <li><a href="#">2</a>
        </li>
        <li class="active"><a href="#">3</a>
        </li>
        <li><a href="#">4</a>
        </li>
        <li><a href="#">5</a>
        </li>
        <li><a href="#"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a>
        </li>
      </ul> -->
    </div>
    <!-- /.center -->
  </div>
  <!-- /.content -->
  <div class="sidebar col-sm-4 col-md-3">
    <!-- /.widget -->
    <div class="widget">
      <div class="widget-title">
        <h2>Best Agents</h2>
      </div>
      <!--/.widget-title -->
      <div class="widget-content">
        <div class="agent-small">
          <div class="agent-small-inner">
            <div class="agent-small-image">
              <a href="#" class="agent-small-image-inner">
              <img src="http://preview.byaviators.com/template/realsite/assets/img/tmp/agents/female.jpg" alt="">
              </a>
              <!-- /.agent-small-image-inner -->
            </div>
            <!-- /.agent-small-image -->
            <div class="agent-small-content">
              <h3 class="agent-small-title">
                <a href="#">Caelan Sinclair</a>
              </h3>
              <div class="agent-small-email">
                <i class="fa fa-at"></i> <a href="#">E-mail Address</a>
              </div>
              <!-- /.agent-small-email -->
              <div class="agent-small-phone">
                <i class="fa fa-phone"></i> 1401-123-456
              </div>
              <!-- /.agent-small-phone -->
            </div>
            <!-- /.agent-small-content -->
          </div>
          <!-- /.agent-small-inner -->
        </div>
        <!-- /.agent-small -->    
      </div>
      <!-- /.widget-content -->
    </div>
    <!-- /.widget -->
    <div class="widget widget-primary">
      <div class="widget-content">
        <form method="post" action="?">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="E-mail address here">
          </div>
          <!-- /.form-group -->
          <button class="btn btn-simple pull-right">Subscribe</button>
        </form>
      </div>
      <!-- /.widget-content -->
    </div>
    <!-- /.widget -->
  </div>
  <!-- /.sidebar -->
</div>