 <header class="main-header">
   <!-- Logo -->
   <a href="index2.html" class="logo">
     <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini"><b>K</b>op</span>
     <!-- logo for regular state and mobile devices -->
     <span class="logo-lg"><b>Koperasi</b>Adira</span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
     <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
       <span class="sr-only">Toggle navigation</span>
     </a>

     <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">

         <!-- User Account: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <img src="<?php echo base_url('assets/img/logoadmin.jpg'); ?>" class="user-image" alt="User Image">
             <span class="hidden-xs">Manajer Keuangan Koperasi</span>
           </a>
           <ul class="dropdown-menu">
             <!-- User image -->
             <li class="user-header">
               <img src="<?php echo base_url('assets/img/logoadmin.jpg') ?>" class="img-circle" alt="User sipo">

               <p>
                 <?= $this->session->userdata('nama') ?> - <?= $this->session->userdata('role') ?>
                 <small>Member since Jun. 2024</small>
               </p>
             </li>
             <div class="pull-right">
               <a href="<?php echo base_url('Auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
             </div>
         </li>
       </ul>
       </li>
       <!-- Control Sidebar Toggle Button -->
       <li>
         <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
       </li>
       </ul>
     </div>
   </nav>
 </header>