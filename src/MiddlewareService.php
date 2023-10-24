<?php 
namespace dinhub;

class MiddlewareService {
    private string $name;
    private $config;

    public function __construct() {
        $this->config = require_once __DIR__ . '/../config/middleware.php';
    }

    public function callMiddleware(string $midName) {
        $mInstance = new $this->config[$midName];
        $mInstance->inject();
    }

}