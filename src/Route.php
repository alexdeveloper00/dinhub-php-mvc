<?php 
namespace dinhub;

class Route {
    public static $info;

    public static function craft(string $map, array $routeController) {
        self::$info[] = [
            'map' => $map,
            'controller' => $routeController[0],
            'method' => $routeController[1],
        ];
        return new self();
    }

    public function middleware(array $md) {
        self::$info[count(self::$info) - 1]['middleware'] = $md;
        return new self();
    }

    public function methods(array $meth) {
        self::$info[count(self::$info) - 1]['httpMethods'] = $meth;
        return new self();
    }

    public function prefix(string $prefix) {
        self::$info[count(self::$info) - 1]['prefix'] = $prefix;
        return new self();
    }
}