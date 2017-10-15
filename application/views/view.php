

<div class="row">

<ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>">Home</a> </li>
        <li><a href="<?php echo site_url(); ?>properties">Properties</a> </li>
        <li class="active"><?=$property['id']?></li>
</ul>

  <div class="content col-sm-8 col-md-9">
    <h1 class="page-header"><?=$property['title']?></h1>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="module">
          <div class="module-info center vertical-align min-width">
             Rent
          </div>
          <!-- /.module-info -->
          <div class="module-content vertical-align">
            <span><?=$property['monthly_rent']?> Rs/-</span>
          </div>
          <!-- /.module-content -->
        </div>
        <!--- /.module -->
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="module">
          <div class="module-info center vertical-align min-width">
             Deposit
          </div>
          <!-- /.module-info -->
          <div class="module-content vertical-align">
            <span><?=$property['fixed_deposit']?> Rs/-</span>
          </div>
          <!-- /.module-content -->
        </div>
        <!--- /.module -->
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="module">
          <div class="module-info center vertical-align min-width">
            Rooms
          </div>
          <!-- /.module-info -->
          <div class="module-content vertical-align">            
            <span><?=$property['total_rooms']?></span>
            <span><i class="fa fa-bed"></i></span>
          </div>
          <!-- /.module-content -->
        </div>
        <!--- /.module -->
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="module">
          <div class="module-info center vertical-align min-width">
            Roomates
          </div>
          <!-- /.module-info -->
          <div class="module-content vertical-align">            
            <span><?=$property['current_roommates']?></span>
            <span><i class="fa fa-male"></i></span>
          </div>
          <!-- /.module-content -->
        </div>
        <!--- /.module -->
      </div>
    </div>
    <!-- /.row -->
    <?php $images = $this->property->get_property_images($property['id'])?>
    <div class="row">
       <div class="col-sm-12 col-md-7">
        <div class="property-gallery">
            <?php if($images): ?>
            <div class="property-gallery-preview">
                <a href="#">
                    <img src="<?php echo base_url();?>/uploads/properties/<?=$images[0]['file_name']?>" alt="">
                </a>
            </div><!-- /.property-gallery-preview -->

            <div class="property-gallery-list-wrapper">
                <div class="property-gallery-list">
                  
                    <?php  foreach($images as $img):?>
                      <div class="property-gallery-list-item active">
                        <a href="<?php echo base_url();?>/uploads/properties/<?=$img['file_name']?>">
                            <img src="<?php echo base_url();?>/uploads/properties/<?=$img['file_name']?>" alt="">
                        </a>
                    </div>
                    <?php endforeach;  ?>
                    
                </div><!-- /.property-gallery-list -->
            </div><!-- /.property-gallery-list-wrapper -->
          <?php endif; ?>
        </div><!-- /.property-gallery -->
    </div>
      <div class="col-sm-12 col-md-5">
        <div class="property-list">
          <dl>
            <dt>Monthly Rent</dt>
            <dd><?=$property['monthly_rent']?></dd>
             <dt>Fixed Deposit</dt>
            <dd><?=$property['fixed_deposit']?></dd>
            <dt>City</dt>
            <dd><?=$property['city_name']?></dd>
            <dt>Area</dt>
            <dd><?=$property['area_name']?></dd>           
            <dt>Property Type</dt>
            <dd><?=$property['property_type']?></dd>            
            <dt>Total Rooms</dt>
            <dd><?=$property['total_rooms']?></dd>
            <dt>Current Roomates</dt>
            <dd><?=$property['current_roommates']?></dd>
          </dl>
        </div>
        <!-- /.property-list -->
        <h2 class="mb30">Social Profiles</h2>
        <ul class="clearfix sharing-buttons">
          <li>
            <a class="facebook" href="https://www.facebook.com/share.php?u=http://html.realsite.byaviators.com&amp;title=Realsite%20-%20Material%20Real%20Estate%20HTML%20Template#sthash.BUkY1jCE.dpuf" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-facebook fa-left"></i>
            <span class="social-name">Facebook</span>
            </a>
          </li>
          <li>
            <a class="google-plus" href="https://plus.google.com/share?url=http://html.realsite.byaviators.com" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-google-plus fa-left"></i>
            <span class="social-name">Google+</span>
            </a>
          </li>
          <li>
            <a class="twitter" href="https://twitter.com/home?status=Realsite%20-%20Material%20Real%20Estate%20HTML%20Template+http://html.realsite.byaviators.com#sthash.BUkY1jCE.dpuf" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-twitter fa-left"></i>
            <span class="social-name">Twitter</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /.row -->
   
    <!-- /.row -->
    <div class="mb30">
      <h2>Description</h2>
      <p class="text">
       <?=$property['description']?>
      </p>     
    </div>
    <h2 class="page-header">Amenities</h2>
    <div class="property-amenities">
      <ul>

        <?php $amenities_array = explode(",", json_decode($property['amenities'])); foreach($amenities as $amenity) : ?>
                   
          <li class="<?php if(in_array($amenity['id'], $amenities_array)) echo  'yes'; else echo 'no'; ?>"> <?=$amenity['name'];?></li>

        <?php endforeach; ?>

      </ul>
    </div>
    <!-- /.property-amenities -->
    <h2 class="page-header">Position on Map</h2>
    <div class="map-property">
      <div id="map-property" style="position: relative; overflow: hidden;">

       



      
      </div>
      <!-- /#map-property -->
    </div>
    <!-- /.map-property -->
 
   <div class="box property-detail-section">
  <div id="reviews" class="reviews-area">
    <div id="respond" class="comment-respond">
      <h3 id="reply-title" class="comment-reply-title">Post New Review </h3>
      <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
         <?php echo form_open_multipart('properties/review');?>
         <input type="hidden" name="property_id" value="<?=base64_encode($property['id'])?>">
        <p class="review-form-review">
          <label>Review</label>
          <textarea  class="form-control" name="review">   </textarea>
        </p>
        <p class="review-form-email">
          <label>E-mail</label>
          <input  class="form-control" name="email" type="text" >
        </p>
        <p class="review-form-author">
          <label>          Name    </label>
          <input  class="form-control" name="name" type="text"  >
        </p>
        <p class="review-form-rating"  style="cursor: pointer;">
          <label for="rating">Your Rating</label>         
          <div class="stars">
          
              <input class="star star-5" id="star-5" type="radio" name="rating" value="5" />
              <label class="star star-5" for="star-5"></label>
              <input class="star star-4" id="star-4" type="radio" name="rating" value="4" />
              <label class="star star-4" for="star-4"></label>
              <input class="star star-3" id="star-3" type="radio" name="rating" value="3" />
              <label class="star star-3" for="star-3"></label>
              <input class="star star-2" id="star-2" type="radio" name="rating" value="2" />
              <label class="star star-2" for="star-2"></label>
              <input class="star star-1" id="star-1" type="radio" name="rating" value="1" checked />
              <label class="star star-1" for="star-1"></label>
          
          </div>
        </p>
        <p class="form-submit">          
        <input type="submit" class="btn" value="Submit Review" />
        </p>
      <?php echo form_close(); ?>
    </div>
    <!-- #respond -->
    <h2 class="review-title">User Reviews</h2>
    <ol class="review-list">
      <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="review-5">
        <div class="review clearfix">
          <div class="review-avatar">
          </div>
          <!-- /.review-image -->
          <div class="review-content">
            <div class="review-meta">
              <strong class="review-author">admin</strong>
              <span class="review-date">April 4, 2015</span>
              <div class="review-rating-wrapper">
                <span class="review-rating" data-fontawesome="" data-path="http://preview.byaviators.com/theme/realsite/wp-content/plugins/realia/libraries/raty/images" data-score="5" data-staron="fa fa-star" data-starhalf="fa fa-star-half-o" data-staroff="fa fa-star-o" title="gorgeous"><i data-alt="1" class="fa fa-star" title="gorgeous"></i>&nbsp;<i data-alt="2" class="fa fa-star" title="gorgeous"></i>&nbsp;<i data-alt="3" class="fa fa-star" title="gorgeous"></i>&nbsp;<i data-alt="4" class="fa fa-star" title="gorgeous"></i>&nbsp;<i data-alt="5" class="fa fa-star" title="gorgeous"></i><input name="score" type="hidden" value="5" readonly=""></span>
              </div>
            </div>
            <!-- /.review-meta -->
            <div class="review-body">
              <p>Duis eu aliquet eros. Fusce tincidunt mi mollis, maximus ligula in, condimentum metus. Curabitur sed leo non felis fermentum tempor in quis turpis. Sed tortor sapien, ultrices fermentum felis in, aliquet scelerisque ipsum. Etiam et elit ut massa mattis porttitor ac ac enim. In elementum ac ex a molestie. Nulla facilisi. Maecenas in tempus arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce vel dictum urna, vel volutpat nulla. Cras posuere purus lectus, vel auctor magna imperdiet eu.</p>
            </div>
            <!-- /.review-body -->
          </div>
          <!-- /.review-content -->
        </div>
        <!-- /.review -->
      </li>
     
    </ol>
    <!-- /.comment-list -->
  </div>
  <!-- /#comments -->
