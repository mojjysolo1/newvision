<?php


class HomePage{

    public function index():string
    {
        

        return View::make('test',['layout'=>'mainView',$_GET]);
    }

}

?>