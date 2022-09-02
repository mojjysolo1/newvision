<!doctype  html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <meta name="generator" content="Jekyll v4.0.1">

    <link rel="icon" href="images/safia_title_icon.png" type="image/png" sizes="16x16" />

    <title>schoolsafia Homepage</title>

    <!-- Bootstrap core CSS -->

<link  href="./css/bootstrap/bootstrap.css"  type="text/css" rel="stylesheet">
<link  href="./css/main.css"  type="text/css" rel="stylesheet">
<link href="./jquery-ui.css" type="text/css" rel="stylesheet">

<script src='./js/jquery.js'></script>
<script>
 var loadnum='';
    var startload=0;
    var defaultNum=5;//change this value to populate desired rows
var menuItemSelected='';
var ordernum=0;
var ids_selected=[];
var orderItemsData={};
</script>


  </head>

  <body class="bckground">

 <!--class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"-->
 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style='z-index:1;'>
      <a class="navbar-brand  text-primary josh_bold "  href="#">
        <img src='images/icon_logo.png' alt='logo' height='30' width='30'></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault"            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav mr-auto " style='width:92%;'>

        <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><h4>Make your book orders online</h4></a>
          </li>

        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
        <a  href="/admin"><button class="btn btn-outline-primary text-light" type="submit">admin</button></a>
      </div>
    </nav>

    <div class='fluid-container mycontainer p-4' >
      
    {{content}}

     </div>

<!--Starts row4 bottom-->
<div class='row w-100 rounded text-center' id='bottom' >
     	<div ><?= $_ENV['FOOTER']; ?></div>
     </div>
     <!--Ends row4 Bottom-->
     
     <script src="./jquery-ui.js"></script>
<script src="./js/popper.min.js"></script>
    <script src="./js/feather.min.js"></script>
    <script src="./js/bootstrap/bootstrap.js"></script>
    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>
    
    
     <script src='./js/HomePageView.js'></script>

     <script src='./js/contactus.js'></script>
     <script>
feather.replace();
jQuery( '#tabs' ).tabs();

jQuery("[id^='button']").button();



</script>

</body>

</html>


