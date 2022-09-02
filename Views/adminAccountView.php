<?php
if(!isset($_SESSION['aid'])){
    $_SESSION['sys_response']= array("<button type='button' class='btn btn-danger btn-block'>Access Denied</button>");
    echo "<script>location.href='/admin';</script>";
    header("location:/admin");
    exit;
  }

?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?= $_ENV['APP_NAME']; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">

    

    <!-- Bootstrap core CSS -->
<link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
<script>
var loadnum=7;
var startload=0;
var defaultNum=8;
var menuItemSelected='';
</script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/sidebars.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><?= $_ENV['APP_NAME']; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" style='margin-left:55%;'>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main id="main">


  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link  text-white" onclick="panelSelect('add_books','')" id='' aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Add Books
        </a>
      </li>
      <li>
        <a href="#" class="nav-link  text-white" onclick="panelSelect('manage_books','')" id='view_workshops'>
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Manage Books
        </a>
      </li>
     

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="./images/icon_logo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <!--<li><a class="dropdown-item" href="#">New project...</a></li>-->
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <!--<li><a class="dropdown-item" href="#">Profile</a></li>-->
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/signout">Sign out</a></li>
      </ul>
    </div>
  </div>




  <div class="container text-dark" style='margin-top:5%; overflow:auto;'>
   
              <div class='row'>
       
                 <div class='col' id='loaderContent'></div>
               </div>

          <div class='row'>
                <!--main content-->
                <div class='col' id='content'></div> 
           </div>

  </div>

</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container text-center">
    <span class="text-muted"><?= $_ENV['FOOTER'] ?></span>
  </div>
</footer>


<script src="./js/jquery.js" ></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/feather.min.js"></script>
    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>
      <script src="./js/sidebars.js"></script>

      <script src="./js/admin.js"> </script>
      <script src="./js/formhandler.js"> </script>
      
  </body>
</html>
