<?php

    $routes=new Route;

    $routes
    ->get('/',[HomePage::class,'index'])
    ->get('/admin',[AdminController::class,'index'])
    ->get('/signout',[LogoutController::class,'adminLogOut'])
    ->get('/adminaccount',[AdminController::class,'profile'])
    ->get('/email',[EmailController::class,'main'])
    ->post('/user_main',[UserMainController::class,'main',$_POST])
    ->post('/admin_main',[AdminController::class,'main',$_POST])
    ->post('/adminlogin',[LoginController::class,'validateLoginAdmin',$_POST]);


(new App($routes))->run(['uri'=>$_SERVER['REQUEST_URI'],'method'=>$_SERVER['REQUEST_METHOD']]);


// Common resource Routes
// index - Show all listings
//  show- Show single listing
// Create - Show form to create new listing
// store - Store new listing
// edit - Show from to edit listing
// update - Update listing
// destroy - Delete listing

?>