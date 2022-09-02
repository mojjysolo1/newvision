<?php


class HomePage{

    public function index():string
    {
        

        return View::make('homePageView',['layout'=>'mainLayout']);
    }

}

?>