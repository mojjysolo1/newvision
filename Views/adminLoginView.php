
<form action='/adminlogin' method='post'>
    <input type="hidden" name='choose' value='login_exec_agent'>
    
  <input type="text" style='display:none;'>
  <input type="password" style='display:none;'>

  <h1 class="h5 mb-2 text-center"><strong>ADMINISTRATOR</strong></h1>

  <label for="inputAuth" class="sr-only">Email</label>
  <input type="email" name='auth' id="inputAuth" class="form-control bg-dark text-white border border-0 mb-1" placeholder="Email" required autofocus>

  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name='pwd' id="inputPassword" class="form-control text-white bg-dark border border-0" placeholder="Password" required>

  <div class="checkbox mb-3">

  </div>

  <button class="btn btn-lg btn-dark" style='margin-left:30%;' type="submit">Signin</button>



  <?php

if(is_array($_SESSION['sys_response']) && count($_SESSION['sys_response'])){



  foreach($_SESSION['sys_response'] as $vals ){

  echo "<div class='mt-1'> $vals</div>";

  }

unset($_SESSION['sys_response']);



}



if(isset($_SESSION['end_session']) && $_SESSION['end_session']==1){



  session_destroy();



}

  ?>



  <p class="mt-1 mb-3 font-weight-bold text-center p-2"><?= $_ENV['FOOTER']; ?></p>

</form>