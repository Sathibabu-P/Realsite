<div class="row">

  <div class="sidebar col-sm-4 col-md-2">
     <?php    $this->load->view('users/navigation');     ?>
  </div>


  <div class="content col-sm-8 col-md-10">
    <h1 class="page-header"><?=$title?></h1>
    <div class="box" style="padding: 25px;">     
      <div class="row property-simple-wrapper">
          <table class="property-table">
            <thead>
              <tr>
                <th>Info</th>
                <th>Type</th>
                <th class="center">Fixed Deposit</th>
                <th class="center">Rooms</th>
                <th class="center">Roommates</th>
                <th class="center">Views</th>
                <th class="center">#</th>
              </tr>
            </thead>
           
            <tbody>     
               <?php if(!empty($properties)): ?>       
              <?php $count = 1; foreach($properties as $property) : ?>
              <tr>
                <td class="property-table-info">
                  <a href="#" class="property-table-info-image">
                  <img src="<?php echo base_url(); ?>uploads/properties/" alt="">
                  </a><!-- /.property-table-info-image -->
                  <div class="property-table-info-content">
                    <div class="property-table-info-content-title">
                      <a href="#"><?=$property['title']?></a>
                    </div>
                    <!-- /.property-table-info-content-title -->
                    <ul class="property-table-info-content-location">
                      <li><?=$property['city_name']?></li>
                      <li><?=$property['area_name']?></li>
                    </ul>
                    <!-- /.property-table-info-content-location -->
                    <div class="property-table-info-content-price">
                      Rs <?=$property['monthly_rent']?> per month
                    </div>
                  </div>
                  <!-- /.property-table-info-content -->
                </td>
                <td class="property-table-type"><?=$property['property_type']?></td>
                <td class="property-table-beds">Rs <?=$property['fixed_deposit']?></td>
                <td class="property-table-beds"><?=$property['total_rooms']?></td>
                <td class="property-table-beds"><?=$property['current_roommates']?></td>
                <td class="property-table-beds">10</td>
                <td class="property-table-beds">
                  <a href="<?php echo site_url(); ?>"><i class="fa fa-envelope"></i></a>
                  <a href="<?php echo site_url(); ?>users/property/edit/<?=base64_encode($property['id'])?>"><i class="fa fa-edit"></i></a>
                  <a href="#"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php endforeach; ?>      
                <?php endif; ?>            
            </tbody>          
          
          </table>
      </div>
    </div>
    <!-- /.box -->
   
    <!-- /.center -->
  </div>
  <!-- /.content -->
  
  <!-- /.sidebar -->
</div>

