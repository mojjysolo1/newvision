<?php

class LoginController extends Controller{

    public $errmsg_arr = array();
    public  $authFlag = false;
    
    //initialise databse

public function validateLoginAdmin($credentials){
    
//initialise databse
$database=new Database();

$admin=new Admin($database);


$rr=$admin->fetchAllAssoc("select * from admin where email='".$credentials['auth']."' and password='".sha1($credentials['pwd']??'')."'");

if($admin->rowCount>0){

$_SESSION['aid']=$rr[0]['admin_id'];
$_SESSION['names']=$rr[0]['names'];

$this->authFlag=true;

return View::make('adminAccountView');

}else{
 
    $this->errmsg_a[]="<button type='button' class='btn btn-danger btn-block'>Invalid  Email / Username  or Password</button>";
    $this->authFlag=false;

    $_SESSION['sys_response']= $this->errmsg_a;

    return View::make('adminLoginView',['layout'=>'loginLayout']);
}



}


public function validateDataCoreLoginUser($credentials){
    //initialise databse
    $database=new Database();
    //a_id, names, sex, email, auth_id, pwd, photo, pos, organisation, org_code, contacts, contacts1, email_id, email_valid, stamp
    $database->setTriple('users','auth_id',$credentials['auth'],'pwd',sha1($credentials['pwd']),'pos',$credentials['ucode']);
    
    if($database->getTripleCount()>0){
    
    $rr=$database->getTripleValues();
    $_SESSION['uid']=$rr['u_id'];
    $_SESSION['authid']=$rr['auth_id'];
    $_SESSION['pos_code']=$rr['pos'];
    
    $this->authFlag=true;
    
    }else{
     
        $this->errmsg_a[]="<button type='button' class='btn btn-danger btn-block'>Invalid ID Number / Username or Password</button>";
        $this->authFlag=false;
    }
    
    $_SESSION['sys_response']= $this->errmsg_a;
    
    }

public function validationResponse(){

    return $this->authFlag;

}

}





?>