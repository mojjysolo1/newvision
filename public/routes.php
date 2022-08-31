<?php

    $routes=new Route;

    $routes
    ->get('/',[HomePage::class,'index'])
    ->get('/person',[PersonController::class,'findPerson'])
    ->get('/email',[EmailController::class,'main'])
    ->get('/invoices',[Invoices::class,'index'])
    ->post('/testclass/store',[TestEnv::class,'store']);


(new App($routes))->run(['uri'=>$_SERVER['REQUEST_URI'],'method'=>$_SERVER['REQUEST_METHOD']]);



?>