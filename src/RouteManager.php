<?php 
namespace dinhub;

use dinhub\MiddlewareService;
use dinhub\RouteService;

class RouteManager {
    private array $urlParams = [];

    private array | null $middleware;
    private string $controller;
    private string $func;
    private array $allowedMethods;

    private bool $canRender = false;

    private RouteService $rs;
    private MiddlewareService $ms;
    
    public function __construct() {
        $this->rs = new RouteService();
        $this->ms = new MiddlewareService();
    }

    public function capture(string $url) {
        $this->ignoreQueryParams($url);
        $routes = $this->rs->getRoutes();
        
        foreach ($routes as $route) {
            if (isset($route['prefix'])) {
                $route['map'] = $route['prefix'] . $route['map'];
            }
            if ($this->dynamicMatch($route['map'], $url) || $route['map'] === $url) {
                $this->exctractRouteInformation($route);
                break;
            }
        }
    }

    public function call() {
        if (!$this->canRender) {
            echo "Cannot render";
            return;
        }

        if (!$this->isRightHTTPMethod()) {
            echo "405 - Method not allow";
            return;
        }

        if ($this->hasMiddleware()) {
            foreach ($this->middleware as $mName) {
                $this->ms->callMiddleware($mName);
            }
        }

        $controller = new $this->controller;
        $func = $this->func;

        call_user_func_array([
            $controller,
            $func,
        ], $this->urlParams);
    }

    private function dynamicMatch(string $url1, string $url2) : bool {
        $url1_parts = explode('/', ltrim($url1, '/'));
        $url2_parts = explode('/', ltrim($url2, '/'));
    
        if (count($url1_parts) !== count($url2_parts)) {
            return false;
        }

        for ($i = 0; $i < count($url1_parts); $i++) {
            if (strpos($url1_parts[$i], ':') === 0) {
                $key = ltrim($url1_parts[$i], ':');
                $this->urlParams[$key] = $url2_parts[$i];
            } elseif ($url1_parts[$i] !== $url2_parts[$i]) {
                return false;
            }
        }
    
        return true;
    }

    private function ignoreQueryParams(string & $url) {
        $pos = strpos($url, '?');
        if (is_integer($pos)) {
            $url = substr($url, 0, strlen($url) - (strlen($url) - $pos));
        }
    }

    private function exctractRouteInformation($route) : void {
        $this->controller = $route['controller'];
        $this->func = $route['method'];
        $this->allowedMethods = isset($route['httpMethods']) ? $route['httpMethods'] : ['GET'];
        $this->middleware = isset($route['middleware']) ? $route['middleware'] : null;
        $this->canRender = true;
    }

    private function isRightHTTPMethod() : bool {
        foreach ($this->allowedMethods as $meth) {
            if ($_SERVER['REQUEST_METHOD'] === $meth) return true;
        }

        return false;
    }

    private function hasMiddleware() : bool {
        $mid = $this->middleware;
        if (!isset($mid)) return false;
        if (!is_array($mid) || empty($mid)) return false;

        return true;
    }
}