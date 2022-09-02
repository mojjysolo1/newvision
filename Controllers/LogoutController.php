<?php

class LogoutController{

  public function adminLogOut()
  {
    unset($_SESSION['aid'],$_SESSION['names']);
    $_SESSION['sys_response']=array("<button type='button' class='btn btn-info btn-block'>Successfully Logged out</button>");
    $_SESSION['end_session']=1;
      echo "<script>location.href='/admin';</script>";
    header("location:/admin");
  }

}
?>