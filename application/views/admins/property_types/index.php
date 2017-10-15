<div class="admin-content-main-inner">
  <div class="container-fluid">
    <a class="btn btn-primary pull-right" href="<?php echo site_url(); ?>admins/property_types/create" title="Add New PropertyType">
       <i class="fa fa-plus"></i>ADD
   </a><!-- /.header-action -->
    <h1 class="page-header"><?=$title;?></h1>

    <table class="table table-simple">
      <thead>      
        <tr>
         
          <th class="min-width nowrap">S.NO</th>
          <th class="min-width nowrap">Name</th>         
          <th class="min-width nowrap"></th>
        </tr>
      </thead>
      <tbody>

        <?php $count = 1; foreach($property_types as $property_type) : ?>
          <tr>          
            <td class="semi-bold"><?=$count++?></td>         
            <td class="semi-bold"><?=$property_type['name']?></td>         
            <td class="min-width nowrap"><a href="<?php echo site_url();?>admins/property_types/edit/<?=base64_encode($property_type['id']);?>" class="btn-standard">Edit</a> <a href="<?php echo site_url();?>admins/property_types/delete/<?=base64_encode($property_type['id']);?>" class="btn-alert" onclick="return confirm('Are your sure delete?');">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
   <!--  <div class="center">
      <ul class="pagination">
        <li><a href="#"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li class="active"><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
      </ul>
    </div> -->
    <!-- /.center -->
  </div>
  <!-- /.container-fluid -->
</div>