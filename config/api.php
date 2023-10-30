<?php 

use dinhub\Route;
use App\Controller\ApiController;

$prefix = '/api/v1';

Route::craft('/test', [ApiController::class, 'test'])->prefix($prefix)->methods(['GET', 'POST']);
return Route::$info;