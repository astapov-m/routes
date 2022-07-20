<?php
use App\Services\Router;

Router::get('/','index');
Router::post('/getDistance',\App\Controllers\MainController::class,'index',true);

Router::run();
