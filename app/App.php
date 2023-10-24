<?php
use dinhub\RouteManager;
use dinhub\SessionService;

class App {
    private SessionService $ss;
    private RouteManager $routeManager;
    
    public function __construct() {
        header_remove("X-Powered-By");
        $this->ss = new SessionService();
        $this->routeManager = new RouteManager();

        return $this;
    }

    public function serve() : void {
        $this->ss->load();
        $this->routeManager->capture($_SERVER['REQUEST_URI']);
        $this->routeManager->call();
    }
}