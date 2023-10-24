<?php 
namespace App\Middleware;

use dinhub\MiddlewareInterface;

class AuthCheck implements MiddlewareInterface {
    public function inject() {
        echo "Auth injected <br>";
    }
}