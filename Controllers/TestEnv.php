<?php

class TestEnv extends Controller{

    public function index(){

        return parent::createView('test');
    }

    public function store(){
        $amount=$_POST['amount'];
        return "store works $amount";
    }
}
?>