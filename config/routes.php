<?php 

use dinhub\Route;
use App\Controller\AppController;
use App\Controller\ApiController;

Route::craft('/:map', [AppController::class, 'index'])->methods(['GET', 'POST'])->prefix('/some/prefix');
Route::craft('/', [AppController::class, 'post'])->methods(['GET', 'POST']);
return Route::$info;