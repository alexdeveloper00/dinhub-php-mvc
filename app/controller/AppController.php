<?php 
namespace App\Controller;

use dinhub\BaseController;
use dinhub\Request;

class AppController extends BaseController {
    public function index() {
        return $this->render('index', []);
    }
}