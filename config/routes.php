<?php 

use dinhub\Route;
use App\Controller\AppController;
use App\Controller\ApiController;

Route::craft('/', [AppController::class, 'index'])->methods(['GET', 'POST']);
return Route::$info;