</div>
    <!-- /.promotion -->
  </div>
  <!-- /.content -->
  <div class="sidebar col-sm-4 col-md-3">

        <div  class="widget">
           <div class="widget-content">
            <div class="center">

              <?php $rating = $this->property->get_avg_rating($property['id']) ?>
              <?php $rating['total']  = $rating['total'] + 1;?>
              <div class="review-rating-total">
              <?php for($i=1; $i<=5; $i++):?>
                 <i data-alt="1" class="<?=($i <= ceil($rating['rating']/$rating['total'])) ? 'fa fa-star' : 'fa fa-star-o'?>"></i>&nbsp;
              <?php endfor;?>
               </div>

              <strong class="review-rating-total-description">
              Ratings:
              <?=ceil($rating['rating']/$rating['total'])?>/5 from <?=($rating['total'] - 1)?> users     
              </strong>
            
            </div><!-- /.center -->
           </div>
        </div>

        
    <div id="agent_assigned_widget-2" class="widget">
       <div class="widget-title">
      <h2>    Assigned Agent    </h2>
    </div>
        <div class="widget-content">
    <div class="agent-small">
      <div class="agent-small-inner">
        <div class="agent-small-image">
          <a href="#" class="agent-small-image-inner">
          <img src="http://preview.byaviators.com/template/realsite/assets/img/tmp/agents/female.jpg" alt="">
          </a><!-- /.agent-small-image-inner -->
        </div>
        <!-- /.agent-small-image -->
        <div class="agent-small-content">
          <h3 class="agent-small-title">
            <a href="#"><?=$user['first_name']?></a>
          </h3>
          <?php if($property['show_email'] == TRUE):?>
            <div class="agent-small-email">
              <i class="fa fa-at"></i> <a href="#"><?=$user['email']?></a>
            </div>
          <?php endif;?>
          <?php if($property['show_phoneno'] == TRUE):?>
            <div class="agent-small-phone">
              <i class="fa fa-phone"></i> <?=$user['phone_no']?>
            </div>
          <?php endif;?>
        
          <!-- /.agent-small-email -->
         
          <!-- /.agent-small-phone -->
        </div>
        <!-- /.agent-small-content -->
      </div>
      <!-- /.agent-small-inner -->
    </div>
    <!-- /.agent-small -->  
  </div>
      <!-- /.agent-small -->                
    </div>

    <div class="widget">
      <div class="widget-title">
        <h2>Enquire Now</h2>
      </div>
      <!-- /.widget-title -->
      <div class="widget-content">
        <form  id="form_enquire"  method="post">
          <input type="hidden" name="property_id" value="<?=base64_encode($property['id'])?>">
          <input type="hidden" name="user_id" value="<?=base64_encode($user['id'])?>">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <input type="email" class="form-control" placeholder="E-mail" name="email">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <textarea class="form-control" placeholder="Message" name="message" style="overflow: hidden; word-wrap: break-word; height: 68px;"></textarea>
          </div>
          <!-- /.form-group -->
          <input type="submit" value="Post Message" class="btn pull-right" id="submit_enquire"/>
         
        </form>
      </div>
      <!-- /.widget-content -->
    </div>
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
          </a><!-- /.agent-small-image-inner -->
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
  </div>
  <!-- /.sidebar -->
</div>

<style type="text/css">
   .fa-star {
      color: #EC407A;


  }
  .review-rating-total .fa {
      margin: 0 2px;
      font-size: 20px;
  }
  .breadcrumb {
    background-color: #cdd2d5 !important;
    border-radius: 0px;
    margin: 10px !important;
    padding: 5px !important;
    color: #fff;
}
.breadcrumb > li a {
    color: #db6558;
    font-size: 14px;
}

</style>

