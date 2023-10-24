<?php 

namespace dinhub;

class RouteService {
    private array $routes;

    public function __construct() {
        $path = substr($_SERVER['REQUEST_URI'], 0, 4) === '/api' ? '/../config/api.php' : '/../config/routes.php';
        $routes = require_once __DIR__ . $path;
        $this->routes = $routes;
    }

    public function getRoutes() : array {
        return $this->routes;
    }
}