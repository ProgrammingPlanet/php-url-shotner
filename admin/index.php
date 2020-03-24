<?php

  include('dbcon.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Zlink</title>
  <link rel="icon" href="../favicon.ico" type="image/ico" sizes="30x30">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/sidebar.css" rel="stylesheet">
  <link href="css/admin.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap4-1.10.2.min.css" rel="stylesheet">
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/chartJs-2.8.js"></script>
  <script src="js/jquery.dataTables-1.10.2.min.js"></script>
  <script src="js/dataTables.bootstrap4-1.10.2.min.js"></script>
  
  <script src="js/removeBanner.js"></script>

</head>


<body>
    
  <div class="d-flex" id="wrapper">
      
      <!-- Modal -->
    <div class="modal fade" id="link-visits">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="link-visits-title">Visits For Link</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body" >
            <table class="table table-bordered table-sm text-center" >
              <thead>
                  <tr>
                      <th>ip Address</th>
                      <th>Time</th>
                  </tr>
              </thead>
              <tbody id="visits-table">
    
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> Admin@Zlink </div>
      <div class="list-group list-group-flush">
        <a href="./?p=home" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="./?p=links" class="list-group-item list-group-item-action bg-light">All Links</a>
        <a href="./?p=visits" class="list-group-item list-group-item-action bg-light">visits</a>
      </div>
    </div>
    <!-- /sidebar -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" id="topnavbar">
        <button class="btn border" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnav" aria-controls="topnav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topnav">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                👤
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      
      

      <div class="container-fluid h-100 custom-scroll" id="content">
        <?php

          $pages = ['home','links'];

          $p = isset($_GET['p']) ? $_GET['p'] : 'home';

          if(array_search($p,$pages) !== FALSE)
            include("$p.php");
          else
            include('home.php');


        ?>
      </div>

    </div>
    <!-- /page-content -->

  </div>
  <!-- /wrapper -->
  
  

  
  <script src="js/sidebar.js"></script>
  <script src="js/admin.js"></script>
  <!--<script src="../removebanner1.js"></script> -->
  
  
    

</body>


</html>


