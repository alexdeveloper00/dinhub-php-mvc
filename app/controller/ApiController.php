<?php 
namespace App\Controller;

use dinhub\RestController;

class ApiController extends RestController {
    public function getUser() {

        return $this->json([
            'user' => 'Alex',
            'name' => 'Developer',
            'request' => $this->input('ce')
        ]);
    }

    public function ok() {
        return $this->json([
            'app' => 'o'
        ]);
    }
}