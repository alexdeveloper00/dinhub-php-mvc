<?php 
namespace App\Controller;

use dinhub\BaseController;
use dinhub\Session;
use dinhub\Database;
use dinhub\Request;

class AppController extends BaseController {
    public function static() {
        return $this->html('Static file');
    }

    public function index(mixed $map) {
        // $data = Request::hasHeader('Host');
        // return $this->html($data);
        return $this->html($map);
    }

    public function post() {
        // $p = new Request();
        // $data = $p->getRest();

        return $this->json([
            'app' => 'Developer',
            'data' => Request::post('alex')
        ]);
    }
}