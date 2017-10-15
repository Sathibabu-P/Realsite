<div class="admin-content-main-inner">
  <div class="container-fluid">
    <a class="btn btn-primary pull-right" href="<?php echo site_url(); ?>admins/areas/create" title="Add New City">
       <i class="fa fa-plus"></i>ADD
   </a><!-- /.header-action -->
    <h1 class="page-header"><?=$title;?></h1>

    <table class="table table-simple">
      <thead>      
        <tr>
         
          <th class="min-width nowrap">S.NO</th>
          <th class="min-width nowrap">Name</th> 
          <th class="min-width nowrap">City Name</th>         
          <th class="min-width nowrap"></th>
        </tr>
      </thead>
      <tbody>

        <?php $count = 1; foreach($areas as $area) : ?>
          <tr>          
            <td class="semi-bold"><?=$count++?></td>         
            <td class="semi-bold"><?=$area['name'];?></td>
            <td class="semi-bold"><?=$area['cityname'];?></td>                 
            <td class="min-width nowrap"><a href="<?php echo site_url();?>admins/areas/edit/<?=base64_encode($area['id']);?>" class="btn-standard">Edit</a> <a href="<?php echo site_url();?>admins/areas/delete/<?=base64_encode($area['id']);?>" class="btn-alert" onclick="return confirm('Are your sure delete?');">Delete</a></td>
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