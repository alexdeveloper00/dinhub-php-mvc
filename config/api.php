<?php 

use dinhub\Route;
use App\Controller\ApiController;

$prefix = '/api/v1';

Route::craft('/test', [ApiController::class, 'ok'])->prefix($prefix);
return Route::$info;