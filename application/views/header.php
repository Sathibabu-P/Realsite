<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/realsite.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

    <title>    Property Row | Realsite</title>

<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/common.js" style=""></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/util.js"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/stats.js"></script></head>

<body>
<body>

<div class="page-wrapper">
    <div class="header header-standard">
        <div class="header-topbar">
            <div class="container">
               

            <div class="header-topbar-right">
             
           
               <ul class="header-topbar-social ml30">
                   <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                   <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                   <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               </ul><!-- /.header-topbar-social -->
           </div><!-- /.header-topbar-right -->
       </div><!-- /.container -->
   </div><!-- /.header-topbar -->

   <div class="container">
       <div class="header-inner">
           <div class="header-main">
               <div class="header-title">
                   <a href="<?php echo site_url(); ?>">
                       <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Realsite">

                       <span>Realsite</span>
                   </a>
               </div><!-- /.header-title -->

               <div class="header-navigation">
                   <div class="nav-main-wrapper">
                    <div class="nav-main-title visible-xs">
                        <a href="http://preview.byaviators.com/template/realsite/index.html">
                            <img src="<?php echo base_url(); ?>assets/img/logo-blue.png" alt="Realsite">

                            Realsite
                        </a>
                    </div><!-- /.nav-main-title -->

    <div class="nav-main-inner">
        <nav>
            <ul id="nav-main" class="nav nav-pills">


                  <?php if(!$this->session->userdata('logged_in')): ?>
                  <li id="menu-item-159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-159"><a href="<?php echo site_url(); ?>users/register">Register</a></li>
                  <li id="menu-item-159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-159"><a href="<?php echo site_url(); ?>users/login">Login</a></li>
                  <?php endif; ?>  
                <?php if($this->session->userdata('logged_in')): ?>
                  <li id="menu-item-159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-159"><a href="<?php echo site_url(); ?>users/profile">Profile</a></li>
                  <li id="menu-item-159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-159"><a href="<?php echo site_url(); ?>users/logout">Logout</a></li>
                   <?php endif; ?>  
              
               
               <!--  <li class="has-children ">
                    <a href="#">Blog <i class="fa fa-caret-down"></i></a>

                    <div>
                        <a href="#">Blog <i class="fa fa-caret-down"></i></a>

                        <ul class="sub-menu">
                            <li><a href="http://preview.byaviators.com/template/realsite/blog-index.html">Listing Right Sidebar</a></li>
                            <li><a href="http://preview.byaviators.com/template/realsite/blog-index-left.html">Listing Left Sidebar</a></li>
                            <li><a href="http://preview.byaviators.com/template/realsite/blog-detail.html">Detail Page</a></li>
                        </ul>
                    </div>
                </li> -->
             
            </ul><!-- /.nav -->
        </nav>
    </div><!-- /.nav-main-inner -->
</div><!-- /.nav-main-wrapper -->

<button type="button" class="navbar-toggle">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
               </div><!-- /.header-navigation -->
           </div><!-- /.header-main -->

           <a class="header-action" href="<?php echo site_url(); ?>users/property/create" title="Add New Property">
               <i class="fa fa-plus"></i>
           </a><!-- /.header-action -->
       </div><!-- /.header-inner -->
   </div><!-- /.container -->
</div><!-- /.header-->

<div class="main">
  
  <?php
    if(!empty($map)){$this->load->view('map');}    
  ?>
<!-- /.map-wrapper -->
      <div class="container">

            <?php  if($this->session->flashdata('message')):    ?>

            <div class="alert  alert-<?=$this->session->flashdata('type')?>">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <p><?=$this->session->flashdata('message')?></p>
            </div>

            <?php endif; ?>  

        <!-- <div class="alert alert-info">
            Praesent lobortis consectetur eros fringilla elementum. Nulla facilisi. In suscipit sed tellus vitae aliquet. Aenean id vestibulum arcu.
        </div>
        <div class="alert alert-success">
          Praesent lobortis consectetur eros fringilla elementum. Nulla facilisi. In suscipit sed tellus vitae aliquet. Aenean id vestibulum arcu.
        </div>
        <div class="alert alert-danger">
          Praesent lobortis consectetur eros fringilla elementum. Nulla facilisi. In suscipit sed tellus vitae aliquet. Aenean id vestibulum arcu.
        </div> -->