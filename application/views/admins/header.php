
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700&amp;subset=latin,latin-ext">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/css_002.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fileinput.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/nv.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/realsite-admin.css">

    <title>    Dashboard | Admin | Realsite</title>
</head>

<body class="open hide-secondary-sidebar">
    <div class="admin-wrapper">
 
 <!--  -->

  <?php
    if(empty($navigation)){$this->load->view('admins/navigation');}    
  ?>
  <!-- /.admin-navigation -->
  
  <div class="admin-content">
    <div class="admin-content-inner">
      <div class="admin-content-header">
        <div class="admin-content-header-inner">
          <div class="container-fluid">
            <div class="admin-content-header-logo">
              <a href="http://preview.byaviators.com/template/realsite/index.html">
              Realsite
              </a>
            </div>
            <!-- /admin-content-header-logo -->
            <div class="admin-content-header-menu">
              <ul class="admin-content-header-menu-inner collapse">               
                <li><a href="admin-login.html">Logout</a></li>
              </ul>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".admin-content-header-menu-inner">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
            </div>
            <!-- /.admin-content-header-menu  -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.admin-content-header-inner -->
      </div>
      <!-- /.admin-content-header -->

    <?php  if($this->session->flashdata('message')):    ?>

            <div class="alert alert-dismissible alert-<?=$this->session->flashdata('type')?>">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <p><?=$this->session->flashdata('message')?></p>
            </div>

    <?php endif; ?>  