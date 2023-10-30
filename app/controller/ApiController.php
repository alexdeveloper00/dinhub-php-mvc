<?php 
namespace App\Controller;

use dinhub\Request;
use dinhub\BaseController;

class ApiController extends BaseController {
    public function test() {
        return $this->json([
            'dinhub-mvc' => 'is Awesome'
        ]);
    }
}