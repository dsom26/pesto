<!DOCTYPE html>
<html lang="en">

<head>

  <title>Pesto - Tasks</title>

  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon-32x32.png'); ?>">

  <!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>  
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
       

      <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <li>
      <!-- Sidebar - Brand -->
      
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3" style="padding-top:10px;">
            <a href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('assets/images/mtrack.png'); ?>" alt="Pesto" style="width:100%;height:auto"></a>
        </div>
      
    </li>
      <!-- Nav Item - Dashboard -->
      <hr class="sidebar-divider">
    
         
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('task/create'); ?>"><i class="fas fa-fw fa-plus"></i><span>Add Task</span></a>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnquiries"
            aria-expanded="true" aria-controls="collapseEnquiries">
            <i class="fa fa-tasks"></i>
            <span>Task List</span>
        </a>
        
        <div id="collapseEnquiries" class="collapse show" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              
              <a class="collapse-item" href="<?php echo base_url('task/index'); ?>"><i class="fa fa-tasks text-primary" aria-hidden="true"></i> All</a>

              <a class="collapse-item" href="<?php echo base_url('task/index/1'); ?>"><i class="fa fa-tasks text-primary" aria-hidden="true"></i> To Do</a>

              <a class="collapse-item" href="<?php echo base_url('task/index/2'); ?>"><i class="fa fa-tasks text-primary" aria-hidden="true"></i> In Progress</a>

              <a class="collapse-item" href="<?php echo base_url('task/index/3'); ?>"><i class="fa fa-tasks text-primary" aria-hidden="true"></i> Done</a>

               

            </div>
        </div>
    </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button> 
      </div>

    </ul>
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
<b>Pesto - Task Panel</b>
          <!-- <img src="<?php echo base_url('assets/images/mahindra-Rise.png'); ?>" alt="Pesto"> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $_SESSION['user_name'];?></b><br><?php echo $_SESSION['user_email']; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/images/user-logo.jpg'); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>


        <!-- End of Topbar -->

       




