<?php
if(isset($_SESSION['aid'])){
echo "<script>location.href='/adminaccount';</script>";

header("location:/adminaccount");

  exit;
}
?>


<!doctype  html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <meta name="generator" content="Jekyll v4.0.1">

    

    <title><?= $_ENV['APP_NAME']; ?></title>

    <!-- Bootstrap core CSS -->

<link  href="./css/bootstrap/bootstrap.css"  type="text/css" rel="stylesheet">
<link  href="./css/controlPanelPageView.css"  type="text/css" rel="stylesheet">
<!--<link rel="icon" href="./images/dit_icon_logo.png" type="image/png" sizes="16x16" > -->
<script src='./js/jquery'></script>

    <!-- Custom styles for this template -->

    <link href="./css/signin.css" rel="stylesheet" type="text/css">

  </head>

  <body class="cc">

<div class='container form-signin' style="margin-top:-15px; height:auto; padding-top:120px;">


<div class='text-center' style='margin-top:-20px;' >
        <div>
			<span style='cursor:pointer;' class='text-dark'  onclick="location.href='/'" title='home' data-feather='home'></span>
        </div>

	 </div>


     <div class='fluid-container mycontainer p-4' >
      
      {{content}}
  
       </div>


</div>


<script src="./jquery-ui.js"></script>
<script src="./js/popper.min.js"></script>
    <script src="./js/feather.min.js"></script>
    <script src="./js/bootstrap/bootstrap.js"></script>
    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>

<script>
<!--
feather.replace();

$( "#accordion" ).accordion();
//-->
</script>
</body>

</html>



